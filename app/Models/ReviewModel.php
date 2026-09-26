<?php

class ReviewModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getBookingDetailsForReview(int $bookingId)
    {
        $stmt = $this->conn->prepare("
            SELECT b.booking_id, b.created_at, b.caregiver_id, b.family_user_id,
                   cg.full_name as caregiver_name, p.full_name as patient_name
            FROM bookings b
            JOIN users cg ON b.caregiver_id = cg.id
            JOIN patients p ON b.patient_id = p.patient_id
            WHERE b.booking_id = ?
        ");
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function createReview(int $bookingId, int $familyId, int $caregiverId, int $rating, string $feedback): bool
    {
        $stmt = $this->conn->prepare("
            INSERT INTO reviews (booking_id, family_id, caregiver_id, rating, feedback)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("iiiis", $bookingId, $familyId, $caregiverId, $rating, $feedback);
        return $stmt->execute();
    }
}
