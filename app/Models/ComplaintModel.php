<?php

class ComplaintModel
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
     * Create a new complaint record in the database
     *
     * @param array $data Contains complaint_ref, booking_id, family_id, caregiver_id, type, priority, description
     * @return int|null Returns the newly created complaint ID or null on failure
     */
    public function createComplaint(array $data): ?int
    {
        $stmt = $this->conn->prepare("
            INSERT INTO complaints (complaint_ref, booking_id, family_id, caregiver_id, type, priority, description) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("siiiiss", 
            $data['complaint_ref'], 
            $data['booking_id'], 
            $data['family_id'], 
            $data['caregiver_id'], 
            $data['type'], 
            $data['priority'], 
            $data['description']
        );
        
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        }
        return null;
    }

    /**
     * Retrieve all complaints from the database
     * Joins with the users table to get the full names of families and caregivers
     * 
     * @return array List of complaints
     */
    public function getAllComplaints()
    {
        $sql = "
            SELECT c.*, f.full_name as family_name, cg.full_name as caregiver_name
            FROM complaints c
            JOIN users f ON c.family_id = f.id
            JOIN users cg ON c.caregiver_id = cg.id
            ORDER BY c.created_at DESC
        ";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    /**
     * Fetch a specific complaint by its ID
     *
     * @param int $id The primary key of the complaint
     * @return array|null Returns the complaint data or null if not found
     */
    public function getComplaintById(int $id)
    {
        $stmt = $this->conn->prepare("
            SELECT c.*, f.full_name as family_name, cg.full_name as caregiver_name
            FROM complaints c
            JOIN users f ON c.family_id = f.id
            JOIN users cg ON c.caregiver_id = cg.id
            WHERE c.id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    /**
     * Update the lifecycle status of a complaint
     *
     * @param int $id The complaint ID
     * @param string $status New status (e.g., 'Pending', 'Under Review', 'Resolved', 'Rejected')
     * @param string|null $adminNotes Optional resolution notes from the admin
     * @return bool True on success, false on failure
     */
    public function updateStatus(int $id, string $status, string $adminNotes = null): bool
    {
        if ($adminNotes) {
            $stmt = $this->conn->prepare("UPDATE complaints SET status = ?, admin_notes = ? WHERE id = ?");
            $stmt->bind_param("ssi", $status, $adminNotes, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE complaints SET status = ? WHERE id = ?");
            $stmt->bind_param("si", $status, $id);
        }
        return $stmt->execute();
    }

    /**
     * Delete a complaint from the database
     *
     * @param int $id The complaint ID
     * @return bool True on success, false on failure
     */
    public function deleteComplaint(int $id): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM complaints WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
