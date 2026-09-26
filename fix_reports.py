import re

# 1. Update CaregiverController.php
with open('app/Controllers/CaregiverController.php', 'r') as f:
    content = f.read()

db_logic = """    $userId = (int)$_SESSION['user_id'];
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
"""

def replace_method(name, title, view):
    global content
    pattern = r'public function ' + name + r'\(\): void\s*\{.*?(?=public function|\Z)'
    
    replacement = f"""public function {name}(): void
{{
    if (
        !isset($_SESSION['caregiver_logged_in']) ||
        $_SESSION['caregiver_logged_in'] !== true
    ) {{
        header('Location: /safehands_mvc/login');
        exit;
    }}

{db_logic}
    $data = [
        'title' => '{title}',
        'stats' => $stats,
        'completed' => $completed
    ];

    $this->view(
        '{view}',
        $data,
        'find-caregiver'
    );
}}

"""
    content = re.sub(pattern, replacement, content, flags=re.DOTALL)

replace_method('pendingReports', 'Pending Reports | SafeHands', 'caregivers/pending-reports')
replace_method('pendingReportsSi', 'පොරොත්තු වාර්තා | SafeHands', 'caregivers/pending-reports-si')

with open('app/Controllers/CaregiverController.php', 'w') as f:
    f.write(content)

view_logic = """
    <!-- Reports -->
    <section class="reports-container">
        <?php if (empty($completed)): ?>
            <div style="padding: 24px; text-align: center; color: #6b7280; background: white; border-radius: 12px; border: 1px solid #e5e7eb;">
                No completed care sessions found.
            </div>
        <?php else: ?>
            <?php foreach ($completed as $booking): ?>
                <article class="report-card">
                    <div class="report-icon">📋</div>
                    <div class="report-content">
                        <div class="report-header">
                            <div>
                                <h2><?= htmlspecialchars($booking['patient'] ?? 'Unknown Patient') ?></h2>
                                <p class="report-date"><?= htmlspecialchars($booking['date'] ?? '') ?> • Completed</p>
                            </div>
                        </div>

                        <div class="report-actions" style="margin-top: 16px; display: flex; gap: 8px; flex-wrap: wrap;">
                            <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                View Booking
                            </a>
                            <?php if (!empty($booking['has_report'])): ?>
                                <a href="/safehands_mvc/care-report/show/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    View Report
                                </a>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    Edit Report
                                </a>
                            <?php else: ?>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="complete-button">
                                    Complete Report
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
"""

def replace_view(path):
    with open(path, 'r') as f:
        v = f.read()
    
    # replace everything between <section class="reports-container"> and <!-- Information -->
    pattern = r'<!-- Reports -->\s*<section class="reports-container">.*?(?=<!-- Information -->)'
    v = re.sub(pattern, view_logic, v, flags=re.DOTALL)
    
    with open(path, 'w') as f:
        f.write(v)

replace_view('app/Views/caregivers/pending-reports.php')
replace_view('app/Views/caregivers/pending-reports-si.php')

