<div style="display:flex; justify-content:flex-end; padding:8px 0;">
    <div style="display:flex; align-items:center; gap:8px; font-size:15px;">

        <a
            href="/safehands_mvc/bookings/pendingReports"
            style="color:#059669; font-weight:700; text-decoration:none;"
        >
            English
        </a>

        <span style="color:#9ca3af;">|</span>

        <a
            href="/safehands_mvc/bookings/pendingReportsSi"
            style="color:#059669; text-decoration:none;"
        >
            සිංහල
        </a>

    </div>
</div>


<link
    rel="stylesheet"
    href="/safehands_mvc/public/assets/css/caregiver/dashboard.css?v=2"
>


<style>

/* =========================================================
   PENDING REPORTS PAGE
========================================================= */

.pending-reports-page {

    width: 100%;

    box-sizing: border-box;

    padding: 0 40px 40px 40px;

}


/* =========================================================
   PAGE HEADER
========================================================= */

.booking-page-header {

    margin-bottom: 24px;

}


.booking-page-header h1 {

    margin: 0 0 8px 0;

    font-size: 24px;

    line-height: 32px;

    font-weight: 700;

    color: #111827;

}


.booking-page-header p {

    margin: 0;

    color: #6b7280;

    font-size: 14px;

    line-height: 22px;

}


/* =========================================================
   REPORT LIST
========================================================= */

.completed-list {

    display: flex;

    flex-direction: column;

    gap: 16px;

    width: 100%;

}


/* =========================================================
   REPORT CARD
========================================================= */

.completed-card {

    width: 100%;

    box-sizing: border-box;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 24px;

    padding: 20px 22px;

    background: #ffffff;

    border-radius: 12px;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 1px 3px rgba(0, 0, 0, 0.04);

    transition:
        box-shadow 0.2s ease,
        transform 0.2s ease;

}


.completed-card:hover {

    box-shadow:
        0 5px 16px rgba(0, 0, 0, 0.07);

    transform: translateY(-1px);

}


/* =========================================================
   PATIENT INFORMATION
========================================================= */

.completed-person {

    display: flex;

    align-items: center;

    gap: 16px;

    min-width: 0;

}


/* =========================================================
   PATIENT IMAGE
========================================================= */

.caregiver-image {

    width: 52px;

    height: 52px;

    min-width: 52px;

    border-radius: 50%;

    object-fit: cover;

    background: #eef2ff;

    border: 1px solid #e5e7eb;

}


/* =========================================================
   PATIENT NAME
========================================================= */

.completed-person h3 {

    margin: 0 0 5px 0;

    font-size: 16px;

    line-height: 22px;

    font-weight: 700;

    color: #111827;

}


.completed-person p {

    margin: 0;

    color: #6b7280;

    font-size: 14px;

    line-height: 20px;

}


/* =========================================================
   BUTTON AREA
========================================================= */

.booking-actions {

    display: flex;

    align-items: center;

    justify-content: flex-end;

    gap: 10px;

    flex-wrap: wrap;

}


/* =========================================================
   BUTTONS
========================================================= */

.primary-button,
.secondary-button {

    min-height: 40px;

    box-sizing: border-box;

    padding: 0 17px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    border-radius: 8px;

    font-size: 14px;

    line-height: 20px;

    font-weight: 600;

    cursor: pointer;

    text-decoration: none;

    white-space: nowrap;

    transition:
        background 0.2s ease,
        border-color 0.2s ease,
        color 0.2s ease,
        transform 0.15s ease,
        box-shadow 0.2s ease;

}


/* =========================================================
   VIEW BOOKING / VIEW REPORT
========================================================= */

.primary-button {

    background: #059669;

    color: #ffffff;

    border: 1px solid #059669;

}


.primary-button:hover {

    background: #047857;

    border-color: #047857;

    color: #ffffff;

    transform: translateY(-1px);

    box-shadow:
        0 3px 8px rgba(5, 150, 105, 0.18);

}


/* =========================================================
   EDIT REPORT
========================================================= */

.secondary-button {

    background: #ffffff;

    color: #111827;

    border: 1px solid #d1d5db;

}


.secondary-button:hover {

    background: #f9fafb;

    border-color: #9ca3af;

    transform: translateY(-1px);

}


/* =========================================================
   DELETE REPORT
========================================================= */

.booking-actions a[style*="dc2626"] {

    color: #dc2626 !important;

    border-color: #dc2626 !important;

    background: #ffffff;

}


.booking-actions a[style*="dc2626"]:hover {

    background: #fff5f5;

    color: #b91c1c !important;

    border-color: #b91c1c !important;

}


/* =========================================================
   EMPTY STATE
========================================================= */

.pending-empty-state {

    width: 100%;

    box-sizing: border-box;

    padding: 32px 24px;

    text-align: center;

    color: #6b7280;

    background: #ffffff;

    border-radius: 12px;

    border: 1px solid #e5e7eb;

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1100px) {

    .pending-reports-page {

        padding-left: 30px;

        padding-right: 30px;

    }


    .completed-card {

        align-items: flex-start;

        flex-direction: column;

    }


    .completed-person {

        width: 100%;

    }


    .booking-actions {

        width: 100%;

        justify-content: flex-start;

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 600px) {

    .pending-reports-page {

        padding: 0 16px 30px 16px;

    }


    .booking-page-header h1 {

        font-size: 22px;

        line-height: 30px;

    }


    .booking-page-header p {

        font-size: 13px;

    }


    .completed-card {

        padding: 16px;

        gap: 18px;

    }


    .completed-person {

        align-items: flex-start;

    }


    .caregiver-image {

        width: 46px;

        height: 46px;

        min-width: 46px;

    }


    .completed-person h3 {

        font-size: 15px;

    }


    .completed-person p {

        font-size: 13px;

    }


    .booking-actions {

        display: grid;

        grid-template-columns: 1fr 1fr;

        width: 100%;

        gap: 8px;

    }


    .primary-button,
    .secondary-button {

        width: 100%;

        padding: 0 10px;

        font-size: 13px;

    }

}


/* =========================================================
   VERY SMALL MOBILE
========================================================= */

@media (max-width: 420px) {

    .booking-actions {

        grid-template-columns: 1fr;

    }

}

</style>


<!-- =======================================================
     PENDING REPORTS PAGE
======================================================= -->
<div
    class="pending-reports-page"
    style="
        width: 100%;
        box-sizing: border-box;
        padding-left: 60px !important;
        padding-right: 60px !important;
        padding-bottom: 40px;
    "
>

    <!-- REPORT SECTION -->

    <section class="booking-section">

        <div class="completed-list">


            <?php if (empty($completed)): ?>


                <!-- EMPTY STATE -->

                <div class="pending-empty-state">

                    No completed care sessions found.

                </div>


            <?php else: ?>


                <?php foreach ($completed as $booking): ?>


                    <!-- REPORT CARD -->

                    <div class="completed-card">


                        <!-- PATIENT -->

                        <div class="completed-person">

                            <img
                                src="<?= htmlspecialchars($booking['image'] ?? 'https://via.placeholder.com/150') ?>"
                                alt="Caregiver"
                                class="caregiver-image"
                            >


                            <div>

                                <h3>
                                    <?= htmlspecialchars(
                                        $booking['patient'] ?? 'Unknown Patient'
                                    ) ?>
                                </h3>

                                <p>
                                    <?= htmlspecialchars(
                                        $booking['date'] ?? ''
                                    ) ?>

                                    • Completed
                                </p>

                            </div>

                        </div>


                        <!-- ACTION BUTTONS -->

                        <div class="booking-actions">


                            <!-- VIEW BOOKING -->

                            <a
                                href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                class="primary-button"
                            >
                                View Booking
                            </a>


                            <?php if (!empty($booking['has_report'])): ?>


                                <!-- VIEW REPORT -->

                                <a
                                    href="/safehands_mvc/care-report/index/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                    class="primary-button"
                                >
                                    View Report
                                </a>


                                <!-- EDIT REPORT -->

                                <a
                                    href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                    class="secondary-button"
                                >
                                    Edit Report
                                </a>


                                <!-- DELETE REPORT -->

                                <a
                                    href="/safehands_mvc/booking/deleteReport/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                    class="secondary-button"
                                    style="color:#dc2626; border-color:#dc2626;"
                                    onclick="return confirm('Are you sure you want to delete this care report?');"
                                >
                                    Delete Report
                                </a>


                            <?php else: ?>


                                <!-- SUBMIT REPORT -->

                                <a
                                    href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>"
                                    class="secondary-button"
                                    style="background:#fef3c7; border-color:#f59e0b; color:#92400e;"
                                >
                                    Submit Report
                                </a>


                            <?php endif; ?>


                        </div>


                    </div>


                <?php endforeach; ?>


            <?php endif; ?>


        </div>

    </section>


</div>