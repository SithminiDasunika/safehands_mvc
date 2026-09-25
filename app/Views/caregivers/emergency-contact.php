<?php
$caregiverName = $caregiverName ?? 'Caregiver';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Emergency Contact Information | SafeHands</title>

    <link rel="stylesheet"
          href="/safehands_mvc/public/assets/css/caregiver-emergency.css?v=1">
</head>

<body>

<div class="emergency-page">

    <!-- =========================
         TOP NAVIGATION
    ========================== -->
    <header class="emergency-header">

        <div class="header-container">

            <!-- Logo -->
            <a href="/safehands_mvc/caregiver/dashboard"
               class="brand">
                <span class="brand-icon">♥</span>
                <span>SafeHands</span>
            </a>

            <!-- Navigation -->
            <nav class="emergency-nav">

                <a href="/safehands_mvc/caregiver/dashboard"
                   class="nav-link">
                    Dashboard
                </a>

                <a href="/safehands_mvc/caregiver/emergencyContact"
                   class="nav-link emergency-nav-active">
                    <span class="nav-call-icon">☎</span>
                    Emergency Call
                </a>

                <a href="/safehands_mvc/logout"
                   class="nav-link logout-link">
                    Logout
                </a>

            </nav>

            <!-- Mobile menu button -->
            <button type="button"
                    class="mobile-menu-button"
                    id="mobileMenuButton"
                    aria-label="Open navigation">
                ☰
            </button>

        </div>

        <!-- Mobile navigation -->
        <div class="mobile-navigation" id="mobileNavigation">

            <a href="/safehands_mvc/caregiver/dashboard">
                Dashboard
            </a>

            <a href="/safehands_mvc/caregiver/emergencyContact"
               class="mobile-active">
                ☎ Emergency Call
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
                    <h1>Emergency Contact Information</h1>

                    <p>
                        Quickly find and contact an emergency service.
                    </p>
                </div>

            </div>


            <!-- Emergency card -->
            <section class="emergency-card">

                <div class="card-header">

                    <h2>Emergency Contacts</h2>

                    <p>
                        Select an emergency service to view its contact
                        information.
                    </p>

                </div>


                <!-- Dropdown -->
               <!-- Emergency Service Dropdown -->
<div class="form-group">

    <label for="emergencyContact">
        Select Emergency Service
    </label>

    <select id="emergencyContact"
            name="emergencyContact">

        <option value="">
            -- Select Emergency Service --
        </option>

        <option value="ambulance">
            Ambulance
        </option>

        <option value="hospital">
            Hospital
        </option>

        <option value="police">
            Police
        </option>

        <option value="fire">
            Fire & Rescue
        </option>

        <option value="familymember">
            Family Member
        </option>

    </select>

</div>


 <!-- Family Member Dropdown -->
<div class="form-group"
     id="familyMemberSection"
     style="display: none;">

    <label for="familyMember">
        Select Family Member
    </label>

    <select id="familyMember"
            name="familyMember">

        <option value="">
            -- Select Family Member --
        </option>

        <option value="family1"
                data-phone="0712345678">
            Mother
        </option>

        <option value="family2"
                data-phone="0771234567">
            Father
        </option>

        <option value="family3"
                data-phone="0769876543">
            Brother
        </option>

        <option value="family4"
                data-phone="0755555555">
            Sister
        </option>

        <option value="family5"
                data-phone="0788888888">
            Son
        </option>

        <option value="family6"
                data-phone="0722222222">
            Daughter
        </option>

    </select>

</div>

                <!-- Contact information -->
                <div class="contact-result"
                     id="contactResult">

                    <div class="empty-state">

                        <div class="empty-icon">
                            ☎
                        </div>

                        <h3>Select an Emergency Service</h3>

                        <p>
                            Choose a service from the dropdown above
                            to view its contact information.
                        </p>

                    </div>

                </div>

            </section>


            <!-- Emergency warning -->
            <div class="emergency-notice">

                <div class="notice-icon">
                    !
                </div>

                <div class="notice-content">

                    <strong>Emergency Notice</strong>

                    <p>
                        If someone is in immediate danger, contact the
                        appropriate emergency service immediately.
                    </p>

                </div>

            </div>


            <!-- Back button -->
            <div class="back-section">

                <a href="/safehands_mvc/caregiver/dashboard"
                   class="back-button">
                    ← Back to Dashboard
                </a>

            </div>

        </div>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->
    <footer class="emergency-footer">

        <p>
            © <?php echo date('Y'); ?> SafeHands Caregiver Service
            Management System
        </p>

    </footer>

</div>


<script src="/safehands_mvc/public/assets/js/caregiver-emergency.js?v=1"></script>

</body>
</html>