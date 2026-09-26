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
        <?php if (empty($completed)): ?>
            <div style="padding: 24px; text-align: center; color: #6b7280; background: white; border-radius: 12px; border: 1px solid #e5e7eb;">
                No completed care sessions found.
            </div>
        <?php else: ?>
            <?php foreach ($completed as $booking): ?>
                <article class="report-card">
                    <div class="report-icon">📋</div>
                    <div class="report-content">
                        <div class="report-header">
                            <div>
                                <h2><?= htmlspecialchars($booking['patient'] ?? 'Unknown Patient') ?></h2>
                                <p class="report-date"><?= htmlspecialchars($booking['date'] ?? '') ?> • Completed</p>
                            </div>
                        </div>

                        <div class="report-actions" style="margin-top: 16px; display: flex; gap: 8px; flex-wrap: wrap;">
                            <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                View Booking
                            </a>
                            <?php if (!empty($booking['has_report'])): ?>
                                <a href="/safehands_mvc/care-report/show/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    View Report
                                </a>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    Edit Report
                                </a>
                            <?php else: ?>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="complete-button">
                                    Complete Report
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
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