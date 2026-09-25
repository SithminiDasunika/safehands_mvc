document.addEventListener("DOMContentLoaded", function () {

    const searchForm =
        document.getElementById("searchForm");

    const clearButton =
        document.getElementById("clearButton");

    const resultsGrid =
        document.getElementById("resultsGrid");

    const emptyState =
        document.getElementById("emptyState");

    const resultCount =
        document.getElementById("resultCount");

    const resetFilters =
        document.getElementById("resetFilters");

    const sortSelect =
        document.getElementById("sortSelect");


    function getCards() {

        return Array.from(
            document.querySelectorAll(".caregiver-card")
        );

    }


    function filterCaregivers() {

        const name =
            document
                .getElementById("name")
                .value
                .trim()
                .toLowerCase();

        const district =
            document
                .getElementById("district")
                .value;

        const qualification =
            document
                .getElementById("qualification")
                .value
                .toLowerCase();

        const language =
            document
                .getElementById("language")
                .value
                .toLowerCase();

        const experience =
            document
                .getElementById("experience")
                .value;


        let visibleCount = 0;


        getCards().forEach(function (card) {

            const cardName =
                card.dataset.name.toLowerCase();

            const cardDistrict =
                card.dataset.district;

            const cardText =
                card.textContent.toLowerCase();


            let matches = true;


            if (
                name !== "" &&
                !cardName.includes(name)
            ) {
                matches = false;
            }


            if (
                district !== "" &&
                cardDistrict !== district
            ) {
                matches = false;
            }


            if (
                qualification !== "" &&
                !cardText.includes(qualification)
            ) {
                matches = false;
            }


            if (
                language !== "" &&
                !cardText.includes(language)
            ) {
                matches = false;
            }


            if (
                experience !== "" &&
                !matchesExperience(
                    card.dataset.experience,
                    experience
                )
            ) {
                matches = false;
            }


            if (matches) {

                card.style.display = "";

                visibleCount++;

            } else {

                card.style.display = "none";

            }

        });


        resultCount.textContent =
            visibleCount;


        if (visibleCount === 0) {

            resultsGrid.style.display =
                "none";

            emptyState.classList.add("show");

        } else {

            resultsGrid.style.display =
                "grid";

            emptyState.classList.remove("show");

        }

    }


    function matchesExperience(
        experience,
        selected
    ) {

        const years =
            parseInt(
                experience
                    .replace(/\D/g, "")
            );


        if (selected === "1-3 Years") {
            return years >= 1 && years <= 3;
        }

        if (selected === "3-5 Years") {
            return years >= 3 && years <= 5;
        }

        if (selected === "5-10 Years") {
            return years >= 5 && years <= 10;
        }

        if (selected === "10+ Years") {
            return years >= 10;
        }

        return true;

    }


    /* =========================================
       SEARCH
    ========================================= */

    searchForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();

            filterCaregivers();

        }
    );


    /* =========================================
       CLEAR
    ========================================= */

    clearButton.addEventListener(
        "click",
        function () {

            setTimeout(
                function () {

                    resultsGrid.style.display =
                        "grid";

                    emptyState.classList.remove(
                        "show"
                    );


                    getCards().forEach(
                        function (card) {

                            card.style.display =
                                "";

                        }
                    );


                    resultCount.textContent =
                        getCards().length;

                },
                0
            );

        }
    );


    /* =========================================
       RESET FILTERS
    ========================================= */

    resetFilters.addEventListener(
        "click",
        function () {

            searchForm.reset();

            getCards().forEach(
                function (card) {

                    card.style.display = "";

                }
            );


            resultsGrid.style.display =
                "grid";

            emptyState.classList.remove(
                "show"
            );


            resultCount.textContent =
                getCards().length;

        }
    );


    /* =========================================
       GENDER BUTTONS
    ========================================= */

    document
        .querySelectorAll(".gender-button")
        .forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    function () {

                        this.classList.toggle(
                            "selected"
                        );

                    }
                );

            }
        );


    /* =========================================
       LANGUAGE BUTTONS
    ========================================= */

    document
        .querySelectorAll(".language-tags button")
        .forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    function () {

                        this.classList.toggle(
                            "selected"
                        );

                    }
                );

            }
        );


    /* =========================================
       SORTING
    ========================================= */

    sortSelect.addEventListener(
        "change",
        function () {

            const cards =
                getCards();


            if (this.value === "rating") {

                cards.sort(
                    function (a, b) {

                        return (
                            parseFloat(
                                b.dataset.rating
                            ) -
                            parseFloat(
                                a.dataset.rating
                            )
                        );

                    }
                );

            }


            if (this.value === "experience") {

                cards.sort(
                    function (a, b) {

                        const aYears =
                            parseInt(
                                a.dataset.experience
                                    .replace(/\D/g, "")
                            );

                        const bYears =
                            parseInt(
                                b.dataset.experience
                                    .replace(/\D/g, "")
                            );

                        return bYears - aYears;

                    }
                );

            }


            if (this.value === "match") {

                cards.sort(
                    function (a, b) {

                        return (
                            parseInt(
                                a.dataset.name
                            ) -
                            parseInt(
                                b.dataset.name
                            )
                        );

                    }
                );

            }


            cards.forEach(
                function (card) {

                    resultsGrid.appendChild(
                        card
                    );

                }
            );

        }
    );


    /* =========================================
       PAGINATION DEMO
    ========================================= */

    document
        .querySelectorAll(".page-number")
        .forEach(
            function (button) {

                button.addEventListener(
                    "click",
                    function () {

                        document
                            .querySelectorAll(
                                ".page-number"
                            )
                            .forEach(
                                function (item) {

                                    item.classList.remove(
                                        "active"
                                    );

                                }
                            );


                        this.classList.add(
                            "active"
                        );

                    }
                );

            }
        );

});