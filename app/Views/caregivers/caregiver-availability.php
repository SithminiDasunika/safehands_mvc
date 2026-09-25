<?php

$caregiverName = $caregiverName ?? 'Caregiver';
$availability = $availability ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'Manage Availability | SafeHands') ?>
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-availability.css"
    >
</head>

<body>

    <!-- =========================
         HEADER
         ========================= -->

    <header class="availability-header">

        <a
            href="/safehands_mvc/"
            class="availability-logo"
        >
            SafeHands
        </a>


        <!-- Mobile Menu Button -->

        <button
            type="button"
            class="mobile-menu-btn"
            id="mobileMenuButton"
            aria-label="Open navigation"
        >
            ☰
        </button>


        <!-- Navigation -->

        <nav
            class="availability-nav"
            id="availabilityNav"
        >

            <a href="#">
                Dashboard
            </a>

            <a href="#">
                My Schedule
            </a>

            <a
                href="/safehands_mvc/caregiver/manageAvailability"
                class="active"
            >
                Availability
            </a>

            <a href="#">
                Profile
            </a>

            <a href="#">
                Earnings
            </a>

        </nav>


        <!-- Right Side -->

        <div class="availability-actions">

            <button
                type="button"
                class="notification-btn"
                id="notificationButton"
                aria-label="Notifications"
            >
                🔔
            </button>


            <div class="profile-menu">

                <div class="profile-icon">
                    <?= strtoupper(substr($caregiverName, 0, 1)) ?>
                </div>

                <span class="profile-name">
                    <?= htmlspecialchars($caregiverName) ?>
                </span>

            </div>

        </div>

    </header>


    <!-- =========================
         MAIN CONTENT
         ========================= -->

    <main class="availability-container">


        <!-- Page Heading -->

        <section class="page-heading">

            <h1>
                Manage Availability
            </h1>

            <p>
                Update your availability so families can see when you are available for caregiving.
            </p>

        </section>


        <!-- =========================
             SUMMARY
             ========================= -->

        <section class="summary-grid">

            <div class="summary-card">

                <h3>
                    Available
                </h3>

                <div
                    class="summary-number summary-available"
                    id="availableCount"
                >
                    0
                </div>

            </div>


            <div class="summary-card">

                <h3>
                    Booked
                </h3>

                <div
                    class="summary-number summary-booked"
                    id="bookedCount"
                >
                    0
                </div>

            </div>


            <div class="summary-card">

                <h3>
                    Off Duty
                </h3>

                <div
                    class="summary-number summary-off"
                    id="offDutyCount"
                >
                    0
                </div>

            </div>

        </section>


        <!-- =========================
             CALENDAR
             ========================= -->

        <section class="calendar-section">

            <div class="calendar-top">

                <h2
                    class="calendar-title"
                    id="currentMonth"
                >
                    September 2026
                </h2>


                <div class="calendar-controls">

                    <button
                        type="button"
                        id="previousMonth"
                    >
                        ← Previous
                    </button>

                    <button
                        type="button"
                        id="todayButton"
                    >
                        Today
                    </button>

                    <button
                        type="button"
                        id="nextMonth"
                    >
                        Next →
                    </button>

                </div>

            </div>


            <div class="calendar-grid">

                <!-- Weekdays -->

                <div class="calendar-weekdays">

                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>

                </div>


                <!-- Days generated by JavaScript -->

                <div
                    class="calendar-days"
                    id="calendarDays"
                >
                </div>

            </div>


            <!-- Legend -->

            <div class="calendar-legend">

                <div class="legend-item">

                    <span class="legend-dot legend-available"></span>

                    <span>
                        Available
                    </span>

                </div>


                <div class="legend-item">

                    <span class="legend-dot legend-booked"></span>

                    <span>
                        Booked
                    </span>

                </div>


                <div class="legend-item">

                    <span class="legend-dot legend-off-duty"></span>

                    <span>
                        Off Duty
                    </span>

                </div>

            </div>

        </section>


        <!-- =========================
             ADD AVAILABILITY
             ========================= -->

        <section class="add-section">

            <h2>
                Add Availability
            </h2>


            <form
                id="availabilityForm"
                class="availability-form"
            >

                <!-- Date -->

                <div class="form-group">

                    <label for="availabilityDate">
                        Date
                    </label>

                    <input
                        type="date"
                        id="availabilityDate"
                        name="availabilityDate"
                        required
                    >

                </div>


                <!-- Shift -->

                <div class="form-group">

                    <label for="availabilityShift">
                        Shift
                    </label>

                    <select
                        id="availabilityShift"
                        name="availabilityShift"
                        required
                    >

                        <option value="">
                            Select Shift
                        </option>

                        <option value="Morning">
                            Morning
                        </option>

                        <option value="Afternoon">
                            Afternoon
                        </option>

                        <option value="Evening">
                            Evening
                        </option>

                    </select>

                </div>


                <!-- Status -->

                <div class="form-group">

                    <label for="availabilityStatus">
                        Status
                    </label>

                    <select
                        id="availabilityStatus"
                        name="availabilityStatus"
                        required
                    >

                        <option value="">
                            Select Status
                        </option>

                        <option value="Available">
                            Available
                        </option>

                        <option value="Off Duty">
                            Off Duty
                        </option>

                    </select>

                </div>


                <!-- Add Button -->

                <button
                    type="submit"
                    class="btn-primary"
                >
                    + Add Availability
                </button>

            </form>

        </section>


        <!-- =========================
             AVAILABILITY RECORDS
             ========================= -->

        <section class="records-section">

            <div class="records-header">

                <h2>
                    My Availability
                </h2>

            </div>


            <div class="records-table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>

                            <th>
                                Date
                            </th>

                            <th>
                                Shift
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody id="recordsBody">

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <!--
        Temporary availability data.

        The controller sends the PHP array here.
        JavaScript reads this data from this element.

        Later this data will come from the database.
    -->

    <script
        type="application/json"
        id="availability-data"
    >
        <?= json_encode(
            $availability,
            JSON_HEX_TAG |
            JSON_HEX_AMP |
            JSON_HEX_APOS |
            JSON_HEX_QUOT
        ) ?>
    </script>


    <!-- JavaScript -->

    <script
        src="/safehands_mvc/public/assets/js/caregiver-availability.js"
    ></script>

</body>

</html>