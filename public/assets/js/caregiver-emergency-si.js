 /* =========================================================
   SAFEHANDS - SINHALA EMERGENCY CONTACT
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
            name: "ගිලන් රථ සේවාව",
            number: "1990"
        },

        hospital: {
            name: "රෝහල",
            number: "1990"
        },

        police: {
            name: "පොලිසිය",
            number: "119"
        },

        fire: {
            name: "ගිනි නිවන සහ මුදාගැනීමේ සේවාව",
            number: "110"
        }

    };


    /* =====================================================
       SHOW SELECTED CONTACT
    ===================================================== */

    emergencyContact.addEventListener("change", function () {

        const selectedValue = this.value;


        /* =================================================
           FAMILY MEMBER SELECTED
        ================================================= */

        if (selectedValue === "familymember") {

            familyMemberSection.style.display = "block";

            contactResult.innerHTML = `

                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        පවුලේ සාමාජිකයෙකු තෝරන්න
                    </h3>

                    <p>
                        ඇමතුමක් ලබා ගැනීම සඳහා
                        පහතින් පවුලේ සාමාජිකයෙකු තෝරන්න.
                    </p>

                </div>

            `;

            return;
        }


        /* =================================================
           HIDE FAMILY MEMBER DROPDOWN
        ================================================= */

        familyMemberSection.style.display = "none";

        familyMember.value = "";


        /* =================================================
           EMPTY SELECTION
        ================================================= */

        if (!selectedValue ||
            !emergencyServices[selectedValue]) {

            contactResult.innerHTML = `

                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        හදිසි සේවාවක් තෝරන්න
                    </h3>

                    <p>
                        ඉහත ලැයිස්තුවෙන් හදිසි සේවාවක්
                        තෝරා එහි සම්බන්ධතා තොරතුරු බලන්න.
                    </p>

                </div>

            `;

            return;
        }


        /* =================================================
           SHOW EMERGENCY SERVICE
        ================================================= */

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
                    ☎ ඇමතුමක් ලබා ගන්න
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


        /* =================================================
           NO FAMILY MEMBER SELECTED
        ================================================= */

        if (!phoneNumber) {

            contactResult.innerHTML = `

                <div class="empty-state">

                    <div class="empty-icon">
                        ☎
                    </div>

                    <h3>
                        පවුලේ සාමාජිකයෙකු තෝරන්න
                    </h3>

                    <p>
                        සම්බන්ධතා තොරතුරු බැලීමට
                        පවුලේ සාමාජිකයෙකු තෝරන්න.
                    </p>

                </div>

            `;

            return;
        }


        /* =================================================
           SHOW FAMILY MEMBER CONTACT
        ================================================= */

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
                    ☎ ඇමතුමක් ලබා ගන්න
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


        const mobileLinks =
            mobileNavigation.querySelectorAll("a");


        mobileLinks.forEach(function (link) {

            link.addEventListener("click", function () {

                mobileNavigation.classList.remove("open");

            });

        });

    }

});