document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       DESCRIPTION CHARACTER COUNTER
    ===================================================== */

    const description =
        document.getElementById("description");

    const characterCount =
        document.getElementById("characterCount");


    if (description && characterCount) {

        function updateCharacterCount() {

            const count = description.value.length;

            characterCount.textContent =
                count + " / 1000";

        }

        description.addEventListener(
            "input",
            updateCharacterCount
        );

        updateCharacterCount();
    }


    /* =====================================================
       ATTACHMENT
    ===================================================== */

    const attachment =
        document.getElementById("attachment");

    const attachmentPreview =
        document.getElementById("attachmentPreview");

    const removeFile =
        document.getElementById("removeFile");


    if (attachment) {

        attachment.addEventListener(
            "change",
            function () {

                if (!this.files.length) {
                    return;
                }

                const file = this.files[0];

                const fileName =
                    attachmentPreview.querySelector(
                        ".file-information p"
                    );

                const fileSize =
                    attachmentPreview.querySelector(
                        ".file-information span"
                    );

                if (fileName) {
                    fileName.textContent =
                        file.name;
                }

                if (fileSize) {

                    const sizeMB =
                        (file.size / (1024 * 1024))
                            .toFixed(1);

                    fileSize.textContent =
                        sizeMB + " MB";
                }

                attachmentPreview.style.display =
                    "flex";
            }
        );

    }


    /* =====================================================
       REMOVE ATTACHMENT
    ===================================================== */

    if (removeFile) {

        removeFile.addEventListener(
            "click",
            function () {

                if (attachment) {
                    attachment.value = "";
                }

                if (attachmentPreview) {
                    attachmentPreview.style.display =
                        "none";
                }

            }
        );

    }


    /* =====================================================
       CANCEL
    ===================================================== */

    const cancelButton =
        document.getElementById("cancelButton");


    if (cancelButton) {

        cancelButton.addEventListener(
            "click",
            function () {

                window.location.href =
                    "/safehands_mvc/booking/details";

            }
        );

    }


    /* =====================================================
       FORM SUBMIT
    ===================================================== */

    const complaintForm =
        document.getElementById("complaintForm");


    if (complaintForm) {

        complaintForm.addEventListener(
            "submit",
            function (event) {

                event.preventDefault();

                const subject =
                    document.getElementById("subject");


                if (
                    subject &&
                    subject.value.trim() === ""
                ) {

                    alert(
                        "Please enter a subject for your complaint."
                    );

                    subject.focus();

                    return;
                }


                if (
                    description &&
                    description.value.trim() === ""
                ) {

                    alert(
                        "Please describe what happened."
                    );

                    description.focus();

                    return;
                }


                alert(
                    "Complaint submitted successfully."
                );

            }
        );

    }


    /* =====================================================
       NOTIFICATION
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
