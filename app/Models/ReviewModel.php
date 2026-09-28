<?php

class ReviewModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getBookingDetailsForReview(int $bookingId, int $familyId)
    {
        $stmt = $this->conn->prepare("
            SELECT b.booking_id, b.created_at, b.caregiver_id, b.family_user_id,
                   cg.full_name AS caregiver_name, cp.profile_photo AS caregiver_image,
                   cp.highest_qualification AS qualification, p.full_name AS patient_name,
                   COALESCE((SELECT AVG(rating) FROM reviews WHERE caregiver_id = b.caregiver_id), 0) AS caregiver_rating,
                   (SELECT COUNT(*) FROM reviews WHERE caregiver_id = b.caregiver_id) AS caregiver_reviews
            FROM bookings b
            JOIN caregiver_profiles cp ON b.caregiver_id = cp.caregiver_id
            JOIN users cg ON cp.user_id = cg.id
            JOIN patients p ON b.patient_id = p.patient_id
            WHERE b.booking_id = ?
              AND b.family_user_id = ?
              AND LOWER(TRIM(b.status)) = 'completed'
              AND NOT EXISTS (SELECT 1 FROM reviews r WHERE r.booking_id = b.booking_id)
            LIMIT 1
        ");
        if (!$stmt) {
            return null;
        }
        $stmt->bind_param('ii', $bookingId, $familyId);
        $stmt->execute();
        $result = $stmt->get_result();
        $booking = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $booking;
    }

    public function hasReviewForBooking(int $bookingId, int $familyId): bool
    {
        $stmt = $this->conn->prepare('SELECT 1 FROM reviews WHERE booking_id = ? AND family_id = ? LIMIT 1');
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('ii', $bookingId, $familyId);
        $stmt->execute();
        $exists = (bool)$stmt->get_result()->fetch_row();
        $stmt->close();
        return $exists;
    }

    public function createReview(int $bookingId, int $familyId, int $rating, string $feedback): bool
    {
        $stmt = $this->conn->prepare("
            INSERT INTO reviews (booking_id, family_id, caregiver_id, rating, feedback)
            SELECT b.booking_id, b.family_user_id, b.caregiver_id, ?, ?
            FROM bookings b
            WHERE b.booking_id = ?
              AND b.family_user_id = ?
              AND LOWER(TRIM(b.status)) = 'completed'
              AND NOT EXISTS (SELECT 1 FROM reviews r WHERE r.booking_id = b.booking_id)
            LIMIT 1
        ");
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param('isii', $rating, $feedback, $bookingId, $familyId);
        $success = $stmt->execute() && $stmt->affected_rows === 1;
        $stmt->close();
        return $success;
    }
}
