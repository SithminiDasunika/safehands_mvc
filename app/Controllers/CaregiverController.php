<?php

class CaregiverController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index(): void
    {
        $caregiverModel = $this->model('Caregiver');

        $caregivers = $caregiverModel->getAll();

        $data = [
            'title' => 'Find Trusted Caregivers | SafeHands',
            'caregivers' => $caregivers
        ];

        $this->view(
            'caregivers/find-caregiver',
            $data,
            'find-caregiver'
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

    $isLoggedIn = isset($_SESSION['family_logged_in']) && $_SESSION['family_logged_in'] === true;

    $data = [
        'title' => $caregiver['name'] . ' | Caregiver Profile',
        'caregiver' => $caregiver,
        'isLoggedIn' => $isLoggedIn
    ];

    $this->view(
        'caregivers/find-caregiver-profile',
        $data,
        'find-caregiver'
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
        'caregivers/find-caregiver-availability',
        $data,
        'find-caregiver'
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
        'find-caregiver'
    );
}

public function dashboard(): void
{
    // Ensure only logged in caregivers can access
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'Caregiver Dashboard | SafeHands'
    ];

    $this->view(
        'caregivers/dashboard',
        $data,
        'find-caregiver'
    );
}

public function schedule(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'My Schedule | SafeHands'
    ];
    $this->view('caregivers/schedule', $data, 'find-caregiver');
}

public function earnings(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'Earnings | SafeHands'
    ];
    $this->view('caregivers/earnings', $data, 'find-caregiver');
}

public function notifications(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'Notifications | SafeHands'
    ];
    $this->view('caregivers/notifications', $data, 'find-caregiver');
}

}