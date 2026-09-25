/* =========================================================
   SafeHands - Caregiver My Schedule
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("dailyReportForm");
    const saveDraftButton = document.getElementById("saveDraftButton");

    const reportContainer =
        document.getElementById("report-form-container");

    const successState =
        document.getElementById("success-state");

    const uploadZone =
        document.getElementById("uploadZone");

    const fileUpload =
        document.getElementById("fileUpload");

    const fileList =
        document.getElementById("fileList");


    /* =====================================================
       Medication Status Buttons
       ===================================================== */

    const statusButtons =
        document.querySelectorAll(".status-button");

    statusButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const group =
                button.closest(".status-buttons");

            if (!group) {
                return;
            }

            group
                .querySelectorAll(".status-button")
                .forEach(function (item) {

                    item.classList.remove("active");

                });

            button.classList.add("active");


            const selectedValue =
                button.dataset.value;

            const hiddenInput =
                document.getElementById("medicationStatus");

            if (hiddenInput) {
                hiddenInput.value = selectedValue;
            }

        });

    });


    /* =====================================================
       File Upload
       ===================================================== */

    if (uploadZone && fileUpload) {

        uploadZone.addEventListener("click", function () {

            fileUpload.click();

        });


        fileUpload.addEventListener("change", function () {

            displaySelectedFiles(fileUpload.files);

        });


        uploadZone.addEventListener(
            "dragover",
            function (event) {

                event.preventDefault();

                uploadZone.classList.add("dragover");

            }
        );


        uploadZone.addEventListener(
            "dragleave",
            function () {

                uploadZone.classList.remove("dragover");

            }
        );


        uploadZone.addEventListener(
            "drop",
            function (event) {

                event.preventDefault();

                uploadZone.classList.remove("dragover");

                const files =
                    event.dataTransfer.files;

                if (files.length > 0) {

                    fileUpload.files = files;

                    displaySelectedFiles(files);

                }

            }
        );

    }


    function displaySelectedFiles(files) {

        if (!fileList) {
            return;
        }

        fileList.innerHTML = "";

        Array.from(files).forEach(function (file) {

            const fileItem =
                document.createElement("div");

            fileItem.className = "file-item";


            const fileName =
                document.createElement("span");

            fileName.textContent = file.name;


            const fileSize =
                document.createElement("span");

            fileSize.className = "file-size";

            fileSize.textContent =
                formatFileSize(file.size);


            fileItem.appendChild(fileName);
            fileItem.appendChild(fileSize);

            fileList.appendChild(fileItem);

        });

    }


    function formatFileSize(bytes) {

        if (bytes < 1024) {
            return bytes + " B";
        }

        if (bytes < 1024 * 1024) {
            return (bytes / 1024).toFixed(1) + " KB";
        }

        return (bytes / (1024 * 1024)).toFixed(1) + " MB";

    }


    /* =====================================================
       File Size Validation
       Maximum: 10 MB per file
       ===================================================== */

    if (fileUpload) {

        fileUpload.addEventListener("change", function () {

            const maxSize =
                10 * 1024 * 1024;

            for (const file of fileUpload.files) {

                if (file.size > maxSize) {

                    alert(
                        "The file \"" +
                        file.name +
                        "\" is larger than 10 MB."
                    );

                    fileUpload.value = "";

                    if (fileList) {
                        fileList.innerHTML = "";
                    }

                    return;

                }

            }

        });

    }


    /* =====================================================
       Save Draft
       ===================================================== */

    if (saveDraftButton) {

        saveDraftButton.addEventListener(
            "click",
            function () {

                saveDraft();

            }
        );

    }


    function saveDraft() {

        /*
         * For now this saves the form data locally in the
         * browser. Database draft functionality can be
         * connected later through the controller/model.
         */

        const formData =
            new FormData(form);

        const draft = {};

        formData.forEach(function (value, key) {

            if (key.endsWith("[]")) {

                if (!draft[key]) {
                    draft[key] = [];
                }

                draft[key].push(value);

            } else {

                draft[key] = value;

            }

        });


        try {

            localStorage.setItem(
                "safehands_daily_report_draft",
                JSON.stringify(draft)
            );

            alert(
                "Your report has been saved as a draft on this device."
            );

        } catch (error) {

            alert(
                "Unable to save the draft."
            );

        }

    }


    /* =====================================================
       Load Saved Draft
       ===================================================== */

    loadDraft();


    function loadDraft() {

        try {

            const savedDraft =
                localStorage.getItem(
                    "safehands_daily_report_draft"
                );

            if (!savedDraft) {
                return;
            }

            const draft =
                JSON.parse(savedDraft);

            Object.keys(draft).forEach(function (key) {

                const value = draft[key];

                const fields =
                    document.querySelectorAll(
                        '[name="' + key + '"]'
                    );


                if (fields.length === 0) {
                    return;
                }


                if (key === "care_activities[]") {

                    fields.forEach(function (field) {

                        if (
                            Array.isArray(value) &&
                            value.includes(field.value)
                        ) {

                            field.checked = true;

                        }

                    });

                    return;
                }


                const field = fields[0];


                if (
                    field.type === "checkbox"
                ) {

                    field.checked =
                        value === "1" ||
                        value === true;

                } else {

                    field.value = value;

                }

            });


            /*
             * Restore medication status button.
             */

            const medicationStatus =
                draft["medication_status"];

            if (medicationStatus) {

                statusButtons.forEach(function (button) {

                    if (
                        button.dataset.value ===
                        medicationStatus
                    ) {

                        button.classList.add("active");

                    } else {

                        button.classList.remove("active");

                    }

                });

            }

        } catch (error) {

            console.error(
                "Unable to load saved draft:",
                error
            );

        }

    }


    /* =====================================================
       Submit Report
       ===================================================== */

    if (form) {

        form.addEventListener(
            "submit",
            function (event) {

                event.preventDefault();


                const confirmation =
                    document.getElementById(
                        "reportConfirmation"
                    );


                if (
                    confirmation &&
                    !confirmation.checked
                ) {

                    alert(
                        "Please confirm that the information provided is accurate."
                    );

                    confirmation.focus();

                    return;

                }


                /*
                 * At this stage the report is demonstrated
                 * through the interface.
                 *
                 * Database submission can be connected
                 * later through a controller.
                 */

                if (reportContainer) {

                    reportContainer.style.transition =
                        "opacity 0.3s ease, transform 0.3s ease";

                    reportContainer.style.opacity = "0";

                    reportContainer.style.transform =
                        "translateY(-15px)";

                }


                setTimeout(function () {

                    if (reportContainer) {
                        reportContainer.classList.add("hidden");
                    }

                    if (successState) {

                        successState.classList.remove("hidden");

                    }

                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });


                    /*
                     * Remove saved draft after successful
                     * submission.
                     */

                    localStorage.removeItem(
                        "safehands_daily_report_draft"
                    );

                }, 300);

            }
        );

    }

});