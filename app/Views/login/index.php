<!-- ================================
     TOP NAVIGATION
================================ -->

<header class="top-navbar">

    <div class="navbar-container">

        <!-- Logo -->

        <a
            href="/safehands_mvc/"
            class="logo"
        >
            SafeHands
        </a>


        <!-- Navigation -->

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


        <!-- Right side -->

        <div class="navigation-actions">

            <a
                href="/safehands_mvc/login"
                class="login-active"
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



<!-- ================================
     MAIN
================================ -->

<main class="login-main">


    <!-- ================================
         LEFT SIDE
    ================================= -->

    <section class="login-visual">

        <img
            src="/safehands_mvc/public/assets/images/login-caregiver.jpg"
            alt="Caregiver helping elderly person"
            class="login-image"
        >


        <!-- Image overlay -->

        <div class="image-overlay"></div>


        <!-- Welcome card -->

        <div class="welcome-container">

            <div class="glass-card">

                <h1>
                    Welcome Back to SafeHands
                </h1>

                <p>
                    Sign in to manage caregiving services,
                    bookings, and care updates for your loved
                    ones or your professional practice.
                </p>


                <div class="trusted-section">


                    <div class="avatar-group">

                        <div class="avatar avatar-one">
                            ♙
                        </div>

                        <div class="avatar avatar-two">
                            ✚
                        </div>

                        <div class="avatar avatar-three">
                            ♡
                        </div>

                    </div>


                    <p>
                        Trusted by 5,000+ Families
                    </p>

                </div>

            </div>

        </div>

    </section>



    <!-- ================================
         RIGHT SIDE
    ================================= -->

    <section class="login-form-section">

        <div class="login-card">


            <!-- Heading -->

            <div class="login-heading">

                <h2>
                    Welcome Back
                </h2>

                <p>
                    Sign in to your SafeHands account.
                </p>

            </div>



            <!-- LOGIN FORM -->
            
            <?php if (!empty($errors)): ?>
                <div class="form-errors" style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                    <?php foreach ($errors as $error): ?>
                        <p style="margin: 0; font-size: 14px;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form
                id="loginForm"
                class="login-form"
                action="/safehands_mvc/login"
                method="POST"
            >


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ✉
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="care@safehands.com"
                            required
                        >

                    </div>

                    <p
                        class="error-message"
                        id="emailError"
                    >
                        Invalid email format.
                    </p>

                </div>



                <!-- PASSWORD -->
                <div class="form-group">

<label for="password">
    Password
</label>

<div class="password-input-wrapper">

    <!-- Lock Icon -->
    <span class="password-icon" aria-hidden="true">
        <svg
            viewBox="0 0 24 24"
            width="19"
            height="19"
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
    </span>


    <input
        type="password"
        id="password"
        name="password"
        placeholder="Enter your password"
        required
    >


    <!-- Show / Hide Password -->
    <button
        type="button"
        class="password-toggle"
        id="passwordToggle"
        aria-label="Show password"
    >

        <svg
            id="eyeOpen"
            viewBox="0 0 24 24"
            width="19"
            height="19"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path
                d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"
            ></path>

            <circle
                cx="12"
                cy="12"
                r="2.5"
            ></circle>
        </svg>


        <svg
            id="eyeClosed"
            viewBox="0 0 24 24"
            width="19"
            height="19"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            style="display: none;"
        >
            <path
                d="M3 3l18 18"
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

<p
    class="error-message"
    id="passwordError"
>
    Incorrect password.
</p>

</div>
                



                <!-- OPTIONS -->

                <div class="options-row">


                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Remember Me
                        </span>

                    </label>


                    <button
                        type="button"
                        class="forgot-button"
                        id="forgotPasswordButton"
                    >
                    <a
    href="/safehands_mvc/forgot-password"
    class="forgot-button"
>
    Forgot Password?
</a>
                    </button>

                </div>



                <!-- STATUS -->

                <div
                    class="status-container"
                    id="statusContainer"
                >
                </div>



                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-submit"
                >
                    Login
                </button>



                <!-- DIVIDER -->

                <div class="divider">

                    <span></span>

                    <p>OR</p>

                    <span></span>

                </div>



                <!-- REGISTER -->

                <p class="register-text">

                    Don't have an account?

                    <a href="/safehands_mvc/register">
                        Register Now
                    </a>

                </p>

            </form>

        </div>

    </section>

</main>

