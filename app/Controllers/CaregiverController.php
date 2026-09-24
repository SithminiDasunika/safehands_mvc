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
}