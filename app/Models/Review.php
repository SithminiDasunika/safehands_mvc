<?php

class Review extends Model
{
    public function getCaregiver(): array
    {
        return [
            'name' => 'SafeHands Caregiver',
            'qualification' => 'Registered Nurse (RN)',
            'rating' => '4.9',
            'reviews' => '124',
            'image' => '/safehands_mvc/public/assets/images/caregiver-1.jpg'
        ];
    }

    public function getBooking(): array
    {
        return [
            'patient' => 'Robert Wilson',
            'reference' => '#SH-882910',
            'duration' => 'Oct 12 - Oct 19 (7 days)',
            'completed_message' => 'All medication tasks completed'
        ];
    }
}