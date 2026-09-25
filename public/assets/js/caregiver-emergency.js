 /* =========================================================
   SAFEHANDS - EMERGENCY CONTACT
   Plain JavaScript - No Libraries
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const emergencyContact =
        document.getElementById("emergencyContact");

    const contactResult =
        document.getElementById("contactResult");

    const familyMemberSection =
        document.getElementById("familyMemberSection");

    const familyMember =
        document.getElementById("familyMember");

    const mobileMenuButton =
        document.getElementById("mobileMenuButton");

    const mobileNavigation =
        document.getElementById("mobileNavigation");


    /* =====================================================
       EMERGENCY CONTACT DATA
    ===================================================== */

    const emergencyServices = {

        ambulance: {
            name: "Ambulance",
            number: "1990"
        },

        hospital: {
            name: "Hospital",
            number: "1990"
        },

        police: {
            name: "Police",
            number: "119"
        },

        fire: {
            name: "Fire & Rescue",
            number: "110"
        }

    };


    /* =====================================================
       SHOW SELECTED CONTACT
    ===================================================== */

    emergencyContact.addEventListener("change", function () {

        const selectedValue = this.value;


        /* ================================================
           FAMILY MEMBER SELECTED
        ================================================ */

        if (selectedValue === "familymember") {

            familyMemberSection.style.display = "block";

            contactResult.innerHTML = `
                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        Select a Family Member
                    </h3>

                    <p>
                        Choose a family member from the
                        dropdown above to view their
                        contact information.
                    </p>

                </div>
            `;

            return;
        }


        /* ================================================
           OTHER EMERGENCY SERVICES
        ================================================ */

        familyMemberSection.style.display = "none";

        familyMember.value = "";


        if (!selectedValue ||
            !emergencyServices[selectedValue]) {

            contactResult.innerHTML = `
                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        Select an Emergency Service
                    </h3>

                    <p>
                        Choose a service from the dropdown above
                        to view its contact information.
                    </p>

                </div>
            `;

            return;
        }


        const service =
            emergencyServices[selectedValue];


        contactResult.innerHTML = `
            <div class="selected-contact">

                <div class="selected-contact-icon">
                    ☎
                </div>

                <h3>
                    ${service.name}
                </h3>

                <div class="contact-number">
                    ${service.number}
                </div>

                <a
                    href="tel:${service.number}"
                    class="call-button"
                >
                    ☎ Call Now
                </a>

            </div>
        `;

    });


    /* =====================================================
       FAMILY MEMBER SELECTION
    ===================================================== */

    familyMember.addEventListener("change", function () {

        const selectedOption =
            this.options[this.selectedIndex];

        const phoneNumber =
            selectedOption.getAttribute("data-phone");

        const memberName =
            selectedOption.textContent.trim();


        if (!phoneNumber) {

            contactResult.innerHTML = `
                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        Select a Family Member
                    </h3>

                    <p>
                        Choose a family member to view
                        their contact information.
                    </p>

                </div>
            `;

            return;
        }


        /* ================================================
           SHOW FAMILY MEMBER CONTACT
        ================================================ */

        contactResult.innerHTML = `
            <div class="selected-contact">

                <div class="selected-contact-icon">
                    ☎
                </div>

                <h3>
                    ${memberName}
                </h3>

                <div class="contact-number">
                    ${phoneNumber}
                </div>

                <a
                    href="tel:${phoneNumber}"
                    class="call-button"
                >
                    ☎ Call Now
                </a>

            </div>
        `;

    });


    /* =====================================================
       MOBILE NAVIGATION
    ===================================================== */

    if (mobileMenuButton && mobileNavigation) {

        mobileMenuButton.addEventListener("click", function () {

            mobileNavigation.classList.toggle("open");

        });


        /*
         * Close menu after selecting a navigation link.
         */
        const mobileLinks =
            mobileNavigation.querySelectorAll("a");

        mobileLinks.forEach(function (link) {

            link.addEventListener("click", function () {

                mobileNavigation.classList.remove("open");

            });

        });

    }

});