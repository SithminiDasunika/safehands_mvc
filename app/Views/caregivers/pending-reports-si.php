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
                    උපකරණ පුවරුව
                </a>


            </nav>

        </div>

        <div class="navbar-right">
                        <div class="language-switcher" style="display:flex; align-items:center; gap:8px; margin-right:12px; font-size:15px;">
                <a href="/safehands_mvc/caregiver/pendingReports" style="color:#059669; text-decoration:none;">English</a>
                <span style="color:#9ca3af;">|</span>
                <a href="/safehands_mvc/caregiver/pendingReportsSi" style="color:#059669; font-weight:700; text-decoration:none;">සිංහල</a>
            </div>


           
            <a
                href="/safehands_mvc/logout"
                class="logout-button"
            >
                පිටවීම
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
            උපකරණ පුවරුව
        </a>

        <span>›</span>

        <strong>පොරොත්තු වාර්තා</strong>

    </nav>


    <!-- Page Header -->

    <section class="page-header">

        <div>

            <h1>
                පොරොත්තු වාර්තා
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
                අවසන් කළ සත්කාර සැසි හමු නොවීය.
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
                                වෙන්කිරීම බලන්න
                            </a>
                            <?php if (!empty($booking['has_report'])): ?>
                                <a href="/safehands_mvc/care-report/show/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    වාර්තාව බලන්න
                                </a>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" style="background: #e5e7eb; color: #111827; padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                                    වාර්තාව සංස්කරණය
                                </a>
                            <?php else: ?>
                                <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="complete-button">
                                    වාර්තාව සම්පූර්ණ කරන්න
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
                පොරොත්තු වාර්තා ගැන
            </h3>

            <p>
                Daily care reports should be completed after each care
                session. Select "වාර්තාව සම්පූර්ණ කරන්න" to open the daily care
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
                සියලු හිමිකම් ඇවිරිණි.
            </p>

        </div>

    </div>

</footer>

</body>

</html>