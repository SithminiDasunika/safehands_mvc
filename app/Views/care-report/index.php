<?php

$patient = $report['patient'];
$caregiver = $report['caregiver'];
$medication = $report['medication'];
$meal = $report['meal'];
$condition = $report['condition'];
$vitals = $report['vitals'];

$completedActivities = count(
    array_filter(
        $report['activities'],
        fn($activity) => $activity['completed']
    )
);

$totalActivities = count($report['activities']);

?>

<div class="care-report-page">

    <!-- BREADCRUMB -->
    <nav class="breadcrumb" aria-label="Breadcrumbs">
        <?php if(true || (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'caregiver')): ?>
            <a href="/safehands_mvc/caregiver/dashboard">
                <span class="material-icon">home</span> Dashboard
            </a>
            <span class="breadcrumb-arrow">›</span>
            <span class="current">Submitted Report</span>
        <?php else: ?>
            <a href="/safehands_mvc/family">
                <span class="material-icon">home</span> Dashboard
            </a>
            <span class="breadcrumb-arrow">›</span>
            <a href="/safehands_mvc/bookings">My Bookings</a>
            <span class="breadcrumb-arrow">›</span>
            <span class="current">Daily Care Reports</span>
        <?php endif; ?>
    </nav>


    <!-- MAIN HEADER -->
    <div class="report-header-card">

        <div class="report-header-grid">

            <!-- LEFT -->
            <div class="report-header-left">

                <div class="report-status-row">

                    <span class="submitted-badge">

                        <span class="material-icon">
                            check_circle
                        </span>

                        <?= htmlspecialchars($report['status']) ?>

                    </span>

                    <span class="report-reference">
                        Ref #<?= htmlspecialchars($report['reference']) ?>
                    </span>

                </div>


                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h1>Daily Care Report</h1>
                    <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'caregiver'): ?>
                        <div style="display:flex; gap:12px;">
                            <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($patient['booking_id'] ? str_replace('BKG-', '', $patient['booking_id']) : '') ?>" class="btn-action" style="padding:8px 16px; background:var(--primary); color:white; border-radius:8px; text-decoration:none; display:flex; align-items:center; gap:8px;">
                                <span class="material-icon">edit</span> Edit Report
                            </a>
                            <a href="/safehands_mvc/booking/deleteReport/<?= htmlspecialchars($patient['booking_id'] ? str_replace('BKG-', '', $patient['booking_id']) : '') ?>" class="btn-action btn-danger" style="padding:8px 16px; background:#DC362E; color:white; border-radius:8px; text-decoration:none; display:flex; align-items:center; gap:8px;" onclick="return confirm('Are you sure you want to delete this report? This action cannot be undone.');">
                                <span class="material-icon">delete</span> Delete
                            </a>
                        </div>
                    <?php endif; ?>
                </div>


                <p class="report-description">
                    Review the care activities, health observations,
                    and clinical notes verified by your caregiver
                    for this shift.
                </p>


                <div class="submitted-information">

                    <div class="submitted-line">

                        <span class="material-icon">
                            assignment_turned_in
                        </span>

                        <span>
                            Submitted by:
                            <strong>
                                <?= htmlspecialchars($caregiver['qualified_name']) ?>
                            </strong>
                        </span>

                    </div>


                    <div class="submitted-time">

                        <span class="material-icon">
                            schedule
                        </span>

                        <?= htmlspecialchars($report['submitted_at']) ?>

                    </div>

                </div>

            </div>


            <!-- PATIENT SUMMARY -->
            <div class="patient-summary-card">

                <div class="patient-summary-top">

                    <div class="patient-information">

                        <div class="patient-avatar">

                            <img
                                src="<?= htmlspecialchars($patient['image']) ?>"
                                alt="Patient"
                            >

                        </div>


                        <div>

                            <div class="patient-name-row">

                                <h2>
                                    <?= htmlspecialchars($patient['name']) ?>
                                </h2>

                                <span class="patient-id">
                                    <?= htmlspecialchars($patient['patient_id']) ?>
                                </span>

                            </div>

                            <p>
                                Booking ID:
                                <strong>
                                    <?= htmlspecialchars($patient['booking_id']) ?>
                                </strong>
                            </p>

                        </div>

                    </div>


                    <span class="summary-status">
                        <span></span>
                        Submitted
                    </span>

                </div>


                <div class="metadata-grid">

                    <div class="metadata-item">
                        <span>Date</span>
                        <strong>
                            <?= htmlspecialchars($report['date']) ?>
                        </strong>
                    </div>


                    <div class="metadata-item">
                        <span>Shift</span>
                        <strong>
                            <?= htmlspecialchars($report['shift']) ?>
                        </strong>
                    </div>


                    <div class="metadata-item">
                        <span>Time</span>
                        <strong>
                            <?= htmlspecialchars($report['time']) ?>
                        </strong>
                    </div>


                    <div class="metadata-item">
                        <span>Caregiver</span>
                        <strong>
                            <?= htmlspecialchars($caregiver['name']) ?>
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- SECTION 1 -->
    <section class="report-section">

        <div class="section-heading">

            <div class="section-title">

                <span class="section-number">
                    1
                </span>

                <h2>
                    Care Activities
                </h2>

            </div>


            <span class="completion-badge">

                <strong>
                    <?= $completedActivities ?> of <?= $totalActivities ?>
                </strong>

                Activities Completed

            </span>

        </div>


        <div class="activities-grid">

            <?php foreach ($report['activities'] as $activity): ?>

                <div class="
                    activity-item
                    <?= $activity['completed']
                        ? 'activity-completed'
                        : 'activity-not-completed'
                    ?>
                ">

                    <div class="activity-left">

                        <span class="activity-icon">

                            <span class="material-icon">

                                <?= $activity['completed']
                                    ? 'check'
                                    : 'remove'
                                ?>

                            </span>

                        </span>


                        <span class="activity-name">

                            <?= htmlspecialchars($activity['name']) ?>

                        </span>

                    </div>


                    <span class="activity-status">

                        <?= htmlspecialchars($activity['status']) ?>

                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- SECTION 2 -->
    <section class="report-section">

        <div class="section-heading">

            <div class="section-title">

                <span class="section-number">
                    2
                </span>

                <h2>
                    Medication Information
                </h2>

            </div>


            <span class="medication-status">

                <span class="material-icon">
                    verified
                </span>

                <?= htmlspecialchars($medication['status']) ?>

            </span>

        </div>


        <div class="medication-grid">

            <div class="information-field medication-name-field">

                <label>
                    Medication & Dosage
                </label>

                <div class="read-only-value">

                    <span class="material-icon">
                        pill
                    </span>

                    <?= htmlspecialchars($medication['name']) ?>

                </div>

            </div>


            <div class="information-field">

                <label>
                    Time Administered
                </label>

                <div class="read-only-value">

                    <span class="material-icon">
                        schedule
                    </span>

                    <?= htmlspecialchars($medication['time']) ?>

                </div>

            </div>


            <div class="information-field">

                <label>
                    Administration Status
                </label>

                <div class="taken-status">

                    <span class="material-icon">
                        check_circle
                    </span>

                    <?= htmlspecialchars($medication['administration_status']) ?>

                </div>

            </div>

        </div>


        <div class="information-note">

            <span class="material-icon">
                info
            </span>

            <p>
                <strong>Caregiver Note:</strong>
                <?= htmlspecialchars($medication['note']) ?>
            </p>

        </div>

    </section>


    <!-- SECTION 3 + 4 -->
    <div class="two-column-sections">


        <!-- MEAL -->
        <section class="report-section small-section">

            <div class="section-title">

                <span class="section-number">
                    3
                </span>

                <h2>
                    Meal Information
                </h2>

            </div>


            <div class="status-list">

                <div class="status-row">

                    <div>

                        <span class="material-icon">
                            restaurant
                        </span>

                        Breakfast

                    </div>

                    <span class="blue-badge">
                        <?= htmlspecialchars($meal['breakfast']) ?>
                    </span>

                </div>


                <div class="status-row">

                    <div>

                        <span class="material-icon">
                            water_drop
                        </span>

                        Water Intake

                    </div>

                    <span class="green-badge">
                        <?= htmlspecialchars($meal['water']) ?>
                    </span>

                </div>

            </div>


            <div class="section-note">

                <span class="material-icon">
                    comment
                </span>

                <?= htmlspecialchars($meal['note']) ?>

            </div>

        </section>


        <!-- CONDITION -->
        <section class="report-section small-section">

            <div class="section-title">

                <span class="section-number">
                    4
                </span>

                <h2>
                    Patient Condition
                </h2>

            </div>


            <div class="status-list">

                <div class="status-row">

                    <div>

                        <span class="material-icon">
                            vital_signs
                        </span>

                        Overall Condition

                    </div>

                    <span class="green-badge">
                        <?= htmlspecialchars($condition['overall']) ?>
                    </span>

                </div>


                <div class="status-row">

                    <div>

                        <span class="material-icon">
                            sentiment_satisfied
                        </span>

                        Observed Mood

                    </div>

                    <span class="blue-badge">
                        <?= htmlspecialchars($condition['mood']) ?>
                    </span>

                </div>

            </div>


            <div class="section-note">

                <span class="material-icon">
                    comment
                </span>

                <?= htmlspecialchars($condition['note']) ?>

            </div>

        </section>

    </div>


    <!-- SECTION 5 -->
    <section class="report-section">

        <div class="section-heading">

            <div class="section-title">

                <span class="section-number">
                    5
                </span>

                <h2>
                    Health Observations & Vitals
                </h2>

            </div>


            <span class="recorded-time">

                <span class="material-icon">
                    schedule
                </span>

                Recorded at <?= htmlspecialchars($vitals['recorded_at']) ?>

            </span>

        </div>


        <div class="vitals-grid">


            <!-- BP -->
            <div class="vital-card">

                <div class="vital-top">

                    <span>
                        Blood Pressure
                    </span>

                    <div class="vital-icon blue">
                        <span class="material-icon">
                            cardiology
                        </span>
                    </div>

                </div>


                <div class="vital-value">

                    <?= htmlspecialchars($vitals['blood_pressure']['value']) ?>

                    <small>
                        <?= htmlspecialchars($vitals['blood_pressure']['unit']) ?>
                    </small>

                </div>


                <div class="vital-status">

                    <span></span>

                    <?= htmlspecialchars($vitals['blood_pressure']['status']) ?>

                </div>

            </div>


            <!-- TEMPERATURE -->
            <div class="vital-card">

                <div class="vital-top">

                    <span>
                        Body Temperature
                    </span>

                    <div class="vital-icon orange">
                        <span class="material-icon">
                            device_thermostat
                        </span>
                    </div>

                </div>


                <div class="vital-value">

                    <?= htmlspecialchars($vitals['temperature']['value']) ?>

                    <small>
                        <?= htmlspecialchars($vitals['temperature']['unit']) ?>
                    </small>

                </div>


                <div class="vital-status">

                    <span></span>

                    <?= htmlspecialchars($vitals['temperature']['status']) ?>

                </div>

            </div>


            <!-- HEART RATE -->
            <div class="vital-card">

                <div class="vital-top">

                    <span>
                        Heart Rate
                    </span>

                    <div class="vital-icon red">
                        <span class="material-icon">
                            monitor_heart
                        </span>
                    </div>

                </div>


                <div class="vital-value">

                    <?= htmlspecialchars($vitals['heart_rate']['value']) ?>

                    <small>
                        <?= htmlspecialchars($vitals['heart_rate']['unit']) ?>
                    </small>

                </div>


                <div class="vital-status">

                    <span></span>

                    <?= htmlspecialchars($vitals['heart_rate']['status']) ?>

                </div>

            </div>

        </div>

    </section>


    <!-- SECTION 6 -->
    <section class="report-section">

        <div class="section-title">

            <span class="section-number">
                6
            </span>

            <h2>
                Caregiver Observations & Shift Summary
            </h2>

        </div>


        <div class="caregiver-notes">

            <span class="quote-icon material-icon">
                format_quote
            </span>

            <p>
                <?= htmlspecialchars($report['notes']) ?>
            </p>


            <div class="written-by">

                — Written by

                <strong>
                    <?= htmlspecialchars($caregiver['qualified_name']) ?>
                </strong>

                (Lead Caregiver)

            </div>

        </div>

    </section>


    <!-- SECTION 7 -->
    <section class="report-section">

        <div class="section-heading">

            <div class="section-title">

                <span class="section-number">
                    7
                </span>

                <h2>
                    Attachments & Documentation
                </h2>

            </div>


            <span class="attachment-count">
                <?= count($report['attachments']) ?> Verified Files
            </span>

        </div>


        <div class="attachments-grid">

            <?php foreach ($report['attachments'] as $attachment): ?>

                <div class="attachment-card">

                    <div class="attachment-info">

                        <div class="attachment-icon">

                            <span class="material-icon">
                                image
                            </span>

                        </div>


                        <div>

                            <div class="attachment-name">

                                <?= htmlspecialchars($attachment['name']) ?>

                            </div>

                            <div class="attachment-meta">

                                <?= htmlspecialchars($attachment['type']) ?>
                                •
                                <?= htmlspecialchars($attachment['size']) ?>
                                • Uploaded
                                <?= htmlspecialchars($attachment['uploaded']) ?>

                            </div>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="view-attachment"
                        data-file="<?= htmlspecialchars($attachment['name']) ?>"
                    >

                        <span class="material-icon">
                            visibility
                        </span>

                        View

                    </button>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- SECTION 8 -->
    <div class="submitted-by-card">

        <div class="caregiver-profile">

            <div class="caregiver-avatar">

                <img
                    src="<?= htmlspecialchars($caregiver['image']) ?>"
                    alt="Caregiver"
                >

            </div>


            <div>

                <div class="caregiver-name-row">

                    <h3>
                        <?= htmlspecialchars($caregiver['name']) ?>
                    </h3>

                    <span class="verified-badge">

                        <span class="material-icon">
                            verified
                        </span>

                        Verified Caregiver

                    </span>

                </div>


                <p>
                    Caregiver ID:
                    <strong>
                        <?= htmlspecialchars($caregiver['id']) ?>
                    </strong>

                    <span>•</span>

                    Reg #
                    <strong>
                        <?= htmlspecialchars($caregiver['registration']) ?>
                    </strong>

                </p>

            </div>

        </div>


        <div class="signature-information">

            <div>

                <span>
                    Digital Signature Confirmed
                </span>

                <strong>
                    <?= htmlspecialchars($report['submitted_at']) ?>
                </strong>

            </div>


            <div class="signature-icon">

                <span class="material-icon">
                    shield_person
                </span>

            </div>

        </div>

    </div>


    <!-- NOTICE -->
    <div class="family-notice">

        <span class="material-icon">
            info
        </span>

        <span>

            <strong>Notice to Family:</strong>

            Report submitted directly by the assigned caregiver.
            All data and observations recorded above are certified
            pursuant to the SafeHands Quality & Clinical Standard Protocols.

        </span>

    </div>


    <!-- ACTIONS -->
    <div class="report-actions">

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'caregiver'): ?>
            <a href="/safehands_mvc/bookings/pendingReports" class="back-button">
                <span class="material-icon">arrow_back</span>
                Back to Completed Sessions
            </a>
            <div class="action-buttons">
                <button type="button" class="contact-caregiver" id="contactCaregiver">
                    <span class="material-icon">chat</span>
                    Contact Family Member
                </button>
        <?php else: ?>
            <a href="/safehands_mvc/care-reports" class="back-button">
                <span class="material-icon">arrow_back</span>
                Back to care Reports
            </a>
            <div class="action-buttons">
                <button type="button" class="contact-caregiver" id="contactCaregiver">
                    <span class="material-icon">chat</span>
                    Contact Caregiver
                </button>
        <?php endif; ?>

        </div>

    </div>

</div>