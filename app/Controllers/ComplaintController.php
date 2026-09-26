<?php

class ComplaintController extends Controller
{
    public function index($booking_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);

        if (!$booking) {
            echo "Booking not found.";
            exit;
        }

        $caregiverModel = $this->model('Caregiver');
        $caregiver = $caregiverModel->getById($booking['caregiver_id']);

        $patientModel = $this->model('PatientModel');
        $patient = $patientModel->getPatientById($booking['patient_id']);

        $data = [
            'title' => 'Submit Complaint - SafeHands',
            'booking' => $booking,
            'patient' => $patient,
            'caregiver' => [
                'user_id' => $caregiver['user_id'] ?? $booking['caregiver_id'],
                'name' => $caregiver['name'] ?? 'Caregiver',
                'image' => $caregiver['image'] ?? '/safehands_mvc/public/assets/images/caregiver-1.jpg'
            ]
        ];

        $this->view('complaint/index', $data, 'complaint');
    }

        public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['booking_id'] ?? null;
            $familyId = $_POST['family_id'] ?? null;
            $caregiverId = $_POST['caregiver_id'] ?? null;
            
            // Map category to DB ENUM
            $rawCat = $_POST['category'] ?? 'other';
            $type = 'Other';
            if ($rawCat == 'service') $type = 'Service Quality';
            elseif ($rawCat == 'safety') $type = 'Family Member Issue';
            elseif ($rawCat == 'booking') $type = 'Booking Issue';
            
            // Map urgency to DB ENUM
            $rawUrg = $_POST['urgency'] ?? 'normal';
            $priority = 'Normal';
            if ($rawUrg == 'important') $priority = 'High';
            elseif ($rawUrg == 'urgent') $priority = 'Critical';
            
            $description = $_POST['description'] ?? '';

            if ($bookingId && $familyId && $caregiverId && $description) {
                $complaintRef = 'CMP-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

                $complaintModel = $this->model('ComplaintModel');
                $complaintId = $complaintModel->createComplaint([
                    'complaint_ref' => $complaintRef,
                    'booking_id' => (int)$bookingId,
                    'family_id' => (int)$familyId,
                    'caregiver_id' => (int)$caregiverId,
                    'type' => $type,
                    'priority' => $priority,
                    'description' => $description
                ]);
                
                // Handle file upload if present
                if ($complaintId && isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/../../public/assets/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    $fileName = time() . '_' . basename($_FILES['attachment']['name']);
                    $targetPath = $uploadDir . $fileName;
                    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $targetPath)) {
                        $db = new Database();
                        $conn = $db->getConnection();
                        $stmt = $conn->prepare("INSERT INTO complaint_evidence (complaint_id, file_name, file_path) VALUES (?, ?, ?)");
                        $filePath = '/safehands_mvc/public/assets/uploads/' . $fileName;
                        $stmt->bind_param("iss", $complaintId, $fileName, $filePath);
                        $stmt->execute();
                    }
                }
                
                header('Location: /safehands_mvc/bookings?complaint=success');
                exit;
            } else {
                // If validation failed, redirect back with error
                error_log("Failed to create complaint: Missing required fields");
                header('Location: /safehands_mvc/complaint/index/' . $bookingId . '?error=missing_fields');
                exit;
            }
        }
        
        header('Location: /safehands_mvc/bookings');
        exit;
    }
}
