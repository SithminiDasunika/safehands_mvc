/* =========================================================
   SafeHands - Caregiver Earnings
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       MONTH DATA
       ===================================================== */

    const monthlyData = [
        {
            month: "June",
            year: 2026,

            currentBalance: "Rs. 24,000",
            heldPayments: "Rs. 8,500",
            releasedPayments: "Rs. 132,000",
            sessions: 38,

            currentEarnings: 36000,
            previousEarnings: 33500,
            averageEarnings: 38250,

            currentProgress: 72,
            previousProgress: 67,
            averageProgress: 76.5,

            payout: "Rs. 15,500",
            payoutDate: "Scheduled for 28 June 2026"
        },

        {
            month: "July",
            year: 2026,

            currentBalance: "Rs. 28,500",
            heldPayments: "Rs. 12,000",
            releasedPayments: "Rs. 156,500",
            sessions: 42,

            currentEarnings: 42500,
            previousEarnings: 36000,
            averageEarnings: 39250,

            currentProgress: 85,
            previousProgress: 72,
            averageProgress: 78.5,

            payout: "Rs. 18,500",
            payoutDate: "Scheduled for 28 July 2026"
        },

        {
            month: "August",
            year: 2026,

            currentBalance: "Rs. 31,500",
            heldPayments: "Rs. 9,500",
            releasedPayments: "Rs. 172,000",
            sessions: 45,

            currentEarnings: 45500,
            previousEarnings: 42500,
            averageEarnings: 41250,

            currentProgress: 91,
            previousProgress: 85,
            averageProgress: 82.5,

            payout: "Rs. 20,000",
            payoutDate: "Scheduled for 28 August 2026"
        },

        {
            month: "September",
            year: 2026,

            currentBalance: "Rs. 35,000",
            heldPayments: "Rs. 11,000",
            releasedPayments: "Rs. 188,500",
            sessions: 48,

            currentEarnings: 48000,
            previousEarnings: 45500,
            averageEarnings: 43500,

            currentProgress: 96,
            previousProgress: 91,
            averageProgress: 87,

            payout: "Rs. 21,500",
            payoutDate: "Scheduled for 28 September 2026"
        },

        {
            month: "October",
            year: 2026,

            currentBalance: "Rs. 39,000",
            heldPayments: "Rs. 10,000",
            releasedPayments: "Rs. 205,000",
            sessions: 51,

            currentEarnings: 51000,
            previousEarnings: 48000,
            averageEarnings: 45000,

            currentProgress: 100,
            previousProgress: 96,
            averageProgress: 90,

            payout: "Rs. 23,000",
            payoutDate: "Scheduled for 28 October 2026"
        }
    ];


    /* =====================================================
       CURRENT MONTH
       ===================================================== */

    let currentMonthIndex = 1;


    /* =====================================================
       ELEMENTS
       ===================================================== */

    const currentMonthElement =
        document.getElementById("currentMonth");

    const previousMonthButton =
        document.getElementById("previousMonth");

    const nextMonthButton =
        document.getElementById("nextMonth");


    const currentBalanceElement =
        document.getElementById("currentBalance");

    const heldPaymentsElement =
        document.getElementById("heldPayments");

    const releasedPaymentsElement =
        document.getElementById("releasedPayments");

    const completedSessionsElement =
        document.getElementById("completedSessions");


    const thisMonthLabel =
        document.getElementById("thisMonthLabel");

    const thisMonthAmount =
        document.getElementById("thisMonthAmount");

    const thisMonthProgress =
        document.getElementById("thisMonthProgress");


    const lastMonthLabel =
        document.getElementById("lastMonthLabel");

    const lastMonthAmount =
        document.getElementById("lastMonthAmount");

    const lastMonthProgress =
        document.getElementById("lastMonthProgress");


    const averageMonthlyEarnings =
        document.getElementById(
            "averageMonthlyEarnings"
        );

    const averageProgress =
        document.getElementById(
            "averageProgress"
        );


    const nextPayoutAmount =
        document.getElementById(
            "nextPayoutAmount"
        );

    const nextPayoutDate =
        document.getElementById(
            "nextPayoutDate"
        );


    /* =====================================================
       FORMAT CURRENCY
       ===================================================== */

    function formatCurrency(amount) {

        return "Rs. " +
            amount.toLocaleString("en-US");

    }


    /* =====================================================
       UPDATE MONTH
       ===================================================== */

    function updateMonth() {

        const data =
            monthlyData[currentMonthIndex];


        /*
         * Update month title
         */

        currentMonthElement.textContent =
            data.month + " " + data.year;


        /*
         * Update summary cards
         */

        currentBalanceElement.textContent =
            data.currentBalance;

        heldPaymentsElement.textContent =
            data.heldPayments;

        releasedPaymentsElement.textContent =
            data.releasedPayments;

        completedSessionsElement.textContent =
            data.sessions;


        /*
         * Current month performance
         */

        thisMonthLabel.textContent =
            "This Month (" +
            data.month +
            " " +
            data.year +
            ")";

        thisMonthAmount.textContent =
            formatCurrency(
                data.currentEarnings
            );

        thisMonthProgress.style.width =
            data.currentProgress + "%";


        /*
         * Previous month performance
         */

        const previousIndex =
            currentMonthIndex - 1;


        if (previousIndex >= 0) {

            const previousData =
                monthlyData[previousIndex];


            lastMonthLabel.textContent =
                "Last Month (" +
                previousData.month +
                " " +
                previousData.year +
                ")";


            lastMonthAmount.textContent =
                formatCurrency(
                    data.previousEarnings
                );


            lastMonthProgress.style.width =
                data.previousProgress + "%";

        }


        /*
         * Average earnings
         */

        averageMonthlyEarnings.textContent =
            formatCurrency(
                data.averageEarnings
            );

        averageProgress.style.width =
            data.averageProgress + "%";


        /*
         * Next payout
         */

        nextPayoutAmount.textContent =
            data.payout;

        nextPayoutDate.textContent =
            data.payoutDate;


        /*
         * Disable buttons at limits
         */

        previousMonthButton.disabled =
            currentMonthIndex === 0;

        nextMonthButton.disabled =
            currentMonthIndex ===
            monthlyData.length - 1;

    }


    /* =====================================================
       PREVIOUS MONTH
       ===================================================== */

    previousMonthButton.addEventListener(
        "click",
        function () {

            if (currentMonthIndex > 0) {

                currentMonthIndex--;

                updateMonth();

            }

        }
    );


    /* =====================================================
       NEXT MONTH
       ===================================================== */

    nextMonthButton.addEventListener(
        "click",
        function () {

            if (
                currentMonthIndex <
                monthlyData.length - 1
            ) {

                currentMonthIndex++;

                updateMonth();

            }

        }
    );


    /* =====================================================
       MOBILE MENU
       ===================================================== */

    const mobileMenuButton =
        document.getElementById(
            "mobileMenuButton"
        );

    const mobileNav =
        document.getElementById(
            "mobileNav"
        );


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
       PAYMENT HISTORY MODAL
       ===================================================== */

    const paymentHistoryButton =
        document.getElementById(
            "paymentHistoryButton"
        );

    const paymentHistoryModal =
        document.getElementById(
            "paymentHistoryModal"
        );

    const closePaymentHistory =
        document.getElementById(
            "closePaymentHistory"
        );


    if (paymentHistoryButton) {

        paymentHistoryButton.addEventListener(
            "click",
            function () {

                paymentHistoryModal.classList.remove(
                    "hidden"
                );

            }
        );

    }


    if (closePaymentHistory) {

        closePaymentHistory.addEventListener(
            "click",
            function () {

                paymentHistoryModal.classList.add(
                    "hidden"
                );

            }
        );

    }


    /* =====================================================
       VIEW BOOKING
       ===================================================== */

    const bookingButtons =
        document.querySelectorAll(
            ".view-booking-button"
        );


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

    const modalPayment =
        document.getElementById(
            "modalPayment"
        );


    /*
     * Booking information
     */

    const bookingData = {

        "BK-2026-00125": {
            patient: "Mr. Silva",
            date: "15 July 2026",
            shift: "Morning Shift",
            payment: "Rs. 2,000 - Released"
        },

        "BK-2026-00131": {
            patient: "Mrs. Perera",
            date: "18 July 2026",
            shift: "Evening Shift",
            payment: "Rs. 2,500 - Held"
        }

    };


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

                    modalPayment.textContent =
                        booking.payment;


                    bookingModal.classList.remove(
                        "hidden"
                    );

                }
            );

        }
    );


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
       CLOSE MODALS WHEN CLICKING OUTSIDE
       ===================================================== */

    if (paymentHistoryModal) {

        paymentHistoryModal.addEventListener(
            "click",
            function (event) {

                if (
                    event.target ===
                    paymentHistoryModal
                ) {

                    paymentHistoryModal.classList.add(
                        "hidden"
                    );

                }

            }
        );

    }


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
       ESCAPE KEY CLOSES MODALS
       ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (event.key !== "Escape") {
                return;
            }


            if (paymentHistoryModal) {

                paymentHistoryModal.classList.add(
                    "hidden"
                );

            }


            if (bookingModal) {

                bookingModal.classList.add(
                    "hidden"
                );

            }

        }
    );


    /* =====================================================
       MONTHLY STATEMENT
       ===================================================== */

    const monthlyStatementButton =
        document.getElementById(
            "monthlyStatementButton"
        );


    if (monthlyStatementButton) {

        monthlyStatementButton.addEventListener(
            "click",
            function () {

                const data =
                    monthlyData[currentMonthIndex];


                alert(
                    "Monthly statement for " +
                    data.month +
                    " " +
                    data.year +
                    " will be available here."
                );

            }
        );

    }


    /* =====================================================
       CONTACT SUPPORT
       ===================================================== */

    const contactSupportButton =
        document.getElementById(
            "contactSupportButton"
        );


    if (contactSupportButton) {

        contactSupportButton.addEventListener(
            "click",
            function () {

                alert(
                    "SafeHands Support\n\n" +
                    "Please contact the SafeHands support team " +
                    "for payment-related assistance."
                );

            }
        );

    }


    /* =====================================================
       VIEW ALL TRANSACTIONS
       ===================================================== */

    const viewAllTransactions =
        document.getElementById(
            "viewAllTransactions"
        );


    if (viewAllTransactions) {

        viewAllTransactions.addEventListener(
            "click",
            function () {

                alert(
                    "Full transaction history will be displayed here."
                );

            }
        );

    }


    /* =====================================================
       INITIAL LOAD
       ===================================================== */

    updateMonth();

});