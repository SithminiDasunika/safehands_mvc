<?php

class CareReport extends Model
{
    public function getReport(): array
    {
        return [

            'reference' => 'DCR-2026-0718',

            'status' => 'Report Submitted',

            'patient' => [
                'name' => 'Mr. Silva',
                'patient_id' => 'SH-P-9921',
                'booking_id' => 'BK-2026-00125',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD-rVbfIAlfaAwzEE3naHPZ6IB4hJUprZ0Jo-YxeJAg6PKT-S5N3UwFafYhMDcP2cEqwY0Ytu_hOqhwN6u6eCS7ym-ev6RmZJpMDOj-CL1RdJSM4nERg3L9Z7-K-GiYeimkZ4Mc3j7h_a0HtrTmDmT46QeOaPVF7EantlCKmuFaMw3Is5ncbO9taW_R2UADmJzzv4PNq8cRf4SdLmtSROFb1zw1Hi8f8ZXs7_mDPw1MiWI0q1n5dHPf'
            ],

            'date' => '18 July 2026',

            'shift' => 'Morning Shift',

            'time' => '08:00 - 12:00',

            'caregiver' => [
                'name' => 'Nadeesha Perera',
                'qualified_name' => 'Nadeesha Perera, RN',
                'id' => 'CG-00125',
                'registration' => 'SLMC-84920',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCl2I2fQXfHmUA7XNdj-GthhljKa1gEMQ3aJhnlEB0Kby2X4J9f-5AOtUKnJuFvSLl7JluBE4YGRjWBBUeF2SIATkOeYHNA8irrcINY88dDN5oXn9fJ322Gm777LJB-2pXTs1LazuwV0AkxmCvxbrmMltx_E_0h4HG3KL9POjf3OsUgBxa5msThBuXNYX6IdbB9dR9HfN_hrXfviemNpWjmg5QqGIgWVm-IikmbK1y_UmhJ-jQu91Zo'
            ],

            'submitted_at' => '18 July 2026 at 12:15 PM',

            'activities' => [

                [
                    'name' => 'Medication Administered',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'Meal Preparation',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'Walking Assistance',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'Light Exercise',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'Companionship',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'BP Monitoring',
                    'completed' => true,
                    'status' => 'Done'
                ],

                [
                    'name' => 'Assisted Bathing',
                    'completed' => false,
                    'status' => 'Not required'
                ],

                [
                    'name' => 'Dressing Support',
                    'completed' => false,
                    'status' => 'Self-managed'
                ],

                [
                    'name' => 'Feeding Assistance',
                    'completed' => false,
                    'status' => 'Independent'
                ]

            ],

            'medication' => [
                'status' => 'Administered as Scheduled',
                'name' => 'Lisinopril 10mg',
                'time' => '08:00 AM',
                'administration_status' => 'Taken',
                'note' => 'Medication was taken with breakfast and a full glass of warm water. Patient tolerated the dose well; no adverse reactions, dizziness, or stomach irritation observed.'
            ],

            'meal' => [
                'breakfast' => 'Completed (100%)',
                'water' => 'Adequate (~750 mL)',
                'note' => 'Consumed oatmeal porridge and warm spiced herbal tea without difficulty. Good appetite.'
            ],

            'condition' => [
                'overall' => 'Stable & Good',
                'mood' => 'Calm & Cheerful',
                'note' => 'Alert, communicative, and actively engaged in morning light conversation and garden observation.'
            ],

            'vitals' => [
                'recorded_at' => '09:30 AM',

                'blood_pressure' => [
                    'value' => '120/80',
                    'unit' => 'mmHg',
                    'status' => 'Normal Resting Range'
                ],

                'temperature' => [
                    'value' => '98.4',
                    'unit' => '°F',
                    'status' => 'Afebrile / Optimal'
                ],

                'heart_rate' => [
                    'value' => '72',
                    'unit' => 'BPM',
                    'status' => 'Regular Rhythm'
                ]
            ],

            'notes' => 'Patient was comfortable throughout the morning session. Medication was taken on time and light stretching was completed. Patient had a good appetite during breakfast and remained calm throughout the session. Assisted with walking around the veranda for 15 minutes without any respiratory distress or gait instability. Left the patient resting comfortably in the living room listening to the radio.',

            'attachments' => [

                [
                    'name' => 'Medication Chart.jpg',
                    'type' => 'JPG',
                    'size' => '1.4 MB',
                    'uploaded' => '08:30 AM'
                ],

                [
                    'name' => 'Patient Condition.jpg',
                    'type' => 'JPG',
                    'size' => '2.1 MB',
                    'uploaded' => '10:15 AM'
                ]

            ]

        ];
    }
}