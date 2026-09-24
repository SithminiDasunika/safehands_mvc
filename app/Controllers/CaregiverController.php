<?php

class CaregiverController extends Controller
{
    public function index(): void
    {
        $caregiverModel = $this->model('Caregiver');

        $caregivers = $caregiverModel->getAll();

        $data = [
            'title' => 'Find Trusted Caregivers | SafeHands',
            'caregivers' => $caregivers
        ];

        $this->view(
            'caregivers/index',
            $data,
            'caregivers'
        );
    }

    public function profile(int $id): void
{
    $caregiverModel = $this->model('Caregiver');

    $caregiver = $caregiverModel->getById($id);

    if (!$caregiver) {
        http_response_code(404);
        echo 'Caregiver not found.';
        return;
    }

    $data = [
        'title' => $caregiver['name'] . ' | Caregiver Profile',
        'caregiver' => $caregiver
    ];

    $this->view(
        'caregivers/profile',
        $data,
        'caregivers'
    );
}
public function availability(int $id): void
{
    $caregiverModel = $this->model('Caregiver');

    $caregiver = $caregiverModel->getById($id);

    if (!$caregiver) {
        http_response_code(404);
        echo 'Caregiver not found.';
        return;
    }

    $data = [
        'title' => $caregiver['name'] . ' | Availability',
        'caregiver' => $caregiver
    ];

    $this->view(
        'caregivers/availability',
        $data,
        'caregivers'
    );
}
public function manageAvailability(): void
{
    $data = [
        'title' => 'Manage Availability | SafeHands',
        'caregiverName' => 'Aditya Mendis',
        'availability' => [
            [
                'id' => 1,
                'date' => '2026-09-25',
                'shift' => 'Morning',
                'status' => 'Available'
            ],
            [
                'id' => 2,
                'date' => '2026-09-25',
                'shift' => 'Evening',
                'status' => 'Booked'
            ],
            [
                'id' => 3,
                'date' => '2026-09-26',
                'shift' => 'Afternoon',
                'status' => 'Off Duty'
            ],
            [
                'id' => 4,
                'date' => '2026-09-28',
                'shift' => 'Morning',
                'status' => 'Available'
            ]
        ]
    ];

    $this->view(
        'caregivers/caregiver-availability',
        $data,
        'caregivers'
    );
}
}