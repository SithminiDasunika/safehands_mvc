<div class="dashboard-container">

    <!-- Header -->
    <div class="page-header" style="margin-bottom:24px;">
        <div>
            <div style="display:flex; align-items:center; gap:12px;">
                <h1 class="page-title">Payments</h1>
                <div class="badge-tag" style="background-color:var(--surface-container); color:var(--primary); font-weight:600; display:inline-flex; align-items:center; gap:6px;">
                    <span class="material-symbols-outlined icon-sm">security</span>
                    Simulated Payment System — No real financial transactions.
                </div>
            </div>
            <p class="page-subtitle" style="margin-top:8px;">Monitor simulated payment records, commission, and caregiver payouts across clinical care schedules.</p>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="payments-kpi-grid">
        <!-- Total Payments -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Total Payments</span>
                <span class="kpi-badge badge-all">ALL TRANSACTIONS</span>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">28</span>
                    <span class="kpi-currency">LKR 179,200</span>
                </div>
                <p class="kpi-desc">28 total simulated bookings invoiced</p>
            </div>
            <div class="kpi-progress-bar">
                <div class="kpi-progress-fill bg-primary" style="width: 100%;"></div>
            </div>
        </div>
        
        <!-- Held Payments -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Held Payments</span>
                <span class="kpi-badge badge-escrow">
                    <span class="material-symbols-outlined icon-xs" style="font-variation-settings: 'FILL' 1;">lock</span> IN ESCROW
                </span>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">6</span>
                    <span class="kpi-currency">LKR 38,400</span>
                </div>
                <p class="kpi-desc">Held pending caregiver arrival &amp; care report submission</p>
            </div>
            <div class="kpi-progress-bar">
                <div class="kpi-progress-fill bg-warning" style="width: 21.4%;"></div>
            </div>
        </div>
        
        <!-- Released Payments -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Released Payments</span>
                <span class="kpi-badge badge-settled">
                    <span class="material-symbols-outlined icon-xs">check_circle</span> SETTLED
                </span>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num">18</span>
                    <span class="kpi-currency">LKR 115,200</span>
                </div>
                <p class="kpi-desc">Verified shifts released to caregiver balances</p>
            </div>
            <div class="kpi-progress-bar">
                <div class="kpi-progress-fill bg-success" style="width: 64.3%;"></div>
            </div>
        </div>
        
        <!-- Commission -->
        <div class="kpi-card">
            <div class="kpi-header">
                <span class="kpi-title">Platform Commission</span>
                <span class="kpi-badge badge-fee">10% FEE</span>
            </div>
            <div class="kpi-value-row">
                <div class="kpi-main-val">
                    <span class="kpi-num text-primary">LKR 17,920</span>
                </div>
                <p class="kpi-desc">SafeHands operational &amp; quality assurance fee</p>
            </div>
            <div class="kpi-progress-bar">
                <div class="kpi-progress-fill bg-primary-container" style="width: 100%;"></div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="card" style="margin-bottom:24px; padding:24px;">
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--surface-container); padding-bottom:16px;">
            <div style="display:flex; align-items:center; gap:8px;">
                <span class="material-symbols-outlined text-primary">filter_alt</span>
                <h3 style="margin:0; font-size:16px; font-weight:600;">Filter &amp; Query Audit Pipeline</h3>
            </div>
            <span style="font-size:12px; color:var(--outline);">Real-time matching active</span>
        </div>
        
        <div class="payments-filter-grid">
            <div class="filter-search">
                <span class="material-symbols-outlined">search</span>
                <input type="text" id="searchInput" placeholder="Search by Payment ID (e.g. PAY-00125), Booking ID, Family Member, or Caregiver...">
            </div>
            
            <div class="filter-group filter-select-lg">
                <label for="filterFamily">Family Member</label>
                <div class="select-wrapper">
                    <select id="filterFamily">
                        <option value="">All Family Members</option>
                        <option value="Sithmini Rathnayake">Sithmini Rathnayake</option>
                        <option value="Nimal Perera">Nimal Perera</option>
                        <option value="Sanduni Fernando">Sanduni Fernando</option>
                        <option value="Kavindu Silva">Kavindu Silva</option>
                        <option value="Kumara Dharmasena">Kumara Dharmasena</option>
                        <option value="Anoma Weerasinghe">Anoma Weerasinghe</option>
                        <option value="Roshan Jayawardene">Roshan Jayawardene</option>
                        <option value="Dilrukshi Alwis">Dilrukshi Alwis</option>
                    </select>
                    <span class="material-symbols-outlined">expand_more</span>
                </div>
            </div>
            
            <div class="filter-group filter-select-lg">
                <label for="filterCaregiver">Caregiver</label>
                <div class="select-wrapper">
                    <select id="filterCaregiver">
                        <option value="">All Caregivers</option>
                        <option value="Sandun Rathnayake">Sandun Rathnayake</option>
                        <option value="Sarah Fernando">Sarah Fernando</option>
                        <option value="Elena Silva">Elena Silva</option>
                        <option value="David Perera">David Perera</option>
                        <option value="Dilani Senanayake">Dilani Senanayake</option>
                        <option value="Kavinda Bandara">Kavinda Bandara</option>
                        <option value="Nadeesha Perera">Nadeesha Perera</option>
                        <option value="Suraj Wickramasinghe">Suraj Wickramasinghe</option>
                    </select>
                    <span class="material-symbols-outlined">expand_more</span>
                </div>
            </div>
            
            <div class="filter-group filter-select-sm">
                <label for="filterStatus">Payment Status</label>
                <div class="select-wrapper">
                    <select id="filterStatus">
                        <option value="">All Statuses</option>
                        <option value="PENDING">Pending</option>
                        <option value="HELD">Held (Escrow)</option>
                        <option value="RELEASED">Released</option>
                        <option value="REFUNDED">Refunded</option>
                    </select>
                    <span class="material-symbols-outlined">expand_more</span>
                </div>
            </div>
            
            <div class="filter-group filter-select-sm">
                <label for="dateFrom">Payment Date From</label>
                <input type="date" id="dateFrom" value="2026-09-20">
            </div>
            
            <div class="filter-group filter-select-sm">
                <label for="dateTo">Payment Date To</label>
                <input type="date" id="dateTo" value="2026-10-05">
            </div>
        </div>
        
        <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:24px;">
            <button type="button" class="btn btn-neutral" id="resetFiltersBtn">Reset</button>
            <button type="button" class="btn btn-primary" id="applyFiltersBtn">Apply Filters</button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card" style="margin-bottom:24px; padding:0;">
        <div style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <h2 style="margin:0; font-size:20px; font-weight:600;">Payment Records</h2>
                <span class="badge-tag" id="recordCountBadge" style="background-color:var(--surface-container); color:var(--on-secondary-container);">Showing 1–8 of 28 records</span>
            </div>
            <div style="display:flex; align-items:center; gap:8px; padding:6px 12px; background-color:var(--surface-container-low); border-radius:8px; font-size:12px;">
                <span class="dot-sm bg-success"></span>
                <span style="font-weight:600;">Escrow Protection Active:</span>
                <span>Funds Released Exclusively On Care Validation</span>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="data-table" id="paymentsTable">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Booking ID</th>
                        <th>Family Member</th>
                        <th>Caregiver</th>
                        <th>Service Amount</th>
                        <th>Payment Status</th>
                        <th>Payment Date</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr class="payment-row" data-caregiver="Sandun Rathnayake" data-family="Sithmini Rathnayake" data-status="HELD">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00125</span>
                                <span style="font-size:11px; color:var(--outline);">Created 24 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00125</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-secondary-container text-on-secondary-container">SR</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Sithmini Rathnayake</span>
                                    <span style="font-size:11px; color:var(--outline);">Colombo 07</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuATTdX3LHD94yn2FC7bL6Hjr0HDEOvs1nznBoAtYkY0pNO-d5ksaavoJ90Rn_8TKAhEVy2nKtqjJY2PMcPQLH4TORUQ6oAdOMf_TRYc3VvTh7p7zMkEHOypV2bJwu5UqaBkjLYsWFGELppLs4TILCfv6FnbHfl8XWO7ucV23eyrddxpKsN1HCRoKD1qweDZvRrZN6qWEp_ZuytBqEUq40bGGZIpnJ90nF6z5JHiJ1Iu7GNAsbKjFHWn" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Sandun Rathnayake</span>
                                    <span style="font-size:11px; color:var(--outline);">Senior Nurse</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 6,400.00</td>
                        <td>
                            <span class="status-badge badge-held">
                                <span class="material-symbols-outlined icon-xs" style="font-variation-settings: 'FILL' 1;">lock</span> HELD
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">28 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="payment-row bg-surface-muted" data-caregiver="Sarah Fernando" data-family="Nimal Perera" data-status="PENDING">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00126</span>
                                <span style="font-size:11px; color:var(--outline);">Created 25 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00126</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container-high text-on-surface-variant">NP</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Nimal Perera</span>
                                    <span style="font-size:11px; color:var(--outline);">Nugegoda</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6ECYzOr8KFXoj-WaHqHkThtXhp1MwHotlcERs9rPM5USexbfDBSrzrmlDDVWvM9oFbeMx1GyuwU0WQNQr_FYwEpfeHd-rpNpdCQwW_7OjjR_cjf2rBFmyFI7andep1OGWwROHPUtPOnSS-hRfxwSChofvdpyc0Ud9S0EfRN41KGw43-JBGBOqt9zP1gWQQN3CAVadYoTOUYjYdTTqvfPs9QLX47yQho9u22cf0964Jk3anEyYac8h" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Sarah Fernando</span>
                                    <span style="font-size:11px; color:var(--outline);">Elderly Caregiver</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 4,800.00</td>
                        <td>
                            <span class="status-badge badge-pending">
                                <span class="material-symbols-outlined icon-xs">schedule</span> PENDING
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">29 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="payment-row" data-caregiver="Elena Silva" data-family="Sanduni Fernando" data-status="HELD">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00127</span>
                                <span style="font-size:11px; color:var(--outline);">Created 25 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00127</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-secondary-container text-on-secondary-container">SF</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Sanduni Fernando</span>
                                    <span style="font-size:11px; color:var(--outline);">Kandy Central</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBZay9mwjcf1XN8F1CowXbGCjSYCyIqGaYmGABdF0zXlyxwyQBVm2_Owqsi3oVDf6bekfqNTFOw9pa6y25Mpbyug_Ky1UL6NwKvrc1w7EaAlwC6Ary4jWKTU4MAWBmhi_IA16dRoxBTxcxdOIBXUzwQdCFsusOL9qVyuTNTbjLE0JKtTZ1Y4wfEuu0CaBTCpA525Rt_INnjCmIyFBa2fgOTIbPL3FgxN49XcleLXNuQh18Lsk9Lml_" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Elena Silva</span>
                                    <span style="font-size:11px; color:var(--outline);">Pediatric Aide</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 5,200.00</td>
                        <td>
                            <span class="status-badge badge-held">
                                <span class="material-symbols-outlined icon-xs" style="font-variation-settings: 'FILL' 1;">lock</span> HELD
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">27 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="payment-row bg-surface-muted" data-caregiver="David Perera" data-family="Kavindu Silva" data-status="RELEASED">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00128</span>
                                <span style="font-size:11px; color:var(--outline);">Created 22 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00128</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container-high text-on-surface-variant">KS</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Kavindu Silva</span>
                                    <span style="font-size:11px; color:var(--outline);">Battaramulla</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHzO8ObNqyKg6XIkpxrU2gmB9KUKXD2ZJ3BxEBdJQQFesFDpRBNXDsmwLsNbMlXRYX8-9xd8HXi9i9_hxTxJBRcDEI_zwelje0GvSkrbdXSw5705JfVHIYUs5NzOLxHliwmRfLDpXSLZ2tzhkN-dUMHwL2l7-5h3iLEePZz2k_0vHFYRt2aBoeVMGRWjIweffl4wNyTlv91SrHJo5_MQZoDR8wpILQY1Fp-KKd57gMoGzSX63hYXnr" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">David Perera</span>
                                    <span style="font-size:11px; color:var(--outline);">Physical Therapist</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 6,400.00</td>
                        <td>
                            <span class="status-badge badge-released">
                                <span class="material-symbols-outlined icon-xs">check_circle</span> RELEASED
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">25 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr class="payment-row" data-caregiver="Dilani Senanayake" data-family="Kumara Dharmasena" data-status="HELD">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00129</span>
                                <span style="font-size:11px; color:var(--outline);">Created 26 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00129</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-secondary-container text-on-secondary-container">KD</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Kumara Dharmasena</span>
                                    <span style="font-size:11px; color:var(--outline);">Mount Lavinia</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHOfH87EgeiqOuJwxHBZpBXn4QOTJM4Obp-Z98LzXeXGI56jgFhbfKl8Udej973yl21O_n6YFw_JrF94niK7MEVaA4uq46UA8O_5W4dZEQ9XdKpMTPIC3KrJBtsARbOeSwV3ApTuVfzJZPRzT5uv0JJE9r_alpb7VodoNmwm9GPdZ5jL5Od9mu9W_FCISLtC2mra5Xp74ygJQbKZhumHyuhne-0l46Huwr4pLbNnrOc-vXvJcv9UMg" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Dilani Senanayake</span>
                                    <span style="font-size:11px; color:var(--outline);">Dementia Specialist</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 7,200.00</td>
                        <td>
                            <span class="status-badge badge-held">
                                <span class="material-symbols-outlined icon-xs" style="font-variation-settings: 'FILL' 1;">lock</span> HELD
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">30 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 6 -->
                    <tr class="payment-row bg-surface-muted" data-caregiver="Kavinda Bandara" data-family="Anoma Weerasinghe" data-status="PENDING">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00130</span>
                                <span style="font-size:11px; color:var(--outline);">Created 27 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00130</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container-high text-on-surface-variant">AW</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Anoma Weerasinghe</span>
                                    <span style="font-size:11px; color:var(--outline);">Dehiwala</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJmmLPmKKozLVkVdzoZEScVbtjY4TlzTppgNO6UpHJkWArnHHQRhNyCFzHBsNeuEmiA5VHr4g6W0WreFcxFgTI5PjtJWsiY2g6JawWg5HmAoPCzJLkeg5RRryt9F8KKOu5FmM36ve7XGAOPV6oqnSyXpKNwgftzO794UR0cErnQbLoei7AMDVs5mBD-dsd1a-w6RxTdCtMzqZrnwmDIM36eqE3qLEpP3RFOTYX2wVGKF7VwSeyCBJh" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Kavinda Bandara</span>
                                    <span style="font-size:11px; color:var(--outline);">Post-Op Recovery</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 9,600.00</td>
                        <td>
                            <span class="status-badge badge-pending">
                                <span class="material-symbols-outlined icon-xs">schedule</span> PENDING
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">01 Oct 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 7 -->
                    <tr class="payment-row" data-caregiver="Nadeesha Perera" data-family="Roshan Jayawardene" data-status="RELEASED">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00131</span>
                                <span style="font-size:11px; color:var(--outline);">Created 21 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00131</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-secondary-container text-on-secondary-container">RJ</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Roshan Jayawardene</span>
                                    <span style="font-size:11px; color:var(--outline);">Rajagiriya</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDH7d5HEsDXl6pggDyTYiyYfwQAe_gmmpDJkaYXGKob1wqUKXwSSAF7ezGoU-1nSqTfeaOD1tU5rabiKZpqiwKm3G6D-Qzbmgz_CR-OJpWXM6XPGqu-j-RaPZOVEr9Kc5TMKqWTZv_D72tB-VkodDZ7DdM-q9ivjp3AMtcmyhLbqQ23PIcI5xmpUbdWw0zj_53QkQ0KFKG0iwMQOLrUfsNm2n3_henACpM0V0OTeMKdOvNQzYCZWZCy" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Nadeesha Perera</span>
                                    <span style="font-size:11px; color:var(--outline);">Neonatal Care</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 6,400.00</td>
                        <td>
                            <span class="status-badge badge-released">
                                <span class="material-symbols-outlined icon-xs">check_circle</span> RELEASED
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">24 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Row 8 -->
                    <tr class="payment-row bg-surface-muted" data-caregiver="Suraj Wickramasinghe" data-family="Dilrukshi Alwis" data-status="REFUNDED">
                        <td>
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:700; color:var(--primary);">PAY-00132</span>
                                <span style="font-size:11px; color:var(--outline);">Created 20 Sep 2026</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge-tag" style="background-color:var(--surface-container); color:var(--on-secondary-container); font-family:monospace;">BK-00132</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container-high text-on-surface-variant">DA</div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Dilrukshi Alwis</span>
                                    <span style="font-size:11px; color:var(--outline);">Galle Fort</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="avatar-circle-sm bg-surface-container">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqkpNiK5RA_84r4gbKoNOGShb5EIkD1xLWqObcuajIOhuuF1gPzj7lT6ikU7owCWw6CTxQ5wL9-YuDkSxcwRiRsP9011BKfpcBvliJffOA3iumMmubWQmIZfctWeEpNCtv9retTN9c49FutSGN6y1Tprbs7Gkb4cljhB1DC_TDpEC52UvlnEuW9TZj3IQ6tueHIFJ6S3W-_2kY4t9j4nydTVH7cmCIyqtyrFwWz86RFgV8OnURv-Kz" alt="" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                                </div>
                                <div style="display:flex; flex-direction:column;">
                                    <span style="font-weight:600;">Suraj Wickramasinghe</span>
                                    <span style="font-size:11px; color:var(--outline);">General Care</span>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:700;">LKR 6,400.00</td>
                        <td>
                            <span class="status-badge badge-refunded">
                                <span class="material-symbols-outlined icon-xs">replay</span> REFUNDED
                            </span>
                        </td>
                        <td style="color:var(--on-surface-variant);">23 Sep 2026</td>
                        <td style="text-align:right;">
                            <button type="button" class="btn btn-outline" style="border:none; padding:4px 8px;" onclick="window.location.href='/safehands_mvc/admin/paymentDetails'">
                                View Details <span class="material-symbols-outlined icon-sm">chevron_right</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="pagination-container" style="padding:16px 24px; border-top:1px solid var(--surface-container); display:flex; justify-content:space-between; align-items:center;">
            <div style="font-size:14px; color:var(--on-surface-variant);">
                Showing <span style="font-weight:600; color:var(--on-surface);">1–8</span> of <span style="font-weight:600; color:var(--on-surface);">28</span> payment records
            </div>
            <div style="display:flex; gap:4px;">
                <button type="button" class="btn btn-neutral" style="padding:4px 12px;" disabled>Previous</button>
                <button type="button" class="btn btn-primary" style="padding:4px 12px;">1</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px; border:none;">2</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px; border:none;">3</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px; border:none;">4</button>
                <button type="button" class="btn btn-neutral" style="padding:4px 12px;">Next</button>
            </div>
        </div>
    </div>

    <!-- Info Protocol Section -->
    <div class="card" style="margin-bottom:24px; padding:24px; background-color:var(--surface-container-low); border:none;">
        <div style="display:flex; gap:16px; align-items:flex-start;">
            <div class="icon-wrapper-sm bg-surface-container text-primary" style="flex-shrink:0;">
                <span class="material-symbols-outlined" style="font-size:24px;">policy</span>
            </div>
            <div>
                <h3 style="margin:0 0 8px 0; font-size:14px; font-weight:700;">SafeHands Simulated Payment &amp; Escrow Protocol</h3>
                <p style="margin:0; font-size:14px; color:var(--on-surface-variant); line-height:1.5;">
                    All transactions are internally simulated records maintained for platform operational audit and caregiver settlement tracking. SafeHands does not process real credit cards, bank accounts, or external payment gateways (PayHere, Stripe, PayPal). Payout authorizations trigger automatically upon validated arrival confirmation and daily care report submission.
                </p>
                <div style="display:flex; gap:16px; margin-top:12px; font-size:12px; color:var(--outline);">
                    <span style="display:flex; align-items:center; gap:4px;">
                        <span class="material-symbols-outlined icon-sm text-success">verified</span> Shift Validation Keying Active
                    </span>
                    <span style="display:flex; align-items:center; gap:4px;">
                        <span class="material-symbols-outlined icon-sm text-primary">clinical_notes</span> Report Gate Protocol Mandated
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional Footer matches layout style if you wish, I'll place it here since it was in the snippet -->
    <div style="display:flex; justify-content:space-between; align-items:center; padding:16px 0; color:var(--outline); font-size:12px; border-top:1px solid var(--surface-container);">
        <div style="display:flex; align-items:center; gap:8px;">
            <span class="dot-sm bg-success"></span>
            System Health: All Clinical Systems Operational
        </div>
        <div>
            &copy; 2024 SafeHands Healthcare Platform. Clinical HQ Management Console.
        </div>
    </div>

</div>

<!-- Payment Details Modal -->
<div class="modal-overlay hidden" id="detailsModal">
    <div class="modal-content modal-md">
        <div class="modal-header-compact" style="border-bottom:none;">
            <div class="modal-header-compact-left">
                <div class="icon-wrapper-sm bg-surface-container text-primary">
                    <span class="material-symbols-outlined">receipt</span>
                </div>
                <div>
                    <h3 id="modalPaymentId" style="margin:0; font-size:20px; font-weight:600;">PAY-00125</h3>
                    <span id="modalBookingId" style="font-size:12px; color:var(--outline);">Booking Ref: BK-00125</span>
                </div>
            </div>
            <button class="btn-icon-plain" onclick="closeDetailsModal()">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <div class="pay-details-breakdown">
            <div class="pay-row">
                <span class="pay-label">Status</span>
                <span id="modalStatusBadge" class="status-badge"></span>
            </div>
            <div class="pay-row">
                <span class="pay-label">Family Member</span>
                <span id="modalFamily" class="pay-value"></span>
            </div>
            <div class="pay-row">
                <span class="pay-label">Caregiver</span>
                <span id="modalCaregiver" class="pay-value"></span>
            </div>
            <div class="pay-row">
                <span class="pay-label">Scheduled Date</span>
                <span id="modalDate" class="pay-value"></span>
            </div>
            <div class="pay-row grand-total">
                <span class="pay-label">Simulated Service Fee</span>
                <span id="modalAmount" class="pay-value"></span>
            </div>
            <div class="pay-row" style="font-size:12px;">
                <span class="pay-label">SafeHands Commission (10%)</span>
                <span id="modalCommission" class="pay-value" style="font-family:monospace; color:var(--outline);"></span>
            </div>
            <div class="pay-row" style="font-size:12px;">
                <span class="pay-label">Caregiver Net Settlement</span>
                <span id="modalNetPayout" class="pay-value text-success" style="font-family:monospace;"></span>
            </div>
        </div>
        
        <div class="pay-info-box">
            <span class="material-symbols-outlined">info</span>
            <p>Simulated escrow guarantees payout lock until GPS-verified arrival and the supervisor countersigns the digital care note.</p>
        </div>
        
        <div style="display:flex; justify-content:flex-end; margin-top:16px;">
            <button type="button" class="btn btn-primary" onclick="closeDetailsModal()" style="width:100%;">Close Record</button>
        </div>
    </div>
</div>

<script>
    // Open Details Modal
    function openDetailsModal(payId, bkId, family, caregiver, amountStr, status, date) {
        document.getElementById('modalPaymentId').textContent = payId;
        document.getElementById('modalBookingId').textContent = 'Booking Ref: ' + bkId;
        document.getElementById('modalFamily').textContent = family;
        document.getElementById('modalCaregiver').textContent = caregiver;
        document.getElementById('modalDate').textContent = date;
        document.getElementById('modalAmount').textContent = amountStr;

        var num = parseFloat(amountStr.replace(/[^0-9.]/g, '')) || 0;
        var comm = num * 0.10;
        var net = num * 0.90;
        document.getElementById('modalCommission').textContent = 'LKR ' + comm.toFixed(2);
        document.getElementById('modalNetPayout').textContent = 'LKR ' + net.toFixed(2);

        var badge = document.getElementById('modalStatusBadge');
        badge.className = 'status-badge'; // reset
        if (status === 'HELD') {
            badge.textContent = 'HELD IN ESCROW';
            badge.classList.add('badge-held');
        } else if (status === 'RELEASED') {
            badge.textContent = 'SETTLED & RELEASED';
            badge.classList.add('badge-released');
        } else if (status === 'REFUNDED') {
            badge.textContent = 'REFUNDED';
            badge.classList.add('badge-refunded');
        } else {
            badge.textContent = 'PENDING';
            badge.classList.add('badge-pending');
        }

        const modal = document.getElementById('detailsModal');
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function closeDetailsModal() {
        const modal = document.getElementById('detailsModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    // Filters
    document.getElementById('applyFiltersBtn').addEventListener('click', function() {
        var searchVal = document.getElementById('searchInput').value.toLowerCase().trim();
        var familyVal = document.getElementById('filterFamily').value;
        var caregiverVal = document.getElementById('filterCaregiver').value;
        var statusVal = document.getElementById('filterStatus').value;

        var rows = document.querySelectorAll('.payment-row');
        var visibleCount = 0;

        rows.forEach(function(row) {
            var rowFamily = row.getAttribute('data-family');
            var rowCaregiver = row.getAttribute('data-caregiver');
            var rowStatus = row.getAttribute('data-status');
            var textContent = row.textContent.toLowerCase();

            var matchesSearch = !searchVal || textContent.includes(searchVal);
            var matchesFamily = !familyVal || rowFamily === familyVal;
            var matchesCaregiver = !caregiverVal || rowCaregiver === caregiverVal;
            var matchesStatus = !statusVal || rowStatus === statusVal;

            if (matchesSearch && matchesFamily && matchesCaregiver && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('recordCountBadge').textContent = 'Showing ' + visibleCount + ' filtered records';
    });

    document.getElementById('resetFiltersBtn').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('filterFamily').value = '';
        document.getElementById('filterCaregiver').value = '';
        document.getElementById('filterStatus').value = '';
        
        var rows = document.querySelectorAll('.payment-row');
        rows.forEach(function(row) {
            row.style.display = '';
        });
        document.getElementById('recordCountBadge').textContent = 'Showing 1–8 of 28 records';
    });
</script>
