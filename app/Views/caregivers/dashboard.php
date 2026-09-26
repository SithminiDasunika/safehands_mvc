<?php
$caregiverName = $caregiverName ?? ($_SESSION['caregiver_name'] ?? 'Caregiver');
$caregiverId = $caregiverId ?? ($_SESSION['caregiver_id'] ?? null);

$profileUrl = $caregiverId
    ? '/safehands_mvc/caregiver/profile/' . (int)$caregiverId
    : '/safehands_mvc/caregivers';

$profilePhoto = $profilePhoto ?? '/safehands_mvc/public/assets/images/login-caregiver.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SafeHands Caregiver Dashboard - <?= htmlspecialchars($caregiverName) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-dashboard.css?v=2">
</head>
<body>

<!-- TopNavBar -->
<header class="top-nav-bar">
    <nav class="top-nav-inner">
        <div class="nav-logo-area">
            <a href="/safehands_mvc/caregiver/dashboard" class="nav-logo">SafeHands</a>
            <div class="nav-links">
                <a class="nav-link active" href="/safehands_mvc/caregiver/dashboard">Dashboard</a>
                <a class="nav-link" href="/safehands_mvc/bookings">Booking Requests</a>
                <a class="nav-link" href="/safehands_mvc/caregiver/emergencyContact">Emergency Contact Information</a>
                <a class="nav-link" href="/safehands_mvc/caregiver/manageAvailability">Availability</a>
                <a class="nav-link" href="/safehands_mvc/caregiver/earnings">Earnings</a>
                <a class="nav-link" href="/safehands_mvc/caregiver/notifications">Notifications</a>
            </div>
        </div>
        
        <div class="nav-actions">
            <a href="/safehands_mvc/caregiver/notifications" class="icon-btn">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
            </a>
            <a href="/safehands_mvc/login/logout" class="icon-btn">
                <span class="material-symbols-outlined" data-icon="logout">logout</span>
            </a>
            <div class="profile-avatar">
                <img alt="Caregiver profile" src="<?= htmlspecialchars($profilePhoto) ?>">
            </div>
        </div>
    </nav>
</header>

<main class="main-content">
    
    <!-- Header Greeting -->
    <header class="greeting-header">
        <div>
            <h1 class="greeting-title">Good Morning, <?= htmlspecialchars($caregiverName) ?> 👋</h1>
            <p class="greeting-subtitle">Manage your daily care schedule, bookings and earnings from one place.</p>
        </div>
        <div class="date-badge">
            <span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
            <span><?= date('l, M j, Y') ?></span>
        </div>
    </header>

    <!-- Quick Action Grid -->
    <div class="quick-action-grid">
        <a href="/safehands_mvc/bookings" class="quick-action-card">
            <div class="qa-icon-wrapper bg-primary-container">
                <span class="material-symbols-outlined">assignment</span>
            </div>
            <span class="quick-action-label">Booking Requests</span>
        </a>
        <a href="/safehands_mvc/caregiver/emergencyContact" class="quick-action-card">
            <div class="qa-icon-wrapper bg-primary-container">
                <span class="material-symbols-outlined" data-icon="contact_phone">contact_phone</span>
            </div>
            <span class="quick-action-label">Emergency Contact Information</span>
        </a>
        <a href="/safehands_mvc/caregiver/manageAvailability" class="quick-action-card">
            <div class="qa-icon-wrapper bg-secondary-container">
                <span class="material-symbols-outlined" data-icon="event_note">event_note</span>
            </div>
            <span class="quick-action-label">Manage Availability</span>
        </a>
        <a href="/safehands_mvc/caregiver/pendingReports" class="quick-action-card">
            <div class="qa-icon-wrapper bg-warning-container">
                <span class="material-symbols-outlined" data-icon="description">description</span>
            </div>
            <span class="quick-action-label">Pending Reports</span>
        </a>
        <a href="/safehands_mvc/caregiver/earnings" class="quick-action-card">
            <div class="qa-icon-wrapper bg-success-container">
                <span class="material-symbols-outlined" data-icon="payments">payments</span>
            </div>
            <span class="quick-action-label">View Earnings</span>
        </a>
    </div>

    <div class="dashboard-grid">
        <!-- Main Content Area (8 Columns) -->
        <div class="main-column">
            
            <!-- Emergency Contact Information -->
            <section class="section-container">
                <div class="section-header">
                    <h2 class="section-title">Emergency Contact Information</h2>
                    <a href="/safehands_mvc/caregiver/emergencyContact" class="section-link">View Calendar</a>
                </div>
                
                <!-- Booking Card -->
                <div class="card card-no-pad">
                    <div class="status-indicator-left"></div>
                    <div style="padding: 1.5rem;" class="schedule-card">
                        <div class="client-avatar-large">
                            <img alt="Mr. Silva" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6XEdrc0nXc3xIj-Kb6mR-Puo88Cks7w67ymcy3zDC66S08KwIF2Bp2iZVi6vWvt0Fy8KAKHm3tZeH_L7oWWPHpmxO8lZol5i-zjQMWtuAj4QfJenH6zN6_PKADaxCO6Rhw1e2X9eov7E6RIaIr2g1tT4EdqhaomguYkRtp9Y29W1WHDsb_Ns5-RuICOPTVYTcQu4J9OYUXXr5Zj_Yv14khK1ygw_OlYFUKjDeoMrLdVfHQzB5xFfpkC4Y179mbUq5lQk9hfcAdYY">
                        </div>
                        <div class="schedule-details">
                            <div class="schedule-header">
                                <div>
                                    <h3 class="schedule-title">Mr. Silva - Post-Op Care</h3>
                                    <div class="schedule-meta">
                                        <span class="meta-item"><span class="material-symbols-outlined" style="font-size:18px;" data-icon="schedule">schedule</span> 8:00 AM – 12:00 PM</span>
                                        <span class="meta-item"><span class="material-symbols-outlined" style="font-size:18px;" data-icon="location_on">location_on</span> Colombo 07</span>
                                    </div>
                                </div>
                                <span class="status-badge">Confirmed</span>
                            </div>
                            <div class="action-buttons">
                                <button class="btn-primary">Start Service</button>
                                <button class="btn-outline">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Availability Summary -->
            <section class="section-container">
                <h2 class="section-title" style="margin-bottom: 1.5rem;">Availability Summary</h2>
                <div class="card">
                    <div class="availability-grid">
                        <div class="avail-day">
                            <span class="avail-day-name">MON</span>
                            <div class="avail-box available"><span class="material-symbols-outlined" data-icon="check_circle">check_circle</span></div>
                            <span class="avail-status text-success">AVAILABLE</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">TUE</span>
                            <div class="avail-box full"><span class="material-symbols-outlined" data-icon="block">block</span></div>
                            <span class="avail-status text-variant">FULL</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">WED</span>
                            <div class="avail-box available"><span class="material-symbols-outlined" data-icon="check_circle">check_circle</span></div>
                            <span class="avail-status text-success">AVAILABLE</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">THU</span>
                            <div class="avail-box available"><span class="material-symbols-outlined" data-icon="check_circle">check_circle</span></div>
                            <span class="avail-status text-success">AVAILABLE</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">FRI</span>
                            <div class="avail-box available"><span class="material-symbols-outlined" data-icon="check_circle">check_circle</span></div>
                            <span class="avail-status text-success">AVAILABLE</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">SAT</span>
                            <div class="avail-box off"><span class="material-symbols-outlined" data-icon="event_busy">event_busy</span></div>
                            <span class="avail-status text-variant">OFF</span>
                        </div>
                        <div class="avail-day">
                            <span class="avail-day-name">SUN</span>
                            <div class="avail-box off"><span class="material-symbols-outlined" data-icon="event_busy">event_busy</span></div>
                            <span class="avail-status text-variant">OFF</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Upcoming Bookings Table -->
            <section class="section-container">
                <h2 class="section-title" style="margin-bottom: 1.5rem;">Booking Requests</h2>
                <div class="card card-no-pad">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $hasUpcoming = false;
                            if (!empty($bookings)):
                                foreach($bookings as $b):
                                    if ($b['status'] === 'completed' || $b['status'] === 'cancelled') continue;
                                    $hasUpcoming = true;
                            ?>
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <span class="client-name"><?= htmlspecialchars($b['patient_name']) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-time">
                                        <span class="date"><?= date('M d, Y', strtotime($b['created_at'])) ?></span>
                                        <span class="time">Booking #<?= $b['booking_id'] ?></span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge uppercase"><?= ucfirst(htmlspecialchars($b['status'])) ?></span>
                                </td>
                                <td class="text-right">
                                    <a href="/safehands_mvc/booking/details/<?= $b['booking_id'] ?>" class="action-link" style="text-decoration:none;">Details</a>
                                </td>
                            </tr>
                            <?php 
                                endforeach;
                            endif;
                            if (!$hasUpcoming): ?>
                            <tr>
                                <td colspan="4" style="text-align:center; padding:20px; color:#666;">No upcoming bookings.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <!-- Sidebar / Secondary Grid (4 Columns) -->
        <div class="side-column">
            
            <!-- Earnings Summary -->
            <div class="card">
                <div class="title-flex">
                    <h3 class="side-card-title">Earnings Summary</h3>
                    <span class="material-symbols-outlined text-primary cursor-pointer" data-icon="trending_up">trending_up</span>
                </div>
                <div class="earnings-grid">
                    <div class="earning-box">
                        <p class="earning-label">Released</p>
                        <p class="earning-value text-success">LKR 42,500</p>
                    </div>
                    <div class="earning-box">
                        <p class="earning-label">Held</p>
                        <p class="earning-value text-on-surface">LKR 8,200</p>
                    </div>
                    <div class="earning-box">
                        <p class="earning-label">This Month</p>
                        <p class="earning-value text-primary">LKR 94,800</p>
                    </div>
                    <div class="earning-box">
                        <p class="earning-label">Sessions</p>
                        <p class="earning-value text-on-surface">24 Total</p>
                    </div>
                </div>
            </div>

            <!-- Performance Overview -->
            <div class="card">
                <h3 class="side-card-title">Performance</h3>
                <div class="perf-list">
                    <div>
                        <div class="perf-item">
                            <span class="perf-label">Rating</span>
                            <div class="rating-val">
                                <span class="perf-value">4.9</span>
                                <span class="material-symbols-outlined star-icon" data-icon="star">star</span>
                            </div>
                        </div>
                        <div class="progress-bar-bg" style="margin-top:8px;">
                            <div class="progress-bar-fill"></div>
                        </div>
                    </div>
                    <div class="perf-item">
                        <span class="perf-label">Response Rate</span>
                        <span class="perf-value">100%</span>
                    </div>
                    <div class="perf-item">
                        <span class="perf-label">Completion Rate</span>
                        <span class="perf-value">96%</span>
                    </div>
                </div>
            </div>

            <!-- Pending Daily Reports — Only completed sessions -->
            <div class="card">
                <h3 class="side-card-title">Pending Reports</h3>
                <div class="report-list">
                    <?php 
                    $hasCompleted = false;
                    if (!empty($bookings)): 
                        foreach($bookings as $b): 
                            // Only show completed sessions here
                            if ($b['status'] !== 'completed') continue;
                            $hasCompleted = true;
                    ?>
                    <div class="report-item" style="border-bottom: 1px solid #eee; padding-bottom: 12px; margin-bottom: 12px;">
                        <div class="report-header" style="margin-bottom: 8px;">
                            <div>
                                <p class="report-name"><?= htmlspecialchars($b['patient_name']) ?></p>
                                <p class="report-time">Booking #<?= $b['booking_id'] ?> &middot; Completed</p>
                            </div>
                            <?php if (!empty($b['has_report'])): ?>
                                <span class="material-symbols-outlined report-icon" data-icon="check_circle" style="color:#4CAF50;">check_circle</span>
                            <?php else: ?>
                                <span class="material-symbols-outlined report-icon" data-icon="pending_actions" style="color:#FF9800;">pending_actions</span>
                            <?php endif; ?>
                        </div>
                        <div style="display:flex; gap:6px; flex-wrap:wrap;">
                            <?php if (empty($b['has_report'])): ?>
                                <a href="/safehands_mvc/booking/report/<?= $b['booking_id'] ?>" class="btn-report" style="text-decoration:none; text-align:center; flex:1; min-width:80px;">Submit Care Report</a>
                            <?php else: ?>
                                <a href="/safehands_mvc/careReport/index/<?= $b['booking_id'] ?>" class="btn-report" style="text-decoration:none; text-align:center; flex:1; min-width:50px; background:#4CAF50; color:white; border-color:#4CAF50;">View</a>
                                <a href="/safehands_mvc/booking/report/<?= $b['booking_id'] ?>" class="btn-report" style="text-decoration:none; text-align:center; flex:1; min-width:50px;">Edit</a>
                                <a href="/safehands_mvc/booking/deleteReport/<?= $b['booking_id'] ?>" class="btn-report" style="text-decoration:none; text-align:center; flex:1; min-width:50px; background:#f44336; color:white; border-color:#f44336;" onclick="return confirm('Are you sure you want to delete this care report?');">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php 
                        endforeach; 
                    endif; 
                    if (!$hasCompleted): ?>
                        <p style="font-size: 14px; color: #666; padding: 8px 0;">No completed sessions yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Recent Notifications -->
            <div class="card">
                <h3 class="side-card-title">Notifications</h3>
                <div class="notif-list">
                    <div class="notif-item border-b">
                        <div class="notif-icon success">
                            <span class="material-symbols-outlined" style="font-size:18px;" data-icon="check_circle">check_circle</span>
                        </div>
                        <div>
                            <p class="notif-title">Payout Released</p>
                            <p class="notif-desc">Your earnings for last week have been released.</p>
                        </div>
                    </div>
                    <div class="notif-item">
                        <div class="notif-icon primary">
                            <span class="material-symbols-outlined" style="font-size:18px;" data-icon="new_releases">new_releases</span>
                        </div>
                        <div>
                            <p class="notif-title">New Booking Request</p>
                            <p class="notif-desc">Mr. Perera requested a session for Oct 30.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action: Support Card -->
            <div class="support-card">
                <div class="support-content">
                    <h3 class="support-title">Need assistance?</h3>
                    <p class="support-desc">Our support team is available 24/7 to help you with your care services.</p>
                    <button class="btn-support">
                        <span class="material-symbols-outlined" data-icon="support_agent">support_agent</span>
                        Contact Support
                    </button>
                </div>
                <!-- Decorative background shapes -->
                <div class="decor-shape-1"></div>
                <div class="decor-shape-2"></div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <span class="brand-name">SafeHands</span>
            <span class="copyright">© 2024 SafeHands Healthcare. All rights reserved.</span>
        </div>
        <div class="footer-links">
            <a class="footer-link" href="#">Privacy Policy</a>
            <a class="footer-link" href="#">Terms</a>
            <a class="footer-link" href="#">Help Center</a>
        </div>
    </div>
</footer>

<script src="/safehands_mvc/public/assets/js/caregiver-dashboard.js?v=1"></script>
</body>
</html>
