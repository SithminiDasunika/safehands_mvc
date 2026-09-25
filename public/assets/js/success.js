document.addEventListener("DOMContentLoaded", function () {

    const main = document.querySelector(".success-page");

    if (!main) {
        return;
    }

    main.style.opacity = "0";
    main.style.transform = "translateY(10px)";

    setTimeout(function () {
        main.style.transition =
            "opacity 0.6s ease, transform 0.6s ease";

        main.style.opacity = "1";
        main.style.transform = "translateY(0)";
    }, 100);

});