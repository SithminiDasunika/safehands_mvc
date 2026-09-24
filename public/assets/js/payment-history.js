document.addEventListener("DOMContentLoaded", function () {

    /*
     * ==========================================
     * NOTIFICATION BUTTON
     * ==========================================
     */

    const notificationButton =
        document.getElementById("notificationButton");

    if (notificationButton) {

        notificationButton.addEventListener("click", function () {

            alert("You have no new notifications.");

        });

    }


    /*
     * ==========================================
     * ACCOUNT BUTTON
     * ==========================================
     */

    const accountButton =
        document.getElementById("accountButton");

    if (accountButton) {

        accountButton.addEventListener("click", function () {

            window.location.href =
                "/safehands_mvc/family";

        });

    }


    /*
     * ==========================================
     * DOWNLOAD RECEIPT
     * ==========================================
     *
     * Backend receipt generation is not implemented
     * yet. For now this gives a frontend message.
     */

    const downloadReceiptButton =
        document.getElementById("downloadReceiptButton");

    if (downloadReceiptButton) {

        downloadReceiptButton.addEventListener("click", function () {

            alert(
                "Receipt download will be available when the payment backend is connected."
            );

        });

    }

});