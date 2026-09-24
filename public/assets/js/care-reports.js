document.addEventListener("DOMContentLoaded", function () {

    const searchInput =
        document.getElementById("reportSearch");

    const filter =
        document.getElementById("reportFilter");

    const reportCards =
        document.querySelectorAll(".report-card");

    const noReports =
        document.getElementById("noReports");

    const toast =
        document.getElementById("toast");


    /* =========================
       TOAST
    ========================= */

    function showToast(message) {

        toast.textContent = message;

        toast.classList.add("show");

        setTimeout(function () {

            toast.classList.remove("show");

        }, 2500);
    }


    /* =========================
       SEARCH
    ========================= */

    function applyFilters() {

        const query =
            searchInput.value
                .toLowerCase()
                .trim();

        const filterValue =
            filter.value;

        let visible = 0;


        reportCards.forEach(function (card) {

            const date =
                card.dataset.date.toLowerCase();

            const shift =
                card.dataset.shift.toLowerCase();

            const status =
                card.dataset.status.toLowerCase();

            const caregiver =
                card.dataset.caregiver.toLowerCase();


            const matchesSearch =
                date.includes(query) ||
                shift.includes(query) ||
                status.includes(query) ||
                caregiver.includes(query);


            let matchesFilter = true;


            if (filterValue === "morning") {

                matchesFilter =
                    shift.includes("morning");

            }

            else if (filterValue === "afternoon") {

                matchesFilter =
                    shift.includes("afternoon");

            }

            else if (filterValue === "evening") {

                matchesFilter =
                    shift.includes("evening");

            }


            if (
                matchesSearch &&
                matchesFilter
            ) {

                card.style.display = "";

                visible++;

            } else {

                card.style.display = "none";

            }

        });


        noReports.style.display =
            visible === 0
                ? "block"
                : "none";
    }


    searchInput.addEventListener(
        "input",
        applyFilters
    );


    filter.addEventListener(
        "change",
        function () {

            if (
                filter.value === "newest" ||
                filter.value === "oldest"
            ) {

                showToast(
                    "Sorting option selected."
                );

            }

            applyFilters();

        }
    );


    /* =========================
       VIEW REPORT
    ========================= */

    document.querySelectorAll(
        ".view-report-button"
    ).forEach(function (button) {

        button.addEventListener(
            "click",
            function () {

                const caregiver =
                    button.dataset.caregiver;

                const date =
                    button.dataset.date;


                showToast(
                    "Opening report from " +
                    caregiver +
                    " - " +
                    date
                );

            }
        );

    });


    /* =========================
       FILTER BUTTON
    ========================= */

    document.getElementById(
        "filterButton"
    ).addEventListener(
        "click",
        function () {

            showToast(
                "Additional filters will be available soon."
            );

        }
    );


    /* =========================
       NOTIFICATIONS
    ========================= */

    document.getElementById(
        "notificationButton"
    ).addEventListener(
        "click",
        function () {

            showToast(
                "No new notifications."
            );

        }
    );


    /* =========================
       PAGINATION
    ========================= */

    document.querySelectorAll(
        ".pagination button"
    ).forEach(function (button) {

        button.addEventListener(
            "click",
            function () {

                if (
                    !button.disabled &&
                    !button.classList.contains("current")
                ) {

                    showToast(
                        "Pagination will be connected to the database later."
                    );

                }

            }
        );

    });

});