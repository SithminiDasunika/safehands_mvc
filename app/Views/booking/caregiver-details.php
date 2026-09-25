<?php
$booking = $booking ?? [];
$patient = $patient ?? [];
$caregiver = $caregiver ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details | SafeHands Caregiver</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-booking.css?v=1790333387">
</head>
<body>

<!-- Top Navigation Bar -->
<header class="header">
    <div class="header-inner">
        <a href="/safehands_mvc/caregiver/dashboard" class="brand">SafeHands</a>
        <nav class="nav-links">
            <a href="/safehands_mvc/caregiver/dashboard">Dashboard</a>
            <a href="/safehands_mvc/bookings" class="active">Booking Requests</a>
             
        </nav>
        <div class="header-actions">
            <span class="material-symbols-outlined">notifications</span>
            <img class="profile-pic" src="<?= htmlspecialchars($caregiver['image'] ?? 'https://via.placeholder.com/40') ?>">
        </div>
    </div>
</header>

<main class="main-container">
    <!-- Breadcrumbs -->
    <nav class="breadcrumb">
        <a href="/safehands_mvc/bookings" style="color:inherit;text-decoration:none;">Booking Requests</a>
        <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
        <span style="color:var(--primary); font-weight:600;">Booking Details</span>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <div class="page-title-row">
                <h1 class="page-title">Booking ID: #BK-2026-<?= str_pad($booking['booking_id'] ?? 125, 5, '0', STR_PAD_LEFT) ?></h1>
                <span class="status-badge" id="status-badge"><?= htmlspecialchars($booking['status'] ?? 'Confirmed') ?></span>
            </div>
            <p class="service-subtitle">
                <span class="material-symbols-outlined" style="color:var(--primary)">schedule</span>
                Today's Service: <strong><?= htmlspecialchars($booking['service_time'] ?? 'Morning Shift') ?></strong>
            </p>
        </div>
    </div>

    <!-- Layout Grid -->
    <div class="grid-layout">
        <!-- Left Column: Information -->
        <div>
            <!-- Patient Information Card -->
            <section class="card">
                <div class="patient-header">
                    <img class="patient-avatar" src="https://via.placeholder.com/96">
                    <div style="flex:1;">
                        <h2 style="font-size:24px; margin:0;"><?= htmlspecialchars($patient['name'] ?? 'Mr. Silva') ?></h2>
                        <div class="patient-tags">
                            <span class="tag">78 Years</span>
                            <span class="tag">Male</span>
                            <span class="tag error">O+</span>
                            <span class="tag">Father</span>
                        </div>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-block">
                        <label>Clinical Focus</label>
                        <p>Post-Op Care</p>
                    </div>
                    <div class="info-block">
                        <label>Medical Conditions</label>
                        <p><?= htmlspecialchars($booking['service_notes'] ?? 'Hypertension') ?></p>
                    </div>
                    <div class="info-block">
                        <label>Mobility Status</label>
                        <p style="display:flex; align-items:center; gap:8px;">
                            <span class="material-symbols-outlined" style="color:var(--status-warning)">info</span>
                            Requires Assistance
                        </p>
                    </div>
                    <div class="info-block">
                        <label>Emergency Contact</label>
                        <p style="color:var(--primary); font-weight:600; display:flex; align-items:center; gap:8px;">
                            <span class="material-symbols-outlined">call</span>
                            +94 77 123 4567
                        </p>
                    </div>
                </div>
            </section>

            <!-- Service Information Card -->
            <section class="card">
                <h3 class="card-title">Service Details</h3>
                <div class="info-grid">
                    <div style="display:flex; gap:16px;">
                        <div style="width:48px;height:48px;background:var(--primary-fixed);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--primary);">
                            <span class="material-symbols-outlined">calendar_today</span>
                        </div>
                        <div>
                            <p style="font-size:12px;color:var(--on-surface-variant);margin:0;margin-bottom:4px;">Date & Time</p>
                            <p style="margin:0;font-weight:600;"><?= htmlspecialchars($booking['service_date'] ?? '15 July 2026') ?></p>
                            <p style="margin:0;font-size:14px;color:var(--on-surface-variant);"><?= htmlspecialchars($booking['service_time'] ?? '8:00 AM - 12:00 PM') ?></p>
                        </div>
                    </div>
                    <div style="display:flex; gap:16px;">
                        <div style="width:48px;height:48px;background:var(--primary-fixed);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--primary);">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <p style="font-size:12px;color:var(--on-surface-variant);margin:0;margin-bottom:4px;">Service Address</p>
                            <p style="margin:0;font-weight:600;"><?= htmlspecialchars($booking['location'] ?? '45/A, Flower Road, Colombo 07') ?></p>
                            <a href="#" style="color:var(--primary);font-size:14px;text-decoration:none;margin-top:8px;display:inline-block;">View on Map</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Special Care Instructions Card -->
            <section class="special-card">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:16px;">
                    <span class="material-symbols-outlined" style="color:var(--primary)">priority_high</span>
                    <h3 style="margin:0;font-size:14px;">Special Care Instructions</h3>
                </div>
                <ul>
                    <li><div class="dot"></div><span>Walking assistance required for all movement</span></li>
                    <li><div class="dot"></div><span>Administer prescribed medication immediately after breakfast</span></li>
                    <li><div class="dot red"></div><span style="color:var(--error);font-weight:600;">Severe Peanut Allergy: Ensure zero exposure</span></li>
                </ul>
            </section>

            <section class="notes-card">
                <p style="margin:0;">"Please ensure my father drinks enough water and completes his morning exercise routine as prescribed by the physiotherapist."</p>
                <p style="margin:0; margin-top:16px; font-size:12px; font-style:normal;">— Sent by Family Representative</p>
            </section>
        </div>

        <!-- Right Column: Sticky Workflow Card -->
        <div>
            <div class="card workflow-card">
                <div class="workflow-header">
                    <h3 style="margin:0;font-size:14px;">Service Workflow</h3>
                </div>

                <div class="stepper">
                    <div class="stepper-item">
                        <div class="stepper-line"></div>
                        <div class="step-icon success">
                            <span class="material-symbols-outlined" style="font-size:14px;">check</span>
                        </div>
                        <div>
                            <p style="margin:0;font-size:14px;font-weight:500;">Booking Confirmed</p>
                            <p style="margin:0;font-size:11px;color:var(--on-surface-variant);">COMPLETED</p>
                        </div>
                    </div>

                    <div class="stepper-item" id="step-2">
                        <div class="stepper-line"></div>
                        <div class="step-icon current" id="step-2-icon">
                            <div class="inner-dot"></div>
                        </div>
                        <div>
                            <p style="margin:0;font-size:14px;font-weight:500;">OTP Verification</p>
                            <p style="margin:0;font-size:11px;color:var(--primary);" id="step-2-status">CURRENT</p>
                        </div>
                    </div>

                    <div class="stepper-item" id="step-3">
                        <div class="stepper-line"></div>
                        <div class="step-icon" id="step-3-icon"></div>
                        <div>
                            <p style="margin:0;font-size:14px;color:var(--on-surface-variant);" id="step-3-title">Service Started</p>
                            <p style="margin:0;font-size:11px;color:var(--on-surface-variant);" id="step-3-status">PENDING</p>
                        </div>
                    </div>

                    <div class="stepper-item">
                        <div class="step-icon"></div>
                        <div>
                            <p style="margin:0;font-size:14px;color:var(--on-surface-variant);">Submit Daily Care Report</p>
                            <p style="margin:0;font-size:11px;color:var(--on-surface-variant);">PENDING</p>
                        </div>
                    </div>
                </div>

                <div class="workflow-action">
                    <!-- OTP View -->
                    <div id="otp-view">
                        <h4 style="margin:0;font-size:18px;margin-bottom:8px;">Verify Family OTP</h4>
                        <p style="margin:0;font-size:14px;color:var(--on-surface-variant);margin-bottom:24px;line-height:1.5;">Ask the family member to generate the OTP from their SafeHands account and provide it after you arrive.</p>
                        <div class="otp-inputs">
                            <input type="text" class="otp-input" maxlength="1" value="8">
                            <input type="text" class="otp-input" maxlength="1" value="4">
                            <input type="text" class="otp-input" maxlength="1" value="2">
                            <input type="text" class="otp-input" maxlength="1" value="7">
                        </div>
                        <button class="btn-primary" id="btn-verify">Verify OTP</button>
                    </div>

                    <!-- Loading -->
                    <div id="loading-view" class="hidden" style="text-align:center;">
                        <div class="loader"></div>
                        <p>Verifying OTP...</p>
                    </div>

                    <!-- Success -->
                    <div id="success-view" class="hidden" style="text-align:center;">
                        <div style="width:64px;height:64px;border-radius:50%;background:rgba(2,87,71,0.1);color:var(--status-success);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;" class="success-pulse">
                            <span class="material-symbols-outlined" style="font-size:32px;">verified_user</span>
                        </div>
                        <h4 style="margin:0;font-size:24px;color:var(--status-success);margin-bottom:8px;">OTP Verified!</h4>
                        <p style="color:var(--on-surface-variant);font-size:14px;margin-bottom:24px;">Family identity verified. You may begin today's service.</p>
                        <button class="btn-primary" id="btn-start">Start Care Service</button>
                    </div>

                    <!-- Progress -->
                    <div id="progress-view" class="hidden" style="text-align:center;">
                        <div style="width:64px;height:64px;border-radius:50%;background:var(--primary-fixed);color:var(--primary);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <span class="material-symbols-outlined" style="font-size:32px;">clinical_notes</span>
                        </div>
                        <h4 style="margin:0;font-size:24px;color:var(--primary);margin-bottom:8px;">Service Started</h4>
                        <div style="background:var(--surface-muted);padding:16px;border-radius:12px;margin:24px 0;">
                            <p style="margin:0;font-size:12px;text-transform:uppercase;color:var(--on-surface-variant);">Start Time</p>
                            <p style="margin:0;font-size:24px;font-weight:700;">8:03 AM</p>
                        </div>
                        <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['booking_id'] ?? '') ?>" class="btn-primary" style="margin-bottom:12px; display:block; text-align:center; text-decoration:none;">Submit Daily Care Report</a>
                        <a href="/safehands_mvc/caregiver/dashboard" style="display:block;text-align:center;padding:14px;background:var(--surface-muted);color:var(--on-surface-variant);border-radius:12px;text-decoration:none;font-weight:600;">Return to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnVerify = document.getElementById('btn-verify');
        const btnStart = document.getElementById('btn-start');
        
        const otpView = document.getElementById('otp-view');
        const loadingView = document.getElementById('loading-view');
        const successView = document.getElementById('success-view');
        const progressView = document.getElementById('progress-view');

        const step2Icon = document.getElementById('step-2-icon');
        const step2Status = document.getElementById('step-2-status');
        const step3Icon = document.getElementById('step-3-icon');
        const step3Status = document.getElementById('step-3-status');
        const step3Title = document.getElementById('step-3-title');
        const statusBadge = document.getElementById('status-badge');

        btnVerify.addEventListener('click', () => {
            const inputs = document.querySelectorAll('.otp-input');
            let otp = '';
            inputs.forEach(input => otp += input.value);

            otpView.classList.add('hidden');
            loadingView.classList.remove('hidden');

// MOCKED OTP VERIFICATION FOR UI DEMO
            setTimeout(() => {
                loadingView.classList.add('hidden');
                successView.classList.remove('hidden');

                step2Icon.innerHTML = `<span class="material-symbols-outlined" style="font-size:14px;">check</span>`;
                step2Icon.className = 'step-icon success';
                step2Status.innerText = 'COMPLETED';
                step2Status.style.color = 'var(--on-surface-variant)';

                step3Icon.className = 'step-icon current';
                step3Icon.innerHTML = `<div class="inner-dot"></div>`;
                step3Title.style.color = 'var(--on-surface)';
                step3Status.innerText = 'READY TO START';
                step3Status.style.color = 'var(--primary)';
            }, 600);
        });

        btnStart.addEventListener('click', () => {
            successView.classList.add('hidden');
            progressView.classList.remove('hidden');

            step3Icon.innerHTML = `<span class="material-symbols-outlined" style="font-size:14px;">check</span>`;
            step3Icon.className = 'step-icon success';
            step3Status.innerText = 'COMPLETED';
            step3Status.style.color = 'var(--on-surface-variant)';

            statusBadge.innerText = 'In Progress';
            statusBadge.style.background = 'var(--surface-container-low)';
            statusBadge.style.color = 'var(--primary)';
        });
    });
</script>

</body>
</html>
