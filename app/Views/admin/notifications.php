<div class="dashboard-container relative">

    <!-- Interactive Toast Notification Element -->
    <div class="toast-notif" id="toastNotification">
        <span class="material-symbols-outlined text-success">check_circle</span>
        <span id="toastText" style="font-weight:500;">Action completed successfully</span>
    </div>

    <!-- Top Sub-Header & Global Tab Controller -->
    <div class="notifications-header">
        <div class="notifications-header-top">
            <div>
                <div style="display:flex; align-items:center; gap:12px;">
                    <h1 style="font-size:32px; font-weight:600; margin:0; letter-spacing:-0.01em;">Notifications</h1>
                    <span class="badge-tag" style="background:var(--primary-container); color:white; font-weight:600; opacity: 0.9;">Central Dispatch</span>
                </div>
                <p style="margin:4px 0 0 0; color:var(--outline); font-size:16px;">
                    View system notifications and manage administrator communications.
                </p>
            </div>
            
            <div style="display:flex; align-items:center; gap:16px;">
                <!-- Dual Tab Switcher -->
                <div class="notif-tab-container">
                    <button class="notif-tab-btn active" id="tabBtnReceived" onclick="switchMainTab('received')">
                        Received
                        <span class="pill-count pill-error" id="receivedBadgeCounter">3</span>
                    </button>
                    <button class="notif-tab-btn" id="tabBtnSent" onclick="switchMainTab('sent')">
                        Sent
                        <span class="pill-count pill-muted">1,382</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- TAB CONTENT: RECEIVED NOTIFICATIONS (DEFAULT) -->
    <!-- ========================================== -->
    <div id="viewReceived" style="display:flex; flex-direction:column; gap:24px;">
        
        <!-- Summary Metric Cards -->
        <div class="grid-3-col" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:24px;">
            <!-- All -->
            <div class="kpi-card" style="margin-bottom:0;">
                <div class="kpi-header">
                    <span class="kpi-title" style="text-transform:uppercase; font-size:12px; letter-spacing:0.05em;">All Notifications</span>
                    <div class="icon-wrapper-sm bg-surface-container text-primary">
                        <span class="material-symbols-outlined icon-sm">notifications_active</span>
                    </div>
                </div>
                <div class="kpi-value-row">
                    <div class="kpi-main-val"><span class="kpi-num">42</span></div>
                    <p class="kpi-desc">Audit log retention: 90 days</p>
                </div>
            </div>
            <!-- Unread -->
            <div class="kpi-card" style="margin-bottom:0; border: 1px solid rgba(0,74,198,0.2); position:relative; overflow:hidden;">
                <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background:var(--primary);"></div>
                <div class="kpi-header" style="padding-left:8px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span class="kpi-title" style="text-transform:uppercase; font-size:12px; letter-spacing:0.05em; color:var(--primary);">Unread</span>
                        <span class="pulse-primary"></span>
                    </div>
                    <div class="icon-wrapper-sm text-primary" style="background:rgba(0,74,198,0.1);">
                        <span class="material-symbols-outlined icon-sm">mark_email_unread</span>
                    </div>
                </div>
                <div class="kpi-value-row" style="padding-left:8px;">
                    <div class="kpi-main-val"><span class="kpi-num" style="color:var(--primary);" id="metricUnreadCounter">3</span></div>
                    <p class="kpi-desc">Requires administrative review</p>
                </div>
            </div>
            <!-- Read -->
            <div class="kpi-card" style="margin-bottom:0;">
                <div class="kpi-header">
                    <span class="kpi-title" style="text-transform:uppercase; font-size:12px; letter-spacing:0.05em;">Read &amp; Processed</span>
                    <div class="icon-wrapper-sm bg-surface-container text-outline">
                        <span class="material-symbols-outlined icon-sm">done_all</span>
                    </div>
                </div>
                <div class="kpi-value-row">
                    <div class="kpi-main-val"><span class="kpi-num" id="metricReadCounter">39</span></div>
                    <p class="kpi-desc text-success" style="font-weight:500;">Acknowledged by team</p>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div style="padding:20px; border-radius:16px; background:var(--surface-container-lowest); border:1px solid var(--border-subtle); display:flex; flex-direction:column; gap:16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
            <div style="display:flex; flex-wrap:wrap; align-items:center; gap:16px;">
                <div class="select-wrapper" style="flex:1; min-width:240px;">
                    <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">search</span>
                    <input type="text" id="filterReceivedSearch" placeholder="Search by keyword, reference ID..." style="width:100%; padding:10px 14px 10px 36px; border-radius:12px; border:1px solid transparent; background:var(--surface-container-low); outline:none;">
                </div>
                <div class="select-wrapper" style="min-width:180px;">
                    <select id="filterReceivedType" style="width:100%; padding:10px 14px; border-radius:12px; border:1px solid transparent; background:var(--surface-container-low); outline:none; appearance:none;">
                        <option value="ALL">All Notification Types</option>
                        <option value="Caregiver Verification">Caregiver Verification</option>
                        <option value="Complaint">Complaint</option>
                        <option value="Care Report">Care Report</option>
                        <option value="Booking">Booking</option>
                        <option value="Payment">Payment</option>
                        <option value="System">System</option>
                    </select>
                    <span class="material-symbols-outlined icon-sm text-outline">arrow_drop_down</span>
                </div>
                <div class="select-wrapper" style="min-width:140px;">
                    <select id="filterReceivedStatus" style="width:100%; padding:10px 14px; border-radius:12px; border:1px solid transparent; background:var(--surface-container-low); outline:none; appearance:none;">
                        <option value="ALL">All Status</option>
                        <option value="UNREAD">Unread</option>
                        <option value="READ">Read</option>
                    </select>
                    <span class="material-symbols-outlined icon-sm text-outline">arrow_drop_down</span>
                </div>
                <div style="display:flex; align-items:center; gap:8px;">
                    <button class="btn btn-primary" onclick="applyReceivedFilters()">Apply Filters</button>
                    <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="resetReceivedFilters()">Reset</button>
                </div>
            </div>
        </div>

        <!-- Received Cards Feed -->
        <div id="receivedListContainer" style="display:flex; flex-direction:column; gap:12px;">
            
            <!-- Card 1 (Unread - Caregiver Verification) -->
            <div class="received-item accent-primary" data-status="UNREAD" data-type="Caregiver Verification" id="notif-card-1">
                <div style="display:flex; gap:16px; align-items:flex-start;">
                    <div class="icon-wrapper-sm text-primary" style="background:rgba(0,74,198,0.1); width:44px; height:44px; flex-shrink:0;">
                        <span class="material-symbols-outlined" style="font-size:24px;">verified_user</span>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:4px;">
                        <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                            <span style="font-size:16px; font-weight:700; color:var(--on-surface);">New Caregiver Verification Request</span>
                            <span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary); font-weight:600;">Caregiver Verification</span>
                            <span class="pulse-primary"></span>
                        </div>
                        <p style="margin:0; font-size:14px; color:var(--on-surface-variant);">A caregiver has submitted credentials and identification documents for verification review.</p>
                        <div style="display:flex; align-items:center; gap:12px; font-size:12px; color:var(--outline); margin-top:4px;">
                            <span style="font-weight:500; color:var(--on-surface);">Caregiver ID: <span style="color:var(--primary); font-weight:600;">CG1024</span> (Sandun Rathnayake)</span>
                            <span>•</span>
                            <span>28 Sep 2026, 10:14 AM (2 mins ago)</span>
                        </div>
                    </div>
                </div>
                <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                    <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="markAsRead('notif-card-1')">Mark as Read</button>
                    <button class="btn btn-outline" style="color:var(--primary);" onclick="openDetailsModal('NOT-REC-1024', 'New Caregiver Verification Request', 'Caregiver Verification', 'UNREAD', 'A caregiver has submitted complete medical licensing and identity documents for institutional onboarding verification.', 'CG1024', 'Caregiver', 'Sandun Rathnayake', '28 Sep 2026', '10:14 AM')">View Details</button>
                </div>
            </div>

            <!-- Card 2 (Unread - Complaint) -->
            <div class="received-item accent-warning" data-status="UNREAD" data-type="Complaint" id="notif-card-2">
                <div style="display:flex; gap:16px; align-items:flex-start;">
                    <div class="icon-wrapper-sm text-tertiary" style="background:rgba(254,187,2,0.15); width:44px; height:44px; flex-shrink:0;">
                        <span class="material-symbols-outlined" style="font-size:24px;">report_problem</span>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:4px;">
                        <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                            <span style="font-size:16px; font-weight:700; color:var(--on-surface);">New Complaint Submitted</span>
                            <span class="badge-tag" style="background:rgba(254,187,2,0.2); color:var(--tertiary); font-weight:600;">Complaint</span>
                            <span class="pulse-warning"></span>
                        </div>
                        <p style="margin:0; font-size:14px; color:var(--on-surface-variant);">A new complaint has been filed regarding scheduled booking services and requires clinical manager escalation.</p>
                        <div style="display:flex; align-items:center; gap:12px; font-size:12px; color:var(--outline); margin-top:4px;">
                            <span style="font-weight:500; color:var(--on-surface);">Booking ID: <span style="color:var(--tertiary); font-weight:600;">BK1024</span></span>
                            <span>•</span>
                            <span>28 Sep 2026, 09:58 AM (15 mins ago)</span>
                        </div>
                    </div>
                </div>
                <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                    <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="markAsRead('notif-card-2')">Mark as Read</button>
                    <button class="btn btn-outline" style="color:var(--primary);" onclick="openDetailsModal('NOT-REC-1025', 'New Complaint Submitted', 'Complaint', 'UNREAD', 'Booking incident raised regarding timeliness and schedule mismatch reported by the family guardian.', 'BK1024', 'Complaint', 'Booking BK1024', '28 Sep 2026', '09:58 AM')">View Details</button>
                </div>
            </div>

            <!-- Card 3 (Unread - Care Report) -->
            <div class="received-item accent-success" data-status="UNREAD" data-type="Care Report" id="notif-card-3">
                <div style="display:flex; gap:16px; align-items:flex-start;">
                    <div class="icon-wrapper-sm text-success" style="background:rgba(2,87,71,0.15); width:44px; height:44px; flex-shrink:0;">
                        <span class="material-symbols-outlined" style="font-size:24px;">assignment_turned_in</span>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:4px;">
                        <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                            <span style="font-size:16px; font-weight:700; color:var(--on-surface);">Care Report Submitted</span>
                            <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600;">Care Report</span>
                            <span class="pulse-success"></span>
                        </div>
                        <p style="margin:0; font-size:14px; color:var(--on-surface-variant);">A caregiver has submitted a Daily Care Report for a completed service shift.</p>
                        <div style="display:flex; align-items:center; gap:12px; font-size:12px; color:var(--outline); margin-top:4px;">
                            <span style="font-weight:500; color:var(--on-surface);">Booking ID: <span style="color:var(--status-success); font-weight:600;">BK1028</span></span>
                            <span>•</span>
                            <span>28 Sep 2026, 09:12 AM (1 hour ago)</span>
                        </div>
                    </div>
                </div>
                <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                    <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="markAsRead('notif-card-3')">Mark as Read</button>
                    <button class="btn btn-outline" style="color:var(--primary);" onclick="openDetailsModal('NOT-REC-1028', 'Care Report Submitted', 'Care Report', 'UNREAD', 'Caregiver shift completion acknowledged. Patient medical notes remain zero-knowledge encrypted under HIPAA/GDPR clinical privacy regulations and are omitted from administrative review.', 'BK1028', 'Care Report', 'Booking BK1028', '28 Sep 2026', '09:12 AM', true)">View Details</button>
                </div>
            </div>

            <!-- Card 4 (Read - Booking) -->
            <div class="received-item" data-status="READ" data-type="Booking" id="notif-card-4">
                <div style="display:flex; gap:16px; align-items:flex-start;">
                    <div class="icon-wrapper-sm text-secondary" style="background:rgba(55,92,168,0.15); width:44px; height:44px; flex-shrink:0;">
                        <span class="material-symbols-outlined" style="font-size:24px;">event_available</span>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:4px;">
                        <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                            <span style="font-size:16px; font-weight:600; color:var(--on-surface);">New Booking Created</span>
                            <span class="badge-tag" style="background:var(--surface-container-high); color:var(--on-secondary-container); font-weight:600;">Booking</span>
                            <span class="badge-tag" style="background:var(--surface-container); color:var(--outline); font-weight:600; border-radius:999px;">Read</span>
                        </div>
                        <p style="margin:0; font-size:14px; color:var(--on-surface-variant);">A new caregiver booking has been initiated and locked by family guardian Sithmini Rathnayake.</p>
                        <div style="display:flex; align-items:center; gap:12px; font-size:12px; color:var(--outline); margin-top:4px;">
                            <span style="font-weight:500; color:var(--on-surface);">Booking ID: <span style="color:var(--secondary); font-weight:600;">BK1032</span></span>
                            <span>•</span>
                            <span>27 Sep 2026, 04:30 PM</span>
                        </div>
                    </div>
                </div>
                <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                    <button class="btn btn-outline" onclick="openDetailsModal('NOT-REC-1019', 'New Booking Created', 'Booking', 'READ', 'A 72-hour elderly care package has been scheduled and authorized through escrow settlement.', 'BK1032', 'Booking', 'Booking BK1032', '27 Sep 2026', '04:30 PM')">View Details</button>
                </div>
            </div>
            
            <!-- Empty State for Filters -->
            <div id="receivedEmptyState" style="display:none; padding:48px; text-align:center; flex-direction:column; align-items:center; justify-content:center; gap:12px; background:var(--surface-container-lowest); border-radius:16px; border:1px solid var(--border-subtle);">
                <div class="icon-wrapper-sm text-outline" style="background:var(--surface-container-low); width:48px; height:48px; border-radius:50%;">
                    <span class="material-symbols-outlined" style="font-size:28px;">filter_alt_off</span>
                </div>
                <h3 style="font-size:18px; font-weight:600; margin:0;">No matching notifications</h3>
                <p style="margin:0; font-size:14px; color:var(--on-surface-variant); max-width:400px;">No notification records matched your filter selections. Try resetting the filters or modifying search keywords.</p>
                <button class="btn btn-primary" style="margin-top:8px;" onclick="resetReceivedFilters()">Clear Filters</button>
            </div>
        </div>
    </div>


    <!-- ========================================== -->
    <!-- TAB CONTENT: SENT NOTIFICATIONS (HIDDEN BY DEFAULT) -->
    <!-- ========================================== -->
    <div id="viewSent" style="display:none; flex-direction:column; gap:24px;">
        
        <!-- Header Banner & Action Bar -->
        <div style="padding:24px; border-radius:16px; background:var(--surface-container-lowest); box-shadow:0 1px 2px rgba(0,0,0,0.05); border:1px solid var(--border-subtle); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px;">
            <div>
                <h2 style="font-size:18px; font-weight:600; margin:0;">Sent Administrator Communications</h2>
                <p style="margin:4px 0 0 0; font-size:14px; color:var(--on-surface-variant);">Historical audit trail of all automated alerts and direct notifications dispatched to platform actors.</p>
            </div>
            <button class="btn btn-primary" onclick="openCreateModal()" style="display:flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined icon-sm">add</span> Create Notification
            </button>
        </div>

        <!-- Filters Section -->
        <div style="padding:20px; border-radius:16px; background:var(--surface-container-lowest); border:1px solid var(--border-subtle); display:flex; flex-direction:column; gap:16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
            <div style="display:flex; flex-wrap:wrap; align-items:center; gap:12px;">
                <div class="select-wrapper" style="flex:2; min-width:200px;">
                    <span class="material-symbols-outlined icon-sm text-outline" style="left:12px; right:auto;">search</span>
                    <input type="text" id="filterSentSearch" placeholder="Search sent by title, recipient, ID..." style="width:100%; padding:10px 14px 10px 36px; border-radius:12px; background:var(--surface-container-low); border:none; outline:none;">
                </div>
                <div class="select-wrapper" style="flex:1; min-width:140px;">
                    <select id="filterSentRole" style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:none; outline:none; appearance:none;">
                        <option value="ALL">All Roles</option>
                        <option value="Caregiver">Caregiver</option>
                        <option value="Family Member">Family Member</option>
                        <option value="All Users">All Users</option>
                    </select>
                    <span class="material-symbols-outlined icon-sm text-outline">arrow_drop_down</span>
                </div>
                <div class="select-wrapper" style="flex:1; min-width:140px;">
                    <select id="filterSentType" style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:none; outline:none; appearance:none;">
                        <option value="ALL">All Types</option>
                        <option value="Booking">Booking</option>
                        <option value="Verification">Caregiver Verification</option>
                        <option value="Payment">Payment</option>
                        <option value="Complaint">Complaint</option>
                        <option value="System">System</option>
                    </select>
                    <span class="material-symbols-outlined icon-sm text-outline">arrow_drop_down</span>
                </div>
                <div class="select-wrapper" style="flex:1; min-width:140px;">
                    <select id="filterSentDelivery" style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:none; outline:none; appearance:none;">
                        <option value="ALL">All Delivery</option>
                        <option value="In-App">In-App Only</option>
                        <option value="Email">Email Only</option>
                        <option value="In-App + Email">In-App + Email</option>
                    </select>
                    <span class="material-symbols-outlined icon-sm text-outline">arrow_drop_down</span>
                </div>
                <div style="display:flex; align-items:center; gap:8px;">
                    <button class="btn btn-primary" onclick="applySentFilters()">Filter</button>
                    <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="resetSentFilters()">Reset</button>
                </div>
            </div>
        </div>

        <!-- Sent Table Card -->
        <div style="background:var(--surface-container-lowest); border-radius:16px; border:1px solid var(--border-subtle); overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
            <div style="overflow-x:auto;">
                <table class="table-minimal" style="width:100%; text-align:left; border-collapse:collapse;">
                    <thead style="background:var(--surface-container-low); font-size:12px; color:var(--outline); text-transform:uppercase; letter-spacing:0.05em; border-bottom:1px solid var(--border-subtle);">
                        <tr>
                            <th style="padding:14px 16px; font-weight:600;">Notification ID</th>
                            <th style="padding:14px 16px; font-weight:600;">Title</th>
                            <th style="padding:14px 16px; font-weight:600;">Recipient</th>
                            <th style="padding:14px 16px; font-weight:600;">Role</th>
                            <th style="padding:14px 16px; font-weight:600;">Type</th>
                            <th style="padding:14px 16px; font-weight:600;">Delivery Method</th>
                            <th style="padding:14px 16px; font-weight:600;">Sent Date</th>
                            <th style="padding:14px 16px; font-weight:600;">Status</th>
                            <th style="padding:14px 16px; font-weight:600; text-align:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="sentTableBody" style="font-size:14px;">
                        <!-- Row 1 -->
                        <tr class="sent-row" data-delivery="In-App + Email" data-role="Family Member" data-type="Booking" style="border-bottom:1px solid var(--border-subtle);">
                            <td style="padding:16px; font-family:monospace; color:var(--primary); font-weight:500;">NOT-SNT-0891</td>
                            <td style="padding:16px; font-weight:600;">Shift Confirmed: BK-2026-00125</td>
                            <td style="padding:16px;">Sithmini Rathnayake</td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:var(--surface-container-high); color:var(--on-surface);">Family Member</span></td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:rgba(55,92,168,0.1); color:var(--secondary); font-weight:600;">Booking</span></td>
                            <td style="padding:16px;">
                                <div style="display:flex; align-items:center; gap:6px; color:var(--on-surface-variant); font-size:13px;">
                                    <span class="material-symbols-outlined icon-sm text-outline">devices</span> In-App + Email
                                </div>
                            </td>
                            <td style="padding:16px; color:var(--on-surface-variant); font-size:12px;">28 Sep 2026, 09:30 AM</td>
                            <td style="padding:16px;">
                                <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                                    <span class="dot-sm bg-success"></span> Sent
                                </span>
                            </td>
                            <td style="padding:16px; text-align:right;">
                                <button class="btn btn-outline" style="padding:6px 12px; font-size:12px;" onclick="openSentModal('NOT-SNT-0891', 'Shift Confirmed: BK-2026-00125', 'Sithmini Rathnayake (Family Member)', 'Your requested home nurse care appointment for booking BK-2026-00125 has been matched and confirmed by certified caregiver Sandun R.', 'In-App + Email', 'Delivered (SMTP Gateway Ack: #2841)', '28 Sep 2026, 09:30 AM')">View Details</button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="sent-row" data-delivery="Email" data-role="Caregiver" data-type="Verification" style="border-bottom:1px solid var(--border-subtle);">
                            <td style="padding:16px; font-family:monospace; color:var(--primary); font-weight:500;">NOT-SNT-0890</td>
                            <td style="padding:16px; font-weight:600;">Document Verification Approved</td>
                            <td style="padding:16px;">Sarah Wijesinghe</td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary);">Caregiver</span></td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary); font-weight:600;">Verification</span></td>
                            <td style="padding:16px;">
                                <div style="display:flex; align-items:center; gap:6px; color:var(--on-surface-variant); font-size:13px;">
                                    <span class="material-symbols-outlined icon-sm text-outline">mail</span> Email
                                </div>
                            </td>
                            <td style="padding:16px; color:var(--on-surface-variant); font-size:12px;">28 Sep 2026, 08:45 AM</td>
                            <td style="padding:16px;">
                                <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                                    <span class="dot-sm bg-success"></span> Sent
                                </span>
                            </td>
                            <td style="padding:16px; text-align:right;">
                                <button class="btn btn-outline" style="padding:6px 12px; font-size:12px;" onclick="openSentModal('NOT-SNT-0890', 'Document Verification Approved', 'Sarah Wijesinghe (Caregiver)', 'Congratulations. Your SLMC certification and National ID documents have been approved by SafeHands Medical Verification Board.', 'Email', 'Delivered (sarah.w@carenet.lk)', '28 Sep 2026, 08:45 AM')">View Details</button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="sent-row" data-delivery="In-App + Email" data-role="Caregiver" data-type="Payment" style="border-bottom:1px solid var(--border-subtle);">
                            <td style="padding:16px; font-family:monospace; color:var(--primary); font-weight:500;">NOT-SNT-0889</td>
                            <td style="padding:16px; font-weight:600;">Simulated Escrow Released</td>
                            <td style="padding:16px;">Kumara Pathirana</td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary);">Caregiver</span></td>
                            <td style="padding:16px;"><span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600;">Payment</span></td>
                            <td style="padding:16px;">
                                <div style="display:flex; align-items:center; gap:6px; color:var(--on-surface-variant); font-size:13px;">
                                    <span class="material-symbols-outlined icon-sm text-outline">devices</span> In-App + Email
                                </div>
                            </td>
                            <td style="padding:16px; color:var(--on-surface-variant); font-size:12px;">27 Sep 2026, 02:20 PM</td>
                            <td style="padding:16px;">
                                <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                                    <span class="dot-sm bg-success"></span> Sent
                                </span>
                            </td>
                            <td style="padding:16px; text-align:right;">
                                <button class="btn btn-outline" style="padding:6px 12px; font-size:12px;" onclick="openSentModal('NOT-SNT-0889', 'Simulated Escrow Released', 'Kumara Pathirana (Caregiver)', 'Payout of LKR 14,500.00 for Booking BK1025 has been disbursed to Commercial Bank account ending in ****4910.', 'In-App + Email', 'Delivered &amp; Push Confirmed', '27 Sep 2026, 02:20 PM')">View Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="padding:16px 24px; background:var(--surface-container-low); display:flex; align-items:center; justify-content:space-between; font-size:12px; color:var(--outline); border-top:1px solid var(--border-subtle);">
                <span>Showing 3 of 1,382 sent notifications</span>
                <div style="display:flex; align-items:center; gap:4px;">
                    <button class="btn btn-neutral" style="padding:4px 10px; font-size:12px;">1</button>
                    <button class="btn-icon-plain" style="padding:4px 10px; font-size:12px;">2</button>
                    <button class="btn-icon-plain" style="padding:4px 10px; font-size:12px;">3</button>
                    <span style="padding:0 8px;">...</span>
                    <button class="btn-icon-plain" style="padding:4px 10px; font-size:12px;">231</button>
                </div>
            </div>
        </div>
    </div>


    <!-- ========================================================== -->
    <!-- MODAL 1: RECEIVED NOTIFICATION DETAILS MODAL -->
    <!-- ========================================================== -->
    <div class="modal-overlay" id="modalDetails" style="display:none; align-items:center; justify-content:center; z-index:999;">
        <div class="modal-content" style="max-width:600px; width:100%; border-radius:16px; padding:24px; max-height:90vh; overflow-y:auto; border:1px solid var(--border-subtle);">
            <!-- Header -->
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:24px;">
                <div style="display:flex; flex-direction:column; gap:4px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <span style="font-family:monospace; font-weight:600; color:var(--primary); font-size:14px;" id="modalNotifId">#NOT-REC-1048</span>
                        <span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary); font-weight:600;" id="modalTypeBadge">Caregiver Verification</span>
                        <span class="badge-tag" style="background:var(--error-container); color:var(--error); font-weight:600;" id="modalStatusBadge">Unread</span>
                    </div>
                    <h3 style="font-size:20px; font-weight:700; margin:0;" id="modalTitle">Notification Title</h3>
                </div>
                <button class="btn-icon-plain" onclick="closeDetailsModal()"><span class="material-symbols-outlined">close</span></button>
            </div>
            
            <!-- Message Box -->
            <div style="padding:16px; border-radius:12px; background:var(--surface-container-low); border:1px solid var(--border-subtle); margin-bottom:16px;">
                <p style="margin:0; font-size:14px; line-height:1.6;" id="modalMessageContent">Message description goes here.</p>
            </div>
            
            <!-- Privacy Callout (conditional) -->
            <div id="modalPrivacyCallout" style="display:none; padding:16px; border-radius:12px; background:var(--surface-container-high); border:1px solid rgba(2,87,71,0.3); flex-direction:column; gap:8px; margin-bottom:16px;">
                <div style="display:flex; align-items:center; gap:8px; color:var(--status-success); font-weight:600; font-size:14px;">
                    <span class="material-symbols-outlined icon-sm">verified_user</span> Zero-Knowledge Clinical Privacy Protected
                </div>
                <p style="margin:0; font-size:12px; color:var(--on-surface-variant); line-height:1.5;">
                    Under strict patient confidentiality guidelines, patient clinical observations, medications, meals, and vitals remain encrypted under patient jurisdiction and are omitted from administrative review.
                </p>
            </div>

            <!-- Meta Grid -->
            <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:16px; padding:16px; border-radius:12px; background:var(--surface-muted); border:1px solid var(--border-subtle); margin-bottom:16px;">
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Date</span>
                    <span style="font-weight:600; font-size:14px; margin-top:2px;" id="modalMetaDate">28 Sep 2026</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Time</span>
                    <span style="font-weight:600; font-size:14px; margin-top:2px;" id="modalMetaTime">10:14 AM</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Channel</span>
                    <span style="font-weight:600; font-size:14px; margin-top:2px;">SafeHands Event</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Jurisdiction</span>
                    <span style="font-weight:600; font-size:14px; margin-top:2px;">Admin Ops</span>
                </div>
            </div>

            <!-- Related Record -->
            <div style="padding:16px; border-radius:12px; background:var(--surface-container-lowest); border:1px solid var(--border-subtle); display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div class="icon-wrapper-sm text-primary" style="background:var(--surface-container-high);">
                        <span class="material-symbols-outlined icon-sm">link</span>
                    </div>
                    <div style="display:flex; flex-direction:column;">
                        <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Associated Platform Record</span>
                        <span style="font-weight:600; font-size:14px;" id="modalRelatedTarget">Caregiver: Sandun (CG1024)</span>
                    </div>
                </div>
                <button class="btn btn-primary" style="padding:8px 12px; font-size:12px;" onclick="simulateRecordNavigation()">View Record</button>
            </div>

            <div style="display:flex; align-items:center; justify-content:flex-end; gap:12px;">
                <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="closeDetailsModal()">Close</button>
                <button class="btn btn-primary" id="modalMarkReadActionBtn" onclick="markCurrentModalAsRead()">Mark as Read</button>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MODAL 2: CREATE NOTIFICATION MODAL -->
    <!-- ========================================================== -->
    <div class="modal-overlay" id="modalCreate" style="display:none; align-items:center; justify-content:center; z-index:999;">
        <div class="modal-content" style="max-width:640px; width:100%; border-radius:16px; padding:32px; max-height:90vh; overflow-y:auto; border:1px solid var(--border-subtle);">
            
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:24px;">
                <div>
                    <h3 style="font-size:24px; font-weight:700; margin:0;">Create New Notification</h3>
                    <p style="margin:4px 0 0 0; font-size:14px; color:var(--on-surface-variant);">Send high-priority alerts, operational updates, or direct communications.</p>
                </div>
                <button class="btn-icon-plain" onclick="closeCreateModal()"><span class="material-symbols-outlined">close</span></button>
            </div>

            <form style="display:flex; flex-direction:column; gap:20px;" onsubmit="event.preventDefault(); showSendConfirmation();">
                <!-- Type -->
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-size:14px; font-weight:600; color:var(--on-surface);">Notification Type</label>
                    <select id="formNotifType" required style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:1px solid var(--border-subtle); outline:none;">
                        <option value="General Notice">General Notice</option>
                        <option value="Booking">Booking Alert</option>
                        <option value="Caregiver Verification">Caregiver Verification</option>
                        <option value="Payment">Payment Notification</option>
                        <option value="Complaint">Complaint Resolution</option>
                        <option value="System">System Advisory</option>
                    </select>
                </div>

                <!-- Audience -->
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label style="font-size:14px; font-weight:600; color:var(--on-surface);">Recipient Audience</label>
                    <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:10px;">
                        <label class="create-scope-label selected" id="scope1">
                            <input type="radio" name="recipientScope" value="Specific User" checked onchange="toggleScopeUI(1, true)">
                            <span class="material-symbols-outlined icon-sm">person</span>
                            <span style="font-size:12px; font-weight:600;">Specific User</span>
                        </label>
                        <label class="create-scope-label" id="scope2">
                            <input type="radio" name="recipientScope" value="All Caregivers" onchange="toggleScopeUI(2, false)">
                            <span class="material-symbols-outlined icon-sm">medical_services</span>
                            <span style="font-size:12px; font-weight:600;">All Caregivers</span>
                        </label>
                        <label class="create-scope-label" id="scope3">
                            <input type="radio" name="recipientScope" value="All Family Members" onchange="toggleScopeUI(3, false)">
                            <span class="material-symbols-outlined icon-sm">groups</span>
                            <span style="font-size:12px; font-weight:600;">Family Members</span>
                        </label>
                        <label class="create-scope-label" id="scope4">
                            <input type="radio" name="recipientScope" value="All Users" onchange="toggleScopeUI(4, false)">
                            <span class="material-symbols-outlined icon-sm">public</span>
                            <span style="font-size:12px; font-weight:600;">All Users</span>
                        </label>
                    </div>
                    
                    <div class="specific-lookup-box show" id="specificUserLookupBox">
                        <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Target User Profile</span>
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:10px; border-radius:8px; background:var(--surface-container-lowest); border:1px solid var(--border-subtle);">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:32px; height:32px; border-radius:50%; background:rgba(0,74,198,0.1); color:var(--primary); display:flex; align-items:center; justify-content:center; font-weight:700; font-size:13px;">SW</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600; font-size:14px;">Sarah Wijesinghe</span>
                                    <span style="font-size:11px; color:var(--outline);">ID: CG-2026-0042 • sarah.w@carenet.lk • Caregiver</span>
                                </div>
                            </div>
                            <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600;">Active</span>
                        </div>
                    </div>
                </div>

                <!-- Delivery -->
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label style="font-size:14px; font-weight:600; color:var(--on-surface);">Delivery Channel</label>
                    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                        <label class="create-method-label" id="method1">
                            <input type="radio" name="deliveryMethod" value="In-App" onchange="toggleMethodUI(1)">
                            <span class="material-symbols-outlined icon-sm">notifications</span> In-App
                        </label>
                        <label class="create-method-label" id="method2">
                            <input type="radio" name="deliveryMethod" value="Email" onchange="toggleMethodUI(2)">
                            <span class="material-symbols-outlined icon-sm">mail</span> Email
                        </label>
                        <label class="create-method-label selected" id="method3">
                            <input type="radio" name="deliveryMethod" value="In-App + Email" checked onchange="toggleMethodUI(3)">
                            <span class="material-symbols-outlined icon-sm">devices</span> In-App + Email
                        </label>
                    </div>
                </div>

                <!-- Title & Body -->
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-size:14px; font-weight:600; color:var(--on-surface);">Notification Title</label>
                    <input type="text" id="formNotifTitle" required placeholder="e.g. Schedule Verification Acknowledged" style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:1px solid var(--border-subtle); outline:none;">
                </div>
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-size:14px; font-weight:600; color:var(--on-surface);">Message Body</label>
                    <textarea id="formNotifMessage" required rows="3" placeholder="Provide precise administrative guidance or instruction..." style="width:100%; padding:10px 14px; border-radius:12px; background:var(--surface-container-low); border:1px solid var(--border-subtle); outline:none; resize:none;"></textarea>
                </div>

                <div style="display:flex; align-items:center; justify-content:flex-end; gap:12px; margin-top:8px;">
                    <button type="button" class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="closeCreateModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined icon-sm">send</span> Send Notification
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MODAL 3: CONFIRM SEND DIALOG -->
    <!-- ========================================================== -->
    <div class="modal-overlay" id="modalConfirmSend" style="display:none; align-items:center; justify-content:center; z-index:1000;">
        <div class="modal-content" style="max-width:400px; width:100%; border-radius:16px; padding:24px; text-align:center; display:flex; flex-direction:column; gap:16px; border:1px solid var(--border-subtle);">
            <div class="icon-wrapper-sm text-primary" style="background:rgba(0,74,198,0.1); width:56px; height:56px; margin:0 auto; border-radius:16px;">
                <span class="material-symbols-outlined" style="font-size:32px;">send</span>
            </div>
            <h4 style="font-size:18px; font-weight:700; margin:0;">Confirm Notification Dispatch</h4>
            <p style="margin:0; font-size:14px; color:var(--on-surface-variant);">Are you sure you want to broadcast this notification? This operation will trigger email and real-time push alerts to recipients.</p>
            <div style="display:flex; justify-content:center; gap:12px; margin-top:8px;">
                <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="closeConfirmModal()">Cancel</button>
                <button class="btn btn-primary" onclick="executeSendNotification()">Confirm &amp; Send</button>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MODAL 4: SENT NOTIFICATION DETAILS MODAL -->
    <!-- ========================================================== -->
    <div class="modal-overlay" id="modalSentDetails" style="display:none; align-items:center; justify-content:center; z-index:999;">
        <div class="modal-content" style="max-width:500px; width:100%; border-radius:16px; padding:24px; border:1px solid var(--border-subtle);">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:20px;">
                <div style="display:flex; flex-direction:column;">
                    <span style="font-family:monospace; font-weight:600; color:var(--primary); font-size:14px;" id="sentDetailId">NOT-SNT-0891</span>
                    <h3 style="font-size:18px; font-weight:700; margin:4px 0 0 0;" id="sentDetailTitle">Shift Confirmed</h3>
                </div>
                <button class="btn-icon-plain" onclick="closeSentModal()"><span class="material-symbols-outlined">close</span></button>
            </div>
            
            <div style="padding:16px; border-radius:12px; background:var(--surface-container-low); border:1px solid var(--border-subtle); margin-bottom:16px;">
                <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600; display:block; margin-bottom:4px;">Delivered Message</span>
                <p style="margin:0; font-size:14px; color:var(--on-surface); line-height:1.5;" id="sentDetailBody">Body...</p>
            </div>
            
            <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; padding:14px; border-radius:12px; background:var(--surface-muted); border:1px solid var(--border-subtle); margin-bottom:24px;">
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Recipient Target</span>
                    <span style="font-weight:600; font-size:14px;" id="sentDetailRecipient">User</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Delivery Method</span>
                    <span style="font-weight:600; font-size:14px;" id="sentDetailMethod">In-App + Email</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Dispatched At</span>
                    <span style="font-weight:600; font-size:14px;" id="sentDetailDate">Date</span>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <span style="font-size:11px; text-transform:uppercase; color:var(--outline); font-weight:600;">Gateway Audit</span>
                    <span style="font-weight:600; font-size:14px; color:var(--status-success);" id="sentDetailGateway">Delivered</span>
                </div>
            </div>
            
            <div style="display:flex; justify-content:flex-end;">
                <button class="btn btn-neutral" style="background:var(--surface-container-high); border:none;" onclick="closeSentModal()">Dismiss</button>
            </div>
        </div>
    </div>

</div>

<!-- Vanilla JS Application Logic -->
<script>
  let unreadCount = 3;
  let currentCardIdBeingViewed = null;

  function showToast(message) {
    const toast = document.getElementById('toastNotification');
    const toastText = document.getElementById('toastText');
    if (!toast || !toastText) return;
    toastText.innerText = message;
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3200);
  }

  function switchMainTab(tabName) {
    const receivedTab = document.getElementById('viewReceived');
    const sentTab = document.getElementById('viewSent');
    const btnReceived = document.getElementById('tabBtnReceived');
    const btnSent = document.getElementById('tabBtnSent');

    if (tabName === 'received') {
      receivedTab.style.display = 'flex';
      sentTab.style.display = 'none';
      btnReceived.classList.add('active');
      btnSent.classList.remove('active');
    } else {
      receivedTab.style.display = 'none';
      sentTab.style.display = 'flex';
      btnSent.classList.add('active');
      btnReceived.classList.remove('active');
    }
  }

  function markAsRead(cardId) {
    const card = document.getElementById(cardId);
    if (!card || card.getAttribute('data-status') === 'READ') return;

    card.setAttribute('data-status', 'READ');
    
    // Remove the left border accent class
    card.classList.remove('accent-primary', 'accent-warning', 'accent-success');
    
    // Remove pulsing unread dot
    const pulseDot = card.querySelector('.pulse-primary, .pulse-warning, .pulse-success');
    if (pulseDot) pulseDot.remove();

    // Remove Mark as Read button
    const markReadBtn = Array.from(card.querySelectorAll('button')).find(btn => btn.innerText.includes('Mark as Read'));
    if (markReadBtn) markReadBtn.remove();

    // Update unread badge inside the card header
    const unreadBadge = card.querySelector('.badge-tag:last-of-type');
    if (unreadBadge && unreadBadge.innerText.includes('Unread')) {
        // Change to Read badge (this logic is simplistic as the structure could vary)
    }

    if (unreadCount > 0) {
      unreadCount--;
      updateUnreadCounters();
    }
    showToast('Notification marked as read');
  }

  function updateUnreadCounters() {
    const badge = document.getElementById('receivedBadgeCounter');
    const metricUnread = document.getElementById('metricUnreadCounter');
    const metricRead = document.getElementById('metricReadCounter');
    const sidebarBadge = document.getElementById('sidebarBadge');
    
    if (badge) badge.innerText = unreadCount;
    if (metricUnread) metricUnread.innerText = unreadCount;
    if (metricRead) metricRead.innerText = (42 - unreadCount);
    if (sidebarBadge) {
      sidebarBadge.innerText = unreadCount;
      if (unreadCount === 0) sidebarBadge.style.display = 'none';
    }
  }

  function openDetailsModal(id, title, type, status, message, relatedId, relatedType, targetName, date, time, isStrictPrivacy = false) {
    currentCardIdBeingViewed = id;
    document.getElementById('modalNotifId').innerText = '#' + id;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalTypeBadge').innerText = type;
    document.getElementById('modalMessageContent').innerText = message;
    document.getElementById('modalMetaDate').innerText = date;
    document.getElementById('modalMetaTime').innerText = time;
    document.getElementById('modalRelatedTarget').innerText = `${relatedType}: ${targetName} (${relatedId})`;

    const privacyBox = document.getElementById('modalPrivacyCallout');
    if (isStrictPrivacy) {
      privacyBox.style.display = 'flex';
    } else {
      privacyBox.style.display = 'none';
    }

    const modalStatusBadge = document.getElementById('modalStatusBadge');
    const markReadActionBtn = document.getElementById('modalMarkReadActionBtn');
    
    const cardElement = Array.from(document.querySelectorAll('.received-item')).find(el => el.innerHTML.includes(id));
    const isUnread = cardElement ? cardElement.getAttribute('data-status') === 'UNREAD' : (status === 'UNREAD');

    if (isUnread) {
      modalStatusBadge.innerText = 'Unread';
      modalStatusBadge.style.background = 'var(--error-container)';
      modalStatusBadge.style.color = 'var(--error)';
      markReadActionBtn.style.display = 'flex';
    } else {
      modalStatusBadge.innerText = 'Read';
      modalStatusBadge.style.background = 'var(--surface-container-high)';
      modalStatusBadge.style.color = 'var(--outline)';
      markReadActionBtn.style.display = 'none';
    }

    document.getElementById('modalDetails').style.display = 'flex';
  }

  function closeDetailsModal() {
    document.getElementById('modalDetails').style.display = 'none';
  }

  function markCurrentModalAsRead() {
    if (currentCardIdBeingViewed) {
      const cards = document.querySelectorAll('.received-item');
      cards.forEach(card => {
        if (card.innerHTML.includes(currentCardIdBeingViewed)) {
          markAsRead(card.id);
        }
      });
    }
    closeDetailsModal();
  }

  function simulateRecordNavigation() {
    showToast('Redirecting to secure clinical platform record...');
    closeDetailsModal();
  }

  // CREATE NOTIFICATION MODAL LOGIC
  function openCreateModal() {
    document.getElementById('modalCreate').style.display = 'flex';
  }
  function closeCreateModal() {
    document.getElementById('modalCreate').style.display = 'none';
  }

  function toggleScopeUI(selectedId, isSpecific) {
    for (let i = 1; i <= 4; i++) {
        document.getElementById('scope' + i).classList.remove('selected');
    }
    document.getElementById('scope' + selectedId).classList.add('selected');
    
    const lookup = document.getElementById('specificUserLookupBox');
    if (isSpecific) {
      lookup.classList.add('show');
    } else {
      lookup.classList.remove('show');
    }
  }

  function toggleMethodUI(selectedId) {
    for (let i = 1; i <= 3; i++) {
        document.getElementById('method' + i).classList.remove('selected');
    }
    document.getElementById('method' + selectedId).classList.add('selected');
  }

  function showSendConfirmation() {
    document.getElementById('modalConfirmSend').style.display = 'flex';
  }
  function closeConfirmModal() {
    document.getElementById('modalConfirmSend').style.display = 'none';
  }

  function executeSendNotification() {
    closeConfirmModal();
    closeCreateModal();

    const title = document.getElementById('formNotifTitle').value || 'System Advisory';
    const type = document.getElementById('formNotifType').value || 'General Notice';
    const body = document.getElementById('formNotifMessage').value || 'Administrative communication dispatched.';
    
    // Add dynamically to Sent Table top
    const tableBody = document.getElementById('sentTableBody');
    if (tableBody) {
      const newRow = document.createElement('tr');
      newRow.className = "sent-row";
      newRow.setAttribute('data-role', 'Caregiver');
      newRow.setAttribute('data-type', type);
      newRow.setAttribute('data-delivery', 'In-App + Email');
      newRow.style.borderBottom = "1px solid var(--border-subtle)";
      newRow.innerHTML = `
        <td style="padding:16px; font-family:monospace; color:var(--primary); font-weight:500;">NOT-SNT-0892</td>
        <td style="padding:16px; font-weight:600;">${title}</td>
        <td style="padding:16px;">Sarah Wijesinghe</td>
        <td style="padding:16px;"><span class="badge-tag" style="background:rgba(0,74,198,0.1); color:var(--primary);">Caregiver</span></td>
        <td style="padding:16px;"><span class="badge-tag" style="background:rgba(55,92,168,0.1); color:var(--secondary); font-weight:600;">${type}</span></td>
        <td style="padding:16px;">
            <div style="display:flex; align-items:center; gap:6px; color:var(--on-surface-variant); font-size:13px;">
                <span class="material-symbols-outlined icon-sm text-outline">devices</span> In-App + Email
            </div>
        </td>
        <td style="padding:16px; color:var(--on-surface-variant); font-size:12px;">Just now</td>
        <td style="padding:16px;">
            <span class="badge-tag" style="background:rgba(2,87,71,0.15); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                <span class="dot-sm bg-success"></span> Sent
            </span>
        </td>
        <td style="padding:16px; text-align:right;">
            <button class="btn btn-outline" style="padding:6px 12px; font-size:12px;" onclick="openSentModal('NOT-SNT-0892', '${title.replace(/'/g, "\\'")}', 'Sarah Wijesinghe (Caregiver)', '${body.replace(/'/g, "\\'")}', 'In-App + Email', 'Dispatched Just Now via SafeHands API Gateway', 'Just Now')">View Details</button>
        </td>
      `;
      tableBody.prepend(newRow);
    }

    showToast('Notification dispatched successfully');
    switchMainTab('sent');
  }

  function openSentModal(id, title, recipient, body, method, gateway, date) {
    document.getElementById('sentDetailId').innerText = id;
    document.getElementById('sentDetailTitle').innerText = title;
    document.getElementById('sentDetailRecipient').innerText = recipient;
    document.getElementById('sentDetailBody').innerText = body;
    document.getElementById('sentDetailMethod').innerText = method;
    document.getElementById('sentDetailGateway').innerText = gateway;
    document.getElementById('sentDetailDate').innerText = date;
    document.getElementById('modalSentDetails').style.display = 'flex';
  }

  function closeSentModal() {
    document.getElementById('modalSentDetails').style.display = 'none';
  }

  // FILTERS
  function applyReceivedFilters() {
    const searchVal = document.getElementById('filterReceivedSearch').value.toLowerCase();
    const typeVal = document.getElementById('filterReceivedType').value;
    const statusVal = document.getElementById('filterReceivedStatus').value;

    const items = document.querySelectorAll('.received-item');
    let visibleCount = 0;

    items.forEach(item => {
      const itemType = item.getAttribute('data-type');
      const itemStatus = item.getAttribute('data-status');
      const text = item.innerText.toLowerCase();

      const matchesSearch = !searchVal || text.includes(searchVal);
      const matchesType = (typeVal === 'ALL') || (itemType === typeVal);
      const matchesStatus = (statusVal === 'ALL') || (itemStatus === statusVal);

      if (matchesSearch && matchesType && matchesStatus) {
        item.style.display = 'flex';
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });

    const emptyState = document.getElementById('receivedEmptyState');
    if (visibleCount === 0) {
      emptyState.style.display = 'flex';
    } else {
      emptyState.style.display = 'none';
    }
  }

  function resetReceivedFilters() {
    document.getElementById('filterReceivedSearch').value = '';
    document.getElementById('filterReceivedType').value = 'ALL';
    document.getElementById('filterReceivedStatus').value = 'ALL';
    applyReceivedFilters();
  }

  function applySentFilters() {
    const searchVal = document.getElementById('filterSentSearch').value.toLowerCase();
    const roleVal = document.getElementById('filterSentRole').value;
    const typeVal = document.getElementById('filterSentType').value;
    const deliveryVal = document.getElementById('filterSentDelivery').value;

    const rows = document.querySelectorAll('.sent-row');
    rows.forEach(row => {
      const rowRole = row.getAttribute('data-role');
      const rowType = row.getAttribute('data-type');
      const rowDelivery = row.getAttribute('data-delivery');
      const text = row.innerText.toLowerCase();

      const matchesSearch = !searchVal || text.includes(searchVal);
      const matchesRole = (roleVal === 'ALL') || (rowRole === roleVal);
      const matchesType = (typeVal === 'ALL') || (rowType === typeVal);
      const matchesDelivery = (deliveryVal === 'ALL') || (rowDelivery === deliveryVal);

      if (matchesSearch && matchesRole && matchesType && matchesDelivery) {
        row.style.display = 'table-row';
      } else {
        row.style.display = 'none';
      }
    });
  }

  function resetSentFilters() {
    document.getElementById('filterSentSearch').value = '';
    document.getElementById('filterSentRole').value = 'ALL';
    document.getElementById('filterSentType').value = 'ALL';
    document.getElementById('filterSentDelivery').value = 'ALL';
    applySentFilters();
  }
</script>
