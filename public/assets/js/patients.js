document.addEventListener("DOMContentLoaded", function () {


    /* =====================================================
       SEARCH PATIENTS
    ====================================================== */

    const searchInput =
        document.getElementById("patientSearch");

    const patientCards =
        document.querySelectorAll(".patient-card");

    const noPatientsMessage =
        document.getElementById(
            "noPatientsMessage"
        );


    if (searchInput) {

        searchInput.addEventListener(
            "input",
            function () {

                const searchTerm =
                    this.value
                        .toLowerCase()
                        .trim();


                let visiblePatients = 0;


                patientCards.forEach(
                    function (card) {

                        const name =
                            card.dataset.patientName ||
                            "";

                        const relationship =
                            card.dataset.patientRelationship ||
                            "";


                        const matches =
                            name.includes(searchTerm) ||
                            relationship.includes(searchTerm);


                        if (matches) {

                            card.style.display =
                                "flex";

                            visiblePatients++;

                        } else {

                            card.style.display =
                                "none";

                        }

                    }
                );


                if (noPatientsMessage) {

                    if (
                        visiblePatients === 0
                    ) {

                        noPatientsMessage.classList.add(
                            "show"
                        );

                    } else {

                        noPatientsMessage.classList.remove(
                            "show"
                        );

                    }

                }

            }
        );

    }



    /* =====================================================
       ADD PATIENT
    ====================================================== */

    const addPatientButton =
        document.getElementById(
            "addPatientButton"
        );


    if (addPatientButton) {

        addPatientButton.addEventListener(
            "click",
            function () {

                showToast(
                    "Add Patient page will be connected later."
                );

            }
        );

    }



    /* =====================================================
       VIEW PROFILE
    ====================================================== */

    document.querySelectorAll(
        ".view-profile-button"
    ).forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const patient =
                        this.dataset.patient;


                    showToast(
                        "Viewing profile for " +
                        patient +
                        "."
                    );

                }
            );

        }
    );



    /* =====================================================
       DAILY CARE REPORTS
    ====================================================== */

    document.querySelectorAll(
        ".report-button"
    ).forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const patient =
                        this.dataset.patient;


                    showToast(
                        "Daily care reports for " +
                        patient +
                        " will be connected later."
                    );

                }
            );

        }
    );



    /* =====================================================
       VIEW REPORT
    ====================================================== */

    document.querySelectorAll(
        ".view-report-button"
    ).forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const patient =
                        this.dataset.report;


                    showToast(
                        "Opening report for " +
                        patient +
                        "."
                    );

                }
            );

        }
    );



    /* =====================================================
       VIEW ALL REPORTS
    ====================================================== */

    const viewAllReports =
        document.getElementById(
            "viewAllReports"
        );


    if (viewAllReports) {

        viewAllReports.addEventListener(
            "click",
            function (event) {

                event.preventDefault();


                showToast(
                    "All reports page will be connected later."
                );

            }
        );

    }



    /* =====================================================
       NOTIFICATIONS
    ====================================================== */

    const notificationButton =
        document.getElementById(
            "notificationButton"
        );


    if (notificationButton) {

        notificationButton.addEventListener(
            "click",
            function () {

                showToast(
                    "Notifications will be connected later."
                );

            }
        );

    }

});



/* =========================================================
   TOAST
========================================================= */

function showToast(message) {

    const toast =
        document.getElementById("toast");


    if (!toast) {
        return;
    }


    toast.textContent = message;


    toast.classList.add("show");


    clearTimeout(
        window.safeHandsToastTimer
    );


    window.safeHandsToastTimer =
        setTimeout(
            function () {

                toast.classList.remove(
                    "show"
                );

            },
            3000
        );

}