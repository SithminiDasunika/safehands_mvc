<div class="dashboard-container">

    <!-- Suspension Modal -->
    <div class="modal-overlay hidden" id="suspensionModal">
        <div class="modal-content modal-lg">
            <div class="modal-icon bg-error-light text-error">
                <span class="material-symbols-outlined">gavel</span>
            </div>
            <div class="modal-title-group">
                <h3>Suspend Family Member Account?</h3>
                <span class="modal-id-label">Account ID: #FM-90214</span>
            </div>
            <div class="modal-notice">
                <p>Are you sure you want to suspend this account? The family member will <strong class="text-error">not be able to log in or access SafeHands services</strong> while suspended.</p>
                <div class="modal-notice-footer">
                    <span class="material-symbols-outlined">verified_user</span>
                    <span>All historical bookings, patient clinical charts, and financial escrows remain safely preserved.</span>
                </div>
            </div>
            <div class="form-group">
                <label for="suspensionReason">
                    <span>Suspension Reason <span class="text-error">*</span></span>
                    <span class="form-label-note">Audit-logged action</span>
                </label>
                <textarea id="suspensionReason" class="form-control" rows="3" placeholder="Enter clinical or compliance justification...">Repeated non-payment investigation for care shift #BK-2026-00119 pending administrative review.</textarea>
                <span class="form-hint">This memo will be stamped into the national registry log and visible to compliance officers.</span>
            </div>
            <div class="modal-actions">
                <button class="btn btn-muted" id="cancelModalBtn" type="button">Cancel</button>
                <button class="btn btn-error" id="confirmSuspendBtn" type="button">
                    <span class="material-symbols-outlined">block</span>
                    <span>Confirm Suspension</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="/safehands_mvc/admin/dashboard">Dashboard</a>
        <span class="material-symbols-outlined bc-icon">chevron_right</span>
        <a href="/safehands_mvc/admin/families">Families</a>
        <span class="material-symbols-outlined bc-icon">chevron_right</span>
        <span class="bc-current">Sithmini Rathnayake</span>
    </nav>

    <!-- Page Header -->
    <div class="page-header fd-header">
        <div class="header-content">
            <div class="fd-title-row">
                <h1 class="page-title">Sithmini Rathnayake</h1>
                <div class="badge-active-account">
                    <span class="ping-dot"></span>
                    <span class="ping-dot-inner"></span>
                    <span>ACTIVE ACCOUNT</span>
                </div>
            </div>
            <p class="page-description">Review and manage family account details, linked patients, and clinical safety controls.</p>
        </div>
        <div class="fd-header-actions">
            <button class="btn btn-outline" type="button">
                <span class="material-symbols-outlined">outgoing_mail</span>
                <span>Direct Message</span>
            </button>
            <button class="btn btn-error-soft" id="openSuspendModalHeader" type="button">
                <span class="material-symbols-outlined">person_off</span>
                <span>Suspend Account</span>
            </button>
        </div>
    </div>

    <!-- Profile Identity Strip -->
    <div class="card fd-identity-strip">
        <div class="fd-identity-left">
            <div class="fd-avatar-wrap">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMcuGMahYX5RzZKmj-oPNGvLYd1IjE01CIiApOa0ZUe4ZWAfBbE3gGRs11VropyHLNhqopLbTreLeUkbRTeoT3tZ6u-szwpHu8kWZBms7X5cmUp-txTC2i8lO4bwMEb7H3YKEFilUeULD1bexpHd_ahbr3enLvkfm37WCEyuXP3HGl7QZdJ2BXA8Pt-NC2svZpsVkCwsDGGEiPL4ON3O_v0yCEbybSRH-YB3oiB617wxCbLutlPH2n" alt="Sithmini Rathnayake" class="avatar-lg">
                <span class="avatar-badge-success-sm">
                    <span class="material-symbols-outlined">check</span>
                </span>
            </div>
            <div class="fd-identity-info">
                <div class="fd-name-row">
                    <span class="fd-name">Sithmini Rathnayake</span>
                    <span class="tag-pill tag-neutral">Primary Guardian</span>
                </div>
                <div class="fd-meta-row">
                    <span class="fd-id"><span class="material-symbols-outlined">badge</span> #FM-90214</span>
                    <span>•</span>
                    <span>Joined 12 July 2026</span>
                    <span>•</span>
                    <span class="fd-verified"><span class="material-symbols-outlined">verified</span> NIC Verified</span>
                </div>
            </div>
        </div>
        <div class="fd-metrics-strip">
            <div class="fd-metric">
                <span class="fd-metric-label">Linked Patients</span>
                <div class="fd-metric-value">
                    <span class="fd-metric-num">02</span>
                    <span class="fd-metric-sub">Elderly</span>
                </div>
            </div>
            <div class="fd-metric">
                <span class="fd-metric-label">Bookings</span>
                <div class="fd-metric-value">
                    <span class="fd-metric-num">06</span>
                    <span class="fd-metric-sub text-success">4 Done</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main 2-Column Grid -->
    <div class="details-grid fd-grid">

        <!-- LEFT COLUMN -->
        <div class="details-main">

            <!-- 1. Account Status & Permissions Card -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">admin_panel_settings</span>
                        </div>
                        <div>
                            <h3>Account Status &amp; Permissions</h3>
                            <p class="header-desc-sm">Real-time authentication, session surveillance, and restriction privileges</p>
                        </div>
                    </div>
                    <span class="badge-success-pill">ACCESS UNRESTRICTED</span>
                </div>

                <div class="security-grid">
                    <div class="security-cell">
                        <span class="info-label">Multi-Factor Auth</span>
                        <div class="security-value text-success">
                            <span class="material-symbols-outlined">lock</span>
                            <span>2FA Enabled (SMS OTP)</span>
                        </div>
                    </div>
                    <div class="security-cell">
                        <span class="info-label">Last Session Login</span>
                        <div class="security-value">
                            <span class="material-symbols-outlined icon-outline">schedule</span>
                            <span>24 Sep 2026 • 10:14 AM</span>
                        </div>
                    </div>
                    <div class="security-cell">
                        <span class="info-label">Origin IP &amp; Location</span>
                        <div class="security-value">
                            <span class="material-symbols-outlined icon-outline">my_location</span>
                            <span>112.134.198.42 (Colombo, SL)</span>
                        </div>
                    </div>
                </div>

                <div class="suspension-callout">
                    <div class="callout-left">
                        <span class="material-symbols-outlined text-error">security_update_warning</span>
                        <div>
                            <span class="callout-title">Account Suspension Protocol</span>
                            <p class="callout-desc">Suspending this account revokes family login and service booking access immediately across web and native apps. All linked patient medical charts, active shifts, payment escrows, and past reviews remain <strong>permanently intact and non-destructive</strong>.</p>
                        </div>
                    </div>
                    <button class="btn btn-error" id="openSuspendModalBody" type="button">
                        <span class="material-symbols-outlined">block</span>
                        <span>Suspend Account</span>
                    </button>
                </div>
            </div>

            <!-- 2. Personal Information Card -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">contact_page</span>
                        </div>
                        <h3>Personal Information &amp; Registry</h3>
                    </div>
                    <button class="btn-link" type="button">
                        <span class="material-symbols-outlined">edit</span>
                        <span>Edit Profile</span>
                    </button>
                </div>

                <div class="info-grid">
                    <div class="info-group">
                        <span class="info-label">Full Legal Name</span>
                        <span class="info-value strong">Sithmini Dilrukshi Rathnayake</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">National Identity Card (NIC)</span>
                        <div class="info-value-group">
                            <span class="info-value strong">200312345678</span>
                            <span class="badge-nic-verified">VERIFIED D-REG</span>
                        </div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Contact Telephone</span>
                        <span class="info-value">+94 71 123 4567</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <span class="info-value">sithmini.r@gmail.com</span>
                    </div>
                    <div class="info-group full-width">
                        <span class="info-label">Registered Primary Residence</span>
                        <span class="info-value">No. 45, Flower Road, Colombo 07, Western Province, Sri Lanka</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Emergency Role</span>
                        <span class="info-value">Daughter &amp; Primary Legal Guardian</span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Communication Preference</span>
                        <span class="info-value">Phone Call &amp; SMS Dispatch (English / Sinhala)</span>
                    </div>
                </div>
            </div>

            <!-- 3. Linked Patients Card -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">family_restroom</span>
                        </div>
                        <div>
                            <h3>Linked Patients (Preserved Records)</h3>
                            <p class="header-desc-sm">Medical profiles monitored under Sithmini's guardianship</p>
                        </div>
                    </div>
                    <span class="badge-neutral-pill">2 Active Care Plans</span>
                </div>

                <div class="patients-grid">
                    <!-- Patient 1 -->
                    <div class="patient-card">
                        <div class="patient-header">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUQ22ZDOYVL2LiPTaLd1vqz6Vg4ldtWLakrXaD8UHdyH78my0z-p2jydeumdiV3dH7Hr3aNf6oWgObvC5dupg3XeoIiL7-_RHlOw5nQqd6UrMrqL6kbc4423QavEF6IJQM3d6qhSfVtDHoebvCDiDm2BeBZ25pd5WMsA88GgRjSAviEsexDhVsLHdtOuJAvdXPD647gtVWrzshKCS6rj2n1FmJ06HFrYlupCGmHwl2vSeamj5jtdJJ" alt="Sunil Rathnayake" class="patient-avatar">
                            <div class="patient-info">
                                <div class="patient-name-row">
                                    <span class="patient-name">Mr. Sunil Rathnayake</span>
                                    <span class="patient-age">(Father, 72y)</span>
                                </div>
                                <span class="patient-condition tertiary-text">Post-Stroke Mobility Assistance</span>
                                <p class="patient-desc">Physiotherapy protocol, fall risk assessment Grade 2, wheelchair transfer support.</p>
                            </div>
                        </div>
                        <div class="patient-footer">
                            <span class="patient-caregiver-active">
                                <span class="dot-sm bg-success"></span>
                                Active Caregiver: Sarah W.
                            </span>
                            <button class="btn-link btn-sm-link" type="button">
                                View Profile <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </div>
                    </div>

                    <!-- Patient 2 -->
                    <div class="patient-card">
                        <div class="patient-header">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDhGniBn6ttGXxlkt1PkRexu-NYusv4_0vZ5DFmK_BksIiIOQF8A1wd1L9_6GWBPI1hS16ygFcr77WFB5cQUzToeCbiZ-sPCJPlgyeWv4UP-AOy9I38ZJk5VHYZgAsajlF-FtlS_AUT5HfCeTtMrrTyrsl9JRGgWwgQKtKsr68ia-AS9KzJ7dW56PAmeZRHK3549w0Q--BjppGnxI555MFRTqetAC1JTLDMHUY-JVF3VKKSWaTumYMV" alt="Prema Rathnayake" class="patient-avatar">
                            <div class="patient-info">
                                <div class="patient-name-row">
                                    <span class="patient-name">Mrs. Prema Rathnayake</span>
                                    <span class="patient-age">(Mother, 68y)</span>
                                </div>
                                <span class="patient-condition primary-text">Hypertension &amp; Daily Regimen</span>
                                <p class="patient-desc">Bilingual medication charts, blood pressure logging twice daily, low sodium diet monitoring.</p>
                            </div>
                        </div>
                        <div class="patient-footer">
                            <span class="patient-caregiver-secondary">
                                <span class="dot-sm" style="background-color:var(--secondary)"></span>
                                Part-time Support
                            </span>
                            <button class="btn-link btn-sm-link" type="button">
                                View Chart <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Historical Bookings Card -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">history_edu</span>
                        </div>
                        <div>
                            <h3>Historical Care Bookings</h3>
                            <p class="header-desc-sm">Archived service agreements, caregiver logs, and financial records</p>
                        </div>
                    </div>
                    <a href="#" class="btn-link">View All 6 Bookings</a>
                </div>

                <div class="table-responsive">
                    <table class="data-table bookings-table">
                        <thead>
                            <tr>
                                <th>Booking Ref</th>
                                <th>Patient</th>
                                <th>Assigned Caregiver</th>
                                <th>Shift Schedule</th>
                                <th>Status</th>
                                <th class="text-right">Fee (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="booking-ref">#BK-2026-00142</td>
                                <td>Sunil Rathnayake</td>
                                <td>
                                    <div class="caregiver-cell">
                                        <span class="material-symbols-outlined icon-outline">person</span>
                                        Sarah Wijesinghe
                                    </div>
                                </td>
                                <td class="text-on-surface-variant">28 Sep - 05 Oct (Day)</td>
                                <td><span class="booking-status scheduled">Scheduled</span></td>
                                <td class="text-right font-medium">42,000</td>
                            </tr>
                            <tr>
                                <td class="booking-ref">#BK-2026-00125</td>
                                <td>Sunil Rathnayake</td>
                                <td>
                                    <div class="caregiver-cell">
                                        <span class="material-symbols-outlined icon-outline">person</span>
                                        Nadeesha Perera
                                    </div>
                                </td>
                                <td class="text-on-surface-variant">10 Sep - 17 Sep (Full)</td>
                                <td><span class="booking-status completed">Completed</span></td>
                                <td class="text-right font-medium">56,000</td>
                            </tr>
                            <tr>
                                <td class="booking-ref">#BK-2026-00119</td>
                                <td>Prema Rathnayake</td>
                                <td>
                                    <div class="caregiver-cell">
                                        <span class="material-symbols-outlined icon-outline">person</span>
                                        Kavindi Jayawardena
                                    </div>
                                </td>
                                <td class="text-on-surface-variant">20 Aug - 22 Aug (Night)</td>
                                <td><span class="booking-status dispute">Dispute Hold</span></td>
                                <td class="text-right font-medium">18,500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- end details-main -->

        <!-- RIGHT COLUMN -->
        <div class="details-sidebar">

            <!-- 1. Account Action Hub -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <span class="action-hub-label">Account Action Hub</span>
                    <span class="material-symbols-outlined icon-outline">shield</span>
                </div>
                <div class="action-hub-status">
                    <div class="action-hub-icon">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <span class="action-hub-title">Status: Active</span>
                    <p class="action-hub-desc">Full platform privileges active. Guardian can manage patient regimens, communicate with caregivers, and authorize payouts.</p>
                </div>
                <div class="action-hub-buttons">
                    <button class="btn btn-full btn-error" id="openSuspendModalSidebar" type="button">
                        <span class="material-symbols-outlined">lock_person</span>
                        <span>Suspend Family Account</span>
                    </button>
                    <button class="btn btn-full btn-neutral" type="button">
                        <span class="material-symbols-outlined">password</span>
                        <span>Reset 2FA Credentials</span>
                    </button>
                </div>
                <div class="action-hub-notice">
                    <span class="material-symbols-outlined icon-outline">info</span>
                    <span>Suspension takes effect instantly across web and mobile sessions with zero patient care interruption.</span>
                </div>
            </div>

            <!-- 2. Internal Admin Notes -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <h3>Internal Admin Notes</h3>
                    <span class="material-symbols-outlined icon-outline">edit_note</span>
                </div>
                <div class="notes-form">
                    <textarea id="adminInternalNote" class="form-control" rows="3" placeholder="Write internal admin note regarding this family member..."></textarea>
                    <div class="notes-form-actions">
                        <button class="btn btn-primary btn-sm" id="saveNoteBtn" type="button">Save Note</button>
                    </div>
                </div>
                <div class="audit-notes-list">
                    <span class="checklist-title">Historical Audit Logs</span>
                    <div class="audit-note-item">
                        <div class="audit-note-header">
                            <span class="audit-note-author">Admin_John_D</span>
                            <span class="audit-note-time">13 Jul 2026 • 14:20</span>
                        </div>
                        <p>Identity verified against National Registration database. Primary contact numbers confirmed via telephone briefing.</p>
                    </div>
                    <div class="audit-note-item">
                        <div class="audit-note-header">
                            <span class="audit-note-author">Supervisor_Kumara</span>
                            <span class="audit-note-time">21 Aug 2026 • 09:45</span>
                        </div>
                        <p>Notice received regarding overtime care shift #BK-2026-00119 payment review. Account remains under normal supervision.</p>
                    </div>
                </div>
            </div>

            <!-- 3. Account Audit Trail -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <h3>Account Audit Trail</h3>
                    <span class="material-symbols-outlined icon-outline">history</span>
                </div>
                <div class="timeline-vertical">
                    <div class="timeline-v-track"></div>
                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-success"></span></div>
                        <div class="timeline-v-content">
                            <h4>Account Registered</h4>
                            <span class="time">12 Jul 2026 • Mobile OTP verified</span>
                        </div>
                    </div>
                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-primary"></span></div>
                        <div class="timeline-v-content">
                            <h4>NIC Document Verified</h4>
                            <span class="time">13 Jul 2026 • Identity Clearance Passed</span>
                        </div>
                    </div>
                    <div class="timeline-v-item">
                        <div class="timeline-v-icon" style="background-color:var(--secondary)"><span class="dot-secondary"></span></div>
                        <div class="timeline-v-content">
                            <h4>First Booking Completed</h4>
                            <span class="time">18 Jul 2026 • Ref: #BK-2026-00125</span>
                        </div>
                    </div>
                    <div class="timeline-v-item">
                        <div class="timeline-v-icon timeline-v-icon-outline"><span class="dot-outline"></span></div>
                        <div class="timeline-v-content">
                            <h4>Last Admin Safety Review</h4>
                            <span class="time">20 Sep 2026 • Standard Monthly Pass</span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end details-sidebar -->

    </div><!-- end details-grid -->
</div>

<script>
(function() {
    const modal        = document.getElementById('suspensionModal');
    const openBtns     = [
        document.getElementById('openSuspendModalHeader'),
        document.getElementById('openSuspendModalBody'),
        document.getElementById('openSuspendModalSidebar')
    ];
    const cancelBtn    = document.getElementById('cancelModalBtn');
    const confirmBtn   = document.getElementById('confirmSuspendBtn');
    const noteInput    = document.getElementById('adminInternalNote');
    const saveNoteBtn  = document.getElementById('saveNoteBtn');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    openBtns.forEach(btn => { if (btn) btn.addEventListener('click', openModal); });
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    window.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeModal();
    });

    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            const reason = document.getElementById('suspensionReason').value;
            confirmBtn.innerHTML = '<span class="material-symbols-outlined icon-spin">refresh</span> Suspending...';
            setTimeout(function() {
                closeModal();
                alert('Account for Sithmini Rathnayake has been suspended.\nReason: ' + reason);
                confirmBtn.innerHTML = '<span class="material-symbols-outlined">block</span><span>Confirm Suspension</span>';
            }, 800);
        });
    }

    if (saveNoteBtn && noteInput) {
        saveNoteBtn.addEventListener('click', function() {
            if (!noteInput.value.trim()) return;
            const orig = saveNoteBtn.textContent;
            saveNoteBtn.textContent = 'Saved!';
            saveNoteBtn.style.backgroundColor = 'var(--status-success)';
            setTimeout(function() {
                saveNoteBtn.textContent = orig;
                saveNoteBtn.style.backgroundColor = '';
                noteInput.value = '';
            }, 1400);
        });
    }
})();
</script>
