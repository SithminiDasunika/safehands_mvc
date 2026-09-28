<?php

class ReviewController extends Controller
{
    private function requireFamily(): int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'family') {
            header('Location: /safehands_mvc/login');
            exit;
        }

        return (int)$_SESSION['user_id'];
    }

    public function index($booking_id = null): void
    {
        $familyId = $this->requireFamily();
        if (!$booking_id) {
            header('Location: /safehands_mvc/bookings');
            exit;
        }

        $reviewModel = $this->model('ReviewModel');
        $bookingDetails = $reviewModel->getBookingDetailsForReview((int)$booking_id, $familyId);

        if (!$bookingDetails) {
            header('Location: /safehands_mvc/bookings?review=unavailable');
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
        $familyId = $this->requireFamily();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingId = $_POST['booking_id'] ?? null;
            $rating = $_POST['rating'] ?? 0;
            $feedback = trim($_POST['written_review'] ?? '');

            if ($bookingId && filter_var($bookingId, FILTER_VALIDATE_INT) && (int)$rating >= 1 && (int)$rating <= 5) {
                $reviewModel = $this->model('ReviewModel');
                if ($reviewModel->createReview((int)$bookingId, $familyId, (int)$rating, $feedback)) {
                    header('Location: /safehands_mvc/bookings?review=success');
                    exit;
                }
            }
        }
        
        header('Location: /safehands_mvc/bookings');
        exit;
    }
}
