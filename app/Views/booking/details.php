<?php
$booking = $booking ?? [];
$caregiver = $caregiver ?? [];
$patient = $patient ?? [];
$payment = $payment ?? [];
$sessions = $booking['sessions'] ?? [];
$selectedSession = $booking['selected_session'] ?? null;
$bookingStatus = strtolower(trim((string)($booking['status'] ?? 'pending')));
$statusLabel = ucwords(str_replace('_', ' ', $bookingStatus));
$canCancel = !empty($can_cancel);
$showDemoOtp = !in_array($bookingStatus, ['cancelled', 'completed'], true);
$cancelResult = isset($_GET['cancelled']) ? (string)$_GET['cancelled'] : null;
$formatDate = static function (?string $date): string {
    if (!$date) return 'Date not set';
    $timestamp = strtotime($date);
    return $timestamp ? date('D, d M Y', $timestamp) : $date;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Booking Details | SafeHands') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/payment.css?v=2">
    <style>
        .details-card {
            background-color: white;
            border-radius: 0.75rem;
            border: 1px solid #F1F5F9;
            padding: 24px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            margin-bottom: 24px;
        }
        .details-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #F1F5F9;
        }
        .details-card-title {
            font-size: 1.125rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #111c2d;
        }
        .status-tag {
            background-color: rgba(0, 74, 198, 0.1);
            color: #004ac6;
            padding: 6px 16px;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .status-tag.active {
            background-color: rgba(2, 87, 71, 0.1);
            color: #025747;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-item .label {
            font-size: 0.75rem;
            color: #434655;
            margin-bottom: 4px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .info-item .val {
            font-size: 1rem;
            font-weight: 600;
            color: #111c2d;
        }
        .action-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
        }
        .btn-action {
            padding: 12px;
            border-radius: 0.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            transition: 0.2s;
            cursor: pointer;
            border: none;
            font-size: 0.875rem;
        }
        .btn-primary { background: #004ac6; color: white; }
        .btn-primary:hover { background: #003da1; }
        .btn-secondary { background: #e7eeff; color: #004ac6; }
        .btn-secondary:hover { background: #d0dfff; }
        .btn-danger { background: #fff0f0; color: #ba1a1a; }
        .btn-danger:hover { background: #ffe0e0; }
        .btn-warning { background: rgba(254, 187, 2, 0.1); color: #b38500; }
        .btn-warning:hover { background: rgba(254, 187, 2, 0.2); }
        .btn-outline { border: 1px solid #c3c6d7; background: white; color: #111c2d; }
        .btn-outline:hover { background: #f9f9ff; }

        .service-notes {
            background: #F8FAFC;
            padding: 16px;
            border-radius: 0.5rem;
            border-left: 4px solid #004ac6;
            font-size: 0.875rem;
            line-height: 1.6;
            color: #434655;
            font-style: italic;
        }

        .map-container {
            height: 200px;
            background: #e7eeff;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .map-pin {
            font-size: 2rem;
            color: #ba1a1a;
            position: relative;
            z-index: 2;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .map-lines {
            position: absolute;
            inset: 0;
            opacity: 0.2;
            background-image: linear-gradient(#004ac6 1px, transparent 1px), linear-gradient(90deg, #004ac6 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .map-verification {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(2, 87, 71, 0.1);
            color: #025747;
            padding: 12px 16px;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .otp-box {
            background: #F8FAFC;
            border: 1px solid #F1F5F9;
            padding: 24px;
            border-radius: 0.5rem;
            text-align: center;
            margin-bottom: 24px;
        }
        .otp-demo-note { color:#667085; font-size:.8rem; line-height:1.5; margin:0 0 16px; }
        .otp-demo-badge { display:inline-flex; align-items:center; gap:5px; border-radius:999px; padding:5px 10px; background:#fff4d8; color:#805b00; font-size:.7rem; font-weight:700; margin-bottom:12px; }
        .otp-box .btn-action { width:100%; padding:14px; font-size:1rem; }
        .otp-code {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 6px;
            color: #004ac6;
            margin: 16px 0;
            display: none;
        }
        .session-list { display: grid; gap: 10px; }
        .session-row { display:flex; justify-content:space-between; align-items:center; gap:16px; padding:14px 16px; border:1px solid #e5eaf2; border-radius:10px; background:#fff; }
        a.session-row { color:inherit; text-decoration:none; transition:border-color .15s, background .15s; }
        a.session-row:hover { border-color:#9ab7ef; background:#f5f8ff; }
        .session-row.selected { border-color:#9ab7ef; background:#f5f8ff; }
        .session-row .session-meta { color:#596579; font-size:.875rem; margin-top:4px; }
        .session-status { border-radius:999px; background:#eef2f7; color:#465365; padding:5px 10px; font-size:.75rem; font-weight:700; white-space:nowrap; }
        .session-status.scheduled, .session-status.pending { color:#087653; background:#e9f8f1; }
        .cancel-note { color:#667085; font-size:.8rem; margin-top:10px; line-height:1.5; }
        @media(max-width:700px) { .session-row { align-items:flex-start; flex-direction:column; } .action-grid { grid-template-columns:1fr; } }
    </style>
</head>
<body>

<header class="navbar">
    <div class="nav-container">
        <a href="/safehands_mvc/family" class="nav-logo" style="text-decoration:none;">SafeHands</a>
        <nav class="nav-links">
            <a href="/safehands_mvc/family">Dashboard</a>
            <a href="/safehands_mvc/patient">Patients</a>
            <a href="/safehands_mvc/caregiver">Find Caregivers</a>
            <a href="/safehands_mvc/bookings" style="color: #004ac6; font-weight:700;">My Bookings</a>
        </nav>
        <div class="nav-icons">
            <a href="/safehands_mvc/notifications" aria-label="Notifications" title="Notifications"><span class="material-symbols-outlined">notifications</span></a>
            <a href="/safehands_mvc/login/logout" aria-label="Log out" title="Log out"><span class="material-symbols-outlined">logout</span></a>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="breadcrumb-container">
        <nav class="breadcrumb">
            <a href="/safehands_mvc/family" style="text-decoration:none; color:inherit;">Dashboard</a> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <a href="/safehands_mvc/bookings" style="text-decoration:none; color:inherit;">My Bookings</a> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <span class="active">Booking Details</span>
        </nav>
    </div>

    <div class="grid-container">
        <!-- Main Content -->
        <div>
            <!-- Header Card -->
            <div class="details-card">
                <div class="details-card-header">
                    <h2 class="details-card-title">
                        Booking Reference: #<?= htmlspecialchars($booking['booking_id'] ?? '1250') ?>
                    </h2>
                    <div class="status-tag <?= in_array($bookingStatus, ['active', 'in_progress'], true) ? 'active' : '' ?>">
                        <span class="material-symbols-outlined" style="font-size:18px;">
                            <?= in_array($bookingStatus, ['active', 'in_progress', 'completed'], true) ? 'verified' : ($bookingStatus === 'cancelled' ? 'event_busy' : 'pending_actions') ?>
                        </span>
                        <?= htmlspecialchars($statusLabel) ?>
                    </div>
    </div>

    <?php if ($cancelResult === '1'): ?>
        <div class="details-card" style="color:#087653;background:#e9f8f1;">Booking cancelled. Its scheduled sessions are no longer active.</div>
    <?php elseif ($cancelResult === '0'): ?>
        <div class="details-card" style="color:#8a4b08;background:#fff7e8;">This booking can’t be cancelled because it is no longer pending or one of its sessions has started.</div>
    <?php endif; ?>

                <!-- Caregiver Profile Snippet -->
                <div style="display:flex; gap:20px; align-items:center; margin-bottom: 24px;">
                    <div style="width:72px; height:72px; border-radius:50%; overflow:hidden; background:#e7eeff;">
                        <?php if (!empty($caregiver['image'])): ?><img src="<?= htmlspecialchars($caregiver['image']) ?>" alt="Caregiver" style="width:100%; height:100%; object-fit:cover;"><?php else: ?><span class="material-symbols-outlined" style="font-size:42px;color:#5574b8;display:grid;place-items:center;height:100%;">person</span><?php endif; ?>
                    </div>
                    <div style="flex:1;">
                        <div style="font-size:1.25rem; font-weight:700; color:#111c2d; margin-bottom:4px;"><?= htmlspecialchars($caregiver['name'] ?? 'Caregiver details unavailable') ?></div>
                        <div style="color:#434655; font-size:0.875rem; font-weight:500;">
                            <?= htmlspecialchars($caregiver['education'] ?? 'Caregiver') ?> · ★ <?= htmlspecialchars((string)($caregiver['rating'] ?? '0.0')) ?>
                        </div>
                    </div>
                    <?php if (!empty($caregiver['id'])): ?><a href="/safehands_mvc/caregiver/profile/<?= (int)$caregiver['id'] ?>" class="btn-action btn-outline">
                        <span class="material-symbols-outlined">person</span> View Profile
                    </a><?php endif; ?>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Patient</div>
                        <div class="val"><?= htmlspecialchars($patient['name'] ?? 'Patient details unavailable') ?></div>
                    </div>
                    <div class="info-item">
                        <div class="label">Location</div>
                        <div class="val"><?= htmlspecialchars($patient['address'] ?: 'Address not provided') ?></div>
                    </div>
                </div>
            </div>

            <!-- Service Notes -->
            <div class="details-card">
                <h2 class="details-card-title" style="margin-bottom:16px;">
                    <span class="material-symbols-outlined">speaker_notes</span> Service Notes
                </h2>
                <div class="service-notes"><?= !empty($patient['care_notes']) ? nl2br(htmlspecialchars($patient['care_notes'])) : 'No additional care instructions were provided for this patient.' ?></div>
            </div>

            <!-- Sessions attached to this booking -->
            <div class="details-card">
                <h2 class="details-card-title" style="margin-bottom:16px;"><span class="material-symbols-outlined">event_note</span> Booked care sessions</h2>
                <div class="session-list">
                    <?php foreach ($sessions as $session): $isSelected = $selectedSession && (int)$selectedSession['session_id'] === (int)$session['session_id']; $sessionStatus = ($booking['parent_status'] ?? '') === 'cancelled' ? 'cancelled' : strtolower((string)($session['status'] ?? 'scheduled')); ?>
                        <a class="session-row <?= $isSelected ? 'selected' : '' ?>" href="/safehands_mvc/booking/details/<?= (int)$booking['booking_id'] ?>/<?= (int)$session['session_id'] ?>">
                            <div>
                                <strong><?= htmlspecialchars($formatDate($session['service_date'] ?? null)) ?> · <?= htmlspecialchars(ucfirst(str_replace('_', ' ', (string)($session['shift_type'] ?? 'Shift')))) ?></strong>
                                <div class="session-meta"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $sessionStatus))) ?></div>
                            </div>
                            <span class="session-status <?= htmlspecialchars($sessionStatus) ?>"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $sessionStatus))) ?></span>
                        </a>
                    <?php endforeach; ?>
                    <?php if (!$sessions): ?><p>No care sessions are attached to this booking.</p><?php endif; ?>
                </div>
            </div>

            <!-- Actions -->
            <div class="details-card">
                <h2 class="details-card-title" style="margin-bottom:16px;">Additional Actions</h2>
                <div class="action-grid">
                    <a href="/safehands_mvc/payment-history" class="btn-action btn-primary">
                        <span class="material-symbols-outlined">receipt_long</span> Payment History
                    </a>
                    <a href="/safehands_mvc/review/index/<?= $booking['booking_id'] ?? '' ?>"  class="btn-action btn-warning">
                        <span class="material-symbols-outlined">star</span> Rate Session
                    </a>
                    <a href="/safehands_mvc/complaint/index/<?= $booking['booking_id'] ?? '' ?>"  class="btn-action btn-danger">
                        <span class="material-symbols-outlined">report_problem</span> Complaints
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <aside>
            <?php if ($showDemoOtp): ?>
            <div class="details-card otp-box">
                <span class="otp-demo-badge"><span class="material-symbols-outlined" style="font-size:15px;">science</span> Presentation demo</span>
                <h2 class="details-card-title" style="justify-content:center; margin-bottom:12px;">
                    <span class="material-symbols-outlined">security</span> Arrival Verification
                </h2>
                <p class="otp-demo-note">Generate a sample arrival code for the presentation. This demo code is not sent to anyone or verified by the system.</p>
                <button id="generateDemoOtpBtn" type="button" class="btn-action btn-primary">
                    <span class="material-symbols-outlined">key</span> Generate Demo Code
                </button>
                <div id="demoOtpCode" class="otp-code" aria-live="polite"></div>
            </div>
            <?php endif; ?>

            <!-- Sidebar Summary -->
            <div class="summary-card">
                <div class="summary-header">
                    <h3 style="font-size: 1rem;">Booking Summary</h3>
                </div>
                <div class="summary-body">
                    <div class="info-item" style="margin-bottom:16px;">
                        <div class="label">Booked sessions</div>
                        <div class="val"><?= count($sessions) ?> <?= count($sessions) === 1 ? 'session' : 'sessions' ?></div>
                    </div>

                    <div class="info-item" style="margin-bottom:24px;">
                        <div class="label"><?= $selectedSession ? 'Selected session' : 'Next session' ?></div>
                        <?php $summarySession = $selectedSession ?? ($sessions[0] ?? null); ?>
                        <div class="val" style="color:#004ac6;">
                            <?php if ($summarySession): ?><?= htmlspecialchars($formatDate($summarySession['service_date'] ?? null)) ?> · <?= htmlspecialchars(ucfirst(str_replace('_', ' ', (string)($summarySession['shift_type'] ?? 'Shift')))) ?><?php else: ?>No session scheduled<?php endif; ?>
                        </div>
                    </div>

                    <div style="height:1px; background:#F1F5F9; margin-bottom:16px;"></div>

                    <div class="grand-total">
                        <span class="label">Booking total</span>
                        <span class="val">LKR <?= number_format((float)($payment['total'] ?? $booking['total_amount'] ?? 0), 2) ?></span>
                    </div>

                    <?php if ($canCancel): ?>
                    <div style="text-align:center; margin-top:24px;">
                        <form method="POST" action="/safehands_mvc/booking/cancel/<?= (int)$booking['booking_id'] ?>" onsubmit="return confirm('Cancel this booking and all its scheduled sessions?');">
                        <button type="submit" class="btn-action btn-danger" style="width:100%; border:1px solid #ba1a1a; background:white; color:#ba1a1a;">
                            Cancel Booking
                        </button></form>
                        <p class="cancel-note">You can cancel while the booking and all its sessions are still pending.</p>
                    </div>
                    <?php elseif ($bookingStatus === 'cancelled'): ?>
                        <p class="cancel-note" style="text-align:center;">This booking has been cancelled.</p>
                    <?php endif; ?>
                    
                    <div style="text-align:center; margin-top:24px; font-size:0.75rem;">
                        <a href="#" style="color:#004ac6; text-decoration:none; font-weight:700; display:flex; align-items:center; justify-content:center; gap:4px;">
                            <span class="material-symbols-outlined" style="font-size:16px;">help</span> Need help? Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

<footer style="margin-top:64px; text-align:center; padding:32px; border-top:1px solid #F1F5F9; color:#434655; font-size:0.875rem;">
    © 2024 SafeHands Healthcare Services. Professional Healthcare Solutions.
</footer>

<?php if ($showDemoOtp): ?>
<script>
    document.getElementById('generateDemoOtpBtn').addEventListener('click', function () {
        const codeBytes = new Uint32Array(1);
        window.crypto.getRandomValues(codeBytes);
        const demoCode = String(codeBytes[0] % 1000000).padStart(6, '0');
        const codeDisplay = document.getElementById('demoOtpCode');
        codeDisplay.textContent = demoCode.slice(0, 3) + ' ' + demoCode.slice(3);
        codeDisplay.style.display = 'block';
    });
</script>
<?php endif; ?>

</body>
</html>
