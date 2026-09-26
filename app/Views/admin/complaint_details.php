<?php
$c = $data['complaint'] ?? [];
$evidence = $data['evidence'] ?? [];
?>
<div class="dashboard-container">

    <!-- Top Navigation & Action Header -->
    <div class="cd-header-row">
        <div style="display:flex; align-items:center; justify-content:space-between;">
            <a href="/safehands_mvc/admin/complaints" style="display:inline-flex; align-items:center; gap:8px; color:var(--primary); font-weight:600; text-decoration:none;">
                <span class="material-symbols-outlined icon-sm">arrow_back</span>
                Back to Complaints Directory
            </a>
            <div style="display:flex; align-items:center; gap:8px; font-size:12px;">
                <span style="color:var(--outline);">Incident Dossier</span>
                <span style="color:var(--outline-variant);">•</span>
                <span class="badge-tag font-mono" style="background:var(--surface-container); color:var(--on-surface-variant);">ID: <?= htmlspecialchars($c['complaint_ref'] ?? '') ?></span>
            </div>
        </div>

        <!-- Main Header Bar -->
        <div class="cd-title-card">
            <div class="cd-title-group">
                <div class="cd-title-row">
                    <h1 style="font-size:32px; font-weight:600; margin:0;">Complaint Details</h1>
                    <div class="badge-tag" id="statusBadge" style="background-color:rgba(254, 187, 2, 0.15); color:var(--on-surface); font-weight:600; display:flex; align-items:center; gap:6px;">
                        <span class="dot-sm bg-warning" style="animation: pulse 2s infinite;"></span>
                        <span id="statusBadgeText"><?= htmlspecialchars($c['status'] ?? 'Pending') ?></span>
                    </div>
                    <div class="badge-tag" style="background:var(--error-container); color:var(--on-error-container); font-weight:600; display:flex; align-items:center; gap:6px;">
                        <span class="material-symbols-outlined icon-sm">priority_high</span>
                        <?= htmlspecialchars($c['priority'] ?? '') ?> Priority
                    </div>
                </div>
                <div class="cd-title-meta">
                    <span style="display:flex; align-items:center; gap:6px;">
                        <span class="material-symbols-outlined icon-sm">schedule</span>
                        Submitted: <?= date('d M Y, h:i A', strtotime($c['created_at'] ?? '')) ?>
                    </span>
                    <span>•</span>
                    <span style="display:flex; align-items:center; gap:6px;">
                        <span class="material-symbols-outlined icon-sm">lock_clock</span>
                        Escrow Protection: <strong class="text-error"><?= htmlspecialchars($c['escrow_status'] ?? '') ?></strong>
                    </span>
                </div>
            </div>

            <!-- Quick Lifecycle Controller Bar -->
            <div class="lifecycle-pills">
    <button class="pill-btn <?= ($c['status'] == 'Pending') ? 'active-review' : '' ?>" id="pillPending" onclick="setLifecycleState('Pending')">Pending</button>
    <button class="pill-btn <?= ($c['status'] == 'Under Review') ? 'active-review' : '' ?>" id="pillReview" onclick="setLifecycleState('Under Review')">Under Review</button>
    <button class="pill-btn <?= ($c['status'] == 'Resolved') ? 'active-review' : '' ?>" id="pillResolved" onclick="setLifecycleState('Resolved')">Resolved</button>
    <button class="pill-btn <?= ($c['status'] == 'Rejected') ? 'active-review' : '' ?>" id="pillRejected" onclick="setLifecycleState('Rejected')">Rejected</button>
</div>
        </div>
    </div>

    <!-- Main Investigation Grid -->
    <div class="grid-8-4">
        <!-- LEFT 8 COLUMNS -->
        <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- Complaint Info Strip -->
            <div class="cd-info-strip">
                <div class="grid-6-col">
                    <div>
                        <span class="uppercase-label">Complaint Reference</span>
                        <span class="font-mono" style="font-weight:600; font-size:16px;"><?= htmlspecialchars($c['complaint_ref'] ?? '') ?></span>
                    </div>
                    <div>
                        <span class="uppercase-label">Category / Type</span>
                        <span style="font-weight:600; font-size:16px;">Service Quality &amp; Punctuality</span>
                    </div>
                    <div>
                        <span class="uppercase-label">Submitted By</span>
                        <span style="font-weight:600; font-size:16px;">Family Member (Sithmini R.)</span>
                    </div>
                    <div>
                        <span class="uppercase-label">Submission Timestamp</span>
                        <span style="font-size:16px;">16 Oct 2026, 09:42 AM</span>
                    </div>
                    <div>
                        <span class="uppercase-label">Investigator in Charge</span>
                        <span style="font-weight:600; font-size:16px; color:var(--primary); display:flex; align-items:center; gap:6px;">
                            <span class="material-symbols-outlined icon-sm">shield_person</span> Admin User (SYSTEM ROOT)
                        </span>
                    </div>
                    <div>
                        <span class="uppercase-label">Simulated Escrow</span>
                        <span class="text-error" style="font-weight:600; font-size:16px;">LKR 6,400.00 (FROZEN)</span>
                    </div>
                </div>
            </div>

            <!-- Complainant vs Caregiver Side-by-Side Cards -->
            <div class="grid-2-col">
                <!-- Complainant -->
                <div class="cd-dossier-card">
                    <div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                            <span class="uppercase-label" style="margin:0;">Complainant (Family)</span>
                            <span class="badge-tag" style="background:rgba(2, 87, 71, 0.1); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:4px;">
                                <span class="material-symbols-outlined icon-xs">verified</span> Verified Account
                            </span>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <div class="avatar-circle bg-surface-container-high text-primary" style="width:48px; height:48px; font-size:20px; font-weight:600;">SR</div>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-size:24px; font-weight:600; line-height:1.2;">Sithmini Rathnayake</span>
                                <span style="font-size:12px; color:var(--outline);">Primary Family Member • Account Owner</span>
                            </div>
                        </div>
                        <div class="cd-dossier-inner-box">
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Family ID</span>
                                <span class="font-mono" style="font-weight:600;">FM-2026-0418</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Email</span>
                                <span style="font-weight:600;">sithmini.rathnayake@email.com</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Phone</span>
                                <span style="font-weight:600;">+94 77 892 4110</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Location</span>
                                <span style="font-weight:600;">Colombo 07, Western Province</span>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:8px; font-size:12px; color:var(--outline); border-top:1px solid var(--surface-container); padding-top:12px;">
                        <span class="material-symbols-outlined icon-sm text-success">check_circle</span> Family history: 14 completed shifts, 0 prior disputes
                    </div>
                </div>

                <!-- Caregiver -->
                <div class="cd-dossier-card">
                    <div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                            <span class="uppercase-label" style="margin:0;">Caregiver Under Review</span>
                            <span class="badge-tag" style="background:rgba(0, 74, 198, 0.1); color:var(--primary); font-weight:600; display:flex; align-items:center; gap:4px;">
                                <span class="material-symbols-outlined icon-xs">badge</span> SLMC Certified
                            </span>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <div class="avatar-circle" style="width:48px; height:48px; background:rgba(138, 172, 254, 0.4); color:var(--on-secondary-container); font-size:20px; font-weight:600;">KP</div>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-size:24px; font-weight:600; line-height:1.2;">Kumara Pathirana</span>
                                <span style="font-size:12px; color:var(--outline);">Certified Elderly Caregiver (Male Nurse)</span>
                            </div>
                        </div>
                        <div class="cd-dossier-inner-box">
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Caregiver ID</span>
                                <span class="font-mono" style="font-weight:600;">CG-2026-0192</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">License No.</span>
                                <span class="font-mono" style="font-weight:600;">SL-CG-8821</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Contact</span>
                                <span style="font-weight:600;">+94 71 445 8821</span>
                            </div>
                            <div class="cd-dossier-row">
                                <span style="color:var(--outline);">Platform Track</span>
                                <span style="font-weight:600; display:flex; align-items:center; gap:4px;">
                                    <span class="text-warning">★</span> 4.6 (24 completed shifts)
                                </span>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:8px; font-size:12px; color:var(--outline); border-top:1px solid var(--surface-container); padding-top:12px;">
                        <span class="material-symbols-outlined icon-sm text-error">warning</span> Incident flag: 1st recorded late arrival report
                    </div>
                </div>
            </div>

            <!-- Associated Booking Linkage -->
            <div class="cd-info-strip" style="display:flex; flex-direction:column; gap:16px;">
                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px;">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">calendar_clock</span>
                        </div>
                        <div>
                            <h2 style="font-size:24px; font-weight:600; margin:0;">Associated Shift Booking</h2>
                            <span style="font-size:12px; color:var(--outline);">Direct transaction audit trail</span>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <span class="badge-tag font-mono text-primary-container" style="background:var(--surface-container); font-size:14px; padding:6px 12px;">#BK-2026-00125</span>
                        <a href="#" class="btn btn-neutral" style="display:inline-flex; align-items:center; gap:6px;">View Booking <span class="material-symbols-outlined icon-sm">arrow_forward</span></a>
                    </div>
                </div>

                <div class="grid-4-col">
                    <div class="cd-dossier-inner-box">
                        <span class="uppercase-label">Patient Recipient</span>
                        <span style="font-weight:600; font-size:16px;">Mr. Dharmasiri Silva</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Age 74 • Post-Stroke &amp; BP</span>
                    </div>
                    <div class="cd-dossier-inner-box">
                        <span class="uppercase-label">Scheduled Shift</span>
                        <span style="font-weight:600; font-size:16px;">15 Oct 2026</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">08:00 AM – 04:00 PM (8h)</span>
                    </div>
                    <div class="cd-dossier-inner-box">
                        <span class="uppercase-label">Actual Check-in</span>
                        <span class="text-error" style="font-weight:600; font-size:16px;">09:20 AM (Late +80m)</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Check-out: 04:10 PM</span>
                    </div>
                    <div class="cd-dossier-inner-box">
                        <span class="uppercase-label">Service Address</span>
                        <span style="font-weight:600; font-size:16px;">No. 42/3 Alfred Place</span>
                        <span style="font-size:12px; color:var(--on-surface-variant);">Colombo 03</span>
                    </div>
                </div>

                <!-- Escrow Warning Alert Bar -->
                <div style="background:rgba(255, 218, 214, 0.4); border-radius:8px; padding:12px; display:flex; align-items:center; gap:12px; margin-top:8px;">
                    <span class="material-symbols-outlined text-error" style="font-size:24px;">gavel</span>
                    <p style="margin:0; font-size:14px; color:var(--on-surface);">
                        <strong class="text-on-error-container">Escrow Protection Notice:</strong> Simulated Platform Escrow (LKR 6,400.00) is held in freeze protocol. No funds can be released to Kumara Pathirana until this formal complaint is adjudicated.
                    </p>
                </div>
            </div>

            <!-- Narrative & Evidence -->
            <div class="cd-info-strip" style="display:flex; flex-direction:column; gap:20px;">
                <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:16px;">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="icon-wrapper-sm bg-surface-container-high text-primary">
                            <span class="material-symbols-outlined">format_quote</span>
                        </div>
                        <div>
                            <h2 style="font-size:24px; font-weight:600; margin:0;">Complainant Statement (Verbatim)</h2>
                            <span style="font-size:12px; color:var(--outline);">Exact verbatim narrative submitted by <?= htmlspecialchars($c['family_name'] ?? '') ?> on <?= date('d M Y \a\t h:i A', strtotime($c['created_at'] ?? '')) ?></span>
                        </div>
                    </div>
                    <span class="badge-tag font-mono text-outline" style="background:var(--surface-container);">Tamper-Proof Record</span>
                </div>

                <div style="background:var(--surface-muted); padding:20px; border-radius:12px; font-size:16px; line-height:1.6;">
                    “<?= nl2br(htmlspecialchars($c['description'] ?? 'No statement provided.')) ?>”
                </div>

                <div style="display:flex; flex-direction:column; gap:12px;">
                    <span class="uppercase-label">Uploaded Evidence &amp; Incident Documentation (<?= count($evidence) ?> files)</span>
                    <div class="grid-2-col" style="margin-bottom:0;">
                        <?php if (empty($evidence)): ?>
                            <div style="color:var(--outline); padding:16px;">No evidence files attached.</div>
                        <?php else: ?>
                            <?php foreach ($evidence as $e): 
                                $ext = strtolower(pathinfo($e['file_name'], PATHINFO_EXTENSION));
                                $icon = in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'svg']) ? 'image' : 'description';
                            ?>
                            <div class="cd-evidence-box">
                                <div style="display:flex; align-items:center; gap:12px; overflow:hidden;">
                                    <div class="icon-wrapper-sm bg-surface-container-high text-primary" style="flex-shrink:0;">
                                        <span class="material-symbols-outlined"><?= $icon ?></span>
                                    </div>
                                    <div style="display:flex; flex-direction:column; overflow:hidden;">
                                        <span style="font-weight:600; font-size:14px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?= htmlspecialchars($e['file_name']) ?></span>
                                        <span style="font-size:12px; color:var(--outline);"><?= date('d M Y, H:i', strtotime($e['uploaded_at'])) ?></span>
                                    </div>
                                </div>
                                <a href="<?= htmlspecialchars($e['file_path']) ?>" download class="btn-icon-plain" title="Download Document" style="color:var(--primary);"><span class="material-symbols-outlined">download</span></a>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                            </div>
                            <button class="btn-icon-plain" title="Download Document" style="color:var(--primary);"><span class="material-symbols-outlined">download</span></button>
                        </div>
                        <!-- Evidence 2 -->
                        <div class="cd-evidence-box">
                            <div style="display:flex; align-items:center; gap:12px; overflow:hidden;">
                                <div class="icon-wrapper-sm text-secondary" style="background:rgba(138, 172, 254, 0.4); flex-shrink:0;">
                                    <span class="material-symbols-outlined">image</span>
                                </div>
                                <div style="display:flex; flex-direction:column; overflow:hidden;">
                                    <span style="font-weight:600; font-size:14px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Doorbell_Camera_Timestamp_0920.jpg</span>
                                    <span style="font-size:12px; color:var(--outline);">3.4 MB • Arrival Video Timestamp</span>
                                </div>
                            </div>
                            <button class="btn-icon-plain" title="Download Document" style="color:var(--primary);"><span class="material-symbols-outlined">download</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adjudication Center -->
            <div class="cd-info-strip" style="display:flex; flex-direction:column; gap:20px;">
                <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:16px;">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="icon-wrapper-sm bg-primary-container text-on-primary">
                            <span class="material-symbols-outlined">admin_panel_settings</span>
                        </div>
                        <div>
                            <h2 style="font-size:24px; font-weight:600; margin:0;">Admin Adjudication Center</h2>
                            <span style="font-size:12px; color:var(--outline);">Controlled resolution according to SafeHands Clinical Mediation Guidelines</span>
                        </div>
                    </div>
                    <span class="badge-tag" style="background:var(--surface-container); color:var(--primary); font-weight:600;">Phase: Under Active Review</span>
                </div>

                <div style="background:var(--surface-muted); padding:16px; border-radius:12px; display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px;">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <span class="material-symbols-outlined text-primary" style="font-size:32px;">verified_user</span>
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-size:14px; font-weight:600;">Escrow Holding Pool: LKR 6,400.00</span>
                            <span style="font-size:12px; color:var(--outline);">Authorized action triggers automatic financial journal adjustments.</span>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <button type="button" class="btn btn-primary" style="background:var(--status-success); border:none; padding:12px 20px; display:flex; align-items:center; gap:8px;" onclick="openResolveModal()">
                            <span class="material-symbols-outlined icon-sm">check_circle</span> Resolve Complaint
                        </button>
                        <button type="button" class="btn btn-primary" style="background:var(--error); border:none; padding:12px 20px; display:flex; align-items:center; gap:8px;" onclick="openRejectModal()">
                            <span class="material-symbols-outlined icon-sm">cancel</span> Reject Complaint
                        </button>
                    </div>
                </div>
            </div>

            <!-- Official Resolution Dossier (Hidden by default, shown via JS if we want, but html shows it. Let's keep it but maybe hide it if not resolved? Wait, the design shows it, I'll add an ID) -->
            <div class="cd-info-strip" id="resolutionDossierCard" style="display:none; flex-direction:column; gap:16px;">
                <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:12px;">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="icon-wrapper-sm text-status-success" style="background:rgba(2, 87, 71, 0.15);">
                            <span class="material-symbols-outlined">task_alt</span>
                        </div>
                        <div>
                            <h3 style="font-size:24px; font-weight:600; margin:0;">Official Resolution Dossier</h3>
                            <span style="font-size:12px; color:var(--outline);">Legally binding platform adjudication summary</span>
                        </div>
                    </div>
                    <span class="badge-tag" style="background:rgba(2, 87, 71, 0.15); color:var(--status-success); font-weight:600; display:flex; align-items:center; gap:6px;">
                        <span class="dot-sm bg-success"></span> RESOLVED — Settlement Approved
                    </span>
                </div>
                
                <div class="grid-2-col" style="margin-bottom:0;">
                    <div style="background:var(--surface-muted); padding:12px; border-radius:8px; display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--outline);">Adjudicator</span>
                        <span style="font-weight:600;">Admin User (SYSTEM ROOT)</span>
                    </div>
                    <div style="background:var(--surface-muted); padding:12px; border-radius:8px; display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--outline);">Resolution Date</span>
                        <span style="font-weight:600;" id="resDateText">17 Oct 2026, 02:30 PM (Colombo)</span>
                    </div>
                </div>

                <div style="background:var(--surface-muted); padding:16px; border-radius:12px; display:flex; flex-direction:column; gap:8px;">
                    <span class="uppercase-label" style="margin:0;">Formal Administrative Findings</span>
                    <p style="font-size:16px; line-height:1.6; margin:0;" id="resNotesText">
                        Investigation concluded with caregiver attendance logs and GPS arrival confirmation. Caregiver acknowledged unavoidable vehicle breakdown but failed standard protocol of dispatching an advance notification to the family. Resolution terms: 50% shift fee refund (LKR 3,200.00) credited back to family member Sithmini Rathnayake. Remaining balance settled to caregiver. Kumara Pathirana issued a formal punctuality warning in SafeHands internal registry.
                    </p>
                </div>

                <div style="background:var(--surface-container); padding:14px; border-radius:8px; display:flex; align-items:center; justify-content:space-between; font-size:14px;">
                    <span style="font-weight:600; color:var(--on-secondary-container); display:flex; align-items:center; gap:8px;">
                        <span class="material-symbols-outlined icon-sm">account_balance_wallet</span> Simulated Escrow Settlement Summary
                    </span>
                    <span class="font-mono" style="font-weight:600;" id="resEscrowText">
                        LKR 3,200.00 Refunded | LKR 3,200.00 Caregiver Payout | Platform Fee Waived
                    </span>
                </div>
            </div>

        </div>

        <!-- RIGHT 4 COLUMNS -->
        <div style="display:flex; flex-direction:column; gap:24px;">
            
            <!-- Audit Trail Stepper -->
            <div class="cd-info-strip" style="display:flex; flex-direction:column; gap:20px;">
                <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:12px;">
                    <h2 style="font-size:24px; font-weight:600; margin:0;">Audit Trail</h2>
                    <span class="font-mono uppercase-label" style="margin:0;">4 ENTRIES</span>
                </div>
                
                <div class="audit-timeline">
                    <!-- Step 1 -->
                    <div class="timeline-item">
                        <div class="timeline-icon bg-surface-container-high text-primary"><span class="material-symbols-outlined icon-xs">edit_note</span></div>
                        <div class="timeline-content">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span style="font-size:14px; font-weight:600;">Complaint Submitted</span>
                                <span style="font-size:12px; color:var(--outline);">09:42 AM</span>
                            </div>
                            <span style="font-size:12px; color:var(--outline);">16 Oct 2026 • By Sithmini Rathnayake</span>
                            <p style="font-size:14px; color:var(--on-surface-variant); margin:4px 0 0 0;">Incident filed with 2 supporting attachments. Lifecycle initialized to Pending.</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="timeline-item">
                        <div class="timeline-icon text-on-surface" style="background:rgba(254, 187, 2, 0.2);"><span class="material-symbols-outlined icon-xs">search</span></div>
                        <div class="timeline-content">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span style="font-size:14px; font-weight:600;">Review Initiated</span>
                                <span style="font-size:12px; color:var(--outline);">11:15 AM</span>
                            </div>
                            <span style="font-size:12px; color:var(--outline);">16 Oct 2026 • By Admin User</span>
                            <p style="font-size:14px; color:var(--on-surface-variant); margin:4px 0 0 0;">Status transitioned to Under Review. Caregiver notified of active inquiry. Escrow frozen.</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="timeline-item">
                        <div class="timeline-icon bg-surface-container-high text-primary"><span class="material-symbols-outlined icon-xs">phone_in_talk</span></div>
                        <div class="timeline-content">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span style="font-size:14px; font-weight:600;">Caregiver Statement</span>
                                <span style="font-size:12px; color:var(--outline);">03:45 PM</span>
                            </div>
                            <span style="font-size:12px; color:var(--outline);">16 Oct 2026 • By Admin User</span>
                            <p style="font-size:14px; color:var(--on-surface-variant); margin:4px 0 0 0;">Telephone interview conducted with Kumara Pathirana; vehicle mechanical delay statement logged.</p>
                        </div>
                    </div>
                    <!-- Step 4 (Hidden until resolved) -->
                    <div class="timeline-item" id="auditStep4" style="display:none;">
                        <div class="timeline-icon bg-success text-on-primary"><span class="material-symbols-outlined icon-xs">check</span></div>
                        <div class="timeline-content">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span style="font-size:14px; font-weight:600;" class="text-success" id="auditStep4Title">Resolution Approved</span>
                                <span style="font-size:12px; color:var(--outline);">Just Now</span>
                            </div>
                            <span style="font-size:12px; color:var(--outline);">By Admin User</span>
                            <p style="font-size:14px; color:var(--on-surface-variant); margin:4px 0 0 0;" id="auditStep4Text">Case concluded. Record closed.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caregiver Track Record -->
            <div class="cd-info-strip" style="display:flex; flex-direction:column; gap:16px;">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <span class="uppercase-label" style="margin:0;">Caregiver History (CG-2026-0192)</span>
                    <span class="text-success" style="font-size:12px; font-weight:600;">Active Staff</span>
                </div>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div style="display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--on-surface-variant);">Completed Shifts</span>
                        <span style="font-weight:600;">24 shifts (192 hrs)</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--on-surface-variant);">Punctuality Score</span>
                        <span style="font-weight:600;">94.2%</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--on-surface-variant);">Prior Infractions</span>
                        <span style="font-weight:600;">0 prior strikes</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; font-size:14px;">
                        <span style="color:var(--on-surface-variant);">CPR / BLS Re-cert Date</span>
                        <span style="font-weight:600;">14 Nov 2027</span>
                    </div>
                </div>
                <div style="border-top:1px solid var(--surface-container); padding-top:12px; display:flex; flex-direction:column; gap:8px;">
                    <span class="uppercase-label" style="margin:0;">Internal Registry Note</span>
                    <span style="font-size:12px; color:var(--on-surface-variant);">First verified violation. Formal Punctuality Notice #WRN-8821 dispatched to practitioner profile.</span>
                </div>
            </div>

            <!-- Metadata Note -->
            <div style="background:var(--surface-muted); padding:20px; border-radius:12px; display:flex; flex-direction:column; gap:8px; font-size:12px; color:var(--outline);">
                <div style="display:flex; align-items:center; gap:8px; color:var(--on-surface-variant); font-weight:600;">
                    <span class="material-symbols-outlined icon-sm">verified</span> SafeHands Healthcare Administration Protocol
                </div>
                <p style="margin:0; line-height:1.5;">Complaint Record #<?= htmlspecialchars($c['complaint_ref'] ?? '') ?> • Permanent cryptographic ledger retained in compliance with Sri Lanka Healthcare Consumer Safety Guidelines (2026 Revision).</p>
            </div>
            
        </div>
    </div>

</div>

<!-- Resolve Modal -->
<div class="modal-overlay hidden" id="resolveModal">
    <div class="modal-content modal-md">
        <div style="display:flex; flex-direction:column; gap:20px;">
            <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:16px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div class="icon-wrapper-sm text-status-success" style="background:rgba(2, 87, 71, 0.15);">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <h3 style="margin:0; font-size:20px; font-weight:600;">Resolve Complaint #<?= htmlspecialchars($c['complaint_ref'] ?? '') ?></h3>
                </div>
                <button class="btn-icon-plain" onclick="closeResolveModal()"><span class="material-symbols-outlined">close</span></button>
            </div>
            
            <div style="display:flex; flex-direction:column; gap:16px; font-size:14px;">
                <div class="filter-group" style="gap:6px;">
                    <label style="font-weight:600; color:var(--on-surface);">Resolution Category</label>
                    <select id="resolveCategorySelect" style="width:100%; padding:10px 16px; background:var(--surface-container-low); border-radius:8px; border:none; outline:none; font-size:16px;">
                        <option value="partial">Partial Settlement (50% Refund to Family Escrow)</option>
                        <option value="full">Full Refund (100% Refund to Family Escrow)</option>
                        <option value="warning">Mediation Completed &amp; Punctuality Warning</option>
                        <option value="retraining">Caregiver Re-training Assigned</option>
                    </select>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-weight:600; color:var(--on-surface);">Simulated Escrow Adjustment</label>
                    <div style="background:var(--surface-muted); padding:12px; border-radius:8px; display:flex; justify-content:space-between; font-family:monospace; font-size:14px;">
                        <span>Escrow Release to Family:</span>
                        <strong class="text-success">LKR 3,200.00 (50%)</strong>
                    </div>
                </div>
                
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-weight:600; color:var(--on-surface);">Formal Resolution Findings &amp; Terms</label>
                    <textarea id="resolveNotesInput" rows="4" style="width:100%; padding:12px; background:var(--surface-container-low); border-radius:8px; border:none; outline:none; font-size:16px; resize:none;">Investigation concluded with caregiver attendance logs and GPS arrival confirmation. Caregiver acknowledged vehicle breakdown. 50% refund issued to family.</textarea>
                </div>
            </div>
            
            <div style="display:flex; justify-content:flex-end; gap:12px; padding-top:16px; border-top:1px solid var(--surface-container);">
                <button type="button" class="btn btn-neutral" onclick="closeResolveModal()">Cancel</button>
                <button type="button" class="btn btn-primary" style="background:var(--status-success); border:none; display:flex; align-items:center; gap:8px;" onclick="confirmResolutionAction()">
                    <span class="material-symbols-outlined icon-sm">verified</span> Confirm Resolution
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal-overlay hidden" id="rejectModal">
    <div class="modal-content modal-md">
        <div style="display:flex; flex-direction:column; gap:20px;">
            <div style="display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--surface-container); padding-bottom:16px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div class="icon-wrapper-sm bg-error-container text-error">
                        <span class="material-symbols-outlined">cancel</span>
                    </div>
                    <h3 style="margin:0; font-size:20px; font-weight:600;">Reject Complaint #<?= htmlspecialchars($c['complaint_ref'] ?? '') ?></h3>
                </div>
                <button class="btn-icon-plain" onclick="closeRejectModal()"><span class="material-symbols-outlined">close</span></button>
            </div>
            
            <div style="display:flex; flex-direction:column; gap:16px; font-size:14px;">
                <div style="background:rgba(255, 218, 214, 0.4); padding:12px; border-radius:8px; color:var(--on-surface);">
                    Rejecting this complaint will release full simulated escrow (LKR 6,400.00) to caregiver Kumara Pathirana and mark this ticket as Dismissed.
                </div>
                
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label style="font-weight:600; color:var(--on-surface);">Reason for Administrative Rejection</label>
                    <textarea id="rejectNotesInput" rows="4" placeholder="Provide formal justification for rejecting this complaint..." style="width:100%; padding:12px; background:var(--surface-container-low); border-radius:8px; border:none; outline:none; font-size:16px; resize:none;"></textarea>
                </div>
            </div>
            
            <div style="display:flex; justify-content:flex-end; gap:12px; padding-top:16px; border-top:1px solid var(--surface-container);">
                <button type="button" class="btn btn-neutral" onclick="closeRejectModal()">Cancel</button>
                <button type="button" class="btn btn-primary" style="background:var(--error); border:none; display:flex; align-items:center; gap:8px;" onclick="confirmRejectionAction()">
                    <span class="material-symbols-outlined icon-sm">gavel</span> Confirm Rejection
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function setLifecycleState(state) {
    if(confirm('Are you sure you want to change status to ' + state + '?')) {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '/safehands_mvc/admin/updateComplaintStatus';
        
        let idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'complaint_id';
        idInput.value = '<?= $c['id'] ?? '' ?>';
        form.appendChild(idInput);
        
        let statusInput = document.createElement('input');
        statusInput.type = 'hidden';
        statusInput.name = 'status';
        statusInput.value = state;
        form.appendChild(statusInput);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
