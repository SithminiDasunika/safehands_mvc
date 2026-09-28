<?php

class CareReportModel
{
    private $conn;

    /**
     * Initialize database connection
     */
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    /**
     * Create a new care report in the database
     *
     * @param array $data
     * @return int|null
     */
    public function createReport(array $data): ?int
    {
        $sessionId = $data['session_id'] ?? null;
        $stmt = $this->conn->prepare("
            INSERT INTO care_reports (
                report_ref,
                booking_id,
                session_id,
                caregiver_id,
                patient_id,
                shift_summary,
                encrypted_medical_notes,
                check_in_time,
                check_out_time
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "siiiissss",
            $data['report_ref'],
            $data['booking_id'],
            $sessionId,
            $data['caregiver_id'],
            $data['patient_id'],
            $data['shift_summary'],
            $data['encrypted_medical_notes'],
            $data['check_in_time'],
            $data['check_out_time']
        );

        if ($stmt->execute()) {
            $id = $this->conn->insert_id;
            $stmt->close();

            return $id;
        }

        $stmt->close();

        return null;
    }

    /**
     * Retrieve all care reports
     */
    public function getAllReports(): array
    {
        $sql = "
            SELECT
                cr.*,
                cg.full_name AS caregiver_name,
                cp.profile_photo AS caregiver_image,
                p.full_name AS patient_name,
                p.profile_photo AS patient_image
            FROM care_reports cr
            JOIN caregiver_profiles cp
                ON cr.caregiver_id = cp.user_id
            JOIN users cg
                ON cp.user_id = cg.id
            JOIN patients p
                ON cr.patient_id = p.patient_id
            ORDER BY cr.created_at DESC
        ";

        $result = $this->conn->query($sql);

        return $result
            ? $result->fetch_all(MYSQLI_ASSOC)
            : [];
    }

    /**
     * Fetch a specific care report by ID
     */
    public function getReportById(int $id): ?array
    {
        $stmt = $this->conn->prepare("
            SELECT
                cr.*,
                cg.full_name AS caregiver_name,
                cp.profile_photo AS caregiver_image,
                p.full_name AS patient_name,
                p.profile_photo AS patient_image
            FROM care_reports cr
            JOIN caregiver_profiles cp
                ON cr.caregiver_id = cp.user_id
            JOIN users cg
                ON cp.user_id = cg.id
            JOIN patients p
                ON cr.patient_id = p.patient_id
            WHERE cr.id = ?
        ");

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        $report = $result
            ? $result->fetch_assoc()
            : null;

        $stmt->close();

        return $report;
    }

    /**
     * Fetch a care report by booking ID
     */
    public function getReportByBookingId(int $bookingId): ?array
    {
        $stmt = $this->conn->prepare("
            SELECT
                cr.*,
                cg.full_name AS caregiver_name,
                cp.profile_photo AS caregiver_image,
                p.full_name AS patient_name,
                p.profile_photo AS patient_image
            FROM care_reports cr
            JOIN caregiver_profiles cp
                ON cr.caregiver_id = cp.user_id
            JOIN users cg
                ON cp.user_id = cg.id
            JOIN patients p
                ON cr.patient_id = p.patient_id
            WHERE cr.booking_id = ?
        ");

        $stmt->bind_param("i", $bookingId);
        $stmt->execute();

        $result = $stmt->get_result();

        $report = $result
            ? $result->fetch_assoc()
            : null;

        $stmt->close();

        return $report;
    }

    public function getReportBySessionId(int $sessionId): ?array
    {
        $stmt = $this->conn->prepare("SELECT cr.*, cg.full_name AS caregiver_name, cp.profile_photo AS caregiver_image,
                p.full_name AS patient_name, p.profile_photo AS patient_image
            FROM care_reports cr
            JOIN caregiver_profiles cp ON cr.caregiver_id = cp.user_id
            JOIN users cg ON cp.user_id = cg.id
            JOIN patients p ON cr.patient_id = p.patient_id
            WHERE cr.session_id = ? LIMIT 1");
        if (!$stmt) return null;
        $stmt->bind_param('i', $sessionId);
        $stmt->execute();
        $report = $stmt->get_result()->fetch_assoc() ?: null;
        $stmt->close();
        return $report;
    }

    /**
     * Update an existing care report
     */
    public function updateReport(int $id, array $data, ?int $sessionId = null, ?int $bookingId = null, ?int $caregiverId = null): bool
    {
        $scope = '';
        $types = 'sssssssssssssi';
        $params = [
            $data['shift_summary'], $data['encrypted_medical_notes'], $data['med_status'],
            $data['med_name'], $data['med_time'], $data['meal_breakfast'], $data['meal_water'],
            $data['condition_status'], $data['condition_mood'], $data['vitals_bp'],
            $data['vitals_temp'], $data['vitals_hr'], $data['activities'], $id
        ];
        if ($sessionId !== null) { $scope .= ' AND session_id = ?'; $types .= 'i'; $params[] = $sessionId; }
        if ($bookingId !== null) { $scope .= ' AND booking_id = ?'; $types .= 'i'; $params[] = $bookingId; }
        if ($caregiverId !== null) { $scope .= ' AND caregiver_id = ?'; $types .= 'i'; $params[] = $caregiverId; }
        $stmt = $this->conn->prepare("
            UPDATE care_reports
            SET
                shift_summary = ?,
                encrypted_medical_notes = ?,
                med_status = ?,
                med_name = ?,
                med_time = ?,
                meal_breakfast = ?,
                meal_water = ?,
                condition_status = ?,
                condition_mood = ?,
                vitals_bp = ?,
                vitals_temp = ?,
                vitals_hr = ?,
                activities = ?
            WHERE id = ?{$scope}
        ");
        if (!$stmt) return false;
        $bindValues = [$types];
        foreach ($params as &$param) $bindValues[] = &$param;
        unset($param);
        call_user_func_array([$stmt, 'bind_param'], $bindValues);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    /**
     * Delete report by booking ID
     */
    public function deleteReportByBookingId(int $bookingId): bool
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM care_reports WHERE booking_id = ?"
        );

        $stmt->bind_param("i", $bookingId);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    public function deleteReportBySessionId(int $sessionId, ?int $bookingId = null): bool
    {
        $sql = 'DELETE FROM care_reports WHERE session_id = ?';
        if ($bookingId !== null) $sql .= ' AND booking_id = ?';
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) return false;
        if ($bookingId !== null) $stmt->bind_param('ii', $sessionId, $bookingId);
        else $stmt->bind_param('i', $sessionId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    /**
     * Get reports belonging to a family member.
     *
     * IMPORTANT:
     * patient_image comes directly from patients.profile_photo.
     */
    public function getReportsByFamilyId(int $familyId, ?int $patientId = null): array
    {
        $patientFilter = $patientId !== null ? 'AND p.patient_id = ?' : '';
        $stmt = $this->conn->prepare("
            SELECT
                cr.*,

                cg.full_name AS caregiver_name,

                cp.profile_photo AS caregiver_image,

                p.full_name AS patient_name,

                p.profile_photo AS patient_image

            FROM care_reports cr

            JOIN caregiver_profiles cp
                ON cr.caregiver_id = cp.user_id

            JOIN users cg
                ON cp.user_id = cg.id

            JOIN patients p
                ON cr.patient_id = p.patient_id

            WHERE p.family_user_id = ?
            {$patientFilter}

            ORDER BY cr.created_at DESC
        ");

        if (!$stmt) {
            return [];
        }

        if ($patientId !== null) {
            $stmt->bind_param('ii', $familyId, $patientId);
        } else {
            $stmt->bind_param('i', $familyId);
        }

        if (!$stmt->execute()) {
            $stmt->close();

            return [];
        }

        $result = $stmt->get_result();

        $reports = $result
            ? $result->fetch_all(MYSQLI_ASSOC)
            : [];

        $stmt->close();

        return $reports;
    }

    /**
     * Update report status
     */
    public function updateStatus(int $id, string $status): bool
    {
        $stmt = $this->conn->prepare(
            "UPDATE care_reports SET status = ? WHERE id = ?"
        );

        $stmt->bind_param(
            "si",
            $status,
            $id
        );

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    /**
     * Delete a care report
     */
    public function deleteReport(int $id): bool
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM care_reports WHERE id = ?"
        );

        $stmt->bind_param("i", $id);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }
}
