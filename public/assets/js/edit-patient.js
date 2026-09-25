document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("editPatientForm");
    const saveBtn = document.getElementById("saveBtn");
    const resetBtn = document.getElementById("resetBtn");
    const cancelBtn = document.getElementById("cancelBtn");

    const photoInput = document.getElementById("patientPhoto");
    const photoPreview = document.getElementById("patientPhotoPreview");

    const documentInput = document.getElementById("newDocument");
    const documentsContainer = document.getElementById("documentsContainer");


    /* =========================================
       PHOTO UPLOAD
    ========================================= */

    if (photoInput) {

        photoInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                "image/jpeg",
                "image/png"
            ];

            if (!allowedTypes.includes(file.type)) {

                alert("Please select a JPG, JPEG or PNG image.");

                this.value = "";

                return;
            }

            if (file.size > 2 * 1024 * 1024) {

                alert("Profile photo must be smaller than 2MB.");

                this.value = "";

                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {

                photoPreview.src = event.target.result;

            };

            reader.readAsDataURL(file);

        });

    }


    /* =========================================
       ADD CONDITION
    ========================================= */

    window.addCondition = function () {

        const input = document.getElementById("conditionInput");

        const condition = input.value.trim();

        if (condition === "") {

            alert("Please enter a medical condition.");

            input.focus();

            return;
        }


        const container =
            document.getElementById("conditionsContainer");


        const tag = document.createElement("span");

        tag.className = "condition-tag";

        tag.innerHTML = `
            ${escapeHtml(condition)}
            <button type="button" onclick="removeCondition(this)">
                ×
            </button>
        `;


        container.appendChild(tag);

        input.value = "";

        input.focus();

    };


    /* =========================================
       REMOVE CONDITION
    ========================================= */

    window.removeCondition = function (button) {

        const tag = button.closest(".condition-tag");

        if (tag) {
            tag.remove();
        }

    };


    /* =========================================
       ENTER KEY FOR CONDITION
    ========================================= */

    const conditionInput =
        document.getElementById("conditionInput");

    if (conditionInput) {

        conditionInput.addEventListener("keydown", function (event) {

            if (event.key === "Enter") {

                event.preventDefault();

                addCondition();

            }

        });

    }


    /* =========================================
       NEW DOCUMENT UPLOAD
    ========================================= */

    if (documentInput) {

        documentInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                "application/pdf",
                "image/jpeg",
                "image/png"
            ];

            if (!allowedTypes.includes(file.type)) {

                alert(
                    "Please upload a PDF, JPG, JPEG or PNG file."
                );

                this.value = "";

                return;
            }

            if (file.size > 10 * 1024 * 1024) {

                alert(
                    "Document must be smaller than 10MB."
                );

                this.value = "";

                return;
            }


            const newDocument =
                document.createElement("div");

            newDocument.className = "document-item";


            const fileType =
                file.type === "application/pdf"
                    ? "PDF"
                    : "IMG";


            const size =
                formatFileSize(file.size);


            newDocument.innerHTML = `

                <div class="document-icon">
                    ${fileType}
                </div>

                <div class="document-info">

                    <strong>
                        ${escapeHtml(file.name)}
                    </strong>

                    <span>
                        Uploaded now · ${size}
                    </span>

                </div>

                <div class="document-actions">

                    <button
                        type="button"
                        class="document-btn remove-btn"
                    >
                        Remove
                    </button>

                </div>

            `;


            documentsContainer.appendChild(newDocument);


            const removeButton =
                newDocument.querySelector(".remove-btn");


            removeButton.addEventListener(
                "click",
                function () {

                    newDocument.remove();

                }
            );


            this.value = "";

        });

    }


    /* =========================================
       EXISTING DOCUMENT BUTTONS
    ========================================= */

    document.querySelectorAll(".remove-btn")
        .forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    const documentItem =
                        this.closest(".document-item");

                    if (documentItem) {

                        documentItem.remove();

                    }

                }
            );

        });


    document.querySelectorAll(".replace-btn")
        .forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    const item =
                        this.closest(".document-item");

                    const input =
                        document.createElement("input");

                    input.type = "file";

                    input.accept =
                        ".pdf,.jpg,.jpeg,.png";


                    input.addEventListener(
                        "change",
                        function () {

                            const file = this.files[0];

                            if (!file) {
                                return;
                            }


                            const allowedTypes = [
                                "application/pdf",
                                "image/jpeg",
                                "image/png"
                            ];


                            if (!allowedTypes.includes(file.type)) {

                                alert(
                                    "Please upload a PDF, JPG, JPEG or PNG file."
                                );

                                return;
                            }


                            if (
                                file.size >
                                10 * 1024 * 1024
                            ) {

                                alert(
                                    "Document must be smaller than 10MB."
                                );

                                return;
                            }


                            const info =
                                item.querySelector(
                                    ".document-info"
                                );


                            const name =
                                info.querySelector("strong");


                            const details =
                                info.querySelector("span");


                            name.textContent =
                                file.name;


                            details.textContent =
                                "Replaced now · " +
                                formatFileSize(file.size);

                        }
                    );


                    input.click();

                }
            );

        });


    /* =========================================
       SAVE CHANGES
    ========================================= */

    if (form) {

        form.addEventListener(
            "submit",
            function (event) {

                event.preventDefault();


                saveBtn.disabled = true;

                saveBtn.textContent = "Saving...";


                setTimeout(function () {

                    showNotification();


                    saveBtn.disabled = false;

                    saveBtn.textContent =
                        "Save Changes";

                }, 1000);

            }
        );

    }


    /* =========================================
       RESET
    ========================================= */

    if (resetBtn) {

        resetBtn.addEventListener(
            "click",
            function () {

                const confirmReset =
                    confirm(
                        "Are you sure you want to reset all changes?"
                    );


                if (!confirmReset) {
                    return;
                }


                form.reset();


                alert(
                    "All changes have been reset."
                );

            }
        );

    }


    /* =========================================
       CANCEL
    ========================================= */

    if (cancelBtn) {

        cancelBtn.addEventListener(
            "click",
            function () {

                alert(
                    "Cancel action will be connected later."
                );

            }
        );

    }

});


/* =========================================
   SUCCESS NOTIFICATION
========================================= */

function showNotification() {

    const notification =
        document.getElementById(
            "successNotification"
        );


    if (!notification) {
        return;
    }


    notification.classList.add("show");


    setTimeout(function () {

        notification.classList.remove("show");

    }, 4000);

}


function closeNotification() {

    const notification =
        document.getElementById(
            "successNotification"
        );


    if (notification) {

        notification.classList.remove("show");

    }

}


/* =========================================
   FILE SIZE
========================================= */

function formatFileSize(bytes) {

    if (bytes < 1024) {
        return bytes + " B";
    }

    if (bytes < 1024 * 1024) {
        return (bytes / 1024).toFixed(1) + " KB";
    }

    return (
        bytes /
        (1024 * 1024)
    ).toFixed(1) + " MB";

}


/* =========================================
   HTML ESCAPE
========================================= */

function escapeHtml(value) {

    const div =
        document.createElement("div");

    div.textContent = value;

    return div.innerHTML;

}