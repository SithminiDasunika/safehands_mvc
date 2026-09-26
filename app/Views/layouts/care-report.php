<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'Daily Care Report | SafeHands') ?>
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/care-report.css?v=2"
    >

</head>


<body>

    <header class="top-header">

        <div class="header-inner">

            <div class="brand-area">

                                <a
                    href="<?= (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'caregiver') ? '/safehands_mvc/caregiver/dashboard' : '/safehands_mvc/family' ?>"
                    class="brand"
                >
                    SafeHands
                </a>


                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'caregiver'): ?>
                <style>
                    :root {
                        --primary: #059669;
                        --primary-container: #10b981;
                        --surface-low: #f0fdf4;
                    }
                </style>
                <nav class="main-nav">
                    <a href="/safehands_mvc/caregiver/dashboard">Dashboard</a>
                    <a href="/safehands_mvc/bookings">Booking Requests</a>
                    <a href="/safehands_mvc/caregiver/schedule">Emergency Contact Information</a>
                    <a href="/safehands_mvc/caregiver/manageAvailability">Availability</a>
                    <a href="/safehands_mvc/caregiver/earnings">Earnings</a>
                    <a href="/safehands_mvc/caregiver/notifications">Notifications</a>
                </nav>
                <?php else: ?>
                <nav class="main-nav">

                    <a href="/safehands_mvc/family">
                        Dashboard
                    </a>

                    <a href="/safehands_mvc/patient">
                        Patients
                    </a>

                    <a href="/safehands_mvc/caregiver">
                        Find Caregivers
                    </a>

                    <a
                        href="/safehands_mvc/bookings"
                        class="active"
                    >
                        My Bookings
                    </a>

                </nav>
                <?php endif; ?>

            </div>


            <div class="header-actions">

                <button
                    type="button"
                    class="notification-button"
                    id="notificationButton"
                    aria-label="Notifications"
                >

                    <span class="material-icon">
                        notifications
                    </span>

                    <span class="notification-dot"></span>

                </button>


                <div class="profile-icon">

                    <span class="material-icon">
                        person
                    </span>

                </div>

            </div>

        </div>

    </header>


    <main class="main-content">

        <?= $content ?>

    </main>


    <footer class="footer">

        <div class="footer-inner">

            <div>
                © 2026 SafeHands. All rights reserved.
            </div>

            <div class="footer-links">

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Contact Support
                </a>

                <a href="#">
                    Help Center
                </a>

            </div>

        </div>

    </footer>


    <script src="/safehands_mvc/public/assets/js/care-report.js?v=1790335429"></script>

</body>

</html>