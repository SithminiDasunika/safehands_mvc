<?php

class Patients extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Statistics
    |--------------------------------------------------------------------------
    */

    public function getStats(): array
    {
        return [

            'total' => 2,

            'receiving_care' => 1,

            'upcoming_sessions' => 2,

            'recent_reports' => 2

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Patient List
    |--------------------------------------------------------------------------
    */

    public function getPatients(): array
    {
        return [

            [
                'name' => 'Mr. Ananda Silva',

                'relationship' => 'Father',

                'age' => 78,

                'gender' => 'Male',

                'blood_group' => 'A+',

                'conditions' => [
                    'Hypertension',
                    'Walking Assistance'
                ],

                'status' => 'Currently Receiving Care',

                'status_type' => 'active',

                'caregiver' => 'Nadeesha Perera',

                'next_session' =>
                    '16 August • 08:00 AM - 12:00 PM',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuC0nJLV9WF9TyMh8N6n3piDgu7-WZvOlhuvqWTVAKp7lwUzNGwk7sitGxo9knPwekk3L1BN_PXu7-sUJroPFYCV8072Mgnhp8fH9iySCpNkpjkW0A1TOO5mMNvDv-DPRn9Xgo0aHmrjvUWyX63OKA0F0uiaY6AO_VOEq5fZ7b9FpK8poADmKNikVfcUlyqFD6B7ePmsZvYzNMgonXkZjiyddEffCRh_p3WiKLBKdvEBsRnurHNJZzyh'
            ],


            [
                'name' => 'Mrs. Kamala Silva',

                'relationship' => 'Mother',

                'age' => 72,

                'gender' => 'Female',

                'blood_group' => 'O+',

                'conditions' => [
                    'Type 2 Diabetes',
                    'Independent'
                ],

                'status' => 'Care Scheduled',

                'status_type' => 'scheduled',

                'caregiver' => 'Sunil Jayasuriya',

                'next_session' =>
                    '15 August • 04:00 PM - 08:00 PM',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAIksYZ6xch8WzDyzuSr53f125sHS1apXqm5qiLJ5EzhJY2G0BsodYdRO6jQ4iBo97xvTJUHcNHPnJF3yZN_FfxEoXoXfLJHVN1KI0N5YfcCwJoqT3qcR4AJ2ThLCW-I4NUsYWkItz3cDCCfmzsUv5VoWgytcNGxLL3kKGVp0N7PoZSUSNDxUCzv1yD597FvCg1PgB9c8K7BDy1VJDJ-ivuvVguvTWIZCv5-DYsY8Drwg-4kJMzchHS'
            ]

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Recent Daily Care Reports
    |--------------------------------------------------------------------------
    */

    public function getRecentReports(): array
    {
        return [

            [
                'patient' => 'Mr. Silva',

                'date' => '15 Aug 2026',

                'status' => 'Completed',

                'caregiver' => 'Nadeesha Perera',

                'description' =>
                    'Patient was comfortable this morning. Medication was taken on time and light stretching was completed.'
            ],


            [
                'patient' => 'Mrs. Kamala',

                'date' => '14 Aug 2026',

                'status' => 'Completed',

                'caregiver' => 'Sunil Jayasuriya',

                'description' =>
                    'Blood glucose was monitored and prescribed medication was taken after breakfast.'
            ]

        ];
    }
}