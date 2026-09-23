<div class="family-page">

    <!-- =========================
         NAVIGATION
    ========================== -->
    <nav class="family-navbar">

        <div class="family-nav-inner">

            <div class="family-brand">
                
                <span>SafeHands</span>
            </div>

            <div class="family-nav-links">

                <a
                    href="/safehands_mvc/family"
                    class="active"
                >
                    Dashboard
                </a>

                <a href="/safehands_mvc/patient">
                    Patients
                </a>

                <a href="/safehands_mvc/caregiver">
                    Find Caregivers
                </a>

                <a href="/safehands_mvc/booking">
                    My Bookings
                </a>

            </div>

            <div class="family-nav-right">

                <button
                    type="button"
                    class="notification-button"
                    title="Notifications"
                >
                    <svg viewBox="0 0 24 24">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </button>

                <div class="family-avatar">
                    <?= strtoupper(substr($family['name'], 0, 1)) ?>
                </div>

                <a
                    href="/safehands_mvc/login/logout"
                    class="logout-button"
                >
                    <svg viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>

                    Logout
                </a>

            </div>

        </div>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================== -->
    <main class="family-container">

        <div class="ambient-glow"></div>


        <!-- HEADER -->
        <header class="family-header">

            <div>

                <h1>
                    Welcome Back, <?= htmlspecialchars($family['name']) ?>
                </h1>

                <p>
                    Manage your family's health and care schedule seamlessly.
                </p>

            </div>

            <div class="family-date">

                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>

                <span>
                    <?= htmlspecialchars($family['date']) ?>
                </span>

            </div>

        </header>


        <!-- =========================
             BENTO GRID
        ========================== -->
        <div class="family-grid">


            <!-- =========================
                 LEFT COLUMN
            ========================== -->
            <div class="family-left">


                <!-- QUICK ACTIONS -->
                <div class="quick-actions">

                    <!-- Add Patient -->
                    <a
                        href="/safehands_mvc/patient/create"
                        class="quick-card"
                    >

                        <div class="quick-icon">

                            <svg viewBox="0 0 24 24">
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a6 6 0 0 1 12 0v2"></path>
                                <line x1="19" y1="8" x2="19" y2="14"></line>
                                <line x1="16" y1="11" x2="22" y2="11"></line>
                            </svg>

                        </div>

                        <h3>Add Patient</h3>

                        <p>
                            Register a new family member.
                        </p>

                    </a>


                    <!-- Find Caregiver -->
                    <a
                        href="/safehands_mvc/caregiver"
                        class="quick-card"
                    >

                        <div class="quick-icon">

                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"></circle>
                                <line x1="20" y1="20" x2="16" y2="16"></line>
                            </svg>

                        </div>

                        <h3>Find Caregiver</h3>

                        <p>
                            Search professional caregivers.
                        </p>

                    </a>


                    <!-- My Bookings -->
                    <a
                        href="/safehands_mvc/booking"
                        class="quick-card"
                    >

                        <div class="quick-icon">

                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="17" rx="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <path d="M8 15h2"></path>
                                <path d="M14 15h2"></path>
                            </svg>

                        </div>

                        <h3>My Bookings</h3>

                        <p>
                            Manage your care sessions.
                        </p>

                    </a>


                    <!-- Notifications -->
                    <a
                        href="/safehands_mvc/notification"
                        class="quick-card"
                    >

                        <div class="quick-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>

                        </div>

                        <h3>Notifications</h3>

                        <p>
                            Stay updated on reports.
                        </p>

                    </a>

                </div>


                <!-- STATISTICS -->
                <div class="stats-card">

                    <div class="stat-item">

                        <span class="stat-label">
                            Registered
                        </span>

                        <strong>
                            <?= $family['stats']['patients'] ?>
                        </strong>

                        <span class="stat-description">
                            Patients
                        </span>

                    </div>


                    <div class="stat-item">

                        <span class="stat-label">
                            Upcoming
                        </span>

                        <strong>
                            <?= $family['stats']['upcoming'] ?>
                        </strong>

                        <span class="stat-description">
                            Sessions
                        </span>

                    </div>


                    <div class="stat-item">

                        <span class="stat-label">
                            Active
                        </span>

                        <strong>
                            <?= $family['stats']['active'] ?>
                        </strong>

                        <span class="stat-description">
                            Bookings
                        </span>

                    </div>


                    <div class="stat-item">

                        <span class="stat-label">
                            Completed
                        </span>

                        <strong>
                            <?= $family['stats']['completed'] ?>
                        </strong>

                        <span class="stat-description">
                            Sessions
                        </span>

                    </div>

                </div>


                <!-- UPCOMING CARE -->
                <section class="dashboard-section">

                    <div class="section-heading">

                        <h2>
                            Upcoming Care Sessions
                        </h2>

                        <button type="button">
                            View Calendar
                        </button>

                    </div>


                    <div class="sessions-list">

                        <?php foreach ($family['sessions'] as $session): ?>

                            <div class="session-card">

                                <div class="session-date">

                                    <span>
                                        <?= htmlspecialchars($session['month']) ?>
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($session['day']) ?>
                                    </strong>

                                </div>


                                <div class="session-info">

                                    <div class="session-meta">

                                        <span class="session-status">
                                            <?= htmlspecialchars($session['status']) ?>
                                        </span>

                                        <span>
                                            <?= htmlspecialchars($session['shift']) ?>
                                        </span>

                                    </div>

                                    <h3>
                                        <?= htmlspecialchars($session['caregiver']) ?>
                                    </h3>

                                    <p>
                                        Assisting
                                        <strong>
                                            <?= htmlspecialchars($session['patient']) ?>
                                        </strong>
                                    </p>

                                </div>


                                <div class="session-actions">

                                    <button
                                        type="button"
                                        class="secondary-button"
                                    >
                                        Details
                                    </button>

                                    <button
                                        type="button"
                                        class="primary-button"
                                    >
                                        Contact
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </section>


                <!-- EMERGENCY SUPPORT -->
                <section class="emergency-card">

                    <div class="emergency-background">
                        +
                    </div>

                    <div class="emergency-content">

                        <h3>
                            Emergency Support
                        </h3>

                        <p>
                            Urgent assistance needed? Our 24/7 medical response
                            team is a tap away.
                        </p>


                        <div class="emergency-dropdown">

                            <button
                                type="button"
                                id="helplineButton"
                                class="helpline-button"
                            >
                                <span>
                                    Call Helpline
                                </span>

                                <span class="arrow">
                                    ↓
                                </span>
                            </button>


                            <div
                                id="helplineMenu"
                                class="helpline-menu"
                            >

                                <a href="tel:1990">

                                    <span>
                                        Ambulance (Suwa Seriya)
                                    </span>

                                    <strong>
                                        1990
                                    </strong>

                                </a>

                                <a href="tel:119">

                                    <span>
                                        Local Police
                                    </span>

                                    <strong>
                                        119
                                    </strong>

                                </a>

                                <a href="tel:1566">

                                    <span>
                                        Lanka Hospitals
                                    </span>

                                    <strong>
                                        1566
                                    </strong>

                                </a>

                            </div>

                        </div>

                    </div>

                </section>

            </div>


            <!-- =========================
                 RIGHT COLUMN
            ========================== -->
            <aside class="family-right">


                <!-- PATIENT OVERVIEW -->
                <section>

                    <h2 class="side-title">
                        Patient Overview
                    </h2>


                    <div class="patient-list">

                        <?php foreach ($family['patients'] as $patient): ?>

                            <div class="patient-card">

                                <div class="patient-top">

                                    <div class="patient-avatar">
                                        <?= htmlspecialchars($patient['initials']) ?>
                                    </div>

                                    <div>

                                        <h3>
                                            <?= htmlspecialchars($patient['name']) ?>
                                        </h3>

                                        <p>
                                            Age <?= htmlspecialchars($patient['age']) ?>
                                            •
                                            <?= htmlspecialchars($patient['condition']) ?>
                                        </p>

                                    </div>

                                </div>


                                <div class="patient-bottom">

                                    <span class="patient-status">

                                        <span></span>

                                        <?= htmlspecialchars($patient['status']) ?>

                                    </span>

                                    <button type="button">
                                        View Patient
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </section>


                <!-- BOOKING STATUS -->
                <section class="booking-status-card">

                    <h3>
                        Booking Status
                    </h3>


                    <div class="progress-item">

                        <div class="progress-heading">
                            <span>Confirmed</span>
                            <strong>45%</strong>
                        </div>

                        <div class="progress-bar">
                            <div style="width:45%"></div>
                        </div>

                    </div>


                    <div class="progress-item">

                        <div class="progress-heading">
                            <span>In Progress</span>
                            <strong>20%</strong>
                        </div>

                        <div class="progress-bar">
                            <div
                                class="success"
                                style="width:20%"
                            ></div>
                        </div>

                    </div>


                    <div class="progress-item">

                        <div class="progress-heading">
                            <span>Awaiting OTP</span>
                            <strong>10%</strong>
                        </div>

                        <div class="progress-bar">
                            <div
                                class="warning"
                                style="width:10%"
                            ></div>
                        </div>

                    </div>


                    <div class="progress-item">

                        <div class="progress-heading">
                            <span>Completed</span>
                            <strong>25%</strong>
                        </div>

                        <div class="progress-bar">
                            <div
                                class="secondary"
                                style="width:25%"
                            ></div>
                        </div>

                    </div>

                </section>


                <!-- RECENT ACTIVITY -->
                <section class="activity-card">

                    <h2>
                        Recent Activity
                    </h2>


                    <div class="activity-list">

                        <div class="activity-item">

                            <div class="activity-icon">
                                ✓
                            </div>

                            <div>

                                <h4>
                                    Booking Confirmed
                                </h4>

                                <p>
                                    Shift with Nadeesha P. for Mr. Silva
                                </p>

                                <span>
                                    10:45 AM, Today
                                </span>

                            </div>

                        </div>


                        <div class="activity-item">

                            <div class="activity-icon payment">
                                $
                            </div>

                            <div>

                                <h4>
                                    Payment Received
                                </h4>

                                <p>
                                    Invoice #SH-9821 successfully paid.
                                </p>

                                <span>
                                    09:12 AM, Today
                                </span>

                            </div>

                        </div>


                        <div class="activity-item">

                            <div class="activity-icon report">
                                ≡
                            </div>

                            <div>

                                <h4>
                                    Care Report Available
                                </h4>

                                <p>
                                    Evening shift report for Mrs. Kumari.
                                </p>

                                <span>
                                    Yesterday, 11:30 PM
                                </span>

                            </div>

                        </div>

                    </div>

                </section>

            </aside>

        </div>


        <!-- =========================
             TRUST BANNER
        ========================== -->
        <section class="trust-banner">

            <div class="trust-overlay"></div>

            <div class="trust-content">

                <h2>
                    Professional Care for Your Loved Ones
                </h2>

                <p>
                    SafeHands ensures every caregiver is verified,
                    trained, and matched specifically to your family's
                    unique medical requirements.
                </p>

                <a
                    href="/safehands_mvc/caregiver"
                    class="trust-button"
                >
                    Learn about our Verification Process

                    <span>
                        →
                    </span>
                </a>

            </div>

        </section>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->
    <footer class="family-footer">

        <div class="footer-inner">

            <div>

                <strong>
                    SafeHands
                </strong>

                <span>
                    © 2024 CareCloud Healthcare Systems.
                    All rights reserved.
                </span>

            </div>

            <div class="footer-links">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Contact Support
                </a>

                <a href="#">
                    Legal Notice
                </a>

            </div>

        </div>

    </footer>

</div>