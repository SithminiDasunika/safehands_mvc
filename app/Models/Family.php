<?php

class Family extends Model
{
    public function getDashboardData(): array
    {
        /*
         * Start session if it has not already started.
         */
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        /*
         * Get the currently logged-in family member.
         */
        $userId = (int) ($_SESSION['user_id'] ?? 0);

        /*
         * Default name.
         */
        $familyName = 'Family Member';

        /*
         * Get the actual family member name from users table.
         */
        if ($userId > 0) {

            $stmt = $this->db->prepare("
                SELECT full_name
                FROM users
                WHERE id = ?
                  AND role = 'family'
                LIMIT 1
            ");

            if ($stmt) {

                $stmt->bind_param(
                    "i",
                    $userId
                );

                $stmt->execute();

                $result = $stmt->get_result();

                $user = $result->fetch_assoc();

                if ($user && !empty($user['full_name'])) {
                    $familyName = $user['full_name'];
                }

                $stmt->close();
            }
        }

        $patients = [];
        $sessions = [];
        $stats = ['patients' => 0, 'upcoming' => 0, 'active' => 0, 'completed' => 0];

        if ($userId > 0) {
            $patientStmt = $this->db->prepare("
                SELECT p.patient_id, p.full_name, p.date_of_birth, p.medical_conditions, p.profile_photo,
                    CASE
                        WHEN EXISTS (
                            SELECT 1 FROM bookings b JOIN booking_sessions bs ON bs.booking_id = b.booking_id
                            WHERE b.patient_id = p.patient_id AND b.family_user_id = p.family_user_id
                              AND b.status <> 'cancelled' AND bs.status = 'in_progress'
                        ) THEN 'Care in progress'
                        WHEN EXISTS (
                            SELECT 1 FROM bookings b JOIN booking_sessions bs ON bs.booking_id = b.booking_id
                            WHERE b.patient_id = p.patient_id AND b.family_user_id = p.family_user_id
                              AND b.status <> 'cancelled' AND bs.status IN ('scheduled', 'otp_verified')
                              AND bs.service_date >= CURRENT_DATE()
                        ) THEN 'Upcoming care'
                        WHEN EXISTS (
                            SELECT 1 FROM bookings b JOIN booking_sessions bs ON bs.booking_id = b.booking_id
                            WHERE b.patient_id = p.patient_id AND b.family_user_id = p.family_user_id
                              AND bs.status = 'completed'
                        ) THEN 'Care completed'
                        ELSE 'No active care'
                    END AS care_status
                FROM patients p
                WHERE p.family_user_id = ?
                ORDER BY p.full_name ASC
            ");

            if ($patientStmt) {
                $patientStmt->bind_param('i', $userId);
                $patientStmt->execute();
                $rows = $patientStmt->get_result()->fetch_all(MYSQLI_ASSOC);
                $patientStmt->close();

                foreach ($rows as $row) {
                    $nameParts = preg_split('/\s+/', trim($row['full_name'] ?? ''), -1, PREG_SPLIT_NO_EMPTY);
                    $initials = '';
                    foreach (array_slice($nameParts, 0, 2) as $part) {
                        $initials .= mb_strtoupper(mb_substr($part, 0, 1));
                    }
                    $age = null;
                    if (!empty($row['date_of_birth']) && $row['date_of_birth'] !== '0000-00-00') {
                        try { $age = (new DateTimeImmutable($row['date_of_birth']))->diff(new DateTimeImmutable('today'))->y; }
                        catch (Throwable $e) { $age = null; }
                    }
                    $condition = trim((string)($row['medical_conditions'] ?? ''));
                    $patients[] = [
                        'patient_id' => (int)$row['patient_id'],
                        'initials' => $initials ?: 'P',
                        'name' => $row['full_name'] ?: 'Patient',
                        'age' => $age,
                        'condition' => $condition !== '' ? $condition : 'No condition listed',
                        'status' => $row['care_status'],
                        'image' => $row['profile_photo'] ?? ''
                    ];
                }
            }

            $sessionStmt = $this->db->prepare("
                SELECT bs.session_id, bs.booking_id, bs.service_date, bs.shift_type, bs.status,
                       b.patient_id, p.full_name AS patient_name,
                       u.full_name AS caregiver_name, u.phone AS caregiver_phone
                FROM booking_sessions bs
                JOIN bookings b ON b.booking_id = bs.booking_id
                JOIN patients p ON p.patient_id = b.patient_id
                JOIN caregiver_profiles cp ON cp.caregiver_id = b.caregiver_id
                JOIN users u ON u.id = cp.user_id
                WHERE b.family_user_id = ?
                  AND b.status <> 'cancelled'
                  AND bs.status IN ('scheduled', 'otp_verified', 'in_progress')
                  AND bs.service_date >= CURRENT_DATE()
                ORDER BY bs.service_date ASC,
                    FIELD(bs.shift_type, 'morning', 'afternoon', 'evening') ASC
                LIMIT 8
            ");

            if ($sessionStmt) {
                $sessionStmt->bind_param('i', $userId);
                $sessionStmt->execute();
                $sessionRows = $sessionStmt->get_result()->fetch_all(MYSQLI_ASSOC);
                $sessionStmt->close();

                $today = new DateTimeImmutable('today');
                $tomorrow = $today->modify('+1 day');
                foreach ($sessionRows as $row) {
                    $serviceDate = new DateTimeImmutable($row['service_date']);
                    $dateLabel = $serviceDate == $today ? 'Today' : ($serviceDate == $tomorrow ? 'Tomorrow' : 'Upcoming');
                    $sessions[] = [
                        'session_id' => (int)$row['session_id'],
                        'booking_id' => (int)$row['booking_id'],
                        'patient_id' => (int)$row['patient_id'],
                        'month' => $serviceDate->format('M'),
                        'day' => $serviceDate->format('d'),
                        'date_label' => $dateLabel,
                        'status' => $row['status'],
                        'status_label' => [
                            'scheduled' => 'Confirmed',
                            'otp_verified' => 'OTP verified',
                            'in_progress' => 'In progress'
                        ][$row['status']] ?? ucfirst($row['status']),
                        'shift' => ucfirst($row['shift_type']) . ' Shift',
                        'caregiver' => $row['caregiver_name'] ?: 'Caregiver',
                        'caregiver_phone' => $row['caregiver_phone'] ?? '',
                        'patient' => $row['patient_name'] ?: 'Patient'
                    ];
                }
            }

            $stats['patients'] = count($patients);
            $sessionStatsStmt = $this->db->prepare("
                SELECT
                    SUM(bs.status IN ('scheduled', 'otp_verified') AND bs.service_date >= CURRENT_DATE()) AS upcoming,
                    COUNT(DISTINCT CASE WHEN bs.status = 'in_progress' THEN b.booking_id END) AS active,
                    SUM(bs.status = 'completed') AS completed
                FROM booking_sessions bs
                JOIN bookings b ON b.booking_id = bs.booking_id
                WHERE b.family_user_id = ? AND b.status <> 'cancelled'
            ");
            if ($sessionStatsStmt) {
                $sessionStatsStmt->bind_param('i', $userId);
                $sessionStatsStmt->execute();
                $sessionStats = $sessionStatsStmt->get_result()->fetch_assoc() ?: [];
                $stats['upcoming'] = (int)($sessionStats['upcoming'] ?? 0);
                $stats['active'] = (int)($sessionStats['active'] ?? 0);
                $stats['completed'] = (int)($sessionStats['completed'] ?? 0);
                $sessionStatsStmt->close();
            }
        }

        /* Return dashboard data based on this family account's records. */
        return [

            /*
             * Dynamic family member name.
             */
            'name' => $familyName,

            /*
             * Dynamic current date.
             */
            'date' => date('d F Y'),

            'stats' => $stats,

            'patients' => $patients,

            'sessions' => $sessions
        ];
    }
}
