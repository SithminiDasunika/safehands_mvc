<div class="dashboard-container">

    <!-- Header Section -->
    <div class="pd-header">
        <div class="pd-breadcrumb-row">
            <div style="display:flex; align-items:center; gap:8px;">
                <span>Care Operations</span>
                <span class="material-symbols-outlined icon-xs">chevron_right</span>
                <span>Payments</span>
                <span class="material-symbols-outlined icon-xs">chevron_right</span>
                <span class="active-crumb">PAY-00125</span>
            </div>
            <a href="/safehands_mvc/admin/payments" class="btn btn-neutral" style="display:inline-flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined icon-sm">arrow_back</span>
                Back to Payments
            </a>
        </div>
        
        <div class="pd-title-card">
            <div class="pd-title-group">
                <div class="pd-title-row">
                    <h1 class="pd-title">Payment Details</h1>
                    <span class="badge-tag" style="background:var(--surface-container); font-family:monospace;">#PAY-00125</span>
                    <span class="badge-tag" style="background:var(--surface-container-high); color:var(--secondary); font-weight:600;">Booking #BK-00125</span>
                </div>
                <p style="margin:0; color:var(--on-surface-variant);">Clinical transaction escrow record for senior home assistance dispatch.</p>
            </div>
            <div class="pd-badges">
                <div class="badge-tag" id="statusBadge" style="background-color:#fef3c7; color:#92400e; padding:6px 12px; font-weight:600; display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm" style="color:var(--tertiary);">lock</span>
                    <span id="statusBadgeText">HELD IN ESCROW</span>
                </div>
                <div class="badge-tag" style="background:var(--surface-container-high); padding:6px 12px; display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm text-outline">verified</span>
                    <span>SIMULATED PAYMENT — Operational Audit Record</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Status Lifecycle Tracker -->
    <div class="stepper-section">
        <div class="stepper-header">
            <div class="stepper-header-title">
                <span style="font-size:12px; font-weight:600; color:var(--outline); letter-spacing:0.05em; text-transform:uppercase;">Visual State Machine</span>
                <h2 style="font-size:24px; font-weight:600; margin:4px 0 0 0;">Escrow Lifecycle Progression</h2>
            </div>
            <div class="stepper-header-meta">
                <span style="font-size:12px; color:var(--on-surface-variant);">Internal Rule Reference:</span>
                <span style="font-size:12px; color:var(--primary); font-family:monospace; margin-left:4px;">SL-ESCROW-2026</span>
            </div>
        </div>
        
        <div class="stepper-grid">
            <!-- Step 1: PENDING -->
            <div class="stepper-card done">
                <div class="stepper-card-header">
                    <div class="stepper-icon bg-success text-on-primary">
                        <span class="material-symbols-outlined icon-sm">check</span>
                    </div>
                    <span class="stepper-badge text-success">PASSED</span>
                </div>
                <span class="stepper-title">1. PENDING</span>
                <span class="stepper-desc">Invoice Generated</span>
                <span class="stepper-time">24 Sep 2026, 10:15 AM</span>
            </div>
            
            <!-- Step 2: HELD -->
            <div class="stepper-card active" id="stepHeldCard">
                <div class="stepper-card-header">
                    <div class="stepper-icon bg-tertiary-container text-on-tertiary" id="stepHeldIcon">
                        <span class="material-symbols-outlined icon-sm">lock</span>
                    </div>
                    <span class="stepper-badge text-tertiary" id="stepHeldBadge">CURRENT ACTIVE</span>
                </div>
                <span class="stepper-title">2. HELD IN ESCROW</span>
                <span class="stepper-desc">Funds Vaulted</span>
                <span class="stepper-time">24 Sep 2026, 10:16 AM</span>
            </div>
            
            <!-- Step 3: RELEASED -->
            <div class="stepper-card upcoming" id="stepReleasedCard">
                <div class="stepper-card-header">
                    <div class="stepper-icon" style="background:var(--surface-container); color:var(--outline);" id="stepReleasedIcon">
                        <span class="material-symbols-outlined icon-sm">check_circle</span>
                    </div>
                    <span class="stepper-badge text-outline" id="stepReleasedBadge">UPCOMING</span>
                </div>
                <span class="stepper-title">3. RELEASED</span>
                <span class="stepper-desc">Caregiver Disbursed</span>
                <span class="stepper-time" id="stepReleasedTime">Pending Completion</span>
            </div>
            
            <!-- Step 4: REFUNDED -->
            <div class="stepper-card exception" id="stepRefundedCard">
                <div class="stepper-card-header">
                    <div class="stepper-icon" style="background:var(--surface-container); color:var(--outline);" id="stepRefundedIcon">
                        <span class="material-symbols-outlined icon-sm">replay</span>
                    </div>
                    <span class="stepper-badge text-outline" id="stepRefundedBadge">EXCEPTION PATH</span>
                </div>
                <span class="stepper-title">ALT: REFUNDED</span>
                <span class="stepper-desc">Dispute / Cancellation</span>
                <span class="stepper-time" id="stepRefundedTime">Inactive Path</span>
            </div>
        </div>
        
        <!-- Action Control Panel -->
        <div class="action-panel" id="actionControlPanel">
            <div style="display:flex; align-items:center; gap:12px;">
                <span class="material-symbols-outlined text-primary" style="font-size:28px;">admin_panel_settings</span>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:14px; font-weight:600;">Escrow Disbursement Controls</span>
                    <span style="font-size:12px; color:var(--on-surface-variant);">Manual override privileges active for Clinical HQ Admin</span>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;" id="activeActionButtons">
                <button type="button" class="btn btn-outline btn-w-full-sm-auto" onclick="openRefundModal()" style="border-color:var(--error-container); color:var(--error);">
                    <span class="material-symbols-outlined icon-sm">assignment_return</span> Issue Refund
                </button>
                <button type="button" class="btn btn-primary btn-w-full-sm-auto" onclick="openReleaseModal()">
                    <span class="material-symbols-outlined icon-sm">verified</span> Release Payment
                </button>
            </div>
            <div id="lockedStateMessage" style="display:none; align-items:center; gap:8px; font-size:14px; font-weight:600; color:var(--status-success);">
                <span class="material-symbols-outlined">lock_clock</span>
                <span id="lockedText">Record Finalized. Controls Locked.</span>
            </div>
        </div>
    </div>

    <!-- Involved Parties -->
    <div class="parties-grid">
        <!-- Family Card -->
        <div class="card party-card-inner">
            <div>
                <div class="party-header" style="border-bottom:1px solid var(--surface-container);">
                    <div class="party-title">
                        <span class="material-symbols-outlined text-secondary">family_restroom</span>
                        Family Account
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container); font-family:monospace; font-size:11px;">FM-1001</span>
                </div>
                <div class="party-profile">
                    <div class="avatar-circle bg-secondary-fixed text-on-secondary-fixed" style="width:48px; height:48px; font-size:20px;">SR</div>
                    <div style="display:flex; flex-direction:column;">
                        <span style="font-size:18px; font-weight:600;">Sithmini Rathnayake</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Invoiced Primary Guardian</span>
                    </div>
                </div>
                <div class="party-info-box">
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">mail</span> Email</span>
                        <span style="font-weight:500;">sithmini@email.com</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">call</span> Phone</span>
                        <span style="font-weight:500;">+94 71 123 4567</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">home_pin</span> Address</span>
                        <span style="font-weight:500; text-align:right;">No. 45, Flower Road, Colombo 07</span>
                    </div>
                </div>
            </div>
            <div style="display:flex; justify-content:space-between; margin-top:16px; padding-top:12px; border-top:1px solid var(--surface-container); font-size:12px;">
                <span class="text-outline">Payment Method</span>
                <span style="font-weight:600;">Simulated Family Wallet</span>
            </div>
        </div>
        
        <!-- Caregiver Card -->
        <div class="card party-card-inner">
            <div>
                <div class="party-header" style="border-bottom:1px solid var(--surface-container);">
                    <div class="party-title">
                        <span class="material-symbols-outlined text-primary">medical_services</span>
                        Caregiver (Payee)
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container); font-family:monospace; font-size:11px;">CG-88021</span>
                </div>
                <div class="party-profile">
                    <div class="avatar-circle" style="width:48px; height:48px;">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmdRroqleW3YO-3Xl3f_IHwsv_mVhE13axAiwqEoxisfP2Ar0Vsi1vigxcm3QWEf8knFaxiS4JUmHWI18ZTqHUba9B8Svreb8UWaaWFKWHo-vfX-soMr9nCflp2-Bq3sFipokWJO0aW8Hz5jeTOwdUDkMLqoFk2FR3eINTJ9fidf6RTyGaRx8DBVYgZh8Tmy5Aw4qyU8VOPhVzkMik2QpBi1qrlFHTFo8dPtEeKQoDYmClbFtwF1Zc" alt="Caregiver" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                    </div>
                    <div style="display:flex; flex-direction:column;">
                        <span style="font-size:18px; font-weight:600;">Sandun Rathnayake</span>
                        <span class="text-success" style="font-size:12px; font-weight:600; display:flex; align-items:center; gap:4px;">
                            <span class="material-symbols-outlined icon-xs">verified</span> Verified Healthcare Pro (NVQ-4)
                        </span>
                    </div>
                </div>
                <div class="party-info-box">
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">alternate_email</span> SafeHands ID</span>
                        <span style="font-weight:500;">sandun.care@safehands.lk</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">call</span> Direct Line</span>
                        <span style="font-weight:500;">+94 77 345 6789</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">account_balance_wallet</span> Payout Method</span>
                        <span style="font-weight:500; color:var(--primary);">Simulated Balance</span>
                    </div>
                </div>
            </div>
            <div style="display:flex; justify-content:space-between; margin-top:16px; padding-top:12px; border-top:1px solid var(--surface-container); font-size:12px;">
                <span class="text-outline">Disbursement Destination</span>
                <span style="font-weight:600;">SH-VIRTUAL-88021</span>
            </div>
        </div>
        
        <!-- Booking Card -->
        <div class="card party-card-inner">
            <div>
                <div class="party-header" style="border-bottom:1px solid var(--surface-container);">
                    <div class="party-title">
                        <span class="material-symbols-outlined text-tertiary">calendar_month</span>
                        Care Appointment
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container); font-family:monospace; font-size:11px;">BK-00125</span>
                </div>
                <div class="party-profile">
                    <div class="avatar-circle bg-surface-container text-primary" style="width:48px; height:48px;">
                        <span class="material-symbols-outlined" style="font-size:24px;">elderly</span>
                    </div>
                    <div style="display:flex; flex-direction:column;">
                        <span style="font-size:18px; font-weight:600;">Kamal Perera</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Father, 74 Yrs • Geriatric Mobility</span>
                    </div>
                </div>
                <div class="party-info-box">
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">event</span> Care Date</span>
                        <span style="font-weight:500;">Mon, 28 Sep 2026</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">schedule</span> Shift Window</span>
                        <span style="font-weight:500;">08:00 AM – 04:00 PM (8.0 Hrs)</span>
                    </div>
                    <div class="party-info-row">
                        <span class="party-info-label"><span class="material-symbols-outlined icon-xs">info</span> Status</span>
                        <span style="font-weight:600;" class="text-success">Approved • Scheduled</span>
                    </div>
                </div>
            </div>
            <div style="display:flex; justify-content:flex-end; margin-top:16px; padding-top:12px; border-top:1px solid var(--surface-container); font-size:12px;">
                <a href="#" style="color:var(--primary); font-weight:600; display:flex; align-items:center; gap:4px; text-decoration:none;">
                    View Booking Details <span class="material-symbols-outlined icon-xs">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Escrow Ledger -->
    <div class="ledger-grid">
        <div class="ledger-col">
            <div class="ledger-header">
                <div style="display:flex; align-items:center; gap:8px;">
                    <span class="material-symbols-outlined text-primary" style="font-size:24px;">account_balance</span>
                    <h2 style="font-size:20px; font-weight:600; margin:0;">Simulated Escrow Ledger</h2>
                </div>
                <span class="badge-tag" style="background:var(--surface-container-low); color:var(--outline); font-family:monospace;">SIM-TX-2026-0924-00125</span>
            </div>
            <p style="margin:0 0 24px 0; font-size:14px; color:var(--on-surface-variant);">Transparent breakdown of clinical service billing, platform retention fees, and caregiver net remuneration held in virtual trust.</p>
            
            <div style="display:flex; flex-direction:column; gap:12px;">
                <div class="ledger-item">
                    <div class="ledger-item-left">
                        <span style="font-size:14px; font-weight:600;">Service Amount (Gross Invoiced)</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Standard Elderly Assistance Shift • 8.0 Hours @ LKR 800.00/hr</span>
                    </div>
                    <span class="ledger-item-val">LKR 6,400.00</span>
                </div>
                <div class="ledger-item">
                    <div class="ledger-item-left">
                        <span style="font-size:14px; font-weight:600;">SafeHands Platform Commission (10%)</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Clinical QA verification, escrow indemnity, caregiver liability coverage</span>
                    </div>
                    <span class="ledger-item-val text-tertiary">- LKR 640.00</span>
                </div>
                <div class="ledger-total">
                    <div class="ledger-item-left">
                        <span style="font-size:18px; font-weight:600; color:var(--primary);">Caregiver Net Disbursable Payout (90%)</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Locked in SafeHands Virtual Escrow until shift signoff</span>
                    </div>
                    <span class="ledger-item-val">LKR 5,760.00</span>
                </div>
            </div>
            
            <div class="ledger-gate">
                <div style="display:flex; align-items:center; gap:8px;">
                    <span class="material-symbols-outlined text-primary">lock_clock</span>
                    <span style="font-size:12px; color:var(--on-surface-variant);">Settlement Gate: <strong>Automated release scheduled upon Caregiver OTP arrival confirmation &amp; Daily Care Report closure.</strong></span>
                </div>
                <span class="font-mono text-outline" style="font-size:12px;">CURRENCY: LKR (SIMULATED)</span>
            </div>
        </div>
    </div>

</div>

<!-- Release Modal -->
<div class="modal-overlay hidden" id="releaseModal">
    <div class="modal-content modal-md">
        <div style="display:flex; flex-direction:column; gap:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div class="avatar-circle-sm bg-primary-container text-on-primary" style="width:40px; height:40px;">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <div>
                    <h3 style="margin:0; font-size:20px; font-weight:600;">Release Payment Confirmation</h3>
                    <span style="font-size:12px; color:var(--outline);">Simulated Escrow Disbursement</span>
                </div>
            </div>
            <div style="background:var(--surface-container-low); padding:16px; border-radius:12px; font-size:14px; display:flex; flex-direction:column; gap:8px;">
                <p style="margin:0;">Are you sure you want to release this simulated payment?</p>
                <p style="margin:0; font-size:12px; color:var(--on-surface-variant);">This action will disburse <strong>LKR 5,760.00</strong> to caregiver <strong>Sandun Rathnayake</strong> and record <strong>LKR 640.00</strong> as platform commission.</p>
            </div>
            <div style="display:flex; justify-content:space-between; font-family:monospace; font-size:12px; color:var(--outline);">
                <span>TRANSACTION ID:</span>
                <span>SIM-TX-2026-0924-00125</span>
            </div>
            <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:8px;">
                <button type="button" class="btn btn-neutral" onclick="closeReleaseModal()">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="executePaymentRelease()">Confirm Release</button>
            </div>
        </div>
    </div>
</div>

<!-- Refund Modal -->
<div class="modal-overlay hidden" id="refundModal">
    <div class="modal-content modal-md">
        <div style="display:flex; flex-direction:column; gap:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div class="avatar-circle-sm bg-error-container" style="width:40px; height:40px; color:var(--error);">
                    <span class="material-symbols-outlined">assignment_return</span>
                </div>
                <div>
                    <h3 style="margin:0; font-size:20px; font-weight:600;">Issue Simulated Refund</h3>
                    <span style="font-size:12px; color:var(--outline);">Exception Discretionary Override</span>
                </div>
            </div>
            <div style="background:rgba(255, 218, 214, 0.3); padding:16px; border-radius:12px; font-size:14px; display:flex; flex-direction:column; gap:8px;">
                <p style="margin:0;">Are you sure you want to refund this simulated payment?</p>
                <p style="margin:0; font-size:12px; color:var(--on-surface-variant);">Simulated gross funds (<strong>LKR 6,400.00</strong>) will revert to Sithmini Rathnayake. Record status will become <strong>Refunded</strong> and booking status will trigger cancellation procedures.</p>
            </div>
            <div style="display:flex; justify-content:space-between; font-family:monospace; font-size:12px; color:var(--outline);">
                <span>TRANSACTION ID:</span>
                <span>SIM-TX-2026-0924-00125</span>
            </div>
            <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:8px;">
                <button type="button" class="btn btn-neutral" onclick="closeRefundModal()">Cancel</button>
                <button type="button" class="btn" onclick="executePaymentRefund()" style="background:var(--error); color:var(--on-error); border:none; padding:10px 16px; border-radius:8px; font-weight:600;">Confirm Refund</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openReleaseModal() {
        const modal = document.getElementById('releaseModal');
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function closeReleaseModal() {
        const modal = document.getElementById('releaseModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    function openRefundModal() {
        const modal = document.getElementById('refundModal');
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function closeRefundModal() {
        const modal = document.getElementById('refundModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    function executePaymentRelease() {
        closeReleaseModal();

        // Update Header Badges
        const statusBadge = document.getElementById('statusBadge');
        const statusText = document.getElementById('statusBadgeText');
        statusBadge.style.backgroundColor = '#ecfdf5'; // light emerald
        statusBadge.style.color = 'var(--status-success)';
        statusBadge.innerHTML = '<span class="material-symbols-outlined icon-sm">check_circle</span><span>PAYMENT RELEASED</span>';

        // Update Stepper Cards
        const stepHeldCard = document.getElementById('stepHeldCard');
        stepHeldCard.className = "stepper-card done";
        document.getElementById('stepHeldIcon').className = "stepper-icon bg-success text-on-primary";
        document.getElementById('stepHeldIcon').innerHTML = '<span class="material-symbols-outlined icon-sm">check</span>';
        document.getElementById('stepHeldBadge').className = "stepper-badge text-success";
        document.getElementById('stepHeldBadge').innerText = "CLEARED";

        const stepReleasedCard = document.getElementById('stepReleasedCard');
        stepReleasedCard.className = "stepper-card active";
        document.getElementById('stepReleasedIcon').className = "stepper-icon bg-primary text-on-primary";
        document.getElementById('stepReleasedIcon').innerHTML = '<span class="material-symbols-outlined icon-sm">done_all</span>';
        document.getElementById('stepReleasedBadge').className = "stepper-badge text-primary";
        document.getElementById('stepReleasedBadge').innerText = "FINALIZED";
        document.getElementById('stepReleasedTime').innerText = "Released Just Now";
        document.getElementById('stepReleasedTime').style.color = "var(--primary)";

        // Hide Action Buttons & Show Locked Banner
        document.getElementById('activeActionButtons').style.display = 'none';
        const lockedPanel = document.getElementById('lockedStateMessage');
        lockedPanel.style.display = 'flex';
        lockedPanel.style.color = "var(--status-success)";
        document.getElementById('lockedText').innerText = "Disbursement Complete • Payout Dispatched • Controls Locked";
    }

    function executePaymentRefund() {
        closeRefundModal();

        // Update Header Badges
        const statusBadge = document.getElementById('statusBadge');
        statusBadge.style.backgroundColor = 'var(--error-container)';
        statusBadge.style.color = 'var(--error)';
        statusBadge.innerHTML = '<span class="material-symbols-outlined icon-sm">replay</span><span>REFUNDED</span>';

        // Update Stepper Cards
        const stepHeldCard = document.getElementById('stepHeldCard');
        stepHeldCard.className = "stepper-card done";
        document.getElementById('stepHeldBadge').innerText = "TERMINATED";
        document.getElementById('stepHeldBadge').className = "stepper-badge text-outline";

        const stepRefundedCard = document.getElementById('stepRefundedCard');
        stepRefundedCard.className = "stepper-card refunded active";
        document.getElementById('stepRefundedIcon').className = "stepper-icon bg-error text-on-error";
        document.getElementById('stepRefundedBadge').className = "stepper-badge text-error";
        document.getElementById('stepRefundedBadge').innerText = "REFUND EXECUTED";
        document.getElementById('stepRefundedTime').innerText = "Refunded Just Now";
        document.getElementById('stepRefundedTime').style.color = "var(--error)";

        // Hide Action Buttons & Show Locked Banner
        document.getElementById('activeActionButtons').style.display = 'none';
        const lockedPanel = document.getElementById('lockedStateMessage');
        lockedPanel.style.display = 'flex';
        lockedPanel.style.color = "var(--error)";
        document.getElementById('lockedText').innerText = "Payment Reversed • Refunded to Family • Record Closed";
    }
</script>
