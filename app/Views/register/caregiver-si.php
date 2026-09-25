 <!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ලියාපදිංචි වන්න - SafeHands රැකවරණ සේවක</title>

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
                    රැකියා සොයන්න
                </a>

                <a href="#">
                    සම්පත්
                </a>

                <a href="#">
                    අප ගැන
                </a>

                <a href="/safehands_mvc/register.php" class="active">
                    ලියාපදිංචි වන්න
                </a>

            </nav>

            <!-- Right Side -->
            <div class="nav-right">

                <!-- Language Switcher -->
                <div class="language-switcher">

                    <a href="/safehands_mvc/register/caregiver">
                        English
                    </a>

                    <span>|</span>

                    <a href="/safehands_mvc/register/caregiverSi"
                       class="active-language">
                        සිංහල
                    </a>

                </div>

                <!-- Login -->
                <a href="/safehands_mvc/login/login.php"
                   class="login-link">
                    ඇතුල් වන්න
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
                    ලියාපදිංචි වන්න
                </a>

                <span class="breadcrumb-arrow">
                    ›
                </span>

                <span class="breadcrumb-current">
                    රැකවරණ සේවකයෙකු වන්න
                </span>

            </nav>


            <!-- Page Header -->
            <div class="page-header">

                <h1>
                    SafeHands රැකවරණ සේවකයෙකු වන්න
                </h1>

                <p>
                    සත්‍යාපිත රැකවරණ සේවකයෙකු ලෙස අයදුම් කිරීමට සහ
                    අප සමඟ ඔබේ වෘත්තීය ගමන ආරම්භ කිරීමට පහත පියවර සම්පූර්ණ කරන්න.
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
                        පුද්ගලික තොරතුරු
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- Step 2 -->
                <div class="progress-step inactive-step">

                    <div class="step-number">
                        2
                    </div>

                    <span>
                        වෘත්තීය තොරතුරු
                    </span>

                </div>


                <div class="step-line"></div>


                <!-- Step 3 -->
                <div class="progress-step inactive-step">

                    <div class="step-number">
                        3
                    </div>

                    <span>
                        සත්‍යාපනය
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

                                පුද්ගලික තොරතුරු

                            </h3>


                            <div class="form-grid">

                                <!-- Full Name -->
                                <div class="form-group">

                                    <label>
                                        සම්පූර්ණ නම
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="උදා: අංජලී පෙරේරා"
                                        name="full_name">

                                </div>


                                <!-- NIC -->
                                <div class="form-group">

                                    <label>
                                        ජාතික හැඳුනුම්පත් අංකය
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="9xxxxxxxxV"
                                         name="nic">

                                </div>


                                <!-- Date of Birth -->
                                <div class="form-group">

                                    <label>
                                        උපන් දිනය
                                    </label>

                                      <input
    type="date"
    id="date_of_birth"
    name="date_of_birth"
    required>

                                </div>


                                <!-- Gender -->
                                <div class="form-group">

                                    <label>
                                        ස්ත්‍රී / පුරුෂ භාවය
                                    </label>

                                    <select name="gender" required>

                                        <option value="">
                                            ස්ත්‍රී / පුරුෂ භාවය තෝරන්න
                                        </option>

                                        <option value="male">
                                            පුරුෂ
                                        </option>

                                        <option value="female">
                                            ස්ත්‍රී
                                        </option>

                                        <option value="other">
                                            වෙනත්
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

                                සම්බන්ධතා සහ ලිපිනය

                            </h3>


                            <div class="form-grid">

                                <!-- Phone -->
                                <div class="form-group">

                                    <label>
                                        දුරකථන අංකය
                                    </label>

                                    <input
                                        type="tel"
                                        placeholder="+94 7x xxx xxxx"
                                        name="phone">

                                </div>


                                <!-- Email -->
                                <div class="form-group">

                                    <label>
                                        විද්‍යුත් තැපැල් ලිපිනය
                                    </label>

                                    <input
                                        type="email"
                                        placeholder="anjali@example.com"
                                        name="email">

                                </div>


                                <!-- Address -->
                                <div class="form-group full-width">

                                    <label>
                                        නිවසේ ලිපිනය
                                    </label>

                                    <textarea
                                        rows="2"
                                        placeholder="වීථිය, නගරය, තැපැල් කේතය"
                                        name="address"></textarea>

                                </div>


                                <!-- District -->
                                <div class="form-group">

                                    <label>
                                        දිස්ත්‍රික්කය
                                    </label>

                                    <select name="district">

                                        <option value="">
                                            දිස්ත්‍රික්කය තෝරන්න
                                        </option>

                                        <option value="colombo">
                                            කොළඹ
                                        </option>

                                        <option value="gampaha">
                                            ගම්පහ
                                        </option>

                                        <option value="kandy">
                                            මහනුවර
                                        </option>

                                        <option value="galle">
                                            ගාල්ල
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

                                ගිණුම් ආරක්ෂාව

                            </h3>


                            <div class="form-grid">

                                <!-- Password -->
                                <div class="form-group">

                                    <label>
                                        මුරපදය
                                    </label>

                                    <input
                                        type="password"
                                        placeholder="අවම අක්ෂර 8ක්" name="password"
    required>

                                </div>


                                <!-- Confirm Password -->
                                <div class="form-group">

                                    <label>
                                        මුරපදය තහවුරු කරන්න
                                    </label>

                                    <input
                                        type="password"
                                        placeholder="මුරපදය නැවත ඇතුළත් කරන්න"
                                        name="confirm_password"
    required>

                                </div>

                            </div>

                        </section>


                        <!-- Action Buttons -->
                        <div class="form-actions">

                            <button
                                class="cancel-button"
                                type="reset">

                                අවලංගු කරන්න

                            </button>


                            <button
                                type="submit"
                                onclick="window.location.href='/safehands_mvc/register/professionalSi'"
                                class="next-button">

                                ඊළඟ

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
                        SafeHands සමඟ එක්වන්නේ ඇයි?
                    </h4>


                    <ul>

                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                බැංකු හරහා සෘජු ගෙවීම් සමඟ තරඟකාරී වැටුප්.
                            </span>

                        </li>


                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහනක්.
                            </span>

                        </li>


                        <li>

                            <span class="check-icon">
                                ✓
                            </span>

                            <span>
                                අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු මොඩියුල සඳහා ප්‍රවේශය.
                            </span>

                        </li>

                    </ul>

                </div>


                <div class="why-image">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDizMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc"
                        alt="සෞඛ්‍ය සේවා පරිසරයක වෘත්තීය රැකවරණ සේවකයෙකු">

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
                    සියලු හිමිකම් ඇවිරිණි.
                </p>

            </div>


            <div class="footer-links">

                <a href="#">
                    පෞද්ගලිකත්ව ප්‍රතිපත්තිය
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