<div class="dashboard-container">

    <!-- PAGE HEADER -->
    <div class="page-header" style="margin-bottom:24px;">
        <div style="display:flex; flex-direction:column; gap:8px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <h1 class="page-title">Complaints</h1>
                <span class="badge-tag" style="background-color:var(--surface-container-high); color:var(--on-surface-variant); font-weight:600; display:inline-flex; align-items:center; gap:6px;">
                    <span class="dot-sm bg-primary"></span>
                    Case Resolution Workflow • Auto-Audit Enabled
                </span>
            </div>
            <p class="page-subtitle" style="margin:0;">Review and manage complaints submitted by SafeHands users.</p>
        </div>
    </div>

    <!-- FOUR SUMMARY METRIC CARDS -->
    <div class="payments-kpi-grid">
        <!-- Total Complaints -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Total Complaints</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-on-surface">
                    <span class="material-symbols-outlined icon-sm">inventory_2</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">24</span>
                </div>
                <p class="kpi-desc">All logged dispute cases</p>
            </div>
        </div>

        <!-- Pending -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Pending</span>
                <div class="icon-wrapper-sm bg-surface-container-low" style="color:var(--status-warning);">
                    <span class="material-symbols-outlined icon-sm">schedule</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">5</span>
                    <span class="kpi-badge" style="background:var(--surface-container-high); color:var(--on-surface);">Action Required</span>
                </div>
                <p class="kpi-desc">Awaiting triage &amp; initial review</p>
            </div>
        </div>

        <!-- Under Review -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Under Review</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined icon-sm">find_in_page</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">7</span>
                    <span class="kpi-badge" style="background:var(--surface-container); color:var(--on-secondary-container);">Active</span>
                </div>
                <p class="kpi-desc">Active case investigations</p>
            </div>
        </div>

        <!-- Resolved -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Resolved</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-success">
                    <span class="material-symbols-outlined icon-sm">check_circle</span>
                </div>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">12</span>
                    <span class="kpi-badge" style="background:var(--surface-container); color:var(--status-success);">50% Close Rate</span>
                </div>
                <p class="kpi-desc">Closed with case documentation</p>
            </div>
        </div>
    </div>

    <!-- COMPLAINT FILTERS SECTION -->
    <div class="card" style="margin-bottom:24px; padding:24px;">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined text-outline">tune</span>
                <h2 style="font-size:18px; font-weight:600; margin:0;">Filter &amp; Query Cases</h2>
            </div>
            <span style="font-size:12px; color:var(--outline);">Real-time parameters</span>
        </div>

        <div class="complaints-filter-grid">
            <div class="filter-group">
                <label>Case or Booking ID</label>
                <div class="select-wrapper">
                    <span class="material-symbols-outlined" style="left:12px; right:auto;">tag</span>
                    <input type="text" id="filterId" placeholder="e.g. CMP-2026-0042, BK-00125" style="padding-left:40px;">
                </div>
            </div>
            <div class="filter-group">
                <label>Family Member</label>
                <div class="select-wrapper">
                    <span class="material-symbols-outlined" style="left:12px; right:auto;">person</span>
                    <input type="text" id="filterFamily" placeholder="e.g. Sithmini, Dhammika" style="padding-left:40px;">
                </div>
            </div>
            <div class="filter-group">
                <label>Caregiver</label>
                <div class="select-wrapper">
                    <span class="material-symbols-outlined" style="left:12px; right:auto;">medical_services</span>
                    <input type="text" id="filterCaregiver" placeholder="e.g. Sarah, Nadeesha" style="padding-left:40px;">
                </div>
            </div>
            <div class="filter-group">
                <label>Complaint Type</label>
                <div class="select-wrapper">
                    <select id="filterType">
                        <option value="">All Types</option>
                        <option value="Service Quality">Service Quality</option>
                        <option value="Booking Issue">Booking Issue</option>
                        <option value="Caregiver Issue">Caregiver Issue</option>
                        <option value="Family Member Issue">Family Member Issue</option>
                        <option value="Payment Issue">Payment Issue</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="material-symbols-outlined">arrow_drop_down</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Status</label>
                <div class="select-wrapper">
                    <select id="filterStatus">
                        <option value="">All Statuses</option>
                        <option value="Pending">Pending</option>
                        <option value="Under Review">Under Review</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                    <span class="material-symbols-outlined">arrow_drop_down</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Date From</label>
                <div class="select-wrapper">
                    <span class="material-symbols-outlined" style="left:12px; right:auto;">calendar_today</span>
                    <input type="date" id="dateFrom" style="padding-left:40px;">
                </div>
            </div>
            <div class="filter-group">
                <label>Date To</label>
                <div class="select-wrapper">
                    <span class="material-symbols-outlined" style="left:12px; right:auto;">calendar_today</span>
                    <input type="date" id="dateTo" style="padding-left:40px;">
                </div>
            </div>
            <div class="filter-group" style="display:flex; flex-direction:row; align-items:flex-end; gap:8px;">
                <button type="button" class="btn btn-primary" id="applyFiltersBtn" style="flex:1; display:flex; justify-content:center; gap:8px;">
                    <span class="material-symbols-outlined icon-sm">search</span> Apply Filters
                </button>
                <button type="button" class="btn btn-neutral" id="resetFiltersBtn">Reset</button>
            </div>
        </div>
    </div>

    <!-- COMPLAINTS MONITORING TABLE -->
    <div class="card" style="padding:0; margin-bottom:24px;">
        <div style="padding:16px 24px; display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:12px;">
                <h2 style="font-size:18px; font-weight:600; margin:0;">Dispute &amp; Grievance Ledger</h2>
                <span class="badge-tag" style="background:var(--surface-container); color:var(--on-surface-variant);" id="tableCountBadge">24 Records logged</span>
            </div>
            <span style="font-size:12px; color:var(--outline);">Sorted by newest first</span>
        </div>

        <div class="table-responsive">
            <table class="data-table" id="complaintsTable">
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Submitted By</th>
                        <th>Against</th>
                        <th>Booking ID</th>
                        <th>Complaint Type</th>
                        <th>Submitted Date</th>
                        <th>Status</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
    <?php if (!empty($data['complaints'])): ?>
        <?php foreach($data['complaints'] as $c): ?>
        <tr class="complaint-row" data-id="<?= htmlspecialchars($c['complaint_ref']) ?>" data-booking="<?= htmlspecialchars($c['booking_id']) ?>" data-family="<?= htmlspecialchars($c['family_name']) ?>" data-caregiver="<?= htmlspecialchars($c['caregiver_name']) ?>" data-type="<?= htmlspecialchars($c['type']) ?>" data-status="<?= htmlspecialchars($c['status']) ?>">
            <td class="font-mono" style="font-weight:600;"><?= htmlspecialchars($c['complaint_ref']) ?></td>
            <td>
                <div style="display:flex; align-items:center; gap:8px;">
                    <span style="font-weight:600;"><?= htmlspecialchars($c['family_name']) ?></span>
                    <span class="role-badge-fm">Family Member</span>
                </div>
            </td>
            <td>
                <div style="display:flex; align-items:center; gap:8px;">
                    <span style="font-weight:600;"><?= htmlspecialchars($c['caregiver_name']) ?></span>
                    <span class="role-badge-cg">Caregiver</span>
                </div>
            </td>
            <td>
                <span class="badge-tag font-mono" style="background:var(--surface-container-low); color:var(--outline);">BK-<?= htmlspecialchars(str_pad($c['booking_id'], 4, '0', STR_PAD_LEFT)) ?></span>
            </td>
            <td><span class="complaint-type-badge"><?= htmlspecialchars($c['type']) ?></span></td>
            <td style="color:var(--on-surface-variant);"><?= date('d M Y', strtotime($c['created_at'])) ?></td>
            <td>
                <?php 
                    $badgeClass = 'badge-pending';
                    $icon = 'schedule';
                    if ($c['status'] == 'Resolved') { $badgeClass = 'badge-resolved'; $icon = 'check_circle'; }
                    elseif ($c['status'] == 'Rejected') { $badgeClass = 'badge-rejected'; $icon = 'cancel'; }
                    elseif ($c['status'] == 'Under Review') { $badgeClass = 'badge-under-review'; $icon = 'pending_actions'; }
                ?>
                <span class="status-badge <?= $badgeClass ?>">
                    <span class="material-symbols-outlined icon-sm"><?= $icon ?></span> <?= htmlspecialchars($c['status']) ?>
                </span>
            </td>
            <td style="text-align:right;">
                <a href="/safehands_mvc/admin/complaintDetails/<?= $c['id'] ?>" class="btn btn-outline" style="border:none; padding:4px 8px; color:var(--primary);">
                    View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="8" style="text-align:center; padding:32px; color:var(--outline);">No complaints found in the database.</td></tr>
    <?php endif; ?>
</tbody>
            </table>
        </div>

        <div class="pagination-container" style="padding:16px 24px; border-top:1px solid var(--surface-container); display:flex; justify-content:space-between; align-items:center;">
            <div style="font-size:14px; color:var(--on-surface-variant);">
                Showing <span style="font-weight:600; color:var(--on-surface);">1–8</span> of <span style="font-weight:600; color:var(--on-surface);">24</span> complaints
            </div>
            <div style="display:flex; gap:4px;">
                <button type="button" class="btn btn-neutral" style="padding:4px 12px;" disabled>
                    <span class="material-symbols-outlined icon-sm">chevron_left</span> Previous
                </button>
                <button type="button" class="btn btn-primary" style="padding:4px 12px;">1</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px; border:none;">2</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px; border:none;">3</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px;">
                    Next <span class="material-symbols-outlined icon-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <!-- FOOTER COMPLIANCE CALLOUT -->
    <div style="background:var(--surface-container-low); border-radius:12px; padding:16px; display:flex; align-items:flex-start; gap:12px; color:var(--on-surface-variant); margin-bottom:24px;">
        <span class="material-symbols-outlined text-primary" style="font-size:24px;">info</span>
        <div>
            <span style="font-size:14px; font-weight:600; color:var(--on-surface); display:block; margin-bottom:4px;">Case Resolution Protocol</span>
            <p style="font-size:12px; margin:0; line-height:1.5;">All complaints require administrative triage within 24 hours. Formal case reviews, mediation notes, and outcome resolutions are recorded directly within the Complaint Details view to satisfy SafeHands clinical compliance standards.</p>
        </div>
    </div>

</div>

<script>
    document.getElementById('applyFiltersBtn').addEventListener('click', function() {
        const filterId = document.getElementById('filterId').value.toLowerCase().trim();
        const filterFamily = document.getElementById('filterFamily').value.toLowerCase().trim();
        const filterCaregiver = document.getElementById('filterCaregiver').value.toLowerCase().trim();
        const filterType = document.getElementById('filterType').value;
        const filterStatus = document.getElementById('filterStatus').value;

        const rows = document.querySelectorAll('.complaint-row');
        let visibleCount = 0;

        rows.forEach(function(row) {
            const rowId = row.getAttribute('data-id').toLowerCase();
            const rowBooking = row.getAttribute('data-booking').toLowerCase();
            const rowFamily = row.getAttribute('data-family').toLowerCase();
            const rowCaregiver = row.getAttribute('data-caregiver').toLowerCase();
            const rowType = row.getAttribute('data-type');
            const rowStatus = row.getAttribute('data-status');

            const matchId = !filterId || rowId.includes(filterId) || rowBooking.includes(filterId);
            const matchFamily = !filterFamily || rowFamily.includes(filterFamily);
            const matchCaregiver = !filterCaregiver || rowCaregiver.includes(filterCaregiver);
            const matchType = !filterType || rowType === filterType;
            const matchStatus = !filterStatus || rowStatus === filterStatus;

            if (matchId && matchFamily && matchCaregiver && matchType && matchStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('tableCountBadge').textContent = 'Showing ' + visibleCount + ' filtered records';
    });

    document.getElementById('resetFiltersBtn').addEventListener('click', function() {
        document.getElementById('filterId').value = '';
        document.getElementById('filterFamily').value = '';
        document.getElementById('filterCaregiver').value = '';
        document.getElementById('filterType').value = '';
        document.getElementById('filterStatus').value = '';

        const rows = document.querySelectorAll('.complaint-row');
        rows.forEach(function(row) {
            row.style.display = '';
        });
        document.getElementById('tableCountBadge').textContent = '24 Records logged';
    });
</script>
