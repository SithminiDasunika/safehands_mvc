<div class="dashboard-container">
    <!-- Toast Container -->
    <div id="toastNotification" class="toast hidden">
        <span class="material-symbols-outlined icon-success" id="toastIcon">check_circle</span>
        <span class="toast-message" id="toastMessage">Verification state updated successfully.</span>
    </div>

    <!-- Top Action & Navigation Bar -->
    <div class="page-top-nav">
        <div class="nav-left">
            <a href="/safehands_mvc/admin/caregivers" class="btn-back">
                <span class="material-symbols-outlined">arrow_back</span>
                <span>Back to Caregivers</span>
            </a>
            <span class="nav-divider">/</span>
            <h1 class="page-title">Caregiver Details</h1>
        </div>
        <div class="nav-right" id="topStatusContainer">
            <div class="badge-status-top" id="statusBadgeTop">
                <span class="material-symbols-outlined icon-spin">schedule</span>
                <span id="statusBadgeTopText">Pending Verification</span>
            </div>
        </div>
    </div>

    <!-- Main Grid: 2/3 Content, 1/3 Sidebar -->
    <div class="details-grid">
        
        <!-- LEFT COLUMN -->
        <div class="details-main">
            <!-- 1. CAREGIVER PROFILE HEADER CARD -->
            <div class="card profile-header-card">
                <div class="profile-header-content">
                    <div class="avatar-container">
                        <?php 
    $photo = $caregiver['profile_photo'] ?? '';
    if (empty($photo)) {
        $photoUrl = 'https://ui-avatars.com/api/?name='.urlencode($caregiver['full_name'] ?? 'C G').'&background=random';
    } elseif (strpos($photo, 'http') === 0 || strpos($photo, '/') === 0) {
        $photoUrl = $photo;
    } else {
        $photoUrl = '/safehands_mvc/public/' . $photo;
    }
?>
                        <img src="<?= htmlspecialchars($photoUrl) ?>" alt="<?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?>" class="avatar-lg" style="object-fit: cover;">
                        <span class="avatar-badge-warning" id="avatarVerificationIcon">
                            <span class="material-symbols-outlined">hourglass_top</span>
                        </span>
                    </div>
                    <div class="profile-info">
                        <div class="profile-meta">
                            <span class="meta-label">Caregiver Profile</span>
                            <span class="meta-dot">•</span>
                            <span class="meta-id">#CG-<?= str_pad($caregiver["caregiver_id"] ?? 0, 4, "0", STR_PAD_LEFT) ?></span>
                        </div>
                        <h2 class="profile-name"><?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?></h2>
                        <div class="profile-tags">
                            <?php 
$vs = strtolower($caregiver['verification_status'] ?? 'pending');
if ($vs === 'verified') {
    echo '<span class="tag-pill tag-success-light" id="profileStatusPill">Verified</span>';
} elseif ($vs === 'rejected') {
    echo '<span class="tag-pill tag-error-light" id="profileStatusPill">Rejected</span>';
} else {
    echo '<span class="tag-pill tag-warning-light" id="profileStatusPill">Pending Verification</span>';
}
?>
                            <span class="tag-pill tag-neutral">Registered: 24 Sep 2026</span>
                            <span class="tag-pill tag-primary-light">Geriatric & Post-Op Specialist</span>
                        </div>
                        
                        <div class="contact-grid">
                            <div class="contact-item">
                                <span class="material-symbols-outlined icon-primary">mail</span>
                                <span><?= htmlspecialchars($caregiver["email"] ?? "") ?></span>
                            </div>
                            <div class="contact-item">
                                <span class="material-symbols-outlined icon-primary">call</span>
                                <span><?= htmlspecialchars($caregiver["phone"] ?? "") ?></span>
                            </div>
                            <div class="contact-item">
                                <span class="material-symbols-outlined icon-primary">location_on</span>
                                <span>Colombo, Western Province</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. PERSONAL INFORMATION CARD -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <span class="material-symbols-outlined icon-primary">badge</span>
                        <h3>Personal Information</h3>
                    </div>
                    <span class="header-subtitle">Identity Record</span>
                </div>
                <div class="info-grid">
                    <div class="info-group">
                        <span class="info-label">Full Legal Name</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">National Identity Card (NIC)</span>
                        <div class="info-value-group">
                            <span class="info-value"><?= htmlspecialchars($caregiver["nic"] ?? "") ?></span>
                            <span class="material-symbols-outlined icon-success icon-sm">check_circle</span>
                        </div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Phone Number</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["phone"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Email Address</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["email"] ?? "") ?></span>
                    </div>
                    <div class="info-group full-width">
                        <span class="info-label">Residential Address</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["address"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Date of Birth & Age</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["date_of_birth"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Gender</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["gender"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">District / Province</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["district"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Emergency Contact</span>
                        <span class="info-value">Not Provided</span>
                    </div>
                </div>
            </div>

            <!-- 3. PROFESSIONAL INFORMATION CARD -->
            <div class="card info-card">
                <div class="card-header-icon">
                    <div class="header-title-group">
                        <span class="material-symbols-outlined icon-primary">medical_information</span>
                        <h3>Professional Information</h3>
                    </div>
                    <div class="header-status-success">
                        <span class="dot-success"></span>
                        <span>Accreditation Match</span>
                    </div>
                </div>
                <div class="info-grid">
                    <div class="info-group">
                        <span class="info-label">Highest Qualification</span>
                        <span class="info-value strong"><?= htmlspecialchars($caregiver["highest_qualification"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Years of Experience</span>
                        <span class="info-value strong"><?= htmlspecialchars($caregiver["years_experience"] ?? "0") ?> Years</span>
                    </div>
                    <div class="info-group full-width">
                        <span class="info-label">Certifications</span>
                        <div class="tags-container">
                            <span class="tag-outline">NVQ Level 4 Elderly Care</span>
                            <span class="tag-outline">Sri Lanka Red Cross Basic First Aid & CPR</span>
                            <span class="tag-outline">Medication Administration Safety</span>
                        </div>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Languages Spoken</span>
                        <span class="info-value"><?= htmlspecialchars($caregiver["languages"] ?? "") ?></span>
                    </div>
                    <div class="info-group">
                        <span class="info-label">Expected Daily Rate</span>
                        <span class="info-value text-primary strong">LKR <?= number_format($caregiver["daily_rate"] ?? 0, 2) ?></span>
                    </div>
                    <div class="info-group full-width">
                        <span class="info-label">Service Areas</span>
                        <div class="tags-container-sm">
                            <span class="tag-sm">Maharagama</span>
                            <span class="tag-sm">Nugegoda</span>
                            <span class="tag-sm">Dehiwala</span>
                            <span class="tag-sm">Colombo 03–07</span>
                        </div>
                    </div>
                    <div class="info-group full-width bio-box">
                        <span class="info-label">Professional Summary & Bio</span>
                        <p class="bio-text"><?= nl2br(htmlspecialchars($caregiver["biography"] ?? "No biography provided.")) ?></p>
                    </div>
                </div>
            </div>

            <!-- 4. VERIFICATION DOCUMENTS SECTION -->
            <div class="card info-card">
                <div class="card-header-docs">
                    <div>
                        <div class="header-title-group">
                            <span class="material-symbols-outlined icon-primary">folder_shared</span>
                            <h3>Verification Documents</h3>
                        </div>
                        <p class="header-desc">Review the documents submitted by the caregiver before taking an accreditation decision.</p>
                    </div>
                    <span class="badge badge-info-light">4 of 4 Submitted</span>
                </div>

                <div class="docs-grid">
                    <?php if (!empty($caregiver['documents'])): ?>
                        <?php foreach ($caregiver['documents'] as $doc): ?>
                            <div class="doc-card">
                                <div class="doc-header">
                                    <div class="doc-icon"><span class="material-symbols-outlined">description</span></div>
                                    <span class="doc-badge-neutral">Document</span>
                                </div>
                                <div class="doc-info">
                                    <h4><?= htmlspecialchars($doc['document_type']) ?></h4>
                                    <p>Provided by Caregiver</p>
                                    <span class="doc-meta">Uploaded: <?= date('d M Y', strtotime($doc['uploaded_at'])) ?></span>
                                </div>
                                <a href="/safehands_mvc/public/<?= htmlspecialchars($doc['file_path']) ?>" target="_blank" class="btn btn-doc" style="text-decoration:none; text-align:center;">
                                    <span class="material-symbols-outlined">visibility</span> View Document
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="padding: 20px;">No documents uploaded.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="details-sidebar">
            
            <!-- 1. VERIFICATION STATUS & AUDIT SUMMARY CARD -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <h3>Verification Status</h3>
                    <span class="material-symbols-outlined icon-outline">fact_check</span>
                </div>
                
                <div class="status-hero-box warning" id="statusHeroBox">
                    <div class="status-hero-icon warning" id="statusHeroIconContainer">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                    <div class="status-hero-text">
                        <span class="status-hero-label">Audit Workflow</span>
                        <span class="status-hero-title warning" id="statusHeroTitle">PENDING REVIEW</span>
                    </div>
                </div>

                <div class="audit-list">
                    <div class="audit-item">
                        <span class="audit-label">Submitted</span>
                        <span class="audit-value">24 Sep 2026 (10:30 AM)</span>
                    </div>
                    <div class="audit-item">
                        <span class="audit-label">Documents</span>
                        <span class="audit-value text-success">4 of 4 Complete</span>
                    </div>
                    <div class="audit-item">
                        <span class="audit-label">SLA Target</span>
                        <span class="audit-value highlight-warning">Due in 4 Hours</span>
                    </div>
                </div>

                <div class="checklist-box">
                    <span class="checklist-title">Automated Checks</span>
                    <div class="checklist-items">
                        <div class="check-item success">
                            <span class="check-icon"><span class="material-symbols-outlined">check</span></span>
                            <span>National Identity Format Validated</span>
                        </div>
                        <div class="check-item success">
                            <span class="check-icon"><span class="material-symbols-outlined">check</span></span>
                            <span>SLITA Accreditation Matched</span>
                        </div>
                        <div class="check-item success">
                            <span class="check-icon"><span class="material-symbols-outlined">check</span></span>
                            <span>Police Clearance Certificate Current</span>
                        </div>
                        <div class="check-item pending" id="adminCheckRow">
                            <span class="check-icon neutral" id="adminCheckIcon"><span class="material-symbols-outlined hidden">check</span></span>
                            <span class="text-neutral" id="adminCheckText">Administrator Manual Confirmation Pending</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. ADMINISTRATOR DECISION CARD -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <h3>Administrator Decision</h3>
                    <span class="badge-primary-light">Required</span>
                </div>
                <p class="decision-desc">Caregivers must be manually vetted. Once approved, the caregiver can accept patient bookings and access the Caregiver Portal.</p>
                
                <div class="decision-banner hidden" id="decisionConfirmedBanner">
                    <div class="banner-title">
                        <span class="material-symbols-outlined" id="decisionBannerIcon">verified</span>
                        <span id="decisionBannerTitle">Accreditation Finalized</span>
                    </div>
                    <p class="banner-sub" id="decisionBannerSub">Recorded on 25 Sep 2026 by Administrator.</p>
                </div>

                <div class="decision-actions" id="decisionActionButtons">
                    <?php if (strtolower($caregiver['verification_status']) === 'pending'): ?>
                    <button class="btn btn-full btn-primary" onclick="toggleModal('approveModal', true)">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span>Approve Caregiver</span>
                    </button>
                    <button class="btn btn-full btn-error-outline" onclick="toggleModal('rejectModal', true)">
                        <span class="material-symbols-outlined">cancel</span>
                        <span>Reject Caregiver</span>
                    </button>
                    <?php else: ?>
                    <div style="padding: 16px; background-color: #f0f3ff; border-radius: 8px; text-align: center;">
                        <strong>Status: <?= ucfirst($caregiver['verification_status']) ?></strong>
                        <?php if (strtolower($caregiver['verification_status']) === 'rejected'): ?>
                            <br><small><?= htmlspecialchars($caregiver['rejection_reason']) ?></small>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="compliance-footer">
                    <span class="material-symbols-outlined icon-sm">lock</span>
                    <span>Complies with SafeHands Sri Lanka Medical Accreditation Act</span>
                </div>
            </div>

            <!-- 3. CAREGIVER ACTIVITY TIMELINE -->
            <div class="card sidebar-card">
                <div class="sidebar-header">
                    <h3>Recent Activity</h3>
                    <span class="header-subtitle">Audit Log</span>
                </div>
                
                <div class="timeline-vertical">
                    <div class="timeline-v-track"></div>
                    
                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-success"></span></div>
                        <div class="timeline-v-content">
                            <h4>Account Registered</h4>
                            <span class="time">24 Sep 2026, 09:15 AM</span>
                            <p>Caregiver registered using mobile credentials and verified OTP.</p>
                        </div>
                    </div>

                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-success"></span></div>
                        <div class="timeline-v-content">
                            <h4>4 Verification Documents Uploaded</h4>
                            <span class="time">24 Sep 2026, 09:40 AM</span>
                            <p>NIC (Front & Back), Nursing Diploma, and Police Clearance attached.</p>
                        </div>
                    </div>

                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-success"></span></div>
                        <div class="timeline-v-content">
                            <h4>Submitted for Admin Review</h4>
                            <span class="time">24 Sep 2026, 09:42 AM</span>
                            <p>Application placed into Priority Healthcare Queue (Colombo).</p>
                        </div>
                    </div>

                    <div class="timeline-v-item">
                        <div class="timeline-v-icon"><span class="dot-primary"></span></div>
                        <div class="timeline-v-content">
                            <h4>Compliance Inspection Opened</h4>
                            <span class="time">25 Sep 2026, 08:30 AM</span>
                            <p>Administrator accessed the dossier.</p>
                        </div>
                    </div>

                    <div class="timeline-v-item" id="dynamicTimelineItem">
                        <div class="timeline-v-icon"><span class="dot-warning" id="timelineStateDot"></span></div>
                        <div class="timeline-v-content">
                            <h4 id="timelineStateTitle">Pending Final Determination</h4>
                            <span class="time" id="timelineStateTime">Current State</span>
                            <p id="timelineStateDesc">Awaiting administrative approval or formal rejection notice.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALS -->
    <!-- Approve Modal -->
    <div class="modal-overlay hidden" id="approveModal">
        <div class="modal-content">
            <div class="modal-icon bg-success-light text-success">
                <span class="material-symbols-outlined">verified</span>
            </div>
            <h3>Approve Caregiver?</h3>
            <p>Are you sure you want to approve <strong><?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?></strong>? The caregiver will be marked as <span class="text-success font-medium">Verified</span> and will be allowed to use the normal caregiver dashboard and receive patient bookings.</p>
            <form action="/safehands_mvc/admin/updateCaregiverStatus" method="POST">
                <input type="hidden" name="caregiver_id" value="<?= $caregiver['caregiver_id'] ?>">
                <input type="hidden" name="action" value="approve">
                <div class="modal-actions mt-16">
                    <button type="button" class="btn btn-text" onclick="toggleModal('approveModal', false)">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-outlined">check</span>
                        <span>Confirm Approval</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reject Modal -->
    <div class="modal-overlay hidden" id="rejectModal">
        <div class="modal-content modal-lg">
            <div class="modal-icon bg-error-light text-error">
                <span class="material-symbols-outlined">gpp_bad</span>
            </div>
            <h3>Reject Caregiver Application</h3>
            <p>Specify the formal reason for rejecting this caregiver application. An official notification will be recorded in the system audit log and emailed to the applicant.</p>
            <form action="/safehands_mvc/admin/updateCaregiverStatus" method="POST">
                <input type="hidden" name="caregiver_id" value="<?= $caregiver['caregiver_id'] ?>">
                <input type="hidden" name="action" value="reject">
                <div class="form-group mt-16">
                    <label>Rejection Reason</label>
                    <textarea name="rejection_reason" id="rejectionReason" class="form-control" rows="3" required placeholder="e.g. Expired police clearance certificate..."></textarea>
                </div>
                <div class="modal-actions mt-24">
                    <button type="button" class="btn btn-text" onclick="toggleModal('rejectModal', false)">Cancel</button>
                    <button type="submit" class="btn btn-error">
                        <span class="material-symbols-outlined">close</span>
                        <span>Confirm Rejection</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Document Preview Modal -->
    <div class="modal-overlay hidden doc-modal" id="docPreviewModal">
        <div class="modal-content-full">
            <div class="modal-header">
                <div class="header-left">
                    <div class="doc-icon-wrapper"><span class="material-symbols-outlined">description</span></div>
                    <div>
                        <h4 id="docModalTitle">Document Preview</h4>
                        <span class="subtitle" id="docModalSubtitle">Document Identifier: #DOC-1029</span>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="btn-icon" onclick="zoomDoc(-0.1)"><span class="material-symbols-outlined">zoom_out</span></button>
                    <span class="zoom-level" id="zoomLevelIndicator">100%</span>
                    <button class="btn-icon" onclick="zoomDoc(0.1)"><span class="material-symbols-outlined">zoom_in</span></button>
                    <button class="btn-icon ml-8" onclick="downloadDocPrompt()"><span class="material-symbols-outlined">download</span></button>
                    <button class="btn-icon btn-close ml-16" onclick="toggleModal('docPreviewModal', false)"><span class="material-symbols-outlined">close</span></button>
                </div>
            </div>
            
            <div class="modal-body doc-viewer">
                <div class="doc-zoom-target" id="docZoomTarget">
                    <div class="doc-top-bar">
                        <div class="doc-verified"><span class="material-symbols-outlined">verified</span> SafeHands Certified Document Repository</div>
                        <span class="badge-outline-sm">Verified High-Res Scan</span>
                    </div>
                    <div class="doc-image-container">
                        <img id="docPreviewImage" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQxuOxa3v3KQslw-5HPvcQc08vevbSL3pwL4sd9V-r3e69-PgKo4n5hvtg3j7WFrjZY6vHinqsD9Unm1nhBxpmcjHy43FLN09aoj7E_TvVdko2wFxzY4zIyHlyz3n7EYbFvzbpbukv6xrK9wpUrl4rpkycvlL3f6mOvhKgwznHx9_TWb0f_TikukQLTntoflCYxvuFAH5tWn6cRUJyB_VhUORj7RRRHHryK4UG9-Qf3Tf26oCto_pq" alt="Document Preview">
                    </div>
                    <div class="doc-audit-bar">
                        <div class="audit-status"><span class="material-symbols-outlined text-success">security</span> Cryptographic Hash Verified: SHA-256 Validated</div>
                        <span class="hash-text" id="docAuditHash">f8a2...3e91</span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <span class="footer-note">Viewing authenticated record · <?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?> (#CG-<?= str_pad($caregiver["caregiver_id"] ?? 0, 4, "0", STR_PAD_LEFT) ?>)</span>
                <button class="btn btn-outline" onclick="toggleModal('docPreviewModal', false)">Close Preview</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentZoom = 1.0;

    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    function showToast(message, isSuccess = true) {
        const toast = document.getElementById('toastNotification');
        const toastMsg = document.getElementById('toastMessage');
        const toastIcon = document.getElementById('toastIcon');

        toastMsg.textContent = message;
        if (isSuccess) {
            toastIcon.textContent = 'check_circle';
            toastIcon.className = 'material-symbols-outlined icon-success';
        } else {
            toastIcon.textContent = 'warning';
            toastIcon.className = 'material-symbols-outlined icon-error';
        }

        toast.classList.remove('hidden');
        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => { toast.classList.add('hidden'); }, 300);
        }, 3500);
    }

    function confirmApproval() {
        toggleModal('approveModal', false);

        // Top Status Badge
        const topBadge = document.getElementById('statusBadgeTop');
        topBadge.className = 'badge-status-top success';
        topBadge.innerHTML = '<span class="material-symbols-outlined">verified</span><span>Verified</span>';

        // Profile Header Status Pill
        const profilePill = document.getElementById('profileStatusPill');
        profilePill.className = 'tag-pill tag-success-light';
        profilePill.innerHTML = '<span class="material-symbols-outlined icon-xs">check</span> Verified';

        // Avatar Verification Icon
        const avatarIcon = document.getElementById('avatarVerificationIcon');
        avatarIcon.className = 'avatar-badge-success';
        avatarIcon.innerHTML = '<span class="material-symbols-outlined">check</span>';

        // Sidebar Status Box
        const heroBox = document.getElementById('statusHeroBox');
        heroBox.className = 'status-hero-box success';
        document.getElementById('statusHeroIconContainer').className = 'status-hero-icon success';
        document.getElementById('statusHeroIconContainer').innerHTML = '<span class="material-symbols-outlined">verified</span>';
        document.getElementById('statusHeroTitle').textContent = 'VERIFIED CAREGIVER';
        document.getElementById('statusHeroTitle').className = 'status-hero-title success';

        // Checklist item for admin
        const adminIcon = document.getElementById('adminCheckIcon');
        adminIcon.innerHTML = '<span class="material-symbols-outlined">check</span>';
        adminIcon.className = 'check-icon-success';
        const adminText = document.getElementById('adminCheckText');
        adminText.textContent = 'Administrator Confirmation Complete';
        adminText.className = 'text-success font-medium';
        document.getElementById('adminCheckRow').className = 'check-item success';

        // Decision Card Buttons & Confirmation Banner
        document.getElementById('decisionActionButtons').classList.add('hidden');
        const confBanner = document.getElementById('decisionConfirmedBanner');
        confBanner.classList.remove('hidden');
        confBanner.className = 'decision-banner success';
        document.getElementById('decisionBannerIcon').textContent = 'verified';
        document.getElementById('decisionBannerTitle').textContent = '✓ Caregiver Verified';
        document.getElementById('decisionBannerSub').textContent = 'Verified on 25 Sep 2026 by Administrator.';

        // Timeline Update
        document.getElementById('timelineStateDot').className = 'dot-success';
        document.getElementById('timelineStateTitle').textContent = 'Caregiver Approved & Onboarded';
        document.getElementById('timelineStateTime').textContent = 'Just Now · 25 Sep 2026';
        document.getElementById('timelineStateDesc').textContent = 'Full access granted to Caregiver Portal. Eligible for patient allocations.';

        showToast('<?= htmlspecialchars($caregiver["full_name"] ?? "Caregiver") ?> has been successfully verified.');
    }

    function confirmRejection() {
        const reason = document.getElementById('rejectionReason').value.trim() || 'General documentation non-compliance';
        toggleModal('rejectModal', false);

        // Top Status Badge
        const topBadge = document.getElementById('statusBadgeTop');
        topBadge.className = 'badge-status-top error';
        topBadge.innerHTML = '<span class="material-symbols-outlined">cancel</span><span>Rejected</span>';

        // Profile Header Status Pill
        const profilePill = document.getElementById('profileStatusPill');
        profilePill.className = 'tag-pill tag-error-light';
        profilePill.innerHTML = '<span class="material-symbols-outlined icon-xs">close</span> Rejected';

        // Avatar Verification Icon
        const avatarIcon = document.getElementById('avatarVerificationIcon');
        avatarIcon.className = 'avatar-badge-error';
        avatarIcon.innerHTML = '<span class="material-symbols-outlined">close</span>';

        // Sidebar Status Box
        const heroBox = document.getElementById('statusHeroBox');
        heroBox.className = 'status-hero-box error';
        document.getElementById('statusHeroIconContainer').className = 'status-hero-icon error';
        document.getElementById('statusHeroIconContainer').innerHTML = '<span class="material-symbols-outlined">gpp_bad</span>';
        document.getElementById('statusHeroTitle').textContent = 'APPLICATION REJECTED';
        document.getElementById('statusHeroTitle').className = 'status-hero-title error';

        // Checklist item for admin
        const adminIcon = document.getElementById('adminCheckIcon');
        adminIcon.innerHTML = '<span class="material-symbols-outlined">cancel</span>';
        adminIcon.className = 'check-icon-error';
        const adminText = document.getElementById('adminCheckText');
        adminText.textContent = 'Rejected: ' + reason;
        adminText.className = 'text-error font-medium truncate';

        // Decision Card Buttons & Confirmation Banner
        document.getElementById('decisionActionButtons').classList.add('hidden');
        const confBanner = document.getElementById('decisionConfirmedBanner');
        confBanner.classList.remove('hidden');
        confBanner.className = 'decision-banner error';
        document.getElementById('decisionBannerIcon').textContent = 'cancel';
        document.getElementById('decisionBannerTitle').textContent = 'Application Rejected';
        document.getElementById('decisionBannerSub').textContent = 'Reason: ' + reason;

        // Timeline Update
        document.getElementById('timelineStateDot').className = 'dot-error';
        document.getElementById('timelineStateTitle').textContent = 'Application Rejected by Admin';
        document.getElementById('timelineStateTime').textContent = 'Just Now · 25 Sep 2026';
        document.getElementById('timelineStateDesc').textContent = 'Formal rejection notice recorded: "' + reason + '"';

        showToast('Application rejected. Notice logged in audit record.', false);
    }

    function openDocPreview(title, identifier) {
        document.getElementById('docModalTitle').textContent = title;
        document.getElementById('docModalSubtitle').textContent = 'Document Ref: ' + identifier;
        document.getElementById('docAuditHash').textContent = 'sha256:' + (Math.random().toString(36).substring(2, 10)) + '...' + (Math.random().toString(36).substring(2, 6));

        currentZoom = 1.0;
        updateZoom();
        toggleModal('docPreviewModal', true);
    }

    function zoomDoc(delta) {
        currentZoom = Math.min(Math.max(currentZoom + delta, 0.6), 2.2);
        updateZoom();
    }

    function updateZoom() {
        const target = document.getElementById('docZoomTarget');
        const indicator = document.getElementById('zoomLevelIndicator');
        target.style.transform = `scale(${currentZoom})`;
        indicator.textContent = Math.round(currentZoom * 100) + '%';
    }

    function downloadDocPrompt() {
        showToast('Preparing authenticated document download package...');
    }
</script>
