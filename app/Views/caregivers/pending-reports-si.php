<?php
$title = $title ?? 'පොරොත්තු වාර්තා | SafeHands';
?>

<!DOCTYPE html>
<html lang="si">

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
                href="/safehands_mvc/caregiver/dashboardSi"
                class="brand"
            >
                SafeHands
            </a>

            <nav class="desktop-navigation">

                <a
                    href="/safehands_mvc/caregiver/dashboardSi"
                    class="nav-link"
                >
                    උපකරණ පුවරුව
                </a>

              

            </nav>

        </div>


        <div class="navbar-right">

          
            <a
                href="/safehands_mvc/logout"
                class="logout-button"
            >
                ඉවත් වන්න
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

        <a href="/safehands_mvc/caregiver/dashboardSi">
            උපකරණ පුවරුව
        </a>

        <span>›</span>

        <strong>
            පොරොත්තු වාර්තා
        </strong>

    </nav>


    <!-- Page Header -->

    <section class="page-header">

        <div>

            <h1>
                පොරොත්තු වාර්තා
            </h1>

            <p>
                අවසන් කළ සත්කාර සේවා සඳහා දෛනික සත්කාර වාර්තා සම්පූර්ණ කරන්න.
            </p>

        </div>

        <div class="report-count">
            පොරොත්තු 2
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
                            අබේවික්‍රම මහත්මිය
                        </h2>

                        <p class="report-date">
                            ඊයේ, ප.ව. 4:00
                        </p>

                    </div>

                    <span class="status-badge">
                        පොරොත්තුව
                    </span>

                </div>


                <div class="report-details">

                    <div class="detail-item">

                        <span class="detail-label">
                            සේවාව
                        </span>

                        <span class="detail-value">
                            දෛනික සත්කාර සේවාව
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            වාර්තාව
                        </span>

                        <span class="detail-value">
                            දෛනික සත්කාර වාර්තාව
                        </span>

                    </div>

                </div>


                <div class="report-actions">

                    <a
                        href="/safehands_mvc/caregiver/scheduleSi"
                        class="complete-button"
                    >
                        වාර්තාව සම්පූර්ණ කරන්න
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
                            සමරනායක මහතා
                        </h2>

                        <p class="report-date">
                            ඔක්තෝබර් 22, පෙ.ව. 10:00
                        </p>

                    </div>

                    <span class="status-badge">
                        පොරොත්තුව
                    </span>

                </div>


                <div class="report-details">

                    <div class="detail-item">

                        <span class="detail-label">
                            සේවාව
                        </span>

                        <span class="detail-value">
                            දෛනික සත්කාර සේවාව
                        </span>

                    </div>


                    <div class="detail-item">

                        <span class="detail-label">
                            වාර්තාව
                        </span>

                        <span class="detail-value">
                            දෛනික සත්කාර වාර්තාව
                        </span>

                    </div>

                </div>


                <div class="report-actions">

                    <a
                        href="/safehands_mvc/caregiver/scheduleSi"
                        class="complete-button"
                    >
                        වාර්තාව සම්පූර්ණ කරන්න
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
                පොරොත්තු වාර්තා පිළිබඳ
            </h3>

            <p>
                සෑම සත්කාර සේවා සැසියකටම පසුව දෛනික සත්කාර වාර්තාව
                සම්පූර්ණ කළ යුතුය. "වාර්තාව සම්පූර්ණ කරන්න" තෝරා
                දෛනික සත්කාර වාර්තා පෝරමය විවෘත කරන්න.
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
                සියලුම හිමිකම් ඇවිරිණි.
            </p>

        </div>

    </div>

</footer>


</body>

</html>