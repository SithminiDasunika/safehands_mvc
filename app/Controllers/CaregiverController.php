<?php

class CaregiverController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Load the logged-in caregiver's profile photo and name
     * from the database, so every view can display them.
     */
    private function getCaregiverProfileData(): array
    {
        $data = [
            'profilePhoto' => '/safehands_mvc/public/assets/images/login-caregiver.jpg',
            'caregiverName' => $_SESSION['user_name'] ?? 'Caregiver'
        ];

        if (!isset($_SESSION['user_id'])) {
            return $data;
        }

        $caregiverModel = $this->model('Caregiver');
        $profile = $caregiverModel->getByUserId((int) $_SESSION['user_id']);

        if ($profile && !empty($profile['image'])) {
            $photo = $profile['image'];

            // If it's already an absolute URL or starts with /
            if (strpos($photo, 'http') === 0 || strpos($photo, '/') === 0) {
                $data['profilePhoto'] = $photo;
            } else {
                // Prepend the public base path
                $data['profilePhoto'] = '/safehands_mvc/public/' . $photo;
            }
        }

        if ($profile && !empty($profile['name'])) {
            $data['caregiverName'] = $profile['name'];
        }

        return $data;
    }

    /** Return today's active session with its patient's emergency contact. */
    private function getDashboardActiveSessions(array $bookings): array
    {
        $bookingModel = $this->model('BookingModel');
        $patientModel = $this->model('PatientModel');
        $upcoming = [];
        $today = date('Y-m-d');

        foreach ($bookings as $bookingRow) {
            $booking = $bookingModel->getBookingById((int)$bookingRow['booking_id']);
            if (!$booking) continue;
            $patient = $patientModel->getPatientById((int)$booking['patient_id']) ?: [];

            foreach (($booking['sessions'] ?? []) as $session) {
                $status = strtolower(trim((string)($session['status'] ?? '')));
                if ($status !== 'in_progress' || date('Y-m-d', strtotime((string)($session['service_date'] ?? ''))) !== $today) continue;
                $upcoming[] = [
                    'booking_id' => (int)$booking['booking_id'],
                    'session_id' => (int)$session['session_id'],
                    'patient_name' => $patient['full_name'] ?? $bookingRow['patient_name'] ?? 'Patient',
                    'patient_image' => $patient['profile_photo'] ?? $bookingRow['patient_image'] ?? '',
                    'service_date' => $session['service_date'] ?? '',
                    'shift_type' => $session['shift_type'] ?? '',
                    'status' => $status,
                    'address' => $patient['address'] ?? '',
                    'emergency_contact_name' => $patient['emergency_contact_name'] ?? '',
                    'emergency_contact_relationship' => $patient['emergency_contact_relationship'] ?? '',
                    'emergency_contact_phone' => $patient['emergency_contact_phone'] ?? '',
                ];
            }
        }

        return $upcoming;
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
public function manageAvailabilitySi(): void
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
        header('Location: /safehands_mvc/caregiver/dashboardSi');
        exit;
    }

    $availability = $availabilityModel->getByCaregiver($caregiverId);

    $caregiverModel = $this->model('Caregiver');
    $caregiver = $caregiverModel->getById($caregiverId);
    $caregiverName = $caregiver
        ? $caregiver['name']
        : 'රැකවරණ සේවා සපයන්නා';

    $data = [
        'title' => 'ලබාගත හැකි වේලාව | SafeHands',
        'caregiverName' => $caregiverName,
        'availability' => $availability
    ];

    $this->view(
        'caregivers/caregiver-availability-si',
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
    
    $bookingModel = $this->model('BookingModel');
    $caregiverModel = $this->model('Caregiver');
    
    // We need caregiver_profiles.caregiver_id which maps to user_id
    $cgProfile = $caregiverModel->getByUserId($_SESSION['user_id']);
    $cgId = $cgProfile ? $cgProfile['id'] : $_SESSION['user_id'];
    
    $bookings = $bookingModel->getBookingsByCaregiverId($cgId);
    $upcomingSessions = $this->getDashboardActiveSessions($bookings);
    
    // DEBUG: remove after testing
    error_log("CG Dashboard: user_id={$_SESSION['user_id']}, cgId={$cgId}, bookings_count=" . count($bookings));

    // Also fetch care reports for each booking
    $reportModel = $this->model('CareReportModel');
    foreach ($bookings as &$b) {
        $report = $reportModel->getReportByBookingId((int)$b['booking_id']);
        $b['has_report'] = !empty($report);
    }

    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'Caregiver Dashboard | SafeHands',
        'bookings' => $bookings,
        'activeSessions' => $upcomingSessions
    ]);

    $this->view(
        'caregivers/dashboard',
        $data,
        'find-caregiver'
    );
}
public function dashboardSi(): void
{
    // Ensure only logged in caregivers can access
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $caregiverModel = $this->model('Caregiver');
    $profile = $caregiverModel->getByUserId((int)$_SESSION['user_id']);
    $cgId = $profile ? (int)$profile['id'] : (int)$_SESSION['user_id'];
    $bookings = $this->model('BookingModel')->getBookingsByCaregiverId($cgId);
    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'රැකවරණ සේවා Dashboard | SafeHands',
        'bookings' => $bookings,
        'activeSessions' => $this->getDashboardActiveSessions($bookings)
    ]);

    $this->view(
        'caregivers/dashboard-si',
        $data,
        'find-caregiver'
    );
}

public function emergencyContact(): void
{
    // Ensure only logged in caregivers can access
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'Emergency Contact Information | SafeHands'
    ]);

    $this->view(
        'caregivers/emergency-contact',
        $data,
        'find-caregiver'
    );
}
public function emergencyContactSi(): void
{
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'හදිසි සම්බන්ධතා තොරතුරු | SafeHands'
    ]);

    $this->view(
        'caregivers/emergency-contact-si',
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

    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'My Schedule | SafeHands'
    ]);
    $this->view('caregivers/schedule', $data, 'find-caregiver');
}
public function scheduleSi(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = array_merge($this->getCaregiverProfileData(), [
        'title' => 'මගේ උපලේඛනය | SafeHands'
    ]);

    $this->view(
        'caregivers/schedule-si',
        $data,
        'find-caregiver'
    );
}
public function pendingReports(): void
{
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $userId = (int)$_SESSION['user_id'];
    $role = $_SESSION['user_role'] ?? 'family';
    
    $bookingModel = $this->model('BookingModel');
    
    require_once __DIR__ . '/../Core/Database.php';
    $dbInstance = new Database();
    $conn = $dbInstance->getConnection();
    
    $stmt = $conn->prepare("SELECT caregiver_id FROM caregiver_profiles WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $actualCaregiverId = $row['caregiver_id'];
    } else {
        $actualCaregiverId = $userId;
    }
    $stmt->close();
    
    $rawBookings = $bookingModel->getBookingsByCaregiverId($actualCaregiverId);
    
    $reportModel = $this->model('CareReportModel');
    
    $completed = [];
    $stats = ['completed' => 0];

    foreach ($rawBookings as $b) {
        $fullBooking = $bookingModel->getBookingById((int)$b['booking_id']);
        foreach (($fullBooking['sessions'] ?? []) as $session) {
            if (strtolower($session['status']) !== 'completed') continue;
            $report = $reportModel->getReportBySessionId((int)$session['session_id']);
            $stats['completed']++;
            $completed[] = [
                'id' => (int)$b['booking_id'],
                'session_id' => (int)$session['session_id'],
                'report_id' => $report['id'] ?? null,
                'patient' => $b['patient_name'] ?? 'Unknown Patient',
                'date' => date('M d, Y', strtotime($session['service_date'])) . ' · ' . ucfirst($session['shift_type']),
                'image' => $b['patient_image'] ?? '',
                'has_report' => (bool)$report
            ];
        }
    }

    $data = [
        'title' => 'Pending Reports | SafeHands',
        'stats' => $stats,
        'completed' => $completed
    ];

    $this->view(
        'caregivers/pending-reports',
        $data,
        'find-caregiver'
    );
}

public function pendingReportsSi(): void
{
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $userId = (int)$_SESSION['user_id'];
    $role = $_SESSION['user_role'] ?? 'family';
    
    $bookingModel = $this->model('BookingModel');
    
    require_once __DIR__ . '/../Core/Database.php';
    $dbInstance = new Database();
    $conn = $dbInstance->getConnection();
    
    $stmt = $conn->prepare("SELECT caregiver_id FROM caregiver_profiles WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $actualCaregiverId = $row['caregiver_id'];
    } else {
        $actualCaregiverId = $userId;
    }
    $stmt->close();
    
    $rawBookings = $bookingModel->getBookingsByCaregiverId($actualCaregiverId);
    
    $reportModel = $this->model('CareReportModel');
    
    $completed = [];
    $stats = ['completed' => 0];

    foreach ($rawBookings as $b) {
        $fullBooking = $bookingModel->getBookingById((int)$b['booking_id']);
        foreach (($fullBooking['sessions'] ?? []) as $session) {
            if (strtolower($session['status']) !== 'completed') continue;
            $report = $reportModel->getReportBySessionId((int)$session['session_id']);
            $stats['completed']++;
            $completed[] = [
                'id' => (int)$b['booking_id'],
                'session_id' => (int)$session['session_id'],
                'report_id' => $report['id'] ?? null,
                'patient' => $b['patient_name'] ?? 'Unknown Patient',
                'date' => date('M d, Y', strtotime($session['service_date'])) . ' · ' . ucfirst($session['shift_type']),
                'image' => $b['patient_image'] ?? '',
                'has_report' => (bool)$report
            ];
        }
    }

    $data = [
        'title' => 'පොරොත්තු වාර්තා | SafeHands',
        'stats' => $stats,
        'completed' => $completed
    ];

    $this->view(
        'caregivers/pending-reports-si',
        $data,
        'find-caregiver'
    );
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

public function earningsSi(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'ආදායම් | SafeHands'
    ];

    $this->view(
        'caregivers/earnings-si',
        $data,
        'find-caregiver'
    );
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

public function notificationsSi(): void
{
    if (!isset($_SESSION['caregiver_logged_in']) || $_SESSION['caregiver_logged_in'] !== true) {
        header('Location: /safehands_mvc/login');
        exit;
    }

    $data = [
        'title' => 'දැනුම්දීම් | SafeHands'
    ];

    $this->view(
        'caregivers/notifications-si',
        $data,
        'find-caregiver'
    );
}

    public function rejected(): void
    {
        $data = [
            'title' => 'Application Rejected | SafeHands'
        ];
        
        // Use 'main' layout to get standard HTML wrapper but we added our styles to style.css
        $this->view('caregivers/rejected', $data, 'main');
    }
}
