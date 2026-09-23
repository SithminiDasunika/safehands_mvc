document.addEventListener("DOMContentLoaded", function () {

    /*
     * =========================
     * CARD HOVER MICRO-INTERACTION
     * =========================
     */

    const cards = document.querySelectorAll(
        ".quick-card, .session-card, .patient-card, .activity-card"
    );

    cards.forEach(function (card) {

        card.addEventListener("mouseenter", function () {
            card.style.transform = "translateY(-4px)";
        });

        card.addEventListener("mouseleave", function () {
            card.style.transform = "translateY(0)";
        });

    });


    /*
     * =========================
     * EMERGENCY HELPLINE
     * =========================
     */

    const helplineButton =
        document.getElementById("helplineButton");

    const helplineMenu =
        document.getElementById("helplineMenu");


    if (helplineButton && helplineMenu) {

        helplineButton.addEventListener("click", function (event) {

            event.stopPropagation();

            helplineMenu.classList.toggle("show");

        });


        document.addEventListener("click", function () {

            helplineMenu.classList.remove("show");

        });


        helplineMenu.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }

});