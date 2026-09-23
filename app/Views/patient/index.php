<?php

$stats = $stats ?? [];

$patients = $patients ?? [];

$reports = $reports ?? [];

?>

<div class="patients-page">


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <nav class="top-navbar">

        <div class="nav-left">

            <a href="#" class="brand">
                SafeHands
            </a>


            <div class="nav-links">

                <a href="#">
                    Dashboard
                </a>

                <a href="#" class="active">
                    Patients
                </a>

                <a href="#">
                    Find Caregivers
                </a>

                <a href="#">
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
                <span>
                    ♧
                </span>
            </button>


            <div class="user-avatar">
                S
            </div>

        </div>

    </nav>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main-container">


        <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <a href="#">
                Dashboard
            </a>

            <span>
                ›
            </span>

            <strong>
                Patients
            </strong>

        </nav>



        <!-- =================================================
             PAGE HEADER
        ================================================== -->

        <div class="page-header">

            <div>

                <h1>
                    My Patients
                </h1>

                <p>
                    View and manage the people you care for through SafeHands.
                </p>

            </div>


            <button
                type="button"
                class="add-patient-button"
                id="addPatientButton"
            >

                <span class="plus-icon">
                    +
                </span>

                Add Patient

            </button>

        </div>



        <!-- =================================================
             STATISTICS
        ================================================== -->

        <div class="stats-grid">


            <div class="stat-card">

                <div class="stat-title">

                    <span class="stat-icon blue">
                        ♙
                    </span>

                    <span>
                        Total Patients
                    </span>

                </div>


                <span class="stat-number">

                    <?= htmlspecialchars(
                        $stats['total'] ?? 0
                    ) ?>

                </span>

            </div>



            <div class="stat-card">

                <div class="stat-title">

                    <span class="stat-icon green">
                        +
                    </span>

                    <span>
                        Receiving Care
                    </span>

                </div>


                <span class="stat-number">

                    <?= htmlspecialchars(
                        $stats['receiving_care'] ?? 0
                    ) ?>

                </span>

            </div>



            <div class="stat-card">

                <div class="stat-title">

                    <span class="stat-icon yellow">
                        □
                    </span>

                    <span>
                        Upcoming Sessions
                    </span>

                </div>


                <span class="stat-number">

                    <?= htmlspecialchars(
                        $stats['upcoming_sessions'] ?? 0
                    ) ?>

                </span>

            </div>



            <div class="stat-card">

                <div class="stat-title">

                    <span class="stat-icon blue">
                        ▤
                    </span>

                    <span>
                        Recent Reports
                    </span>

                </div>


                <span class="stat-number">

                    <?= htmlspecialchars(
                        $stats['recent_reports'] ?? 0
                    ) ?>

                </span>

            </div>


        </div>



        <!-- =================================================
             ALL PATIENTS
        ================================================== -->

        <section class="patients-section">


            <div class="section-top">

                <div>

                    <h2>
                        All Patients
                    </h2>

                    <p>
                        Patients registered under your family account.
                    </p>

                </div>


                <div class="search-wrapper">

                    <span class="search-icon">
                        ⌕
                    </span>


                    <input
                        type="text"
                        id="patientSearch"
                        placeholder="Search patients..."
                    >

                </div>

            </div>



            <!-- Patient Cards -->

            <div
                class="patients-grid"
                id="patientsGrid"
            >


                <?php foreach (
                    $patients as $patient
                ): ?>


                    <div
                        class="patient-card"
                        data-patient-name="<?= htmlspecialchars(
                            strtolower(
                                $patient['name']
                            )
                        ) ?>"
                        data-patient-relationship="<?= htmlspecialchars(
                            strtolower(
                                $patient['relationship']
                            )
                        ) ?>"
                    >


                        <!-- Card Header -->

                        <div class="patient-card-header">


                            <div class="patient-main-info">


                                <div class="patient-image">

                                    <img
                                        src="<?= htmlspecialchars(
                                            $patient['image']
                                        ) ?>"
                                        alt="<?= htmlspecialchars(
                                            $patient['name']
                                        ) ?>"
                                    >

                                </div>


                                <div class="patient-details">

                                    <h3>
                                        <?= htmlspecialchars(
                                            $patient['name']
                                        ) ?>
                                    </h3>


                                    <p>

                                        <?= htmlspecialchars(
                                            $patient['relationship']
                                        ) ?>

                                        •

                                        <?= htmlspecialchars(
                                            $patient['age']
                                        ) ?>
                                        yrs

                                        •

                                        <?= htmlspecialchars(
                                            $patient['gender']
                                        ) ?>

                                        •

                                        Blood:

                                        <?= htmlspecialchars(
                                            $patient['blood_group']
                                        ) ?>

                                    </p>


                                    <div class="condition-list">


                                        <?php foreach (
                                            $patient['conditions']
                                            as $condition
                                        ): ?>

                                            <span class="condition-tag">

                                                <?= htmlspecialchars(
                                                    $condition
                                                ) ?>

                                            </span>

                                        <?php endforeach; ?>


                                    </div>

                                </div>

                            </div>



                            <!-- Status -->

                            <?php if (
                                $patient['status_type']
                                === 'active'
                            ): ?>

                                <span class="status-badge active">

                                    <span class="status-dot"></span>

                                    Currently Receiving Care

                                </span>

                            <?php else: ?>

                                <span class="status-badge scheduled">

                                    <span class="status-dot"></span>

                                    Care Scheduled

                                </span>

                            <?php endif; ?>


                        </div>



                        <!-- Care Information -->

                        <div class="patient-care-info">


                            <div class="care-info-row">

                                <span class="care-info-icon">
                                    ♙
                                </span>

                                <span>

                                    Caregiver:

                                    <?= htmlspecialchars(
                                        $patient['caregiver']
                                    ) ?>

                                </span>

                            </div>


                            <div class="care-info-row">

                                <span class="care-info-icon">
                                    □
                                </span>

                                <span>

                                    Next:

                                    <?= htmlspecialchars(
                                        $patient['next_session']
                                    ) ?>

                                </span>

                            </div>


                        </div>



                        <!-- Buttons -->

                        <div class="patient-card-actions">


                            <button
                                type="button"
                                class="card-button secondary view-profile-button"
                                data-patient="<?= htmlspecialchars(
                                    $patient['name']
                                ) ?>"
                            >
                                View Profile
                            </button>


                            <button
                                type="button"
                                class="card-button primary report-button"
                                data-patient="<?= htmlspecialchars(
                                    $patient['name']
                                ) ?>"
                            >
                                Daily Care Reports
                            </button>


                        </div>


                    </div>


                <?php endforeach; ?>


                <!-- No results -->

                <div
                    id="noPatientsMessage"
                    class="no-results"
                >
                    No patients found.
                </div>


            </div>

        </section>



        <!-- =================================================
             RECENT REPORTS
        ================================================== -->

        <section class="reports-section">


            <div class="reports-header">

                <div>

                    <h2>
                        Recent Daily Care Reports
                    </h2>

                    <p>
                        Latest updates from your patients' caregivers.
                    </p>

                </div>


                <a
                    href="#"
                    id="viewAllReports"
                    class="view-all-reports"
                >

                    View All Reports

                    <span>
                        →
                    </span>

                </a>

            </div>



            <div class="reports-list">


                <?php foreach (
                    $reports as $report
                ): ?>


                    <div class="report-card">


                        <div class="report-content">


                            <div class="report-meta">

                                <strong>

                                    <?= htmlspecialchars(
                                        $report['patient']
                                    ) ?>

                                </strong>


                                <span class="separator">
                                    •
                                </span>


                                <span>

                                    <?= htmlspecialchars(
                                        $report['date']
                                    ) ?>

                                </span>


                                <span class="separator">
                                    •
                                </span>


                                <span class="report-status">

                                    <?= htmlspecialchars(
                                        $report['status']
                                    ) ?>

                                </span>


                                <span class="separator">
                                    •
                                </span>


                                <span class="caregiver-name">

                                    ♙

                                    <?= htmlspecialchars(
                                        $report['caregiver']
                                    ) ?>

                                </span>

                            </div>


                            <p>

                                "<?= htmlspecialchars(
                                    $report['description']
                                ) ?>"

                            </p>


                        </div>


                        <button
                            type="button"
                            class="view-report-button"
                            data-report="<?= htmlspecialchars(
                                $report['patient']
                            ) ?>"
                        >
                            View Report
                        </button>


                    </div>


                <?php endforeach; ?>


            </div>

        </section>


    </main>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="footer">

        <div class="footer-content">


            <div class="footer-brand">
                SafeHands
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
                    Help Center
                </a>

            </div>


            <div class="copyright">

                © 2024 SafeHands Healthcare Management.
                All rights reserved.

            </div>


        </div>

    </footer>



    <!-- Toast -->

    <div
        id="toast"
        class="toast"
    ></div>


</div>