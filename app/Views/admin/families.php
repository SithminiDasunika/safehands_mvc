<div class="dashboard-container">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">Family Members</h1>
            <p class="page-description">View and manage registered SafeHands family members.</p>
        </div>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="metrics-grid metrics-grid-4">
        <!-- Card 1: Total Families -->
        <div class="metric-card">
            <div class="metric-header">
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined">family_restroom</span>
                </div>
                <span class="badge-tag tag-neutral-sm">Registered</span>
            </div>
            <div class="metric-value-row">
                <span class="metric-value-lg">15</span>
            </div>
            <p class="metric-sub">All verified guardian accounts</p>
        </div>

        <!-- Card 2: Active -->
        <div class="metric-card">
            <div class="metric-header">
                <div class="icon-wrapper-sm bg-success-light text-success">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">check_circle</span>
                </div>
                <span class="badge-tag tag-success-sm">Active</span>
            </div>
            <div class="metric-value-row">
                <span class="metric-value-lg">13</span>
            </div>
            <p class="metric-sub">86.7% operational access</p>
        </div>

        <!-- Card 3: Suspended -->
        <div class="metric-card">
            <div class="metric-header">
                <div class="icon-wrapper-sm bg-error-container text-error">
                    <span class="material-symbols-outlined">block</span>
                </div>
                <span class="badge-tag tag-error-sm">Action Taken</span>
            </div>
            <div class="metric-value-row">
                <span class="metric-value-lg">1</span>
            </div>
            <p class="metric-sub">Account access revoked</p>
        </div>

        <!-- Card 4: With Active Bookings -->
        <div class="metric-card">
            <div class="metric-header">
                <div class="icon-wrapper-sm bg-blue-light text-primary-container">
                    <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <span class="badge-tag tag-blue-sm">In Service</span>
            </div>
            <div class="metric-value-row">
                <span class="metric-value-lg">8</span>
            </div>
            <p class="metric-sub">Currently assigned caregivers</p>
        </div>
    </div>

    <!-- SEARCH & FILTERS CARD -->
    <div class="filters-card">
        <div class="search-row">
            <div class="search-input-wrapper">
                <span class="material-symbols-outlined search-icon">search</span>
                <input type="text" id="searchInput" class="search-input" placeholder="Search family member by name, email, phone or family ID...">
            </div>
            <div class="search-actions">
                <button id="searchBtn" class="btn btn-primary-container">
                    <span class="material-symbols-outlined">search</span>
                    <span>Search</span>
                </button>
                <button id="clearBtn" class="btn btn-muted">Clear</button>
            </div>
        </div>

        <div class="filters-grid filters-grid-3">
            <div class="filter-group">
                <label>Account Status</label>
                <div class="select-wrapper">
                    <select id="statusFilter" class="custom-select">
                        <option value="all">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="suspended">Suspended</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
            <div class="filter-group">
                <label>District</label>
                <div class="select-wrapper">
                    <select id="districtFilter" class="custom-select">
                        <option value="all">All Districts</option>
                        <option value="colombo">Colombo</option>
                        <option value="gampaha">Gampaha</option>
                        <option value="kandy">Kandy</option>
                        <option value="kalutara">Kalutara</option>
                        <option value="galle">Galle</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Booking Activity</label>
                <div class="select-wrapper">
                    <select id="bookingFilter" class="custom-select">
                        <option value="all">All Activity</option>
                        <option value="with_active">With Active Bookings</option>
                        <option value="no_active">No Active Bookings</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
        </div>
    </div>

    <!-- FAMILY MEMBERS TABLE CARD -->
    <div class="directory-card">
        <div class="directory-header">
            <div class="header-left">
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <span class="table-card-title">Registered Family Members</span>
            </div>
            <span class="badge-pill-primary">Showing 15 Families</span>
        </div>

        <div class="table-responsive">
            <table class="data-table families-table">
                <thead>
                    <tr>
                        <th>
                            <div class="th-sortable">
                                <span>Family Member</span>
                                <span class="material-symbols-outlined sort-icon">arrow_downward</span>
                            </div>
                        </th>
                        <th>Family ID</th>
                        <th>Contact Details</th>
                        <th>District</th>
                        <th>Active Bookings</th>
                        <th>Account Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody id="familyTableBody">
                    <?php if (!empty($families)): ?>
                        <?php foreach ($families as $f): ?>
                            <tr class="table-row-hover">
                                <td>
                                    <div class="user-cell">
                                        <div class="avatar-initials bg-amber-100 text-tertiary-color"><?= htmlspecialchars(substr($f['full_name'], 0, 2)) ?></div>
                                        <div class="user-details">
                                            <span class="name name-hover"><?= htmlspecialchars($f['full_name']) ?></span>
                                            <span class="id">Guardian · Primary</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-mono text-outline family-id">#FM-<?= str_pad($f['family_id'], 4, '0', STR_PAD_LEFT) ?></td>
                                <td>
                                    <div class="contact-col">
                                        <span class="contact-email"><?= htmlspecialchars($f['email']) ?></span>
                                        <span class="contact-phone"><?= htmlspecialchars($f['phone']) ?></span>
                                    </div>
                                </td>
                                <td class="text-on-surface-variant"><?= htmlspecialchars($f['address'] ?? 'N/A') ?></td>
                                <td>
                                    <?php if ($f['patient_count'] > 0): ?>
                                    <span class="booking-tag booking-active">
                                        <span class="booking-dot animate-pulse"></span> <?= $f['patient_count'] ?> Patient(s)
                                    </span>
                                    <?php else: ?>
                                    <span class="booking-tag booking-none">
                                        0 Patients
                                    </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="status-tag status-active">
                                        <span class="dot-sm bg-success"></span> <?= ucfirst($f['status']) ?>
                                    </span>
                                </td>
                                <td class="text-right">
                                    <a href="/safehands_mvc/admin/familyDetails/<?= $f['family_id'] ?>" class="btn btn-sm btn-primary-container" style="text-decoration:none;">
                                        View Details <span class="material-symbols-outlined icon-xs">chevron_right</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" style="text-align:center;">No family accounts found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="table-pagination">
            <span class="pagination-info">Showing <span>1–10</span> of <span>15</span> families</span>
            <div class="pagination-controls">
                <button class="btn-page disabled" disabled>
                    <span class="material-symbols-outlined icon-xs">west</span> Previous
                </button>
                <button class="btn-page active">1</button>
                <button class="btn-page">2</button>
                <button class="btn-page">
                    Next <span class="material-symbols-outlined icon-xs">east</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const searchInput = document.getElementById('searchInput');
    const clearBtn    = document.getElementById('clearBtn');
    const searchBtn   = document.getElementById('searchBtn');
    const statusFilter   = document.getElementById('statusFilter');
    const districtFilter = document.getElementById('districtFilter');
    const bookingFilter  = document.getElementById('bookingFilter');
    const tableBody = document.getElementById('familyTableBody');
    const rows = tableBody ? Array.from(tableBody.getElementsByTagName('tr')) : [];

    function filterTable() {
        const query      = (searchInput?.value || '').toLowerCase().trim();
        const statusVal  = statusFilter?.value  || 'all';
        const districtVal= districtFilter?.value|| 'all';
        const bookingVal = bookingFilter?.value || 'all';

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchesQuery    = !query || text.includes(query);
            let   matchesStatus   = true;
            let   matchesDistrict = true;
            let   matchesBooking  = true;

            if (statusVal === 'active')    matchesStatus = text.includes('active') && !text.includes('suspended');
            if (statusVal === 'suspended') matchesStatus = text.includes('suspended');

            if (districtVal !== 'all') matchesDistrict = text.includes(districtVal);

            if (bookingVal === 'with_active') matchesBooking = /[1-9]\s*active/.test(text);
            if (bookingVal === 'no_active')   matchesBooking = text.includes('0 active');

            row.style.display = (matchesQuery && matchesStatus && matchesDistrict && matchesBooking) ? '' : 'none';
        });
    }

    if (searchBtn) searchBtn.addEventListener('click', filterTable);
    if (searchInput) searchInput.addEventListener('keyup', e => { if (e.key === 'Enter') filterTable(); });
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            if (searchInput)    searchInput.value = '';
            if (statusFilter)   statusFilter.value = 'all';
            if (districtFilter) districtFilter.value = 'all';
            if (bookingFilter)  bookingFilter.value = 'all';
            filterTable();
        });
    }
    if (statusFilter)   statusFilter.addEventListener('change', filterTable);
    if (districtFilter) districtFilter.addEventListener('change', filterTable);
    if (bookingFilter)  bookingFilter.addEventListener('change', filterTable);

    document.querySelectorAll('.family-view-details').forEach(button => {
    button.addEventListener('click', () => {
        window.location.href = '/safehands_mvc/admin/familyDetails';
    });
});
})();
</script>
