<?php

class CareReports extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Get all reports
    |--------------------------------------------------------------------------
    */
    public function getReports(): array
    {
        $sql = "SELECT *
                FROM care_reports
                ORDER BY report_date DESC, report_id DESC";

        $result = $this->db->query($sql);

        $reports = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                if ($row['condition_status'] === 'Stable') {
                    $statusType = 'stable';
                } elseif ($row['condition_status'] === 'Needs Attention') {
                    $statusType = 'attention';
                } else {
                    $statusType = 'followup';
                }

                $reports[] = [
                    'id' => $row['report_id'],
                    'date' => $row['report_date'],
                    'shift' => $row['shift'],
                    'status' => $row['condition_status'],
                    'status_type' => $statusType,
                    'caregiver' => 'Caregiver #' . $row['caregiver_id'],
                    'image' => '',
                    'description' => $row['notes']
                        ?: 'Daily care report submitted.'
                ];
            }
        }

        return $reports;
    }


    /*
    |--------------------------------------------------------------------------
    | Get one report
    |--------------------------------------------------------------------------
    */
    public function getReportById(int $reportId): ?array
    {
        $sql = "SELECT *
                FROM care_reports
                WHERE report_id = ?";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("i", $reportId);

        $stmt->execute();

        $result = $stmt->get_result();

        $report = $result->fetch_assoc();

        $stmt->close();

        return $report ?: null;
    }


    /*
    |--------------------------------------------------------------------------
    | Create report
    |--------------------------------------------------------------------------
    */
    public function createReport(array $data): bool
    {
        $sql = "INSERT INTO care_reports
                (
                    caregiver_id,
                    patient_name,
                    booking_id,
                    report_date,
                    shift,
                    condition_status,
                    activities,
                    medication,
                    meal,
                    vitals,
                    notes
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "issssssssss",
            $data['caregiver_id'],
            $data['patient_name'],
            $data['booking_id'],
            $data['report_date'],
            $data['shift'],
            $data['condition_status'],
            $data['activities'],
            $data['medication'],
            $data['meal'],
            $data['vitals'],
            $data['notes']
        );

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }


    /*
    |--------------------------------------------------------------------------
    | Update report
    |--------------------------------------------------------------------------
    */
    public function updateReport(
        int $reportId,
        array $data
    ): bool {
        $sql = "UPDATE care_reports
                SET
                    caregiver_id = ?,
                    patient_name = ?,
                    booking_id = ?,
                    report_date = ?,
                    shift = ?,
                    condition_status = ?,
                    activities = ?,
                    medication = ?,
                    meal = ?,
                    vitals = ?,
                    notes = ?
                WHERE report_id = ?";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "issssssssssi",
            $data['caregiver_id'],
            $data['patient_name'],
            $data['booking_id'],
            $data['report_date'],
            $data['shift'],
            $data['condition_status'],
            $data['activities'],
            $data['medication'],
            $data['meal'],
            $data['vitals'],
            $data['notes'],
            $reportId
        );

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }


    /*
    |--------------------------------------------------------------------------
    | Delete report
    |--------------------------------------------------------------------------
    */
    public function deleteReport(int $reportId): bool
    {
        $sql = "DELETE FROM care_reports
                WHERE report_id = ?";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $reportId);

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }


    /*
    |--------------------------------------------------------------------------
    | Get summary
    |--------------------------------------------------------------------------
    */
    public function getSummary(): array
    {
        $summary = [
            'total' => 0,
            'today' => 0,
            'attention' => 0,

            // Required by care-reports/index.php
            'patient_image' => '',
            'patient' => 'No patient selected',
            'caregiver' => 'No caregiver assigned',
            'booking_id' => 'N/A',
            'status' => 'No Reports'
        ];


        /*
        |--------------------------------------------------------------------------
        | Total reports
        |--------------------------------------------------------------------------
        */
        $result = $this->db->query(
            "SELECT COUNT(*) AS total
             FROM care_reports"
        );

        if ($result) {
            $row = $result->fetch_assoc();

            $summary['total'] = (int)$row['total'];
        }


        /*
        |--------------------------------------------------------------------------
        | Today's reports
        |--------------------------------------------------------------------------
        */
        $result = $this->db->query(
            "SELECT COUNT(*) AS today
             FROM care_reports
             WHERE report_date = CURDATE()"
        );

        if ($result) {
            $row = $result->fetch_assoc();

            $summary['today'] = (int)$row['today'];
        }


        /*
        |--------------------------------------------------------------------------
        | Reports needing attention
        |--------------------------------------------------------------------------
        */
        $result = $this->db->query(
            "SELECT COUNT(*) AS attention
             FROM care_reports
             WHERE condition_status = 'Needs Attention'"
        );

        if ($result) {
            $row = $result->fetch_assoc();

            $summary['attention'] = (int)$row['attention'];
        }


        /*
        |--------------------------------------------------------------------------
        | Get latest report
        |--------------------------------------------------------------------------
        */
        $result = $this->db->query(
            "SELECT *
             FROM care_reports
             ORDER BY report_date DESC, report_id DESC
             LIMIT 1"
        );

        if ($result && $result->num_rows > 0) {

            $latest = $result->fetch_assoc();

            $summary['patient'] =
                $latest['patient_name'];

            $summary['caregiver'] =
                'Caregiver #' . $latest['caregiver_id'];

            $summary['booking_id'] =
                $latest['booking_id'] ?: 'N/A';

            $summary['status'] =
                $latest['condition_status'];
        }


        return $summary;
    }
}