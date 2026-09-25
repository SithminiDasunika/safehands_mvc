/* =========================================================
   SafeHands - Caregiver Notifications
   Plain JavaScript - No Libraries
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       ELEMENTS
       ===================================================== */

    const searchInput =
        document.getElementById("notificationSearch");

    const categoryFilter =
        document.getElementById("categoryFilter");

    const statusFilter =
        document.getElementById("statusFilter");

    const markAllButton =
        document.getElementById("markAllButton");

    const notificationList =
        document.getElementById("notificationList");

    const noNotifications =
        document.getElementById("noNotifications");

    const loadPreviousButton =
        document.getElementById("loadPreviousButton");

    const mobileMenuButton =
        document.getElementById("mobileMenuButton");

    const mobileNav =
        document.getElementById("mobileNav");


    /* =====================================================
       NOTIFICATION CARDS
       ===================================================== */

    let notificationCards =
        Array.from(
            document.querySelectorAll(".notification-card")
        );


    /* =====================================================
       FILTER NOTIFICATIONS
       ===================================================== */

    function filterNotifications() {

        const searchText =
            searchInput.value
                .toLowerCase()
                .trim();

        const selectedCategory =
            categoryFilter.value;

        const selectedStatus =
            statusFilter.value;


        let visibleCount = 0;


        notificationCards.forEach(
            function (card) {

                const text =
                    card.textContent
                        .toLowerCase();

                const category =
                    card.dataset.category;

                const status =
                    card.dataset.status;


                const matchesSearch =
                    searchText === "" ||
                    text.includes(searchText);


                const matchesCategory =
                    selectedCategory === "all" ||
                    category === selectedCategory;


                const matchesStatus =
                    selectedStatus === "all" ||
                    status === selectedStatus;


                if (
                    matchesSearch &&
                    matchesCategory &&
                    matchesStatus
                ) {

                    card.classList.remove(
                        "hidden"
                    );

                    visibleCount++;

                } else {

                    card.classList.add(
                        "hidden"
                    );

                }

            }
        );


        if (visibleCount === 0) {

            noNotifications.classList.remove(
                "hidden"
            );

        } else {

            noNotifications.classList.add(
                "hidden"
            );

        }

    }


    /* =====================================================
       SEARCH
       ===================================================== */

    if (searchInput) {

        searchInput.addEventListener(
            "input",
            filterNotifications
        );

    }


    /* =====================================================
       CATEGORY FILTER
       ===================================================== */

    if (categoryFilter) {

        categoryFilter.addEventListener(
            "change",
            filterNotifications
        );

    }


    /* =====================================================
       STATUS FILTER
       ===================================================== */

    if (statusFilter) {

        statusFilter.addEventListener(
            "change",
            filterNotifications
        );

    }


    /* =====================================================
       MARK SINGLE NOTIFICATION AS READ
       ===================================================== */

    notificationCards.forEach(
        function (card) {

            card.addEventListener(
                "click",
                function (event) {

                    /*
                     * Do not mark it as read when clicking
                     * an action button.
                     */

                    if (
                        event.target.closest(
                            "button"
                        )
                    ) {
                        return;
                    }


                    if (
                        card.dataset.status ===
                        "unread"
                    ) {

                        card.dataset.status =
                            "read";

                        card.classList.remove(
                            "unread"
                        );


                        const unreadDot =
                            card.querySelector(
                                ".unread-dot"
                            );


                        if (unreadDot) {

                            unreadDot.remove();

                        }

                    }

                }
            );

        }
    );


    /* =====================================================
       MARK ALL AS READ
       ===================================================== */

    if (markAllButton) {

        markAllButton.addEventListener(
            "click",
            function () {

                notificationCards.forEach(
                    function (card) {

                        card.dataset.status =
                            "read";

                        card.classList.remove(
                            "unread"
                        );


                        const unreadDot =
                            card.querySelector(
                                ".unread-dot"
                            );


                        if (unreadDot) {

                            unreadDot.remove();

                        }

                    }
                );


                markAllButton.textContent =
                    "✓ All Marked as Read";


                markAllButton.classList.add(
                    "marked"
                );


                /*
                 * Refresh status filter if it
                 * is currently showing unread.
                 */

                filterNotifications();

            }
        );

    }


    /* =====================================================
       BOOKING MODAL
       ===================================================== */

    const bookingModal =
        document.getElementById(
            "bookingModal"
        );

    const closeBookingModal =
        document.getElementById(
            "closeBookingModal"
        );


    const modalBookingId =
        document.getElementById(
            "modalBookingId"
        );

    const modalPatient =
        document.getElementById(
            "modalPatient"
        );

    const modalDate =
        document.getElementById(
            "modalDate"
        );

    const modalShift =
        document.getElementById(
            "modalShift"
        );


    /*
     * Static booking information
     */

    const bookingData = {

        "BK-2026-00125": {
            patient: "Mr. Silva",
            date: "15 July 2026",
            shift: "Morning Shift"
        },

        "BK-2026-00131": {
            patient: "Family Member Booking",
            date: "22 July 2026",
            shift: "Scheduled Care Session"
        }

    };


    /* =====================================================
       VIEW BOOKING BUTTONS
       ===================================================== */

    const bookingButtons =
        document.querySelectorAll(
            ".view-booking-button"
        );


    bookingButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const bookingId =
                        button.dataset.booking;


                    const booking =
                        bookingData[bookingId];


                    if (!booking) {

                        alert(
                            "Booking information is not available."
                        );

                        return;

                    }


                    modalBookingId.textContent =
                        bookingId;

                    modalPatient.textContent =
                        booking.patient;

                    modalDate.textContent =
                        booking.date;

                    modalShift.textContent =
                        booking.shift;


                    bookingModal.classList.remove(
                        "hidden"
                    );

                }
            );

        }
    );


    /* =====================================================
       CLOSE BOOKING MODAL
       ===================================================== */

    if (closeBookingModal) {

        closeBookingModal.addEventListener(
            "click",
            function () {

                bookingModal.classList.add(
                    "hidden"
                );

            }
        );

    }


    /* =====================================================
       CLOSE MODAL BY CLICKING OUTSIDE
       ===================================================== */

    if (bookingModal) {

        bookingModal.addEventListener(
            "click",
            function (event) {

                if (
                    event.target ===
                    bookingModal
                ) {

                    bookingModal.classList.add(
                        "hidden"
                    );

                }

            }
        );

    }


    /* =====================================================
       CLOSE MODAL WITH ESCAPE
       ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                bookingModal
            ) {

                bookingModal.classList.add(
                    "hidden"
                );

            }

        }
    );


    /* =====================================================
       VIEW EARNINGS
       ===================================================== */

    const earningButtons =
        document.querySelectorAll(
            ".view-earning-button"
        );


    earningButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    window.location.href =
                        "/safehands_mvc/caregiver/earnings";

                }
            );

        }
    );


    /* =====================================================
       SUBMIT REPORT
       ===================================================== */

    const submitReportButtons =
        document.querySelectorAll(
            ".submit-report-button"
        );


    submitReportButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    window.location.href =
                        "/safehands_mvc/caregiver/schedule";

                }
            );

        }
    );


    /* =====================================================
       VIEW PROFILE
       ===================================================== */

    const viewProfileButtons =
        document.querySelectorAll(
            ".view-profile-button"
        );


    viewProfileButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    window.location.href =
                        "/safehands_mvc/caregiver/dashboard";

                }
            );

        }
    );


    /* =====================================================
       LOAD PREVIOUS NOTIFICATIONS
       ===================================================== */

    if (loadPreviousButton) {

        loadPreviousButton.addEventListener(
            "click",
            function () {

                /*
                 * Simple static demonstration.
                 * Later this can load older notifications
                 * from the database.
                 */

                const previousNotification =
                    document.createElement("article");


                previousNotification.className =
                    "notification-card";


                previousNotification.dataset.category =
                    "system";


                previousNotification.dataset.status =
                    "read";


                previousNotification.innerHTML = `
                    <div class="notification-icon light-blue">
                        ℹ
                    </div>

                    <div class="notification-content">

                        <div class="notification-category">
                            System
                        </div>

                        <h3>
                            Previous Notification
                        </h3>

                        <p>
                            This is a previous SafeHands
                            system notification.
                        </p>

                        <small>
                            Earlier notification
                        </small>

                    </div>

                    <div class="notification-action">

                        <button
                            type="button"
                            class="secondary-action"
                        >
                            Viewed
                        </button>

                    </div>
                `;


                notificationList.appendChild(
                    previousNotification
                );


                /*
                 * Add the new card to the array so
                 * filtering also works on it.
                 */

                notificationCards.push(
                    previousNotification
                );


                loadPreviousButton.textContent =
                    "No more previous notifications";


                loadPreviousButton.disabled =
                    true;


                loadPreviousButton.style.opacity =
                    "0.6";


                filterNotifications();

            }
        );

    }


    /* =====================================================
       MOBILE MENU
       ===================================================== */

    if (
        mobileMenuButton &&
        mobileNav
    ) {

        mobileMenuButton.addEventListener(
            "click",
            function () {

                mobileNav.classList.toggle(
                    "open"
                );

            }
        );

    }


    /* =====================================================
       INITIAL FILTER
       ===================================================== */

    filterNotifications();

});