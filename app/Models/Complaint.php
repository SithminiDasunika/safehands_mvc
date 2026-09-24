<?php

class Complaint extends Model
{
    public function getBooking(): array
    {
        return [
            'booking_id' => '#SH-882910',
            'patient' => 'Mr. Ananda Silva',
            'date' => '15 Aug 2026',
            'time' => '09:00 AM - 01:00 PM',
            'status' => 'Care Session Completed'
        ];
    }

    public function getCaregiver(): array
    {
        return [
            'name' => 'Nadeesha Perera',
            'qualification' => 'Registered Nurse',
            'image' => '/safehands_mvc/public/assets/images/caregiver-1.jpg'
        ];
    }
}