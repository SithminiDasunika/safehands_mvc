document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       STEP ELEMENTS
    ========================================= */

    const emailStep = document.getElementById("emailStep");
    const otpStep = document.getElementById("otpStep");
    const passwordStep = document.getElementById("passwordStep");
    const successStep = document.getElementById("successStep");

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

    const emailForm = document.getElementById("emailForm");
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    const sendOtpButton = document.getElementById("sendOtpButton");
    const displayEmail = document.getElementById("displayEmail");

    let registeredEmail = "";

    emailForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        emailError.classList.remove("show");

        if (!emailPattern.test(email)) {
            emailError.textContent = "Please enter a valid email address.";
            emailError.classList.add("show");
            return;
        }

        registeredEmail = email;
        displayEmail.textContent = registeredEmail;

        sendOtpButton.disabled = true;
        sendOtpButton.innerHTML = "<span>Sending...</span>";

        fetch('/safehands_mvc/forgot-password/sendOtpAjax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            sendOtpButton.disabled = false;
            sendOtpButton.innerHTML = "<span>Send Verification Code</span>";

            if (data.success) {
                showStep(otpStep);
            } else {
                emailError.textContent = data.message || "An error occurred.";
                emailError.classList.add("show");
            }
        })
        .catch(error => {
            sendOtpButton.disabled = false;
            sendOtpButton.innerHTML = "<span>Send Verification Code</span>";
            emailError.textContent = "An error occurred. Please try again.";
            emailError.classList.add("show");
        });
    });

    /* =========================================
       OTP STEP
    ========================================= */

    const otpForm = document.getElementById("otpForm");
    const otpInput = document.getElementById("otp");
    const otpError = document.getElementById("otpError");
    const verifyOtpButton = otpForm.querySelector('button[type="submit"]');

    otpInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "");
        otpError.classList.remove("show");
    });

    otpForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const enteredOtp = otpInput.value.trim();
        otpError.classList.remove("show");

        if (enteredOtp.length !== 6) {
            otpError.textContent = "Please enter the 6-digit verification code.";
            otpError.classList.add("show");
            return;
        }

        verifyOtpButton.disabled = true;
        verifyOtpButton.textContent = "Verifying...";

        fetch('/safehands_mvc/forgot-password/verifyOtpAjax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: registeredEmail, otp: enteredOtp })
        })
        .then(response => response.json())
        .then(data => {
            verifyOtpButton.disabled = false;
            verifyOtpButton.textContent = "Verify Code";

            if (data.success) {
                showStep(passwordStep);
            } else {
                otpError.textContent = data.message || "The verification code is incorrect.";
                otpError.classList.add("show");
            }
        })
        .catch(error => {
            verifyOtpButton.disabled = false;
            verifyOtpButton.textContent = "Verify Code";
            otpError.textContent = "An error occurred. Please try again.";
            otpError.classList.add("show");
        });
    });

    /* =========================================
       GET NEW OTP
    ========================================= */

    const resendOtp = document.getElementById("resendOtp");
    const resendMessage = document.getElementById("resendMessage");

    resendOtp.addEventListener("click", function () {
        resendOtp.disabled = true;
        resendMessage.textContent = "Sending...";

        fetch('/safehands_mvc/forgot-password/sendOtpAjax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: registeredEmail })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                resendMessage.textContent = "A new verification code has been sent.";
                
                let countdown = 30;
                resendOtp.textContent = "Get New OTP (" + countdown + ")";

                const timer = setInterval(function () {
                    countdown--;
                    resendOtp.textContent = "Get New OTP (" + countdown + ")";

                    if (countdown <= 0) {
                        clearInterval(timer);
                        resendOtp.disabled = false;
                        resendOtp.textContent = "Get New OTP";
                        resendMessage.textContent = "";
                    }
                }, 1000);
            } else {
                resendMessage.textContent = data.message || "Failed to resend OTP.";
                resendOtp.disabled = false;
            }
        })
        .catch(error => {
            resendMessage.textContent = "An error occurred. Please try again.";
            resendOtp.disabled = false;
        });
    });

    /* =========================================
       CHANGE EMAIL (Back to Email Step)
    ========================================= */
    const backToEmail = document.getElementById("backToEmail");
    if (backToEmail) {
        backToEmail.addEventListener("click", function () {
            otpInput.value = "";
            otpError.classList.remove("show");
            resendMessage.textContent = "";
            showStep(emailStep);
        });
    }

    /* =========================================
       PASSWORD SHOW / HIDE
    ========================================= */

    const passwordToggles = document.querySelectorAll(".password-toggle");

    passwordToggles.forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const input = document.getElementById(targetId);
            const eyeOpen = this.querySelector(".eye-open");
            const eyeClosed = this.querySelector(".eye-closed");

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.style.display = "none";
                eyeClosed.style.display = "block";
                this.setAttribute("aria-label", "Hide password");
            } else {
                input.type = "password";
                eyeOpen.style.display = "block";
                eyeClosed.style.display = "none";
                this.setAttribute("aria-label", "Show password");
            }
        });
    });

    /* =========================================
       PASSWORD RESET
    ========================================= */

    const passwordForm = document.getElementById("passwordForm");
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");
    const confirmPasswordError = document.getElementById("confirmPasswordError");
    const resetPasswordButton = passwordForm.querySelector('button[type="submit"]');

    passwordForm.addEventListener("submit", function (event) {
        event.preventDefault();

        confirmPasswordError.classList.remove("show");

        if (newPassword.value.length < 8) {
            alert("Password must contain at least 8 characters.");
            return;
        }

        if (newPassword.value !== confirmPassword.value) {
            confirmPasswordError.textContent = "Passwords do not match.";
            confirmPasswordError.classList.add("show");
            return;
        }

        resetPasswordButton.disabled = true;
        resetPasswordButton.textContent = "Resetting...";

        fetch('/safehands_mvc/forgot-password/resetPasswordAjax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                email: registeredEmail, 
                otp: otpInput.value.trim(),
                newPassword: newPassword.value,
                confirmPassword: confirmPassword.value
            })
        })
        .then(response => response.json())
        .then(data => {
            resetPasswordButton.disabled = false;
            resetPasswordButton.textContent = "Reset Password";

            if (data.success) {
                showStep(successStep);
            } else {
                confirmPasswordError.textContent = data.message || "An error occurred.";
                confirmPasswordError.classList.add("show");
            }
        })
        .catch(error => {
            resetPasswordButton.disabled = false;
            resetPasswordButton.textContent = "Reset Password";
            confirmPasswordError.textContent = "An error occurred. Please try again.";
            confirmPasswordError.classList.add("show");
        });
    });

    /* =========================================
       CONFIRM PASSWORD LIVE VALIDATION
    ========================================= */

    confirmPassword.addEventListener("input", function () {
        if (this.value !== newPassword.value) {
            confirmPasswordError.textContent = "Passwords do not match.";
            confirmPasswordError.classList.add("show");
        } else {
            confirmPasswordError.classList.remove("show");
        }
    });

});