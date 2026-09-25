  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Professional Information - SafeHands</title>

    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/professional.css">
</head>

<body>

    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <header class="site-header">

        <div class="logo">
            SafeHands
        </div>

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

            <a href="/safehands_mvc/register.php" class="active-nav">
                Register
            </a>

        </nav>

        <div class="nav-right">

            <div class="language-switcher">

                <a
                    href="/safehands_mvc/register/professional"
                    class="active-language">
                    English
                </a>

                <span>|</span>

                <a
                    href="/safehands_mvc/register/professionalSi">
                    සිංහල
                </a>

            </div>

            <a
                href="/safehands_mvc/login/login.php"
                class="login-button">
                Login
            </a>

        </div>

    </header>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content">

        <div class="content-container">

            <!-- Breadcrumb -->

            <nav class="breadcrumb">

                <a href="/safehands_mvc/register.php">
                    Register
                </a>

                <span class="breadcrumb-arrow">›</span>

                <span class="breadcrumb-current">
                    Become a Caregiver
                </span>

            </nav>


            <!-- Page Heading -->

            <div class="page-header">

                <h1>
                    Become a SafeHands Caregiver
                </h1>

                <p>
                    Complete the following steps to apply as a verified caregiver
                    and start your professional journey with us.
                </p>

            </div>


            <!-- =================================================
                 STEP INDICATOR
            ================================================== -->

            <div class="step-indicator">

                <!-- STEP 1 - COMPLETED -->

                <div class="progress-step completed-step">

                    <div class="step-number">
                        ✓
                    </div>

                    <span>
                        Personal Info
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- STEP 2 - ACTIVE -->

                <div class="progress-step active-step">

                    <div class="step-number">
                        2
                    </div>

                    <span>
                        Professional Info
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- STEP 3 - PENDING -->

                <div class="progress-step pending-step">

                    <div class="step-number">
                        3
                    </div>

                    <span>
                        Verification
                    </span>

                </div>

            </div>


            <!-- =================================================
                 FORM CARD
            ================================================== -->

            <div class="form-card">

                <div class="form-card-content">

                    <?php if (!empty($errors)): ?>
                        <div class="form-errors">
                            <?php foreach ($errors as $error): ?>
                                <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form
                        action="/safehands_mvc/register/saveProfessional"
                        method="POST"
                        enctype="multipart/form-data"
                        class="professional-form">


                        <!-- =================================================
                             PROFESSIONAL DETAILS
                        ================================================== -->

                        <div class="form-section">

                            <h3 class="section-title">
                                <span class="section-icon">💼</span>
                                Professional Details
                            </h3>


                            <div class="form-grid">

                                <!-- Highest Qualification -->

                                <div class="form-group">

                                    <label for="highest_qualification">
                                        Highest Qualification *
                                    </label>

                                    <select
                                        id="highest_qualification"
                                        name="highest_qualification"
                                        required>

                                        <option value="">
                                            Select Qualification
                                        </option>

                                        <option value="Diploma in Nursing">
                                            Diploma in Nursing
                                        </option>

                                        <option value="BSc Nursing">
                                            BSc Nursing
                                        </option>

                                        <option value="Caregiving Certificate">
                                            Caregiving Certificate
                                        </option>

                                        <option value="Other">
                                            Other
                                        </option>

                                    </select>

                                </div>


                                <!-- Years of Experience -->

                                <div class="form-group">

                                    <label for="years_experience">
                                        Years of Experience *
                                    </label>

                                    <input
                                        id="years_experience"
                                        type="number"
                                        name="years_experience"
                                        min="0"
                                        placeholder="e.g. 5"
                                        required>

                                </div>


                                <!-- Professional Certifications -->

                                <div class="form-group">

                                    <label for="professional_certification">
                                        Professional Certifications *
                                    </label>

                                    <input
                                        id="professional_certification"
                                        type="text"
                                        name="professional_certification"
                                        placeholder="e.g. CPR, First Aid"
                                        required>

                                </div>


                                <!-- Languages -->

                                <div class="form-group">

                                    <label for="languages">
                                        Languages Spoken *
                                    </label>

                                    <input
                                        id="languages"
                                        type="text"
                                        name="languages"
                                        placeholder="e.g. English, Sinhala"
                                        required>

                                </div>


                                <!-- Service Areas -->

                                <div class="form-group">

                                    <label for="service_areas">
                                        Service Areas / Districts *
                                    </label>

                                    <input
                                        id="service_areas"
                                        type="text"
                                        name="service_areas"
                                        placeholder="e.g. Colombo, Gampaha"
                                        required>

                                </div>


                                <!-- Expected Daily Rate -->

                                <div class="form-group">

                                    <label for="daily_rate">
                                        Expected Daily Rate (Optional)
                                    </label>

                                    <input
                                        id="daily_rate"
                                        type="text"
                                        name="daily_rate"
                                        placeholder="e.g. Rs. 5,000">

                                </div>


                                <!-- Biography -->

                                <div class="form-group full-width">

                                    <label for="biography">
                                        Short Professional Biography *
                                    </label>

                                    <textarea
                                        id="biography"
                                        name="biography"
                                        rows="4"
                                        placeholder="Tell us about your experience and passion for caregiving..."
                                        required></textarea>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             PROFILE PHOTO
                        ================================================== -->

                        <div class="form-section photo-section">

                            <h3 class="section-title">
                                <span class="section-icon">◉</span>
                                Profile Photo
                            </h3>


                            <div class="upload-area">

                                <span class="upload-icon">☁</span>

                                <div class="upload-text">

                                    <p>
                                        Click to upload or drag and drop
                                    </p>

                                    <p>
                                        PNG, JPG or GIF (max. 2MB)
                                    </p>

                                </div>


                                <input
                                    type="file"
                                    name="profile_photo"
                                    id="profile-photo-upload"
                                    class="file-input"
                                    accept="image/png,image/jpeg,image/gif,image/webp">


                                <button
                                    type="button"
                                    class="select-file-button"
                                    id="select-file-button">

                                    Select File

                                </button>


                                <p
                                    id="selected-file-name"
                                    class="selected-file-name hidden">
                                </p>

                            </div>

                        </div>


                        <!-- =================================================
                             ACTION BUTTONS
                        ================================================== -->

                        <div class="form-actions">

                            <!-- BACK -->

                            <a
                                href="/safehands_mvc/register/caregiver"
                                class="back-button">

                                <span>←</span>
                                Back

                            </a>


                            <!-- SAVE & CONTINUE -->

                            <button
                                type="submit"
                                class="save-button">

                                Save &amp; Continue

                                <span>→</span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- =================================================
                 WHY JOIN SAFEHANDS
            ================================================== -->

            <div class="why-safehands">

                <div class="why-content">

                    <h4>
                        Why join SafeHands?
                    </h4>


                    <ul>

                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                Competitive pay with direct bank transfers.
                            </span>
                        </li>


                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                Flexible schedule that fits your lifestyle.
                            </span>
                        </li>


                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                Access to continuous healthcare training modules.
                            </span>
                        </li>

                    </ul>

                </div>


                <div class="why-image">

                    <img
                        alt="Professional caregiver"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDIzMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc">

                </div>

            </div>

        </div>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="site-footer">

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

    </footer>


    <script src="/safehands_mvc/public/assets/js/professional.js"></script>

</body>
</html>
