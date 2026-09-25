<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeHands | Secure Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/payment.css">
</head>
<body>

<header class="navbar">
    <div class="nav-container">
        <div class="nav-logo">SafeHands</div>
        <nav class="nav-links">
            <a href="/safehands_mvc/family">Dashboard</a>
            <a href="/safehands_mvc/patient">Patients</a>
            <a href="/safehands_mvc/caregiver">Find Caregivers</a>
            <a href="/safehands_mvc/booking">My Bookings</a>
        </nav>
        <div class="nav-icons">
            <span class="material-symbols-outlined">notifications</span>
            <span class="material-symbols-outlined">account_circle</span>
        </div>
    </div>
</header>

<main class="main-content" id="main-content">
    <div class="breadcrumb-container">
        <nav class="breadcrumb">
            <span>Dashboard</span> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <span>Caregiver Profile</span> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <span>Booking Summary</span> <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
            <span class="active">Payment</span>
        </nav>
        <div class="progress-indicator">
            <div class="progress-step success">
                <div class="circle"><span class="material-symbols-outlined" style="font-size:16px;">check</span></div>
                <span>Booking Details</span>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step active">
                <div class="circle">2</div>
                <span>Payment</span>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step pending">
                <div class="circle">3</div>
                <span>Confirmation</span>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="form-column">
            <section class="payment-card">
                <h1 class="payment-title">Complete Secure Payment</h1>
                
                <div class="methods-group">
                    <label class="form-label">Select Payment Method</label>
                    <div class="methods-grid">
                        <div class="method-box active">
                            <span class="material-symbols-outlined icon">credit_card</span>
                            <span>Credit/Debit</span>
                        </div>
                        <div class="method-box">
                            <span class="material-symbols-outlined icon">account_balance_wallet</span>
                            <span>HelaPay</span>
                        </div>
                        <div class="method-box">
                            <span class="material-symbols-outlined icon">account_balance</span>
                            <span>Online Banking</span>
                        </div>
                        <div class="method-box">
                            <span class="material-symbols-outlined icon">payments</span>
                            <span>Digital Wallet</span>
                        </div>
                    </div>
                </div>

                <form id="payment-form">
                    <div class="form-group">
                        <label class="form-label">Cardholder Name</label>
                        <input class="form-input" type="text" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Card Number</label>
                        <input class="form-input" type="text" placeholder="0000 0000 0000 0000" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Expiry Date</label>
                            <input class="form-input" type="text" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">CVV</label>
                            <input class="form-input" type="password" placeholder="***" required>
                        </div>
                    </div>

                    <div class="security-box">
                        <div class="security-icon"><span class="material-symbols-outlined">verified_user</span></div>
                        <div class="security-text">
                            <h4>Secure Escrow Payment</h4>
                            <p>Your payment is held securely and only released to the caregiver after the session is completed and verified.</p>
                        </div>
                    </div>

                    <div class="tc-box">
                        <input type="checkbox" id="tc" required>
                        <label for="tc">I agree to the SafeHands <a href="#">Terms of Service</a> and <a href="#">HIPAA Compliance</a> policies regarding professional healthcare bookings.</label>
                    </div>

                    <button class="btn-submit" type="submit">
                        <span class="material-symbols-outlined">lock</span> Pay Securely
                    </button>
                </form>
            </section>
        </div>

        <aside class="summary-column">
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Booking Summary</h3>
                    <p>Review your session details</p>
                </div>
                <div class="summary-body">
                    <div class="profiles">
                        <div class="profile-left">
                            <div class="profile-avatar">
                                <img src="<?= htmlspecialchars($caregiver['image']) ?>">
                            </div>
                            <div>
                                <p class="profile-role">Caregiver</p>
                                <p class="profile-name"><?= htmlspecialchars($caregiver['name']) ?></p>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <p class="profile-role">Patient</p>
                            <p class="profile-name">Booked Patient</p>
                        </div>
                    </div>

                    <div class="session-list">
                        <?php foreach($booking['sessions'] as $session): ?>
                            <div class="session-row">
                                <span class="label"><?= htmlspecialchars($session['service_date']) ?> · <?= ucfirst(htmlspecialchars($session['shift_type'])) ?> Session</span>
                                <span class="val">Rs. <?= number_format(isset($caregiver['daily_rate']) ? $caregiver['daily_rate'] : 2000) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="divider"></div>

                    <div class="price-row">
                        <span class="label">Subtotal</span>
                        <span class="val">Rs. <?= number_format($booking['total_amount'] - 300) ?></span>
                    </div>
                    <div class="price-row">
                        <span class="label">Platform Fee</span>
                        <span class="val">Rs. 300</span>
                    </div>

                    <div class="grand-total">
                        <span class="label">Grand Total</span>
                        <span class="val">Rs. <?= number_format($booking['total_amount']) ?></span>
                    </div>

                    <div class="status-badge">
                        <div><div class="pulse-dot"></div> Status: Pending Payment</div>
                    </div>
                </div>
            </div>
            <p class="secure-note">Secure 256-bit SSL Encrypted Transaction</p>
        </aside>
    </div>
</main>

<div class="overlay hidden" id="processing-overlay">
    <div class="loader-ring"></div>
    <h2>Processing Payment...</h2>
    <p style="color:#434655;">Please do not refresh the page.</p>
</div>

<div class="hidden" id="success-screen-template">
    <div class="success-container">
        <div class="success-icon"><span class="material-symbols-outlined">check_circle</span></div>
        <h1 class="success-title">Booking Confirmed & Payment Secured</h1>
        <p class="success-subtitle">Your care sessions with <?= htmlspecialchars($caregiver['name']) ?> are locked in. A confirmation email has been sent to your registered address.</p>
        
        <div class="success-grid">
            <div class="success-box">
                <h3 style="color:#004ac6;">Booking Identity</h3>
                <div class="success-row"><span style="color:#434655;">Booking ID</span><strong>BK-<?= date('Y') ?>-<?= str_pad($booking['booking_id'], 5, '0', STR_PAD_LEFT) ?></strong></div>
                <div class="success-row"><span style="color:#434655;">Total Sessions</span><strong><?= count($booking['sessions']) ?> Professional Visits</strong></div>
                <div class="success-row"><span style="color:#434655;">Payment Status</span><strong style="color:#025747; background:rgba(2,87,71,0.1); padding:2px 8px; border-radius:4px; font-size:12px;">Payment Held Securely</strong></div>
            </div>
            <div class="success-box blue">
                <h3 style="color:white; opacity:0.8;">Next Steps</h3>
                <p style="margin-bottom:12px; font-size:14px;"><span class="material-symbols-outlined" style="font-size:16px; vertical-align:middle; margin-right:8px;">verified</span> Share the visit OTP with the caregiver when they arrive.</p>
                <p style="margin-bottom:12px; font-size:14px;"><span class="material-symbols-outlined" style="font-size:16px; vertical-align:middle; margin-right:8px;">security</span> Funds will be released only after your approval.</p>
                <p style="font-size:14px;"><span class="material-symbols-outlined" style="font-size:16px; vertical-align:middle; margin-right:8px;">support_agent</span> Contact 24/7 support for any medical adjustments.</p>
            </div>
        </div>

        <div class="success-btns">
            <a href="/safehands_mvc/booking" class="btn-primary">View My Bookings</a>
            <a href="/safehands_mvc/family" class="btn-secondary">Return to Dashboard</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const overlay = document.getElementById('processing-overlay');
        const mainContent = document.getElementById('main-content');
        const successTemplate = document.getElementById('success-screen-template');

        // Show Processing
        overlay.classList.remove('hidden');

        // Send AJAX to process payment
        fetch('/safehands_mvc/payment/process/<?= $booking['booking_id'] ?>', {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                setTimeout(() => {
                    overlay.classList.add('hidden');
                    mainContent.innerHTML = successTemplate.innerHTML;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }, 1500);
            } else {
                overlay.classList.add('hidden');
                alert(data.message || 'Payment failed');
            }
        })
        .catch(error => {
            overlay.classList.add('hidden');
            alert('A network error occurred.');
        });
    });
</script>

</body>
</html>
