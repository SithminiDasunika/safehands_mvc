<?php

class BookingsController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /safehands_mvc/login');
            exit;
        }
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Fetches and displays a list of booking history records.
     */
    public function index(): void
    {
        $userId = (int)$_SESSION['user_id'];
        $role = $_SESSION['user_role'] ?? 'family';

        $bookingModel = $this->model('BookingModel');
        
        if ($role === 'caregiver') {
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
        } else {
            $rawBookings = $bookingModel->getBookingsByFamilyId($userId);
        }

        $stats = [
            'upcoming' => 0,
            'active' => 0,
            'completed' => 0,
            'cancelled' => 0
        ];

        $active = null;
        $upcoming = [];
        $completed = [];

        foreach ($rawBookings as $b) {
            // Get proper status
            $status = strtolower($b['status']);
            $personName = $role === 'caregiver' ? $b['family_name'] : $b['caregiver_name'];
            $patientName = $b['patient_name'] ?? 'Unknown Patient';
            
            // Format common fields
            $item = [
                'id' => $b['booking_id'],
                'caregiver' => $personName,
                'patient' => $patientName,
                'status' => ucfirst($status),
                'date' => date('M d, Y', strtotime($b['created_at'])),
                'time' => '08:00 AM - 04:00 PM', // Placeholder unless we join sessions
                'image' => 'https://via.placeholder.com/150', // Placeholder
                'reviewed' => false
            ];

            if ($status === 'active') {
                $stats['active']++;
                if (!$active) {
                    $item['started'] = '08:00 AM Today';
                    $item['location'] = 'Registered Address';
                    $item['progress'] = 50;
                    $item['progress_text'] = 'In Progress';
                    $active = $item;
                }
            } elseif ($status === 'pending' || $status === 'accepted') {
                $stats['upcoming']++;
                $upcoming[] = $item;
            } elseif ($status === 'completed') {
                $stats['completed']++;
                $completed[] = $item;
            } elseif ($status === 'cancelled' || $status === 'rejected') {
                $stats['cancelled']++;
                $completed[] = $item; // Add to completed list for history
            }
        }

        $data = [
            'title' => 'My Bookings | SafeHands',
            'stats' => $stats,
            'active' => $active,
            'upcoming' => $upcoming,
            'completed' => $completed
        ];

        if ($role === 'caregiver') {
            $data['title'] = 'Booking Requests | SafeHands';
            $this->view(
                'bookings/caregiver-index',
                $data,
                'bookings'
            );
        } else {
            $this->view(
                'bookings/index',
                $data,
                'bookings'
            );
        }
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Fetches and displays a list of completed bookings for care reports.
     */
    
public function indexSi(): void
    {
        $userId = (int)$_SESSION['user_id'];
        $role = $_SESSION['user_role'] ?? 'family';

        $bookingModel = $this->model('BookingModel');
        
        if ($role === 'caregiver') {
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
        } else {
            $rawBookings = $bookingModel->getBookingsByFamilyId($userId);
        }

        $stats = [
            'upcoming' => 0,
            'active' => 0,
            'completed' => 0,
            'cancelled' => 0
        ];

        $active = null;
        $upcoming = [];
        $completed = [];

        foreach ($rawBookings as $b) {
            // Get proper status
            $status = strtolower($b['status']);
            $personName = $role === 'caregiver' ? $b['family_name'] : $b['caregiver_name'];
            $patientName = $b['patient_name'] ?? 'Unknown Patient';
            
            // Format common fields
            $item = [
                'id' => $b['booking_id'],
                'caregiver' => $personName,
                'patient' => $patientName,
                'status' => ucfirst($status),
                'date' => date('M d, Y', strtotime($b['created_at'])),
                'time' => '08:00 AM - 04:00 PM', // Placeholder unless we join sessions
                'image' => 'https://via.placeholder.com/150', // Placeholder
                'reviewed' => false
            ];

            if ($status === 'active') {
                $stats['active']++;
                if (!$active) {
                    $item['started'] = '08:00 AM Today';
                    $item['location'] = 'Registered Address';
                    $item['progress'] = 50;
                    $item['progress_text'] = 'In Progress';
                    $active = $item;
                }
            } elseif ($status === 'pending' || $status === 'accepted') {
                $stats['upcoming']++;
                $upcoming[] = $item;
            } elseif ($status === 'completed') {
                $stats['completed']++;
                $completed[] = $item;
            } elseif ($status === 'cancelled' || $status === 'rejected') {
                $stats['cancelled']++;
                $completed[] = $item; // Add to completed list for history
            }
        }

        $data = [
            'title' => 'මගේ වෙන්කිරීම් | SafeHands',
            'stats' => $stats,
            'active' => $active,
            'upcoming' => $upcoming,
            'completed' => $completed
        ];

        if ($role === 'caregiver') {
            $data['title'] = 'වෙන්කරවා ගැනීමේ ඉල්ලීම් | SafeHands';
            $this->view(
                'bookings/caregiver-index-si',
                $data,
                'bookings'
            );
        } else {
            $this->view(
                'bookings/index',
                $data,
                'bookings'
            );
        }
    }

    /**
     * ==========================================
     * READ OPERATION
     * ==========================================
     * Fetches and displays a list of completed bookings for care reports.
     */
    public function pendingReports(): void
    {
        $userId = (int)$_SESSION['user_id'];
        $role = $_SESSION['user_role'] ?? 'family';
        
        if ($role !== 'caregiver') {
            header('Location: /safehands_mvc/dashboard');
            exit;
        }

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
            $status = strtolower($b['status']);
            if ($status === 'completed') {
                $stats['completed']++;
                
                $hasReport = $reportModel->getReportByBookingId($b['booking_id']) ? true : false;
                
                $completed[] = [
                    'id' => $b['booking_id'],
                    'patient' => $b['patient_name'] ?? 'Unknown Patient',
                    'date' => date('M d, Y', strtotime($b['created_at'])),
                    'image' => 'https://via.placeholder.com/150', // Placeholder
                    'has_report' => $hasReport
                ];
            }
        }

        $data = [
            'title' => 'Pending Reports | SafeHands',
            'stats' => $stats,
            'completed' => $completed
        ];

        $this->view('bookings/pending-reports', $data, 'bookings');
    }

    public function pendingReportsSi(): void
    {
        $userId = (int)$_SESSION['user_id'];
        $role = $_SESSION['user_role'] ?? 'family';
        
        if ($role !== 'caregiver') {
            header('Location: /safehands_mvc/dashboard');
            exit;
        }

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
            $status = strtolower($b['status']);
            if ($status === 'completed') {
                $stats['completed']++;
                $hasReport = $reportModel->getReportByBookingId($b['booking_id']) ? true : false;
                $completed[] = [
                    'id' => $b['booking_id'],
                    'patient' => $b['patient_name'] ?? 'Unknown Patient',
                    'date' => date('M d, Y', strtotime($b['created_at'])),
                    'image' => 'https://via.placeholder.com/150',
                    'has_report' => $hasReport
                ];
            }
        }

        $data = [
            'title' => 'පොරොත්තු වාර්තා | SafeHands',
            'stats' => $stats,
            'completed' => $completed
        ];

        $this->view('bookings/pending-reports-si', $data, 'bookings');
    }

}
