document.addEventListener("DOMContentLoaded", function () {

    const tabs =
        document.querySelectorAll(".filter-tab");

    const bookings =
        document.querySelectorAll(".searchable-booking");

    const search =
        document.getElementById("bookingSearch");

    const sections =
        document.querySelectorAll(".booking-section");

    const noResults =
        document.getElementById("noResults");


    let currentFilter = "all";


    /*
    |--------------------------------------------------------------------------
    | FILTER TABS
    |--------------------------------------------------------------------------
    */

    tabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            tabs.forEach(function (item) {
                item.classList.remove("active");
            });

            tab.classList.add("active");

            currentFilter =
                tab.dataset.filter;

            applyFilters();

        });

    });


    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    if (search) {

        search.addEventListener("input", function () {

            applyFilters();

        });

    }


    /*
    |--------------------------------------------------------------------------
    | FILTER FUNCTION
    |--------------------------------------------------------------------------
    */

    function applyFilters() {

        const query =
            search
                ? search.value.toLowerCase().trim()
                : "";

        let visibleCount = 0;


        bookings.forEach(function (booking) {

            const status =
                booking.dataset.status;

            const text =
                booking.dataset.search || "";


            const matchesFilter =
                currentFilter === "all" ||
                currentFilter === status;


            const matchesSearch =
                text.includes(query);


            if (
                matchesFilter &&
                matchesSearch
            ) {

                booking.style.display = "";

                visibleCount++;

            } else {

                booking.style.display = "none";

            }

        });


        sections.forEach(function (section) {

            const sectionType =
                section.dataset.section;

            if (
                currentFilter !== "all" &&
                sectionType !== currentFilter
            ) {

                section.style.display = "none";

            } else {

                section.style.display = "";

            }

        });


        if (noResults) {

            noResults.style.display =
                visibleCount === 0
                    ? "block"
                    : "none";

        }

    }


    /*
    |--------------------------------------------------------------------------
    | CONTACT CAREGIVER
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(".contact-button")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                showToast(
                    "Contact caregiver feature will be available soon."
                );

            });

        });


    /*
    |--------------------------------------------------------------------------
    | VIEW BOOKING
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(".view-booking-button")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                showToast(
                    "Booking details will be available soon."
                );

            });

        });


    /*
    |--------------------------------------------------------------------------
    | CANCEL
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(".cancel-button")
        .forEach(function (button) {

            button.addEventListener("click", function () {

                const confirmed =
                    confirm(
                        "Are you sure you want to cancel this booking?"
                    );

                if (confirmed) {

                    showToast(
                        "Booking cancellation request submitted."
                    );

                }

            });

        });


    /*
    |--------------------------------------------------------------------------
    | FILTER BUTTON
    |--------------------------------------------------------------------------
    */

    const filterButton =
        document.getElementById("filterButton");

    if (filterButton) {

        filterButton.addEventListener(
            "click",
            function () {

                showToast(
                    "Additional filters will be available soon."
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATIONS
    |--------------------------------------------------------------------------
    */

    const notificationButton =
        document.getElementById(
            "notificationButton"
        );

    if (notificationButton) {

        notificationButton.addEventListener(
            "click",
            function () {

                showToast(
                    "You have no new notifications."
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | TOAST
    |--------------------------------------------------------------------------
    */

    function showToast(message) {

        const existing =
            document.querySelector(
                ".booking-toast"
            );

        if (existing) {
            existing.remove();
        }


        const toast =
            document.createElement("div");

        toast.className =
            "booking-toast";

        toast.textContent =
            message;


        document.body.appendChild(toast);


        requestAnimationFrame(function () {

            toast.classList.add("show");

        });


        setTimeout(function () {

            toast.classList.remove("show");

            setTimeout(function () {

                toast.remove();

            }, 300);

        }, 2500);

    }

});