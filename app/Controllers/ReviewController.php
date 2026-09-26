<?php

class ReviewController extends Controller
{
    public function index($booking_id = null): void
    {
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $reviewModel = $this->model('ReviewModel');
        $bookingDetails = $reviewModel->getBookingDetailsForReview((int)$booking_id);

        if (!$bookingDetails) {
            echo "Booking not found.";
            exit;
        }

        $data = [
            'title' => 'Rate Your Caregiver | SafeHands',
            'booking' => $bookingDetails
        ];

        $this->view('review/index', $data, 'review');
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['booking_id'] ?? null;
            $familyId = $_POST['family_id'] ?? null;
            $caregiverId = $_POST['caregiver_id'] ?? null;
            $rating = $_POST['rating'] ?? 0;
            $feedback = $_POST['feedback'] ?? '';

            if ($bookingId && $familyId && $caregiverId && $rating > 0) {
                $reviewModel = $this->model('ReviewModel');
                $reviewModel->createReview((int)$bookingId, (int)$familyId, (int)$caregiverId, (int)$rating, $feedback);
                
                // For simplicity, redirect back to booking details
                header('Location: /safehands_mvc/booking/details/' . (int)$bookingId . '?review=success');
                exit;
            }
        }
        
        header('Location: /safehands_mvc/bookings');
        exit;
    }
}
