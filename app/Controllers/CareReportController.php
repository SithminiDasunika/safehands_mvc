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

    public function index($booking_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $reportModel = $this->model('CareReportModel');
        $dbReport = $reportModel->getReportByBookingId((int)$booking_id);

        if (!$dbReport) {
            echo "Care report not submitted yet.";
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);

        $patientModel = $this->model('PatientModel');
        $patientData = $patientModel->getPatientById((int)$dbReport['patient_id']);

        $caregiverModel = $this->model('Caregiver');
        $cgData = $caregiverModel->getById((int)$booking['caregiver_id']); // using caregiver_profiles id

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
            'date' => date('d M Y', strtotime($dbReport['check_in_time'] ?? 'now')),
            'shift' => 'Day Shift',
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
                'image' => '/safehands_mvc/public/assets/images/patient.jpg'
            ],
            'caregiver' => [
                'name' => $cgData['name'] ?? $dbReport['caregiver_name'] ?? 'Caregiver',
                'qualified_name' => ($cgData['name'] ?? $dbReport['caregiver_name'] ?? 'Caregiver') . ', ' . ($cgData['education'] ?? 'RN'),
                'id' => 'CG-' . str_pad($cgData['id'] ?? $dbReport['caregiver_id'], 4, '0', STR_PAD_LEFT),
                'registration' => 'SLMC-' . rand(10000, 99999),
                'image' => $cgData['image'] ?? '/safehands_mvc/public/assets/images/caregiver-1.jpg'
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
            "date" => date("d M Y", strtotime($dbReport["check_in_time"] ?? "now")),
            "shift" => "Day Shift",
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
            $caregiverId = $_POST['caregiver_id'] ?? null;
            $patientId = $_POST['patient_id'] ?? null;
            $shiftSummary = $_POST['shift_summary'] ?? '';
            $medicalNotes = $_POST['medical_notes'] ?? ''; // will be encrypted
            
            // Dummy encryption for demonstration
            $encryptedNotes = base64_encode($medicalNotes);

            if ($bookingId && $caregiverId && $patientId) {
                $reportRef = 'CR-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

                $reportModel = $this->model('CareReportModel');
                $reportModel->createReport([
                    'report_ref' => $reportRef,
                    'booking_id' => (int)$bookingId,
                    'caregiver_id' => (int)$caregiverId,
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
