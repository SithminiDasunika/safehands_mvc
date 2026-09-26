<?php

class AdminController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if admin is logged in
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: /safehands_mvc/login');
            exit;
        }
    }

    public function index()
    {
        // Default route redirects to dashboard
        header('Location: /safehands_mvc/admin/dashboard');
        exit;
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'dashboard'
        ];

        $this->view('admin/dashboard', $data, 'admin'); 
    }

    public function caregivers()
    {
        $data = [
            'title' => 'Manage Caregivers',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'caregivers'
        ];

        $this->view('admin/caregivers', $data, 'admin'); 
    }

    public function caregiverDetails()
    {
        $data = [
            'title' => 'Caregiver Details',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'caregivers'
        ];

        $this->view('admin/caregiver_details', $data, 'admin'); 
    }

    public function families()
    {
        $data = [
            'title' => 'Family Members',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'families'
        ];

        $this->view('admin/families', $data, 'admin');
    }

    public function familyDetails()
    {
        $data = [
            'title'      => 'Family Member Details',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'families'
        ];

        $this->view('admin/family_details', $data, 'admin');
    }

    public function bookings()
    {
        $data = [
            'title'      => 'Bookings',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'bookings'
        ];

        $this->view('admin/bookings', $data, 'admin');
    }

    public function bookingDetails()
    {
        $data = [
            'title'      => 'Booking Details',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'bookings'
        ];

        $this->view('admin/booking_details', $data, 'admin');
    }

    public function payments()
    {
        $data = [
            'title'      => 'Payments',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'payments'
        ];

        $this->view('admin/payments', $data, 'admin');
    }

    public function paymentDetails()
    {
        $data = [
            'title'      => 'Payment Details',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'payments'
        ];

        $this->view('admin/payment_details', $data, 'admin');
    }

    public function complaints()
    {
        $complaintModel = $this->model('ComplaintModel');
        $complaints = $complaintModel->getAllComplaints();

        $data = [
            'title'      => 'Complaints',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'complaints',
            'complaints' => $complaints
        ];

        $this->view('admin/complaints', $data, 'admin');
    }

    public function complaintDetails($id = null)
    {
        if (!$id) {
            header('Location: /safehands_mvc/admin/complaints');
            exit;
        }

        $complaintModel = $this->model('ComplaintModel');
        $complaint = $complaintModel->getComplaintById((int)$id);
        
        $evidence = [];
        if ($complaint) {
            $db = new Database();
            $conn = $db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM complaint_evidence WHERE complaint_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $evidence = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        if (!$complaint) {
            header('Location: /safehands_mvc/admin/complaints');
            exit;
        }

        $data = [
            'title'      => 'Complaint Details',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'complaints',
            'complaint'  => $complaint,
            'evidence'   => $evidence
        ];

        $this->view('admin/complaint_details', $data, 'admin');
    }

    // CRUD: Update Complaint Status (Admin)
    public function updateComplaintStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['complaint_id'] ?? null;
            $status = $_POST['status'] ?? null;
            $adminNotes = $_POST['admin_notes'] ?? null;

            if ($id && $status) {
                $complaintModel = $this->model('ComplaintModel');
                $complaintModel->updateStatus((int)$id, $status, $adminNotes);
            }
            
            header('Location: /safehands_mvc/admin/complaintDetails/' . $id);
            exit;
        }
    }

    // CRUD: Delete Complaint (Admin)
    public function deleteComplaint($id = null)
    {
        if ($id) {
            $complaintModel = $this->model('ComplaintModel');
            $complaintModel->deleteComplaint((int)$id);
        }
        header('Location: /safehands_mvc/admin/complaints');
        exit;
    }

    public function reports()
    {
        $data = [
            'title'      => 'Reports',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'reports'
        ];

        $this->view('admin/reports', $data, 'admin');
    }

    public function notifications()
    {
        $data = [
            'title'      => 'Notifications',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'notifications'
        ];

        $this->view('admin/notifications', $data, 'admin');
    }
}
