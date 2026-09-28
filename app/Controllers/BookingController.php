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
    public function details($booking_id = null, $session_id = null): void
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
        $selectedSession = $session_id !== null
            ? $bookingModel->getSessionById((int)$session_id, (int)$booking_id)
            : ($booking['sessions'][0] ?? null);
        if ($session_id !== null && !$selectedSession) {
            echo 'Care session not found.';
            return;
        }
        $booking['selected_session'] = $selectedSession;
        $booking['parent_status'] = strtolower(trim((string)($booking['status'] ?? 'pending')));
        if ($selectedSession) {
            if ($booking['parent_status'] !== 'cancelled') {
                $booking['status'] = strtolower(trim((string)$selectedSession['status']));
            }
            $booking['service_date'] = $selectedSession['service_date'];
            $booking['service_time'] = ucfirst(str_replace('_', ' ', (string)$selectedSession['shift_type']));
        }

        $role = $_SESSION['user_role'] ?? 'family';
        $userId = (int)$_SESSION['user_id'];
        $caregiverData = null;

        if ($role === 'family' && (int)$booking['family_user_id'] !== $userId) {
            http_response_code(403);
            echo 'Unauthorized.';
            return;
        }

        if ($role === 'caregiver') {
            $caregiverModel = $this->model('Caregiver');
            $caregiverProfile = $caregiverModel->getByUserId($userId);
            if (!$caregiverProfile || $caregiverProfile['id'] != $booking['caregiver_id']) {
                echo "Unauthorized.";
                return;
            }
            $caregiverData = $caregiverProfile;
        }

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById($booking['patient_id']);
        if ($role === 'family') {
            $caregiverData = $this->model('Caregiver')->getById((int)$booking['caregiver_id']) ?? [];
        }
        $sessions = $booking['sessions'] ?? [];
        $canCancel = $role === 'family'
            && $booking['parent_status'] === 'pending'
            && !empty($sessions)
            && count(array_filter($sessions, static fn(array $session): bool => strtolower(trim((string)($session['status'] ?? ''))) !== 'scheduled')) === 0;
        $reportModel = $this->model('CareReportModel');
        $sessionReports = [];
        foreach (($booking['sessions'] ?? []) as $sessionRow) {
            if ($reportModel->getReportBySessionId((int)$sessionRow['session_id'])) {
                $sessionReports[(int)$sessionRow['session_id']] = true;
            }
        }

        $data = [
            'title' => 'Booking Details | SafeHands',
            'booking' => $booking,
            'can_cancel' => $canCancel,
            'session_reports' => $sessionReports,
            'patient' => [
                'name' => $patientData['full_name'] ?? 'Patient',
                'image' => !empty($patientData['profile_photo']) ? $patientData['profile_photo'] : '',
                'address' => $patientData['address'] ?? '',
                'care_notes' => $patientData['special_care_requirements'] ?? ''
            ],
            'caregiver' => $caregiverData ?? []
        ];

        if ($role === 'caregiver') {
            $this->view('booking/caregiver-details', $data, '');
        } else {
            $this->view('booking/details', $data, '');
        }
    }

    public function report($booking_id = null, $session_id = null): void
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
        if (($_SESSION['user_role'] ?? '') !== 'caregiver') {
            http_response_code(403);
            echo 'Only the assigned caregiver can submit this report.';
            return;
        }

        $session = $session_id !== null
            ? $bookingModel->getSessionById((int)$session_id, (int)$booking_id)
            : ($booking['sessions'][0] ?? null);
        if (!$session) {
            echo 'Care session not found.';
            return;
        }
        if ($session_id === null) {
            header('Location: /safehands_mvc/booking/report/' . (int)$booking_id . '/' . (int)$session['session_id']);
            exit;
        }
        if (($_SESSION['user_role'] ?? '') === 'caregiver') {
            $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
            if (!$profile || (int)$profile['id'] !== (int)$booking['caregiver_id']) {
                http_response_code(403);
                echo 'Unauthorized.';
                return;
            }
        }
        if (strtolower($session['status']) !== 'completed') {
            echo 'A report can be submitted after this care session is completed.';
            return;
        }
        $existingReport = $this->model('CareReportModel')->getReportBySessionId((int)$session['session_id']);

        $existingData = null;
        if ($existingReport) {
            $decodedNotes = base64_decode((string)($existingReport['encrypted_medical_notes'] ?? ''), true);
            $existingData = is_string($decodedNotes) ? json_decode($decodedNotes, true) : null;
            if (!is_array($existingData)) {
                $existingData = json_decode((string)($existingReport['encrypted_medical_notes'] ?? ''), true);
            }
            if (!is_array($existingData)) $existingData = [];
            $existingData['activities'] = json_decode((string)($existingReport['activities'] ?? ''), true)
                ?: ($existingData['activities'] ?? []);
            $existingData['medication'] = array_merge([
                'status' => $existingReport['med_status'] ?? '',
                'name' => $existingReport['med_name'] ?? '',
                'time' => $existingReport['med_time'] ?? '',
            ], $existingData['medication'] ?? []);
            $existingData['meal'] = array_merge([
                'breakfast' => $existingReport['meal_breakfast'] ?? '',
                'water' => $existingReport['meal_water'] ?? '',
            ], $existingData['meal'] ?? []);
            $existingData['condition'] = array_merge([
                'status' => $existingReport['condition_status'] ?? '',
                'mood' => $existingReport['condition_mood'] ?? '',
            ], $existingData['condition'] ?? []);
            $existingData['vitals'] = array_merge([
                'bp' => $existingReport['vitals_bp'] ?? '',
                'temp' => $existingReport['vitals_temp'] ?? '',
                'hr' => $existingReport['vitals_hr'] ?? '',
            ], $existingData['vitals'] ?? []);
            $existingData['shift_summary'] = $existingReport['shift_summary'] ?? '';
        }

        $caregiverModel = $this->model('Caregiver');
        $caregiver = $caregiverModel->getById($booking['caregiver_id']);

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById($booking['patient_id']);

        $data = [
            'title' => 'Submit Daily Care Report | SafeHands',
            'booking' => [
                'id' => $booking['booking_id'],
                'service_date' => $session['service_date'],
                'service_time' => ucfirst($session['shift_type']),
                'session_id' => (int)$session['session_id'],
                'status' => $session['status'],
            ],
            'session' => $session,
            'existing_report' => $existingReport,
            'existingData' => $existingData,
            'patient' => [
                'name' => $patientData['full_name'] ?? 'Patient',
                'image' => !empty($patientData['profile_photo']) ? $patientData['profile_photo'] : ''
            ],
            'caregiver' => [
                'image' => !empty($caregiver['image']) ? $caregiver['image'] : ''
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
    public function verifyOtp($booking_id = null, $session_id = null): void
    {
        header('Content-Type: application/json');
        error_reporting(0);
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id || !$session_id) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $otp = $_POST['otp'] ?? '';
        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);
        $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
        if (!$booking || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id'] || !$bookingModel->getSessionById((int)$session_id, (int)$booking_id)) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }
        
        if ($bookingModel->verifyOtp((int)$booking_id, (int)$session_id, $otp)) {
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
    public function submitReport($booking_id = null, $session_id = null): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id || !$session_id) {
                header('Location: /safehands_mvc/bookings');
                exit;
            }

            $bookingModel = $this->model('BookingModel');
            $booking = $bookingModel->getBookingById((int)$booking_id);
            if (!$booking) {
                echo 'Booking not found.';
                exit;
            }
            $session = $bookingModel->getSessionById((int)$session_id, (int)$booking_id);
            $caregiverModel = $this->model('Caregiver');
            $profile = $caregiverModel->getByUserId((int)$_SESSION['user_id']);
            if (!$session || strtolower($session['status']) !== 'completed' || ($_SESSION['user_role'] ?? '') !== 'caregiver' || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id']) {
                http_response_code(403);
                echo 'This session is not available for reporting.';
                exit;
            }

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

            $realCaregiverUserId = (int)$profile['user_id'];

            $reportModel = $this->model('CareReportModel');
            $existingReport = $reportModel->getReportBySessionId((int)$session_id);
            
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
                $saved = $reportModel->updateReport(
                    (int)$existingReport['id'], $dbData, (int)$session_id,
                    (int)$booking_id, (int)$realCaregiverUserId
                );
            } else {
                $dbData['report_ref'] = 'CR-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                $dbData['booking_id'] = (int)$booking_id;
                $dbData['session_id'] = (int)$session_id;
                // care_reports.caregiver_id references users.id. Booking rows
                // store caregiver_profiles.caregiver_id, so use the mapped user ID.
                $dbData['caregiver_id'] = (int)$realCaregiverUserId;
                $dbData['patient_id'] = (int)$booking['patient_id'];
                $dbData['check_in_time'] = date('Y-m-d H:i:s', strtotime('-8 hours'));
                $dbData['check_out_time'] = date('Y-m-d H:i:s');
                $saved = $reportModel->createReport($dbData);
            }

            if (!$saved) {
                header('Location: /safehands_mvc/booking/report/' . (int)$booking_id . '/' . (int)$session_id . '?error=save_failed');
                exit;
            }

            header('Location: /safehands_mvc/care-report/index/' . (int)$booking_id . '/' . (int)$session_id);
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id || ($_SESSION['user_role'] ?? '') !== 'family') {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $cancelled = $bookingModel->cancelPendingBookingForFamily((int)$booking_id, (int)$_SESSION['user_id']);

        header('Location: /safehands_mvc/booking/details/' . (int)$booking_id . '?cancelled=' . ($cancelled ? '1' : '0'));
        exit;
    }
    public function deleteReport($booking_id = null, $session_id = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id || !$session_id || ($_SESSION['user_role'] ?? '') !== 'caregiver') {
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }
        
        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);
        $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
        if (!$booking || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id'] || !$session_id || !$bookingModel->getSessionById((int)$session_id, (int)$booking_id)) {
            http_response_code(403);
            echo 'Unauthorized.';
            return;
        }
        $reportModel = $this->model('CareReportModel');
        $report = $reportModel->getReportBySessionId((int)$session_id);
        if (!$report || (int)$report['booking_id'] !== (int)$booking_id || !$reportModel->deleteReportBySessionId((int)$session_id, (int)$booking_id)) {
            header('Location: /safehands_mvc/care-report/index/' . (int)$booking_id . '/' . (int)$session_id . '?error=delete_failed');
            exit;
        }
        
        header('Location: /safehands_mvc/bookings/pendingReports?msg=report_deleted');
        exit;
    }

    /**
     * ==========================================
     * END SESSION OPERATION
     * ==========================================
     * Marks the booking session as completed in the database.
     */
    public function endSession($booking_id = null, $session_id = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$booking_id || !$session_id) {
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);
        $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
        if (!$booking || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id'] || !$bookingModel->updateSessionStatus((int)$session_id, (int)$booking_id, 'completed')) {
            http_response_code(403);
            echo 'Unable to complete this care session.';
            return;
        }

        header('Location: /safehands_mvc/caregiver/dashboard?msg=session_completed');
        exit;
    }

    /**
     * ==========================================
     * START SESSION OPERATION
     * ==========================================
     * Updates booking status to in_progress / active in the database.
     */
    public function startSession($booking_id = null, $session_id = null): void
    {
        if (!$booking_id || !$session_id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Missing booking ID']);
                return;
            }
            header('Location: /safehands_mvc/caregiver/dashboard');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);
        $session = $bookingModel->getSessionById((int)$session_id, (int)$booking_id);
        $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
        if (!$booking || !$session || $session['status'] !== 'otp_verified' || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id'] || !$bookingModel->updateSessionStatus((int)$session_id, (int)$booking_id, 'in_progress')) {
            http_response_code(403);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Unable to start this session']);
            } else {
                echo 'Unable to start this session.';
            }
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            return;
        }

        header('Location: /safehands_mvc/booking/details/' . (int)$booking_id);
        exit;
    }
}
