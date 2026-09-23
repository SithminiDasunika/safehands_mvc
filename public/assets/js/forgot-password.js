document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       STEP ELEMENTS
    ========================================= */

    const emailStep =
        document.getElementById("emailStep");

    const otpStep =
        document.getElementById("otpStep");

    const passwordStep =
        document.getElementById("passwordStep");

    const successStep =
        document.getElementById("successStep");


    function showStep(step) {

        emailStep.classList.remove("active");
        otpStep.classList.remove("active");
        passwordStep.classList.remove("active");
        successStep.classList.remove("active");

        step.classList.add("active");

    }


    /* =========================================
       EMAIL STEP
    ========================================= */

    const emailForm =
        document.getElementById("emailForm");

    const emailInput =
        document.getElementById("email");

    const emailError =
        document.getElementById("emailError");

    const sendOtpButton =
        document.getElementById("sendOtpButton");

    const displayEmail =
        document.getElementById("displayEmail");


    let registeredEmail = "";

    let currentOtp = "";


    emailForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();


            const email =
                emailInput.value.trim();


            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


            emailError.classList.remove("show");


            if (!emailPattern.test(email)) {

                emailError.classList.add("show");

                return;

            }


            registeredEmail = email;


            displayEmail.textContent =
                registeredEmail;


            /*
             * Temporary OTP generation.
             *
             * Later this should be generated
             * by PHP and sent through email.
             */

            currentOtp =
                Math.floor(
                    100000 +
                    Math.random() * 900000
                ).toString();


            sendOtpButton.disabled = true;

            sendOtpButton.innerHTML =
                "<span>Sending...</span>";


            setTimeout(function () {

                sendOtpButton.disabled = false;

                sendOtpButton.innerHTML =
                    "<span>Send Verification Code</span>";


                showStep(otpStep);

            }, 800);

        }
    );


    /* =========================================
       OTP STEP
    ========================================= */

    const otpForm =
        document.getElementById("otpForm");

    const otpInput =
        document.getElementById("otp");

    const otpError =
        document.getElementById("otpError");


    otpInput.addEventListener(
        "input",
        function () {

            /*
             * Only allow numbers
             */

            this.value =
                this.value.replace(/\D/g, "");

            otpError.classList.remove("show");

        }
    );


    otpForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();


            const enteredOtp =
                otpInput.value.trim();


            otpError.classList.remove("show");


            if (enteredOtp.length !== 6) {

                otpError.textContent =
                    "Please enter the 6-digit verification code.";

                otpError.classList.add("show");

                return;

            }


            /*
             * Temporary front-end verification.
             *
             * Real verification will be done
             * by PHP/MySQL later.
             */

            if (enteredOtp !== currentOtp) {

                /*
                 * For development, you can check
                 * the generated OTP in the browser
                 * console.
                 */

                otpError.textContent =
                    "The verification code is incorrect.";

                otpError.classList.add("show");

                return;

            }


            showStep(passwordStep);

        }
    );


    /* =========================================
       GET NEW OTP
    ========================================= */

    const resendOtp =
        document.getElementById("resendOtp");

    const resendMessage =
        document.getElementById("resendMessage");


    resendOtp.addEventListener(
        "click",
        function () {

            /*
             * Generate a new OTP.
             */

            currentOtp =
                Math.floor(
                    100000 +
                    Math.random() * 900000
                ).toString();


            resendOtp.disabled = true;

            resendMessage.textContent =
                "A new verification code has been sent.";


            let countdown = 30;


            resendOtp.textContent =
                "Get New OTP (" + countdown + ")";


            const timer =
                setInterval(
                    function () {

                        countdown--;

                        resendOtp.textContent =
                            "Get New OTP (" + countdown + ")";


                        if (countdown <= 0) {

                            clearInterval(timer);

                            resendOtp.disabled = false;

                            resendOtp.textContent =
                                "Get New OTP";

                        }

                    },
                    1000
                );

        }
    );


    /* =========================================
       CHANGE EMAIL
    ========================================= */

    const backToEmail =
        document.getElementById("backToEmail");


    backToEmail.addEventListener(
        "click",
        function () {

            otpInput.value = "";

            otpError.classList.remove("show");

            resendMessage.textContent = "";

            showStep(emailStep);

        }
    );


    /* =========================================
       PASSWORD SHOW / HIDE
    ========================================= */

    const passwordToggles =
        document.querySelectorAll(".password-toggle");


    passwordToggles.forEach(
        function (toggle) {

            toggle.addEventListener(
                "click",
                function () {

                    const targetId =
                        this.getAttribute("data-target");

                    const input =
                        document.getElementById(targetId);

                    const eyeOpen =
                        this.querySelector(".eye-open");

                    const eyeClosed =
                        this.querySelector(".eye-closed");


                    if (input.type === "password") {

                        input.type = "text";

                        eyeOpen.style.display =
                            "none";

                        eyeClosed.style.display =
                            "block";

                        this.setAttribute(
                            "aria-label",
                            "Hide password"
                        );

                    } else {

                        input.type = "password";

                        eyeOpen.style.display =
                            "block";

                        eyeClosed.style.display =
                            "none";

                        this.setAttribute(
                            "aria-label",
                            "Show password"
                        );

                    }

                }
            );

        }
    );


    /* =========================================
       PASSWORD RESET
    ========================================= */

    const passwordForm =
        document.getElementById("passwordForm");

    const newPassword =
        document.getElementById("newPassword");

    const confirmPassword =
        document.getElementById("confirmPassword");

    const confirmPasswordError =
        document.getElementById(
            "confirmPasswordError"
        );


    passwordForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();


            confirmPasswordError.classList.remove(
                "show"
            );


            /*
             * Minimum password length
             */

            if (newPassword.value.length < 8) {

                alert(
                    "Password must contain at least 8 characters."
                );

                return;

            }


            /*
             * Check password confirmation
             */

            if (
                newPassword.value !==
                confirmPassword.value
            ) {

                confirmPasswordError.textContent =
                    "Passwords do not match.";

                confirmPasswordError.classList.add(
                    "show"
                );

                return;

            }


            /*
             * Password successfully changed.
             *
             * Real database update will be
             * connected later.
             */

            showStep(successStep);

        }
    );


    /* =========================================
       CONFIRM PASSWORD LIVE VALIDATION
    ========================================= */

    confirmPassword.addEventListener(
        "input",
        function () {

            if (
                this.value !==
                newPassword.value
            ) {

                confirmPasswordError.textContent =
                    "Passwords do not match.";

                confirmPasswordError.classList.add(
                    "show"
                );

            } else {

                confirmPasswordError.classList.remove(
                    "show"
                );

            }

        }
    );

});