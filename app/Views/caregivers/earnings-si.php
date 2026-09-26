<?php
$title = $title ?? 'My Earnings | SafeHands';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-earnings.css?v=2"
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

             
             

            <a
                href="/safehands_mvc/caregiver/earnings"
                class="active"
            >
                ආදායම්
            </a>

             

        </nav>


        <div class="header-actions">
                        <div class="language-switcher" style="display:flex; align-items:center; gap:8px; margin-right:12px; font-size:15px;">
                <a href="/safehands_mvc/caregiver/earnings" style="color:#059669; text-decoration:none;">English</a>
                <span style="color:#9ca3af;">|</span>
                <a href="/safehands_mvc/caregiver/earningsSi" style="color:#059669; font-weight:700; text-decoration:none;">සිංහල</a>
            </div>


             

            <div class="profile-circle">
                C
            </div>

            <button
                type="button"
                class="mobile-menu-button"
                id="mobileMenuButton"
                aria-label="Open menu"
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

        <a href="/safehands_mvc/caregiver/dashboard">
            උපකරණ පුවරුව
        </a>

        <a href="/safehands_mvc/caregiver/schedule">
            මගේ උපලේඛනය
        </a>

        <a href="/safehands_mvc/caregiver/manageAvailability">
            ලබා ගත හැකි වේලාව
        </a>

        <a
            href="/safehands_mvc/caregiver/earnings"
            class="active"
        >
            ආදායම්
        </a>

        <a href="/safehands_mvc/caregiver/notifications">
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

        <a href="/safehands_mvc/caregiver/dashboard">
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
                My ආදායම්
            </h1>

            <p>
                Track your payments, earnings and completed
                caregiving services.
            </p>

        </div>


        <!-- Month Selector -->

        <div class="month-selector">

            <button
                type="button"
                id="previousMonth"
                class="month-button"
                aria-label="Previous month"
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
                aria-label="Next month"
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
                CURRENT BALANCE
            </div>

            <div
                class="summary-value"
                id="currentBalance"
            >
                Rs. 28,500
            </div>

            <div class="summary-description">
                Available for next payout
            </div>

        </div>


        <!-- Held Payments -->

        <div class="summary-card">

            <div class="summary-icon warning">
                ⏳
            </div>

            <div class="summary-label">
                HELD PAYMENTS
            </div>

            <div
                class="summary-value"
                id="heldPayments"
            >
                Rs. 12,000
            </div>

            <div class="summary-description">
                Awaiting confirmation
            </div>

        </div>


        <!-- Released -->

        <div class="summary-card">

            <div class="summary-icon success">
                ✓
            </div>

            <div class="summary-label">
                RELEASED
            </div>

            <div
                class="summary-value"
                id="releasedPayments"
            >
                Rs. 156,500
            </div>

            <div class="summary-description">
                Successfully transferred
            </div>

        </div>


        <!-- Sessions -->

        <div class="summary-card">

            <div class="summary-icon secondary">
                📋
            </div>

            <div class="summary-label">
                SESSIONS
            </div>

            <div
                class="summary-value"
                id="completedSessions"
            >
                42
            </div>

            <div class="summary-description">
                Completed this month
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
                    Performance Insights
                </h2>


                <!-- This Month -->

                <div class="performance-item">

                    <div class="performance-header">

                        <span id="thisMonthLabel">
                            This Month (July 2026)
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


                <!-- Last Month -->

                <div class="performance-item">

                    <div class="performance-header">

                        <span id="lastMonthLabel">
                            Last Month (June 2026)
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
                            Average Monthly ආදායම්
                        </span>

                        <strong
                            id="averageMonthlyආදායම්"
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
                        Recent Transactions
                    </h2>

                    <button
                        type="button"
                        id="viewAllTransactions"
                        class="text-button"
                    >
                        View All
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
                                    15 July 2026 • Morning Shift
                                </p>

                            </div>

                        </div>


                        <div class="transaction-right">

                            <div class="transaction-payment">

                                <strong>
                                    Rs. 2,000
                                </strong>

                                <span class="status released">
                                    Released
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
                                    18 July 2026 • Evening Shift
                                </p>

                            </div>

                        </div>


                        <div class="transaction-right">

                            <div class="transaction-payment">

                                <strong>
                                    Rs. 2,500
                                </strong>

                                <span class="status held">
                                    Held
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
                 NEXT PAYOUT
                 ================================================= -->

            <section class="payout-card">

                <div class="payout-label">
                    NEXT PAYOUT
                </div>

                <div
                    class="payout-amount"
                    id="nextPayoutAmount"
                >
                    Rs. 18,500
                </div>

                <p id="nextPayoutDate">
                    Scheduled for 28 July 2026
                </p>

                <div class="payout-status">
                    <span class="status-dot"></span>

                    <span>
                        Status: Processing
                    </span>

                </div>

            </section>


            <!-- =================================================
                 PAYMENT GUIDE
                 ================================================= -->

            <section class="payment-guide">

                <h3>
                    Payment Guide
                </h3>


                <div class="guide-item">

                    <span class="guide-dot released-dot"></span>

                    <div>

                        <h4>
                            Released
                        </h4>

                        <p>
                            Funds transferred to your
                            primary bank account.
                        </p>

                    </div>

                </div>


                <div class="guide-item">

                    <span class="guide-dot held-dot"></span>

                    <div>

                        <h4>
                            Held
                        </h4>

                        <p>
                            Awaiting patient sign-off
                            or shift verification.
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
                            Batch payment initiated
                            by our finance team.
                        </p>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 QUICK ACTIONS
                 ================================================= -->

            <section class="quick-actions">


                <!-- Payment History -->

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
                            Payment History
                        </span>

                    </span>

                    <span>
                        ›
                    </span>

                </button>


                <!-- Monthly Statement -->

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
                            Monthly Statement
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
                Payment History
            </h2>

            <button
                type="button"
                id="closePaymentHistory"
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
                        Released
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
                        Released
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
                        Held
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
                Booking Details
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
                    Booking ID
                </span>

                <strong id="modalBookingId">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    Patient
                </span>

                <strong id="modalPatient">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    Date
                </span>

                <strong id="modalDate">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    Shift
                </span>

                <strong id="modalShift">
                    -
                </strong>

            </div>


            <div class="booking-detail">

                <span>
                    Payment
                </span>

                <strong id="modalPayment">
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
            සියලු හිමිකම් ඇවිරිණි.
        </span>

        <div class="footer-links">

            <a href="#">
                රහස්‍යතා ප්‍රතිපත්තිය
            </a>

            <a href="#">
                නියමයන් of Service
            </a>

            <a href="#">
                උදව් මධ්‍යස්ථානය
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