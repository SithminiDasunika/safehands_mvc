<?php

class CareReportController extends Controller
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

    public function index($booking_id = null, $session_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $reportModel = $this->model('CareReportModel');
        $dbReport = $session_id !== null
            ? $reportModel->getReportBySessionId((int)$session_id)
            : $reportModel->getReportByBookingId((int)$booking_id);

        if (!$dbReport) {
            echo "Care report not submitted yet.";
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);
        if (!$booking || (int)$dbReport['booking_id'] !== (int)$booking_id) {
            http_response_code(404);
            echo 'Care report not found.';
            exit;
        }
        if (($_SESSION['user_role'] ?? '') === 'family' && (int)$booking['family_user_id'] !== (int)$_SESSION['user_id']) {
            http_response_code(403);
            echo 'Unauthorized.';
            exit;
        }
        if (($_SESSION['user_role'] ?? '') === 'caregiver') {
            $caregiverProfile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
            if (!$caregiverProfile || (int)$caregiverProfile['id'] !== (int)$booking['caregiver_id']) {
                http_response_code(403);
                echo 'Unauthorized.';
                exit;
            }
        }

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById((int)$dbReport['patient_id']);

        $caregiverModel = $this->model('Caregiver');
        $cgData = $caregiverModel->getById((int)$booking['caregiver_id']); // using caregiver_profiles id
        $session = $session_id !== null ? $bookingModel->getSessionById((int)$session_id, (int)$booking_id) : null;

        $medicalNotes = json_decode(base64_decode($dbReport['encrypted_medical_notes']), true) ?: [];

        // Check DB columns first, fallback to JSON
        $med_status = $dbReport['med_status'] ?? $medicalNotes['medication']['status'] ?? 'Yes';
        $med_name = $dbReport['med_name'] ?? $medicalNotes['medication']['name'] ?? 'Unknown';
        $med_time = $dbReport['med_time'] ?? $medicalNotes['medication']['time'] ?? '08:00 AM';
        $meal_breakfast = $dbReport['meal_breakfast'] ?? $medicalNotes['meal']['breakfast'] ?? 'Completed';
        $meal_water = $dbReport['meal_water'] ?? $medicalNotes['meal']['water'] ?? 'Adequate';
        $condition_status = $dbReport['condition_status'] ?? $medicalNotes['condition']['status'] ?? 'Stable';
        $condition_mood = $dbReport['condition_mood'] ?? $medicalNotes['condition']['mood'] ?? 'Calm';
        $vitals_bp = $dbReport['vitals_bp'] ?? $medicalNotes['vitals']['bp'] ?? '120/80';
        $vitals_temp = $dbReport['vitals_temp'] ?? $medicalNotes['vitals']['temp'] ?? '98.4';
        $vitals_hr = $dbReport['vitals_hr'] ?? $medicalNotes['vitals']['hr'] ?? '72';
        
        $activities = [];
        if (!empty($dbReport['activities'])) {
            $activities = json_decode($dbReport['activities'], true) ?: [];
        } else {
            $activities = $medicalNotes['activities'] ?? [];
        }

        foreach ($activities as &$act) {
            if (!isset($act['status'])) {
                $act['status'] = !empty($act['completed']) ? 'Completed' : 'Pending';
            }
        }

        $report = [
            'status' => $dbReport['status'] ?? 'Submitted',
            'reference' => $dbReport['report_ref'] ?? 'CR-Unknown',
            'submitted_at' => date('d M Y, h:i A', strtotime($dbReport['check_out_time'] ?? 'now')),
            'date' => $session ? date('d M Y', strtotime($session['service_date'])) : date('d M Y', strtotime($dbReport['check_in_time'] ?? 'now')),
            'shift' => $session ? ucfirst($session['shift_type']) . ' Shift' : 'Day Shift',
            'time' => '08:00 AM - 08:00 PM',
            'notes' => $dbReport['shift_summary'] ?? 'No notes provided.',
            'attachments' => [],
            'shift_summary' => $dbReport['shift_summary'] ?? '',
            'check_in' => $dbReport['check_in_time'] ?? '',
            'check_out' => $dbReport['check_out_time'] ?? '',
            'patient' => [
                'name' => $patientData['full_name'] ?? $dbReport['patient_name'] ?? 'Patient',
                'patient_id' => 'PID-' . str_pad($dbReport['patient_id'], 4, '0', STR_PAD_LEFT),
                'booking_id' => 'BKG-' . str_pad($booking_id, 4, '0', STR_PAD_LEFT),
                'session_id' => $session ? (int)$session['session_id'] : null,
                'image' => !empty($patientData['profile_photo'])
                    ? $patientData['profile_photo']
                    : (!empty($dbReport['patient_image']) ? $dbReport['patient_image'] : '')
            ],
            'caregiver' => [
                'name' => $cgData['name'] ?? $dbReport['caregiver_name'] ?? 'Caregiver',
                'qualified_name' => ($cgData['name'] ?? $dbReport['caregiver_name'] ?? 'Caregiver') . ', ' . ($cgData['education'] ?? 'RN'),
                'id' => 'CG-' . str_pad($cgData['id'] ?? $dbReport['caregiver_id'], 4, '0', STR_PAD_LEFT),
                'registration' => 'SLMC-' . rand(10000, 99999),
                'image' => !empty($cgData['image']) ? $cgData['image'] : ''
            ],
            'medication' => [
                'status' => $med_status,
                'name' => $med_name,
                'time' => $med_time,
                'administration_status' => 'Taken',
                'note' => 'No adverse reactions.'
            ],
            'meal' => [
                'breakfast' => $meal_breakfast,
                'water' => $meal_water,
                'note' => 'Patient had a good appetite.'
            ],
            'condition' => [
                'overall' => $condition_status,
                'mood' => $condition_mood,
                'note' => 'Rested well after lunch.'
            ],
            'vitals' => [
                'recorded_at' => '10:00 AM',
                'blood_pressure' => [
                    'value' => $vitals_bp,
                    'unit' => 'mmHg',
                    'status' => 'Normal'
                ],
                'temperature' => [
                    'value' => $vitals_temp,
                    'unit' => '°F',
                    'status' => 'Normal'
                ],
                'heart_rate' => [
                    'value' => $vitals_hr,
                    'unit' => 'bpm',
                    'status' => 'Normal'
                ]
            ],
            'activities' => $activities
        ];

        $data = [
            'title' => 'Daily Care Report | SafeHands',
            'report' => $report,
            'db_report' => $dbReport
        ];

        $this->view('care-report/index', $data, 'care-report');
    }

    
    public function show($report_id = null): void
    {
        if (!$report_id) {
            header("Location: /safehands_mvc/bookings");
            exit;
        }

        $reportModel = $this->model("CareReportModel");
        $dbReport = $reportModel->getReportById((int)$report_id);

        if (!$dbReport) {
            echo "Care report not found.";
            exit;
        }
        
        $booking_id = $dbReport["booking_id"];

        $bookingModel = $this->model("BookingModel");
        $booking = $bookingModel->getBookingById((int)$booking_id);
        if (!$booking) {
            http_response_code(404);
            echo 'Booking not found.';
            exit;
        }
        if (($_SESSION['user_role'] ?? '') === 'family' && (int)$booking['family_user_id'] !== (int)$_SESSION['user_id']) {
            http_response_code(403);
            echo 'Unauthorized.';
            exit;
        }
        if (($_SESSION['user_role'] ?? '') === 'caregiver') {
            $profile = $this->model('Caregiver')->getByUserId((int)$_SESSION['user_id']);
            if (!$profile || (int)$profile['id'] !== (int)$booking['caregiver_id']) {
                http_response_code(403);
                echo 'Unauthorized.';
                exit;
            }
        }
        $session = !empty($dbReport['session_id'])
            ? $bookingModel->getSessionById((int)$dbReport['session_id'], (int)$booking_id)
            : null;

        $patientModel = $this->model("PatientModel");
        $patientData = $patientModel->getPatientById((int)$dbReport["patient_id"]);

        $caregiverModel = $this->model("Caregiver");
        $cgData = $caregiverModel->getById((int)$booking["caregiver_id"]); // using caregiver_profiles id

        $medicalNotes = json_decode(base64_decode($dbReport["encrypted_medical_notes"]), true) ?: [];

        // Check DB columns first, fallback to JSON
        $med_status = $dbReport["med_status"] ?? $medicalNotes["medication"]["status"] ?? "Yes";
        $med_name = $dbReport["med_name"] ?? $medicalNotes["medication"]["name"] ?? "Unknown";
        $med_time = $dbReport["med_time"] ?? $medicalNotes["medication"]["time"] ?? "08:00 AM";
        $meal_breakfast = $dbReport["meal_breakfast"] ?? $medicalNotes["meal"]["breakfast"] ?? "Completed";
        $meal_water = $dbReport["meal_water"] ?? $medicalNotes["meal"]["water"] ?? "Adequate";
        $condition_status = $dbReport["condition_status"] ?? $medicalNotes["condition"]["status"] ?? "Stable";
        $condition_mood = $dbReport["condition_mood"] ?? $medicalNotes["condition"]["mood"] ?? "Calm";
        $vitals_bp = $dbReport["vitals_bp"] ?? $medicalNotes["vitals"]["bp"] ?? "120/80";
        $vitals_temp = $dbReport["vitals_temp"] ?? $medicalNotes["vitals"]["temp"] ?? "98.4";
        $vitals_hr = $dbReport["vitals_hr"] ?? $medicalNotes["vitals"]["hr"] ?? "72";
        
        $activities = [];
        if (!empty($dbReport["activities"])) {
            $activities = json_decode($dbReport["activities"], true) ?: [];
        } else {
            $activities = $medicalNotes["activities"] ?? [];
        }

        foreach ($activities as &$act) {
            if (!isset($act["status"])) {
                $act["status"] = !empty($act["completed"]) ? "Completed" : "Pending";
            }
        }

        $report = [
            "status" => $dbReport["status"] ?? "Submitted",
            "reference" => $dbReport["report_ref"] ?? "CR-Unknown",
            "submitted_at" => date("d M Y, h:i A", strtotime($dbReport["check_out_time"] ?? "now")),
            "date" => $session ? date("d M Y", strtotime($session['service_date'])) : date("d M Y", strtotime($dbReport["check_in_time"] ?? "now")),
            "shift" => $session ? ucfirst($session['shift_type']) . ' Shift' : "Day Shift",
            "time" => "08:00 AM - 08:00 PM",
            "notes" => $dbReport["shift_summary"] ?? "No notes provided.",
            "attachments" => [],
            "shift_summary" => $dbReport["shift_summary"] ?? "",
            "check_in" => $dbReport["check_in_time"] ?? "",
            "check_out" => $dbReport["check_out_time"] ?? "",
            "patient" => [
                "name" => $patientData["full_name"] ?? $dbReport["patient_name"] ?? "Patient",
                "patient_id" => "PID-" . str_pad($dbReport["patient_id"], 4, "0", STR_PAD_LEFT),
                "booking_id" => "BKG-" . str_pad($booking_id, 4, "0", STR_PAD_LEFT),
                "session_id" => $session ? (int)$session['session_id'] : null,
                "image" => "/safehands_mvc/public/assets/images/patient.jpg"
            ],
            "caregiver" => [
                "name" => $cgData["name"] ?? $dbReport["caregiver_name"] ?? "Caregiver",
                "qualified_name" => ($cgData["name"] ?? $dbReport["caregiver_name"] ?? "Caregiver") . ", " . ($cgData["education"] ?? "RN"),
                "id" => "CG-" . str_pad($cgData["id"] ?? $dbReport["caregiver_id"], 4, "0", STR_PAD_LEFT),
                "registration" => "SLMC-" . rand(10000, 99999),
                "image" => $cgData["image"] ?? "/safehands_mvc/public/assets/images/caregiver-1.jpg"
            ],
            "medication" => [
                "status" => $med_status,
                "name" => $med_name,
                "time" => $med_time,
                "administration_status" => "Taken",
                "note" => "No adverse reactions."
            ],
            "meal" => [
                "breakfast" => $meal_breakfast,
                "water" => $meal_water,
                "note" => "Patient had a good appetite."
            ],
            "condition" => [
                "overall" => $condition_status,
                "mood" => $condition_mood,
                "note" => "Rested well after lunch."
            ],
            "vitals" => [
                "recorded_at" => "10:00 AM",
                "blood_pressure" => [
                    "value" => $vitals_bp,
                    "unit" => "mmHg",
                    "status" => "Normal"
                ],
                "temperature" => [
                    "value" => $vitals_temp,
                    "unit" => "°F",
                    "status" => "Normal"
                ],
                "heart_rate" => [
                    "value" => $vitals_hr,
                    "unit" => "bpm",
                    "status" => "Normal"
                ]
            ],
            "activities" => $activities
        ];

        $data = [
            "title" => "Daily Care Report | SafeHands",
            "report" => $report,
            "db_report" => $dbReport
        ];

        $this->view("care-report/index", $data, "care-report");
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['booking_id'] ?? null;
            $shiftSummary = $_POST['shift_summary'] ?? '';
            $medicalNotes = $_POST['medical_notes'] ?? ''; // will be encrypted
            
            // Dummy encryption for demonstration
            $encryptedNotes = base64_encode($medicalNotes);

            if ($bookingId && ($_SESSION['user_role'] ?? '') === 'caregiver') {
                $bookingModel = $this->model('BookingModel');
                $booking = $bookingModel->getBookingById((int)$bookingId);
                $caregiverModel = $this->model('Caregiver');
                $profile = $caregiverModel->getByUserId((int)$_SESSION['user_id']);

                if (!$booking || !$profile || (int)$profile['id'] !== (int)$booking['caregiver_id']) {
                    http_response_code(403);
                    echo 'This booking is not available for reporting.';
                    exit;
                }

                $caregiverUserId = (int)$profile['user_id'];
                $patientId = (int)$booking['patient_id'];
                $reportRef = 'CR-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

                $reportModel = $this->model('CareReportModel');
                $reportModel->createReport([
                    'report_ref' => $reportRef,
                    'booking_id' => (int)$bookingId,
                    'caregiver_id' => $caregiverUserId,
                    'patient_id' => (int)$patientId,
                    'shift_summary' => $shiftSummary,
                    'encrypted_medical_notes' => $encryptedNotes,
                    'check_in_time' => date('Y-m-d H:i:s', strtotime('-8 hours')), // dummy shift
                    'check_out_time' => date('Y-m-d H:i:s')
                ]);
                
                header('Location: /safehands_mvc/bookings?report=success');
                exit;
            }
        }
        
        header('Location: /safehands_mvc/bookings');
        exit;
    }
}
