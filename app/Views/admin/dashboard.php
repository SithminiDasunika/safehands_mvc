<div class="dashboard-container">
    <section class="welcome-section">
        <div class="welcome-text">
            <h1>Welcome Back, Administrator</h1>
            <p>Today’s platform overview and pending tasks.</p>
        </div>
        <div class="date-picker">
            <span class="material-symbols-outlined icon-primary">calendar_today</span>
            <span class="date-text">September 25, 2026</span>
            <span class="material-symbols-outlined icon-outline">expand_more</span>
        </div>
    </section>

    <div class="dashboard-grid">
        <div class="main-column">
            <div class="priority-cards">
                <!-- Card 1 -->
                <div class="priority-card">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="icon-wrapper bg-surface-container text-primary">
                                <span class="material-symbols-outlined">verified_user</span>
                            </div>
                            <span class="badge badge-primary">ACTION REQUIRED</span>
                        </div>
                        <div class="card-body">
                            <span class="card-number">2</span>
                            <h3>Pending Caregiver Verifications</h3>
                            <p>Caregiver applications waiting for document review.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="action-link text-primary">
                            <span>Review Applications</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="priority-card">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="icon-wrapper bg-error-container text-error">
                                <span class="material-symbols-outlined">warning</span>
                            </div>
                            <span class="badge badge-error">ACTION REQUIRED</span>
                        </div>
                        <div class="card-body">
                            <span class="card-number">3</span>
                            <h3>Pending Complaints</h3>
                            <p>Complaints requiring administrator attention.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="action-link text-error">
                            <span>Investigate</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="priority-card">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="icon-wrapper bg-surface-container-high text-secondary">
                                <span class="material-symbols-outlined">account_balance_wallet</span>
                            </div>
                            <span class="badge badge-secondary">FINANCE</span>
                        </div>
                        <div class="card-body">
                            <span class="card-number">5</span>
                            <h3>Held Simulated Payments</h3>
                            <p>Payments currently recorded as held in simulation ledger.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="action-link text-primary">
                            <span>Review Payments</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="priority-card">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="icon-wrapper bg-surface-container-high text-status-success">
                                <span class="material-symbols-outlined">event_available</span>
                            </div>
                            <span class="badge badge-success">UPDATED</span>
                        </div>
                        <div class="card-body">
                            <span class="card-number">8</span>
                            <h3>Active Bookings</h3>
                            <p>Current bookings across the care network.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="action-link text-primary">
                            <span>View Bookings</span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Verification Queue -->
            <div class="verification-queue">
                <div class="queue-header">
                    <div class="header-left">
                        <h2>Verification Queue</h2>
                        <span class="badge-rounded">3 Pending</span>
                    </div>
                    <a href="#" class="view-all-link">
                        <span>View All</span>
                        <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Caregiver</th>
                                <th>Qualification</th>
                                <th>Submitted</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0eWZPHpS7i0sn1A64r9314pRvyi0w1A3Hhhl44HcXwXZTB2bMOrqFwI0EVycj2lSBhhOB2dBDVlhllly3Xdr8j8fss5nhhYrd8Ze6SiD03iLQdJEaM7PhmNh8e2t7o79f7WCGFz3ZD1ifZWkl62UfacO6J0N_QV8ULzMkZxRse_91jSQgaiHVIf7SnUMF40ST6UBnDEmJ1OeDk1zR5rc6_Kq20F70oORBD1Q3VDmVLJtC3Ypn3FKM" alt="Sarah Jenkins" class="avatar-sm">
                                        <div class="user-details">
                                            <span class="name">Sarah Jenkins</span>
                                            <span class="id">ID: #CG-8821</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="tag tag-primary">
                                        <span class="dot"></span>
                                        Registered Nurse (RN)
                                    </span>
                                </td>
                                <td class="time-cell">2h ago</td>
                                <td class="text-right">
                                    <button class="btn btn-primary">Review</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXtSQhM22kWUNyi3_HPA2CbRx-aORrQgfMpswM5PNnYIWOVcXpp1i-7r1kHV96QAvfWfLhtWE2d120NjP6LYEq4BX9nSlIOjdTcgmmRtyaU60xmbdbpsuP5W-1uCUuOS4qdS47w9c16S43RL0QU_ahltJJl_u1DZ7cw8Llq6FjYHH2uArLJPX9Ezrk6Tj1s9_1g6gsWJUgWTrVdCY3SBxSTT7WoPOTqFr4YJqmHCeoZsGJpMFUUpUC" alt="David Chen" class="avatar-sm">
                                        <div class="user-details">
                                            <span class="name">David Chen</span>
                                            <span class="id">ID: #CG-7419</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="tag tag-secondary">
                                        <span class="dot dot-secondary"></span>
                                        Certified Nursing Assistant
                                    </span>
                                </td>
                                <td class="time-cell">5h ago</td>
                                <td class="text-right">
                                    <button class="btn btn-primary">Review</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZGfYno9asFRaml9WdpjIWSLUZ8mZZV1BPAgnF4Jt0RcLkFpq-5AVl-bYfgXjCAFCcfBA5YCqalLETdpSZJKDVtzeSCpyxbiAplStOs4A9U_Ul1IzRt3ODSIkRb-R9Tg6zHljCcQLBU9INTrEtXjOkBkdkheAaLim8L_y8q6bxTWZzAIUU3DuPuB6kaybiLJKtUGm9p-CxcSTrozcEmmdoj3vT4thvL9nn7eArjDnhpVYwHIDypLLx" alt="Elena Rodriguez" class="avatar-sm">
                                        <div class="user-details">
                                            <span class="name">Elena Rodriguez</span>
                                            <span class="id">ID: #CG-9104</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="tag tag-tertiary">
                                        <span class="dot dot-tertiary"></span>
                                        Home Health Aide
                                    </span>
                                </td>
                                <td class="time-cell">Yesterday</td>
                                <td class="text-right">
                                    <button class="btn btn-primary">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="side-column">
            <!-- Platform Activity -->
            <div class="activity-panel">
                <div class="panel-header">
                    <div class="header-title">
                        <h2>Platform Activity</h2>
                        <span class="pulse-indicator">
                            <span class="pulse-ping"></span>
                            <span class="pulse-dot"></span>
                        </span>
                    </div>
                    <span class="realtime-text">Real-time</span>
                </div>
                <div class="timeline">
                    <div class="timeline-track"></div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon bg-primary text-on-primary">
                            <span class="material-symbols-outlined">person_add</span>
                        </div>
                        <div class="timeline-content">
                            <span class="timeline-title">New caregiver registered</span>
                            <span class="timeline-meta">09:10 AM · Document verification queued</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon bg-primary text-on-primary">
                            <span class="material-symbols-outlined">calendar_add_on</span>
                        </div>
                        <div class="timeline-content">
                            <span class="timeline-title">New booking created</span>
                            <span class="timeline-meta">09:42 AM · 3-day assistance request</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon bg-primary text-on-primary">
                            <span class="material-symbols-outlined">receipt_long</span>
                        </div>
                        <div class="timeline-content">
                            <span class="timeline-title">Simulated payment recorded</span>
                            <span class="timeline-meta">10:15 AM · Held pending completion</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon bg-error text-on-error">
                            <span class="material-symbols-outlined">report_problem</span>
                        </div>
                        <div class="timeline-content">
                            <span class="timeline-title text-error">Complaint submitted</span>
                            <span class="timeline-meta">10:38 AM · Assigned for review</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon bg-status-success text-on-primary">
                            <span class="material-symbols-outlined">done</span>
                        </div>
                        <div class="timeline-content">
                            <span class="timeline-title">Caregiver profile approved</span>
                            <span class="timeline-meta">11:02 AM · Elena Rodriguez (#CG-9104)</span>
                        </div>
                    </div>
                </div>
                <button class="btn-full-width">
                    <span>View All Activities</span>
                    <span class="material-symbols-outlined">history</span>
                </button>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions-panel">
                <h2>Quick Actions</h2>
                <div class="quick-actions-grid">
                    <a href="#" class="action-btn">
                        <div class="action-icon text-primary">
                            <span class="material-symbols-outlined">medical_services</span>
                        </div>
                        <span class="action-label">Manage Caregivers</span>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon text-primary">
                            <span class="material-symbols-outlined">diversity_1</span>
                        </div>
                        <span class="action-label">Manage Families</span>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon text-primary">
                            <span class="material-symbols-outlined">event_available</span>
                        </div>
                        <span class="action-label">Bookings</span>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon text-primary">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <span class="action-label">Payments</span>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon text-error">
                            <span class="material-symbols-outlined">report_problem</span>
                        </div>
                        <span class="action-label">Complaints</span>
                    </a>
                    <a href="#" class="action-btn">
                        <div class="action-icon text-primary">
                            <span class="material-symbols-outlined">bar_chart</span>
                        </div>
                        <span class="action-label">Reports</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Complaints Section -->
    <section class="recent-complaints">
        <div class="section-header">
            <div class="header-left">
                <h2>Recent Complaints</h2>
                <span class="badge-rounded error-badge">Active Investigations (3)</span>
            </div>
            <a href="#" class="view-all-link">
                <span>Complaints Center</span>
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
        </div>
        
        <div class="complaints-grid">
            <!-- Complaint 1 -->
            <div class="complaint-card">
                <div class="complaint-content">
                    <div class="complaint-header">
                        <span class="complaint-id">ID: #CP-4029</span>
                        <span class="badge badge-urgent">URGENT</span>
                    </div>
                    <div class="complaint-body">
                        <h3>Late Arrival</h3>
                        <div class="complaint-details">
                            <div class="detail-row">
                                <span class="detail-label">Family:</span>
                                <span class="detail-value">The Miller Family</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Category:</span>
                                <span class="tag tag-sm">Punctuality</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="complaint-footer">
                    <button class="btn btn-outline-full">Open Complaint</button>
                </div>
            </div>

            <!-- Complaint 2 -->
            <div class="complaint-card">
                <div class="complaint-content">
                    <div class="complaint-header">
                        <span class="complaint-id">ID: #CP-4030</span>
                        <span class="badge badge-review">UNDER REVIEW</span>
                    </div>
                    <div class="complaint-body">
                        <h3>Billing Dispute</h3>
                        <div class="complaint-details">
                            <div class="detail-row">
                                <span class="detail-label">Family:</span>
                                <span class="detail-value">Robert Wilson</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Category:</span>
                                <span class="tag tag-sm">Payment</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="complaint-footer">
                    <button class="btn btn-outline-full">Open Complaint</button>
                </div>
            </div>

            <!-- Complaint 3 -->
            <div class="complaint-card">
                <div class="complaint-content">
                    <div class="complaint-header">
                        <span class="complaint-id">ID: #CP-4031</span>
                        <span class="badge badge-review">UNDER REVIEW</span>
                    </div>
                    <div class="complaint-body">
                        <h3>Care Service Issue</h3>
                        <div class="complaint-details">
                            <div class="detail-row">
                                <span class="detail-label">Family:</span>
                                <span class="detail-value">Sandra Park</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Category:</span>
                                <span class="tag tag-sm">Care Quality</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="complaint-footer">
                    <button class="btn btn-outline-full">Open Complaint</button>
                </div>
            </div>
        </div>
    </section>

    <footer class="dashboard-footer">
        <div class="footer-left">
            <span>© 2026 SafeHands Healthcare Platform</span>
            <span>·</span>
            <span>System Version 1.0</span>
        </div>
        <div class="footer-right">
            <div class="system-status">
                <span class="status-dot-pulse"></span>
                <span>System Operational</span>
            </div>
            <a href="#">Privacy Policy</a>
            <a href="#">Support</a>
        </div>
    </footer>
</div>
