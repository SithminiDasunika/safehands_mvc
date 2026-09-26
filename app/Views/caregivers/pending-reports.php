<?php
$title = $title ?? 'Pending Reports | SafeHands';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-pending-reports.css"
    >
</head>

<body>

<header class="top-navbar">

    <div class="navbar-container">

        <div class="navbar-left">

            <a
                href="/safehands_mvc/caregiver/dashboard"
                class="brand"
            >
                SafeHands
            </a>

            <nav class="desktop-navigation">

                <a
                    href="/safehands_mvc/caregiver/dashboard"
                    class="nav-link"
                >
                    Dashboard
                </a>


            </nav>

        </div>

        <div class="navbar-right">

           
            <a
                href="/safehands_mvc/logout"
                class="logout-button"
            >
                Logout
            </a>

            <div class="profile-avatar">
                C
            </div>

        </div>

    </div>

</header>


<main class="page-container">

    <!-- Breadcrumb -->

    <nav class="breadcrumb">

        <a href="/safehands_mvc/caregiver/dashboard">
            Dashboard
        </a>

        <span>›</span>

        <strong>Pending Reports</strong>

    </nav>


    <!-- Page Header -->

    <section class="page-header">

        <div>

            <h1>
                Pending Reports
            </h1>

            <p>
                Complete daily care reports for completed care sessions.
            </p>

        </div>

        <div class="report-count">
            2 Pending
        </div>

    </section>


    <!-- Reports -->

    <section class="reports-container">


        <!-- Report 1 -->

        <article class="report-card">

            <div class="report-icon">
                📋
            </div>

            <div class="report-content">

                <div class="report-header">

                    <div>

                        <h2>
                            Mrs. Abeywickrama
                        </h2>

                        <p class="report-date">
                            Yesterday, 4:00 PM
                        </p>

                    </div>

                    <span class="status-badge">
                        Pending
                    </span>

                </div>


                <div class="report-details">

                    <div class="detail-item">

                        <span class="detail-label">
                            Service
                        </span>

                        <span class="detail-value">
                            Daily Care Service
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            Report
                        </span>

                        <span class="detail-value">
                            Daily Care Report
                        </span>

                    </div>

                </div>


                <div class="report-actions">

                    <a
                        href="/safehands_mvc/caregiver/schedule"
                        class="complete-button"
                    >
                        Complete Report
                    </a>

                </div>

            </div>

        </article>


        <!-- Report 2 -->

        <article class="report-card">

            <div class="report-icon">
                📋
            </div>

            <div class="report-content">

                <div class="report-header">

                    <div>

                        <h2>
                            Mr. Samaranayake
                        </h2>

                        <p class="report-date">
                            Oct 22, 10:00 AM
                        </p>

                    </div>

                    <span class="status-badge">
                        Pending
                    </span>

                </div>


                <div class="report-details">

                    <div class="detail-item">

                        <span class="detail-label">
                            Service
                        </span>

                        <span class="detail-value">
                            Daily Care Service
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            Report
                        </span>

                        <span class="detail-value">
                            Daily Care Report
                        </span>

                    </div>

                </div>


                <div class="report-actions">

                    <a
                        href="/safehands_mvc/caregiver/schedule"
                        class="complete-button"
                    >
                        Complete Report
                    </a>

                </div>

            </div>

        </article>


    </section>


    <!-- Information -->

    <section class="information-box">

        <div class="information-icon">
            ℹ
        </div>

        <div>

            <h3>
                About Pending Reports
            </h3>

            <p>
                Daily care reports should be completed after each care
                session. Select "Complete Report" to open the daily care
                report form.
            </p>

        </div>

    </section>


</main>


<footer class="site-footer">

    <div class="footer-container">

        <div>

            <div class="footer-brand">
                SafeHands
            </div>

            <p>
                © 2026 SafeHands Caregiver Service Management System.
                All rights reserved.
            </p>

        </div>

    </div>

</footer>

</body>

</html>