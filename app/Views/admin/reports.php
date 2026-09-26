<div class="dashboard-container">

    <!-- 1. PAGE HEADER & DATE FILTER -->
    <div class="reports-header">
        <div class="reports-header-top">
            <div>
                <div style="display:flex; align-items:center; gap:12px;">
                    <h1 style="font-size:32px; font-weight:600; margin:0; letter-spacing:-0.01em;">Reports</h1>
                    <span class="badge-tag" style="background:var(--surface-container-high); color:var(--primary); font-weight:600; display:flex; align-items:center; gap:6px;">
                        <span class="dot-sm bg-primary" style="animation: pulse 2s infinite;"></span>
                        Automated Nightly Audit • v2.4 Platform Analytics
                    </span>
                </div>
                <p style="margin:4px 0 0 0; color:var(--outline); font-size:16px;">
                    Monitor SafeHands system activity, service performance, and operational statistics.
                </p>
            </div>
            <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:12px; color:var(--outline); display:flex; align-items:center; gap:4px; font-weight:600;">
                    <span class="material-symbols-outlined icon-sm text-success">verified_user</span>
                    HIPAA &amp; SLMC Protected System
                </span>
            </div>
        </div>

        <!-- Filter Bar Card -->
        <div class="reports-filter-bar">
            <form onsubmit="event.preventDefault();" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px;">
                <div style="display:flex; flex-wrap:wrap; align-items:center; gap:16px;">
                    <div class="filter-group" style="flex-direction:row; align-items:center; margin:0; gap:8px;">
                        <label style="margin:0; font-weight:500; color:var(--on-surface-variant); font-size:14px; white-space:nowrap;">From:</label>
                        <div class="select-wrapper">
                            <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">calendar_today</span>
                            <input type="date" id="date-from" value="2026-09-01" style="padding-left:36px; background:var(--surface-container-low); border:none; border-radius:8px; padding-top:8px; padding-bottom:8px;">
                        </div>
                    </div>
                    <div class="filter-group" style="flex-direction:row; align-items:center; margin:0; gap:8px;">
                        <label style="margin:0; font-weight:500; color:var(--on-surface-variant); font-size:14px; white-space:nowrap;">To:</label>
                        <div class="select-wrapper">
                            <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">calendar_today</span>
                            <input type="date" id="date-to" value="2026-10-15" style="padding-left:36px; background:var(--surface-container-low); border:none; border-radius:8px; padding-top:8px; padding-bottom:8px;">
                        </div>
                    </div>
                    
                    <div style="width:1px; height:24px; background:var(--surface-variant);"></div>
                    
                    <!-- Quick Presets -->
                    <div style="display:flex; align-items:center; gap:6px;">
                        <button class="preset-btn" type="button">Last 30 Days</button>
                        <button class="preset-btn" type="button">This Quarter</button>
                        <button class="preset-btn" type="button">Year to Date</button>
                    </div>
                </div>

                <div style="display:flex; align-items:center; gap:10px;">
                    <button class="btn btn-neutral" type="button" style="background:var(--surface-container-low); border:none;">Reset</button>
                    <button class="btn btn-primary" type="submit" style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined icon-sm">filter_alt</span> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. SUMMARY STATISTIC CARDS (4 cols x 2 rows) -->
    <div class="reports-kpi-grid">
        <!-- 1. Total Bookings -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Total Bookings</span>
                <div class="icon-wrapper-sm bg-surface-container text-primary">
                    <span class="material-symbols-outlined icon-sm">calendar_month</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">148</span>
                </div>
                <p class="kpi-desc" style="display:flex; align-items:center; gap:4px;">
                    <span class="dot-sm bg-primary"></span> 12 active this week
                </p>
            </div>
        </div>

        <!-- 2. Completed Bookings -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Completed Bookings</span>
                <div class="icon-wrapper-sm bg-surface-container text-success">
                    <span class="material-symbols-outlined icon-sm">check_circle</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">118</span>
                    <span class="kpi-badge" style="background:var(--surface-container-low); color:var(--status-success);">79.7%</span>
                </div>
                <p class="kpi-desc">Fulfillment rate to date</p>
            </div>
        </div>

        <!-- 3. Cancelled Bookings -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Cancelled Bookings</span>
                <div class="icon-wrapper-sm bg-error-container text-error">
                    <span class="material-symbols-outlined icon-sm">cancel</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">9</span>
                    <span class="kpi-badge" style="background:var(--error-container); color:var(--on-error-container);">6.0%</span>
                </div>
                <p class="kpi-desc">Low cancellation anomaly</p>
            </div>
        </div>

        <!-- 4. Total Caregivers -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Total Caregivers</span>
                <div class="icon-wrapper-sm bg-surface-container text-secondary">
                    <span class="material-symbols-outlined icon-sm">groups</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">54</span>
                </div>
                <p class="kpi-desc">42 active &amp; verified roster</p>
            </div>
        </div>

        <!-- 5. Total Family Members -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Total Family Members</span>
                <div class="icon-wrapper-sm bg-surface-container text-primary">
                    <span class="material-symbols-outlined icon-sm">home_health</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">86</span>
                </div>
                <p class="kpi-desc">Accounts in good standing</p>
            </div>
        </div>

        <!-- 6. Registered Patients -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Registered Patients</span>
                <div class="icon-wrapper-sm bg-surface-container text-secondary">
                    <span class="material-symbols-outlined icon-sm">person_add</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">92</span>
                </div>
                <p class="kpi-desc">Across 4 active districts</p>
            </div>
        </div>

        <!-- 7. Submitted Care Reports -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Care Reports Submitted</span>
                <div class="icon-wrapper-sm bg-surface-container text-success">
                    <span class="material-symbols-outlined icon-sm">assignment_turned_in</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">112</span>
                    <span class="kpi-badge" style="background:var(--surface-container-low); color:var(--status-success);">94.9%</span>
                </div>
                <p class="kpi-desc">Shift documentation compliance</p>
            </div>
        </div>

        <!-- 8. Pending Complaints -->
        <div class="kpi-card" style="box-shadow:0 4px 12px rgba(254, 187, 2, 0.05);">
            <div class="kpi-header">
                <span class="kpi-title">Pending Complaints</span>
                <div class="icon-wrapper-sm text-tertiary" style="background:rgba(254, 187, 2, 0.2);">
                    <span class="material-symbols-outlined icon-sm">warning</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">5</span>
                    <span class="kpi-badge" style="background:rgba(254, 187, 2, 0.2); color:var(--tertiary);">Requires Action</span>
                </div>
                <p class="kpi-desc">Awaiting administrative review</p>
            </div>
        </div>
    </div>

    <!-- 3. MAIN CONTENT: BOOKINGS & CARE REPORT PRIVACY COMPLIANCE -->
    <div class="grid-7-5">
        <!-- Section 1: Booking Overview (7 Cols) -->
        <div class="report-card">
            <div>
                <div class="report-card-header">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined text-primary" style="font-size:22px;">bar_chart</span>
                        <h2 style="font-size:24px; font-weight:600; margin:0;">Booking Overview</h2>
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container); color:var(--on-secondary-container); font-weight:600;">148 Total Records</span>
                </div>
                <p style="color:var(--outline); font-size:14px; margin-bottom:24px;">Distribution across booking lifecycle states for the selected operational period.</p>
                
                <div style="display:flex; flex-direction:column; gap:16px;">
                    <!-- Completed -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm bg-success"></span> Completed
                            </span>
                            <span style="color:var(--outline);">118 bookings • <strong style="color:var(--on-surface);">79.7%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill bg-success" style="width:79.7%;"></div></div>
                    </div>
                    <!-- In Progress -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm bg-primary"></span> In Progress
                            </span>
                            <span style="color:var(--outline);">8 bookings • <strong style="color:var(--on-surface);">5.4%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill bg-primary" style="width:5.4%;"></div></div>
                    </div>
                    <!-- Approved -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm" style="background:var(--secondary-container);"></span> Approved
                            </span>
                            <span style="color:var(--outline);">7 bookings • <strong style="color:var(--on-surface);">4.7%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill" style="background:var(--secondary-container); width:4.7%;"></div></div>
                    </div>
                    <!-- Pending -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm bg-warning"></span> Pending
                            </span>
                            <span style="color:var(--outline);">6 bookings • <strong style="color:var(--on-surface);">4.1%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill bg-warning" style="width:4.1%;"></div></div>
                    </div>
                    <!-- Cancelled -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm bg-outline"></span> Cancelled
                            </span>
                            <span style="color:var(--outline);">5 bookings • <strong style="color:var(--on-surface);">3.4%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill bg-outline" style="width:3.4%;"></div></div>
                    </div>
                    <!-- Rejected -->
                    <div>
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:6px;">
                            <span style="display:flex; align-items:center; gap:8px; color:var(--on-surface);">
                                <span class="dot-sm bg-error"></span> Rejected
                            </span>
                            <span style="color:var(--outline);">4 bookings • <strong style="color:var(--on-surface);">2.7%</strong></span>
                        </div>
                        <div class="progress-track"><div class="progress-fill bg-error" style="width:2.7%;"></div></div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:32px; padding-top:16px; border-top:1px solid var(--surface-container-low); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px; font-size:12px; color:var(--outline);">
                <div style="display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm text-primary">schedule</span>
                    <span>Average Shift Duration: <strong style="color:var(--on-surface);">8.2 hrs</strong></span>
                </div>
                <div style="display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm text-success">thumb_up</span>
                    <span>Completion Reliability: <strong style="color:var(--on-surface);">94.3%</strong></span>
                </div>
            </div>
        </div>

        <!-- Section 2: Care Report Compliance & Privacy (5 Cols) -->
        <div class="report-card">
            <div>
                <div class="report-card-header">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined text-success" style="font-size:22px;">policy</span>
                        <h2 style="font-size:24px; font-weight:600; margin:0;">Report Submission</h2>
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container-low); color:var(--status-success); font-weight:600;">94.9% Completed</span>
                </div>
                
                <div style="margin-top:16px; padding:14px; border-radius:8px; background:var(--surface-container-low); display:flex; align-items:flex-start; gap:12px;">
                    <span class="material-symbols-outlined text-primary icon-sm" style="margin-top:2px;">lock</span>
                    <p style="margin:0; font-size:12px; color:var(--on-surface-variant); line-height:1.5;">
                        <strong style="color:var(--on-surface);">Strict Privacy Protocol:</strong> System displays administrative delivery counters only. Individual clinical notes, medications, and vitals remain encrypted under patient jurisdiction.
                    </p>
                </div>
                
                <div style="margin-top:24px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:24px;">
                    <div style="position:relative; width:144px; height:144px; display:flex; align-items:center; justify-content:center;">
                        <svg style="width:100%; height:100%; transform:rotate(-90deg);" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" fill="transparent" r="40" stroke="var(--surface-container-low)" stroke-width="12"></circle>
                            <circle cx="50" cy="50" fill="transparent" r="40" stroke="var(--status-success)" stroke-dasharray="251.2" stroke-dashoffset="12.8" stroke-linecap="round" stroke-width="12"></circle>
                        </svg>
                        <div style="position:absolute; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <span style="font-size:32px; font-weight:700; color:var(--on-surface); line-height:1;">112</span>
                            <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.05em; color:var(--outline);">Reports</span>
                        </div>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:12px; font-size:12px;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <span class="dot-sm bg-success"></span>
                            <div>
                                <p style="margin:0; font-weight:600; color:var(--on-surface);">Submitted (112)</p>
                                <p style="margin:0; color:var(--outline);">Within audit guidelines</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <span class="dot-sm bg-warning"></span>
                            <div>
                                <p style="margin:0; font-weight:600; color:var(--on-surface);">Not Submitted (6)</p>
                                <p style="margin:0; color:var(--outline);">Caregiver follow-up active</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:24px; padding-top:16px; border-top:1px solid var(--surface-container-low); display:flex; flex-direction:column; gap:10px;">
                <div style="display:flex; justify-content:space-between; font-size:12px;">
                    <span style="color:var(--outline);">On-Time Submission Rate</span>
                    <span style="font-weight:600; color:var(--on-surface);">91.8% (within 2h)</span>
                </div>
                <div style="display:flex; justify-content:space-between; font-size:12px;">
                    <span style="color:var(--outline);">Automated Reminders</span>
                    <span style="font-weight:600; color:var(--on-surface);">14 SMS/Push Sent</span>
                </div>
                <div style="display:flex; justify-content:space-between; font-size:12px;">
                    <span style="color:var(--outline);">Late Reports Followed Up</span>
                    <span style="font-weight:600; color:var(--status-success);">6 of 6 Resolved</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. SECTION: CAREGIVER VERIFICATION & COMPLAINTS -->
    <div class="grid-2-col" style="gap:32px; margin-bottom:32px;">
        <!-- Card A: Caregiver Verification Status -->
        <div class="report-card" style="margin-bottom:0;">
            <div>
                <div class="report-card-header">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined text-secondary" style="font-size:22px;">badge</span>
                        <h2 style="font-size:24px; font-weight:600; margin:0;">Caregiver Verification Status</h2>
                    </div>
                    <span style="font-size:12px; color:var(--outline);">54 Enrolled</span>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:16px; margin-top:20px;">
                    <!-- Verified -->
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px; display:flex; align-items:center; justify-content:space-between;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div class="icon-wrapper-sm bg-surface-container text-success"><span class="material-symbols-outlined icon-sm">verified</span></div>
                            <div>
                                <h4 style="margin:0; font-size:14px; font-weight:600; color:var(--on-surface);">Verified Caregivers</h4>
                                <p style="margin:0; font-size:12px; color:var(--outline);">SLMC registered and fully vetted</p>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <span style="display:block; font-size:18px; font-weight:700; color:var(--on-surface);">42</span>
                            <span style="display:block; font-size:11px; font-weight:600; color:var(--status-success);">77.8%</span>
                        </div>
                    </div>
                    <!-- Pending Review -->
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px; display:flex; align-items:center; justify-content:space-between;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div class="icon-wrapper-sm text-tertiary" style="background:rgba(254, 187, 2, 0.2);"><span class="material-symbols-outlined icon-sm">hourglass_top</span></div>
                            <div>
                                <h4 style="margin:0; font-size:14px; font-weight:600; color:var(--on-surface);">Pending Verification</h4>
                                <p style="margin:0; font-size:12px; color:var(--outline);">Credential and police checks ongoing</p>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <span style="display:block; font-size:18px; font-weight:700; color:var(--on-surface);">8</span>
                            <span style="display:block; font-size:11px; font-weight:600; color:var(--tertiary);">14.8%</span>
                        </div>
                    </div>
                    <!-- Rejected -->
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px; display:flex; align-items:center; justify-content:space-between;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div class="icon-wrapper-sm bg-error-container text-error"><span class="material-symbols-outlined icon-sm">block</span></div>
                            <div>
                                <h4 style="margin:0; font-size:14px; font-weight:600; color:var(--on-surface);">Screening Rejected</h4>
                                <p style="margin:0; font-size:12px; color:var(--outline);">Failed background compliance</p>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <span style="display:block; font-size:18px; font-weight:700; color:var(--on-surface);">4</span>
                            <span style="display:block; font-size:11px; font-weight:600; color:var(--error);">7.4%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:24px; padding-top:16px; border-top:1px solid var(--surface-container-low); display:flex; align-items:center; justify-content:space-between; font-size:12px; color:var(--outline);">
                <span style="display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm">speed</span> Average Turnaround: <strong style="color:var(--on-surface);">36 hours</strong>
                </span>
                <a href="#" style="color:var(--primary); font-weight:600; text-decoration:none;">Manage Vetting Queue →</a>
            </div>
        </div>

        <!-- Card B: Complaint & Grievance Statistics -->
        <div class="report-card" style="margin-bottom:0;">
            <div>
                <div class="report-card-header">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined text-tertiary" style="font-size:22px;">gavel</span>
                        <h2 style="font-size:24px; font-weight:600; margin:0;">Grievance Statistics</h2>
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container-low); color:var(--outline); font-weight:500;">24 Historical Total</span>
                </div>
                
                <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; margin-top:20px;">
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px;">
                        <span style="display:block; font-size:12px; color:var(--outline);">Resolved</span>
                        <span style="display:block; font-size:24px; font-weight:700; color:var(--status-success);">12</span>
                        <span style="display:block; font-size:11px; font-weight:500; color:var(--status-success);">50.0% closed</span>
                    </div>
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px;">
                        <span style="display:block; font-size:12px; color:var(--outline);">Under Review</span>
                        <span style="display:block; font-size:24px; font-weight:700; color:var(--primary);">7</span>
                        <span style="display:block; font-size:11px; font-weight:500; color:var(--primary);">29.2% in mediation</span>
                    </div>
                    <div style="background:rgba(254, 187, 2, 0.1); padding:14px; border-radius:8px;">
                        <span style="display:block; font-size:12px; color:var(--tertiary);">Pending Review</span>
                        <span style="display:block; font-size:24px; font-weight:700; color:var(--tertiary);">5</span>
                        <span style="display:block; font-size:11px; font-weight:500; color:var(--tertiary);">20.8% escalated</span>
                    </div>
                    <div style="background:var(--surface-container-low); padding:14px; border-radius:8px;">
                        <span style="display:block; font-size:12px; color:var(--outline);">Rejected / Dismissed</span>
                        <span style="display:block; font-size:24px; font-weight:700; color:var(--outline);">0</span>
                        <span style="display:block; font-size:11px; color:var(--outline);">0.0% discarded</span>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:24px; padding-top:16px; border-top:1px solid var(--surface-container-low); display:flex; align-items:center; justify-content:space-between; font-size:12px; color:var(--outline);">
                <span style="display:flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm text-success">timer</span>
                    Avg Resolution: <strong style="color:var(--on-surface);">28.4 hours</strong> (SLA &lt;48h)
                </span>
                <span style="color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                    <span class="material-symbols-outlined icon-sm">check</span> SLA Met
                </span>
            </div>
        </div>
    </div>

    <!-- 5. SECTION: SIMULATED PAYMENT OVERVIEW -->
    <div class="report-card" style="margin-bottom:32px;">
        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:8px; padding-bottom:16px; border-bottom:1px solid var(--surface-container-low);">
            <div style="display:flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined text-primary" style="font-size:24px;">account_balance_wallet</span>
                <div>
                    <h2 style="font-size:24px; font-weight:600; margin:0;">Payment &amp; Financial Ledger Overview</h2>
                    <p style="margin:0; font-size:14px; color:var(--outline);">Operational financial metrics based on platform simulated escrow.</p>
                </div>
            </div>
            <span class="badge-tag" style="background:rgba(254, 187, 2, 0.1); color:var(--tertiary); font-weight:500; display:flex; align-items:center; gap:6px;">
                <span class="material-symbols-outlined icon-sm">info</span> Simulated Payment System — No External Gateways
            </span>
        </div>

        <!-- 7 Horizontal Stat Blocks -->
        <div class="grid-7-col">
            <div style="background:var(--surface-container-low); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--outline);">Total Payments</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--on-surface); margin-top:4px;">LKR 947,200</span>
                <span style="display:block; font-size:11px; color:var(--outline);">148 Transactions</span>
            </div>
            <div style="background:var(--surface-container-low); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--status-success);">Released</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--status-success); margin-top:4px;">LKR 755,200</span>
                <span style="display:block; font-size:11px; color:var(--outline);">118 Shifts Complete</span>
            </div>
            <div style="background:var(--surface-container-low); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--primary);">Held in Escrow</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--primary); margin-top:4px;">LKR 51,200</span>
                <span style="display:block; font-size:11px; color:var(--outline);">14 Active Shifts</span>
            </div>
            <div style="background:var(--surface-container-low); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--tertiary);">Pending Initial</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--tertiary); margin-top:4px;">LKR 38,400</span>
                <span style="display:block; font-size:11px; color:var(--outline);">6 Unconfirmed</span>
            </div>
            <div style="background:var(--surface-container-low); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--error);">Refunded</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--error); margin-top:4px;">LKR 57,600</span>
                <span style="display:block; font-size:11px; color:var(--outline);">9 Cancelled</span>
            </div>
            <div style="background:var(--surface-container); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--secondary);">Commission (10%)</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--secondary); margin-top:4px;">LKR 94,720</span>
                <span style="display:block; font-size:11px; color:var(--outline);">Operational Fee</span>
            </div>
            <div style="background:var(--surface-container); padding:12px; border-radius:8px;">
                <span style="display:block; font-size:11px; text-transform:uppercase; color:var(--on-surface);">Net Payouts (90%)</span>
                <span style="display:block; font-size:14px; font-weight:700; color:var(--on-surface); margin-top:4px;">LKR 852,480</span>
                <span style="display:block; font-size:11px; color:var(--outline);">Caregiver Balance</span>
            </div>
        </div>

        <!-- Segmented Bar Visualization of Cashflow -->
        <div style="margin-top:24px;">
            <div style="display:flex; justify-content:space-between; font-size:11px; color:var(--outline); margin-bottom:6px;">
                <span>Escrow Flow Distribution</span>
                <span>Released 79.7% • Escrow 5.4% • Pending 4.1% • Refunded 6.1% • Fee 4.7%</span>
            </div>
            <div class="segmented-bar">
                <div class="segmented-part bg-success" style="width: 79.7%;" title="Released: 79.7%"></div>
                <div class="segmented-part bg-primary" style="width: 5.4%;" title="In Escrow: 5.4%"></div>
                <div class="segmented-part bg-warning" style="width: 4.1%;" title="Pending: 4.1%"></div>
                <div class="segmented-part bg-error" style="width: 6.1%;" title="Refunded: 6.1%"></div>
                <div class="segmented-part" style="background:var(--secondary); width: 4.7%;" title="Retained Ops: 4.7%"></div>
            </div>
        </div>
    </div>

    <!-- 6. SECTION: REPORT GENERATION CONSOLE -->
    <div class="report-card">
        <div style="padding-bottom:16px; border-bottom:1px solid var(--surface-container-low);">
            <h2 style="font-size:24px; font-weight:600; margin:0;">Generate Operational Report</h2>
            <p style="margin:0; font-size:14px; color:var(--outline);">Export filtered administrative data dossiers in standardized format.</p>
        </div>
        
        <div class="grid-7-5" style="margin-top:24px; margin-bottom:0;">
            <!-- Generation Form (7 Cols) -->
            <form onsubmit="event.preventDefault();" style="display:flex; flex-direction:column; gap:16px;">
                <div>
                    <label style="display:block; font-size:14px; font-weight:500; color:var(--on-surface); margin-bottom:6px;">Report Dossier Type</label>
                    <div class="select-wrapper">
                        <select style="width:100%; padding:10px 14px; background:var(--surface-container-low); border:none; border-radius:8px; font-size:14px; color:var(--on-surface); outline:none;">
                            <option value="booking">Booking Report (Aggregated status, dates, hours, and fulfillments)</option>
                            <option value="caregiver">Caregiver Report (Verification status, active count, qualifications)</option>
                            <option value="family">Family Member Report (Registration activity, active patient count)</option>
                            <option value="payment">Payment Report (Simulated transaction ledger, escrow &amp; commissions)</option>
                            <option value="complaint">Complaint Report (Dispute resolution velocity, category trends)</option>
                            <option value="system">System Activity Report (Platform audit log, session volume)</option>
                        </select>
                        <span class="material-symbols-outlined text-outline">arrow_drop_down</span>
                    </div>
                </div>
                
                <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:16px;">
                    <div>
                        <label style="display:block; font-size:14px; font-weight:500; color:var(--on-surface); margin-bottom:6px;">Date Range From</label>
                        <div class="select-wrapper">
                            <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">calendar_today</span>
                            <input type="date" value="2026-09-01" style="width:100%; padding-left:36px; padding-top:10px; padding-bottom:10px; padding-right:12px; background:var(--surface-container-low); border:none; border-radius:8px; font-size:14px; color:var(--on-surface); outline:none;">
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:14px; font-weight:500; color:var(--on-surface); margin-bottom:6px;">Date Range To</label>
                        <div class="select-wrapper">
                            <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">calendar_today</span>
                            <input type="date" value="2026-10-15" style="width:100%; padding-left:36px; padding-top:10px; padding-bottom:10px; padding-right:12px; background:var(--surface-container-low); border:none; border-radius:8px; font-size:14px; color:var(--on-surface); outline:none;">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label style="display:block; font-size:14px; font-weight:500; color:var(--on-surface); margin-bottom:8px;">Export Format</label>
                    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px;">
                        <label class="radio-box-label">
                            <input type="radio" name="export-format" value="pdf" checked>
                            <span style="display:flex; align-items:center; gap:8px;">
                                <span class="material-symbols-outlined text-error icon-sm">picture_as_pdf</span>
                                PDF Document (.pdf)
                            </span>
                        </label>
                        <label class="radio-box-label">
                            <input type="radio" name="export-format" value="csv">
                            <span style="display:flex; align-items:center; gap:8px;">
                                <span class="material-symbols-outlined text-success icon-sm">table_view</span>
                                Excel / CSV (.xlsx)
                            </span>
                        </label>
                    </div>
                </div>
                
                <div style="padding-top:8px;">
                    <button type="button" class="btn btn-primary" style="width:100%; justify-content:center; padding:12px; display:flex; align-items:center; gap:8px; border:none;">
                        <span class="material-symbols-outlined icon-sm">download</span> Generate &amp; Download Report
                    </button>
                </div>
            </form>

            <!-- Recent Generated Reports Quick Table (5 Cols) -->
            <div style="background:var(--surface-container-low); border-radius:8px; padding:16px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <div style="display:flex; align-items:center; justify-content:space-between; padding-bottom:12px; border-bottom:1px solid var(--surface-variant);">
                        <span style="font-size:14px; font-weight:600; color:var(--on-surface);">Recent Reports</span>
                        <span style="font-size:11px; color:var(--outline);">Last 30 Days</span>
                    </div>
                    
                    <div>
                        <!-- Report 1 -->
                        <div class="recent-report-item">
                            <div style="display:flex; align-items:flex-start; gap:10px; min-width:0;">
                                <span class="material-symbols-outlined text-error icon-sm" style="flex-shrink:0; margin-top:2px;">description</span>
                                <div style="min-width:0; overflow:hidden;">
                                    <p style="margin:0; font-size:14px; font-weight:500; color:var(--on-surface); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Monthly_Booking_Report_Sep2026.pdf</p>
                                    <p style="margin:0; font-size:11px; color:var(--outline);">1.4 MB • 01 Oct 2026 by SYSTEM</p>
                                </div>
                            </div>
                            <button class="btn-icon-plain" title="Download" style="color:var(--primary);"><span class="material-symbols-outlined icon-sm">file_download</span></button>
                        </div>
                        <!-- Report 2 -->
                        <div class="recent-report-item">
                            <div style="display:flex; align-items:flex-start; gap:10px; min-width:0;">
                                <span class="material-symbols-outlined text-success icon-sm" style="flex-shrink:0; margin-top:2px;">table_chart</span>
                                <div style="min-width:0; overflow:hidden;">
                                    <p style="margin:0; font-size:14px; font-weight:500; color:var(--on-surface); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Escrow_Reconciliation_Q3_2026.xlsx</p>
                                    <p style="margin:0; font-size:11px; color:var(--outline);">840 KB • 30 Sep 2026 by SYSTEM</p>
                                </div>
                            </div>
                            <button class="btn-icon-plain" title="Download" style="color:var(--primary);"><span class="material-symbols-outlined icon-sm">file_download</span></button>
                        </div>
                        <!-- Report 3 -->
                        <div class="recent-report-item">
                            <div style="display:flex; align-items:flex-start; gap:10px; min-width:0;">
                                <span class="material-symbols-outlined text-error icon-sm" style="flex-shrink:0; margin-top:2px;">description</span>
                                <div style="min-width:0; overflow:hidden;">
                                    <p style="margin:0; font-size:14px; font-weight:500; color:var(--on-surface); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Caregiver_Verification_Audit_Sep2026.pdf</p>
                                    <p style="margin:0; font-size:11px; color:var(--outline);">620 KB • 28 Sep 2026 by SYSTEM</p>
                                </div>
                            </div>
                            <button class="btn-icon-plain" title="Download" style="color:var(--primary);"><span class="material-symbols-outlined icon-sm">file_download</span></button>
                        </div>
                    </div>
                </div>
                
                <div style="padding-top:12px; border-top:1px solid var(--surface-variant); text-align:center;">
                    <span style="font-size:11px; color:var(--outline);">Automated archival runs every Sunday 00:00 UTC</span>
                </div>
            </div>
        </div>
    </div>

</div>
