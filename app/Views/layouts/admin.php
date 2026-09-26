<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'SafeHands Admin Dashboard') ?></title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/admin.css?v=2">
</head>
<body>
    
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="brand">
                <img src="https://lh3.googleusercontent.com/aida/AEtjO1VfAqMd-A3yLFiVBGFi6RYIEexgRBafFUBLl5MDx-66vRdoebiu-9LA0DFRx3-BKTu7p7T4Td5ITjuZZ7WD0wqmpWTF14CJL8HtSiPt_9EfkFcrX-7xibtbM1HiRz1-5m8Ux4vsJ5ipN5sFg1f8o3o00hp5hLe2t0Q_cDlrJ0LgWBE-XSnI1_HFHxepZ2rlmYg02vJtO-SJGE1EXR0WmfD69seAq8aCP3mzcyBWBSc4-g2KnCiCWDEXsx0" alt="SafeHands Logo" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-title">SafeHands</span>
                    <span class="brand-subtitle">HEALTHCARE ADMIN</span>
                </div>
            </div>
            
            <nav class="nav-menu">
                <a href="/safehands_mvc/admin/dashboard" class="nav-item <?= (isset($active_tab) && $active_tab === 'dashboard') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">grid_view</span>
                    <span>Dashboard</span>
                </a>
                <a href="/safehands_mvc/admin/caregivers" class="nav-item <?= (isset($active_tab) && $active_tab === 'caregivers') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">medical_services</span>
                    <span>Caregivers</span>
                </a>
                <a href="/safehands_mvc/admin/families" class="nav-item <?= (isset($active_tab) && $active_tab === 'families') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">diversity_1</span>
                    <span>Families</span>
                </a>
                <a href="/safehands_mvc/admin/bookings" class="nav-item <?= (isset($active_tab) && $active_tab === 'bookings') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">event_available</span>
                    <span>Bookings</span>
                </a>
                <a href="/safehands_mvc/admin/payments" class="nav-item <?= (isset($active_tab) && $active_tab === 'payments') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">payments</span>
                    <span>Payments</span>
                </a>
                <a href="/safehands_mvc/admin/complaints" class="nav-item <?= (isset($active_tab) && $active_tab === 'complaints') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">report_problem</span>
                    <span>Complaints</span>
                </a>
                <a href="/safehands_mvc/admin/reports" class="nav-item <?= (isset($active_tab) && $active_tab === 'reports') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">analytics</span>
                    <span>Reports</span>
                </a>
                <a href="/safehands_mvc/admin/notifications" class="nav-item <?= (isset($active_tab) && $active_tab === 'notifications') ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">notifications</span>
                    <span>Notifications</span>
                    <span class="pill-count pill-error" id="sidebarBadge" style="margin-left:auto;">3</span>
                </a>
            </nav>
        </div>
        
        <div class="sidebar-bottom">
            <div class="system-status">
                <div class="status-indicator">
                    <span class="status-dot"></span>
                    <span class="status-text">System Online</span>
                </div>
                <a href="/safehands_mvc/login" class="logout-btn">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </a>
            </div>
            
            <div class="user-profile">
                <div class="user-avatar">
                    <span class="material-symbols-outlined">person</span>
                </div>
                <div class="user-info">
                    <span class="user-name">Admin User</span>
                    <span class="user-email">system@safehands.org</span>
                </div>
            </div>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <div class="mobile-brand">
                <img src="https://lh3.googleusercontent.com/aida/AEtjO1VfAqMd-A3yLFiVBGFi6RYIEexgRBafFUBLl5MDx-66vRdoebiu-9LA0DFRx3-BKTu7p7T4Td5ITjuZZ7WD0wqmpWTF14CJL8HtSiPt_9EfkFcrX-7xibtbM1HiRz1-5m8Ux4vsJ5ipN5sFg1f8o3o00hp5hLe2t0Q_cDlrJ0LgWBE-XSnI1_HFHxepZ2rlmYg02vJtO-SJGE1EXR0WmfD69seAq8aCP3mzcyBWBSc4-g2KnCiCWDEXsx0" alt="Logo" class="mobile-logo">
                <span class="mobile-title">SafeHands</span>
            </div>
            
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">search</span>
                <input type="text" placeholder="Search caregivers, families, bookings, or transactions...">
            </div>
            
            <div class="topbar-actions">
                <button class="notification-btn">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="notification-badge"></span>
                </button>
                
                <div class="profile-dropdown">
                    <div class="profile-avatar">
                        <span class="material-symbols-outlined">person</span>
                        <span class="status-badge"></span>
                    </div>
                    <div class="profile-details">
                        <span class="profile-name">Admin User</span>
                        <span class="profile-role">SYSTEM ROOT</span>
                    </div>
                </div>
            </div>
        </header>

        <main class="content-area">
            <?= $content ?>
        </main>
    </div>

    <script src="/safehands_mvc/public/assets/js/admin.js?v=<?= time() ?>"></script>
</body>
</html>
