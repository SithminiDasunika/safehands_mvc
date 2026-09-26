<?php

$summary = $summary ?? [];
$reports = $reports ?? [];

?>

<!-- NAVBAR -->

<nav class="top-navbar">

    <div class="navbar-container">

        <div class="nav-left">

            <a href="/safehands_mvc/family" class="brand">
                SafeHands
            </a>

            <div class="nav-links">

                <a href="/safehands_mvc/family">
                    Dashboard
                </a>

                <a href="/safehands_mvc/patient">
                    Patients
                </a>

                <a href="/safehands_mvc/caregiver">
                    Find Caregivers
                </a>

                <a href="/safehands_mvc/bookings">
                    My Bookings
                </a>

            </div>

        </div>


        <div class="nav-right">

            <button
                type="button"
                class="notification-button"
                id="notificationButton"
            >
                🔔
            </button>


            <button
                type="button"
                class="account-button"
            >
                👤
            </button>

        </div>

    </div>

</nav>


<!-- MAIN -->

<main class="main-container">


    <!-- BREADCRUMB + HEADER -->

    <section class="page-header">

        <div class="breadcrumb">

            <a href="/safehands_mvc/family">
                Dashboard
            </a>

            <span>
                ›
            </span>

            <a href="/safehands_mvc/bookings">
                My Bookings
            </a>

            <span>
                ›
            </span>

            <strong>
                Daily Care Reports
            </strong>

        </div>


        <h1>
            Daily Care Reports
        </h1>

        <p>
            Review reports submitted by caregivers after each
            completed care session.
        </p>

    </section>


    <!-- SUMMARY CARD -->

    <section class="summary-card">

        <div class="summary-patient">

            <img
                src="<?= htmlspecialchars($summary['patient_image']) ?>"
                alt="<?= htmlspecialchars($summary['patient']) ?>"
            >

            <div>

                <span class="summary-label">
                    Patient
                </span>

                <h2>
                    <?= htmlspecialchars($summary['patient']) ?>
                </h2>

            </div>

        </div>


        <div class="summary-divider"></div>


        <div class="summary-item">

            <span class="summary-label">
                Caregiver
            </span>

            <div class="caregiver-summary">

                <span class="medical-icon">
                    ✚
                </span>

                <strong>
                    <?= htmlspecialchars($summary['caregiver']) ?>
                </strong>

            </div>

        </div>


        <div class="summary-divider"></div>


        <div class="summary-item">

            <span class="summary-label">
                Booking Details
            </span>

            <p>
                ID:
                <?= htmlspecialchars($summary['booking_id']) ?>
            </p>

        </div>


        <div class="summary-status">

            <span class="in-progress-status">

                <span class="pulse-dot"></span>

                <?= htmlspecialchars($summary['status']) ?>

            </span>

        </div>

    </section>


    <!-- SEARCH AND FILTER -->

    <section class="filter-bar">

        <div class="search-container">

            <span class="search-icon">
                🔍
            </span>

            <input
                type="text"
                id="reportSearch"
                placeholder="Search by date or keyword..."
            >

        </div>


        <div class="filter-controls">

            <select id="reportFilter">

                <option value="all">
                    All Reports
                </option>

                <option value="newest">
                    Newest First
                </option>

                <option value="oldest">
                    Oldest First
                </option>

                <option value="morning">
                    Morning Shift
                </option>

                <option value="afternoon">
                    Afternoon Shift
                </option>

                <option value="evening">
                    Evening Shift
                </option>

            </select>


            <button
                type="button"
                id="filterButton"
                class="filter-button"
            >
                ⚙
            </button>

        </div>

    </section>


    <!-- REPORT GRID -->

    <section
        class="report-grid"
        id="reportGrid"
    >

        <?php foreach ($reports as $report): ?>

            <article
                class="report-card"
                data-date="<?= htmlspecialchars($report['date']) ?>"
                data-shift="<?= htmlspecialchars($report['shift']) ?>"
                data-status="<?= htmlspecialchars($report['status']) ?>"
                data-caregiver="<?= htmlspecialchars($report['caregiver']) ?>"
            >

                <div class="report-top">

                    <div>

                        <span class="report-date">
                            <?= htmlspecialchars($report['date']) ?>
                        </span>

                        <span class="report-shift">
                            <?= htmlspecialchars($report['shift']) ?>
                        </span>

                    </div>


                    <span
                        class="report-status <?= htmlspecialchars($report['status_type']) ?>"
                    >

                        <?php if ($report['status_type'] === 'stable'): ?>

                            ✓

                        <?php elseif ($report['status_type'] === 'attention'): ?>

                            !

                        <?php else: ?>

                            i

                        <?php endif; ?>

                        <?= htmlspecialchars($report['status']) ?>

                    </span>

                </div>


                <!-- CAREGIVER -->

                <div class="report-caregiver">

                    <img
                        src="<?= htmlspecialchars($report['image']) ?>"
                        alt="<?= htmlspecialchars($report['caregiver']) ?>"
                    >

                    <div>

                        <span>
                            Caregiver
                        </span>

                        <strong>
                            <?= htmlspecialchars($report['caregiver']) ?>
                        </strong>

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <p class="report-description">

                    <?= htmlspecialchars($report['description']) ?>

                </p>


                <!-- ACTION -->

                <div class="report-action">

                <a
    href="/safehands_mvc/care-report/show/<?= htmlspecialchars($report['id']) ?>"
    class="view-report-button"
>
    View Full Report

    <span>
        →
    </span>
</a>


                </div>

            </article>

        <?php endforeach; ?>


        <!-- NO RESULTS -->

        <div
            id="noReports"
            class="no-reports"
            style="display:none;"
        >

            <div class="no-report-icon">
                🔍
            </div>

            <h3>
                No reports found
            </h3>

            <p>
                Try changing your search or filter.
            </p>

        </div>

    </section>


    <!-- PAGINATION -->

    <div class="pagination">

        <button
            type="button"
            disabled
        >
            ‹
        </button>

        <button
            type="button"
            class="current"
        >
            1
        </button>

        <button type="button">
            2
        </button>

        <button type="button">
            3
        </button>

        <button type="button">
            ›
        </button>

    </div>

</main>


<!-- FOOTER -->

<footer class="footer">

    <div class="footer-container">

        <div>

            <h3>
                SafeHands
            </h3>

            <p>
                © 2024 SafeHands Healthcare.
                All rights reserved.
            </p>

        </div>


        <div class="footer-links">

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

        </div>

    </div>

</footer>


<!-- TOAST -->

<div
    id="toast"
    class="toast"
></div>