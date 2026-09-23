<!-- TOP NAVIGATION -->
<header class="top-navbar">

    <nav class="navbar">

        <!-- Logo -->
        <a href="/safehands_mvc/" class="logo">
            SafeHands
        </a>


        <!-- Navigation -->
        <div class="nav-links">

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

        </div>


        <!-- Right buttons -->
        <div class="nav-actions">

            <a
                href="/safehands_mvc/login"
                class="login-link"
            >
                Login
            </a>

            <a
                href="/safehands_mvc/register"
                class="register-link"
            >
                Register
            </a>

        </div>

    </nav>

</header>


<!-- MAIN -->
<main class="family-main">


    <!-- LEFT SIDE : FORM -->
    <section class="family-form-section">

        <div class="family-form-wrapper">


            <!-- Breadcrumb -->
            <nav class="breadcrumb">

                <a href="/safehands_mvc/register">
                    Register
                </a>

                <span>›</span>

                <span class="active">
                    Family Member
                </span>

            </nav>


            <!-- Heading -->
            <h1>
                Create Your Family Member Account
            </h1>


            <p class="page-description">
                Create your account to find trusted caregivers,
                manage patient profiles, book caregiving services,
                and receive daily care updates.
            </p>


            <!-- FORM CARD -->
            <div class="form-card">

                <form
                    action="/safehands_mvc/register/family"
                    method="POST"
                >


                    <!-- FULL NAME -->
                    <div class="form-group">

                        <label for="full_name">
                            Full Name *
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>


                    <!-- NIC + PHONE -->
                    <div class="two-column">


                        <!-- NIC -->
                        <div class="form-group">

                            <label for="nic">
                                National Identity Card (NIC) *
                            </label>

                            <input
                                type="text"
                                id="nic"
                                name="nic"
                                placeholder="Enter your NIC"
                                required
                            >

                        </div>


                        <!-- PHONE -->
                        <div class="form-group">

                            <label for="phone">
                                Phone Number *
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="+94 77 123 4567"
                                required
                            >

                        </div>

                    </div>


                    <!-- EMAIL -->
                    <div class="form-group">

                        <label for="email">
                            Email Address *
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email address"
                            required
                        >

                    </div>


                    <!-- HOME ADDRESS -->
                    <div class="form-group">

                        <label for="address">
                            Home Address *
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            placeholder="Street name, City, Zip code"
                            required
                        >

                    </div>


                    <!-- PASSWORD + CONFIRM PASSWORD -->
                    <div class="two-column">


                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label for="password">
                                Password *
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter password"
                                minlength="8"
                                required
                            >

                            <p class="input-help">
                                Password must contain at least 8 characters.
                            </p>

                        </div>


                        <!-- CONFIRM PASSWORD -->
                        <div class="form-group">

                            <label for="confirm_password">
                                Confirm Password *
                            </label>

                            <input
                                type="password"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="Re-enter password"
                                minlength="8"
                                required
                            >

                        </div>

                    </div>


                    <!-- TERMS -->
                    <div class="terms">

                        <input
                            type="checkbox"
                            id="terms"
                            name="terms"
                            required
                        >

                        <label for="terms">

                            I agree to the

                            <a href="#">
                                Terms & Conditions
                            </a>

                            and

                            <a href="#">
                                Privacy Policy
                            </a>.

                        </label>

                    </div>


                    <!-- SUBMIT -->
                    <div class="submit-section">

                        <button
                            type="submit"
                            class="create-account-button"
                        >
                            Create Account
                        </button>


                        <p class="login-text">

                            Already have an account?

                            <a href="/safehands_mvc/login">
                                Login
                            </a>

                        </p>

                    </div>


                </form>

            </div>

        </div>

    </section>



    <!-- RIGHT SIDE : IMAGE -->
    <section class="family-image-section">


        <!-- Image -->
        <img
            src="/safehands_mvc/public/assets/images/caregiver.jpg"
            alt="Caregiver helping senior"
            class="family-image"
        >


        <!-- Overlay -->
        <div class="image-overlay"></div>


        <!-- Quote -->
        <div class="quote-container">

            <div class="quote-card">

                <div class="quote-symbol">
                    "
                </div>

                <p class="quote-text">
                    "Finding trusted care for your loved ones
                    has never been easier."
                </p>


                <div class="certified-section">

                    <div class="verified-icon">
                        ✓
                    </div>

                    <div>

                        <p class="certified-title">
                            SafeHands Certified
                        </p>

                        <p class="certified-subtitle">
                            Trusted by 10,000+ families
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<!-- FOOTER -->
<footer class="family-footer">

    <div class="footer-grid">


        <!-- Brand -->
        <div class="footer-brand">

            <h3>
                SafeHands
            </h3>

            <p>
                Professional healthcare SaaS providing
                clinical-grade care solutions for families
                and institutions.
            </p>

        </div>


        <!-- Quick Links -->
        <div class="footer-column">

            <h4>
                Quick Links
            </h4>

            <a href="/safehands_mvc/#services">
                Services
            </a>

            <a href="/safehands_mvc/caregivers">
                Find Caregivers
            </a>

            <a href="/safehands_mvc/#contact">
                Contact Support
            </a>

        </div>


        <!-- Legal -->
        <div class="footer-column">

            <h4>
                Legal
            </h4>

            <a href="#">
                Privacy Policy
            </a>

            <a href="#">
                Terms of Service
            </a>

            <a href="#">
                Cookie Settings
            </a>

        </div>


        <!-- Social -->
        <div class="footer-column">

            <h4>
                Social
            </h4>

            <div class="social-links">

                <a href="#">
                    f
                </a>

                <a href="#">
                    ◎
                </a>

                <a href="#">
                    💬
                </a>

            </div>

            <p class="copyright">
                © 2024 SafeHands. All rights reserved.
            </p>

        </div>

    </div>

</footer>