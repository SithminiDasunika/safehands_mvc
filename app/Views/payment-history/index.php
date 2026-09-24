<?php

$caregiver = $caregiver ?? [];
$booking = $booking ?? [];
$payment = $payment ?? [];
$transaction = $transaction ?? [];
$history = $history ?? [];

?>

<!-- ================================
     NAVIGATION
================================ -->

<header class="top-navigation">

    <div class="navigation-container">

        <!-- Brand -->

        <a
            href="/safehands_mvc/family"
            class="brand"
        >
            SafeHands
        </a>


        <!-- Navigation Links -->

        <nav class="main-navigation">

            <a
                href="/safehands_mvc/family"
                class="nav-link"
            >
                Dashboard
            </a>

            <a
                href="/safehands_mvc/patients"
                class="nav-link"
            >
                Patients
            </a>

            <a
                href="/safehands_mvc/caregiver"
                class="nav-link"
            >
                Find Caregivers
            </a>

            <a
                href="/safehands_mvc/bookings"
                class="nav-link active"
            >
                My Bookings
            </a>

        </nav>


        <!-- Right side -->

        <div class="navigation-actions">

            <button
                type="button"
                class="icon-button"
                aria-label="Notifications"
                id="notificationButton"
            >
                <span class="notification-icon"></span>
            </button>

            <button
                type="button"
                class="icon-button account-button"
                aria-label="Account"
                id="accountButton"
            >
                <span class="account-icon">S</span>
            </button>

        </div>

    </div>

</header>


<!-- ================================
     MAIN CONTENT
================================ -->

<main class="main-container">


    <!-- ================================
         BREADCRUMB
    ================================= -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/family">
            Dashboard
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <a href="/safehands_mvc/bookings">
            My Bookings
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <a href="/safehands_mvc/booking/details">
            Booking Details
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <span class="breadcrumb-current">
            Payment History
        </span>

    </div>


    <!-- ================================
         PAGE HEADER
    ================================= -->

    <section class="page-header">

        <div>

            <h1>
                Payment History
            </h1>

            <p>
                View payment details and transaction history for this care booking.
            </p>

        </div>


        <div class="payment-completed-badge">

            <span class="success-check">
                ✓
            </span>

            <span>
                <?= htmlspecialchars($payment['status'] ?? 'Payment Completed') ?>
            </span>

        </div>

    </section>


    <!-- ================================
         MAIN TWO COLUMN AREA
    ================================= -->

    <section class="payment-layout">


        <!-- ==================================
             LEFT COLUMN - BOOKING INFORMATION
        ================================== -->

        <aside class="booking-information">


            <!-- Caregiver Card -->

            <div class="caregiver-card">

                <div class="caregiver-top">

                    <img
                        src="<?= htmlspecialchars($caregiver['image'] ?? '') ?>"
                        alt="<?= htmlspecialchars($caregiver['name'] ?? 'Caregiver') ?>"
                        class="caregiver-image"
                    >


                    <div class="caregiver-details">

                        <h2>
                            <?= htmlspecialchars($caregiver['name'] ?? '') ?>
                        </h2>

                        <div class="caregiver-rating">

                            <span class="qualification">
                                <?= htmlspecialchars($caregiver['qualification'] ?? '') ?>
                            </span>

                            <span class="rating-star">
                                ★
                            </span>

                            <span>
                                <?= htmlspecialchars($caregiver['rating'] ?? '') ?>
                            </span>

                        </div>

                    </div>

                </div>


                <div class="caregiver-divider"></div>


                <!-- Patient -->

                <div class="booking-detail-row">

                    <span class="detail-label">
                        Patient
                    </span>

                    <span class="detail-value">
                        <?= htmlspecialchars($booking['patient'] ?? '') ?>
                    </span>

                </div>


                <!-- Booking ID -->

                <div class="booking-detail-row">

                    <span class="detail-label">
                        Booking ID
                    </span>

                    <span class="detail-value">
                        <?= htmlspecialchars($booking['booking_id'] ?? '') ?>
                    </span>

                </div>


                <!-- Date -->

                <div class="booking-detail-row">

                    <span class="detail-label">
                        Date
                    </span>

                    <span class="detail-value">
                        <?= htmlspecialchars($booking['date'] ?? '') ?>
                    </span>

                </div>


                <!-- Duration -->

                <div class="booking-detail-row">

                    <span class="detail-label">
                        Duration
                    </span>

                    <span class="detail-value">
                        <?= htmlspecialchars($booking['duration'] ?? '') ?>
                    </span>

                </div>


                <!-- Completed Box -->

                <div class="care-session-completed">

                    <div class="completed-icon">
                        ✓
                    </div>

                    <div>

                        <strong>
                            Care Session Completed
                        </strong>

                        <span>
                            Payment successfully processed
                        </span>

                    </div>

                </div>

            </div>

        </aside>


        <!-- ==================================
             RIGHT COLUMN - PAYMENT DETAILS
        ================================== -->

        <section class="payment-content">


            <!-- ================================
                 PAYMENT OVERVIEW
            ================================= -->

            <div class="payment-overview">

                <div class="overview-heading">

                    <h2>
                        Payment Overview
                    </h2>

                    <p>
                        Complete payment breakdown for this care session.
                    </p>

                </div>


                <div class="total-paid-section">

                    <span class="total-paid-label">
                        Total Paid
                    </span>

                    <div class="total-paid">

                        <span class="currency">
                            Rs.
                        </span>

                        <span class="total-number">
                            <?= htmlspecialchars($payment['total'] ?? '0.00') ?>
                        </span>

                    </div>

                </div>


                <div class="payment-breakdown">

                    <div class="breakdown-row">

                        <span>
                            Service Fee
                        </span>

                        <strong>
                            Rs. <?= htmlspecialchars($payment['service_fee'] ?? '0.00') ?>
                        </strong>

                    </div>


                    <div class="breakdown-row">

                        <span>
                            Platform Fee
                        </span>

                        <strong>
                            Rs. <?= htmlspecialchars($payment['platform_fee'] ?? '0.00') ?>
                        </strong>

                    </div>

                </div>

            </div>


            <!-- ================================
                 TRANSACTION + ESCROW
            ================================= -->

            <div class="information-grid">


                <!-- Transaction Details -->

                <div class="information-card">

                    <div class="card-heading">

                        <div class="heading-icon transaction-icon">
                            $
                        </div>

                        <div>

                            <h3>
                                Transaction Details
                            </h3>

                            <p>
                                Payment transaction information
                            </p>

                        </div>

                    </div>


                    <div class="information-row">

                        <span>
                            Transaction ID
                        </span>

                        <strong>
                            <?= htmlspecialchars($transaction['transaction_id'] ?? '') ?>
                        </strong>

                    </div>


                    <div class="information-row">

                        <span>
                            Payment Method
                        </span>

                        <strong>
                            <?= htmlspecialchars($transaction['payment_method'] ?? '') ?>
                        </strong>

                    </div>

                </div>


                <!-- Escrow -->

                <div class="information-card escrow-card">

                    <div class="card-heading">

                        <div class="heading-icon lock-icon">
                            ✓
                        </div>

                        <div>

                            <h3>
                                Secure Escrow Payment
                            </h3>

                            <p>
                                Your payment is protected
                            </p>

                        </div>

                    </div>


                    <p class="escrow-description">

                        Funds are held securely and only released to the caregiver
                        after the care session is completed and verified.

                    </p>

                </div>

            </div>


            <!-- ================================
                 PAYMENT STATUS
            ================================= -->

            <div class="status-card">

                <div class="status-heading">

                    <div>

                        <h2>
                            Payment Status
                        </h2>

                        <p>
                            Complete transaction history
                        </p>

                    </div>

                </div>


                <div class="table-wrapper">

                    <table class="payment-table">

                        <thead>

                            <tr>

                                <th>
                                    Date & Time
                                </th>

                                <th>
                                    Activity
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($history as $item): ?>

                                <tr>

                                    <td data-label="Date & Time">

                                        <?= htmlspecialchars($item['date']) ?>

                                    </td>


                                    <td data-label="Activity">

                                        <?= htmlspecialchars($item['action']) ?>

                                    </td>


                                    <td data-label="Status">

                                        <span
                                            class="status-pill <?= htmlspecialchars($item['status_class']) ?>"
                                        >
                                            <?= htmlspecialchars($item['status']) ?>
                                        </span>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- ================================
                 ACTION BUTTONS
            ================================= -->

            <div class="page-actions">

                <a
                    href="/safehands_mvc/booking"
                    class="action-button back-button"
                >

                    <span class="button-icon">
                        ←
                    </span>

                    Back to View Details

                </a>


                <button
                    type="button"
                    class="action-button download-button"
                    id="downloadReceiptButton"
                >

                    <span class="button-icon">
                        ↓
                    </span>

                    Download Receipt

                </button>

            </div>

        </section>

    </section>

</main>


<!-- ================================
     FOOTER
================================ -->

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-brand">
            SafeHands
        </div>


        <nav class="footer-links">

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

        </nav>


        <div class="copyright">

            © 2024 SafeHands Healthcare.
            All rights reserved.

        </div>

    </div>

</footer>