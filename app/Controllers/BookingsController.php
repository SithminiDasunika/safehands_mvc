<?php

class BookingsController extends Controller
{
    public function index(): void
    {
        $bookingsModel = $this->model('Bookings');

        $data = [
            'title' => 'My Bookings | SafeHands',

            'stats' => $bookingsModel->getStats(),

            'active' => $bookingsModel->getActiveBooking(),

            'upcoming' => $bookingsModel->getUpcomingBookings(),

            'completed' => $bookingsModel->getCompletedBookings()
        ];

        $this->view(
            'bookings/index',
            $data,
            'bookings'
        );
    }
}