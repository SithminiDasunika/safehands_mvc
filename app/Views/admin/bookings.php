<div class="dashboard-container">
    
    <!-- Modal: Operational Overview Drawer -->
    <div class="modal-overlay hidden opacity-0 transition-opacity" id="bookingModal">
        <div class="modal-content modal-md transform scale-95 transition-transform" id="modalBox">
            <div class="modal-header-compact">
                <div class="modal-header-compact-left">
                    <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                        <span class="material-symbols-outlined">assignment</span>
                    </div>
                    <div>
                        <h2 id="modalBookingId">BK-00125</h2>
                        <p>Operational Shift Summary</p>
                    </div>
                </div>
                <button class="btn-icon-plain" id="closeModalBtn">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="modal-details-box">
                <div class="modal-detail-row">
                    <span class="modal-detail-label">Status</span>
                    <span id="modalStatusBadge" class="status-tag">Approved</span>
                </div>
                <div class="modal-detail-row">
                    <span class="modal-detail-label">Patient</span>
                    <span id="modalPatient" class="modal-detail-value">-</span>
                </div>
                <div class="modal-detail-row">
                    <span class="modal-detail-label">Family Guardian</span>
                    <span id="modalFamily" class="modal-detail-value">-</span>
                </div>
                <div class="modal-detail-row">
                    <span class="modal-detail-label">Assigned Caregiver</span>
                    <span id="modalCaregiver" class="modal-detail-value">-</span>
                </div>
            </div>
            
            <div class="modal-notice-box">
                <span class="material-symbols-outlined">verified_user</span>
                <p>Administrative overview only. Clinical notes and vitals remain encrypted.</p>
            </div>
            
            <div style="display:flex; justify-content:flex-end;">
                <button class="btn-dismiss" id="modalDismissBtn">Close Overview</button>
            </div>
        </div>
    </div>

    <!-- Page Header & Global Actions -->
    <div class="page-header" style="flex-direction:row; justify-content:space-between; align-items:flex-end;">
        <div class="page-title-row">
            <div class="page-breadcrumb">
                <span class="breadcrumb-tag">Care Operations</span>
                <span class="breadcrumb-dot">•</span>
                <span class="breadcrumb-text">Live Dispatch Log</span>
            </div>
            <h1 class="page-title">Bookings</h1>
            <p class="page-description">Monitor and manage caregiver service bookings.</p>
        </div>
        
        <div class="header-actions-group">
            <button class="btn btn-neutral shadow-sm" id="filterToggleBtn">
                <span class="material-symbols-outlined icon-xs">tune</span>
                <span>Filter View</span>
            </button>
            <button class="btn btn-neutral shadow-sm">
                <span class="material-symbols-outlined icon-xs">file_download</span>
                <span>Export CSV</span>
            </button>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="metrics-grid-5">
        <!-- Total -->
        <div class="metric-card group-hover">
            <div class="metric-header">
                <span class="metric-sub" style="text-transform:uppercase; font-weight:600;">Total Bookings</span>
                <span class="badge-tag tag-neutral-sm">ALL RECORDS</span>
            </div>
            <div class="metric-value-row" style="display:flex; justify-content:space-between; align-items:baseline;">
                <span class="metric-value-lg">28</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-primary">
                    <span class="material-symbols-outlined">calendar_view_week</span>
                </div>
            </div>
        </div>
        
        <!-- Pending -->
        <div class="metric-card group-hover">
            <div class="metric-header">
                <span class="metric-sub" style="text-transform:uppercase; font-weight:600;">Pending</span>
                <span class="badge-tag tag-warning-sm">REQUIRES ACTION</span>
            </div>
            <div class="metric-value-row" style="display:flex; justify-content:space-between; align-items:baseline;">
                <span class="metric-value-lg text-warning-alt">4</span>
                <div class="icon-wrapper-sm bg-warning-alt-light text-warning-alt">
                    <span class="material-symbols-outlined">hourglass_empty</span>
                </div>
            </div>
        </div>

        <!-- Approved -->
        <div class="metric-card group-hover">
            <div class="metric-header">
                <span class="metric-sub" style="text-transform:uppercase; font-weight:600;">Approved</span>
                <span class="badge-tag tag-primary-sm">SCHEDULED</span>
            </div>
            <div class="metric-value-row" style="display:flex; justify-content:space-between; align-items:baseline;">
                <span class="metric-value-lg text-primary">8</span>
                <div class="icon-wrapper-sm text-primary" style="background-color:rgba(219, 225, 255, 0.5);">
                    <span class="material-symbols-outlined">event_available</span>
                </div>
            </div>
        </div>

        <!-- In Progress -->
        <div class="metric-card group-hover">
            <div class="metric-header">
                <span class="metric-sub" style="text-transform:uppercase; font-weight:600;">In Progress</span>
                <span class="badge-tag tag-success-sm" style="display:flex; align-items:center; gap:6px;">
                    <span class="dot-sm bg-success animate-pulse"></span> ACTIVE SHIFTS
                </span>
            </div>
            <div class="metric-value-row" style="display:flex; justify-content:space-between; align-items:baseline;">
                <span class="metric-value-lg text-success">6</span>
                <div class="icon-wrapper-sm bg-success-light text-success">
                    <span class="material-symbols-outlined">timelapse</span>
                </div>
            </div>
        </div>

        <!-- Completed -->
        <div class="metric-card group-hover">
            <div class="metric-header">
                <span class="metric-sub" style="text-transform:uppercase; font-weight:600;">Completed</span>
                <span class="badge-tag tag-neutral-sm" style="color:var(--status-success);">FULFILLED</span>
            </div>
            <div class="metric-value-row" style="display:flex; justify-content:space-between; align-items:baseline;">
                <span class="metric-value-lg">10</span>
                <div class="icon-wrapper-sm bg-surface-container-low text-success">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Control Card -->
    <div class="filters-card shadow-sm" style="margin-bottom:24px;">
        <div class="filters-grid-bookings">
            <div class="filter-group">
                <label>Search Records</label>
                <div class="search-input-wrapper">
                    <span class="material-symbols-outlined search-icon">search</span>
                    <input type="text" id="bookingSearchInput" class="search-input shadow-inner" placeholder="Booking ID, family member, patient, or caregiver...">
                </div>
            </div>
            
            <div class="filter-group">
                <label>Care Date From</label>
                <div class="date-input-wrapper">
                    <input type="text" value="09/20/2026" placeholder="mm/dd/yyyy" class="shadow-inner">
                    <span class="material-symbols-outlined date-icon">calendar_today</span>
                </div>
            </div>

            <div class="filter-group">
                <label>Care Date To</label>
                <div class="date-input-wrapper">
                    <input type="text" value="10/05/2026" placeholder="mm/dd/yyyy" class="shadow-inner">
                    <span class="material-symbols-outlined date-icon">calendar_today</span>
                </div>
            </div>

            <div class="filter-group">
                <label>Booking Status</label>
                <div class="select-wrapper">
                    <select class="custom-select shadow-inner">
                        <option value="all">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <span class="material-symbols-outlined select-icon">expand_more</span>
                </div>
            </div>

            <div class="filter-group" style="display:flex; gap:8px;">
                <button class="btn btn-primary shadow-sm" style="flex:1;">
                    <span class="material-symbols-outlined icon-xs">filter_alt</span> Apply
                </button>
                <button class="btn-reset" title="Reset Filters">
                    <span class="material-symbols-outlined icon-xs">restart_alt</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Booking Table Section -->
    <div class="directory-card shadow-sm" style="padding:0;">
        <div class="table-responsive">
            <table class="data-table bookings-table" style="min-width:1080px;">
                <thead>
                    <tr>
                        <th class="py-3 px-5">Booking ID</th>
                        <th class="py-3 px-4">Family Member</th>
                        <th class="py-3 px-4">Patient</th>
                        <th class="py-3 px-4">Caregiver</th>
                        <th class="py-3 px-4">Care Date</th>
                        <th class="py-3 px-3">Start Time</th>
                        <th class="py-3 px-3">End Time</th>
                        <th class="py-3 px-4">Booking Status</th>
                        <th class="py-3 px-4">Care Report</th>
                        <th class="py-3 px-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody id="bookingTableBody">
                    
                    <!-- Row 1 -->
                    <tr class="table-row-hover">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00125</span>
                                <span class="font-label-sm text-outline">Created 24 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Sithmini Rathnayake</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Kamal Perera
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuMQOiccb093EXBMSQqW_LLS8nTkAg0VEBUvy_ClT4ql5Cff1Doj-OneQmTkZhGTkjmihKnESC3MW9GdduyarqokUdkE-Ep-eNTY3lZr21Pk7IojrXDYtsXzxO9MtMJNkS5fkfVlP2N3AyWfeVvkmlXRYeLH59PLbyYQa356xyxlpVwN7idmU3nj4kzwVhmV5_pHr6y8sHCVFadPVXqKqk4nB_oIN_C4yr61vI_BI2s6w4Ky5kwwUx" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Sandun Rathnayake</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">28 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">08:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">04:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-scheduled">Approved</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00125" data-patient="Kamal Perera" data-family="Sithmini Rathnayake" 
                                data-caregiver="Sandun Rathnayake" data-status="Approved">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="table-row-hover bg-surface-container-lowest">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00126</span>
                                <span class="font-label-sm text-outline">Created 24 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Nimal Perera</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Nadeesha Perera
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDmst4cKXs0mM2U76jkwgn-5HRnudQTYRL9xWazC_65UfuSr72GOy7mwsoIRekqxBHBp03_Pkr_GnhHGEiZBROEaCaBx6J_2RgwwhVEModGeP4ZZdP1IFkoh-J_pAnV0IM-2dsMAQWIqajA5Gb56ODmY13Q1t3NCMRWoLuhGIudKrm3zxv7K4xijsXdVe_LtiEYxJI7y4NjWTC_TVf0ecEBt0kxSioadHXDZbHSOQLnSso3_TfhwTO" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Sarah Fernando</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">29 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">09:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">03:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-pending">Pending</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00126" data-patient="Nadeesha Perera" data-family="Nimal Perera" 
                                data-caregiver="Sarah Fernando" data-status="Pending">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="table-row-hover">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00127</span>
                                <span class="font-label-sm text-outline">Created 23 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Sanduni Fernando</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Amal Fernando
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQoioHJg6wuURhpftarkXJtfLupK_1Y4sgge4O4GYud7HZV8Y3PUYsE4juVpEhNrVqPFRYo-rUazr8UqFrqxnOnE4eHCCuKftVYD1621TR2667JPO-cI1ASj_dWOvNR_6rEofiiwELcqc4RsRfyzNvy6N5VYW40vLSHi7EuIZTmRSAPwUcpWFqA8NCBMhOlCSFIoksFjXNWQkwoX43mzjZ1jgzdYOAxSx0QxJQqrF1DyY1TRFjdbXo" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Elena Silva</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">27 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">08:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">02:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-in-progress">
                                <span class="dot-sm bg-success animate-pulse"></span> In Progress
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00127" data-patient="Amal Fernando" data-family="Sanduni Fernando" 
                                data-caregiver="Elena Silva" data-status="In Progress">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="table-row-hover bg-surface-container-lowest">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00128</span>
                                <span class="font-label-sm text-outline">Created 22 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Kavindu Silva</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Sunil Silva
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsHEdMvz7YgGOgXiSzxYQGEedVL5v2ZHFA3ugqjDIUWH6BkL8bnykIULcXBcxejKW7SmV_8HQTByqKpd5KIXIvPwhCba1Xw3N7hUVvH0HNKYEmYGPqzfymZLXno864Vq0wkhLaZO1QrLav0hMG_PH7xYLTipEK7fR2kqvQFfq6q74UM74GP5cGsqs1hq5E9ZyomGmuNOdkAdtm4CIOriGPt4TpI_6CJkskM7iAUmsTRkjdh7ScLOpg" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">David Perera</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">25 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">10:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">04:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-completed">Completed</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge submitted">
                                <span class="material-symbols-outlined">check</span> Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00128" data-patient="Sunil Silva" data-family="Kavindu Silva" 
                                data-caregiver="David Perera" data-status="Completed">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="table-row-hover">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00129</span>
                                <span class="font-label-sm text-outline">Created 21 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Kumara Dharmasena</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Anula Dharmasena
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQPmHY0f42JNY42mvJljzMhMa9NdXuphwozZBAq8kDURTS-yrcjvb4tk4giwHBi20kFevDJQECBlR8jVPwEAb9nIyc4xbzgn8PUwD1dWb00yvSZmzi6i0qXM6rNfYr7R4kRMGu9EYWBlknyz0N6WOPcoBOwFmR0BjuG5xEb_oAYMVK7MhCU1HbtUXugheYZlYN0f0nvq72gaHdiughuC0DrAeya0KKjVBbMBTkAQIlpMm4VKR4KVgc" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Dilani Senanayake</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">30 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">07:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">03:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-scheduled">Approved</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00129" data-patient="Anula Dharmasena" data-family="Kumara Dharmasena" 
                                data-caregiver="Dilani Senanayake" data-status="Approved">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr class="table-row-hover bg-surface-container-lowest">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00130</span>
                                <span class="font-label-sm text-outline">Created 20 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Anoma Weerasinghe</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Lionel Weerasinghe
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvlc9K-C8xuwhyNlzWEm_InxkVYzVfGATLQOZDQ9e80wJKn_nyd3an95L82GqDFHFBS_VzVlnWXvmQ_ILtYyAdFk3h-SEdDyHWhr1xoI-VKJUFImQphT-T3cAD_zUpQHQn5mK94_k6tO7W4HC8iZi9J-1JWl3lfDgVVuhx9FKxx-fURMMR-QhITiZEvi9nSCjdDSWyyiKK562GlEh1ibIFJKpQrBtIvZHtuBHE5nt__KddtZECae3G" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Kavinda Bandara</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">01 Oct 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">08:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">08:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-pending">Pending</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00130" data-patient="Lionel Weerasinghe" data-family="Anoma Weerasinghe" 
                                data-caregiver="Kavinda Bandara" data-status="Pending">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr class="table-row-hover">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00131</span>
                                <span class="font-label-sm text-outline">Created 19 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Roshan Jayawardene</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Chandra Jayawardene
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3lIBwcf8fzC_0qIPRAUkx1nGsCrS8uCNfIDtaufcJ2uZ9nrmx1_T9uhYq460ctX1q4ki-NF3Qo8TfK_MuM0OFvmsmZaW3nw9XjWKOX_U-Mh-GgwZwfQw1G2WJMOGcxZ4NsasOYwNa3EwOOs5J8sJ8nO2dBoPD-NadRkvfnTo4dgWuFd6LE6gf2DwH9diro7wRhtCPO6I3DLKQgYgKKjI1DRu2DmHEnmTT5DXTBQ0Z9_69FifoFRqZ" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Nadeesha Perera</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">24 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">09:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">05:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-completed">Completed</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge submitted">
                                <span class="material-symbols-outlined">check</span> Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00131" data-patient="Chandra Jayawardene" data-family="Roshan Jayawardene" 
                                data-caregiver="Nadeesha Perera" data-status="Completed">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr class="table-row-hover bg-surface-container-lowest">
                        <td class="py-4 px-5">
                            <div class="contact-col">
                                <span class="booking-ref">BK-00132</span>
                                <span class="font-label-sm text-outline">Created 18 Sep 2026</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium">Dilrukshi Alwis</td>
                        <td class="py-4 px-4">
                            <div class="patient-cell">
                                <span class="material-symbols-outlined icon-outline icon-xs">elderly</span>
                                Somapala Alwis
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="user-cell-compact">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCABQq6cUJLu_rI7MQn-C6YmXgXMkTj1UB4LcXE18uzno7y5hhDMR4LUzt5nVVrtGAHzCbknWWIOllJ1kt917hAeFFERJKPeQVylUjzLvUBdONEXuDYbmVeslmRHjZIXgm0wCDWSm2X9O3S2CcRsnRLt1OX7YeWFBFzKHCQC8_F-Ekzs9OX84pOJGfUzNx93Qrj0xCqfgl2QyxbzlGfmBzlJZV401App_vYJfv7-wsjs_gNumVVdsZz" alt="Avatar" class="avatar-sm">
                                <span class="font-medium">Suraj Wickramasinghe</span>
                            </div>
                        </td>
                        <td class="py-4 px-4">23 Sep 2026</td>
                        <td class="py-4 px-3 font-mono text-outline">08:00 AM</td>
                        <td class="py-4 px-3 font-mono text-outline">04:00 PM</td>
                        <td class="py-4 px-4">
                            <span class="status-tag status-cancelled">Cancelled</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="report-badge">
                                <span class="dot"></span> Not Submitted
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <button class="btn btn-sm btn-primary view-details-btn shadow-sm" 
                                data-id="BK-00132" data-patient="Somapala Alwis" data-family="Dilrukshi Alwis" 
                                data-caregiver="Suraj Wickramasinghe" data-status="Cancelled">
                                View Details
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="table-pagination" style="padding:16px 24px;">
            <span class="pagination-info">Showing <span>1–8</span> of <span>28</span> bookings</span>
            <div class="pagination-controls">
                <button class="btn-page disabled" disabled>
                    <span class="material-symbols-outlined icon-xs">chevron_left</span> Previous
                </button>
                <button class="btn-page active">1</button>
                <button class="btn-page">2</button>
                <button class="btn-page">3</button>
                <button class="btn-page">4</button>
                <button class="btn-page">
                    Next <span class="material-symbols-outlined icon-xs">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Compliance Note -->
    <div class="compliance-note">
        <div class="compliance-icon">
            <span class="material-symbols-outlined">lock</span>
        </div>
        <div class="compliance-content">
            <h4>Clinical Confidentiality Protocol</h4>
            <p>In adherence with healthcare privacy standards, administrators can verify Care Report submission status for operational accountability, while patient care details, clinical vitals, and private shift observations remain strictly confidential between family guardians and assigned caregivers.</p>
        </div>
    </div>

</div>

<script>
(function() {
    // Modal logic
    const bookingModal = document.getElementById('bookingModal');
    const modalBox = document.getElementById('modalBox');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalDismissBtn = document.getElementById('modalDismissBtn');
    
    const modalBookingId = document.getElementById('modalBookingId');
    const modalPatient = document.getElementById('modalPatient');
    const modalFamily = document.getElementById('modalFamily');
    const modalCaregiver = document.getElementById('modalCaregiver');
    const modalStatusBadge = document.getElementById('modalStatusBadge');

    function openModal(data) {
        modalBookingId.textContent = data.id;
        modalPatient.textContent = data.patient;
        modalFamily.textContent = data.family;
        modalCaregiver.textContent = data.caregiver;
        modalStatusBadge.textContent = data.status;

        // Apply status classes based on data
        if (data.status === 'Approved') {
            modalStatusBadge.className = 'status-tag status-scheduled';
        } else if (data.status === 'Pending') {
            modalStatusBadge.className = 'status-tag status-pending';
        } else if (data.status === 'In Progress') {
            modalStatusBadge.className = 'status-tag status-in-progress';
            modalStatusBadge.innerHTML = '<span class="dot-sm bg-success animate-pulse"></span> In Progress';
        } else if (data.status === 'Completed') {
            modalStatusBadge.className = 'status-tag status-completed';
        } else {
            modalStatusBadge.className = 'status-tag status-cancelled';
        }

        bookingModal.classList.remove('hidden');
        // Small delay to trigger transition
        setTimeout(() => {
            bookingModal.classList.remove('opacity-0');
            modalBox.classList.remove('scale-95');
        }, 10);
    }

    function closeModal() {
        bookingModal.classList.add('opacity-0');
        modalBox.classList.add('scale-95');
        setTimeout(() => {
            bookingModal.classList.add('hidden');
        }, 200);
    }

     document.querySelectorAll('.view-details-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        window.location.href = '/safehands_mvc/admin/bookingDetails';
    });
});

    if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
    if (modalDismissBtn) modalDismissBtn.addEventListener('click', closeModal);
    bookingModal.addEventListener('click', (e) => {
        if (e.target === bookingModal) closeModal();
    });

    // Simple Table Search
    const searchInput = document.getElementById('bookingSearchInput');
    const tableRows = document.querySelectorAll('#bookingTableBody tr');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    }
})();
</script>
