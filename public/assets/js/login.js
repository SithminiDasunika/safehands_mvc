document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       PASSWORD SHOW / HIDE
    ========================================= */

    const passwordInput =
        document.getElementById("password");

    const passwordToggle =
        document.getElementById("passwordToggle");

    const eyeOpen =
        document.getElementById("eyeOpen");

    const eyeClosed =
        document.getElementById("eyeClosed");


    if (
        passwordInput &&
        passwordToggle &&
        eyeOpen &&
        eyeClosed
    ) {

        passwordToggle.addEventListener(
            "click",
            function () {

                if (passwordInput.type === "password") {

                    passwordInput.type = "text";

                    eyeOpen.style.display = "none";

                    eyeClosed.style.display = "block";

                    passwordToggle.setAttribute(
                        "aria-label",
                        "Hide password"
                    );

                } else {

                    passwordInput.type = "password";

                    eyeOpen.style.display = "block";

                    eyeClosed.style.display = "none";

                    passwordToggle.setAttribute(
                        "aria-label",
                        "Show password"
                    );

                }

            }
        );

    }


    /* =========================================
       LOGIN FORM VALIDATION
    ========================================= */

    const loginForm =
        document.getElementById("loginForm");

    const emailInput =
        document.getElementById("email");

    const passwordField =
        document.getElementById("password");

    const emailError =
        document.getElementById("emailError");

    const passwordError =
        document.getElementById("passwordError");


    if (loginForm) {

        loginForm.addEventListener(
            "submit",
            function (event) {

                let valid = true;


                /*
                 * Remove previous errors
                 */

                if (emailError) {
                    emailError.classList.remove("show");
                }

                if (passwordError) {
                    passwordError.classList.remove("show");
                }


                /*
                 * Validate email
                 */

                const emailPattern =
                    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


                if (
                    !emailInput ||
                    !emailPattern.test(
                        emailInput.value.trim()
                    )
                ) {

                    if (emailError) {
                        emailError.classList.add("show");
                    }

                    valid = false;
                }


                /*
                 * Validate password
                 */

                if (
                    !passwordField ||
                    passwordField.value.trim() === ""
                ) {

                    if (passwordError) {
                        passwordError.classList.add("show");
                    }

                    valid = false;
                }


                /*
                 * Stop form submission
                 * if validation fails
                 */

                if (!valid) {

                    event.preventDefault();

                }

            }
        );

    }


    /* =========================================
       REMOVE ERROR WHEN USER STARTS TYPING
    ========================================= */

    if (emailInput && emailError) {

        emailInput.addEventListener(
            "input",
            function () {

                emailError.classList.remove("show");

            }
        );

    }


    if (passwordField && passwordError) {

        passwordField.addEventListener(
            "input",
            function () {

                passwordError.classList.remove("show");

            }
        );

    }

});