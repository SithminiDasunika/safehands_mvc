<?php

class ComplaintController extends Controller
{
    private function requireFamily(): int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'family') {
            header('Location: /safehands_mvc/login');
            exit;
        }

        return (int)$_SESSION['user_id'];
    }

    public function index($booking_id = null): void
    {
        $familyId = $this->requireFamily();
        if (!$booking_id || !filter_var($booking_id, FILTER_VALIDATE_INT)) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getCompletedBookingForFamily((int)$booking_id, $familyId);

        if (!$booking) {
            header('Location: /safehands_mvc/bookings?complaint=unavailable');
            exit;
        }

        $data = [
            'title' => 'Submit Complaint - SafeHands',
            'booking' => $booking,
            'patient' => ['full_name' => $booking['patient_name']],
            'caregiver' => [
                'name' => $booking['caregiver_name'] ?? 'Caregiver',
                'image' => $booking['caregiver_image'] ?? '/safehands_mvc/public/assets/images/caregiver-1.jpg'
            ]
        ];

        $this->view('complaint/index', $data, 'complaint');
    }

    public function submit(): void
    {
        $familyId = $this->requireFamily();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['booking_id'] ?? null;
            
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
            
            $subject = trim($_POST['subject'] ?? '');
            $details = trim($_POST['description'] ?? '');
            $description = $subject !== '' ? $subject . "\n\n" . $details : $details;

            if ($bookingId && filter_var($bookingId, FILTER_VALIDATE_INT) && $subject !== '' && $details !== '') {
                $complaintRef = 'CMP-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

                $complaintModel = $this->model('ComplaintModel');
                $complaintId = $complaintModel->createCompletedBookingComplaint([
                    'complaint_ref' => $complaintRef,
                    'booking_id' => (int)$bookingId,
                    'type' => $type,
                    'priority' => $priority,
                    'description' => $description
                ], $familyId);

                if (!$complaintId) {
                    header('Location: /safehands_mvc/bookings?complaint=unavailable');
                    exit;
                }
                
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
                header('Location: /safehands_mvc/complaint/index/' . (int)$bookingId . '?error=missing_fields');
                exit;
            }
        }
        
        header('Location: /safehands_mvc/bookings');
        exit;
    }
}
