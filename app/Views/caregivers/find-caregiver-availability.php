 <?php

$caregiver = $caregiver ?? [];

$name = $caregiver['name'] ?? 'Caregiver';
$specialization = $caregiver['specialization'] ?? 'Caregiver';
$district = $caregiver['district'] ?? 'Not specified';
$experience = $caregiver['experience'] ?? 'Not specified';
$rating = $caregiver['rating'] ?? '0.0';
$languages = $caregiver['languages'] ?? [];
$image = $caregiver['image'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($name) ?> | Availability | SafeHands
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/availability.css?v=2"
    >

</head>


<body>

<!-- ========================================================= -->
<!-- NAVIGATION -->
<!-- ========================================================= -->

<header class="site-header">

    <div class="header-container">

        <!-- Logo -->

        <div class="header-left">

            <a
                href="/safehands_mvc/"
                class="logo"
            >
                SafeHands
            </a>


            <!-- Navigation -->

            <nav class="main-navigation">

                <a href="/safehands_mvc/">
                    Dashboard
                </a>

                <a href="#">
                    Patients
                </a>

                <a
                    href="/safehands_mvc/caregiver"
                    class="active"
                >
                    Find Caregivers
                </a>

                <a href="#">
                    My Bookings
                </a>

            </nav>

        </div>


        <!-- Right side -->

        <div class="header-right">

            <!-- Notification -->

            <button
                type="button"
                class="notification-button"
                aria-label="Notifications"
            >
                🔔
            </button>


            <!-- User -->

            <div class="user-area">

                <div class="user-avatar">
                    AM
                </div>

                <span class="user-name">
                    Aditya Mendis
                </span>

                <span class="dropdown-arrow">
                    ▼
                </span>

            </div>

        </div>

    </div>

</header>



<!-- ========================================================= -->
<!-- MAIN -->
<!-- ========================================================= -->

<main class="main-container">


    <!-- Breadcrumb -->

    <nav class="breadcrumb">

        <a href="/safehands_mvc/">
            Dashboard
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <a href="/safehands_mvc/caregiver">
            Find Caregivers
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <span class="breadcrumb-current">
            Caregiver Availability
        </span>

    </nav>



    <!-- ===================================================== -->
    <!-- CAREGIVER HEADER -->
    <!-- ===================================================== -->

    <section class="caregiver-header">

        <div class="caregiver-header-content">


            <!-- Image -->

            <div class="profile-image-container">

                <div
                    class="profile-image"
                    style="background-image: url('<?= htmlspecialchars($image) ?>');"
                ></div>

                <div class="verified-badge">
                    ✓
                </div>

            </div>


            <!-- Details -->

            <div class="caregiver-details">

                <div class="caregiver-title-row">

                    <h1>
                        <?= htmlspecialchars($name) ?>
                    </h1>

                    <span class="booking-status">

                        <span class="status-dot"></span>

                        Currently Accepting Bookings

                    </span>

                </div>


                <p class="specialization">
                    <?= htmlspecialchars($specialization) ?>
                </p>


                <div class="caregiver-info-grid">


                    <!-- Rating -->

                    <div class="info-item">

                        <span class="info-icon rating-icon">
                            ★
                        </span>

                        <span>
                            <?= htmlspecialchars($rating) ?>
                        </span>

                    </div>


                    <!-- Location -->

                    <div class="info-item">

                        <span class="info-icon">
                            📍
                        </span>

                        <span>
                            <?= htmlspecialchars($district) ?>
                        </span>

                    </div>


                    <!-- Languages -->

                    <div class="info-item">

                        <span class="info-icon">
                            A
                        </span>

                        <span>
                            <?= htmlspecialchars(
                                implode(', ', $languages)
                            ) ?>
                        </span>

                    </div>


                    <!-- Experience -->

                    <div class="info-item">

                        <span class="info-icon">
                            ◷
                        </span>

                        <span>
                            <?= htmlspecialchars($experience) ?>
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ===================================================== -->
    <!-- AVAILABILITY CALENDAR -->
    <!-- ===================================================== -->

    <section class="availability-section">


        <!-- Calendar header -->

        <div class="calendar-header">

            <h2>
                Availability Calendar
            </h2>


            <div class="calendar-controls">

                <h3>
                    July 2026
                </h3>


                <div class="month-buttons">

                    <button
                        type="button"
                        class="month-button"
                        title="Previous Month"
                    >
                        ‹
                    </button>


                    <button
                        type="button"
                        class="month-button"
                        title="Next Month"
                    >
                        ›
                    </button>

                </div>

            </div>

        </div>



        <!-- Calendar wrapper for mobile scrolling -->

        <div class="calendar-wrapper">

            <div class="calendar-grid">


                <!-- Week headers -->

                <?php

                $days = [
                    'Mon',
                    'Tue',
                    'Wed',
                    'Thu',
                    'Fri',
                    'Sat',
                    'Sun'
                ];

                foreach ($days as $day):

                ?>

                    <div class="calendar-day-header">
                        <?= $day ?>
                    </div>

                <?php endforeach; ?>



                <!-- Empty June days -->

                <div class="calendar-empty">
                    29
                </div>

                <div class="calendar-empty">
                    30
                </div>



                <!-- Day 1 -->

                <div class="calendar-day">

                    <span class="day-number">
                        1 Jul
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 MORNING
                        </div>

                        <div class="shift booked">
                            ⚫ AFTERNOON
                        </div>

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 2 -->

                <div class="calendar-day">

                    <span class="day-number">
                        2
                    </span>

                    <div class="shift-list">

                        <div class="shift booked">
                            ⚫ MORNING
                        </div>

                        <div class="shift booked">
                            ⚫ AFTERNOON
                        </div>

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 3 -->

                <div class="calendar-day">

                    <span class="day-number">
                        3
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 MORNING
                        </div>

                        <div class="shift available">
                            🟢 AFTERNOON
                        </div>

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 4 -->

                <div class="calendar-day">

                    <span class="day-number">
                        4
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 MORNING
                        </div>

                        <div class="shift booked">
                            ⚫ AFTERNOON
                        </div>

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 5 -->

                <div class="calendar-day">

                    <span class="day-number">
                        5
                    </span>

                    <div class="shift-list">

                        <div class="shift booked">
                            ⚫ MORNING
                        </div>

                        <div class="shift booked">
                            ⚫ AFTERNOON
                        </div>

                        <div class="shift booked">
                            ⚫ EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 6 -->

                <div class="calendar-day">

                    <span class="day-number">
                        6
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 MORNING
                        </div>

                    </div>

                </div>



                <!-- Day 7 -->

                <div class="calendar-day">

                    <span class="day-number">
                        7
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 8 -->

                <div class="calendar-day">

                    <span class="day-number">
                        8
                    </span>

                </div>



                <!-- Day 9 -->

                <div class="calendar-day">

                    <span class="day-number">
                        9
                    </span>

                    <div class="shift-list">

                        <div class="shift available">
                            🟢 MORNING
                        </div>

                        <div class="shift available">
                            🟢 EVENING
                        </div>

                    </div>

                </div>



                <!-- Day 10 Off Duty -->

                <div class="calendar-day off-duty-day">

                    <span class="off-duty-number">
                        10
                    </span>

                    <div class="off-duty-container">

                        <div class="shift off-duty">
                            🔴 OFF DUTY
                        </div>

                    </div>

                </div>



                <!-- Remaining days -->

                <?php for ($day = 11; $day <= 31; $day++): ?>

                    <div class="calendar-day">

                        <span class="day-number">
                            <?= $day ?>
                        </span>

                    </div>

                <?php endfor; ?>

            </div>

        </div>



        <!-- Legend -->

        <div class="calendar-legend">


            <div class="legend-item">

                <span class="legend-circle available-circle"></span>

                <span>
                    Available
                </span>

            </div>


            <div class="legend-item">

                <span class="legend-circle booked-circle"></span>

                <span>
                    Booked
                </span>

            </div>


            <div class="legend-item">

                <span class="legend-circle off-duty-circle"></span>

                <span>
                    Off Duty
                </span>

            </div>

        </div>

    </section>



    <!-- ===================================================== -->
    <!-- BOOK BUTTON -->
    <!-- ===================================================== -->

    <div class="booking-container">

        <a
            href="/safehands_mvc/book-caregiver/index/<?= (int)($caregiver['id'] ?? 0) ?>"
            class="booking-button"
        >

            <span>
                📅
            </span>

            Book <?= htmlspecialchars($name) ?> Now

        </a>

    </div>


</main>



<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer class="site-footer">

    <div class="footer-container">


        <span class="footer-logo">
            SafeHands
        </span>


        <div class="footer-links">

            <a href="#">
                Privacy Policy
            </a>

            <a href="#">
                Terms of Service
            </a>

            <a href="#">
                Cookie Policy
            </a>

            <a href="#">
                Accessibility
            </a>

        </div>


        <p>
            © 2024 SafeHands Healthcare Services. All rights reserved.
        </p>

    </div>

</footer>

</body>

</html>