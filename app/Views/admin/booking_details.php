<div class="dashboard-container">
    
    <!-- Audit Modal -->
    <div class="modal-overlay hidden" id="auditModal">
        <div class="modal-content modal-md">
            <div class="modal-header-compact">
                <div class="modal-header-compact-left">
                    <span class="material-symbols-outlined text-primary" style="font-size:24px;">security</span>
                    <h3 style="margin:0; font-size:20px; font-weight:600;">HIPAA Audit Access Record</h3>
                </div>
                <button class="btn-icon-plain" onclick="toggleAuditModal()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="audit-list" style="margin: 16px 0;">
                <div class="audit-item">
                    <span class="audit-item-action">Admin Session Query (ID: ADM-94)</span>
                    <span class="audit-item-time">28 Sep 2026, 04:30:11</span>
                </div>
                <div class="audit-item">
                    <span class="audit-item-action">Daily Report Completion Checked</span>
                    <span class="audit-item-time">28 Sep 2026, 04:15:32</span>
                </div>
                <div class="audit-item">
                    <span class="audit-item-action">Arrival Confirmation Token Handshake</span>
                    <span class="audit-item-time">28 Sep 2026, 08:05:01</span>
                </div>
                <div class="audit-item">
                    <span class="audit-item-action">Escrow Simulated Hold Authorized</span>
                    <span class="audit-item-time">24 Sep 2026, 10:15:44</span>
                </div>
            </div>
            
            <div style="display:flex; justify-content:flex-end; border-top:1px solid var(--surface-container); padding-top:16px;">
                <button class="btn btn-primary" onclick="toggleAuditModal()">Close Audit Window</button>
            </div>
        </div>
    </div>

    <!-- Top Breadcrumb & Contextual Navigation -->
    <div class="page-breadcrumb" style="display:flex; justify-content:space-between; margin-bottom:16px;">
        <div style="display:flex; align-items:center; gap:8px;">
            <span class="breadcrumb-text">Care Operations</span>
            <span class="material-symbols-outlined breadcrumb-dot icon-xs">chevron_right</span>
            <a href="/safehands_mvc/admin/bookings" class="breadcrumb-text" style="color:var(--primary);">Bookings</a>
            <span class="material-symbols-outlined breadcrumb-dot icon-xs">chevron_right</span>
            <span style="font-size:12px; font-weight:600; color:var(--primary);">BK-00125</span>
        </div>
        <div style="display:flex; align-items:center; gap:8px; font-size:12px; color:var(--on-surface-variant);">
            <span class="material-symbols-outlined text-success icon-sm">verified_user</span>
        </div>
    </div>

    <!-- Title & Admin Controls Row -->
    <div class="bd-header">
        <div class="bd-header-left">
            <a href="/safehands_mvc/admin/bookings" class="btn btn-neutral shadow-sm" style="display:inline-flex; align-items:center; gap:4px; padding:8px 12px;">
                <span class="material-symbols-outlined icon-sm">arrow_back</span>
                Back to Bookings
            </a>
            <div style="width:1px; height:24px; background-color:var(--surface-container-highest);"></div>
            <div style="display:flex; align-items:center; gap:12px;">
                <h1 class="bd-title">Booking Details</h1>
                <span class="badge-tag" style="background-color:var(--surface-container); color:var(--primary); font-weight:700;">#BK-00125</span>
                <span class="badge-tag" style="background-color:rgba(170, 236, 243, 0.2); color:var(--on-secondary-container); display:flex; align-items:center; gap:6px;">
                    <span class="dot-sm bg-primary animate-pulse"></span>
                    Approved • Scheduled Shift
                </span>
            </div>
        </div>
        
        <div style="display:flex; align-items:center; gap:12px;">
            <button class="btn btn-outline" onclick="toggleAuditModal()" style="color:var(--error); border-color:var(--error-container); display:inline-flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined icon-sm">security</span>
                View Audit Log
            </button>
        </div>
    </div>

    <!-- Main Grid: 2/3 Column & 1/3 Column -->
    <div class="bd-grid">
        
        <!-- LEFT COLUMN (8 Columns equiv) -->
        <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- SECTION 1: Booking Info & Schedule -->
            <section class="bd-section">
                <div class="bd-section-header">
                    <div class="bd-section-title-group">
                        <div class="icon-wrapper-sm bg-surface-container text-primary">
                            <span class="material-symbols-outlined">calendar_today</span>
                        </div>
                        <div>
                            <h2 class="bd-section-title">Booking Information &amp; Schedule</h2>
                            <p class="bd-section-desc">Registered shift timing, administrative identifiers, and operational duration.</p>
                        </div>
                    </div>
                    <span class="badge-tag" style="background-color:var(--surface-container-high); color:var(--on-surface-variant);">Single Shift</span>
                </div>
                
                <div class="bd-info-grid">
                    <div class="bd-info-box">
                        <span class="bd-info-label">Booking ID</span>
                        <span class="bd-info-value">BK-00125</span>
                        <span class="bd-info-sub">24 Sep 2026, 10:15 AM</span>
                    </div>
                    <div class="bd-info-box">
                        <span class="bd-info-label">Care Date</span>
                        <span class="bd-info-value">Mon, 28 Sep 2026</span>
                        <span class="bd-info-sub text-success" style="font-weight:600;">Confirmed Slot</span>
                    </div>
                    <div class="bd-info-box">
                        <span class="bd-info-label">Shift Window</span>
                        <span class="bd-info-value">08:00 AM – 04:00 PM</span>
                        <span class="bd-info-sub">Duration: 8.0 Hours Day</span>
                    </div>
                    <div class="bd-info-box">
                        <span class="bd-info-label">Service Category</span>
                        <span class="bd-info-value" style="font-size:14px; margin-top:2px;">Elderly Assistance</span>
                    </div>
                </div>
                
                <!-- Progress Timeline -->
                <div class="bd-progress-container">
                    <div class="bd-progress-header">
                        <span>Shift Execution Timeline</span>
                        <span style="color:var(--primary);">Pre-Shift Clearance Finalized</span>
                    </div>
                    <div class="bd-progress-track">
                        <div class="bd-progress-fill-primary"></div>
                        <div class="bd-progress-fill-warning"></div>
                    </div>
                    <div class="bd-progress-labels">
                        <span>Intake &amp; Escrow (100%)</span>
                        <span>Caregiver Matched (100%)</span>
                        <span>Arrival Verified (100%)</span>
                        <span style="color:var(--on-surface); font-weight:600;">Post-Care Release (Pending)</span>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 2,3,4: Involved Parties -->
            <section style="display:flex; flex-direction:column; gap:16px;">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <h2 class="bd-section-title">Involved Parties</h2>
                    <span class="bd-section-desc">3 Verified Entities Registered</span>
                </div>
                
                <div class="bd-parties-grid">
                    <!-- Family Guardian -->
                    <div class="bd-party-card">
                        <div style="display:flex; flex-direction:column; gap:16px;">
                            <div style="display:flex; align-items:flex-start; justify-content:space-between;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div class="bd-party-avatar bg-surface-container text-primary">SR</div>
                                    <div>
                                        <h3 class="bd-party-name">Sithmini Rathnayake</h3>
                                        <div class="bd-party-role">Primary Account Holder</div>
                                    </div>
                                </div>
                                <span class="badge-tag" style="background-color:var(--surface-container-low); color:var(--primary); font-size:11px;">#FM-1001</span>
                            </div>
                            <div class="bd-party-divider"></div>
                            <div style="display:flex; flex-direction:column; gap:10px;">
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">mail</span>
                                    <span style="overflow:hidden; text-overflow:ellipsis;">sithmini@email.com</span>
                                </div>
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">call</span>
                                    <span>+94 71 123 4567</span>
                                </div>
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">home_pin</span>
                                    <span>No. 45, Flower Road, Colombo 07, Western Province</span>
                                </div>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center; background:var(--surface-container-low); padding:8px; border-radius:4px; font-size:12px;">
                                <span style="color:var(--on-surface-variant);">Status</span>
                                <span style="color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                                    <span class="dot-sm bg-success"></span> Active Guardian
                                </span>
                            </div>
                        </div>
                        <button class="btn-full-width">View Family Profile</button>
                    </div>

                    <!-- Patient -->
                    <div class="bd-party-card">
                        <div style="display:flex; flex-direction:column; gap:16px;">
                            <div style="display:flex; align-items:flex-start; justify-content:space-between;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div class="bd-party-avatar" style="background-color:rgba(138, 172, 254, 0.3); color:var(--secondary);">KP</div>
                                    <div>
                                        <h3 class="bd-party-name">Kamal Perera</h3>
                                        <div class="bd-party-role">Father to Guardian</div>
                                    </div>
                                </div>
                                <span class="badge-tag" style="background-color:var(--surface-container-low); color:var(--on-surface-variant); font-size:11px;">#PT-8842</span>
                            </div>
                            <div class="bd-party-divider"></div>
                            <div style="display:flex; flex-direction:column; gap:10px;">
                                <div style="display:flex; justify-content:space-between; font-size:14px;">
                                    <span style="color:var(--on-surface-variant);">Age / Gender:</span>
                                    <span style="font-weight:600;">74 Years • Male</span>
                                </div>
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">pin_drop</span>
                                    <span>No. 45, Flower Road, Colombo 07</span>
                                </div>
                                <div style="display:flex; flex-direction:column; gap:4px; margin-top:4px;">
                                    <span style="font-size:10px; font-weight:600; color:var(--on-surface-variant); text-transform:uppercase;">Special Operational Support</span>
                                    <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                        <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-surface); font-size:11px;">Mobility Assist</span>
                                        <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-surface); font-size:11px;">Wheelchair</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bd-box-security">
                                <span class="material-symbols-outlined">lock</span>
                                <p><span style="font-weight:600; color:var(--on-surface);">Privacy Protocol:</span> Detailed clinical diagnosis, EHR charts, and prescription records are restricted from operational views.</p>
                            </div>
                        </div>
                        <button class="btn-full-width">View Patient Profile</button>
                    </div>

                    <!-- Caregiver -->
                    <div class="bd-party-card">
                        <div style="display:flex; flex-direction:column; gap:16px;">
                            <div style="display:flex; align-items:flex-start; justify-content:space-between;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div class="bd-party-avatar">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuATTdX3LHD94yn2FC7bL6Hjr0HDEOvs1nznBoAtYkY0pNO-d5ksaavoJ90Rn_8TKAhEVy2nKtqjJY2PMcPQLH4TORUQ6oAdOMf_TRYc3VvTh7p7zMkEHOypV2bJwu5UqaBkjLYsWFGELppLs4TILCfv6FnbHfl8XWO7ucV23eyrddxpKsN1HCRoKD1qweDZvRrZN6qWEp_ZuytBqEUq40bGGZIpnJ90nF6z5JHiJ1Iu7GNAsbKjFHWn" alt="Caregiver">
                                    </div>
                                    <div>
                                        <h3 class="bd-party-name">Sandun Rathnayake</h3>
                                        <div class="bd-party-role" style="color:var(--primary); font-weight:600; display:flex; align-items:center; gap:4px;">
                                            <span class="material-symbols-outlined" style="font-size:14px;">verified</span> Verified Pro
                                        </div>
                                    </div>
                                </div>
                                <span class="badge-tag" style="background-color:var(--surface-container-low); color:var(--primary); font-size:11px;">#CG-88021</span>
                            </div>
                            <div class="bd-party-divider"></div>
                            <div style="display:flex; flex-direction:column; gap:10px;">
                                <div style="display:flex; justify-content:space-between; font-size:14px;">
                                    <span style="color:var(--on-surface-variant);">Experience:</span>
                                    <span style="font-weight:600;">6+ Years</span>
                                </div>
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">school</span>
                                    <span>NVQ Level 4 Elderly Care • CPR/First Aid</span>
                                </div>
                                <div class="bd-party-detail">
                                    <span class="material-symbols-outlined">call</span>
                                    <span>+94 77 345 6789</span>
                                </div>
                                <div class="bd-party-detail" style="color:var(--status-success); font-weight:500;">
                                    <span class="material-symbols-outlined">shield</span>
                                    <span>Police &amp; NIC Cleared</span>
                                </div>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center; background:var(--surface-container-low); padding:8px; border-radius:4px; font-size:12px;">
                                <span style="color:var(--on-surface-variant);">Shift Allocation</span>
                                <span style="color:var(--primary); font-weight:600;">Active In-Service</span>
                            </div>
                        </div>
                        <button class="btn-full-width">View Caregiver Profile</button>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 7: Simulated Payment Summary -->
            <section class="bd-section">
                <div class="bd-section-header">
                    <div class="bd-section-title-group">
                        <div class="icon-wrapper-sm bg-surface-container text-primary">
                            <span class="material-symbols-outlined">account_balance_wallet</span>
                        </div>
                        <div>
                            <h2 class="bd-section-title">Simulated Payment Summary</h2>
                            <p class="bd-section-desc">Platform operational settlement &amp; simulated escrow monitoring ledger.</p>
                        </div>
                    </div>
                    <span class="badge-tag" style="background-color:#fffbeb; color:#92400e; font-weight:700; display:flex; align-items:center; gap:6px;">
                        <span class="material-symbols-outlined icon-sm">lock_clock</span>
                        Escrow Secured
                    </span>
                </div>
                
                <div class="bd-escrow-banner">
                    <span class="material-symbols-outlined">info</span>
                    <div>
                        <h4 class="bd-escrow-title">Simulated Escrow Protocol Active</h4>
                        <p class="bd-escrow-desc">No real financial transaction. Simulated payments are retained in platform escrow until shift completion and post-care operational clearance. Sensitive payment details and external gateways are excluded by compliance design.</p>
                    </div>
                </div>
                
                <div class="bd-finance-grid">
                    <div class="bd-info-box">
                        <span class="bd-info-label">Total Family Invoiced Fee</span>
                        <span class="bd-info-value" style="font-size:24px;">LKR 6,400.00</span>
                        <span class="bd-info-sub">8.0 Hours standard elderly assistance</span>
                    </div>
                    <div class="bd-info-box">
                        <span class="bd-info-label">Platform Operations Fee (10%)</span>
                        <span class="bd-info-value" style="font-size:24px; color:var(--secondary);">LKR 640.00</span>
                        <span class="bd-info-sub">Audit, insurance, and matching fee</span>
                    </div>
                    <div class="bd-info-box">
                        <span class="bd-info-label">Caregiver Payout Allocation</span>
                        <span class="bd-info-value" style="font-size:24px; color:var(--status-success);">LKR 5,760.00</span>
                        <span class="bd-info-sub text-success" style="font-weight:600;">Held for release after closure</span>
                    </div>
                </div>
                
                <div class="bd-escrow-meta">
                    <div>
                        <span class="bd-escrow-meta-label">Settlement Method:</span>
                        <span class="bd-escrow-meta-val">Simulated SafeHands Virtual Balance</span>
                    </div>
                    <div>
                        <span class="bd-escrow-meta-label">Payment Escrow State:</span>
                        <span class="bd-escrow-meta-val" style="color:#b45309;">HELD IN ESCROW (Pending Care Report Release)</span>
                    </div>
                    <div>
                        <span class="bd-escrow-meta-label">Transaction Reference ID:</span>
                        <span class="bd-escrow-meta-val" style="font-family:monospace;">SIM-TX-992014-LK</span>
                    </div>
                </div>
            </section>
            
        </div>
        
        <!-- RIGHT COLUMN (4 Columns equiv) -->
        <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- SECTION 6: Arrival Confirmation -->
            <section class="bd-section" style="padding:24px;">
                <div class="bd-section-header" style="padding-bottom:12px;">
                    <div class="bd-section-title-group">
                        <span class="material-symbols-outlined text-primary">where_to_vote</span>
                        <h3 class="bd-section-title" style="font-size:16px;">Arrival Confirmation</h3>
                    </div>
                    <span class="badge-tag" style="background-color:rgba(2, 87, 71, 0.1); color:var(--status-success); font-weight:700;">Confirmed</span>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div class="bd-info-box">
                        <div class="bd-list-row">
                            <span class="bd-list-label">Confirmed Date:</span>
                            <span class="bd-list-value">28 September 2026</span>
                        </div>
                        <div class="bd-list-row" style="margin:4px 0;">
                            <span class="bd-list-label">Confirmed Time:</span>
                            <span class="bd-list-value">08:05 AM IST</span>
                        </div>
                        <div class="bd-list-row">
                            <span class="bd-list-label">Verification Method:</span>
                            <span class="bd-list-value text-primary">Caregiver Mutual Protocol</span>
                        </div>
                    </div>
                    
                    <div class="bd-box-security">
                        <span class="material-symbols-outlined">key_off</span>
                        <p><span style="font-weight:600; color:var(--on-surface);">Strict Security Policy:</span> Real-time OTP / PIN verification codes are exclusively confidential between Guardian and Caregiver. PIN values are never accessible, logged, or retrievable within this Administrator Console.</p>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 8: Daily Care Report -->
            <section class="bd-section" style="padding:24px;">
                <div class="bd-section-header" style="padding-bottom:12px;">
                    <div class="bd-section-title-group">
                        <span class="material-symbols-outlined text-primary">clinical_notes</span>
                        <h3 class="bd-section-title" style="font-size:16px;">Daily Care Report</h3>
                    </div>
                    <span class="badge-tag" style="background-color:rgba(2, 87, 71, 0.1); color:var(--status-success); font-weight:700; display:flex; align-items:center; gap:4px;">
                        <span class="material-symbols-outlined icon-xs">check_circle</span> Submitted
                    </span>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div class="bd-info-box">
                        <div class="bd-list-row">
                            <span class="bd-list-label">Report Status:</span>
                            <span class="bd-list-value text-success">Submitted &amp; Verified</span>
                        </div>
                        <div class="bd-list-row" style="margin:4px 0;">
                            <span class="bd-list-label">Timestamp:</span>
                            <span class="bd-list-value">28 Sep 2026 • 04:15 PM</span>
                        </div>
                        <div class="bd-list-row" style="margin-bottom:4px;">
                            <span class="bd-list-label">Submitted By:</span>
                            <span class="bd-list-value">S. Rathnayake (#CG-88021)</span>
                        </div>
                        <div class="bd-list-row">
                            <span class="bd-list-label">Verification:</span>
                            <span class="bd-list-value text-primary">Automated Shift Closure</span>
                        </div>
                    </div>
                    
                    <div class="bd-privacy-notice">
                        <div class="bd-privacy-notice-header">
                            <span class="material-symbols-outlined icon-sm">privacy_tip</span>
                            Clinical Privacy Boundary Active
                        </div>
                        <p class="bd-privacy-notice-desc">In strict adherence to patient confidentiality regulations, administrative monitoring is restricted to verifying completion status only.</p>
                        <div style="border-top:1px solid var(--surface-container-highest); padding-top:8px; margin-top:4px;">
                            <span style="font-size:11px; font-weight:600; color:var(--on-surface);">Restricted from Admin View:</span>
                            <ul class="bd-privacy-list">
                                <li>Patient Health, Blood Pressure &amp; Vitals</li>
                                <li>Meal Timing &amp; Nutrition Logs</li>
                                <li>Medication Administration Records (MAR)</li>
                                <li>Mobility &amp; Assistance Tracking</li>
                                <li>Caregiver Observational Shift Notes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 9: Rating & Review -->
            <section class="bd-section" style="padding:24px;">
                <div class="bd-section-header" style="padding-bottom:12px;">
                    <div class="bd-section-title-group">
                        <span class="material-symbols-outlined text-primary">grade</span>
                        <h3 class="bd-section-title" style="font-size:16px;">Rating &amp; Review Status</h3>
                    </div>
                    <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-surface-variant); font-weight:700;">Completed</span>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div class="bd-info-box" style="flex-direction:row; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="bd-info-label" style="display:block;">Service Rating</span>
                            <span class="bd-info-value" style="display:block;">5.0 / 5.0 Stars</span>
                        </div>
                        <div class="bd-review-stars">
                            <span class="material-symbols-outlined">star</span>
                            <span class="material-symbols-outlined">star</span>
                            <span class="material-symbols-outlined">star</span>
                            <span class="material-symbols-outlined">star</span>
                            <span class="material-symbols-outlined">star</span>
                        </div>
                    </div>
                    <div class="bd-info-box">
                        <div class="bd-list-row">
                            <span class="bd-list-label">Guardian Written Feedback:</span>
                            <span class="bd-list-value text-success">Submitted</span>
                        </div>
                        <p style="font-size:11px; font-style:italic; color:var(--on-surface-variant); margin:4px 0 0 0;">Detailed review commentary is retained in confidential quality monitoring.</p>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 10: Issue & Dispute Status -->
            <section class="bd-section" style="padding:24px;">
                <div class="bd-section-header" style="padding-bottom:12px;">
                    <div class="bd-section-title-group">
                        <span class="material-symbols-outlined text-primary">help_outline</span>
                        <h3 class="bd-section-title" style="font-size:16px;">Issue &amp; Dispute Status</h3>
                    </div>
                    <span class="badge-tag" style="background-color:rgba(2, 87, 71, 0.1); color:var(--status-success); font-weight:700;">Clean Session</span>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div class="bd-info-box" style="flex-direction:row; align-items:center; gap:12px;">
                        <span class="icon-wrapper-sm bg-success-light text-success" style="border-radius:50%; width:32px; height:32px;">
                            <span class="material-symbols-outlined icon-sm">verified</span>
                        </span>
                        <div>
                            <div style="font-weight:700; color:var(--on-surface); font-size:14px;">No Complaints Filed</div>
                            <div style="font-size:11px; color:var(--on-surface-variant);">Zero disputes submitted by Guardian or Caregiver</div>
                        </div>
                    </div>
                    <p style="font-size:11px; color:var(--on-surface-variant); line-height:1.5; margin:0;">If an operational incident or dispute is lodged, SafeHands case protocol will automatically connect this booking record to resolution queues.</p>
                    <button class="btn-full-width" style="margin-top:4px;">
                        <span class="material-symbols-outlined icon-sm">folder_special</span> Case Management Hub
                    </button>
                </div>
            </section>
            
        </div>
    </div>
</div>

<script>
    function toggleAuditModal() {
        const modal = document.getElementById('auditModal');
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        } else {
            modal.classList.add('hidden');
            modal.style.display = 'none';
        }
    }
</script>
