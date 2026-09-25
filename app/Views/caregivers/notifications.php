<?php
$title = $data['title'] ?? 'Notifications | SafeHands';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= htmlspecialchars($title) ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-notifications.css"
    >
</head>

<body>

<header class="caregiver-header">

    <div class="header-container">

        <a
            href="/safehands_mvc/caregiver/dashboard"
            class="logo"
        >
            SafeHands
        </a>

        <nav class="desktop-nav">

            <a href="/safehands_mvc/caregiver/dashboard">
                Dashboard
            </a>

            <a href="/safehands_mvc/caregiver/schedule">
                My Schedule
            </a>

            <a href="/safehands_mvc/caregiver/manageAvailability">
                Availability
            </a>

            <a href="/safehands_mvc/caregiver/earnings">
                Earnings
            </a>

            <a
                href="/safehands_mvc/caregiver/notifications"
                class="active"
            >
                Notifications
            </a>

        </nav>

        <div class="header-right">

            <button
                type="button"
                class="notification-icon-button"
                aria-label="Notifications"
            >
                🔔
                <span class="notification-dot"></span>
            </button>

            <div class="caregiver-user">

                <div class="caregiver-user-text">
                    <strong>Caregiver</strong>
                    <span>
                        <span class="active-dot"></span>
                        Active
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
                aria-label="Open menu"
            >
                ☰
            </button>

        </div>

    </div>

    <nav
        id="mobileNav"
        class="mobile-nav"
    >

        <a href="/safehands_mvc/caregiver/dashboard">
            Dashboard
        </a>

        <a href="/safehands_mvc/caregiver/schedule">
            My Schedule
        </a>

        <a href="/safehands_mvc/caregiver/manageAvailability">
            Availability
        </a>

        <a href="/safehands_mvc/caregiver/earnings">
            Earnings
        </a>

        <a
            href="/safehands_mvc/caregiver/notifications"
            class="active"
        >
            Notifications
        </a>

    </nav>

</header>


<main class="notifications-container">

    <!-- Breadcrumb -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/caregiver/dashboard">
            Dashboard
        </a>

        <span>›</span>

        <span>Notifications</span>

    </div>


    <!-- Page heading -->

    <section class="page-heading">

        <div>

            <h1>Notifications</h1>

            <p>
                Stay updated with your bookings, payments
                and important account activities.
            </p>

        </div>

        <button
            type="button"
            id="markAllButton"
            class="mark-all-button"
        >
            ✓ Mark All as Read
        </button>

    </section>


    <!-- Filters -->

    <section class="notification-filters">

        <div class="search-box">

            <span>⌕</span>

            <input
                type="text"
                id="notificationSearch"
                placeholder="Search notifications..."
            >

        </div>


        <div class="filter-group">

            <select id="categoryFilter">

                <option value="all">
                    Categories: All
                </option>

                <option value="bookings">
                    Bookings
                </option>

                <option value="services">
                    Today's Services
                </option>

                <option value="payments">
                    Payments
                </option>

                <option value="reports">
                    Daily Reports
                </option>

                <option value="profile">
                    Profile
                </option>

                <option value="system">
                    System
                </option>

            </select>


            <select id="statusFilter">

                <option value="all">
                    Status: All
                </option>

                <option value="unread">
                    Unread
                </option>

                <option value="read">
                    Read
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
                    Today's Services
                    <span class="unread-dot"></span>
                </div>

                <h3>
                    Today's Care Session
                </h3>

                <p>
                    You have a scheduled care session
                    with Mr. Silva today at 8:00 AM.
                </p>

                <small>
                    Today at 6:45 AM
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="primary-action view-booking-button"
                    data-booking="BK-2026-00125"
                >
                    View Booking
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
                    Payments
                </div>

                <h3>
                    Payment Released
                </h3>

                <p>
                    Your payment of Rs. 2,500 has been
                    successfully released.
                </p>

                <small>
                    Yesterday, 4:30 PM
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="secondary-action view-earning-button"
                >
                    View Earnings
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
                    Daily Reports
                    <span class="unread-dot"></span>
                </div>

                <h3>
                    Daily Care Report Reminder
                </h3>

                <p>
                    Please submit today's care report
                    after completing your service.
                </p>

                <small>
                    Just now
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="primary-action submit-report-button"
                >
                    Submit Report
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
                    Profile
                </div>

                <h3>
                    Profile Verified
                </h3>

                <p>
                    Your caregiver profile has been
                    successfully verified by the administrator.
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
                    View Profile
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
                    Bookings
                </div>

                <h3>
                    Booking Cancelled
                </h3>

                <p>
                    The booking scheduled for 22 July
                    has been cancelled by the family member.
                </p>

                <small>
                    2 days ago
                </small>

            </div>

            <div class="notification-action">

                <button
                    type="button"
                    class="secondary-action view-booking-button"
                    data-booking="BK-2026-00131"
                >
                    View Booking
                </button>

            </div>

        </article>


    </section>


    <!-- No results -->

    <div
        id="noNotifications"
        class="no-notifications hidden"
    >
        No notifications found.
    </div>


    <!-- Load previous -->

    <div class="load-more-container">

        <button
            type="button"
            id="loadPreviousButton"
            class="load-more-button"
        >
            Load previous notifications
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

        <h2>Booking Details</h2>

        <div class="booking-details">

            <p>
                <strong>Booking ID:</strong>
                <span id="modalBookingId">-</span>
            </p>

            <p>
                <strong>Patient:</strong>
                <span id="modalPatient">-</span>
            </p>

            <p>
                <strong>Date:</strong>
                <span id="modalDate">-</span>
            </p>

            <p>
                <strong>Shift:</strong>
                <span id="modalShift">-</span>
            </p>

        </div>

    </div>

</div>


<footer class="footer">

    <div>

        <strong>SafeHands</strong>

        <p>
            © 2026 SafeHands. All rights reserved.
        </p>

    </div>

    <div class="footer-links">

        <a href="#">Terms of Service</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Contact Support</a>

    </div>

</footer>


<script
    src="/safehands_mvc/public/assets/js/caregiver-notifications.js"
></script>

</body>
</html>