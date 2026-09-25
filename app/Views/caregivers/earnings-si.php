<?php
$title = $title ?? 'මගේ ආදායම | SafeHands';
?>

<!DOCTYPE html>
<html lang="si">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-earnings.css"
    >

</head>

<body>

<!-- =====================================================
     HEADER / NAVIGATION
     ===================================================== -->

<header class="earnings-header">

    <div class="header-container">

        <a
            href="/safehands_mvc/caregiver/dashboard"
            class="brand"
        >
            SafeHands
        </a>

        <nav class="desktop-nav">

            <a href="/safehands_mvc/caregiver/dashboard">
                උපකරණ පුවරුව
            </a>

            <a href="/safehands_mvc/caregiver/scheduleSi">
                මගේ උපලේඛනය
            </a>

            <a href="/safehands_mvc/caregiver/manageAvailabilitySi">
                ලබා ගත හැකි වේලාව
            </a>

            <a
                href="/safehands_mvc/caregiver/earnings"
                class="active"
            >
                ආදායම්
            </a>

            <a href="/safehands_mvc/caregiver/notificationsSi">
                දැනුම්දීම්
            </a>

        </nav>


        <div class="header-actions">

            

            <div class="profile-circle">
                C
            </div>

            <button
                type="button"
                class="mobile-menu-button"
                id="mobileMenuButton"
                aria-label="මෙනුව විවෘත කරන්න"
            >
                ☰
            </button>

        </div>

    </div>


    <!-- Mobile Navigation -->

    <nav
        class="mobile-nav"
        id="mobileNav"
    >

        <a href="/safehands_mvc/caregiver/dashboardSi">
            උපකරණ පුවරුව
        </a>

        <a href="/safehands_mvc/caregiver/scheduleSi">
            මගේ උපලේඛනය
        </a>

        <a href="/safehands_mvc/caregiver/manageAvailabilitySi">
            ලබා ගත හැකි වේලාව
        </a>

        <a
            href="/safehands_mvc/caregiver/earnings"
            class="active"
        >
          ආදායම්
        </a>

        <a href="/safehands_mvc/caregiver/notificationsSi">
            දැනුම්දීම්
        </a>

    </nav>

</header>


<!-- =====================================================
     MAIN CONTENT
     ===================================================== -->

<main class="earnings-main">


    <!-- Breadcrumb -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/caregiver/dashboardSi">
            උපකරණ පුවරුව
        </a>

        <span>›</span>

        <span class="current">
            ආදායම්
        </span>

    </div>


    <!-- =================================================
         PAGE HEADER
         ================================================= -->

    <section class="page-header">

        <div>

            <h1>
                මගේ ආදායම
            </h1>

            <p>
                ඔබගේ ගෙවීම්, ආදායම් සහ සම්පූර්ණ කළ රැකවරණ සේවා
                නිරීක්ෂණය කරන්න.
            </p>

        </div>


        <!-- Month Selector -->

        <div class="month-selector">

            <button
                type="button"
                id="previousMonth"
                class="month-button"
                aria-label="පසුගිය මාසය"
            >
                ‹
            </button>

            <span
                id="currentMonth"
                class="current-month"
            >
                July 2026
            </span>

            <button
                type="button"
                id="nextMonth"
                class="month-button"
                aria-label="ඊළඟ මාසය"
            >
                ›
            </button>

        </div>

    </section>


    <!-- =================================================
         SUMMARY CARDS
         ================================================= -->

    <section class="summary-grid">


        <!-- Current Balance -->

        <div class="summary-card">

            <div class="summary-icon">
                💰
            </div>

            <div class="summary-label">
                වත්මන් ශේෂය
            </div>

            <div
                class="summary-value"
                id="currentBalance"
            >
                Rs. 28,500
            </div>

            <div class="summary-description">
                මීළඟ ගෙවීම සඳහා ලබා ගත හැක
            </div>

        </div>


        <!-- රඳවා ඇත ගෙවීමs -->

        <div class="summary-card">

            <div class="summary-icon warning">
                ⏳
            </div>

            <div class="summary-label">
                රඳවා ඇති ගෙවීම්
            </div>

            <div
                class="summary-value"
                id="heldගෙවීමs"
            >
                Rs. 12,000
            </div>

            <div class="summary-description">
                තහවුරු කිරීම අපේක්ෂාවෙන්
            </div>

        </div>


        <!-- නිකුත් කර ඇත -->

        <div class="summary-card">

            <div class="summary-icon success">
                ✓
            </div>

            <div class="summary-label">
                නිකුත් කළ ගෙවීම්
            </div>

            <div
                class="summary-value"
                id="releasedගෙවීමs"
            >
                Rs. 156,500
            </div>

            <div class="summary-description">
                සාර්ථකව මාරු කර ඇත
            </div>

        </div>


        <!-- Sessions -->

        <div class="summary-card">

            <div class="summary-icon secondary">
                📋
            </div>

            <div class="summary-label">
                සේවා වාර
            </div>

            <div
                class="summary-value"
                id="completedSessions"
            >
                42
            </div>

            <div class="summary-description">
                මෙම මාසයේ සම්පූර්ණ කළ සේවා වාර
            </div>

        </div>

    </section>


    <!-- =================================================
         MAIN TWO-COLUMN AREA
         ================================================= -->

    <section class="earnings-layout">


        <!-- =================================================
             LEFT / MAIN CONTENT
             ================================================= -->

        <div class="earnings-content">


            <!-- =================================================
                 PERFORMANCE INSIGHTS
                 ================================================= -->

            <section class="earnings-card performance-card">

                <h2>
                    කාර්ය සාධන තොරතුරු
                </h2>


                <!-- මෙම මාසය -->

                <div class="performance-item">

                    <div class="performance-header">

                        <span id="thisMonthLabel">
                            මෙම මාසය (July 2026)
                        </span>

                        <strong id="thisMonthAmount">
                            Rs. 42,500
                        </strong>

                    </div>

                    <div class="progress-bar">

                        <div
                            class="progress-fill primary-progress"
                            id="thisMonthProgress"
                            style="width: 85%;"
                        ></div>

                    </div>

                </div>


                <!-- පසුගිය මාසය -->

                <div class="performance-item">

                    <div class="performance-header">

                        <span id="lastMonthLabel">
                            පසුගිය මාසය (June 2026)
                        </span>

                        <strong id="lastMonthAmount">
                            Rs. 36,000
                        </strong>

                    </div>

                    <div class="progress-bar">

                        <div
                            class="progress-fill secondary-progress"
                            id="lastMonthProgress"
                            style="width: 72%;"
                        ></div>

                    </div>

                </div>


                <!-- Average -->

                <div class="performance-item average-item">

                    <div class="performance-header">

                        <span>
                            සාමාන්‍ය මාසික ආදායම
                        </span>

                        <strong
                            id="averageMonthlyEarnings"
                            class="primary-text"
                        >
                            Rs. 39,250
                        </strong>

                    </div>

                    <div class="progress-bar">

                        <div
                            class="progress-fill average-progress"
                            id="averageProgress"
                            style="width: 78.5%;"
                        ></div>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 RECENT TRANSACTIONS
                 ================================================= -->

            <section class="earnings-card transactions-card">

                <div class="section-heading">

                    <h2>
                        මෑත ගනුදෙනු
                    </h2>

                    <button
                        type="button"
                        id="viewAllTransactions"
                        class="text-button"
                    >
                        සියල්ල බලන්න
                    </button>

                </div>


                <div
                    class="transactions-list"
                    id="transactionsList"
                >


                    <!-- Transaction 1 -->

                    <div
                        class="transaction"
                        data-booking-id="BK-2026-00125"
                    >

                        <div class="transaction-left">

                            <div class="transaction-icon success">
                                ✓
                            </div>

                            <div>

                                <h4>
                                    BK-2026-00125 —
                                    Mr. Silva
                                </h4>

                                <p>
                                    15 July 2026 • Morning සේවා මුරය
                                </p>

                            </div>

                        </div>


                        <div class="transaction-right">

                            <div class="transaction-payment">

                                <strong>
                                    Rs. 2,000
                                </strong>

                                <span class="status released">
                                    නිකුත් කර ඇත
                                </span>

                            </div>

                            <button
                                type="button"
                                class="view-booking-button"
                                data-booking="BK-2026-00125"
                            >
                                වෙන්කිරීම බලන්න
                            </button>

                        </div>

                    </div>


                    <!-- Transaction 2 -->

                    <div
                        class="transaction"
                        data-booking-id="BK-2026-00131"
                    >

                        <div class="transaction-left">

                            <div class="transaction-icon warning">
                                ⏳
                            </div>

                            <div>

                                <h4>
                                    BK-2026-00131 —
                                    Mrs. Perera
                                </h4>

                                <p>
                                    18 July 2026 • Evening සේවා මුරය
                                </p>

                            </div>

                        </div>


                        <div class="transaction-right">

                            <div class="transaction-payment">

                                <strong>
                                    Rs. 2,500
                                </strong>

                                <span class="status held">
                                    රඳවා ඇත
                                </span>

                            </div>

                            <button
                                type="button"
                                class="view-booking-button"
                                data-booking="BK-2026-00131"
                            >
                                වෙන්කිරීම බලන්න
                            </button>

                        </div>

                    </div>


                </div>

            </section>

        </div>


        <!-- =================================================
             RIGHT SIDEBAR
             ================================================= -->

        <aside class="earnings-sidebar">


            <!-- =================================================
                 මීළඟ ගෙවීම
                 ================================================= -->

            <section class="payout-card">

                <div class="payout-label">
                    මීළඟ ගෙවීම
                </div>

                <div
                    class="payout-amount"
                    id="nextPayoutAmount"
                >
                    Rs. 18,500
                </div>

                <p id="nextPayoutදිනය">
                    නියමිත දිනය 28 July 2026
                </p>

                <div class="payout-status">
                    <span class="status-dot"></span>

                    <span>
                        තත්ත්වය: සැකසෙමින් පවතී
                    </span>

                </div>

            </section>


            <!-- =================================================
                 PAYMENT GUIDE
                 ================================================= -->

            <section class="payment-guide">

                <h3>
                    ගෙවීම් මාර්ගෝපදේශය
                </h3>


                <div class="guide-item">

                    <span class="guide-dot released-dot"></span>

                    <div>

                        <h4>
                            නිකුත් කර ඇත
                        </h4>

                        <p>
                            ඔබගේ ප්‍රධාන බැංකු ගිණුමට මුදල් මාරු කර ඇත.
                        </p>

                    </div>

                </div>


                <div class="guide-item">

                    <span class="guide-dot held-dot"></span>

                    <div>

                        <h4>
                            රඳවා ඇත
                        </h4>

                        <p>
                            රෝගියාගේ තහවුරු කිරීම හෝ සේවා මුරය තහවුරු කිරීම අපේක්ෂාවෙන්.
                        </p>

                    </div>

                </div>


                <div class="guide-item">

                    <span class="guide-dot processing-dot"></span>

                    <div>

                        <h4>
                            Processing
                        </h4>

                        <p>
                            අපගේ මූල්‍ය කණ්ඩායම විසින් කණ්ඩායම් ගෙවීම ආරම්භ කර ඇත.
                        </p>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 QUICK ACTIONS
                 ================================================= -->

            <section class="quick-actions">


                <!-- ගෙවීම් ඉතිහාසය -->

                <button
                    type="button"
                    id="paymentHistoryButton"
                    class="quick-action"
                >

                    <span class="quick-action-left">

                        <span class="quick-action-icon">
                            ↻
                        </span>

                        <span>
                            ගෙවීම් ඉතිහාසය
                        </span>

                    </span>

                    <span>
                        ›
                    </span>

                </button>


                <!-- මාසික ප්‍රකාශය -->

                <button
                    type="button"
                    id="monthlyStatementButton"
                    class="quick-action"
                >

                    <span class="quick-action-left">

                        <span class="quick-action-icon">
                            ↓
                        </span>

                        <span>
                            මාසික ප්‍රකාශය
                        </span>

                    </span>

                    <span>
                        ›
                    </span>

                </button>


                <!-- සහාය අමතන්න -->

                <button
                    type="button"
                    id="contactSupportButton"
                    class="quick-action"
                >

                    <span class="quick-action-left">

                        <span class="quick-action-icon">
                            ?
                        </span>

                        <span>
                            සහාය අමතන්න
                        </span>

                    </span>

                    <span>
                        ›
                    </span>

                </button>

            </section>

        </aside>

    </section>

</main>


<!-- =====================================================
     PAYMENT HISTORY MODAL
     ===================================================== -->

<div
    id="paymentHistoryModal"
    class="modal-overlay hidden"
>

    <div class="modal">

        <div class="modal-header">

            <h2>
                ගෙවීම් ඉතිහාසය
            </h2>

            <button
                type="button"
                id="closeගෙවීමHistory"
                class="modal-close"
            >
                ×
            </button>

        </div>


        <div class="payment-history-list">


            <div class="history-row">

                <div>

                    <strong>
                        BK-2026-00125
                    </strong>

                    <span>
                        15 July 2026
                    </span>

                </div>

                <div>

                    <strong>
                        Rs. 2,000
                    </strong>

                    <span class="status released">
                        නිකුත් කර ඇත
                    </span>

                </div>

            </div>


            <div class="history-row">

                <div>

                    <strong>
                        BK-2026-00120
                    </strong>

                    <span>
                        12 July 2026
                    </span>

                </div>

                <div>

                    <strong>
                        Rs. 3,000
                    </strong>

                    <span class="status released">
                        නිකුත් කර ඇත
                    </span>

                </div>

            </div>


            <div class="history-row">

                <div>

                    <strong>
                        BK-2026-00115
                    </strong>

                    <span>
                        08 July 2026
                    </span>

                </div>

                <div>

                    <strong>
                        Rs. 2,500
                    </strong>

                    <span class="status held">
                        රඳවා ඇත
                    </span>

                </div>

            </div>


        </div>

    </div>

</div>


<!-- =====================================================
     BOOKING MODAL
     ===================================================== -->

<div
    id="bookingModal"
    class="modal-overlay hidden"
>

    <div class="modal">

        <div class="modal-header">

            <h2>
                වෙන්කිරීමේ විස්තර
            </h2>

            <button
                type="button"
                id="closeBookingModal"
                class="modal-close"
            >
                ×
            </button>

        </div>


        <div id="bookingDetails">

            <div class="booking-detail">

                <span>
                    වෙන්කිරීමේ අංකය
                </span>

                <strong id="modalBookingId">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    රෝගියා
                </span>

                <strong id="modalරෝගියා">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    දිනය
                </span>

                <strong id="modalදිනය">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    සේවා මුරය
                </span>

                <strong id="modalසේවා මුරය">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    ගෙවීම
                </span>

                <strong id="modalගෙවීම">
                    -
                </strong>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     FOOTER
     ===================================================== -->

<footer class="earnings-footer">

    <div class="footer-container">

        <strong>
            SafeHands
        </strong>

        <span>
            © 2024 SafeHands Premium.
            All rights reserved.
        </span>

        <div class="footer-links">

            <a href="#">
                පෞද්ගලිකත්ව ප්‍රතිපත්තිය
            </a>

            <a href="#">
                සේවා කොන්දේසි
            </a>

            <a href="#">
                උපකාරක මධ්‍යස්ථානය
            </a>

        </div>

    </div>

</footer>


<!-- =====================================================
     JAVASCRIPT
     ===================================================== -->

<script
    src="/safehands_mvc/public/assets/js/caregiver-earnings.js"
></script>

</body>

</html>