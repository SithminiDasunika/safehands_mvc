<?php
$title = $title ?? 'My Schedule | SafeHands';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-schedule.css?v=2"
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

                <a
                    href="/safehands_mvc/caregiver/schedule"
                    class="nav-link active"
                >
                    මගේ උපලේඛනය
                </a>

                 

            </nav>

        </div>

        <div class="navbar-right">
                        <div class="language-switcher" style="display:flex; align-items:center; gap:8px; margin-right:12px; font-size:15px;">
                <a href="/safehands_mvc/caregiver/schedule" style="color:#059669; text-decoration:none;">English</a>
                <span style="color:#9ca3af;">|</span>
                <a href="/safehands_mvc/caregiver/scheduleSi" style="color:#059669; font-weight:700; text-decoration:none;">සිංහල</a>
            </div>


             

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

        <span>Today's Schedule</span>

        <span>›</span>

        <strong>Daily Care Report</strong>

    </nav>


    <div id="report-form-container">

        <!-- Page Header + Patient Summary -->

        <section class="page-header">

            <div class="page-heading">

                <h1>
                    Submit Daily Care Report
                </h1>

                <p>
                    Complete today's care report before ending the service.
                    Ensure all medical data and observations are accurate
                    for the family's review.
                </p>

            </div>


            <!-- Patient Summary -->

            <div class="patient-card">

                <div class="patient-header">

                    <div class="patient-avatar">
                        MS
                    </div>

                    <div>

                        <h3>
                            Mr. Silva
                        </h3>

                        <p>
                            Booking ID:
                            <strong>BK-2026-00125</strong>
                        </p>

                    </div>

                </div>


                <div class="patient-details">

                    <div>

                        <span class="detail-label">
                            Date
                        </span>

                        <span class="detail-value">
                            15 July 2026
                        </span>

                    </div>


                    <div>

                        <span class="detail-label">
                            Shift
                        </span>

                        <span class="detail-value primary-text">
                            Morning Shift
                        </span>

                        <span class="detail-small">
                            08:00 AM - 12:00 PM
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <!-- Daily Report Form -->

        <form
            id="dailyReportForm"
            class="daily-report-form"
            method="POST"
            action="#"
            enctype="multipart/form-data"
        >


            <!-- 1. Care Activities -->

            <section class="form-section">

                <div class="section-header">

                    <span class="section-icon">
                        ♥
                    </span>

                    <h2>
                        1. Care Activities
                    </h2>

                </div>


                <div class="section-content">

                    <div class="activity-grid">

                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Assisted Bathing"
                            >

                            <span>
                                Assisted Bathing
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Dressing"
                            >

                            <span>
                                Dressing
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Medication Administered"
                            >

                            <span>
                                Medication Administered
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Meal Prep"
                            >

                            <span>
                                Meal Prep
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Feeding"
                            >

                            <span>
                                Feeding
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Walking Assistance"
                            >

                            <span>
                                Walking Assistance
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Exercise"
                            >

                            <span>
                                Exercise
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="Companionship"
                            >

                            <span>
                                Companionship
                            </span>

                        </label>


                        <label class="checkbox-option">

                            <input
                                type="checkbox"
                                name="care_activities[]"
                                value="BP Monitoring"
                            >

                            <span>
                                BP Monitoring
                            </span>

                        </label>

                    </div>

                </div>

            </section>


            <!-- 2. Medication Information -->

            <section class="form-section">

                <div class="section-header">

                    <span class="section-icon">
                        +
                    </span>

                    <h2>
                        2. Medication Information
                    </h2>

                </div>


                <div class="section-content">

                    <div class="form-grid two-columns">

                        <div class="form-group">

                            <label for="medicationAdministered">
                                Was medication administered?
                            </label>

                            <select
                                id="medicationAdministered"
                                name="medication_administered"
                            >

                                <option value="Yes">
                                    Yes, according to schedule
                                </option>

                                <option value="No - Refused">
                                    No, patient refused
                                </option>

                                <option value="No - Unavailable">
                                    No, medication unavailable
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="form-grid three-columns">

                        <div class="form-group">

                            <label for="medicationName">
                                Medication Name
                            </label>

                            <input
                                type="text"
                                id="medicationName"
                                name="medication_name"
                                placeholder="e.g., Lisinopril"
                            >

                        </div>


                        <div class="form-group">

                            <label for="medicationTime">
                                Time Administered
                            </label>

                            <input
                                type="time"
                                id="medicationTime"
                                name="medication_time"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Status
                            </label>

                            <div
                                class="status-buttons"
                                data-status-group="medication-status"
                            >

                                <button
                                    type="button"
                                    class="status-button active"
                                    data-value="Taken"
                                >
                                    Taken
                                </button>

                                <button
                                    type="button"
                                    class="status-button"
                                    data-value="Refused"
                                >
                                    Refused
                                </button>

                                <button
                                    type="button"
                                    class="status-button"
                                    data-value="Missed"
                                >
                                    Missed
                                </button>

                            </div>

                            <input
                                type="hidden"
                                id="medicationStatus"
                                name="medication_status"
                                value="Taken"
                            >

                        </div>

                    </div>

                </div>

            </section>


            <!-- Two Column Sections -->

            <div class="two-section-layout">


                <!-- 3. Meal Information -->

                <section class="form-section">

                    <div class="section-header">

                        <span class="section-icon">
                            🍴
                        </span>

                        <h2>
                            3. Meal Information
                        </h2>

                    </div>


                    <div class="section-content compact-content">

                        <div class="inline-field">

                            <label for="breakfast">
                                Breakfast
                            </label>

                            <select
                                id="breakfast"
                                name="breakfast"
                            >

                                <option value="Completed">
                                    Completed
                                </option>

                                <option value="Partially">
                                    Partially
                                </option>

                                <option value="Refused">
                                    Refused
                                </option>

                                <option value="Not Applicable">
                                    Not Applicable
                                </option>

                            </select>

                        </div>


                        <div class="inline-field">

                            <label for="waterIntake">
                                Water Intake
                            </label>

                            <select
                                id="waterIntake"
                                name="water_intake"
                            >

                                <option value="Adequate">
                                    Adequate
                                </option>

                                <option value="Moderate">
                                    Moderate
                                </option>

                                <option value="Low">
                                    Low
                                </option>

                            </select>

                        </div>

                    </div>

                </section>


                <!-- 4. Patient Condition -->

                <section class="form-section">

                    <div class="section-header">

                        <span class="section-icon">
                            ☺
                        </span>

                        <h2>
                            4. Patient Condition
                        </h2>

                    </div>


                    <div class="section-content compact-content">

                        <div class="inline-field">

                            <label for="overallCondition">
                                Overall Condition
                            </label>

                            <select
                                id="overallCondition"
                                name="overall_condition"
                            >

                                <option value="Stable">
                                    Stable
                                </option>

                                <option value="Good">
                                    Good
                                </option>

                                <option value="Fair">
                                    Fair
                                </option>

                                <option value="Weakening">
                                    Weakening
                                </option>

                            </select>

                        </div>


                        <div class="inline-field">

                            <label for="mood">
                                Mood
                            </label>

                            <select
                                id="mood"
                                name="mood"
                            >

                                <option value="Happy">
                                    Happy
                                </option>

                                <option value="Calm">
                                    Calm
                                </option>

                                <option value="Irritable">
                                    Irritable
                                </option>

                                <option value="Depressed">
                                    Depressed
                                </option>

                            </select>

                        </div>

                    </div>

                </section>

            </div>


            <!-- 5. Health Observations -->

            <section class="form-section">

                <div class="section-header">

                    <span class="section-icon">
                        +
                    </span>

                    <h2>
                        5. Health Observations
                    </h2>

                </div>


                <div class="section-content">

                    <div class="form-grid three-columns">

                        <div class="form-group">

                            <label for="bloodPressure">
                                Blood Pressure (mmHg)
                            </label>

                            <div class="input-with-unit">

                                <input
                                    type="text"
                                    id="bloodPressure"
                                    name="blood_pressure"
                                    placeholder="e.g., 120/80"
                                >

                                <span>
                                    mmHg
                                </span>

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="temperature">
                                Temperature (°F)
                            </label>

                            <div class="input-with-unit">

                                <input
                                    type="text"
                                    id="temperature"
                                    name="temperature"
                                    placeholder="e.g., 98.4"
                                >

                                <span>
                                    °F
                                </span>

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="heartRate">
                                Heart Rate (BPM)
                            </label>

                            <div class="input-with-unit">

                                <input
                                    type="text"
                                    id="heartRate"
                                    name="heart_rate"
                                    placeholder="e.g., 72"
                                >

                                <span>
                                    BPM
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            <!-- 6. Additional Notes -->

            <section class="form-section">

                <div class="section-header">

                    <span class="section-icon">
                        ✎
                    </span>

                    <h2>
                        6. Additional Notes
                    </h2>

                </div>


                <div class="section-content">

                    <textarea
                        id="additionalNotes"
                        name="additional_notes"
                        rows="5"
                        placeholder="Enter detailed observations about patient's status, specific behaviors, or any incidents during the shift..."
                    ></textarea>

                </div>

            </section>


            <!-- 7. Attachments -->

            <section class="form-section">

                <div class="section-header">

                    <span class="section-icon">
                        📎
                    </span>

                    <h2>
                        7. Attachments
                    </h2>

                </div>


                <div class="section-content">

                    <div
                        class="upload-zone"
                        id="uploadZone"
                    >

                        <div class="upload-icon">
                            ↑
                        </div>

                        <p class="upload-title">
                            Click to upload or drag and drop
                        </p>

                        <p class="upload-description">
                            Photos of medication chart or patient condition
                            (MAX 10MB)
                        </p>

                        <input
                            type="file"
                            id="fileUpload"
                            name="attachments[]"
                            multiple
                            accept="image/*,.pdf"
                        >

                    </div>

                    <div
                        id="fileList"
                        class="file-list"
                    ></div>

                </div>

            </section>


            <!-- Confirmation -->

            <section class="confirmation-box">

                <label class="confirmation-label">

                    <input
                        type="checkbox"
                        id="reportConfirmation"
                        name="report_confirmation"
                        value="1"
                        required
                    >

                    <span>

                        <strong>
                            I confirm that the information provided is accurate
                        </strong>

                        <small>
                            This report will be shared with the family member
                            and relevant authorized personnel upon submission.
                        </small>

                    </span>

                </label>

            </section>


            <!-- Footer Buttons -->

            <div class="form-actions">

                <button
                    type="button"
                    id="saveDraftButton"
                    class="button secondary-button"
                >
                    Save Draft
                </button>

                <button
                    type="submit"
                    class="button primary-button"
                >
                    වාර්තාව ඉදිරිපත් කරන්න
                </button>

            </div>

        </form>

    </div>


    <!-- Success State -->

    <section
        id="success-state"
        class="success-state hidden"
    >

        <div class="success-content">

            <div class="success-icon">
                ✓
            </div>

            <h1>
                Daily Care Report Submitted Successfully
            </h1>

            <p>
                The family member can now view today's care report.
                A digital copy has also been prepared for administrative review.
            </p>

            <div class="success-actions">

                <a
                    href="/safehands_mvc/caregiver/schedule"
                    class="button secondary-button"
                >
                    View මගේ උපලේඛනය
                </a>

                <a
                    href="/safehands_mvc/caregiver/dashboard"
                    class="button primary-button"
                >
                    Return to උපකරණ පුවරුව
                </a>

            </div>

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


        <div class="footer-links">

            <a href="#">
                නියමයන් of Service
            </a>

            <a href="#">
                රහස්‍යතා ප්‍රතිපත්තිය
            </a>

            <a href="#">
                සහාය අමතන්න
            </a>

            <a href="#">
                උදව් මධ්‍යස්ථානය
            </a>

        </div>

    </div>

</footer>


<script
    src="/safehands_mvc/public/assets/js/caregiver-schedule.js"
></script>

</body>

</html>