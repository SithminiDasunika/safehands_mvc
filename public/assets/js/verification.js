document.addEventListener("DOMContentLoaded", function () {

    /*
     * =========================================================
     * VERIFICATION FORM
     * =========================================================
     */

    const form = document.querySelector(".verification-form");

    if (!form) {
        return;
    }


    /*
     * =========================================================
     * FILE INPUT DISPLAY
     * =========================================================
     *
     * Shows the selected file name next to each upload field.
     */

    const fileInputs = form.querySelectorAll(
        'input[type="file"]'
    );

    fileInputs.forEach(function (input) {

        input.addEventListener("change", function () {

            const fileName =
                this.files && this.files.length > 0
                    ? this.files[0].name
                    : "";

            let fileNameElement =
                this.parentElement.querySelector(".selected-file-name");

            if (fileNameElement) {
                fileNameElement.textContent = fileName;
            }

        });

    });


    /*
     * =========================================================
     * FORM SUBMISSION
     * =========================================================
     *
     * The form is submitted normally to the MVC controller.
     * No JavaScript redirection is used here.
     */

    form.addEventListener("submit", function (event) {

        const confirmation =
            form.querySelector(
                'input[name="document_confirmation"]'
            );

        if (confirmation && !confirmation.checked) {

            event.preventDefault();

            alert(
                "Please confirm that all uploaded documents are true and correct."
            );

            confirmation.focus();

            return;
        }

    });


    /*
     * =========================================================
     * MOBILE FILE INPUT SUPPORT
     * =========================================================
     *
     * Makes sure file inputs work correctly on mobile devices.
     */

    fileInputs.forEach(function (input) {

        input.addEventListener("click", function () {
            this.removeAttribute("readonly");
        });

    });

});