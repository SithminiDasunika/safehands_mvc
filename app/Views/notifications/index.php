<?php
$notifications = $notifications ?? [];
$unreadCount = $unreadCount ?? 0;
?>

<header class="top-navbar">

    <div class="navbar-left">

        <a
            href="/safehands_mvc/family"
            class="brand"
        >
            SafeHands
        </a>

        <nav class="desktop-nav">

            <a href="/safehands_mvc/family">
                Dashboard
            </a>

            <a href="/safehands_mvc/patient">
                Patients
            </a>

            <a href="/safehands_mvc/caregiver">
                Find Caregivers
            </a>

            <a href="/safehands_mvc/bookings">
                My Bookings
            </a>

        </nav>

    </div>


    <div class="navbar-actions">

        <!-- Notifications -->
        <a
            href="/safehands_mvc/notifications"
            class="nav-icon-button active"
            aria-label="Notifications"
        >

            <span class="notification-icon">
                ♧
            </span>

            <span class="notification-dot"></span>

        </a>


        <!-- Account -->
        <a
            href="#"
            class="nav-icon-button"
            aria-label="Account"
        >

            <span class="account-icon">
                ●
            </span>

        </a>

    </div>

</header>


<main class="main-container">

    <!-- Breadcrumb -->

    <nav
        class="breadcrumb"
        aria-label="Breadcrumb"
    >

        <a href="/safehands_mvc/family">
            Dashboard
        </a>

        <span class="breadcrumb-arrow">
            ›
        </span>

        <span class="breadcrumb-current">
            Notifications
        </span>

    </nav>


    <!-- Page Header -->

    <div class="page-header">

        <div class="page-title-area">

            <h1>
                Notifications
            </h1>

            <p>
                Stay updated about your patients, caregivers,
                bookings and payments.
            </p>

        </div>


        <div class="page-header-actions">

            <span class="unread-badge">
                <?= htmlspecialchars($unreadCount) ?> Unread
            </span>

            <button
                type="button"
                id="markAllRead"
                class="mark-read-button"
            >

                <span class="check-icon">
                    ✓
                </span>

                Mark all as read

            </button>

        </div>

    </div>


    <!-- Filter Tabs -->

    <div class="filter-container">

        <nav class="filter-tabs">

            <button
                class="filter-tab active"
                data-filter="all"
                type="button"
            >
                All
            </button>

            <button
                class="filter-tab"
                data-filter="booking"
                type="button"
            >
                Bookings
            </button>

            <button
                class="filter-tab"
                data-filter="care"
                type="button"
            >
                Care
            </button>

            <button
                class="filter-tab"
                data-filter="payment"
                type="button"
            >
                Payments
            </button>

            <button
                class="filter-tab"
                data-filter="review"
                type="button"
            >
                Reviews
            </button>

            <button
                class="filter-tab"
                data-filter="complaint"
                type="button"
            >
                Complaints
            </button>

            <button
                class="filter-tab"
                data-filter="emergency"
                type="button"
            >
                Emergency
            </button>

        </nav>

    </div>


    <!-- Notifications -->

    <div class="notifications-list">

        <?php foreach ($notifications as $group => $items): ?>

            <section
                class="notification-group"
                data-group="<?= htmlspecialchars($group) ?>"
            >

                <h2>
                    <?= htmlspecialchars($group) ?>
                </h2>


                <div class="notification-items">

                    <?php foreach ($items as $notification): ?>

                        <article
                            class="
                                notification-card
                                <?= $notification['unread'] ? 'unread' : 'read' ?>
                                type-<?= htmlspecialchars($notification['type']) ?>
                            "
                            data-type="<?= htmlspecialchars($notification['type']) ?>"
                        >

                            <?php if ($notification['unread']): ?>

                                <span class="unread-indicator"></span>

                            <?php endif; ?>


                            <!-- Icon -->

                            <div
                                class="
                                    notification-type-icon
                                    icon-<?= htmlspecialchars($notification['type']) ?>
                                "
                            >

                                <?= htmlspecialchars($notification['icon']) ?>

                            </div>


                            <!-- Content -->

                            <div class="notification-content">

                                <div class="notification-heading">

                                    <h3>
                                        <?= htmlspecialchars(
                                            $notification['title']
                                        ) ?>
                                    </h3>

                                    <span class="notification-time">
                                        <?= htmlspecialchars(
                                            $notification['time']
                                        ) ?>
                                    </span>

                                </div>


                                <p>
                                    <?= htmlspecialchars(
                                        $notification['message']
                                    ) ?>
                                </p>


                                <a
                                    href="<?= htmlspecialchars(
                                        $notification['link']
                                    ) ?>"
                                    class="
                                        notification-link
                                        link-<?= htmlspecialchars(
                                            $notification['type']
                                        ) ?>
                                    "
                                >

                                    <?= htmlspecialchars(
                                        $notification['link_text']
                                    ) ?>

                                    <span>
                                        →
                                    </span>

                                </a>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </section>

        <?php endforeach; ?>

    </div>

</main>


<!-- Footer -->

<footer class="footer">

    <div class="footer-brand">
        SafeHands
    </div>


    <p>
        © 2024 SafeHands Healthcare Systems.
        All rights reserved.
    </p>


    <div class="footer-links">

        <a href="#">
            Privacy Policy
        </a>

        <a href="#">
            Terms of Service
        </a>

        <a href="#">
            Contact Support
        </a>

        <a href="#">
            HIPAA Compliance
        </a>

        <a href="#">
            Emergency Resources
        </a>

    </div>

</footer>