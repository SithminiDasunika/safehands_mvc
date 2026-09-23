<header class="top-navbar">

    <div class="navbar-container">

        <a
            href="/safehands_mvc/"
            class="logo"
        >
            SafeHands
        </a>


        <nav class="main-navigation">

            <a href="/safehands_mvc/">
                Home
            </a>

            <a href="/safehands_mvc/#about">
                About
            </a>

            <a href="/safehands_mvc/#services">
                Services
            </a>

            <a href="/safehands_mvc/caregivers">
                Find Caregivers
            </a>

            <a href="/safehands_mvc/#contact">
                Contact
            </a>

        </nav>


        <div class="navigation-actions">

            <a
                href="/safehands_mvc/login"
                class="login-link"
            >
                Login
            </a>

            <a
                href="/safehands_mvc/register"
                class="register-button"
            >
                Register
            </a>

        </div>

    </div>

</header>



<main class="forgot-main">


    <!-- =================================
         LEFT SIDE
    ================================== -->

    <section class="forgot-visual">

        <div class="forgot-image"></div>

        <div class="image-overlay">

            <div class="glass-card">

                <div class="lock-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <rect
                            x="4"
                            y="10"
                            width="16"
                            height="11"
                            rx="2"
                        ></rect>

                        <path
                            d="M8 10V7a4 4 0 0 1 8 0v3"
                        ></path>

                    </svg>

                </div>


                <h2>
                    Forgot Your Password?
                </h2>


                <p>
                    We'll help you securely recover
                    your SafeHands account.
                </p>

            </div>

        </div>

    </section>



    <!-- =================================
         RIGHT SIDE
    ================================== -->

    <section class="forgot-form-section">

        <div class="forgot-card">


            <!-- =================================
                 STEP 1 - EMAIL
            ================================== -->

            <div
                class="reset-step active"
                id="emailStep"
            >

                <div class="form-heading">

                    <h1>
                        Reset Your Password
                    </h1>

                    <p>
                        Enter your registered email address
                        to receive a verification code.
                    </p>

                </div>


                <form id="emailForm">

                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="name@example.com"
                            autocomplete="email"
                            required
                        >

                        <p
                            class="field-error"
                            id="emailError"
                        >
                            Please enter a valid email address.
                        </p>

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                        id="sendOtpButton"
                    >

                        <span>
                            Send Verification Code
                        </span>

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >

                            <path d="M22 2L11 13"></path>

                            <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>

                        </svg>

                    </button>

                </form>


                <div class="back-login">

                    <a href="/safehands_mvc/login">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >

                            <path d="M19 12H5"></path>

                            <path d="M12 19L5 12L12 5"></path>

                        </svg>

                        Back to Login

                    </a>

                </div>

            </div>



            <!-- =================================
                 STEP 2 - OTP
            ================================== -->

            <div
                class="reset-step"
                id="otpStep"
            >

                <div class="form-heading">

                    <h1>
                        Verify Your Email
                    </h1>

                    <p>
                        Enter the verification code sent
                        to your email address.
                    </p>

                </div>


                <div class="email-display">

                    <span id="displayEmail">
                        name@example.com
                    </span>

                </div>


                <form id="otpForm">

                    <div class="form-group">

                        <label for="otp">
                            Verification Code
                        </label>

                        <input
                            type="text"
                            id="otp"
                            name="otp"
                            class="otp-input"
                            placeholder="Enter 6-digit code"
                            maxlength="6"
                            inputmode="numeric"
                            autocomplete="one-time-code"
                            required
                        >

                        <p
                            class="field-error"
                            id="otpError"
                        >
                            Please enter the correct verification code.
                        </p>

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                    >
                        Verify Code
                    </button>

                </form>


                <div class="resend-section">

                    <span>
                        Didn't receive the code?
                    </span>

                    <button
                        type="button"
                        id="resendOtp"
                        class="resend-button"
                    >
                        Get New OTP
                    </button>

                </div>


                <div
                    class="resend-message"
                    id="resendMessage"
                ></div>


                

            </div>



            <!-- =================================
                 STEP 3 - NEW PASSWORD
            ================================== -->

            <div
                class="reset-step"
                id="passwordStep"
            >

                <div class="form-heading">

                    <h1>
                        Create New Password
                    </h1>

                    <p>
                        Create a strong password for your
                        SafeHands account.
                    </p>

                </div>


                <form id="passwordForm">


                    <!-- NEW PASSWORD -->

                    <div class="form-group">

                        <label for="newPassword">
                            New Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                type="password"
                                id="newPassword"
                                name="newPassword"
                                placeholder="Enter new password"
                                minlength="8"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="newPassword"
                                aria-label="Show password"
                            >

                                <svg
                                    class="eye-open"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >

                                    <path
                                        d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"
                                    ></path>

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="2.5"
                                    ></circle>

                                </svg>

                                <svg
                                    class="eye-closed"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    style="display:none;"
                                >

                                    <path
                                        d="M3 3L21 21"
                                    ></path>

                                    <path
                                        d="M10.6 10.6a2 2 0 0 0 2.8 2.8"
                                    ></path>

                                    <path
                                        d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.5 0 10 7 10 7a17.8 17.8 0 0 1-3.1 3.8"
                                    ></path>

                                    <path
                                        d="M6.2 6.2C3.6 8 2 12 2 12s3.5 7 10 7c1.4 0 2.7-.3 3.8-.8"
                                    ></path>

                                </svg>

                            </button>

                        </div>

                        <p class="password-hint">
                            Password must contain at least 8 characters.
                        </p>

                    </div>



                    <!-- CONFIRM PASSWORD -->

                    <div class="form-group">

                        <label for="confirmPassword">
                            Confirm Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                type="password"
                                id="confirmPassword"
                                name="confirmPassword"
                                placeholder="Re-enter new password"
                                minlength="8"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="confirmPassword"
                                aria-label="Show password"
                            >

                                <svg
                                    class="eye-open"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >

                                    <path
                                        d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"
                                    ></path>

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="2.5"
                                    ></circle>

                                </svg>

                                <svg
                                    class="eye-closed"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    style="display:none;"
                                >

                                    <path d="M3 3L21 21"></path>

                                    <path
                                        d="M10.6 10.6a2 2 0 0 0 2.8 2.8"
                                    ></path>

                                    <path
                                        d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.5 0 10 7 10 7a17.8 17.8 0 0 1-3.1 3.8"
                                    ></path>

                                    <path
                                        d="M6.2 6.2C3.6 8 2 12 2 12s3.5 7 10 7c1.4 0 2.7-.3 3.8-.8"
                                    ></path>

                                </svg>

                            </button>

                        </div>

                        <p
                            class="field-error"
                            id="confirmPasswordError"
                        >
                            Passwords do not match.
                        </p>

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                    >
                        Reset Password
                    </button>

                </form>

            </div>



            <!-- =================================
                 STEP 4 - SUCCESS
            ================================== -->

            <div
                class="reset-step success-step"
                id="successStep"
            >

                <div class="success-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            d="M20 6L9 17L4 12"
                        ></path>

                    </svg>

                </div>


                <h1>
                    Password Reset Successfully
                </h1>


                <p>
                    Your password has been updated
                    successfully. You can now log in
                    using your new password.
                </p>


                <a
                    href="/safehands_mvc/login"
                    class="primary-button success-login-button"
                >
                    Return to Login
                </a>

            </div>



            <!-- =================================
                 SECURITY FOOTER
            ================================== -->

            <div class="security-footer">

                <div class="security-icons">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>


                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <rect
                            x="4"
                            y="10"
                            width="16"
                            height="11"
                            rx="2"
                        ></rect>

                        <path
                            d="M8 10V7a4 4 0 0 1 8 0v3"
                        ></path>

                    </svg>


                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path d="M12 2L4 5v6c0 5 3.4 9.4 8 11 4.6-1.6 8-6 8-11V5l-8-3Z"></path>
                    </svg>

                </div>


                <p>
                    Secure SafeHands account recovery
                </p>

            </div>

        </div>

    </section>

</main>



<footer class="footer">

    <div class="footer-container">

        <div>

            <span class="footer-logo">
                SafeHands
            </span>

            <p>
                © 2024 SafeHands Healthcare.
                All rights reserved.
            </p>

        </div>


        <nav>

            <a href="#">
                Privacy Policy
            </a>

            <a href="#">
                Terms of Service
            </a>

            <a href="#">
                Cookie Policy
            </a>

            <a href="#">
                Accessibility
            </a>

        </nav>

    </div>

</footer>