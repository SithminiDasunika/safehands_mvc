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
        $caregiverModel = $this->model('CaregiverModel');
        $caregivers = $caregiverModel->getAllCaregivers();

        $data = [
            'title' => 'Manage Caregivers',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'caregivers',
            'caregivers' => $caregivers
        ];

        $this->view('admin/caregivers', $data, 'admin'); 
    }

    public function caregiverDetails($id = null)
    {
        if (!$id) {
            header('Location: /safehands_mvc/admin/caregivers');
            exit;
        }

        $caregiverModel = $this->model('CaregiverModel');
        $caregiver = $caregiverModel->getCaregiverDetails((int)$id);

        if (!$caregiver) {
            header('Location: /safehands_mvc/admin/caregivers');
            exit;
        }

        $data = [
            'title' => 'Caregiver Details',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'caregivers',
            'caregiver' => $caregiver
        ];

        $this->view('admin/caregiver_details', $data, 'admin'); 
    }

    public function families()
    {
        require_once __DIR__ . '/../Models/FamilyModel.php';
        $familyModel = clone $this->model('FamilyModel');
        $families = $familyModel->getAllFamilies();

        $data = [
            'title' => 'Family Members',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
            'active_tab' => 'families',
            'families' => $families
        ];

        $this->view('admin/families', $data, 'admin');
    }

    public function familyDetails($id = null)
    {
        if (!$id) {
            header('Location: /safehands_mvc/admin/families');
            exit;
        }

        require_once __DIR__ . '/../Models/FamilyModel.php';
        $familyModel = clone $this->model('FamilyModel');
        $family = $familyModel->getFamilyDetails((int)$id);

        if (!$family) {
            header('Location: /safehands_mvc/admin/families');
            exit;
        }

        $data = [
            'title'      => 'Family Member Details',
            'user_name'  => $_SESSION['user_name'] ?? 'Admin',
            'css'        => 'admin.css',
            'active_tab' => 'families',
            'family'     => $family
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
        $complaints = [
            [
                'id' => 1,
                'complaint_ref' => 'CMP-2026-001',
                'booking_id' => 125,
                'family_name' => 'Sithmini Rathnayake',
                'caregiver_name' => 'Kumara Pathirana',
                'type' => 'Service Quality',
                'status' => 'Under Review',
                'created_at' => '2026-10-16 09:42:00'
            ],
            [
                'id' => 2,
                'complaint_ref' => 'CMP-2026-002',
                'booking_id' => 108,
                'family_name' => 'Nimal Perera',
                'caregiver_name' => 'Sarah Wijesinghe',
                'type' => 'Punctuality',
                'status' => 'Pending',
                'created_at' => '2026-10-17 14:20:00'
            ],
            [
                'id' => 3,
                'complaint_ref' => 'CMP-2026-003',
                'booking_id' => 89,
                'family_name' => 'Sunil Silva',
                'caregiver_name' => 'Kamal Dias',
                'type' => 'Professionalism',
                'status' => 'Resolved',
                'created_at' => '2026-10-10 11:30:00'
            ]
        ];

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

        // Dummy Data for Demo
        $complaint = [
            'id' => $id,
            'complaint_ref' => 'CMP-2026-00' . $id,
            'booking_id' => 100 + $id,
            'family_name' => 'Sithmini Rathnayake',
            'caregiver_name' => 'Kumara Pathirana',
            'type' => 'Service Quality & Punctuality',
            'status' => 'Under Review',
            'priority' => 'High',
            'created_at' => '2026-10-16 09:42:00',
            'escrow_status' => 'LKR 6,400.00 (FROZEN)',
            'description' => 'Caregiver arrived 80 minutes late and did not answer phone calls. Very unprofessional.'
        ];
        
        $evidence = [
            [
                'file_name' => 'Doorbell_Camera_Timestamp_0920.jpg',
                'file_path' => '#',
                'uploaded_at' => '2026-10-16 09:45:00'
            ],
            [
                'file_name' => 'Call_Logs_Unanswered.pdf',
                'file_path' => '#',
                'uploaded_at' => '2026-10-16 09:46:00'
            ]
        ];

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

    // CRUD: Update Caregiver Status (Admin Approve/Reject)
    public function updateCaregiverStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $caregiverId = $_POST['caregiver_id'] ?? null;
            $action = $_POST['action'] ?? null; // 'approve' or 'reject'
            $reason = $_POST['rejection_reason'] ?? null;

            if ($caregiverId && $action) {
                require_once __DIR__ . '/../Core/Database.php';
                $dbInstance = new Database();
                $conn = $dbInstance->getConnection();
                
                // Get user_id from caregiver_profiles
                $stmt = $conn->prepare("SELECT user_id FROM caregiver_profiles WHERE caregiver_id = ?");
                $stmt->bind_param("i", $caregiverId);
                $stmt->execute();
                $res = $stmt->get_result();
                if ($row = $res->fetch_assoc()) {
                    $userId = $row['user_id'];
                    
                    if ($action === 'approve') {
                        $stmtUpdateUser = $conn->prepare("UPDATE users SET status = 'active' WHERE id = ?");
                        $stmtUpdateUser->bind_param("i", $userId);
                        $stmtUpdateUser->execute();

                        $stmtUpdateProfile = $conn->prepare("UPDATE caregiver_profiles SET verification_status = 'verified' WHERE caregiver_id = ?");
                        $stmtUpdateProfile->bind_param("i", $caregiverId);
                        $stmtUpdateProfile->execute();
                        
                    } elseif ($action === 'reject') {
                        $stmtUpdateUser = $conn->prepare("UPDATE users SET status = 'rejected' WHERE id = ?");
                        $stmtUpdateUser->bind_param("i", $userId);
                        $stmtUpdateUser->execute();

                        $stmtUpdateProfile = $conn->prepare("UPDATE caregiver_profiles SET verification_status = 'rejected', rejection_reason = ? WHERE caregiver_id = ?");
                        $stmtUpdateProfile->bind_param("si", $reason, $caregiverId);
                        $stmtUpdateProfile->execute();
                    }
                }
            }
            
            // Redirect back to caregiver details page
            header('Location: /safehands_mvc/admin/caregiverDetails/' . $caregiverId);
            exit;
        }
    }
}
