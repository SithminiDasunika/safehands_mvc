<?php

class BookingController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /safehands_mvc/login');
            exit;
        }
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Redirects to the index list of bookings.
     */
    public function index(): void
    {
        header('Location: /safehands_mvc/bookings');
        exit;
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Fetches and displays details for a specific booking.
     */
    public function details($booking_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);

        if (!$booking) {
            echo "Booking not found.";
            return;
        }

        $role = $_SESSION['user_role'] ?? 'family';
        $userId = (int)$_SESSION['user_id'];

        if ($role === 'caregiver') {
            $caregiverModel = $this->model('Caregiver');
            $caregiverProfile = $caregiverModel->getByUserId($userId);
            if (!$caregiverProfile || $caregiverProfile['id'] != $booking['caregiver_id']) {
                echo "Unauthorized.";
                return;
            }
        }

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById($booking['patient_id']);

        $data = [
            'title' => 'Booking Details | SafeHands',
            'booking' => $booking,
            'patient' => [
                'name' => $patientData['full_name'] ?? 'Patient',
                'image' => $patientData['image'] ?? 'https://via.placeholder.com/150'
            ]
        ];

        if ($role === 'caregiver') {
            $this->view('booking/caregiver-details', $data, '');
        } else {
            $this->view('booking/details', $data, '');
        }
    }

    public function report($booking_id = null): void
    {
        if (!$booking_id ) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);

        if (!$booking) {
            echo "Booking not found.";
            return;
        }

        $caregiverModel = $this->model('Caregiver');
        $caregiver = $caregiverModel->getById($booking['caregiver_id']);

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById($booking['patient_id']);

        $data = [
            'title' => 'Submit Daily Care Report | SafeHands',
            'booking' => [
                'id' => $booking['booking_id'],
                'service_date' => count($booking['sessions']) > 0 ? $booking['sessions'][0]['service_date'] : 'N/A',
                'service_time' => count($booking['sessions']) > 0 ? ucfirst($booking['sessions'][0]['shift_type']) : 'N/A',
            ],
            'patient' => [
                'name' => $patientData['full_name'] ?? 'Patient',
                'image' => $patientData['image'] ?? 'https://via.placeholder.com/150'
            ],
            'caregiver' => [
                'image' => $caregiver['image'] ?? 'https://via.placeholder.com/150'
            ]
        ];

        $this->view('booking/care-report', $data, '');
    }

    /**
     * ==========================================
     * UPDATE OPERATION
     * ==========================================
     * Updates booking status via OTP submission.
     */
    public function verifyOtp($booking_id = null): void
    {
        header('Content-Type: application/json');
        error_reporting(0);
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $otp = $_POST['otp'] ?? '';
        $bookingModel = $this->model('BookingModel');
        
        if ($bookingModel->verifyOtp((int)$booking_id, $otp)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid OTP']);
        }
    }

    /**
     * ==========================================
     * UPDATE OPERATION
     * ==========================================
     * Submits a report and updates booking status to completed.
     */
    public function submitReport($booking_id = null): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id) {
                header('Location: /safehands_mvc/bookings');
                exit;
            }

            $bookingModel = $this->model('BookingModel');
            $booking = $bookingModel->getBookingById((int)$booking_id);

            $activities = $_POST['activities'] ?? [];
            $structuredActivities = [];
            $allActivities = ['Assisted Bathing', 'Dressing', 'Medication Administered', 'Meal Prep', 'Feeding', 'Walking Assistance', 'Exercise', 'Companionship', 'BP Monitoring'];
            foreach ($allActivities as $act) {
                $structuredActivities[] = [
                    'name' => $act,
                    'completed' => in_array($act, $activities),
                    'status' => in_array($act, $activities) ? 'Completed' : 'Pending'
                ];
            }

            $medicalNotes = json_encode([
                'medication' => [
                    'status' => $_POST['med_status'] ?? '',
                    'name' => $_POST['med_name'] ?? '',
                    'time' => $_POST['med_time'] ?? ''
                ],
                'meal' => [
                    'breakfast' => $_POST['meal_breakfast'] ?? '',
                    'water' => $_POST['meal_water'] ?? ''
                ],
                'condition' => [
                    'status' => $_POST['condition_status'] ?? '',
                    'mood' => $_POST['condition_mood'] ?? ''
                ],
                'vitals' => [
                    'bp' => $_POST['vitals_bp'] ?? '',
                    'temp' => $_POST['vitals_temp'] ?? '',
                    'hr' => $_POST['vitals_hr'] ?? ''
                ],
                'activities' => $structuredActivities
            ]);

            $encryptedNotes = base64_encode($medicalNotes); 
            $shiftSummary = $_POST['shift_summary'] ?? '';

            $caregiverModel = $this->model('Caregiver');
            $cgProfile = $caregiverModel->getById((int)$booking['caregiver_id']);
            $realCaregiverUserId = $cgProfile['user_id'] ?? $booking['caregiver_id'];

            $reportModel = $this->model('CareReportModel');
            $existingReport = $reportModel->getReportByBookingId((int)$booking_id);
            
            $dbData = [
                'shift_summary' => $shiftSummary,
                'encrypted_medical_notes' => $encryptedNotes,
                'med_status' => $_POST['med_status'] ?? '',
                'med_name' => $_POST['med_name'] ?? '',
                'med_time' => $_POST['med_time'] ?? '',
                'meal_breakfast' => $_POST['meal_breakfast'] ?? '',
                'meal_water' => $_POST['meal_water'] ?? '',
                'condition_status' => $_POST['condition_status'] ?? '',
                'condition_mood' => $_POST['condition_mood'] ?? '',
                'vitals_bp' => $_POST['vitals_bp'] ?? '',
                'vitals_temp' => $_POST['vitals_temp'] ?? '',
                'vitals_hr' => $_POST['vitals_hr'] ?? '',
                'activities' => json_encode($structuredActivities)
            ];

            if ($existingReport) {
                $reportModel->updateReport($existingReport['id'], $dbData);
            } else {
                $dbData['report_ref'] = 'CR-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                $dbData['booking_id'] = (int)$booking_id;
                $dbData['caregiver_id'] = (int)$booking['caregiver_id'];
                $dbData['patient_id'] = (int)$booking['patient_id'];
                $dbData['check_in_time'] = date('Y-m-d H:i:s', strtotime('-8 hours'));
                $dbData['check_out_time'] = date('Y-m-d H:i:s');
                $reportModel->createReport($dbData);
            }

            $bookingModel->updateStatus((int)$booking_id, 'completed');

            header('Location: /safehands_mvc/care-report/index/' . (int)$booking_id);
            exit;
        } catch (Throwable $e) {
            echo "Error saving report: " . $e->getMessage();
            exit;
        }
    }

    /**
     * ==========================================
     * DELETE / CANCEL OPERATION
     * ==========================================
     * Cancels a booking, effectively deleting it from active workflows.
     */
    public function cancel($booking_id = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $bookingModel->cancelBooking((int)$booking_id);

        header('Location: /safehands_mvc/booking/details/' . (int)$booking_id);
        exit;
    }
    public function deleteReport($booking_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }
        
        $reportModel = $this->model('CareReportModel');
        $reportModel->deleteReportByBookingId((int)$booking_id);
        
        $bookingModel = $this->model('BookingModel');
        $bookingModel->updateStatus((int)$booking_id, 'active');
        
        header('Location: /safehands_mvc/caregiver/dashboard?msg=report_deleted');
        exit;
    }

    /**
     * ==========================================
     * END SESSION OPERATION
     * ==========================================
     * Marks the booking session as completed in the database.
     */
    public function endSession($booking_id = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id) {
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $bookingModel->updateStatus((int)$booking_id, 'completed');

        header('Location: /safehands_mvc/caregiver/dashboard?msg=session_completed');
        exit;
    }

    /**
     * ==========================================
     * START SESSION OPERATION
     * ==========================================
     * Updates booking status to in_progress / active in the database.
     */
    public function startSession($booking_id = null): void
    {
        if (!$booking_id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Missing booking ID']);
                return;
            }
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $bookingModel->updateStatus((int)$booking_id, 'in_progress');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            return;
        }

        header('Location: /safehands_mvc/booking/details/' . (int)$booking_id);
        exit;
    }
}