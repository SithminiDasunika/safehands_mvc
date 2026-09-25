<?php

class CaregiverAvailability extends Model
{
    /**
     * Get all availability records for a caregiver.
     */
     public function getByCaregiver(int $caregiverId): array
{
    $sql = "
        SELECT
            id,
            availability_date AS date,
            shift,
            status
        FROM caregiver_availability
        WHERE caregiver_id = ?
        ORDER BY availability_date ASC, shift ASC
    ";

    $stmt = $this->db->prepare($sql);

    if (!$stmt) {
        return [];
    }

    $stmt->bind_param("i", $caregiverId);
    $stmt->execute();

    $result = $stmt->get_result();

    $records = [];

    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    $stmt->close();

    return $records;
}

    /**
     * Create a new availability record.
     */
    public function create(
        int $caregiverId,
        string $date,
        string $shift,
        string $status
    ): bool {
        $sql = "
            INSERT INTO caregiver_availability
            (caregiver_id, availability_date, shift, status)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "isss",
            $caregiverId,
            $date,
            $shift,
            $status
        );

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }


    /**
     * Update an availability record.
     */
     public function update(
    int $id,
    int $caregiverId,
    string $date,
    string $shift,
    string $status
): bool {
    $sql = "
        UPDATE caregiver_availability
        SET
            availability_date = ?,
            shift = ?,
            status = ?
        WHERE id = ?
          AND caregiver_id = ?
    ";

    $stmt = $this->db->prepare($sql);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param(
        "sssii",
        $date,
        $shift,
        $status,
        $id,
        $caregiverId
    );

    if (!$stmt->execute()) {
        $stmt->close();
        return false;
    }

    $updated = ($stmt->affected_rows > 0);

    $stmt->close();

    return $updated;
}

    /**
     * Delete an availability record.
     */
    public function delete(
        int $id,
        int $caregiverId
    ): bool {
        $sql = "
            DELETE FROM caregiver_availability
            WHERE id = ?
              AND caregiver_id = ?
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "ii",
            $id,
            $caregiverId
        );

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }
    /**
 * Get caregiver profile ID using the user ID.
 */
public function getCaregiverIdByUserId(int $userId): ?int
{
    $sql = "
        SELECT caregiver_id
        FROM caregiver_profiles
        WHERE user_id = ?
        LIMIT 1
    ";

    $stmt = $this->db->prepare($sql);

    if (!$stmt) {
        return null;
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();

    if (!$row) {
        return null;
    }

    return (int) $row['caregiver_id'];
}
}