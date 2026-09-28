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

    public function getSessionById(int $sessionId, int $bookingId): ?array
    {
        $stmt = $this->conn->prepare('SELECT * FROM booking_sessions WHERE session_id = ? AND booking_id = ? LIMIT 1');
        if (!$stmt) return null;
        $stmt->bind_param('ii', $sessionId, $bookingId);
        $stmt->execute();
        $session = $stmt->get_result()->fetch_assoc() ?: null;
        $stmt->close();
        return $session;
    }

    public function updateSessionStatus(int $sessionId, int $bookingId, string $status): bool
    {
        if (!$this->getSessionById($sessionId, $bookingId)) return false;
        $stmt = $this->conn->prepare('UPDATE booking_sessions SET status = ? WHERE session_id = ? AND booking_id = ?');
        if (!$stmt) return false;
        $stmt->bind_param('sii', $status, $sessionId, $bookingId);
        $ok = $stmt->execute() && $stmt->affected_rows >= 0;
        $stmt->close();
        if (!$ok) return false;

        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total, SUM(status = 'completed') AS completed, SUM(status IN ('otp_verified','in_progress')) AS active FROM booking_sessions WHERE booking_id = ?");
        if (!$stmt) return false;
        $stmt->bind_param('i', $bookingId);
        $stmt->execute();
        $counts = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $completedCount = (int)($counts['completed'] ?? 0);
        $bookingStatus = ((int)($counts['total'] ?? 0) > 0 && $completedCount === (int)$counts['total'])
            ? 'completed'
            : ((int)($counts['active'] ?? 0) > 0 ? 'in_progress' : ($completedCount > 0 ? 'active' : 'pending'));
        return $this->updateStatus($bookingId, $bookingStatus);
    }

    /** Return a completed booking only when it belongs to the given family account. */
    public function getCompletedBookingForFamily(int $bookingId, int $familyUserId): ?array
    {
        $stmt = $this->conn->prepare("
            SELECT
                b.*,
                p.full_name AS patient_name,
                p.profile_photo AS patient_image,
                u.full_name AS caregiver_name,
                cp.profile_photo AS caregiver_image
            FROM bookings b
            JOIN patients p ON b.patient_id = p.patient_id
            JOIN caregiver_profiles cp ON b.caregiver_id = cp.caregiver_id
            JOIN users u ON cp.user_id = u.id
            WHERE b.booking_id = ?
              AND b.family_user_id = ?
              AND LOWER(TRIM(b.status)) = 'completed'
            LIMIT 1
        ");

        if (!$stmt) {
            return null;
        }

        $stmt->bind_param('ii', $bookingId, $familyUserId);
        if (!$stmt->execute()) {
            $stmt->close();
            return null;
        }

        $booking = $stmt->get_result()->fetch_assoc() ?: null;
        $stmt->close();

        if ($booking) {
            $sessions = $this->conn->prepare(
                'SELECT * FROM booking_sessions WHERE booking_id = ? ORDER BY service_date ASC'
            );
            if ($sessions) {
                $sessions->bind_param('i', $bookingId);
                $sessions->execute();
                $booking['sessions'] = $sessions->get_result()->fetch_all(MYSQLI_ASSOC);
                $sessions->close();
            } else {
                $booking['sessions'] = [];
            }
        }

        return $booking;
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
            SELECT b.*, u.full_name as caregiver_name, u.email as caregiver_email,
                   cp.profile_photo as caregiver_image,
                   pat.full_name as patient_name, pat.profile_photo as patient_image
            FROM bookings b
            JOIN caregiver_profiles cp ON b.caregiver_id = cp.caregiver_id
            JOIN users u ON cp.user_id = u.id
            JOIN patients pat ON b.patient_id = pat.patient_id
            WHERE b.family_user_id = ?
            ORDER BY b.created_at DESC
        ");
        $stmt->bind_param("i", $familyUserId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        foreach ($result as &$b) {
            $stmt2 = $this->conn->prepare("SELECT * FROM booking_sessions WHERE booking_id = ? ORDER BY service_date ASC");
            $stmt2->bind_param("i", $b['booking_id']);
            $stmt2->execute();
            $b['sessions'] = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt2->close();
        }
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
            SELECT b.*, u.full_name as family_name,
                   pat.full_name as patient_name, pat.profile_photo as patient_image
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
    public function verifyOtp(int $bookingId, int $sessionId, string $otp): bool
    {
        if (strlen($otp) === 4) {
            return $this->updateSessionStatus($sessionId, $bookingId, 'otp_verified');
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

    /** Cancel a pending booking only when every session is still scheduled. */
    public function cancelPendingBookingForFamily(int $bookingId, int $familyUserId): bool
    {
        $this->conn->begin_transaction();
        try {
            $stmt = $this->conn->prepare(
                "SELECT status FROM bookings WHERE booking_id = ? AND family_user_id = ? FOR UPDATE"
            );
            if (!$stmt) {
                throw new RuntimeException('Unable to verify booking ownership.');
            }
            $stmt->bind_param('ii', $bookingId, $familyUserId);
            $stmt->execute();
            $booking = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            if (!$booking || strtolower(trim((string)$booking['status'])) !== 'pending') {
                $this->conn->rollback();
                return false;
            }

            $stmt = $this->conn->prepare(
                "SELECT COUNT(*) AS total, SUM(status <> 'scheduled') AS unavailable FROM booking_sessions WHERE booking_id = ?"
            );
            if (!$stmt) {
                throw new RuntimeException('Unable to verify session status.');
            }
            $stmt->bind_param('i', $bookingId);
            $stmt->execute();
            $sessions = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            if ((int)($sessions['total'] ?? 0) === 0 || (int)($sessions['unavailable'] ?? 0) > 0) {
                $this->conn->rollback();
                return false;
            }

            $stmt = $this->conn->prepare(
                "UPDATE bookings SET status = 'cancelled' WHERE booking_id = ? AND family_user_id = ? AND status = 'pending'"
            );
            if (!$stmt) {
                throw new RuntimeException('Unable to cancel booking.');
            }
            $stmt->bind_param('ii', $bookingId, $familyUserId);
            $ok = $stmt->execute() && $stmt->affected_rows === 1;
            $stmt->close();
            if (!$ok) {
                throw new RuntimeException('Booking could not be cancelled.');
            }

            $this->conn->commit();
            return true;
        } catch (Throwable $e) {
            $this->conn->rollback();
            error_log('Pending booking cancellation failed: ' . $e->getMessage());
            return false;
        }
    }
}
