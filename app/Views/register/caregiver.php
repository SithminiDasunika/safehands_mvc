 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - SafeHands Caregiver</title>

    <!-- Normal CSS only -->
    <link rel="stylesheet"
          href="/safehands_mvc/public/assets/css/caregiver.css">
</head>

<body>

    <!-- =========================
         TOP NAVIGATION
    ========================== -->

    <header class="site-header">

        <div class="nav-container">

            <!-- Logo -->
            <div class="logo">
                SafeHands
            </div>

            <!-- Navigation -->
            <nav class="main-navigation">

                <a href="#">
                    Find Jobs
                </a>

                <a href="#">
                    Resources
                </a>

                <a href="#">
                    About Us
                </a>

                <a href="/safehands_mvc/register.php" class="active">
                    Register
                </a>

            </nav>

            <!-- Right Side -->
            <div class="nav-right">

                <!-- Language Switcher -->
                <div class="language-switcher">

                    <a href="/safehands_mvc/register/caregiver"
                       class="active-language">
                        English
                    </a>

                    <span>|</span>

                    <a href="/safehands_mvc/register/caregiverSi">
                        සිංහල
                    </a>

                </div>

                <!-- Login -->
                <a href="/safehands_mvc/login/login.php"
                   class="login-link">
                    Login
                </a>

            </div>

        </div>

    </header>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main-content">

        <div class="content-container">

            <!-- Breadcrumb -->
            <nav class="breadcrumb">

                <a href="/safehands_mvc/register.php">
                    Register
                </a>

                <span class="breadcrumb-arrow">
                    ›
                </span>

                <span class="breadcrumb-current">
                    Become a Caregiver
                </span>

            </nav>


            <!-- Page Header -->
            <div class="page-header">

                <h1>
                    Become a SafeHands Caregiver
                </h1>

                <p>
                    Complete the following steps to apply as a verified caregiver
                    and start your professional journey with us.
                </p>

            </div>


            <!-- =========================
                 PROGRESS INDICATOR
            ========================== -->

            <div class="progress-container">

                <!-- Step 1 -->
                <div class="progress-step active-step">

                    <div class="step-number">
                        1
                    </div>

                    <span>
                        Personal Info
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- Step 2 -->
                <div class="progress-step inactive-step">

                    <div class="step-number">
                        2
                    </div>

                    <span>
                        Professional Info
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- Step 3 -->
                <div class="progress-step inactive-step">

                    <div class="step-number">
                        3
                    </div>

                    <span>
                        Verification
                    </span>

                </div>

            </div>


            <!-- =========================
                 REGISTRATION FORM
            ========================== -->

            <div class="registration-card">

                <div class="registration-content">

                    <form
                        action="/safehands_mvc/register/professional.php"
                        method="GET"
                        class="registration-form">


                        <!-- Personal Details -->
                        <section class="form-section">

                            <h3 class="section-title">

                                <span class="section-icon">
                                    👤
                                </span>

                                Personal Details

                            </h3>


                            <div class="form-grid">

                                <!-- Full Name -->
                                <div class="form-group">

                                    <label>
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="e.g. Anjali Perera">

                                </div>


                                <!-- NIC -->
                                <div class="form-group">

                                    <label>
                                        NIC Number
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="9xxxxxxxxV">

                                </div>


                                <!-- Date of Birth -->
                                <div class="form-group">

                                    <label>
                                        Date of Birth
                                    </label>

                                    <input type="date">

                                </div>


                                <!-- Gender -->
                                <div class="form-group">

                                    <label>
                                        Gender
                                    </label>

                                    <select>

                                        <option value="">
                                            Select Gender
                                        </option>

                                        <option value="male">
                                            Male
                                        </option>

                                        <option value="female">
                                            Female
                                        </option>

                                        <option value="other">
                                            Other
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </section>


                        <!-- Contact & Location -->
                        <section class="form-section separated-section">

                            <h3 class="section-title">

                                <span class="section-icon">
                                    🏠
                                </span>

                                Contact &amp; Address

                            </h3>


                            <div class="form-grid">

                                <!-- Phone -->
                                <div class="form-group">

                                    <label>
                                        Phone Number
                                    </label>

                                    <input
                                        type="tel"
                                        placeholder="+94 7x xxx xxxx">

                                </div>


                                <!-- Email -->
                                <div class="form-group">

                                    <label>
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        placeholder="anjali@example.com">

                                </div>


                                <!-- Address -->
                                <div class="form-group full-width">

                                    <label>
                                        Home Address
                                    </label>

                                    <textarea
                                        rows="2"
                                        placeholder="Street name, City, Zip Code"></textarea>

                                </div>


                                <!-- District -->
                                <div class="form-group">

                                    <label>
                                        District
                                    </label>

                                    <select>

                                        <option value="">
                                            Select District
                                        </option>

                                        <option value="colombo">
                                            Colombo
                                        </option>

                                        <option value="gampaha">
                                            Gampaha
                                        </option>

                                        <option value="kandy">
                                            Kandy
                                        </option>

                                        <option value="galle">
                                            Galle
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </section>


                        <!-- Account Security -->
                        <section class="form-section separated-section">

                            <h3 class="section-title">

                                <span class="section-icon">
                                    🔒
                                </span>

                                Account Security

                            </h3>


                            <div class="form-grid">

                                <!-- Password -->
                                <div class="form-group">

                                    <label>
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        placeholder="Min. 8 characters">

                                </div>


                                <!-- Confirm Password -->
                                <div class="form-group">

                                    <label>
                                        Confirm Password
                                    </label>

                                    <input
                                        type="password"
                                        placeholder="Repeat your password">

                                </div>

                            </div>

                        </section>


                        <!-- Action Buttons -->
                        <div class="form-actions">

                            <button
                                class="cancel-button"
                                type="button">

                                Cancel

                            </button>

 <button
    type="button"
    onclick="window.location.href='/safehands_mvc/register/professional'"
    class="next-button">
    Next
</button>
                        </div>

                    </form>

                </div>

            </div>


            <!-- =========================
                 WHY JOIN SAFEHANDS
            ========================== -->

            <div class="why-safehands">

                <div class="why-content">

                    <h4>
                        Why join SafeHands?
                    </h4>


                    <ul>

                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                Competitive pay with direct bank transfers.
                            </span>

                        </li>


                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                Flexible schedule that fits your lifestyle.
                            </span>

                        </li>


                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                Access to continuous healthcare training modules.
                            </span>

                        </li>

                    </ul>

                </div>


                <div class="why-image">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDizMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc"
                        alt="A professional caregiver in a healthcare setting.">

                </div>

            </div>

        </div>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="site-footer">

        <div class="footer-container">

            <div class="footer-brand">

                <span>
                    SafeHands
                </span>

                <p>
                    © 2024 SafeHands Healthcare Services.
                    All rights reserved.
                </p>

            </div>


            <div class="footer-links">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Help Center
                </a>

                <a href="#">
                    Contact Support
                </a>

            </div>

        </div>

    </footer>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        const inputs =
            document.querySelectorAll(
                'input, select, textarea'
            );

        inputs.forEach(function (input) {

            input.addEventListener('focus', function () {

                const label =
                    this.parentElement.querySelector('label');

                if (label) {
                    label.classList.add('label-focused');
                }

            });


            input.addEventListener('blur', function () {

                const label =
                    this.parentElement.querySelector('label');

                if (label) {
                    label.classList.remove('label-focused');
                }

            });

        });

    </script>
<script src="/safehands_mvc/public/assets/js/caregiver.js"></script>
</body>

</html>