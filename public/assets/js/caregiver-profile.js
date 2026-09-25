document.addEventListener("DOMContentLoaded", function () {

    const profileElements =
        document.querySelectorAll(".profile-card, .skill-card, .review-card");

    profileElements.forEach(function (element) {

        element.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-3px)";
        });

        element.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
        });

    });


    /*
     * Mobile navigation
     */

    const menuButton =
        document.querySelector(".mobile-menu-button");

    const navigation =
        document.querySelector(".main-navigation");

    if (menuButton && navigation) {

        menuButton.addEventListener("click", function () {

            navigation.classList.toggle("mobile-navigation-open");

        });

    }


    /*
     * Close mobile navigation when a link is clicked
     */

    const navigationLinks =
        document.querySelectorAll(".main-navigation a");

    navigationLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            if (navigation) {
                navigation.classList.remove(
                    "mobile-navigation-open"
                );
            }

        });

    });


    /*
     * Prevent errors if the profile image is unavailable
     */

    const profileImages =
        document.querySelectorAll("img");

    profileImages.forEach(function (image) {

        image.addEventListener("error", function () {

            this.style.display = "none";

        });

    });

});