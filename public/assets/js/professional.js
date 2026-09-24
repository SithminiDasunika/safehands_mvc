document.addEventListener("DOMContentLoaded", function () {

    /* ==================================================
       PROFILE PHOTO SELECTION
    ================================================== */

    const profileInput =
        document.getElementById("profile-photo-upload");

    const selectedFileName =
        document.getElementById("selected-file-name");

    const selectFileButton =
        document.getElementById("select-file-button");


    if (profileInput && selectFileButton) {

        selectFileButton.addEventListener("click", function () {
            profileInput.click();
        });

    }


    if (profileInput && selectedFileName) {

        profileInput.addEventListener("change", function () {

            if (this.files && this.files.length > 0) {

                selectedFileName.textContent =
                    "Selected: " + this.files[0].name;

                selectedFileName.classList.remove("hidden");

            } else {

                selectedFileName.textContent = "";
                selectedFileName.classList.add("hidden");

            }

        });

    }


    /* ==================================================
       FORM LABEL FOCUS EFFECT
    ================================================== */

    const inputs =
        document.querySelectorAll(
            "input:not([type='file']), select, textarea"
        );


    inputs.forEach(function (input) {

        input.addEventListener("focus", function () {

            const parent = this.parentElement;

            if (!parent) {
                return;
            }

            const label = parent.querySelector("label");

            if (label) {
                label.classList.add("label-focused");
            }

        });


        input.addEventListener("blur", function () {

            const parent = this.parentElement;

            if (!parent) {
                return;
            }

            const label = parent.querySelector("label");

            if (label) {
                label.classList.remove("label-focused");
            }

        });

    });

});