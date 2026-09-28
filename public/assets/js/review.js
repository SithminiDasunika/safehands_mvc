document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       MAIN 5-STAR RATING
    ===================================================== */

    const starRatings =
        document.querySelectorAll(".star-rating");

    const ratingDescriptor =
        document.getElementById("ratingDescriptor");

    const selectedRating = document.getElementById("selectedRating");

    const descriptors = [
        "Poor",
        "Fair",
        "Good",
        "Very Good",
        "Excellent"
    ];


    starRatings.forEach(function (button) {

        button.addEventListener("click", function () {

            const value =
                parseInt(
                    this.dataset.value,
                    10
                );

            if (selectedRating) {
                selectedRating.value = String(value);
            }


            starRatings.forEach(function (star) {

                const starValue =
                    parseInt(
                        star.dataset.value,
                        10
                    );


                if (starValue <= value) {

                    star.classList.add("active");

                } else {

                    star.classList.remove("active");

                }

            });


            if (ratingDescriptor) {

                ratingDescriptor.textContent =
                    descriptors[value - 1];

                ratingDescriptor.classList.add(
                    "selected"
                );

            }

        });

    });


    /* =====================================================
       DETAILED RATINGS
    ===================================================== */

    const miniStarGroups =
        document.querySelectorAll(".mini-stars");


    miniStarGroups.forEach(function (group) {

        const stars =
            group.querySelectorAll(".mini-star");


        stars.forEach(function (star) {

            star.addEventListener(
                "click",
                function () {

                    const value =
                        parseInt(
                            this.dataset.value,
                            10
                        );


                    stars.forEach(function (item) {

                        const itemValue =
                            parseInt(
                                item.dataset.value,
                                10
                            );


                        if (itemValue <= value) {

                            item.classList.add(
                                "active"
                            );

                        } else {

                            item.classList.remove(
                                "active"
                            );

                        }

                    });

                }
            );

        });

    });


    /* =====================================================
       FORM SUBMISSION
    ===================================================== */

    const feedbackForm =
        document.getElementById(
            "feedbackForm"
        );


    if (feedbackForm) {

        feedbackForm.addEventListener(
            "submit",
            function (event) {
                if (!selectedRating || !selectedRating.value) {
                    event.preventDefault();
                    if (ratingDescriptor) {
                        ratingDescriptor.textContent = "Please select a rating";
                        ratingDescriptor.classList.add("selected");
                    }
                    return;
                }

            }
        );

    }


    /* =====================================================
       DISCARD
    ===================================================== */

    const discardButton =
        document.getElementById(
            "discardButton"
        );


    if (discardButton) {

        discardButton.addEventListener(
            "click",
            function () {

                window.location.href =
                    "/safehands_mvc/bookings";

            }
        );

    }


    /* =====================================================
       NOTIFICATIONS
    ===================================================== */

    const notificationButton =
        document.getElementById(
            "notificationButton"
        );


    if (notificationButton) {

        notificationButton.addEventListener(
            "click",
            function () {

                alert(
                    "You have no new notifications."
                );

            }
        );

    }


    /* =====================================================
       ACCOUNT
    ===================================================== */

    const accountButton =
        document.getElementById(
            "accountButton"
        );


    if (accountButton) {

        accountButton.addEventListener(
            "click",
            function () {

                window.location.href =
                    "/safehands_mvc/family";

            }
        );

    }

});
