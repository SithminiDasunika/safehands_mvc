<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'My Bookings | SafeHands') ?>
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/bookings.css"
    >

</head>


<body>

<header class="top-header">

    <div class="header-inner">

        <a
            href="/safehands_mvc/family"
            class="brand"
        >
            SafeHands
        </a>


        <nav class="main-nav">

            <a href="/safehands_mvc/family">
                Dashboard
            </a>

            <a href="/safehands_mvc/patients">
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


        <div class="header-actions">

            <button
                type="button"
                class="header-icon"
                id="notificationButton"
            >
                •
            </button>

            <button
                type="button"
                class="profile-button"
            >
                ◯
            </button>

        </div>

    </div>

</header>


<main class="main-content">

    <?= $content ?>

</main>


<footer class="footer">

    <div class="footer-inner">

        <div class="footer-brand">
            SafeHands
        </div>


        <nav>

            <a href="#">
                Privacy Policy
            </a>

            <a href="#">
                Terms of Service
            </a>

            <a href="#">
                HIPAA Compliance
            </a>

            <a href="#">
                Contact Us
            </a>

        </nav>


        <div class="copyright">
            © 2026 SafeHands. All rights reserved.
        </div>

    </div>

</footer>


<script src="/safehands_mvc/public/assets/js/bookings.js"></script>

</body>

</html>