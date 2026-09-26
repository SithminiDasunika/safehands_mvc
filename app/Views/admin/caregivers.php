<div class="dashboard-container">
    <!-- Top Navigation Sub-Header / Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-title-row">
                <h1 class="page-title">Caregivers</h1>
                <span class="badge badge-primary-light">Directory</span>
            </div>
            <p class="page-description">View registered caregivers and manage caregiver verification.</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline">
                <span class="material-symbols-outlined">file_download</span>
                <span>Export CSV</span>
            </button>
            <button class="btn btn-primary">
                <span class="material-symbols-outlined">person_add</span>
                <span>Add / Register Caregiver</span>
            </button>
        </div>
    </div>

    <!-- Metric Cards Grid -->
    <div class="metrics-grid">
        <!-- Card 1 -->
        <div class="metric-card">
            <div class="metric-header">
                <span class="metric-title">Total Caregivers</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined">group</span>
                </div>
            </div>
            <div class="metric-body">
                <span class="metric-value">8</span>
                <span class="badge badge-light-primary">Registered</span>
            </div>
            <div class="metric-footer">
                <span class="trend-success">
                    <span class="material-symbols-outlined text-sm">arrow_upward</span> +12%
                </span>
                <span class="trend-text">vs. last month</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="metric-card">
            <div class="metric-header">
                <span class="metric-title">Verified</span>
                <div class="icon-wrapper-sm bg-status-info-light text-status-success">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                </div>
            </div>
            <div class="metric-body">
                <span class="metric-value">5</span>
                <span class="badge badge-light-success">Active</span>
            </div>
            <div class="metric-footer">
                <span class="dot-success"></span>
                <span class="trend-text">62.5% of total roster verified</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="metric-card">
            <div class="metric-header">
                <span class="metric-title">Pending Verification</span>
                <div class="icon-wrapper-sm bg-status-warning-light text-tertiary">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
            </div>
            <div class="metric-body">
                <span class="metric-value">2</span>
                <span class="badge badge-light-warning">Action Required</span>
            </div>
            <div class="metric-footer">
                <span class="dot-warning"></span>
                <span class="trend-text">Awaiting license review</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="metric-card">
            <div class="metric-header">
                <span class="metric-title">Rejected</span>
                <div class="icon-wrapper-sm bg-error-container text-error">
                    <span class="material-symbols-outlined">gpp_bad</span>
                </div>
            </div>
            <div class="metric-body">
                <span class="metric-value">1</span>
                <span class="badge badge-light-error">Action Taken</span>
            </div>
            <div class="metric-footer">
                <span class="dot-error"></span>
                <span class="trend-text">Failed document background check</span>
            </div>
        </div>
    </div>

    <!-- Filter & Search Controls Card -->
    <div class="filters-card">
        <div class="search-row">
            <div class="search-input-wrapper">
                <span class="material-symbols-outlined search-icon">search</span>
                <input type="text" id="caregiverSearch" class="search-input" placeholder="Search caregiver by name, email, phone or caregiver ID...">
            </div>
            <div class="search-actions">
                <button id="searchBtn" class="btn btn-primary-container">
                    <span class="material-symbols-outlined">search</span>
                    <span>Search</span>
                </button>
                <button id="clearFiltersBtn" class="btn btn-text">Clear Filters</button>
            </div>
        </div>
        
        <div class="filters-grid">
            <div class="filter-group">
                <label>Verification Status</label>
                <div class="select-wrapper">
                    <select id="statusFilter" class="custom-select">
                        <option value="all">All Statuses</option>
                        <option value="verified">Verified</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
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
                        <option value="galle">Galle</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Experience Level</label>
                <div class="select-wrapper">
                    <select id="experienceFilter" class="custom-select">
                        <option value="all">All Experience Levels</option>
                        <option value="1-3">1 - 3 Years</option>
                        <option value="4-7">4 - 7 Years</option>
                        <option value="8+">8+ Years</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Qualification</label>
                <div class="select-wrapper">
                    <select id="qualFilter" class="custom-select">
                        <option value="all">All Qualifications</option>
                        <option value="rn">Registered Nurse (RN)</option>
                        <option value="dn">Diploma in Nursing</option>
                        <option value="cna">Certified Nursing Assistant</option>
                        <option value="hha">Home Health Aide</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Caregiver Directory Table Card -->
    <div class="directory-card">
        <div class="directory-header">
            <div class="header-left">
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined">medical_services</span>
                </div>
                <div>
                    <h2>Caregiver Directory</h2>
                    <span class="subtitle">Viewing all registered healthcare professionals</span>
                </div>
            </div>
            <div class="header-right">
                <span class="badge badge-secondary-light">8 Caregivers Listed</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Caregiver</th>
                        <th>Caregiver ID</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>District</th>
                        <th>Verification Status</th>
                        <th>Registered Date</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($caregivers)): ?>
                        <?php foreach ($caregivers as $c): ?>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <img src="<?= htmlspecialchars($c['profile_photo'] ?? 'https://ui-avatars.com/api/?name='.urlencode($c['full_name']).'&background=random') ?>" alt="Avatar" class="avatar-sm">
                                        <div class="user-details">
                                            <span class="name"><?= htmlspecialchars($c['full_name']) ?></span>
                                            <span class="id"><?= htmlspecialchars($c['email']) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-medium text-on-surface-variant">#CG-<?= str_pad($c['caregiver_id'], 4, '0', STR_PAD_LEFT) ?></td>
                                <td class="font-medium"><?= htmlspecialchars($c['highest_qualification']) ?></td>
                                <td class="text-on-surface-variant"><?= htmlspecialchars($c['years_experience']) ?> years</td>
                                <td class="text-on-surface-variant"><?= htmlspecialchars(date('M Y', strtotime($c['created_at']))) ?></td>
                                <td>
                                    <?php 
                                        $status = strtolower($c['verification_status'] ?? 'pending');
                                        if ($status === 'verified'): 
                                    ?>
                                        <span class="tag tag-success"><span class="dot dot-success"></span> VERIFIED</span>
                                    <?php elseif ($status === 'rejected'): ?>
                                        <span class="tag tag-error"><span class="dot dot-error"></span> REJECTED</span>
                                    <?php else: ?>
                                        <span class="tag tag-warning"><span class="dot dot-warning"></span> PENDING</span>
                                    <?php endif; ?>
                                </td>
                                <td class="action-cell">
                                    <a href="/safehands_mvc/admin/caregiverDetails/<?= $c['caregiver_id'] ?>" class="btn-icon">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" style="text-align: center;">No caregivers found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="table-pagination">
            <div class="pagination-info">
                Showing <span>1–8</span> of <span>24</span> caregivers
            </div>
            <div class="pagination-controls">
                <button class="btn-page disabled" disabled>Previous</button>
                <button class="btn-page active">1</button>
                <button class="btn-page">2</button>
                <button class="btn-page">3</button>
                <button class="btn-page">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const clearBtn = document.getElementById('clearFiltersBtn');
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            const searchInput = document.getElementById('caregiverSearch');
            const statusSelect = document.getElementById('statusFilter');
            const districtSelect = document.getElementById('districtFilter');
            const expSelect = document.getElementById('experienceFilter');
            const qualSelect = document.getElementById('qualFilter');
            
            if (searchInput) searchInput.value = '';
            if (statusSelect) statusSelect.value = 'all';
            if (districtSelect) districtSelect.value = 'all';
            if (expSelect) expSelect.value = 'all';
            if (qualSelect) qualSelect.value = 'all';
        });
    }
});
</script>
