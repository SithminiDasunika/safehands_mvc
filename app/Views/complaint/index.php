<?php

$booking = $booking ?? [];
$caregiver = $caregiver ?? [];

?>

<!-- =====================================================
     NAVIGATION
===================================================== -->

<header class="top-navigation">

    <div class="navigation-container">

        <a
            href="/safehands_mvc/family"
            class="brand"
        >
            SafeHands
        </a>


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


        <div class="navigation-actions">

            <button
                type="button"
                class="nav-icon-button"
                id="notificationButton"
                aria-label="Notifications"
            >
                <span class="notification-icon"></span>
            </button>

            <button
                type="button"
                class="nav-icon-button"
                id="accountButton"
                aria-label="Account"
            >
                <span class="account-icon"></span>
            </button>

        </div>

    </div>

</header>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main-container">


    <!-- =================================================
         BREADCRUMB
    ================================================== -->

    <nav class="breadcrumb">

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
            Submit Complaint
        </span>

    </nav>


    <!-- =================================================
         PAGE TWO-COLUMN LAYOUT
    ================================================== -->

    <div class="complaint-layout">


        <!-- =============================================
             LEFT SIDEBAR
        ============================================== -->

        <aside class="booking-sidebar">

            <div class="booking-card">


                <!-- Booking Header -->

                <div class="booking-card-header">

                    <div class="reference-row">

                        <span class="reference-label">
                            Reference Booking
                        </span>

                        <span class="booking-reference">
                            <?= htmlspecialchars($booking['booking_id'] ?? '#SH-882910') ?>
                        </span>

                    </div>


                    <div class="caregiver-summary">

                        <div class="caregiver-image-wrapper">

                            <img
                                src="<?= htmlspecialchars($caregiver['image'] ?? '') ?>"
                                alt="<?= htmlspecialchars($caregiver['name'] ?? 'Caregiver') ?>"
                                class="caregiver-image"
                            >

                        </div>


                        <div>

                            <h3>
                                <?= htmlspecialchars($caregiver['name'] ?? 'Nadeesha Perera') ?>
                            </h3>

                            <p class="caregiver-role">

                                <span class="medical-icon">
                                    +
                                </span>

                                <?= htmlspecialchars($caregiver['qualification'] ?? 'Registered Nurse') ?>

                            </p>

                        </div>

                    </div>

                </div>


                <!-- Booking Information -->

                <div class="booking-card-body">


                    <!-- Patient -->

                    <div class="booking-info">

                        <span class="info-icon person-icon">
                            ●
                        </span>

                        <div>

                            <p class="info-label">
                                Patient
                            </p>

                            <p class="info-value">
                                <?= htmlspecialchars($booking['patient'] ?? 'Mr. Ananda Silva') ?>
                            </p>

                        </div>

                    </div>


                    <!-- Date -->

                    <div class="booking-info">

                        <span class="info-icon calendar-icon">
                            □
                        </span>

                        <div>

                            <p class="info-label">
                                Session Date
                            </p>

                            <p class="info-value">
                                <?= htmlspecialchars($booking['date'] ?? '15 Aug 2026') ?>
                            </p>

                            <p class="info-subvalue">
                                <?= htmlspecialchars($booking['time'] ?? '09:00 AM - 01:00 PM') ?>
                            </p>

                        </div>

                    </div>


                    <!-- Completed -->

                    <div class="completed-box">

                        <span class="completed-icon">
                            ✓
                        </span>

                        <span>
                            <?= htmlspecialchars($booking['status'] ?? 'Care Session Completed') ?>
                        </span>

                    </div>

                </div>

            </div>

        </aside>


        <!-- =============================================
             RIGHT CONTENT
        ============================================== -->

        <section class="complaint-content">

            <div class="complaint-card">


                <!-- =====================================
                     HEADER
                ====================================== -->

                <div class="complaint-header">

                    <h1>
                        Report a Care Issue
                    </h1>

                    <p>
                        We take all concerns seriously. Please provide details
                        about your experience regarding booking
                        <span class="booking-highlight">
                            <?= htmlspecialchars($booking['booking_id'] ?? '#SH-882910') ?>
                        </span>
                        so our quality assurance team can investigate.
                    </p>

                </div>


                <!-- =====================================
                     FORM
                ====================================== -->

                <form
                    class="complaint-form"
                    id="complaintForm"
                >


                    <!-- =================================
                         CATEGORY
                    ================================== -->

                    <fieldset class="form-section">

                        <legend>
                            Category of Concern
                        </legend>


                        <div class="category-grid">


                            <!-- Caregiver Service -->

                            <label class="category-option">

                                <input
                                    type="radio"
                                    name="category"
                                    value="service"
                                    checked
                                >

                                <div class="category-box">

                                    <span class="category-icon">
                                        +
                                    </span>

                                    <span>
                                        Caregiver Service
                                    </span>

                                </div>

                            </label>


                            <!-- Safety -->

                            <label class="category-option">

                                <input
                                    type="radio"
                                    name="category"
                                    value="safety"
                                >

                                <div class="category-box">

                                    <span class="category-icon">
                                        !
                                    </span>

                                    <span>
                                        Safety Concern
                                    </span>

                                </div>

                            </label>


                            <!-- Booking -->

                            <label class="category-option">

                                <input
                                    type="radio"
                                    name="category"
                                    value="booking"
                                >

                                <div class="category-box">

                                    <span class="category-icon">
                                        □
                                    </span>

                                    <span>
                                        Booking Issue
                                    </span>

                                </div>

                            </label>


                            <!-- Other -->

                            <label class="category-option">

                                <input
                                    type="radio"
                                    name="category"
                                    value="other"
                                >

                                <div class="category-box">

                                    <span class="category-icon">
                                        •••
                                    </span>

                                    <span>
                                        Other
                                    </span>

                                </div>

                            </label>

                        </div>

                    </fieldset>


                    <!-- =================================
                         SUBJECT + TIME
                    ================================== -->

                    <div class="form-grid-two">


                        <!-- Subject -->

                        <div class="form-group">

                            <label for="subject">
                                Subject
                            </label>

                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="Briefly describe the issue"
                            >

                        </div>


                        <!-- Time -->

                        <div class="form-group">

                            <label for="incident_time">
                                Approximate Time of Incident
                            </label>

                            <div class="time-input-wrapper">

                                <span class="input-icon">
                                    ◷
                                </span>

                                <input
                                    type="time"
                                    id="incident_time"
                                    name="incident_time"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- =================================
                         DESCRIPTION
                    ================================== -->

                    <div class="form-group">

                        <div class="description-label-row">

                            <label for="description">
                                Tell us what happened
                            </label>

                            <span
                                id="characterCount"
                                class="character-count"
                            >
                                0 / 1000
                            </span>

                        </div>


                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            maxlength="1000"
                            placeholder="Please provide specific details about your concern..."
                        ></textarea>

                    </div>


                    <!-- =================================
                         ATTACHMENTS
                    ================================== -->

                    <div class="form-group">

                        <label class="attachment-label">
                            Attachments (Optional)
                        </label>

                        <p class="attachment-help">
                            Upload any photos, documents, or screenshots
                            that support your concern.
                        </p>


                        <label
                            class="upload-area"
                            for="attachment"
                        >

                            <div class="upload-icon">
                                ↑
                            </div>

                            <p class="upload-title">
                                Click to upload or drag and drop
                            </p>

                            <p class="upload-subtitle">
                                SVG, PNG, JPG or PDF (max. 10MB)
                            </p>

                            <input
                                type="file"
                                id="attachment"
                                name="attachment"
                                accept=".svg,.png,.jpg,.jpeg,.pdf"
                            >

                        </label>


                        <!-- Existing Attachment -->

                        <div
                            class="attachment-preview"
                            id="attachmentPreview"
                        >

                            <span class="file-icon">
                                ▣
                            </span>

                            <div class="file-information">

                                <p>
                                    medical-report-extract.pdf
                                </p>

                                <span>
                                    1.2 MB
                                </span>

                            </div>

                            <button
                                type="button"
                                class="remove-file"
                                id="removeFile"
                                aria-label="Remove attachment"
                            >
                                ×
                            </button>

                        </div>

                    </div>


                    <hr class="form-divider">


                    <!-- =================================
                         URGENCY + FOLLOW-UP
                    ================================== -->

                    <div class="bottom-options">


                        <!-- Urgency -->

                        <fieldset>

                            <legend>
                                Urgency Level
                            </legend>

                            <div class="radio-list">


                                <!-- Normal -->

                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="urgency"
                                        value="normal"
                                        checked
                                    >

                                    <span class="radio-circle"></span>

                                    <span>
                                        Normal
                                    </span>

                                </label>


                                <!-- Important -->

                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="urgency"
                                        value="important"
                                    >

                                    <span class="radio-circle"></span>

                                    <span>
                                        Important
                                    </span>

                                </label>


                                <!-- Urgent -->

                                <label class="radio-option urgent-option">

                                    <input
                                        type="radio"
                                        name="urgency"
                                        value="urgent"
                                    >

                                    <span class="urgent-container">

                                        <span class="radio-circle"></span>

                                        <span>
                                            Urgent
                                        </span>

                                        <span class="urgent-icon">
                                            !
                                        </span>

                                    </span>

                                </label>

                            </div>

                        </fieldset>


                        <!-- Follow-up -->

                        <fieldset>

                            <legend>
                                Preferred Follow-up Method
                            </legend>

                            <div class="radio-list">


                                <!-- Email -->

                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="contact"
                                        value="email"
                                        checked
                                    >

                                    <span class="radio-circle"></span>

                                    <span class="contact-option">
                                        <span class="contact-icon">
                                            @
                                        </span>
                                        Email
                                    </span>

                                </label>


                                <!-- Phone -->

                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="contact"
                                        value="phone"
                                    >

                                    <span class="radio-circle"></span>

                                    <span class="contact-option">
                                        <span class="contact-icon">
                                            ☎
                                        </span>
                                        Phone Call
                                    </span>

                                </label>

                            </div>

                        </fieldset>

                    </div>


                    <!-- =================================
                         FORM BUTTONS
                    ================================== -->

                    <div class="form-actions">

                        <button
                            type="button"
                            class="cancel-button"
                            id="cancelButton"
                        >
                            Cancel
                        </button>


                        <button
                            type="submit"
                            class="submit-button"
                        >

                            Submit Complaint

                            <span class="send-icon">
                                →
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </section>

    </div>

</main>


<!-- =====================================================
     FOOTER
===================================================== -->

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
            © 2024 SafeHands Healthcare. All rights reserved.
        </div>

    </div>

</footer>