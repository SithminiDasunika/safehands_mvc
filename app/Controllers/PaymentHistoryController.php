<?php

class PaymentHistoryController extends Controller
{
    public function index(): void
    {
        $paymentHistoryModel = $this->model('PaymentHistory');

        $data = [
            'title' => 'Payment History - SafeHands',

            'caregiver' => $paymentHistoryModel->getCaregiver(),

            'booking' => $paymentHistoryModel->getBooking(),

            'payment' => $paymentHistoryModel->getPayment(),

            'transaction' => $paymentHistoryModel->getTransaction(),

            'history' => $paymentHistoryModel->getHistory()
        ];

        $this->view(
            'payment-history/index',
            $data,
            'payment-history'
        );
    }
}