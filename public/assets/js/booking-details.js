document.addEventListener("DOMContentLoaded", function () {

    /*
     * =====================================
     * NOTIFICATION BUTTON
     * =====================================
     */

    const notificationButton =
        document.getElementById("notificationButton");

    if (notificationButton) {

        notificationButton.addEventListener("click", function () {

            alert("No new notifications.");

        });

    }



    /*
     * =====================================
     * SEND MESSAGE
     * =====================================
     */

    const messageButton =
        document.getElementById("messageCaregiver");

    if (messageButton) {

        messageButton.addEventListener("click", function () {

            alert("Messaging feature will be available soon.");

        });

    }



    /*
     * =====================================
     * GENERATE OTP
     * =====================================
     */

    const otpButton =
        document.getElementById("generateOtp");

    const otpText =
        document.getElementById("otpText");


    if (otpButton && otpText) {

        otpButton.addEventListener("click", function () {

            otpText.textContent = "Generating...";

            otpButton.disabled = true;

            otpButton.style.opacity = "0.8";


            setTimeout(function () {

                otpText.textContent = "OTP: 8821";

                otpButton.style.background =
                    "#025747";

                otpButton.style.opacity = "1";

                otpButton.disabled = false;

            }, 1200);

        });

    }



    /*
     * =====================================
     * CANCEL BOOKING
     * =====================================
     */

    const cancelButton =
        document.getElementById("cancelBooking");


    if (cancelButton) {

        cancelButton.addEventListener("click", function () {

            const confirmed = confirm(
                "Are you sure you want to cancel this booking?"
            );


            if (confirmed) {

                alert(
                    "Booking cancellation request submitted."
                );

            }

        });

    }

});