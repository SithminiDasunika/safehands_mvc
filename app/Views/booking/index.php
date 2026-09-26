<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'My Bookings | SafeHands') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/payment.css?v=2">
    <style>
        .page-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #111c2d;
            margin-bottom: 8px;
        }
        .page-subtitle {
            color: #434655;
            font-size: 1rem;
        }
        .booking-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        .booking-card {
            background: white;
            border: 1px solid #F1F5F9;
            border-radius: 0.75rem;
            padding: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.2s;
            text-decoration: none;
            color: inherit;
        }
        .booking-card:hover {
            border-color: #004ac6;
            box-shadow: 0 4px 12px rgba(0,74,198,0.08);
            transform: translateY(-2px);
        }
        .booking-left {
            display: flex;
            gap: 24px;
            align-items: center;
        }
        .booking-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #e7eeff;
            color: #004ac6;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .booking-meta {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .booking-id {
            font-size: 1.125rem;
            font-weight: 700;
            color: #111c2d;
        }
        .booking-desc {
            font-size: 0.875rem;
            color: #434655;
        }
        .booking-status {
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-active, .status-accepted { background: #d4edda; color: #155724; }
        .status-completed { background: #e2e3e5; color: #383d41; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        
        .booking-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }
        .booking-amount {
            font-size: 1.25rem;
            font-weight: 700;
            color: #004ac6;
        }
        .empty-state {
            text-align: center;
            padding: 64px 24px;
            background: white;
            border-radius: 0.75rem;
            border: 1px dashed #c3c6d7;
        }
    </style>
</head>
<body>

<header class="navbar">
    <div class="nav-container">
        <a href="/safehands_mvc/<?= $role === 'caregiver' ? 'caregiver-dashboard' : 'family' ?>" class="nav-logo" style="text-decoration:none;">SafeHands</a>
        <nav class="nav-links">
            <a href="/safehands_mvc/<?= $role === 'caregiver' ? 'caregiver-dashboard' : 'family' ?>">Dashboard</a>
            <?php if($role !== 'caregiver'): ?>
                <a href="/safehands_mvc/patient">Patients</a>
                <a href="/safehands_mvc/caregiver">Find Caregivers</a>
            <?php endif; ?>
            <a href="/safehands_mvc/booking" style="color: #004ac6; font-weight:700;">My Bookings</a>
        </nav>
        <div class="nav-icons">
            <span class="material-symbols-outlined">notifications</span>
            <span class="material-symbols-outlined">account_circle</span>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">My Bookings</h1>
            <p class="page-subtitle">Manage your care sessions and appointments.</p>
        </div>
        <?php if($role !== 'caregiver'): ?>
            <a href="/safehands_mvc/caregiver" class="btn-submit" style="width:auto; padding:0 24px; margin:0; font-size:1rem; height:42px;">
                Book New Caregiver
            </a>
        <?php endif; ?>
    </div>

    <?php if(empty($bookings)): ?>
        <div class="empty-state">
            <span class="material-symbols-outlined" style="font-size:48px; color:#c3c6d7; margin-bottom:16px;">event_busy</span>
            <h3 style="font-size:1.25rem; font-weight:600; margin-bottom:8px;">No bookings found</h3>
            <p style="color:#434655;">You don't have any past or upcoming bookings yet.</p>
        </div>
    <?php else: ?>
        <div class="booking-list">
            <?php foreach($bookings as $booking): ?>
                <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['booking_id']) ?>" class="booking-card">
                    <div class="booking-left">
                        <div class="booking-icon">
                            <span class="material-symbols-outlined" style="font-size:32px;">
                                <?= $booking['status'] === 'completed' ? 'event_available' : 'calendar_clock' ?>
                            </span>
                        </div>
                        <div class="booking-meta">
                            <div class="booking-id">Booking #BK-<?= date('Y') ?>-<?= str_pad($booking['booking_id'], 5, '0', STR_PAD_LEFT) ?></div>
                            <div class="booking-desc">
                                <?= htmlspecialchars($booking['patient_name']) ?> • 
                                <?= htmlspecialchars($role === 'caregiver' ? $booking['family_name'] : $booking['caregiver_name']) ?>
                            </div>
                            <div style="font-size:0.75rem; color:#434655; margin-top:4px;">
                                Created on <?= date('M d, Y', strtotime($booking['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="booking-right">
                        <div class="booking-status status-<?= strtolower($booking['status']) ?>">
                            <?= htmlspecialchars($booking['status']) ?>
                        </div>
                        <div class="booking-amount">
                            LKR <?= number_format($booking['total_amount'], 2) ?>
                        </div>
                        <div style="font-size:0.75rem; color:#434655; display:flex; align-items:center; gap:4px;">
                            View Details <span class="material-symbols-outlined" style="font-size:14px;">arrow_forward</span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

</body>
</html>
