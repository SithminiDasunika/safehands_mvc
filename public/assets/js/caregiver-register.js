document.addEventListener("DOMContentLoaded", function () {

    const form =
        document.getElementById("personalForm");

    if (!form) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Local Storage
    |--------------------------------------------------------------------------
    */

    const fields = [
        "full_name",
        "nic",
        "dob",
        "gender",
        "phone",
        "email",
        "address",
        "district"
    ];


    fields.forEach(function (fieldName) {

        const field =
            document.getElementById(fieldName);

        if (!field) {
            return;
        }


        const savedValue =
            localStorage.getItem(
                "caregiver_" + fieldName
            );

        if (savedValue !== null) {
            field.value = savedValue;
        }


        field.addEventListener(
            "input",
            function () {

                localStorage.setItem(
                    "caregiver_" + fieldName,
                    field.value
                );

            }
        );


        field.addEventListener(
            "change",
            function () {

                localStorage.setItem(
                    "caregiver_" + fieldName,
                    field.value
                );

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | Password Confirmation
    |--------------------------------------------------------------------------
    */

    const password =
        document.getElementById("password");

    const confirmPassword =
        document.getElementById("confirm_password");

    const passwordMessage =
        document.getElementById("passwordMessage");


    function checkPasswords() {

        if (!password || !confirmPassword) {
            return true;
        }


        if (
            confirmPassword.value === ""
        ) {

            if (passwordMessage) {
                passwordMessage.textContent = "";
            }

            return true;
        }


        if (
            password.value !==
            confirmPassword.value
        ) {

            if (passwordMessage) {

                passwordMessage.textContent =
                    "Passwords do not match.";
            }

            return false;
        }


        if (passwordMessage) {

            passwordMessage.textContent =
                "Passwords match.";
        }

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


    /*
    |--------------------------------------------------------------------------
    | Form Validation
    |--------------------------------------------------------------------------
    */

    form.addEventListener(
        "submit",
        function (event) {

            if (!checkPasswords()) {

                event.preventDefault();

                confirmPassword.focus();

                return;
            }

        }
    );

});