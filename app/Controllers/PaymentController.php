<?php

class PaymentController extends Controller
{
    public function checkout($booking_id = null): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['family_logged_in'])) {
            header('Location: /safehands_mvc/login');
            exit;
        }

        if (!$booking_id) {
            header('Location: /safehands_mvc/');
            exit;
        }

        $bookingModel = $this->model('BookingModel');
        $booking = $bookingModel->getBookingById((int)$booking_id);

        if (!$booking) {
            echo "Booking not found.";
            return;
        }

        $caregiverModel = $this->model('Caregiver');
        $caregiver = $caregiverModel->getById($booking['caregiver_id']);

        $data = [
            'booking' => $booking,
            'caregiver' => $caregiver
        ];

        // Do not use the layout to prevent styling conflicts
        $this->view('payment/checkout', $data, '');
    }

    public function process($booking_id = null): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $booking_id) {
            $bookingModel = $this->model('BookingModel');
            $booking = $bookingModel->getBookingById((int)$booking_id);
            
            if (!$booking) {
                echo json_encode(['success' => false, 'message' => 'Booking not found']);
                return;
            }

            // Insert into payments
            $db = new Database();
            $conn = $db->getConnection();
            
            $platformCommission = 300;
            $caregiverPayout = $booking['total_amount'] - $platformCommission;
            $status = 'held';
            
            $stmt = $conn->prepare("INSERT INTO payments (booking_id, family_user_id, caregiver_id, total_amount, platform_commission, caregiver_payout, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiddds", $booking['booking_id'], $booking['family_user_id'], $booking['caregiver_id'], $booking['total_amount'], $platformCommission, $caregiverPayout, $status);
            
            if ($stmt->execute()) {
                // Return success for AJAX
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Payment failed']);
            }
        }
    }
}
