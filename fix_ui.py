import re

# 1. Update dashboard links back to BookingsController
with open('app/Views/caregivers/dashboard.php', 'r') as f:
    d = f.read()
d = d.replace('/safehands_mvc/caregiver/pendingReports', '/safehands_mvc/bookings/pendingReports')
with open('app/Views/caregivers/dashboard.php', 'w') as f:
    f.write(d)

with open('app/Views/caregivers/dashboard-si.php', 'r') as f:
    ds = f.read()
ds = ds.replace('/safehands_mvc/caregiver/pendingReportsSi', '/safehands_mvc/bookings/pendingReportsSi')
with open('app/Views/caregivers/dashboard-si.php', 'w') as f:
    f.write(ds)

# 2. Add BookingsController->pendingReportsSi
with open('app/Controllers/BookingsController.php', 'r') as f:
    bc = f.read()

if 'public function pendingReportsSi' not in bc:
    pattern = r'public function pendingReports\(\): void\s*\{.*?(?=\z|})'
    # Actually just simple replace
    logic = """
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
"""
    # Find the last closing brace and insert before it
    bc = bc.rsplit('}', 1)[0] + logic + "\n}\n"
    with open('app/Controllers/BookingsController.php', 'w') as f:
        f.write(bc)

# 3. Create pending-reports-si.php from pending-reports.php
import shutil
shutil.copy('app/Views/bookings/pending-reports.php', 'app/Views/bookings/pending-reports-si.php')

with open('app/Views/bookings/pending-reports-si.php', 'r') as f:
    pr_si = f.read()

translations = {
    'Pending Reports': 'පොරොත්තු වාර්තා',
    'View and manage care reports for your completed care sessions.': 'ඔබගේ අවසන් කළ සත්කාර සැසි සඳහා වාර්තා බලන්න සහ කළමනාකරණය කරන්න.',
    'No completed care sessions found.': 'අවසන් කළ සත්කාර සැසි කිසිවක් හමු නොවීය.',
    'Completed': 'අවසන් කර ඇත',
    'View Booking': 'වෙන්කිරීම බලන්න',
    'View Report': 'වාර්තාව බලන්න',
    'Edit Report': 'වාර්තාව සංස්කරණය කරන්න',
    'Delete Report': 'වාර්තාව මකන්න',
    'Submit Report': 'වාර්තාව ඉදිරිපත් කරන්න',
    "Are you sure you want to delete this care report?": "ඔබට විශ්වාසද මෙම සත්කාර වාර්තාව මැකීමට අවශ්‍ය බව?"
}

for eng, sin in translations.items():
    pr_si = pr_si.replace(eng, sin)

with open('app/Views/bookings/pending-reports-si.php', 'w') as f:
    f.write(pr_si)

