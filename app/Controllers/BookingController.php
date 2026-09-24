<?php

class BookingController extends Controller
{
    /*
     * /booking
     *
     * Redirect to Booking Details
     */
    public function index(): void
    {
        header('Location: /safehands_mvc/booking/details');
        exit;
    }


    /*
     * /booking/details
     *
     * Booking Details page
     */
    public function details(): void
    {
        $bookingModel = $this->model('Booking');

        $data = [
            'title' => 'Booking Details | SafeHands',

            'booking' => $bookingModel->getBooking(),

            'caregiver' => $bookingModel->getCaregiver(),

            'patient' => $bookingModel->getPatient(),

            'payment' => $bookingModel->getPayment()
        ];

        $this->view(
            'booking/details',
            $data,
            'booking-details'
        );
    }
}