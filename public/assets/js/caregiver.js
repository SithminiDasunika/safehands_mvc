document.addEventListener("DOMContentLoaded", function () {

    /* ==================================================
       REGISTRATION FORM
    ================================================== */

    const form = document.querySelector(".registration-form");

    if (!form) {
        return;
    }


    /* ==================================================
       LOCAL STORAGE
       Saves personal information while moving between
       registration steps.
    ================================================== */

    const fields = [
        "full_name",
        "nic",
        "date_of_birth",
        "gender",
        "phone",
        "email",
        "address",
        "district"
    ];


    fields.forEach(function (fieldName) {

        const field = document.getElementById(fieldName);

        if (!field) {
            return;
        }


        /* Load previously saved value */
        const savedValue =
            localStorage.getItem("caregiver_" + fieldName);

        if (savedValue !== null) {
            field.value = savedValue;
        }


        /* Save when typing */
        field.addEventListener("input", function () {

            localStorage.setItem(
                "caregiver_" + fieldName,
                field.value
            );

        });


        /* Save when selecting/changing */
        field.addEventListener("change", function () {

            localStorage.setItem(
                "caregiver_" + fieldName,
                field.value
            );

        });

    });


    /* ==================================================
       PASSWORD CONFIRMATION
    ================================================== */

    const password =
        document.getElementById("password");

    const confirmPassword =
        document.getElementById("confirm_password");


    function checkPasswords() {

        if (!password || !confirmPassword) {
            return true;
        }


        /* Nothing entered yet */
        if (confirmPassword.value === "") {

            confirmPassword.setCustomValidity("");

            return true;
        }


        /* Passwords don't match */
        if (password.value !== confirmPassword.value) {

            confirmPassword.setCustomValidity(
                "Passwords do not match."
            );

            return false;
        }


        /* Passwords match */
        confirmPassword.setCustomValidity("");

        return true;
    }


    if (password) {

        password.addEventListener(
            "input",
            checkPasswords
        );

    }


    if (confirmPassword) {

        confirmPassword.addEventListener(
            "input",
            checkPasswords
        );

    }


    /* ==================================================
       FORM SUBMISSION
    ================================================== */

    form.addEventListener("submit", function (event) {

        if (!checkPasswords()) {

            event.preventDefault();

            confirmPassword.focus();

            return;
        }

    });

});