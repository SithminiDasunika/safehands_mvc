<?php

$booking = $booking ?? [];

$caregiver = $caregiver ?? [];

$patient = $patient ?? [];

$payment = $payment ?? [];

?>

<header class="top-header">

    <div class="header-inner">


        <!-- LOGO -->

        <a
            href="/safehands_mvc/family"
            class="logo"
        >
            SafeHands
        </a>


        <!-- DESKTOP NAVIGATION -->

        <nav class="main-navigation">

            <a href="/safehands_mvc/family">
                Dashboard
            </a>


            <a href="/safehands_mvc/patients">
                Patients
            </a>


            <a href="/safehands_mvc/caregiver">
                Find Caregivers
            </a>


            <a
                href="/safehands_mvc/bookings"
                class="active"
            >
                My Bookings
            </a>

        </nav>


        <!-- RIGHT SIDE -->

        <div class="header-actions">

            <button
                type="button"
                class="header-icon-button"
                id="notificationButton"
            >
                <span class="icon">
                    ♢
                </span>
            </button>


            <button
                type="button"
                class="header-icon-button"
            >
                <span class="icon">
                    ◯
                </span>
            </button>

        </div>

    </div>

</header>



<main class="page-container">


    <!-- =========================
         PAGE HEADER
    ========================== -->

    <section class="page-header">

        <div class="page-header-content">


            <div>

                <!-- BREADCRUMB -->

                <div class="breadcrumb">

                    <a href="/safehands_mvc/bookings">
                        My Bookings
                    </a>

                    <span>
                        ›
                    </span>

                    <span>
                        <?= htmlspecialchars(
                            $booking['id'] ?? 'BK-2026-00125'
                        ) ?>
                    </span>

                </div>


                <h1>
                    Booking Details
                </h1>


                <div class="status-wrapper">


                    <!-- CONFIRMED -->

                    <span class="status confirmed">

                        <span class="status-dot"></span>

                        <?= htmlspecialchars(
                            $booking['status'] ?? 'Confirmed'
                        ) ?>

                    </span>


                    <!-- PAYMENT HELD -->

                    <span class="status payment-held">

                        <span class="lock-symbol">
                            🔒
                        </span>

                        <?= htmlspecialchars(
                            $booking['payment_status']
                            ?? 'Payment Held Securely'
                        ) ?>

                    </span>

                </div>

            </div>


            <!-- REFERENCE ID -->

            <div class="reference-card">

                <div>

                    <span class="reference-label">
                        REFERENCE ID
                    </span>

                    <strong>
                        <?= htmlspecialchars(
                            $booking['id']
                            ?? 'BK-2026-00125'
                        ) ?>
                    </strong>

                </div>


                <span class="reference-icon">
                    #
                </span>

            </div>

        </div>

    </section>



    <!-- =========================
         ONLY OVERVIEW TAB
    ========================== -->

    <div class="booking-tabs">

        <button
            type="button"
            class="tab-button active"
        >
            Overview
        </button>

    </div>



    <!-- =========================
         MAIN GRID
    ========================== -->

    <div class="content-grid">


        <!-- =========================
             LEFT CONTENT
        ========================== -->

        <div class="main-content">


            <!-- =====================
                 CAREGIVER + PATIENT
            ====================== -->

            <div class="two-column">


                <!-- CAREGIVER -->

                <div class="card caregiver-card">

                    <h3 class="card-label">
                        Assigned Caregiver
                    </h3>


                    <div class="caregiver-main">


                        <div class="caregiver-photo">

                            <?php if (!empty($caregiver['image'])): ?>

                                <img
                                    src="<?= htmlspecialchars(
                                        $caregiver['image']
                                    ) ?>"
                                    alt="Caregiver"
                                >

                            <?php else: ?>

                                SW

                            <?php endif; ?>

                        </div>


                        <div>

                            <h2 class="caregiver-name">

                                <?= htmlspecialchars(
                                    $caregiver['name']
                                    ?? 'Sarah Wijesinghe'
                                ) ?>

                            </h2>


                            <div class="rating">

                                <span class="star">
                                    ★
                                </span>

                                <strong>
                                    <?= htmlspecialchars(
                                        $caregiver['rating']
                                        ?? '5.0'
                                    ) ?>
                                </strong>

                                <span>
                                    (<?= htmlspecialchars(
                                        $caregiver['reviews']
                                        ?? '128'
                                    ) ?> reviews)
                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- SPECIALIZATIONS -->

                    <div class="specializations">

                        <?php foreach (
                            $caregiver['specializations']
                            ?? ['ELDERLY CARE', 'PHYSIOTHERAPY']
                            as $specialization
                        ): ?>

                            <span>
                                <?= htmlspecialchars(
                                    $specialization
                                ) ?>
                            </span>

                        <?php endforeach; ?>

                    </div>



                    <!-- CONTACT -->

                    <div class="contact-section">


                        <div class="contact-row">

                            <div class="contact-left">

                                <span class="contact-icon">
                                    ☎
                                </span>

                                <span>
                                    <?= htmlspecialchars(
                                        $caregiver['phone']
                                        ?? '+94 77 123 4567'
                                    ) ?>
                                </span>

                            </div>


                            <a
                                href="tel:+94771234567"
                                class="contact-action"
                            >
                                Call
                            </a>

                        </div>



                        <div class="contact-row">

                            <div class="contact-left">

                                <span class="contact-icon">
                                    ✉
                                </span>

                                <span>
                                    <?= htmlspecialchars(
                                        $caregiver['email']
                                        ?? 'sarah.w@safehands.lk'
                                    ) ?>
                                </span>

                            </div>


                            <a
                                href="mailto:sarah.w@safehands.lk"
                                class="contact-action"
                            >
                                Email
                            </a>

                        </div>



                        <!-- BUTTONS -->

                        <div class="caregiver-buttons">

                            <a
                                href="tel:+94771234567"
                                class="button secondary"
                            >
                                ☎
                                Call Caregiver
                            </a>


                            <button
                                type="button"
                                class="button primary"
                                id="messageCaregiver"
                            >
                                💬
                                Send Message
                            </button>

                        </div>

                    </div>

                </div>



                <!-- =====================
                     PATIENT & LOCATION
                ====================== -->

                <div class="card patient-card">

                    <h3 class="card-label">
                        Patient & Location
                    </h3>


                    <!-- PATIENT -->

                    <div class="patient-row">

                        <span class="large-icon">
                            👤
                        </span>

                        <div>

                            <p class="patient-name">

                                <?= htmlspecialchars(
                                    $patient['name']
                                    ?? 'Mr. Silva'
                                ) ?>

                                (<?= htmlspecialchars(
                                    $patient['relationship']
                                    ?? 'Father'
                                ) ?>)

                            </p>


                            <p class="muted">

                                Age:
                                <?= htmlspecialchars(
                                    $patient['age']
                                    ?? '72'
                                ) ?>

                                |

                                Mobility:
                                <?= htmlspecialchars(
                                    $patient['mobility']
                                    ?? 'Assisted'
                                ) ?>

                            </p>

                        </div>

                    </div>



                    <!-- LOCATION -->

                    <div class="patient-row">

                        <span class="large-icon">
                            📍
                        </span>

                        <div>

                            <p class="patient-name">

                                <?= htmlspecialchars(
                                    $booking['location']
                                    ?? '45, Flower Road, Colombo 07'
                                ) ?>

                            </p>


                            <p class="muted">

                                <?= htmlspecialchars(
                                    $booking['location_type']
                                    ?? 'Residential Villa'
                                ) ?>

                                ,

                                Gate Code:

                                <?= htmlspecialchars(
                                    $booking['gate_code']
                                    ?? '1212'
                                ) ?>

                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =========================
                 SERVICE NOTES
            ========================== -->

            <div class="card service-notes-card">

                <div class="service-notes-title">

                    <span class="notes-icon">
                        ▣
                    </span>

                    <h3>
                        Service Notes
                    </h3>

                </div>


                <p class="service-notes">

                    "
                    <?= htmlspecialchars(
                        $booking['service_notes']
                        ?? 'Requires assistance with morning stretches and light walking. Please ensure medications are taken at 9:00 AM with breakfast. Mr. Silva prefers gentle conversational engagement during his walk.'
                    ) ?>
                    "

                </p>

            </div>



            <!-- =========================
                 MAP
            ========================== -->

            <div class="map-card">

                <div class="fake-map">

                    <div class="map-grid"></div>

                    <div class="map-road map-road-1"></div>

                    <div class="map-road map-road-2"></div>

                    <div class="map-road map-road-3"></div>

                    <div class="map-pin">
                        📍
                    </div>

                </div>


                <div class="map-verification">

                    <span class="verification-icon">
                        ✓
                    </span>

                    <span>
                        Caregiver verified for this zone
                    </span>

                </div>

            </div>



            <!-- =========================
                 ADDITIONAL ACTIONS
            ========================== -->

            <div class="card additional-actions-card">

                <h3 class="card-label">
                    Additional Actions
                </h3>


                <div class="additional-actions">

<!-- COMPLAINTS -->
<a
    href="/safehands_mvc/complaint"
    class="action-button outline"
>
    <span>⚠</span>
    Complaints
</a>

<!-- RATE -->
<a
    href="/safehands_mvc/review"
    class="action-button warning"
>
    <span>★</span>
    Rate Session
</a>



                    <!-- PAYMENT HISTORY
                         SEPARATE PAGE -->

                    <a
                        href="/safehands_mvc/payment-history"
                        class="action-button outline"
                    >

                        <span>
                            ▣
                        </span>

                        Payment History

                    </a>

                </div>

            </div>

        </div>



        <!-- =========================
             RIGHT SIDEBAR
        ========================== -->

        <aside class="sidebar">


            <!-- =====================
                 SERVICE CONTROLS
            ====================== -->

            <div class="sidebar-card">

                <h3 class="sidebar-title">
                    SERVICE CONTROLS
                </h3>


                <div class="service-date-box">

                    <p>
                        Service Date
                    </p>

                    <strong>

                        <?= htmlspecialchars(
                            $booking['service_date']
                            ?? 'Tomorrow, Oct 14'
                        ) ?>

                        •

                        <?= htmlspecialchars(
                            $booking['service_time']
                            ?? '08:00 AM'
                        ) ?>

                    </strong>

                </div>



                <!-- GENERATE OTP -->

                <button
                    type="button"
                    class="otp-button"
                    id="generateOtp"
                >

                    <span class="button-icon">
                        🔑
                    </span>

                    <span id="otpText">
                        Generate OTP
                    </span>

                </button>


                <p class="otp-description">

                    Provide this OTP to the caregiver only after they arrive at the location.

                </p>



                <!-- CANCEL -->

                <div class="cancel-section">

                    <button
                        type="button"
                        class="cancel-button"
                        id="cancelBooking"
                    >
                        Cancel Booking
                    </button>

                </div>



                <!-- HELP -->

                <div class="help-section">

                    <div class="help-left">

                        <span>
                            ?
                        </span>

                        <strong>
                            Need help?
                        </strong>

                    </div>


                    <a href="#">
                        Contact Support
                    </a>

                </div>

            </div>



            <!-- =====================
                 SUMMARY
            ====================== -->

            <div class="sidebar-card">

                <h4 class="sidebar-title">
                    SUMMARY
                </h4>


                <div class="summary-list">


                    <div class="summary-row">

                        <span>
                            Duration
                        </span>

                        <strong>
                            <?= htmlspecialchars(
                                $booking['duration']
                                ?? '7 Days'
                            ) ?>
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Type
                        </span>

                        <strong>
                            <?= htmlspecialchars(
                                $booking['type']
                                ?? 'Day Care'
                            ) ?>
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Total
                        </span>

                        <strong class="total">

                            LKR
                            <?= number_format(
                                (float)(
                                    $payment['total']
                                    ?? $booking['total']
                                    ?? 51300
                                ),
                                2
                            ) ?>

                        </strong>

                    </div>

                </div>

            </div>

        </aside>

    </div>

</main>



<!-- =========================
     FOOTER
========================== -->

<footer class="footer">

    <div class="footer-inner">


        <div class="footer-brand">

            <strong>
                SafeHands
            </strong>

            <p>
                © 2024 SafeHands Caregiving Services.
                Professional Healthcare Solutions.
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
                Support
            </a>

        </div>

    </div>

</footer>