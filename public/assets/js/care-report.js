document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | Attachment View
    |--------------------------------------------------------------------------
    */

    const attachmentButtons =
        document.querySelectorAll(".view-attachment");

    attachmentButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const fileName =
                button.getAttribute("data-file");

            showToast(
                fileName + " is ready to view."
            );

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Contact Caregiver
    |--------------------------------------------------------------------------
    */

    const contactButton =
        document.getElementById("contactCaregiver");

    if (contactButton) {

        contactButton.addEventListener("click", function () {

            showToast(
                "Contact caregiver feature will be available soon."
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */

    const notificationButton =
        document.getElementById("notificationButton");

    if (notificationButton) {

        notificationButton.addEventListener("click", function () {

            showToast(
                "You have no new notifications."
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Toast
    |--------------------------------------------------------------------------
    */

    function showToast(message) {

        const existingToast =
            document.querySelector(".care-report-toast");

        if (existingToast) {
            existingToast.remove();
        }


        const toast =
            document.createElement("div");

        toast.className =
            "care-report-toast";

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