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
     * @param array $data Contains report_ref, booking_id, caregiver_id, patient_id, shift_summary, etc.
     * @return int|null Returns the newly created report ID or null on failure
     */
    public function createReport(array $data): ?int
    {
        $stmt = $this->conn->prepare("
            INSERT INTO care_reports (report_ref, booking_id, caregiver_id, patient_id, shift_summary, encrypted_medical_notes, check_in_time, check_out_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("siiissss", 
            $data['report_ref'], 
            $data['booking_id'], 
            $data['caregiver_id'], 
            $data['patient_id'], 
            $data['shift_summary'],
            $data['encrypted_medical_notes'],
            $data['check_in_time'],
            $data['check_out_time']
        );
        
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        }
        return null;
    }

    /**
     * Retrieve all care reports from the database
     * Joins with users and patients tables to get actual names
     *
     * @return array List of care reports
     */
    public function getAllReports()
    {
        $sql = "
            SELECT cr.*, cg.full_name as caregiver_name, p.full_name as patient_name
            FROM care_reports cr
            JOIN users cg ON cr.caregiver_id = cg.id
            JOIN patients p ON cr.patient_id = p.patient_id
            ORDER BY cr.created_at DESC
        ";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    /**
     * Fetch a specific care report by its ID
     *
     * @param int $id The primary key of the care report
     * @return array|null Returns the report data or null if not found
     */
    public function getReportById(int $id)
    {
        $stmt = $this->conn->prepare("
            SELECT cr.*, cg.full_name as caregiver_name, p.full_name as patient_name
            FROM care_reports cr
            JOIN users cg ON cr.caregiver_id = cg.id
            JOIN patients p ON cr.patient_id = p.patient_id
            WHERE cr.id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    /**
     * Update the lifecycle status of a care report
     *
     * @param int $id The report ID
     * @param string $status New status (e.g., 'Submitted', 'Acknowledged', 'Archived')
     * @return bool True on success, false on failure
     */
    public function getReportByBookingId(int $bookingId)
    {
        $stmt = $this->conn->prepare("
            SELECT cr.*, cg.full_name as caregiver_name, p.full_name as patient_name
            FROM care_reports cr
            JOIN users cg ON cr.caregiver_id = cg.id
            JOIN patients p ON cr.patient_id = p.patient_id
            WHERE cr.booking_id = ?
        ");
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function updateReport(int $id, array $data): bool
    {
        $stmt = $this->conn->prepare("
            UPDATE care_reports 
            SET shift_summary = ?, encrypted_medical_notes = ?, med_status = ?, med_name = ?, med_time = ?, meal_breakfast = ?, meal_water = ?, condition_status = ?, condition_mood = ?, vitals_bp = ?, vitals_temp = ?, vitals_hr = ?, activities = ?
            WHERE id = ?
        ");
        $stmt->bind_param("sssssssssssssi", 
            $data['shift_summary'], 
            $data['encrypted_medical_notes'], 
            $data['med_status'], 
            $data['med_name'], 
            $data['med_time'], 
            $data['meal_breakfast'], 
            $data['meal_water'], 
            $data['condition_status'], 
            $data['condition_mood'], 
            $data['vitals_bp'], 
            $data['vitals_temp'], 
            $data['vitals_hr'], 
            $data['activities'], 
            $id
        );
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteReportByBookingId(int $bookingId): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM care_reports WHERE booking_id = ?");
        $stmt->bind_param("i", $bookingId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getReportsByFamilyId(int $familyId)
    {
        $stmt = $this->conn->prepare("
            SELECT cr.*, 
                   cg.full_name as caregiver_name, 
                   cp.profile_photo as caregiver_image,
                   p.full_name as patient_name
            FROM care_reports cr
            JOIN caregiver_profiles cp ON cr.caregiver_id = cp.caregiver_id
            JOIN users cg ON cp.user_id = cg.id
            JOIN patients p ON cr.patient_id = p.patient_id
            WHERE p.family_user_id = ?
            ORDER BY cr.created_at DESC
        ");
        $stmt->bind_param("i", $familyId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $stmt = $this->conn->prepare("UPDATE care_reports SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    /**
     * Delete a care report from the database
     *
     * @param int $id The report ID
     * @return bool True on success, false on failure
     */
    public function deleteReport(int $id): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM care_reports WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
