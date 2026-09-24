<?php

class Booking extends Model
{
    public function getBooking(): array
    {
        return [
            'id' => 'BK-2026-00125',

            'status' => 'Confirmed',

            'payment_status' => 'Payment Held Securely',

            'service_date' => 'Tomorrow, Oct 14',

            'service_time' => '08:00 AM',

            'location' => '45, Flower Road, Colombo 07',

            'location_type' => 'Residential Villa',

            'gate_code' => '1212',

            'service_notes' =>
                'Requires assistance with morning stretches and light walking. Please ensure medications are taken at 9:00 AM with breakfast. Mr. Silva prefers gentle conversational engagement during his walk.',

            'duration' => '7 Days',

            'type' => 'Day Care',

            'total' => 51300
        ];
    }


    public function getCaregiver(): array
    {
        return [
            'name' => 'Sarah Wijesinghe',

            'rating' => '5.0',

            'reviews' => '128',

            'specializations' => [
                'ELDERLY CARE',
                'PHYSIOTHERAPY'
            ],

            'phone' => '+94 77 123 4567',

            'email' => 'sarah.w@safehands.lk',

            'image' => ''
        ];
    }


    public function getPatient(): array
    {
        return [
            'name' => 'Mr. Silva',

            'relationship' => 'Father',

            'age' => '72',

            'mobility' => 'Assisted'
        ];
    }


    public function getPayment(): array
    {
        return [
            'total' => 51300
        ];
    }
}