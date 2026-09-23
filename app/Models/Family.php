<?php

class Family extends Model
{
    public function getDashboardData(): array
    {
        return [
            'name' => 'Sithmini',
            'date' => '14 July 2026',

            'stats' => [
                'patients' => 2,
                'upcoming' => 3,
                'active' => 2,
                'completed' => 18
            ],

            'patients' => [
                [
                    'initials' => 'MS',
                    'name' => 'Mr. Silva',
                    'age' => 78,
                    'condition' => 'Hypertension',
                    'status' => 'Stable'
                ],
                [
                    'initials' => 'MK',
                    'name' => 'Mrs. Kumari',
                    'age' => 72,
                    'condition' => 'Post-Op Recovery',
                    'status' => 'Recovering'
                ]
            ],

            'sessions' => [
                [
                    'month' => 'July',
                    'day' => '15',
                    'status' => 'Tomorrow',
                    'shift' => 'Morning Shift',
                    'caregiver' => 'Nadeesha Perera',
                    'patient' => 'Mr. Silva'
                ],
                [
                    'month' => 'July',
                    'day' => '16',
                    'status' => 'Upcoming',
                    'shift' => 'Evening Shift',
                    'caregiver' => 'Chamari Silva',
                    'patient' => 'Mrs. Kumari'
                ]
            ]
        ];
    }
}