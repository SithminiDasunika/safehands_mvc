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
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-dashboard.css?v=1">
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
                <a class="nav-link" href="/safehands_mvc/caregiver/schedule">Emergency Contact Information</a>
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
        <a href="/safehands_mvc/caregiver/schedule" class="quick-action-card">
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
        <a href="#" class="quick-action-card">
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
                    <a href="/safehands_mvc/caregiver/schedule" class="section-link">View Calendar</a>
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
                <h2 class="section-title" style="margin-bottom: 1.5rem;">Upcoming Bookings</h2>
                <div class="card card-no-pad">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Date &amp; Time</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <div class="client-avatar">
                                            <img alt="Mrs. Perera" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAN-mrLhtu09J5mZYquggVhJBAOX2H58CY4oAiU7LaWUgJnHF-pO_PKl2Zk4fk0u6I4u4Rs1ubvDVIH9AxyD5IsF_1PUTYbwNvbzfhh8QhzdRtrYRpQAeeTNPCZKOXHC9Es8ztXxa2VdyGWnhYmtznYHPNh4iz_ipsCd7ET2SauzgsA9G39BqEgG1q2ivrj7VbABuyyKi1393REWOK_VeYgWVq2tff9bhhdtYK7DkBT6npsLzngjtGaz4XFthEPmSZCrelLqBPLP3U">
                                        </div>
                                        <span class="client-name">Mrs. Perera</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-time">
                                        <span class="date">Oct 25, 2024</span>
                                        <span class="time">09:00 AM – 1:00 PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge uppercase">Confirmed</span>
                                </td>
                                <td class="text-right">
                                    <button class="action-link">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <div class="client-avatar">
                                            <img alt="Mr. Fernando" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlCBP1WtHSAQwsanlr8DavO3hFVeN1C5_Q684bj1kCkPz3ipltmlaEVrr2dFTqwyQGi0Kgp1k4rdSM743YegerSmZ59htE0qAqOOOU8SnzKZg83lWMxFI28KSoH70ycW8FdszWVKEPSiqJApOLdHWCe6KOiYWVsquoQRxGHs0fd6HhiTAXmVE_rJoKcgfci7jtFFJbbF354A2NRvyJyjVWgQ5NjL3r5U9jT46iCORNzoQ5NQCPOQjitM8Su0HxxlP8j3mgV7vTl9Q">
                                        </div>
                                        <span class="client-name">Mr. Fernando</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-time">
                                        <span class="date">Oct 26, 2024</span>
                                        <span class="time">2:00 PM – 6:00 PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge uppercase">Confirmed</span>
                                </td>
                                <td class="text-right">
                                    <button class="action-link">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <div class="client-avatar">
                                            <img alt="Ms. Jayamaha" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4IqPZ9xtIwZV6ht0HTpSv9TrvuprekRN32mthdVfVLtMzrY2CzTUs7Q0eM2mvtCR_yspxokjuBtQTsJ384dxpObn2buI_JAw2x853ex9YjCg1kNHABRl-Wz_vapOsmZw3Hoqm-kwHB3wSuIIih8AMin2LnLfuPGwLvHptukTnr1qJhd83sFP0JYZ750BFjVGPeISS6lhdC4xyJUWaUKmLYowLXZvmeHkVB79aq90XtgUUWb4Xi-hCFV863H7lhjv0OxfSG6-qN_M">
                                        </div>
                                        <span class="client-name">Ms. Jayamaha</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-time">
                                        <span class="date">Oct 27, 2024</span>
                                        <span class="time">10:00 AM – 2:00 PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge uppercase">Confirmed</span>
                                </td>
                                <td class="text-right">
                                    <button class="action-link">Details</button>
                                </td>
                            </tr>
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

            <!-- Pending Daily Reports -->
            <div class="card">
                <h3 class="side-card-title">Pending Reports</h3>
                <div class="report-list">
                    <div class="report-item">
                        <div class="report-header">
                            <div>
                                <p class="report-name">Mrs. Abeywickrama</p>
                                <p class="report-time">Yesterday, 4:00 PM</p>
                            </div>
                            <span class="material-symbols-outlined report-icon" data-icon="pending_actions">pending_actions</span>
                        </div>
                        <button class="btn-report">Complete Report</button>
                    </div>
                    <div class="report-item">
                        <div class="report-header">
                            <div>
                                <p class="report-name">Mr. Samaranayake</p>
                                <p class="report-time">Oct 22, 10:00 AM</p>
                            </div>
                            <span class="material-symbols-outlined report-icon" data-icon="pending_actions">pending_actions</span>
                        </div>
                        <button class="btn-report">Complete Report</button>
                    </div>
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
