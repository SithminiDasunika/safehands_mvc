<?php

class BookingModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    /**
     * ==========================================
     * CREATE OPERATION
     * ==========================================
     * Creates a new booking record in the database.
     */
    public function createBooking(int $familyUserId, int $patientId, int $caregiverId, float $totalAmount, array $sessions): ?int
    {
        $this->conn->begin_transaction();

        try {
            $stmt = $this->conn->prepare("INSERT INTO bookings (family_user_id, patient_id, caregiver_id, total_amount, status) VALUES (?, ?, ?, ?, 'pending')");
            $stmt->bind_param("iiid", $familyUserId, $patientId, $caregiverId, $totalAmount);
            $stmt->execute();
            $bookingId = $this->conn->insert_id;
            $stmt->close();

            $stmtSessions = $this->conn->prepare("INSERT INTO booking_sessions (booking_id, service_date, shift_type) VALUES (?, ?, ?)");
            foreach ($sessions as $session) {
                foreach ($session['shifts'] as $shift) {
                    $stmtSessions->bind_param("iss", $bookingId, $session['date'], $shift);
                    $stmtSessions->execute();
                }
            }
            $stmtSessions->close();

            $this->conn->commit();
            return $bookingId;
        } catch (Exception $e) {
            $this->conn->rollback();
            return null;
        }
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Retrieves a single booking and its details.
     */
    public function getBookingById(int $bookingId)
    {
        $stmt = $this->conn->prepare("
            SELECT b.*, p.payment_status as escrow_status 
            FROM bookings b 
            LEFT JOIN payments p ON b.booking_id = p.booking_id 
            WHERE b.booking_id = ?
        ");
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        
        if ($result) {
            $stmt2 = $this->conn->prepare("SELECT * FROM booking_sessions WHERE booking_id = ? ORDER BY service_date ASC");
            $stmt2->bind_param("i", $bookingId);
            $stmt2->execute();
            $result['sessions'] = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt2->close();
        }
        
        return $result;
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Retrieves booking history for a specific family.
     */
    public function getBookingsByFamilyId(int $familyUserId)
    {
        $stmt = $this->conn->prepare("
            SELECT b.*, u.full_name as caregiver_name, u.email as caregiver_email, pat.full_name as patient_name
            FROM bookings b
            JOIN users u ON b.caregiver_id = u.id
            JOIN patients pat ON b.patient_id = pat.patient_id
            WHERE b.family_user_id = ?
            ORDER BY b.created_at DESC
        ");
        $stmt->bind_param("i", $familyUserId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Retrieves booking history for a specific caregiver.
     */
    public function getBookingsByCaregiverId(int $caregiverId)
    {
        $stmt = $this->conn->prepare("
            SELECT b.*, u.full_name as family_name, pat.full_name as patient_name
            FROM bookings b
            JOIN users u ON b.family_user_id = u.id
            JOIN patients pat ON b.patient_id = pat.patient_id
            WHERE b.caregiver_id = ?
            ORDER BY b.created_at DESC
        ");
        $stmt->bind_param("i", $caregiverId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }

    /**
     * ==========================================
     * UPDATE OPERATION
     * ==========================================
     * Updates the status of an existing booking.
     */
    public function updateStatus(int $bookingId, string $status): bool
    {
        $stmt = $this->conn->prepare("UPDATE bookings SET status = ? WHERE booking_id = ?");
        $stmt->bind_param("si", $status, $bookingId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    /**
     * ==========================================
     * UPDATE OPERATION (OTP)
     * ==========================================
     * Verifies OTP and updates booking status to in_progress.
     */
    public function verifyOtp(int $bookingId, string $otp): bool
    {
        if (strlen($otp) === 4) {
            return $this->updateStatus($bookingId, 'in_progress');
        }
        return false;
    }

    /**
     * ==========================================
     * DELETE/CANCEL OPERATION
     * ==========================================
     * Soft deletes (cancels) a booking.
     */
    public function cancelBooking(int $bookingId): bool
    {
        return $this->updateStatus($bookingId, 'cancelled');
    }
}
