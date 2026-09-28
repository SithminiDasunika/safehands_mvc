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

        const helplineDropdown = helplineButton.closest(".emergency-dropdown");

        helplineButton.addEventListener("click", function (event) {

            event.stopPropagation();

            const isOpen = helplineDropdown.classList.toggle("open");
            helplineButton.setAttribute("aria-expanded", String(isOpen));

        });


        document.addEventListener("click", function () {

            helplineDropdown.classList.remove("open");
            helplineButton.setAttribute("aria-expanded", "false");

        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                helplineDropdown.classList.remove("open");
                helplineButton.setAttribute("aria-expanded", "false");
            }
        });


        helplineMenu.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }

});
