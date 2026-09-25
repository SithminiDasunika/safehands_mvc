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
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true) {

        header('Location: /safehands_mvc/login');
        exit;
    }

    $availabilityModel = $this->model('CaregiverAvailability');

    $caregiverId = $availabilityModel->getCaregiverIdByUserId(
        (int) $_SESSION['user_id']
    );

    if ($caregiverId === null) {
        header('Location: /safehands_mvc/caregiver/dashboard');
        exit;
    }

    $availability = $availabilityModel->getByCaregiver($caregiverId);
    
    $caregiverModel = $this->model('Caregiver');
    $caregiver = $caregiverModel->getById($caregiverId);
    $caregiverName = $caregiver ? $caregiver['name'] : 'Caregiver';

    $data = [
        'title' => 'Manage Availability | SafeHands',
        'caregiverName' => $caregiverName,
        'availability' => $availability
    ];

    $this->view(
        'caregivers/caregiver-availability',
        $data,
        'find-caregiver'
    );
}

public function createAvailability(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check caregiver login
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    // Get correct caregiver profile ID
    $availabilityModel = $this->model('CaregiverAvailability');

    $caregiverId = $availabilityModel->getCaregiverIdByUserId(
        (int) $_SESSION['user_id']
    );

    if ($caregiverId === null) {
        header('Location: /safehands_mvc/caregiver/dashboard');
        exit;
    }

    // Get form values
    $date = trim($_POST['availabilityDate'] ?? '');
    $shift = trim($_POST['availabilityShift'] ?? '');
    $status = trim($_POST['availabilityStatus'] ?? '');

    // Basic validation
    if ($date === '' || $shift === '' || $status === '') {
        header('Location: /safehands_mvc/caregiver/manageAvailability');
        exit;
    }

    // Save to database
    $success = $availabilityModel->create(
        $caregiverId,
        $date,
        $shift,
        $status
    );

    // Return to availability page
    header('Location: /safehands_mvc/caregiver/manageAvailability');
    exit;
}

public function updateAvailability(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check caregiver login
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    // Get the correct caregiver profile ID
    $availabilityModel = $this->model('CaregiverAvailability');

    $caregiverId = $availabilityModel->getCaregiverIdByUserId(
        (int) $_SESSION['user_id']
    );

    if ($caregiverId === null) {
        header('Location: /safehands_mvc/caregiver/dashboard');
        exit;
    }

    // Get form values
    $id = (int) ($_POST['availabilityId'] ?? 0);
    $date = trim($_POST['availabilityDate'] ?? '');
    $shift = trim($_POST['availabilityShift'] ?? '');
    $status = trim($_POST['availabilityStatus'] ?? '');

    // Basic validation
    if (
        $id <= 0 ||
        $date === '' ||
        $shift === '' ||
        $status === ''
    ) {
        header('Location: /safehands_mvc/caregiver/manageAvailability');
        exit;
    }

    // Update database
    $availabilityModel->update(
        $id,
        $caregiverId,
        $date,
        $shift,
        $status
    );

    // Return to availability page
    header('Location: /safehands_mvc/caregiver/manageAvailability');
    exit;
}

public function deleteAvailability(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $availabilityModel = $this->model('CaregiverAvailability');

    $caregiverId = $availabilityModel->getCaregiverIdByUserId(
        (int) $_SESSION['user_id']
    );

    if ($caregiverId === null) {
        header('Location: /safehands_mvc/caregiver/dashboard');
        exit;
    }

    $id = (int) ($_POST['availabilityId'] ?? 0);

    if ($id <= 0) {
        header('Location: /safehands_mvc/caregiver/manageAvailability');
        exit;
    }

    $availabilityModel->delete($id, $caregiverId);

    header('Location: /safehands_mvc/caregiver/manageAvailability');
    exit;
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