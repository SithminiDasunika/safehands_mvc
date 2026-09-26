<?php
$booking = $booking ?? [];
$caregiver = $caregiver ?? [];
$patient = $patient ?? [];
$payment = $payment ?? [];
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
        .otp-code {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 6px;
            color: #004ac6;
            margin: 16px 0;
            display: none;
        }
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
            <a href="/safehands_mvc/booking" style="color: #004ac6; font-weight:700;">My Bookings</a>
        </nav>
        <div class="nav-icons">
            <span class="material-symbols-outlined">notifications</span>
            <span class="material-symbols-outlined">account_circle</span>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="breadcrumb-container">
        <nav class="breadcrumb">
            <a href="/safehands_mvc/family" style="text-decoration:none; color:inherit;">Dashboard</a> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <a href="/safehands_mvc/booking" style="text-decoration:none; color:inherit;">My Bookings</a> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
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
                    <div class="status-tag <?= (isset($booking['status']) && $booking['status'] == 'Active') ? 'active' : '' ?>">
                        <span class="material-symbols-outlined" style="font-size:18px;">
                            <?= (isset($booking['status']) && $booking['status'] == 'Active') ? 'verified' : 'pending_actions' ?>
                        </span>
                        <?= htmlspecialchars($booking['status'] ?? 'Scheduled') ?>
                    </div>
                </div>

                <!-- Caregiver Profile Snippet -->
                <div style="display:flex; gap:20px; align-items:center; margin-bottom: 24px;">
                    <div style="width:72px; height:72px; border-radius:50%; overflow:hidden; background:#e7eeff;">
                        <img src="<?= htmlspecialchars($caregiver['image'] ?? 'https://via.placeholder.com/72') ?>" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="flex:1;">
                        <div style="font-size:1.25rem; font-weight:700; color:#111c2d; margin-bottom:4px;"><?= htmlspecialchars($caregiver['name'] ?? 'Nadeesha Perera') ?></div>
                        <div style="color:#434655; font-size:0.875rem; font-weight:500;">
                            <?= htmlspecialchars($caregiver['role'] ?? 'Senior Caregiver') ?> · ★ 4.8
                        </div>
                    </div>
                    <a href="/safehands_mvc/caregiver/profile/<?= htmlspecialchars($caregiver['id'] ?? 1) ?>" class="btn-action btn-outline">
                        <span class="material-symbols-outlined">person</span> View Profile
                    </a>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Patient</div>
                        <div class="val"><?= htmlspecialchars($patient['name'] ?? 'Sunil Mendis (Father)') ?></div>
                    </div>
                    <div class="info-item">
                        <div class="label">Location</div>
                        <div class="val"><?= htmlspecialchars($booking['location'] ?? 'Colombo 07, Sri Lanka') ?></div>
                    </div>
                </div>
            </div>

            <!-- Service Notes -->
            <div class="details-card">
                <h2 class="details-card-title" style="margin-bottom:16px;">
                    <span class="material-symbols-outlined">speaker_notes</span> Service Notes
                </h2>
                <div class="service-notes">
                    "<?= htmlspecialchars($booking['service_notes'] ?? 'Requires assistance with morning stretches and light walking. Please ensure medications are taken at 9:00 AM with breakfast. Mr. Silva prefers gentle conversational engagement during his walk.') ?>"
                </div>
            </div>

            <!-- Map -->
            <div class="details-card">
                <h2 class="details-card-title" style="margin-bottom:16px;">
                    <span class="material-symbols-outlined">map</span> Location Verification
                </h2>
                <div class="map-container">
                    <div class="map-lines"></div>
                    <span class="material-symbols-outlined map-pin">location_on</span>
                </div>
                <div class="map-verification">
                    <span class="material-symbols-outlined">verified_user</span>
                    Caregiver verified for this zone
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
            <!-- OTP Box -->
            <div class="details-card" style="text-align:center;">
                <h2 class="details-card-title" style="justify-content:center; margin-bottom:16px;">
                    <span class="material-symbols-outlined">security</span> Arrival Verification
                </h2>
                <p style="font-size:0.875rem; color:#434655; margin-bottom:16px;">
                    Provide this OTP to the caregiver only after they arrive at the location.
                </p>
                <button id="generateOtpBtn" class="btn-action btn-primary" style="width:100%; font-size:1rem; padding:16px;">
                    <span class="material-symbols-outlined">key</span> Generate OTP
                </button>
                <div id="otpCodeDisplay" class="otp-code"></div>
            </div>

            <!-- Sidebar Summary -->
            <div class="summary-card">
                <div class="summary-header">
                    <h3 style="font-size: 1rem;">Booking Summary</h3>
                </div>
                <div class="summary-body">
                    <div class="info-item" style="margin-bottom:16px;">
                        <div class="label">Service Date & Time</div>
                        <div class="val" style="color:#004ac6;">
                            <?= htmlspecialchars($booking['service_date'] ?? 'Tomorrow, Oct 14') ?> • <?= htmlspecialchars($booking['service_time'] ?? '08:00 AM') ?>
                        </div>
                    </div>
                    
                    <div class="info-item" style="margin-bottom:16px;">
                        <div class="label">Duration</div>
                        <div class="val"><?= htmlspecialchars($booking['duration'] ?? '7 Days') ?></div>
                    </div>

                    <div class="info-item" style="margin-bottom:24px;">
                        <div class="label">Type</div>
                        <div class="val"><?= htmlspecialchars($booking['type'] ?? 'Day Care') ?></div>
                    </div>

                    <div style="height:1px; background:#F1F5F9; margin-bottom:16px;"></div>

                    <div class="grand-total">
                        <span class="label">Total Paid</span>
                        <span class="val">LKR <?= number_format((float)($payment['total'] ?? $booking['total'] ?? 51300), 2) ?></span>
                    </div>

                    <div style="text-align:center; margin-top:24px;">
                        <form method="POST" action="/safehands_mvc/booking/cancel/<?= (int)$booking['booking_id'] ?>"><button type="submit" class="btn-action btn-danger" style="width:100%; border:1px solid #ba1a1a; background:white; color:#ba1a1a;">
                            Cancel Booking
                        </button>
                    </div>
                    
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

<script>
    document.getElementById('generateOtpBtn').addEventListener('click', function() {
        const otpBox = document.getElementById('otpCodeDisplay');
        const btn = this;
        
        btn.innerHTML = '<span class="material-symbols-outlined">sync</span> Generating...';
        
        setTimeout(() => {
            btn.style.display = 'none';
            otpBox.style.display = 'block';
            otpBox.textContent = Math.floor(100000 + Math.random() * 900000).toString().match(/.{1,3}/g).join(' ');
        }, 800);
    });
</script>

</body>
</html>
