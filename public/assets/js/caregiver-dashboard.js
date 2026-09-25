document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       MOBILE NAVIGATION
    ========================================= */

    const mobileMenuButton =
        document.getElementById("mobileMenuButton");

    const mainNavigation =
        document.getElementById("mainNavigation");

    if (mobileMenuButton && mainNavigation) {

        mobileMenuButton.addEventListener("click", function () {

            mainNavigation.classList.toggle("open");

        });

    }


    /* =========================================
       PROFILE TABS
    ========================================= */

    const tabs =
        document.querySelectorAll(".profile-tab");

    const tabContents =
        document.querySelectorAll(".tab-content");


    function openTab(tabName) {

        tabs.forEach(function (tab) {

            tab.classList.remove("active");

            if (tab.dataset.tab === tabName) {
                tab.classList.add("active");
            }

        });


        tabContents.forEach(function (content) {

            content.classList.remove("active");

        });


        const selectedContent =
            document.getElementById(tabName);

        if (selectedContent) {
            selectedContent.classList.add("active");
        }

    }


    tabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            openTab(tab.dataset.tab);

        });

    });


    /* =========================================
       EDIT PROFILE BUTTON
    ========================================= */

    const editProfileButton =
        document.getElementById("editProfileButton");

    if (editProfileButton) {

        editProfileButton.addEventListener("click", function () {

            openTab("overview");

            document.querySelector(".profile-content")
                .scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

        });

    }


    /* =========================================
       ADD CERTIFICATION
    ========================================= */

    const addCertificationButton =
        document.getElementById("addCertificationButton");

    if (addCertificationButton) {

        addCertificationButton.addEventListener("click", function () {

            openTab("professional");

            document.querySelector(
                '[name="professional_summary"]'
            )?.focus();

        });

    }


    /* =========================================
       COMPLETE SKILLS
    ========================================= */

    const completeSkillsButton =
        document.getElementById("completeSkillsButton");

    if (completeSkillsButton) {

        completeSkillsButton.addEventListener("click", function () {

            openTab("professional");

            const skillsInput =
                document.querySelector('[name="skills"]');

            if (skillsInput) {
                skillsInput.focus();
            }

        });

    }


    /* =========================================
       PROFILE PHOTO
    ========================================= */

    const updatePhotoButton =
        document.getElementById("updatePhotoButton");

    const profilePhotoInput =
        document.getElementById("profilePhotoInput");

    const profilePreview =
        document.getElementById("profilePreview");


    if (updatePhotoButton && profilePhotoInput) {

        updatePhotoButton.addEventListener("click", function () {

            profilePhotoInput.click();

        });

    }


    if (profilePhotoInput) {

        profilePhotoInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith("image/")) {

                alert("Please select an image file.");

                this.value = "";

                return;
            }


            const reader = new FileReader();

            reader.onload = function (event) {

                if (profilePreview) {
                    profilePreview.src = event.target.result;
                }

            };

            reader.readAsDataURL(file);

        });

    }


    /* =========================================
       PROFILE VISIBILITY
    ========================================= */

    const profileVisibility =
        document.getElementById("profileVisibility");

    const visibilityStatus =
        document.getElementById("visibilityStatus");


    if (profileVisibility && visibilityStatus) {

        profileVisibility.addEventListener("change", function () {

            if (this.checked) {

                visibilityStatus.textContent = "Visible";

            } else {

                visibilityStatus.textContent = "Hidden";

            }

        });

    }


    /* =========================================
       SAVE CHANGES
    ========================================= */

    const profileForm =
        document.getElementById("caregiverProfileForm");

    const saveMessage =
        document.getElementById("saveMessage");


    if (profileForm) {

        profileForm.addEventListener("submit", function (event) {

            event.preventDefault();

            if (saveMessage) {

                saveMessage.textContent =
                    "Your changes are ready to be saved.";

                saveMessage.classList.add("show");

                setTimeout(function () {

                    saveMessage.classList.remove("show");

                }, 4000);

            }

        });

    }


    /* =========================================
       CANCEL CHANGES
    ========================================= */

    const cancelChangesButton =
        document.getElementById("cancelChangesButton");


    if (cancelChangesButton) {

        cancelChangesButton.addEventListener("click", function () {

            const confirmed =
                confirm(
                    "Are you sure you want to cancel your changes?"
                );

            if (confirmed) {

                profileForm.reset();

                openTab("overview");

            }

        });

    }


    /* =========================================
       NOTIFICATION BUTTON
    ========================================= */

    const notificationButton =
        document.getElementById("notificationButton");

    if (notificationButton) {

        notificationButton.addEventListener("click", function () {

            window.location.href =
                "/safehands_mvc/caregiver/notifications";

        });

    }

});