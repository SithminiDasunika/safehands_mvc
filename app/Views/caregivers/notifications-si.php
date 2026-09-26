<?php
$title = $data['title'] ?? 'දැනුම්දීම් | SafeHands';
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-notifications.css?v=2"
    >
</head>

<body>

<header class="caregiver-header">

    <div class="header-container">

        <a
            href="/safehands_mvc/caregiver/dashboardSi"
            class="logo"
        >
            SafeHands
        </a>

        <nav class="desktop-nav">

            <a href="/safehands_mvc/caregiver/dashboardSi">
                උපකරණ පුවරුව
            </a>

             

            <a
                href="/safehands_mvc/caregiver/notificationsSi"
                class="active"
            >
                දැනුම්දීම්
            </a>

        </nav>

        <div class="header-right">

            <div class="caregiver-user">

                <div class="caregiver-user-text">
                    <strong>Caregiver</strong>
                    <span>
                        <span class="active-dot"></span>
                        සක්‍රීය
                    </span>
                </div>

                <div class="caregiver-avatar">
                    C
                </div>

            </div>

            <button
                type="button"
                id="mobileMenuButton"
                class="mobile-menu-button"
                aria-label="මෙනුව විවෘත කරන්න"
            >
                ☰
            </button>

        </div>

    </div>

    <nav
        id="mobileNav"
        class="mobile-nav"
    >

        <a href="/safehands_mvc/caregiver/dashboardSi">
            උපකරණ පුවරුව
        </a>

        <a href="/safehands_mvc/caregiver/scheduleSi">
            මගේ උපලේඛනය
        </a>

        <a href="/safehands_mvc/caregiver/manageලබා ගත හැකි වේලාවSi">
            ලබා ගත හැකි වේලාව
        </a>

        <a href="/safehands_mvc/caregiver/earningsSi">
            ආදායම්
        </a>

        <a
            href="/safehands_mvc/caregiver/notificationsSi"
            class="active"
        >
            දැනුම්දීම්
        </a>

    </nav>

</header>


<main class="notifications-container">

    <!-- Breadcrumb -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/caregiver/dashboardSi">
            උපකරණ පුවරුව
        </a>

        <span>›</span>

        <span>දැනුම්දීම්</span>

    </div>


    <!-- Page heading -->

    <section class="page-heading">

        <div>

            <h1>දැනුම්දීම්</h1>

            <p>
                ඔබගේ වෙන්කිරීම්, ගෙවීම් සහ වැදගත් ගිණුම් ක්‍රියාකාරකම්
                පිළිබඳ යාවත්කාලීනව සිටින්න.
            </p>

        </div>

        <button
            type="button"
            id="markAllButton"
            class="mark-all-button"
        >
            ✓ සියල්ල කියවූ ලෙස සලකුණු කරන්න
        </button>

    </section>


    <!-- Filters -->

    <section class="notification-filters">

        <div class="search-box">

            <span>⌕</span>

            <input
                type="text"
                id="notificationSearch"
                placeholder="දැනුම්දීම් සොයන්න..."
            >

        </div>


        <div class="filter-group">

            <select id="categoryFilter">

                <option value="all">
                    ප්‍රවර්ග: සියල්ල
                </option>

                <option value="bookings">
                    වෙන්කිරීම්
                </option>

                <option value="services">
                    අද සේවා
                </option>

                <option value="payments">
                    ගෙවීම්
                </option>

                <option value="reports">
                    දෛනික වාර්තා
                </option>

                <option value="profile">
                    පැතිකඩ
                </option>

                <option value="system">
                    පද්ධතිය
                </option>

            </select>


            <select id="statusFilter">

                <option value="all">
                    තත්ත්වය: සියල්ල
                </option>

                <option value="unread">
                    නොකියවූ
                </option>

                <option value="read">
                    කියවූ
                </option>

            </select>

        </div>

    </section>


    <!-- Notification list -->

    <section
        id="notificationList"
        class="notification-list"
    >


        <!-- Notification 1 -->

        <article
            class="notification-card unread"
            data-category="services"
            data-status="unread"
        >

            <div class="notification-icon blue">
                📅
            </div>

            <div class="notification-content">

                <div class="notification-category">
                    අද සේවා
                    <span class="unread-dot"></span>
                </div>

                <h3>
                    අද රැකවරණ සේවා වාරය
                </h3>

                <p>
                    අද පෙ.ව. 8:00ට Mr. Silva සමඟ රැකවරණ සේවා වාරයක්
                    ඔබට නියමිතව ඇත.
                </p>

                <small>
                    අද පෙ.ව. 6:45
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="primary-action view-booking-button"
                    data-booking="BK-2026-00125"
                >
                    වෙන්කිරීම බලන්න
                </button>

            </div>

        </article>


        <!-- Notification 2 -->

        <article
            class="notification-card"
            data-category="payments"
            data-status="read"
        >

            <div class="notification-icon green">
                💰
            </div>

            <div class="notification-content">

                <div class="notification-category green-text">
                    ගෙවීම්
                </div>

                <h3>
                    ගෙවීම නිකුත් කර ඇත
                </h3>

                <p>
                    රු. 2,500ක ඔබගේ ගෙවීම සාර්ථකව නිකුත් කර ඇත.
                </p>

                <small>
                    ඊයේ, ප.ව. 4:30
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="secondary-action view-earning-button"
                >
                    ආදායම් බලන්න
                </button>

            </div>

        </article>


        <!-- Notification 3 -->

        <article
            class="notification-card unread"
            data-category="reports"
            data-status="unread"
        >

            <div class="notification-icon orange">
                📄
            </div>

            <div class="notification-content">

                <div class="notification-category">
                    දෛනික වාර්තා
                    <span class="unread-dot"></span>
                </div>

                <h3>
                    දෛනික රැකවරණ වාර්තා මතක් කිරීම
                </h3>

                <p>
                    ඔබගේ සේවාව සම්පූර්ණ කිරීමෙන් පසු අද දින රැකවරණ වාර්තාව
                    ඉදිරිපත් කරන්න.
                </p>

                <small>
                    දැන්
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="primary-action submit-report-button"
                >
                    වාර්තාව ඉදිරිපත් කරන්න
                </button>

            </div>

        </article>


        <!-- Notification 4 -->

        <article
            class="notification-card"
            data-category="profile"
            data-status="read"
        >

            <div class="notification-icon light-blue">
                ✓
            </div>

            <div class="notification-content">

                <div class="notification-category">
                    පැතිකඩ
                </div>

                <h3>
                    පැතිකඩ තහවුරු කර ඇත
                </h3>

                <p>
                    පරිපාලක විසින් ඔබගේ රැකවරණ සේවා සපයන්නාගේ පැතිකඩ
                    සාර්ථකව තහවුරු කර ඇත.
                </p>

                <small>
                    12 July 2026
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="secondary-action view-profile-button"
                >
                    පැතිකඩ බලන්න
                </button>

            </div>

        </article>


        <!-- Notification 5 -->

        <article
            class="notification-card"
            data-category="bookings"
            data-status="read"
        >

            <div class="notification-icon red">
                !
            </div>

            <div class="notification-content">

                <div class="notification-category red-text">
                    වෙන්කිරීම්
                </div>

                <h3>
                    වෙන්කිරීම අවලංගු කර ඇත
                </h3>

                <p>
                    ජූලි 22 දිනට නියමිත වෙන්කිරීම
                    පවුලේ සාමාජිකයා විසින් අවලංගු කර ඇත.
                </p>

                <small>
                    දින 2කට පෙර
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="secondary-action view-booking-button"
                    data-booking="BK-2026-00131"
                >
                    වෙන්කිරීම බලන්න
                </button>

            </div>

        </article>


    </section>


    <!-- No results -->

    <div
        id="noදැනුම්දීම්"
        class="no-notifications hidden"
    >
        දැනුම්දීම් කිසිවක් හමු නොවීය.
    </div>


    <!-- Load previous -->

    <div class="load-more-container">

        <button
            type="button"
            id="loadPreviousButton"
            class="load-more-button"
        >
            පෙර දැනුම්දීම් පූරණය කරන්න
            <span>⌄</span>
        </button>

    </div>

</main>


<!-- Booking Modal -->

<div
    id="bookingModal"
    class="modal hidden"
>

    <div class="modal-content">

        <button
            type="button"
            id="closeBookingModal"
            class="modal-close"
        >
            ×
        </button>

        <h2>වෙන්කිරීමේ විස්තර</h2>

        <div class="booking-details">

            <p>
                <strong>වෙන්කිරීමේ අංකය:</strong>
                <span id="modalBookingId">-</span>
            </p>

            <p>
                <strong>රෝගියා:</strong>
                <span id="modalPatient">-</span>
            </p>

            <p>
                <strong>දිනය:</strong>
                <span id="modalDate">-</span>
            </p>

            <p>
                <strong>සේවා මුරය:</strong>
                <span id="modalShift">-</span>
            </p>

        </div>

    </div>

</div>


<footer class="footer">

    <div>

        <strong>SafeHands</strong>

        <p>
            © 2026 SafeHands. සියලු හිමිකම් ඇවිරිණි.
        </p>

    </div>

    <div class="footer-links">

        <a href="#">සේවා කොන්දේසි</a>
        <a href="#">පෞද්ගලිකත්ව ප්‍රතිපත්තිය</a>
        <a href="#">සහාය අමතන්න</a>

    </div>

</footer>


<script
    src="/safehands_mvc/public/assets/js/caregiver-notifications.js"
></script>

</body>
</html>