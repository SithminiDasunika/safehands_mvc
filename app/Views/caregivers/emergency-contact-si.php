<?php
$caregiverName = $caregiverName ?? 'රැකවරණ සේවා සපයන්නා';
?>

<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>හදිසි සම්බන්ධතා තොරතුරු | SafeHands</title>

    <link rel="stylesheet"
          href="/safehands_mvc/public/assets/css/caregiver-emergency.css?v=3">
</head>

<body>

<div class="emergency-page">

    <!-- =========================
         TOP NAVIGATION
    ========================== -->
    <header class="emergency-header">

        <div class="header-container">

            <!-- SafeHands -->
            <a href="/safehands_mvc/caregiver/dashboardSi"
               class="brand">

                <span class="brand-icon">♥</span>

                <span>SafeHands</span>

            </a>


            <!-- Navigation -->
            <nav class="emergency-nav">

                <a href="/safehands_mvc/caregiver/dashboardSi"
                   class="nav-link">

                     උපකරණ පුවරුව

                </a>


                <a href="/safehands_mvc/caregiver/emergencyContactSi"
                   class="nav-link emergency-nav-active">

                    <span class="nav-call-icon">☎</span>

                    හදිසි ඇමතුම්

                </a>


                <a href="/safehands_mvc/logout"
                   class="nav-link logout-link">

                    Logout

                </a>

            </nav>


            <!-- Mobile menu -->
            <button type="button"
                    class="mobile-menu-button"
                    id="mobileMenuButton"
                    aria-label="Open navigation">

                ☰

            </button>

        </div>


        <!-- Mobile navigation -->
        <div class="mobile-navigation"
             id="mobileNavigation">

            <a href="/safehands_mvc/caregiver/dashboardSi">

                Dashboard

            </a>


            <a href="/safehands_mvc/caregiver/emergencyContactSi"
               class="mobile-active">

                ☎ හදිසි ඇමතුම්

            </a>


            <a href="/safehands_mvc/logout">

                Logout

            </a>

        </div>

    </header>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="emergency-main">

        <div class="emergency-container">


            <!-- Page heading -->
            <div class="page-heading">

                <div class="heading-icon">
                    ☎
                </div>

                <div>

                    <h1>
                        හදිසි සම්බන්ධතා තොරතුරු
                    </h1>

                    <p>
                        හදිසි සේවාවක් ඉක්මනින් සොයා සම්බන්ධ වන්න.
                    </p>

                </div>

            </div>


            <!-- Emergency card -->
            <section class="emergency-card">


                <div class="card-header">

                    <h2>
                        හදිසි සම්බන්ධතා
                    </h2>

                    <p>
                        පහත ලැයිස්තුවෙන් හදිසි සේවාවක් තෝරා
                        එහි සම්බන්ධතා තොරතුරු බලන්න.
                    </p>

                </div>


                <!-- Dropdown -->
                <div class="form-group">

                    <label for="emergencyContact">

                        හදිසි සේවාව තෝරන්න

                    </label>


                    <select id="emergencyContact"
                            name="emergencyContact">

                        <option value="">

                            -- හදිසි සේවාව තෝරන්න --

                        </option>


                        <option value="ambulance">

                            ගිලන් රථ සේවාව

                        </option>


                        <option value="hospital">

                            රෝහල

                        </option>


                        <option value="police">

                            පොලිසිය

                        </option>


                        <option value="fire">

                            ගිනි නිවන සහ මුදාගැනීමේ සේවාව

                        </option>
                         <option value="familymember">
    පවුලේ සාමාජිකයා
</option>
                    </select>

                </div>

<!-- Family Member Dropdown -->
<div class="form-group"
     id="familyMemberSection"
     style="display: none;">

    <label for="familyMember">
        පවුලේ සාමාජිකයෙකු තෝරන්න
    </label>

    <select id="familyMember"
            name="familyMember">

        <option value="">
            -- පවුලේ සාමාජිකයෙකු තෝරන්න --
        </option>

        <option value="family1"
                data-phone="0712345678">
            මව
        </option>

        <option value="family2"
                data-phone="0771234567">
            පියා
        </option>

        <option value="family3"
                data-phone="0769876543">
            සහෝදරයා
        </option>

        <option value="family4"
                data-phone="0755555555">
            සහෝදරිය
        </option>

        <option value="family5"
                data-phone="0788888888">
            පුතා
        </option>

        <option value="family6"
                data-phone="0722222222">
            දියණිය
        </option>

    </select>

</div>
                <!-- Contact result -->
                <div class="contact-result"
                     id="contactResult">


                    <div class="empty-state">

                        <div class="empty-icon">
                            ☎
                        </div>


                        <h3>
                            හදිසි සේවාවක් තෝරන්න
                        </h3>


                        <p>
                            ඉහත ලැයිස්තුවෙන් හදිසි සේවාවක්
                            තෝරා එහි සම්බන්ධතා තොරතුරු බලන්න.
                        </p>

                    </div>

                </div>

            </section>


            <!-- Emergency notice -->
            <div class="emergency-notice">


                <div class="notice-icon">
                    !
                </div>


                <div class="notice-content">

                    <strong>
                        හදිසි දැනුම්දීම
                    </strong>


                    <p>
                        යම් පුද්ගලයෙකු ක්ෂණික අනතුරක සිටී නම්,
                        සුදුසු හදිසි සේවාව වහාම සම්බන්ධ කරන්න.
                    </p>

                </div>

            </div>


            <!-- Back -->
            <div class="back-section">

                <a href="/safehands_mvc/caregiver/dashboardSi"
                   class="back-button">

                    ←  උපකරණ පුවරුව වෙත ආපසු

                </a>

            </div>

        </div>

    </main>


    <!-- Footer -->
    <footer class="emergency-footer">

        <p>
            © <?php echo date('Y'); ?>
            SafeHands Caregiver Service Management System
        </p>

    </footer>

</div>


<script src="/safehands_mvc/public/assets/js/caregiver-emergency-si.js?v=1"></script>

</body>

</html>