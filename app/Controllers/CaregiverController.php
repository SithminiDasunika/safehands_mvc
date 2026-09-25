 <?php

class CaregiverController extends Controller
{
    /**
     * Caregiver Dashboard
     */
    public function dashboard(): void
    {
        $data = [
            'title' => 'Caregiver Dashboard | SafeHands'
        ];

        $this->view(
            'caregivers/dashboard',
            $data,
            'caregivers'
        );
    }

    public function dashboardSi(): void
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

        $data = [
            'title' => 'රැකවරණ සේවා සපයන්නාගේ උපකරණ පුවරුව | SafeHands'
        ];

        $this->view(
            'caregivers/dashboard-si',
            $data,
            'caregivers'
        );
    }

    public function scheduleSi(): void
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

        $data = [
            'title' => 'මගේ උපලේඛනය | SafeHands'
        ];

        $this->view(
            'caregivers/schedule-si',
            $data,
            'caregivers'
        );
    }

    public function schedule(): void
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

        $data = [
            'title' => 'My Schedule | SafeHands'
        ];

        $this->view(
            'caregivers/schedule',
            $data,
            'caregivers'
        );
    }

    public function earnings(): void
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

        $data = [
            'title' => 'My Earnings | SafeHands'
        ];

        $this->view(
            'caregivers/earnings',
            $data,
            'caregivers'
        );
    }

    public function earningsSi(): void
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

        $data = [
            'title' => 'මගේ ආදායම | SafeHands'
        ];

        $this->view(
            'caregivers/earnings-si',
            $data,
            'caregivers'
        );
    }

    public function notifications(): void
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

        $data = [
            'title' => 'Notifications | SafeHands'
        ];

        $this->view(
            'caregivers/notifications',
            $data,
            'caregivers'
        );
    }

    public function notificationsSi(): void
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

        $data = [
            'title' => 'දැනුම්දීම් | SafeHands'
        ];

        $this->view(
            'caregivers/notifications-si',
            $data,
            'caregivers'
        );
    }

    /**
     * Find Caregivers
     */
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

    public function manageAvailabilitySi(): void
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
            header('Location: /safehands_mvc/caregiver/dashboardSi');
            exit;
        }

        $availability = $availabilityModel->getByCaregiver($caregiverId);

        $data = [
            'title' => 'ලබා ගත හැකි වේලාව | SafeHands',
            'caregiverName' => 'රැකවරණ සේවා සපයන්නා',
            'availability' => $availability
        ];

        $this->view(
            'caregivers/caregiver-availability-si',
            $data,
            'caregivers'
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
}