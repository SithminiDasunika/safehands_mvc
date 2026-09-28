<?php

class CareReportsController extends Controller
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

    public function index(?string $patientId = null): void
    {
        $userId = (int)$_SESSION['user_id'];

        $selectedPatient = null;
        $selectedPatientId = null;
        if ($patientId !== null) {
            $selectedPatientId = filter_var($patientId, FILTER_VALIDATE_INT);
            $patientModel = $this->model('PatientModel');
            $selectedPatient = $selectedPatientId
                ? $patientModel->getPatientForFamily((int)$selectedPatientId, $userId)
                : null;

            if (!$selectedPatient) {
                $this->redirect('/patient');
                return;
            }
        }

        $careReportModel = $this->model('CareReportModel');
        $rawReports = $careReportModel->getReportsByFamilyId($userId, $selectedPatientId);

        $reports = [];
        $summary = [
            'patient' => 'N/A',
            'patient_image' => 'https://via.placeholder.com/150',
            'caregiver' => 'Unassigned',
            'booking_id' => 'N/A',
            'status' => 'No reports yet'
        ];

        if (count($rawReports) > 0) {
            $latest = $rawReports[0];

            $summary = [
                'patient' => $latest['patient_name'],
                'patient_image' => $latest['patient_image'] ?? 'https://via.placeholder.com/150',
                'caregiver' => $latest['caregiver_name'],
                'booking_id' => 'BK-' . str_pad($latest['booking_id'], 4, '0', STR_PAD_LEFT),
                'status' => 'Completed'
            ];
            
            foreach ($rawReports as $r) {
                $reports[] = [
                    'id' => $r['id'],
                    'date' => date('d M Y', strtotime($r['created_at'])),
                    'shift' => 'Completed Shift',
                    'status' => $r['condition_status'] ?? 'Stable',
                    'status_type' => strtolower($r['condition_status'] ?? 'stable'),
                    'caregiver' => $r['caregiver_name'],
                    'image' => $r['caregiver_image'] ?? 'https://via.placeholder.com/150',
                    'description' => $r['shift_summary'] ?? 'No summary provided.',
                    'booking_id' => $r['booking_id']
                ];
            }
        } else {
            // If no reports exist yet, try to pull data from the most recent booking to avoid N/A
            $bookingModel = $this->model('BookingModel');
            $bookings = $bookingModel->getBookingsByFamilyId($userId);

            if ($selectedPatient) {
                $bookings = array_values(array_filter(
                    $bookings,
                    static fn(array $booking): bool => (int)$booking['patient_id'] === (int)$selectedPatientId
                ));
            }

            if ($selectedPatient) {
                $summary = [
                    'patient' => $selectedPatient['full_name'],
                    'patient_image' => $selectedPatient['profile_photo'] ?? 'https://via.placeholder.com/150',
                    'caregiver' => !empty($bookings) ? ($bookings[0]['caregiver_name'] ?? 'Unassigned') : 'Unassigned',
                    'booking_id' => !empty($bookings)
                        ? 'BK-' . str_pad($bookings[0]['booking_id'], 4, '0', STR_PAD_LEFT)
                        : 'N/A',
                    'status' => 'No reports yet'
                ];
            } elseif (!empty($bookings)) {
                $latestBooking = $bookings[0];

                $summary = [
                    'patient' => $latestBooking['patient_name'],
                    'patient_image' => $latestBooking['patient_image'] ?? 'https://via.placeholder.com/150',
                    'caregiver' => $latestBooking['caregiver_name'] ?? 'Unassigned',
                    'booking_id' => 'BK-' . str_pad($latestBooking['booking_id'], 4, '0', STR_PAD_LEFT),
                    'status' => 'No reports yet'
                ];
            }
        }

        $data = [
            'title' => ($selectedPatient ? $selectedPatient['full_name'] . ' — ' : '') . 'Daily Care Reports | SafeHands',
            'summary' => $summary,
            'reports' => $reports,
            'selected_patient' => $selectedPatient
        ];

        $this->view(
            'care-reports/index',
            $data,
            'care-reports'
        );
    }
}
