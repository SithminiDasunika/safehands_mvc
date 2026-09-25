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
        if (!$booking_id || ($_SESSION['user_role'] ?? '') !== 'caregiver') {
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $bookingModel->updateStatus((int)$booking_id, 'completed');

        header('Location: /safehands_mvc/booking/report/' . (int)$booking_id . '?success=1');
        exit;
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
}
