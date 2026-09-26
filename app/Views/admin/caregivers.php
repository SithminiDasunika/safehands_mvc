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
                    <!-- Row 1 -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1BJAHU7Lev7w-an_yBXOaFwtqWyumSYtoBp90swz4crBmOjbzxw1iDpCTGyfr9hf7Vffh1tJeZQr0-k6H8N1yh7NyldkC3Jim3S8AM-2pe45lv0aBGzssIEjOje_TWZktIgXsC6srPpsqfwk8Y97bKo1Xp6eyM7iA__KXFxeOY-yVWmgvL5_Ctu9P4P8plR9YEtPBq8c92c3YyW3QO5GS0mtjWi4bG3oeUikV73RVoP7JAMbKD7k4" alt="Sarah Jenkins" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Sarah Jenkins</span>
                                    <span class="id">sarah.j@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8821</td>
                        <td class="font-medium">Registered Nurse (RN)</td>
                        <td class="text-on-surface-variant">12 years</td>
                        <td class="text-on-surface-variant">Colombo</td>
                        <td>
                            <span class="tag tag-success">
                                <span class="dot dot-success"></span> VERIFIED
                            </span>
                        </td>
                        <td class="text-outline">25 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="row-warning">
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDf8G4smtfjbP_H4qFNchBrGD8QtylbIdpxMMHAUAOUZ9kWP1RzW-j38yS6HIAst6FAG-N2zn0uWocBVajRivtWceoobg7RDZlONqVJy2uFGpDVMfbaLfBd6_nFJkn3gO9tBOejGmUL_Y9o_wnHDujv6a0CkiwLypUK5kyjwEslNSdNK83kWThrLFY6J9MxgbZq17gzZI-KI3_wvi0cSqfIU3C_aGRxnbRrFpVY_rz8i-tMqw5jmzLG" alt="Sandun Rathnayake" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Sandun Rathnayake</span>
                                    <span class="id">sandun.r@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8822</td>
                        <td class="font-medium">Diploma in Nursing</td>
                        <td class="text-on-surface-variant">4 years</td>
                        <td class="text-on-surface-variant">Colombo</td>
                        <td>
                            <span class="tag tag-warning">
                                <span class="dot dot-warning animate-pulse"></span> PENDING
                            </span>
                        </td>
                        <td class="text-outline">24 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoGX9uZO99lKfr87dHGHwMKiFwbtvqTBR0pEsS3yljt6bonzhXyJUAPdL2q9UQ-LsIvHkmeoXDXLLSb4CAwshsoBgVFgu3aqBDmVnIhZ66IV0EaV5ibxyxwvEwVBuh_LMuEjeBbmz8ypOGq7tDdwQRssU2zsQXLJZ4gymDaBXwK_FOXg1XlbT-gNsjuo6zanBtquMg2w5So36M_4dJqPYspw4A7EJk4K2kkJBSSp1zLfI6HCf59uC5" alt="Elena Rodriguez" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Elena Rodriguez</span>
                                    <span class="id">elena.rod@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8823</td>
                        <td class="font-medium">Home Health Aide</td>
                        <td class="text-on-surface-variant">7 years</td>
                        <td class="text-on-surface-variant">Kandy</td>
                        <td>
                            <span class="tag tag-success">
                                <span class="dot dot-success"></span> VERIFIED
                            </span>
                        </td>
                        <td class="text-outline">20 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="row-warning">
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCa-kAKtDynduDPvRYw810AzJaIJuFrwdXAirc9Wr5zyZkt5qKq0KjUTKl32CqlqG-Va01B65XArcDrnEicBgMa_zKJTX1P0GTPIsrQGMANYgKmY3cLaqagkN_frdYv47lPS4wXI8qW3lzpY5AwRsTbZ7lu99-_7q70sJmJ6GyQH3NPRUx0DhkuFQbRjl3unKKMZoKA3E1pn-3MKr6aTEyW4qGocGru0_fGHKx8saseujzsIRqh4f1s" alt="David Chen" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">David Chen</span>
                                    <span class="id">david.c@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8824</td>
                        <td class="font-medium">Certified Nursing Assistant</td>
                        <td class="text-on-surface-variant">5 years</td>
                        <td class="text-on-surface-variant">Gampaha</td>
                        <td>
                            <span class="tag tag-warning">
                                <span class="dot dot-warning animate-pulse"></span> PENDING
                            </span>
                        </td>
                        <td class="text-outline">19 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>
                    
                    <!-- Row 5 -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC4XwS5WAppZH7NKPjJHgSwnSo0z0lobw_Ec2dmrVK4XkjuaRThlyTt8WfUBW1-x3ajd1XFFZBVv_8CQZpDnpqEyl9-PgLMgh6M-E8IMI0qMntaLeKxlvVdAKkFfG5YWEzxYr7jwj4GtHqMYkasRT8krgAmLi_QIEJIsuEnHY12PXDWjvbqgg_twpbCfC2DRTuN_xsQGXhmNqSKZpJw4qR9Dp2W4XMg0OEG13eIHeuE_1WpEX2rkec1" alt="Dilani Senanayake" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Dilani Senanayake</span>
                                    <span class="id">dilani.s@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8825</td>
                        <td class="font-medium">NVQ Level 4 Elderly Care</td>
                        <td class="text-on-surface-variant">6 years</td>
                        <td class="text-on-surface-variant">Colombo</td>
                        <td>
                            <span class="tag tag-success">
                                <span class="dot dot-success"></span> VERIFIED
                            </span>
                        </td>
                        <td class="text-outline">15 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr class="row-error">
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDnBLvYLcleAWYfxjJSpm8EyuLhCj9BmBZ_4vhuSRF5WX5s12XO0CL_fjpwBjRui01zWRESRKgr4qvjllJy2rltzmpoyxEOgwfk0ZzfN0n8xNfbTfs5EHi0F-zoBaAfHE0tdCkj3K99347vabTjvimTqqDmrQXMrp8umWC0Kc4hr62bV9oKyGxQmMMD_UNtCgcAzfcr-QbhyUsskLuE7NxXqcsB0r7vh28s3cAF5tuHotGrdEI2xBk" alt="Kavinda Bandara" class="avatar-sm grayscale">
                                <div class="user-details">
                                    <span class="name">Kavinda Bandara</span>
                                    <span class="id">kavinda.b@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8826</td>
                        <td class="font-medium">First Aid & CPR Specialist</td>
                        <td class="text-on-surface-variant">3 years</td>
                        <td class="text-on-surface-variant">Galle</td>
                        <td>
                            <span class="tag tag-error">
                                <span class="dot dot-error"></span> REJECTED
                            </span>
                        </td>
                        <td class="text-outline">12 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGve460O0ujiS5vJYkokBvzyCxJ4brSrzvr9ZT31Mt7dmgchKIMBvKxOfnVqI-igFiHRrAvQDqOf2a_pQzbFoEwjV1NdXfhh41zw8-BxX2KUIzc03xqEdbLtXHCm3elUxaOU4nE1v_dmR-qh-PMNLlY3xj3N-CDrIyjTBTZml90H9YmY0sx9M9vYGdu_6sTnM5hS6Ao9RVduTI0QXkECdpCyW8qujePttcF9Kn7cdTxC8XFmMArFGr" alt="Nadeesha Perera" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Nadeesha Perera</span>
                                    <span class="id">nadeesha.p@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8827</td>
                        <td class="font-medium">Certified Geriatric Caregiver</td>
                        <td class="text-on-surface-variant">8 years</td>
                        <td class="text-on-surface-variant">Kandy</td>
                        <td>
                            <span class="tag tag-success">
                                <span class="dot dot-success"></span> VERIFIED
                            </span>
                        </td>
                        <td class="text-outline">10 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNAXIeewprebsMgw8o5oteGXVQEm98Vj6DVk3SmwZ2qugrUlV3vQMXcSgMgMV0uV9Wbu_gYQ2_6RrhSQYuN5DbMyvo5BqmbUNIoncuo3-b88Xwy5YK-iZR1Il9k1HKjNxBpLbnvYqWhy9aBHTgExZSbgYxOAjLr4talP93wE0W8nLS4YvAduX3bJuaKsgkXZGHz55-V1-MeVxZEnWhIQMKhRbUh_8hv9bgxHZnIDGMhIxYD3Tuz-a4" alt="Suraj Wickramasinghe" class="avatar-sm">
                                <div class="user-details">
                                    <span class="name">Suraj Wickramasinghe</span>
                                    <span class="id">suraj.w@safehands.org</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-medium text-on-surface-variant">#CG-8828</td>
                        <td class="font-medium">Physiotherapy Assistant</td>
                        <td class="text-on-surface-variant">5 years</td>
                        <td class="text-on-surface-variant">Colombo</td>
                        <td>
                            <span class="tag tag-success">
                                <span class="dot dot-success"></span> VERIFIED
                            </span>
                        </td>
                        <td class="text-outline">05 Sep 2026</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-primary-container caregiver-view-details">
    <span>View Details</span>
    <span class="material-symbols-outlined icon-sm">chevron_right</span>
</button>
                        </td>
                    </tr>
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

    // View Caregiver Details
    document.querySelectorAll('.caregiver-view-details').forEach(button => {
        button.addEventListener('click', () => {
            window.location.href = '/safehands_mvc/admin/caregiverDetails';
        });
    });

});
</script>
