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

            const previewImg = document.getElementById("profile-photo-preview");

            if (this.files && this.files.length > 0) {

                selectedFileName.textContent =
                    "Selected: " + this.files[0].name;

                selectedFileName.classList.remove("hidden");

                if (previewImg) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.classList.remove("hidden");
                        previewImg.style.display = "block";
                    };
                    reader.readAsDataURL(this.files[0]);
                }

            } else {

                selectedFileName.textContent = "";
                selectedFileName.classList.add("hidden");

                if (previewImg) {
                    previewImg.src = "";
                    previewImg.classList.add("hidden");
                    previewImg.style.display = "none";
                }

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