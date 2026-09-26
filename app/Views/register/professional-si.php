 <!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>වෘත්තීය තොරතුරු - SafeHands</title>

    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/professional.css?v=2">
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
                රැකියා සොයන්න
            </a>

            <a href="#">
                සම්පත්
            </a>

            <a href="#">
                අප ගැන
            </a>

            <a href="/safehands_mvc/register.php" class="active-nav">
                ලියාපදිංචි වන්න
            </a>

        </nav>

        <div class="nav-right">

            <div class="language-switcher">

                <a
                    href="/safehands_mvc/register/professional">
                    English
                </a>

                <span>|</span>

                <a
                    href="/safehands_mvc/register/professionalSi"
                    class="active-language">
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
                    ලියාපදිංචි වන්න
                </a>

                <span class="breadcrumb-arrow">›</span>

                <span class="breadcrumb-current">
                    රැකවරණ සේවා සපයන්නෙකු වන්න
                </span>

            </nav>


            <!-- Page Heading -->

            <div class="page-header">

                <h1>
                    SafeHands රැකවරණ සේවා සපයන්නෙකු වන්න
                </h1>

                <p>
                    සත්‍යාපිත රැකවරණ සේවා සපයන්නෙකු ලෙස අයදුම් කිරීමට
                    පහත පියවර සම්පූර්ණ කර අප සමඟ ඔබේ වෘත්තීය ගමන ආරම්භ කරන්න.
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
                        පුද්ගලික තොරතුරු
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- STEP 2 - ACTIVE -->

                <div class="progress-step active-step">

                    <div class="step-number">
                        2
                    </div>

                    <span>
                        වෘත්තීය තොරතුරු
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- STEP 3 - PENDING -->

                <div class="progress-step pending-step">

                    <div class="step-number">
                        3
                    </div>

                    <span>
                        සත්‍යාපනය
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
                                වෘත්තීය තොරතුරු
                            </h3>


                            <div class="form-grid">

                                <!-- Highest Qualification -->

                                <div class="form-group">

                                    <label for="highest_qualification">
                                        ඉහළම අධ්‍යාපන සුදුසුකම *
                                    </label>

                                    <select
                                        id="highest_qualification"
                                        name="highest_qualification"
                                        required>

                                        <option value="">
                                            සුදුසුකම තෝරන්න
                                        </option>

                                        <option value="Diploma in Nursing">
                                            හෙද ඩිප්ලෝමාව
                                        </option>

                                        <option value="BSc Nursing">
                                            හෙද BSc උපාධිය
                                        </option>

                                        <option value="Caregiving Certificate">
                                            රැකවරණ සේවා සහතිකය
                                        </option>

                                        <option value="Other">
                                            වෙනත්
                                        </option>

                                    </select>

                                </div>


                                <!-- Years of Experience -->

                                <div class="form-group">

                                    <label for="years_experience">
                                        සේවා පළපුරුද්ද (වසර) *
                                    </label>

                                    <input
                                        id="years_experience"
                                        type="number"
                                        name="years_experience"
                                        min="0"
                                        placeholder="උදා. 5"
                                        required>

                                </div>


                                <!-- Professional Certifications -->

                                <div class="form-group">

                                    <label for="professional_certification">
                                        වෘත්තීය සහතික *
                                    </label>

                                    <input
                                        id="professional_certification"
                                        type="text"
                                        name="professional_certification"
                                        placeholder="උදා. CPR, First Aid"
                                        required>

                                </div>


                                <!-- Languages -->

                                <div class="form-group">

                                    <label for="languages">
                                        කතා කරන භාෂා *
                                    </label>

                                    <input
                                        id="languages"
                                        type="text"
                                        name="languages"
                                        placeholder="උදා. English, Sinhala"
                                        required>

                                </div>


                                <!-- Service Areas -->

                                <div class="form-group">

                                    <label for="service_areas">
                                        සේවා ප්‍රදේශ / දිස්ත්‍රික්ක *
                                    </label>

                                    <input
                                        id="service_areas"
                                        type="text"
                                        name="service_areas"
                                        placeholder="උදා. කොළඹ, ගම්පහ"
                                        required>

                                </div>


                                <!-- Expected Daily Rate -->

                                <div class="form-group">

                                    <label for="daily_rate">
                                        අපේක්ෂිත දෛනික ගාස්තුව (විකල්ප)
                                    </label>

                                    <input
                                        id="daily_rate"
                                        type="text"
                                        name="daily_rate"
                                        placeholder="උදා. රු. 5,000">

                                </div>


                                <!-- Biography -->

                                <div class="form-group full-width">

                                    <label for="biography">
                                        කෙටි වෘත්තීය හැඳින්වීම *
                                    </label>

                                    <textarea
                                        id="biography"
                                        name="biography"
                                        rows="4"
                                        placeholder="ඔබගේ පළපුරුද්ද සහ රැකවරණ සේවය පිළිබඳ උනන්දුව ගැන අපට කියන්න..."
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
                                පැතිකඩ ඡායාරූපය
                            </h3>


                            <div class="upload-area">

                                <span class="upload-icon">☁</span>

                                <div class="upload-text">

                                    <p>
                                        උඩුගත කිරීමට ක්ලික් කරන්න හෝ ඇද දමන්න
                                    </p>

                                    <p>
                                        PNG, JPG හෝ GIF (උපරිම 2MB)
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

                                    ගොනුව තෝරන්න

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
                                href="/safehands_mvc/register/caregiverSi"
                                class="back-button">

                                <span>←</span>
                                ආපසු

                            </a>


                            <!-- SAVE & CONTINUE -->

                            <button
                                type="submit"
                                class="save-button">

                                සුරකින්න සහ ඉදිරියට යන්න

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
                        SafeHands සමඟ එක්වන්නේ ඇයි?
                    </h4>


                    <ul>

                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                සෘජු බැංකු මාරු කිරීම් සමඟ තරඟකාරී ගෙවීම්.
                            </span>
                        </li>


                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහනක්.
                            </span>
                        </li>


                        <li>
                            <span class="check-icon">✓</span>
                            <span>
                                අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු මොඩියුල වෙත ප්‍රවේශය.
                            </span>
                        </li>

                    </ul>

                </div>


                <div class="why-image">

                    <img
                        alt="වෘත්තීය රැකවරණ සේවා සපයන්නෙක්"
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
                සියලුම හිමිකම් ඇවිරිණි.
            </p>

        </div>


        <div class="footer-links">

            <a href="#">
                රහස්‍යතා ප්‍රතිපත්තිය
            </a>

            <a href="#">
                සේවා කොන්දේසි
            </a>

            <a href="#">
                උපකාරක මධ්‍යස්ථානය
            </a>

            <a href="#">
                සහාය අමතන්න
            </a>

        </div>

    </footer>


    <script src="/safehands_mvc/public/assets/js/professional.js"></script>

</body>
</html>
