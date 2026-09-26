<?php
$b = $booking ?? [];
// Set up variables
$cg_image = '/safehands_mvc/public/assets/images/caregiver-1.jpg'; // placeholder
$cg_name = $b['caregiver_name'] ?? 'Caregiver';
$cg_rating = '4.9'; 
$cg_reviews = '124'; 
$patient = $b['patient_name'] ?? 'Patient';
?>

<!-- =====================================================
     NAVIGATION
===================================================== -->

<header class="top-navigation">

    <div class="navigation-container">

        <div class="navigation-left">

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
                    href="/safehands_mvc/patient"
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

        </div>


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

        <span class="breadcrumb-current">
            Post-Care Review
        </span>

    </nav>


    <!-- =================================================
         PAGE CONTENT
    ================================================== -->

    <div class="review-layout">


        <!-- =================================================
             LEFT COLUMN
        ================================================== -->

        <aside class="caregiver-sidebar">

            <div class="caregiver-card">

                <div class="caregiver-profile">


                    <!-- Caregiver Image -->

                    <div class="caregiver-image-wrapper">

                        <img
                            src="<?= htmlspecialchars($cg_image) ?>"
                            alt="<?= htmlspecialchars($cg_name) ?>"
                            class="caregiver-image"
                        >

                        <span
                            class="verified-badge"
                            title="Verified Professional"
                        >
                            ✓
                        </span>

                    </div>


                    <h2>
                        <?= htmlspecialchars($cg_name) ?>
                    </h2>


                    <p class="caregiver-qualification">
                        <?= htmlspecialchars($caregiver['qualification'] ?? 'Registered Nurse (RN)') ?>
                    </p>


                    <!-- Existing Rating -->

                    <div class="caregiver-rating">

                        <span class="filled-star">
                            ★
                        </span>

                        <strong>
                            <?= htmlspecialchars($cg_rating) ?>
                        </strong>

                        <span>
                            (<?= htmlspecialchars($cg_reviews) ?> reviews)
                        </span>

                    </div>

                </div>


                <!-- Booking Information -->

                <div class="booking-information">


                    <div class="booking-info-item">

                        <p class="info-label">
                            Patient
                        </p>

                        <p class="info-value">
                            <?= htmlspecialchars($patient) ?>
                        </p>

                    </div>


                    <div class="booking-info-item">

                        <p class="info-label">
                            Booking Reference
                        </p>

                        <p class="info-value">
                            #BK-<?= htmlspecialchars(str_pad($b['booking_id'] ?? 0, 4, '0', STR_PAD_LEFT)) ?>
                        </p>

                    </div>


                    <div class="booking-info-item">

                        <p class="info-label">
                            Duration
                        </p>

                        <p class="info-value">
                            <?= htmlspecialchars($booking['duration'] ?? 'Oct 12 - Oct 19 (7 days)') ?>
                        </p>

                    </div>


                    <div class="medication-status">

                        <span class="task-icon">
                            ✓
                        </span>

                        <span>
                            <?= htmlspecialchars($booking['completed_message'] ?? 'All medication tasks completed') ?>
                        </span>

                    </div>

                </div>

            </div>

        </aside>


        <!-- =================================================
             RIGHT COLUMN
        ================================================== -->

        <section class="review-content">

            <div class="review-card">


                <!-- =================================================
                     HEADER
                ================================================== -->

                <header class="review-header">

                    <h1>
                        How was your care experience?
                    </h1>

                    <p>
                        Your feedback is confidential and helps us maintain
                        our high standard of professional care. It will be
                        shared with the caregiver to help them improve.
                    </p>

                </header>


                <!-- =================================================
                     FORM
                ================================================== -->

                <form id="feedbackForm" class="feedback-form" method="POST" action="/safehands_mvc/review/submit">
                    <input type="hidden" name="booking_id" value="<?= htmlspecialchars($b['booking_id'] ?? '') ?>">
                    <input type="hidden" name="family_id" value="<?= htmlspecialchars($b['family_user_id'] ?? '') ?>">
                    <input type="hidden" name="caregiver_id" value="<?= htmlspecialchars($b['caregiver_id'] ?? '') ?>">


                    <!-- =================================================
                         OVERALL RATING
                    ================================================== -->

                    <section class="form-section overall-section">

                        <h3 class="section-title">
                            Overall Experience
                        </h3>


                        <div class="overall-rating-row">

                            <div class="main-stars">

                                <button
                                    type="button"
                                    class="star-rating"
                                    data-value="1"
                                    aria-label="1 star"
                                >
                                    ★
                                </button>

                                <button
                                    type="button"
                                    class="star-rating"
                                    data-value="2"
                                    aria-label="2 stars"
                                >
                                    ★
                                </button>

                                <button
                                    type="button"
                                    class="star-rating"
                                    data-value="3"
                                    aria-label="3 stars"
                                >
                                    ★
                                </button>

                                <button
                                    type="button"
                                    class="star-rating"
                                    data-value="4"
                                    aria-label="4 stars"
                                >
                                    ★
                                </button>

                                <button
                                    type="button"
                                    class="star-rating"
                                    data-value="5"
                                    aria-label="5 stars"
                                >
                                    ★
                                </button>

                            </div>


                            <span
                                id="ratingDescriptor"
                                class="rating-descriptor"
                            >
                                Select a rating
                            </span>

                        </div>

                    </section>


                    <!-- =================================================
                         DETAILED ASSESSMENT
                    ================================================== -->

                    <section class="form-section detailed-section">

                        <h3 class="section-title">
                            Detailed Assessment
                        </h3>


                        <div class="assessment-grid">


                            <!-- Punctuality -->

                            <div class="assessment-item">

                                <div class="assessment-heading">

                                    <label>
                                        Punctuality
                                    </label>

                                    <span>
                                        Arrival &amp; timeliness
                                    </span>

                                </div>


                                <div
                                    class="mini-stars"
                                    data-category="punctuality"
                                >

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="1"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="2"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="3"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="4"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="5"
                                    >
                                        ★
                                    </button>

                                </div>

                            </div>


                            <!-- Communication -->

                            <div class="assessment-item">

                                <div class="assessment-heading">

                                    <label>
                                        Communication
                                    </label>

                                    <span>
                                        Clarity and updates
                                    </span>

                                </div>


                                <div
                                    class="mini-stars"
                                    data-category="communication"
                                >

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="1"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="2"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="3"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="4"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="5"
                                    >
                                        ★
                                    </button>

                                </div>

                            </div>


                            <!-- Empathy -->

                            <div class="assessment-item">

                                <div class="assessment-heading">

                                    <label>
                                        Empathy
                                    </label>

                                    <span>
                                        Patient rapport
                                    </span>

                                </div>


                                <div
                                    class="mini-stars"
                                    data-category="empathy"
                                >

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="1"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="2"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="3"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="4"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="5"
                                    >
                                        ★
                                    </button>

                                </div>

                            </div>


                            <!-- Technical Skill -->

                            <div class="assessment-item">

                                <div class="assessment-heading">

                                    <label>
                                        Technical Skill
                                    </label>

                                    <span>
                                        Medical proficiency
                                    </span>

                                </div>


                                <div
                                    class="mini-stars"
                                    data-category="technical"
                                >

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="1"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="2"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="3"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="4"
                                    >
                                        ★
                                    </button>

                                    <button
                                        type="button"
                                        class="mini-star"
                                        data-value="5"
                                    >
                                        ★
                                    </button>

                                </div>

                            </div>

                        </div>

                    </section>


                    <!-- =================================================
                         WRITTEN REVIEW
                    ================================================== -->

                    <section class="form-section written-section">

                        <label class="section-title">
                            Written Review
                        </label>


                        <div class="review-textarea-wrapper">

                            <textarea
                                id="writtenReview"
                                name="written_review"
                                rows="5"
                                placeholder="Share more details about the quality of care provided..."
                            ></textarea>

                            <span class="minimum-text">
                                Minimum 20 characters
                            </span>

                        </div>

                    </section>


                    <!-- =================================================
                         RECOMMENDATION + PRIVACY
                    ================================================== -->

                    <section class="form-section options-section">


                        <!-- Recommendation -->

                        <div class="recommendation-box">

                            <p>
                                Would you recommend this caregiver to others?
                            </p>


                            <div class="recommendation-options">

                                <label>

                                    <input
                                        type="radio"
                                        name="recommend"
                                        value="yes"
                                    >

                                    <span>
                                        Yes
                                    </span>

                                </label>


                                <label>

                                    <input
                                        type="radio"
                                        name="recommend"
                                        value="no"
                                    >

                                    <span>
                                        No
                                    </span>

                                </label>

                            </div>

                        </div>


                        <!-- Anonymous -->

                        <label class="anonymous-option">

                            <input
                                type="checkbox"
                                id="anonymousReview"
                                name="anonymous"
                            >

                            <span class="checkbox-custom"></span>

                            <span class="anonymous-text">

                                <strong>
                                    Post this review anonymously
                                </strong>

                                <small>
                                    Your name will be hidden from the caregiver
                                    and other users.
                                </small>

                            </span>

                        </label>

                    </section>


                    <!-- =================================================
                         ACTIONS
                    ================================================== -->

                    <footer class="form-actions">

                        <button
                            type="button"
                            class="discard-button"
                            id="discardButton"
                        >
                            Discard
                        </button>


                        <button
                            type="submit"
                            class="submit-button"
                        >
                            Submit Feedback
                        </button>

                    </footer>

                </form>

            </div>

        </section>

    </div>

</main>


<!-- =====================================================
     SUCCESS OVERLAY
===================================================== -->

<div
    class="success-overlay"
    id="successOverlay"
>

    <div class="success-modal">

        <div class="success-icon">
            ✓
        </div>


        <h2>
            Feedback Submitted!
        </h2>


        <p>
            Thank you for helping us maintain the highest quality
            of healthcare service. Your review has been saved
            successfully.
        </p>


        <div class="success-actions">

            <a
                href="/safehands_mvc/family"
                class="dashboard-button"
            >
                Return to Dashboard
            </a>

            <a
                href="/safehands_mvc/bookings"
                class="history-button"
            >
                View My History
            </a>

        </div>

    </div>

</div>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-brand-area">

            <span class="footer-brand">
                SafeHands
            </span>

            <p>
                © 2024 SafeHands Healthcare.
                All rights reserved.
            </p>

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

    </div>

</footer>