<?php

$active = $active ?? [];
$upcoming = $upcoming ?? [];
$completed = $completed ?? [];
$stats = $stats ?? [];

?>

<div style="display:flex; justify-content:flex-end; padding:8px 0;">
    <div style="display:flex; align-items:center; gap:8px; font-size:15px;">
        <a href="/safehands_mvc/bookings" style="color:#059669; font-weight:700; text-decoration:none;">English</a>
        <span style="color:#9ca3af;">|</span>
        <a href="/safehands_mvc/bookings/indexSi" style="color:#059669; text-decoration:none;">සිංහල</a>
    </div>
</div>
<div class="bookings-page">

    <!-- =========================================
         BREADCRUMB
    ========================================== -->

    <div class="breadcrumb">

        <a href="/safehands_mvc/caregiver/dashboard">
            Dashboard
        </a>

        <span>›</span>

        <strong>
            My Bookings
        </strong>

    </div>


    <!-- =========================================
         HEADER
    ========================================== -->

    <div class="page-header">

        <h1>
            My Bookings
        </h1>

        <p>
            View and manage your caregiver bookings,
            care sessions and payment information.
        </p>

    </div>


    <!-- =========================================
         SUMMARY CARDS
    ========================================== -->

    <div class="summary-grid">


        <!-- UPCOMING -->

        <div class="summary-card">

            <div>

                <span class="summary-label">
                    Upcoming
                </span>

                <strong>
                    <?= htmlspecialchars($stats['upcoming'] ?? 0) ?>
                </strong>

            </div>

            <div class="summary-icon blue">
                ◷
            </div>

        </div>


        <!-- ACTIVE -->

        <div class="summary-card">

            <div>

                <span class="summary-label">
                    Active
                </span>

                <strong>
                    <?= htmlspecialchars($stats['active'] ?? 0) ?>
                </strong>

            </div>

            <div class="summary-icon green">
                +
            </div>

        </div>


        <!-- COMPLETED -->

        <div class="summary-card">

            <div>

                <span class="summary-label">
                    Completed
                </span>

                <strong>
                    <?= htmlspecialchars($stats['completed'] ?? 0) ?>
                </strong>

            </div>

            <div class="summary-icon purple">
                ✓
            </div>

        </div>


        <!-- CANCELLED -->

        <div class="summary-card">

            <div>

                <span class="summary-label">
                    Cancelled
                </span>

                <strong>
                    <?= htmlspecialchars($stats['cancelled'] ?? 0) ?>
                </strong>

            </div>

            <div class="summary-icon red">
                ×
            </div>

        </div>

    </div>



    <!-- =========================================
         FILTERS
    ========================================== -->

    <div class="booking-toolbar">


        <div class="filter-tabs">

            <button
                type="button"
                class="filter-tab active"
                data-filter="all"
            >
                All
            </button>


            <button
                type="button"
                class="filter-tab"
                data-filter="upcoming"
            >
                Upcoming
            </button>


            <button
                type="button"
                class="filter-tab"
                data-filter="active"
            >
                Active
            </button>


            <button
                type="button"
                class="filter-tab"
                data-filter="completed"
            >
                Completed
            </button>


            <button
                type="button"
                class="filter-tab"
                data-filter="cancelled"
            >
                Cancelled
            </button>

        </div>



        <div class="search-area">


            <div class="search-box">

                <span class="search-icon">
                    ⌕
                </span>

                <input
                    type="text"
                    id="bookingSearch"
                    placeholder="Search bookings..."
                >

            </div>


            <button
                type="button"
                class="filter-button"
                id="filterButton"
            >
                ☰
            </button>

        </div>

    </div>



    <!-- =========================================
         ACTIVE CARE
    ========================================== -->

    <section
        class="booking-section"
        data-section="active"
    >

        <h2>
            Active Care
        </h2>


        <?php if (!empty($active)): ?>

            <div class="active-booking-card">

                <div class="active-indicator"></div>


                <div class="booking-main">


                    <!-- CAREGIVER -->

                    <div class="booking-person">

                        <img
                            src="<?= htmlspecialchars(
                                $active['image'] ?? ''
                            ) ?>"
                            alt="Caregiver"
                            class="caregiver-image large"
                        >


                        <div class="booking-person-info">

                            <div class="name-status">

                                <h3>
                                    <?= htmlspecialchars(
                                        $active['caregiver'] ?? ''
                                    ) ?>
                                </h3>


                                <span class="status active-status">

                                    <span class="status-dot"></span>

                                    <?= htmlspecialchars(
                                        $active['status'] ?? ''
                                    ) ?>

                                </span>

                            </div>


                            <p>

                                Patient:

                                <strong>
                                    <?= htmlspecialchars(
                                        $active['patient'] ?? ''
                                    ) ?>
                                </strong>

                            </p>


                            <div class="booking-meta">

                                <span>

                                    ◷

                                    Started:

                                    <?= htmlspecialchars(
                                        $active['started'] ?? ''
                                    ) ?>

                                </span>


                                <span>

                                    ⌖

                                    <?= htmlspecialchars(
                                        $active['location'] ?? ''
                                    ) ?>

                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- ACTIONS -->
                    <div class="booking-actions vertical">

                        <a
                            href="/safehands_mvc/booking/details/<?= htmlspecialchars($active['booking_id'] ?? $active['id'] ?? '') ?>"
                            class="primary-button view-booking-button"
                        >
                            View Booking
                        </a>

                        <button
                            type="button"
                            class="secondary-button contact-button"
                        >
                            Contact
                        </button>

                    </div>

                </div>

                <div class="progress-area">

                    <div class="progress-header">

                        <span>
                            Session Progress
                        </span>

                        <span>
                            <?= htmlspecialchars(
                                $active['progress_text'] ?? ''
                            ) ?>
                        </span>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            style="width: <?= (int)(
                                $active['progress'] ?? 0
                            ) ?>%;"
                        ></div>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </section>



    <!-- =========================================
         UPCOMING BOOKINGS
    ========================================== -->

    <section
        class="booking-section"
        data-section="upcoming"
    >

        <h2>
            Upcoming Bookings
        </h2>


        <div class="booking-list">


            <?php foreach ($upcoming as $booking): ?>

                <div
                    class="booking-card searchable-booking"
                    data-status="upcoming"
                    data-search="<?= htmlspecialchars(
                        strtolower(
                            ($booking['caregiver'] ?? '') . ' ' .
                            ($booking['patient'] ?? '')
                        )
                    ) ?>"
                >


                    <!-- CAREGIVER -->

                    <div class="booking-person">

                        <img
                            src="<?= htmlspecialchars(
                                $booking['image'] ?? ''
                            ) ?>"
                            alt="Caregiver"
                            class="caregiver-image"
                        >


                        <div class="booking-person-info">


                            <div class="name-status">

                                <h3>
                                    <?= htmlspecialchars(
                                        $booking['caregiver'] ?? ''
                                    ) ?>
                                </h3>


                                <span class="status confirmed-status">

                                    <?= htmlspecialchars(
                                        $booking['status'] ?? ''
                                    ) ?>

                                </span>

                            </div>


                            <p>

                                Patient:

                                <strong>
                                    <?= htmlspecialchars(
                                        $booking['patient'] ?? ''
                                    ) ?>
                                </strong>

                            </p>


                            <div class="booking-meta">

                                <span class="date-highlight">

                                    ◷

                                    <?= htmlspecialchars(
                                        $booking['date'] ?? ''
                                    ) ?>

                                </span>


                                <span>

                                    ◷

                                    <?= htmlspecialchars(
                                        $booking['time'] ?? ''
                                    ) ?>

                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- ACTIONS -->

                    <div class="booking-actions">


                        <!-- =================================
                             VIEW BOOKING
                             CONNECTED TO BOOKING DETAILS
                        ================================== -->

                        <a
                            href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                            class="primary-button view-booking-button"
                        >
                            View Booking
                        </a>


                        <button
                            type="button"
                            class="secondary-button contact-button"
                        >
                            Contact
                        </button>


                        <button
                            type="button"
                            class="cancel-button"
                        >
                            Cancel
                        </button>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </section>



    <!-- =========================================
         COMPLETED CARE
    ========================================== -->

    <section
        class="booking-section"
        data-section="completed"
    >

        <h2>
            Completed Care
        </h2>


        <div class="completed-list">


            <?php foreach ($completed as $booking): ?>

                <div
                    class="completed-card searchable-booking"
                    data-status="completed"
                    data-search="<?= htmlspecialchars(
                        strtolower(
                            ($booking['caregiver'] ?? '') . ' ' .
                            ($booking['date'] ?? '')
                        )
                    ) ?>"
                >


                    <!-- CAREGIVER -->

                    <div class="completed-person">

                        <img
                            src="<?= htmlspecialchars(
                                $booking['image'] ?? ''
                            ) ?>"
                            alt="Caregiver"
                            class="caregiver-image small"
                        >


                        <div>

                            <h3>
                                <?= htmlspecialchars(
                                    $booking['caregiver'] ?? ''
                                ) ?>
                            </h3>


                            <p>

                                <?= htmlspecialchars(
                                    $booking['date'] ?? ''
                                ) ?>

                                •

                                <?= htmlspecialchars(
                                    $booking['status'] ?? ''
                                ) ?>

                            </p>

                        </div>

                    </div>



                    <?php if (
                        empty($booking['reviewed'])
                    ): ?>


                        <div class="booking-actions">


                            <!-- =================================
                                 VIEW BOOKING
                                 CONNECTED TO BOOKING DETAILS
                            ================================== -->

                            <a
                                href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                class="primary-button view-booking-button"
                            >
                                View Booking
                            </a>


                            <button
                                type="button"
                                class="secondary-button contact-button"
                            >
                                Contact
                            </button>


                            <button
                                type="button"
                                class="cancel-button"
                            >
                                Cancel
                            </button>

                        </div>


                    <?php else: ?>


                        <div class="reviewed-area">


                            <div class="booking-actions">


                                <!-- =================================
                                     VIEW BOOKING
                                     CONNECTED TO BOOKING DETAILS
                                ================================== -->

                                <a
                                    href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                    class="primary-button view-booking-button"
                                >
                                    View Booking
                                </a>


                                <button
                                    type="button"
                                    class="secondary-button contact-button"
                                >
                                    Contact
                                </button>


                                <button
                                    type="button"
                                    class="cancel-button"
                                >
                                    Cancel
                                </button>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>

            <?php endforeach; ?>

        </div>

    </section>



    <!-- =========================================
         NO RESULTS
    ========================================== -->

    <div
        class="no-results"
        id="noResults"
        style="display:none;"
    >
        No bookings found.
    </div>

</div><style>
:root {
    --primary: #059669;
    --primary-container: #10b981;
}
</style>
