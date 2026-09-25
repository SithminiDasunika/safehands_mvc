<?php

$report = $report ?? [];

?>

<nav class="top-navbar">

    <div class="navbar-container">

        <div class="nav-left">

            <a href="/safehands_mvc/" class="brand">
                SafeHands
            </a>

            <div class="nav-links">

                <a href="/safehands_mvc/">Dashboard</a>
                <a href="#">Patients</a>
                <a href="#">Find Caregivers</a>

                <a href="/safehands_mvc/bookings">
                    My Bookings
                </a>

            </div>

        </div>

        <div class="nav-right">

            <button type="button" class="notification-button">
                🔔
            </button>

            <button type="button" class="account-button">
                👤
            </button>

        </div>

    </div>

</nav>


<main class="view-report-container">

    <!-- Breadcrumb -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/">
            Dashboard
        </a>

        <span>›</span>

        <a href="/safehands_mvc/bookings">
            My Bookings
        </a>

        <span>›</span>

        <a href="/safehands_mvc/care-reports">
            Daily Care Reports
        </a>

        <span>›</span>

        <strong>
            View Report
        </strong>

    </div>


    <!-- Page Header -->

    <section class="view-report-header">

        <div>

            <h1>
                Daily Care Report
            </h1>

            <p>
                Complete details of the care session.
            </p>

        </div>

        <div class="view-header-actions">

            <a
                href="/safehands_mvc/care-reports/edit/<?= (int)$report['report_id'] ?>"
                class="edit-report-button"
            >
                ✎ Edit Report
            </a>

            <a
                href="/safehands_mvc/care-reports"
                class="back-report-button"
            >
                ← Back
            </a>

        </div>

    </section>


    <!-- Basic Information -->

    <section class="report-detail-card">

        <div class="detail-card-header">

            <h2>
                Basic Information
            </h2>

        </div>


        <div class="detail-grid">

            <div class="detail-item">

                <span class="detail-label">
                    Patient Name
                </span>

                <strong>
                    <?= htmlspecialchars($report['patient_name']) ?>
                </strong>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Caregiver
                </span>

                <strong>
                    Caregiver #<?= (int)$report['caregiver_id'] ?>
                </strong>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Booking ID
                </span>

                <strong>
                    <?= htmlspecialchars(
                        $report['booking_id'] ?: 'N/A'
                    ) ?>
                </strong>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Report Date
                </span>

                <strong>
                    <?= htmlspecialchars($report['report_date']) ?>
                </strong>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Shift
                </span>

                <strong>
                    <?= htmlspecialchars($report['shift']) ?>
                </strong>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Condition Status
                </span>

                <strong class="condition-status">
                    <?= htmlspecialchars($report['condition_status']) ?>
                </strong>

            </div>

        </div>

    </section>


    <!-- Care Details -->

    <section class="report-detail-card">

        <div class="detail-card-header">

            <h2>
                Care Details
            </h2>

        </div>


        <div class="care-detail-list">


            <div class="care-detail-item">

                <h3>
                    Activities
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars(
                            $report['activities']
                            ?: 'No activities recorded.'
                        )
                    ) ?>
                </p>

            </div>


            <div class="care-detail-item">

                <h3>
                    Medication
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars(
                            $report['medication']
                            ?: 'No medication recorded.'
                        )
                    ) ?>
                </p>

            </div>


            <div class="care-detail-item">

                <h3>
                    Meal
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars(
                            $report['meal']
                            ?: 'No meal information recorded.'
                        )
                    ) ?>
                </p>

            </div>


            <div class="care-detail-item">

                <h3>
                    Vitals
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars(
                            $report['vitals']
                            ?: 'No vitals recorded.'
                        )
                    ) ?>
                </p>

            </div>


            <div class="care-detail-item">

                <h3>
                    Additional Notes
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars(
                            $report['notes']
                            ?: 'No additional notes.'
                        )
                    ) ?>
                </p>

            </div>


        </div>

    </section>


    <!-- Actions -->

    <section class="report-detail-actions">

        <a
            href="/safehands_mvc/care-reports/edit/<?= (int)$report['report_id'] ?>"
            class="edit-report-button"
        >
            ✎ Edit Report
        </a>

        <a
            href="/safehands_mvc/care-reports"
            class="back-report-button"
        >
            Back to Care Reports
        </a>

    </section>


</main>


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