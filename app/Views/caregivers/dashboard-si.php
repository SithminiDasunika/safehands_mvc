 <?php
$caregiverName = $caregiverName ?? ($_SESSION['caregiver_name'] ?? 'රැකවරණ සේවා සපයන්නා');
$caregiverId = $caregiverId ?? ($_SESSION['caregiver_id'] ?? null);

$profileUrl = $caregiverId
    ? '/safehands_mvc/caregiver/profile/' . (int)$caregiverId
    : '/safehands_mvc/caregivers';

$profilePhoto = $profilePhoto ?? '/safehands_mvc/public/assets/images/login-caregiver.jpg';
?>

<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SafeHands රැකවරණ සේවා උපකරණ පුවරුව - <?= htmlspecialchars($caregiverName) ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-dashboard.css?v=1">
</head>

<body>

<!-- ================= TOP NAVIGATION ================= -->

<header class="top-nav-bar">
    <nav class="top-nav-inner">

        <div class="nav-logo-area">

            <a href="/safehands_mvc/caregiver/dashboardSi" class="nav-logo">
                SafeHands
            </a>

            <div class="nav-links">

                <!-- Dashboard -->
                <a class="nav-link active"
                   href="/safehands_mvc/caregiver/dashboardSi">
                    උපකරණ පුවරුව
                </a>

                <!-- Booking Requests -->
                <a class="nav-link"
                   href="/safehands_mvc/bookings">
                    වෙන්කිරීම් ඉල්ලීම්
                </a>

                <!-- Availability -->
                <a class="nav-link"
                   href="/safehands_mvc/caregiver/manageAvailabilitySi">
                    ලබා ගත හැකි වේලාව
                </a>

                <!-- Earnings -->
                <a class="nav-link"
                   href="/safehands_mvc/caregiver/earningsSi">
                    ආදායම්
                </a>

                <!-- Notifications -->
                <a class="nav-link"
                   href="/safehands_mvc/caregiver/notificationsSi">
                    දැනුම්දීම්
                </a>

            </div>
        </div>

        <div class="nav-actions">

            <!-- Language Switcher -->
            <div class="language-switcher">

                <a href="/safehands_mvc/caregiver/dashboard"
                   class="language-option">
                    English
                </a>

                <span class="language-divider">|</span>

                <a href="/safehands_mvc/caregiver/dashboardSi"
                   class="language-option active">
                    සිංහල
                </a>

            </div>

            <!-- Emergency Call -->
            <a href="/safehands_mvc/caregiver/emergencyContactSi"
               class="icon-btn"
               title="හදිසි ඇමතුම්">
                <span class="material-symbols-outlined">
                    call
                </span>
            </a>

            <!-- Logout -->
            <a href="/safehands_mvc/login/logout"
               class="icon-btn"
               title="ඉවත් වන්න">
                <span class="material-symbols-outlined">
                    logout
                </span>
            </a>

            <!-- Profile -->
            <div class="profile-avatar">
                <img
                    alt="රැකවරණ සේවා සපයන්නාගේ ඡායාරූපය"
                    src="<?= htmlspecialchars($profilePhoto) ?>">
            </div>

        </div>

    </nav>
</header>


<!-- ================= MAIN CONTENT ================= -->

<main class="main-content">

    <!-- Greeting Header -->
    <header class="greeting-header">

        <div>

            <h1 class="greeting-title">
                සුභ උදෑසනක්, <?= htmlspecialchars($caregiverName) ?> 👋
            </h1>

            <p class="greeting-subtitle">
                ඔබගේ දෛනික රැකවරණ කාලසටහන, වෙන්කිරීම් සහ ආදායම් එකම ස්ථානයකින් කළමනාකරණය කරන්න.
            </p>

        </div>

        <div class="date-badge">

            <span class="material-symbols-outlined"
                  data-icon="calendar_today">
                calendar_today
            </span>

            <span>
                <?= date('l, M j, Y') ?>
            </span>

        </div>

    </header>


    <!-- ================= QUICK ACTIONS ================= -->

    <div class="quick-action-grid">

        <!-- Booking Requests -->
        <a href="/safehands_mvc/bookings"
           class="quick-action-card">

            <div class="qa-icon-wrapper bg-primary-container">

                <span class="material-symbols-outlined">
                    assignment
                </span>

            </div>

            <span class="quick-action-label">
                වෙන්කිරීම් ඉල්ලීම්
            </span>

        </a>


        <!-- Emergency Contact -->
        <a href="/safehands_mvc/caregiver/emergencyContactSi"
           class="quick-action-card">

            <div class="qa-icon-wrapper bg-primary-container">

                <span class="material-symbols-outlined"
                      data-icon="contact_phone">
                    contact_phone
                </span>

            </div>

            <span class="quick-action-label">
                හදිසි සම්බන්ධතා තොරතුරු
            </span>

        </a>


        <!-- Manage Availability -->
        <a href="/safehands_mvc/caregiver/manageAvailabilitySi"
           class="quick-action-card">

            <div class="qa-icon-wrapper bg-secondary-container">

                <span class="material-symbols-outlined"
                      data-icon="event_note">
                    event_note
                </span>

            </div>

            <span class="quick-action-label">
                ලබා ගත හැකි වේලාව කළමනාකරණය
            </span>

        </a>


        <!-- Pending Reports -->
        <a href="/safehands_mvc/caregiver/pendingReportsSi"
           class="quick-action-card">

            <div class="qa-icon-wrapper bg-warning-container">

                <span class="material-symbols-outlined"
                      data-icon="description">
                    description
                </span>

            </div>

            <span class="quick-action-label">
                ඉතිරි වාර්තා
            </span>

        </a>


        <!-- Earnings -->
        <a href="/safehands_mvc/caregiver/earningsSi"
           class="quick-action-card">

            <div class="qa-icon-wrapper bg-success-container">

                <span class="material-symbols-outlined"
                      data-icon="payments">
                    payments
                </span>

            </div>

            <span class="quick-action-label">
                ආදායම් බලන්න
            </span>

        </a>

    </div>


    <!-- ================= DASHBOARD GRID ================= -->

    <div class="dashboard-grid">

        <!-- ================= MAIN COLUMN ================= -->

        <div class="main-column">


            <!-- Emergency Contact Information -->

            <section class="section-container">

                <div class="section-header">

                    <h2 class="section-title">
                        හදිසි සම්බන්ධතා තොරතුරු
                    </h2>

                    <a href="/safehands_mvc/caregiver/scheduleSi"
                       class="section-link">
                        දින දර්ශනය බලන්න
                    </a>

                </div>


                <!-- Booking Card -->

                <div class="card card-no-pad">

                    <div class="status-indicator-left"></div>

                    <div style="padding: 1.5rem;"
                         class="schedule-card">

                        <div class="client-avatar-large">

                            <img
                                alt="සිල්වා මහතා"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6XEdrc0nXc3xIj-Kb6mR-Puo88Cks7w67ymcy3zDC66S08KwIF2Bp2iZVi6vWvt0Fy8KAKHm3tZeH_L7oWWPHpmxO8lZol5i-zjQMWtuAj4QfJenH6zN6_PKADaxCO6Rhw1e2X9eov7E6RIaIr2g1tT4EdqhaomguYkRtp9Y29W1WHDsb_Ns5-RuICOPTVYTcQu4J9OYUXXr5Zj_Yv14khK1ygw_OlYFUKjDeoMrLdVfHQzB5xFfpkC4Y179mbUq5lQk9hfcAdYY">

                        </div>


                        <div class="schedule-details">

                            <div class="schedule-header">

                                <div>

                                    <h3 class="schedule-title">
                                        සිල්වා මහතා - ශල්‍යකර්මයෙන් පසු රැකවරණය
                                    </h3>

                                    <div class="schedule-meta">

                                        <span class="meta-item">

                                            <span
                                                class="material-symbols-outlined"
                                                style="font-size:18px;"
                                                data-icon="schedule">
                                                schedule
                                            </span>

                                            පෙ.ව. 8:00 – ප.ව. 12:00

                                        </span>


                                        <span class="meta-item">

                                            <span
                                                class="material-symbols-outlined"
                                                style="font-size:18px;"
                                                data-icon="location_on">
                                                location_on
                                            </span>

                                            කොළඹ 07

                                        </span>

                                    </div>

                                </div>


                                <span class="status-badge">
                                    තහවුරු කර ඇත
                                </span>

                            </div>


                            <div class="action-buttons">

                                <button class="btn-primary">
                                    සේවාව ආරම්භ කරන්න
                                </button>

                                <button class="btn-outline">
                                    විස්තර බලන්න
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            <!-- ================= AVAILABILITY SUMMARY ================= -->

            <section class="section-container">

                <h2 class="section-title"
                    style="margin-bottom: 1.5rem;">
                    ලබා ගත හැකි වේලාවන්ගේ සාරාංශය
                </h2>


                <div class="card">

                    <div class="availability-grid">


                        <div class="avail-day">

                            <span class="avail-day-name">
                                සඳු
                            </span>

                            <div class="avail-box available">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="check_circle">
                                    check_circle
                                </span>

                            </div>

                            <span class="avail-status text-success">
                                ලබා ගත හැක
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                අඟ
                            </span>

                            <div class="avail-box full">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="block">
                                    block
                                </span>

                            </div>

                            <span class="avail-status text-variant">
                                සම්පූර්ණයි
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                බදා
                            </span>

                            <div class="avail-box available">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="check_circle">
                                    check_circle
                                </span>

                            </div>

                            <span class="avail-status text-success">
                                ලබා ගත හැක
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                බ්‍රහ
                            </span>

                            <div class="avail-box available">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="check_circle">
                                    check_circle
                                </span>

                            </div>

                            <span class="avail-status text-success">
                                ලබා ගත හැක
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                සිකු
                            </span>

                            <div class="avail-box available">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="check_circle">
                                    check_circle
                                </span>

                            </div>

                            <span class="avail-status text-success">
                                ලබා ගත හැක
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                සෙන
                            </span>

                            <div class="avail-box off">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="event_busy">
                                    event_busy
                                </span>

                            </div>

                            <span class="avail-status text-variant">
                                නිවාඩු
                            </span>

                        </div>


                        <div class="avail-day">

                            <span class="avail-day-name">
                                ඉරි
                            </span>

                            <div class="avail-box off">

                                <span
                                    class="material-symbols-outlined"
                                    data-icon="event_busy">
                                    event_busy
                                </span>

                            </div>

                            <span class="avail-status text-variant">
                                නිවාඩු
                            </span>

                        </div>

                    </div>

                </div>

            </section>


            <!-- ================= UPCOMING BOOKINGS ================= -->

            <section class="section-container">

                <h2 class="section-title"
                    style="margin-bottom: 1.5rem;">
                    ඉදිරි වෙන්කිරීම්
                </h2>


                <div class="card card-no-pad">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>
                                    සේවාලාභියා
                                </th>

                                <th>
                                    දිනය සහ වේලාව
                                </th>

                                <th>
                                    තත්ත්වය
                                </th>

                                <th class="text-right">
                                    ක්‍රියාව
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <!-- Mrs Perera -->

                            <tr>

                                <td>

                                    <div class="client-info">

                                        <div class="client-avatar">

                                            <img
                                                alt="පෙරේරා මහත්මිය"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAN-mrLhtu09J5mZYquggVhJBAOX2H58CY4oAiU7LaWUgJnHF-pO_PKl2Zk4fk0u6I4u4Rs1ubvDVIH9AxyD5IsF_1PUTYbwNvbzfhh8QhzdRtrYRpQAeeTNPCZKOXHC9Es8ztXxa2VdyGWnhYmtznYHPNh4iz_ipsCd7ET2SauzgsA9G39BqEgG1q2ivrj7VbABuyyKi1393REWOK_VeYgWVq2tff9bhhdtYK7DkBT6npsLzngjtGaz4XFthEPmSZCrelLqBPLP3U">

                                        </div>

                                        <span class="client-name">
                                            පෙරේරා මහත්මිය
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <div class="date-time">

                                        <span class="date">
                                            2024 ඔක්තෝබර් 25
                                        </span>

                                        <span class="time">
                                            පෙ.ව. 09:00 – ප.ව. 1:00
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <span class="status-badge uppercase">
                                        තහවුරු කර ඇත
                                    </span>

                                </td>


                                <td class="text-right">

                                    <button class="action-link">
                                        විස්තර
                                    </button>

                                </td>

                            </tr>


                            <!-- Mr Fernando -->

                            <tr>

                                <td>

                                    <div class="client-info">

                                        <div class="client-avatar">

                                            <img
                                                alt="ප්‍රනාන්දු මහතා"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlCBP1WtHSAQwsanlr8DavO3hFVeN1C5_Q684bj1kCkPz3ipltmlaEVrr2dFTqwyQGi0Kgp1k4rdSM743YegerSmZ59htE0qAqOOOU8SnzKZg83lWMxFI28KSoH70ycW8FdszWVKEPSiqJApOLdHWCe6KOiYWVsquoQRxGHs0fd6HhiTAXmVE_rJoKcgfci7jtFFJbbF354A2NRvyJyjVWgQ5NjL3r5U9jT46iCORNzoQ5NQCPOQjitM8Su0HxxlP8j3mgV7vTl9Q">

                                        </div>

                                        <span class="client-name">
                                            ප්‍රනාන්දු මහතා
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <div class="date-time">

                                        <span class="date">
                                            2024 ඔක්තෝබර් 26
                                        </span>

                                        <span class="time">
                                            ප.ව. 2:00 – 6:00
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <span class="status-badge uppercase">
                                        තහවුරු කර ඇත
                                    </span>

                                </td>


                                <td class="text-right">

                                    <button class="action-link">
                                        විස්තර
                                    </button>

                                </td>

                            </tr>


                            <!-- Ms Jayamaha -->

                            <tr>

                                <td>

                                    <div class="client-info">

                                        <div class="client-avatar">

                                            <img
                                                alt="ජයමහ මහත්මිය"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4IqPZ9xtIwZV6ht0HTpSv9TrvuprekRN32mthdVfVLtMzrY2CzTUs7Q0eM2mvtCR_yspxokjuBtQTsJ384dxpObn2buI_JAw2x853ex9YjCg1kNHABRl-Wz_vapOsmZw3Hoqm-kwHB3wSuIIih8AMin2LnLfuPGwLvHptukTnr1qJhd83sFP0JYZ750BFjVGPeISS6lhdC4xyJUWaUKmLYowLXZvmeHkVB79aq90XtgUUWb4Xi-hCFV863H7lhjv0OxfSG6-qN_M">

                                        </div>

                                        <span class="client-name">
                                            ජයමහ මහත්මිය
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <div class="date-time">

                                        <span class="date">
                                            2024 ඔක්තෝබර් 27
                                        </span>

                                        <span class="time">
                                            පෙ.ව. 10:00 – ප.ව. 2:00
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <span class="status-badge uppercase">
                                        තහවුරු කර ඇත
                                    </span>

                                </td>


                                <td class="text-right">

                                    <button class="action-link">
                                        විස්තර
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </section>

        </div>


        <!-- ================= SIDEBAR ================= -->

        <div class="side-column">


            <!-- Earnings Summary -->

            <div class="card">

                <div class="title-flex">

                    <h3 class="side-card-title">
                        ආදායම් සාරාංශය
                    </h3>

                    <span
                        class="material-symbols-outlined text-primary cursor-pointer"
                        data-icon="trending_up">
                        trending_up
                    </span>

                </div>


                <div class="earnings-grid">

                    <div class="earning-box">

                        <p class="earning-label">
                            නිදහස් කළ
                        </p>

                        <p class="earning-value text-success">
                            LKR 42,500
                        </p>

                    </div>


                    <div class="earning-box">

                        <p class="earning-label">
                            රඳවා ඇති
                        </p>

                        <p class="earning-value text-on-surface">
                            LKR 8,200
                        </p>

                    </div>


                    <div class="earning-box">

                        <p class="earning-label">
                            මෙම මාසය
                        </p>

                        <p class="earning-value text-primary">
                            LKR 94,800
                        </p>

                    </div>


                    <div class="earning-box">

                        <p class="earning-label">
                            සැසි
                        </p>

                        <p class="earning-value text-on-surface">
                            24 සම්පූර්ණයි
                        </p>

                    </div>

                </div>

            </div>


            <!-- Performance -->

            <div class="card">

                <h3 class="side-card-title">
                    කාර්යසාධනය
                </h3>


                <div class="perf-list">

                    <div>

                        <div class="perf-item">

                            <span class="perf-label">
                                ශ්‍රේණිගත කිරීම
                            </span>

                            <div class="rating-val">

                                <span class="perf-value">
                                    4.9
                                </span>

                                <span
                                    class="material-symbols-outlined star-icon"
                                    data-icon="star">
                                    star
                                </span>

                            </div>

                        </div>


                        <div class="progress-bar-bg"
                             style="margin-top:8px;">

                            <div class="progress-bar-fill"></div>

                        </div>

                    </div>


                    <div class="perf-item">

                        <span class="perf-label">
                            ප්‍රතිචාර අනුපාතය
                        </span>

                        <span class="perf-value">
                            100%
                        </span>

                    </div>


                    <div class="perf-item">

                        <span class="perf-label">
                            සම්පූර්ණ කිරීමේ අනුපාතය
                        </span>

                        <span class="perf-value">
                            96%
                        </span>

                    </div>

                </div>

            </div>


            <!-- Pending Reports -->

            <div class="card">

                <h3 class="side-card-title">
                    ඉතිරි වාර්තා
                </h3>


                <div class="report-list">


                    <div class="report-item">

                        <div class="report-header">

                            <div>

                                <p class="report-name">
                                    අබේවික්‍රම මහත්මිය
                                </p>

                                <p class="report-time">
                                    ඊයේ, ප.ව. 4:00
                                </p>

                            </div>

                            <span
                                class="material-symbols-outlined report-icon"
                                data-icon="pending_actions">
                                pending_actions
                            </span>

                        </div>


                        <button
                            class="btn-report"
                            onclick="window.location.href='/safehands_mvc/caregiver/scheduleSi'">

                            වාර්තාව සම්පූර්ණ කරන්න

                        </button>

                    </div>


                    <div class="report-item">

                        <div class="report-header">

                            <div>

                                <p class="report-name">
                                    සමරනායක මහතා
                                </p>

                                <p class="report-time">
                                    ඔක්තෝබර් 22, පෙ.ව. 10:00
                                </p>

                            </div>

                            <span
                                class="material-symbols-outlined report-icon"
                                data-icon="pending_actions">
                                pending_actions
                            </span>

                        </div>


                        <button
                            class="btn-report"
                            onclick="window.location.href='/safehands_mvc/caregiver/scheduleSi'">

                            වාර්තාව සම්පූර්ණ කරන්න

                        </button>

                    </div>

                </div>

            </div>


            <!-- Recent Notifications -->

            <div class="card">

                <h3 class="side-card-title">
                    දැනුම්දීම්
                </h3>


                <div class="notif-list">


                    <div class="notif-item border-b">

                        <div class="notif-icon success">

                            <span
                                class="material-symbols-outlined"
                                style="font-size:18px;"
                                data-icon="check_circle">
                                check_circle
                            </span>

                        </div>


                        <div>

                            <p class="notif-title">
                                ගෙවීම නිදහස් කර ඇත
                            </p>

                            <p class="notif-desc">
                                පසුගිය සතිය සඳහා ඔබගේ ආදායම නිදහස් කර ඇත.
                            </p>

                        </div>

                    </div>


                    <div class="notif-item">

                        <div class="notif-icon primary">

                            <span
                                class="material-symbols-outlined"
                                style="font-size:18px;"
                                data-icon="new_releases">
                                new_releases
                            </span>

                        </div>


                        <div>

                            <p class="notif-title">
                                නව වෙන්කිරීමේ ඉල්ලීමක්
                            </p>

                            <p class="notif-desc">
                                පෙරේරා මහතා ඔක්තෝබර් 30 සඳහා සේවා සැසියක් ඉල්ලා ඇත.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Support -->

            <div class="support-card">

                <div class="support-content">

                    <h3 class="support-title">
                        සහාය අවශ්‍යද?
                    </h3>

                    <p class="support-desc">
                        ඔබගේ රැකවරණ සේවා සඳහා සහාය වීමට අපගේ සහාය කණ්ඩායම පැය 24 පුරාම සූදානම්.
                    </p>


                    <button class="btn-support">

                        <span
                            class="material-symbols-outlined"
                            data-icon="support_agent">
                            support_agent
                        </span>

                        සහාය අමතන්න

                    </button>

                </div>


                <div class="decor-shape-1"></div>
                <div class="decor-shape-2"></div>

            </div>

        </div>

    </div>

</main>


<!-- ================= FOOTER ================= -->

<footer class="footer">

    <div class="footer-inner">

        <div class="footer-brand">

            <span class="brand-name">
                SafeHands
            </span>

            <span class="copyright">
                © 2024 SafeHands Healthcare. සියලුම හිමිකම් ඇවිරිණි.
            </span>

        </div>


        <div class="footer-links">

            <a class="footer-link" href="#">
                රහස්‍යතා ප්‍රතිපත්තිය
            </a>

            <a class="footer-link" href="#">
                කොන්දේසි
            </a>

            <a class="footer-link" href="#">
                උපකාරක මධ්‍යස්ථානය
            </a>

        </div>

    </div>

</footer>


<script src="/safehands_mvc/public/assets/js/caregiver-dashboard.js?v=1"></script>

</body>
</html>