<?php

class PaymentHistory extends Model
{
    public function getCaregiver(): array
    {
        return [
            'name' => 'Nadeesha Perera',
            'qualification' => 'RN',
            'rating' => '4.9',

            // Use your local image instead of an external image.
            'image' => '/safehands_mvc/public/assets/images/caregiver-1.jpg'
        ];
    }

    public function getBooking(): array
    {
        return [
            'patient' => 'Ananda Silva',
            'booking_id' => '#SH-882910',
            'date' => '15 Aug 2026',
            'duration' => '8 Hours'
        ];
    }

    public function getPayment(): array
    {
        return [
            'total' => '8,400.00',
            'service_fee' => '8,000.00',
            'platform_fee' => '400.00',
            'status' => 'Payment Completed'
        ];
    }

    public function getTransaction(): array
    {
        return [
            'transaction_id' => 'TXN-SH-2026-008291',
            'payment_method' => 'Card ending in 4521 (Visa)'
        ];
    }

    public function getHistory(): array
    {
        return [
            [
                'date' => '15 Aug 2026, 08:00 AM',
                'action' => 'Payment Initiated',
                'status' => 'Authorized',
                'status_class' => 'authorized'
            ],

            [
                'date' => '15 Aug 2026, 08:05 AM',
                'action' => 'Payment Held in Escrow',
                'status' => 'In Escrow',
                'status_class' => 'escrow'
            ],

            [
                'date' => '15 Aug 2026, 04:30 PM',
                'action' => 'Payment Released to Caregiver',
                'status' => 'Completed',
                'status_class' => 'completed'
            ]
        ];
    }
}