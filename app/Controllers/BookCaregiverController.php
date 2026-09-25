<?php

class BookCaregiverController extends Controller
{
    /*
     * /book-caregiver/index/{caregiver_id}
     *
     * Book Caregiver page
     */
    public function index($caregiver_id = null): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Require family login
        if (!isset($_SESSION['family_logged_in']) || $_SESSION['family_logged_in'] !== true) {
            header('Location: /safehands_mvc/login');
            exit;
        }

        if (!$caregiver_id) {
            header('Location: /safehands_mvc/caregiver');
            exit;
        }

        $caregiverModel = $this->model('Caregiver');
        $caregiver = $caregiverModel->getById((int)$caregiver_id);

        if (!$caregiver) {
            http_response_code(404);
            echo 'Caregiver not found.';
            return;
        }

        $patientModel = $this->model('PatientModel');
        $familyUserId = (int)$_SESSION['user_id'];
        $patients = $patientModel->getPatientsByFamilyUserId($familyUserId);

        $data = [
            'title' => 'Book Caregiver | SafeHands Premium Care',
            'caregiver' => $caregiver,
            'patients' => $patients
        ];

        // Load the view without the standard layout
        $this->view('book-caregiver/index', $data, '');
    }

    /**
     * ==========================================
     * CREATE OPERATION
     * ==========================================
     * Processes form data and creates a new booking record.
     */
    public function store($caregiver_id = null): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['family_logged_in']) || $_SESSION['family_logged_in'] !== true) {
            header('Location: /safehands_mvc/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $caregiver_id) {
            $patientId = (int)$_POST['patient_id'];
            $sessions = $_POST['sessions'] ?? [];
            
            // Validate
            if (empty($patientId) || empty($sessions)) {
                echo "Please fill all required fields.";
                return;
            }

            // Calculate total amount based on caregiver rate and shifts
            $caregiverModel = $this->model('Caregiver');
            $caregiver = $caregiverModel->getById((int)$caregiver_id);
            $dailyRate = $caregiver['daily_rate'] ?? 2000;
            
            $shiftCount = 0;
            foreach ($sessions as $session) {
                if (isset($session['shifts']) && is_array($session['shifts'])) {
                    $shiftCount += count($session['shifts']);
                }
            }
            
            $platformFee = 300;
            $totalAmount = ($shiftCount * $dailyRate) + $platformFee;

            $bookingModel = $this->model('BookingModel');
            $familyUserId = (int)$_SESSION['user_id'];
            
            $bookingId = $bookingModel->createBooking($familyUserId, $patientId, (int)$caregiver_id, $totalAmount, $sessions);

            if ($bookingId) {
                // Redirect to payment
                header('Location: /safehands_mvc/payment/checkout/' . $bookingId);
                exit;
            } else {
                echo "Error saving booking.";
            }
        }
    }
}
