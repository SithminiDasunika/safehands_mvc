<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Professional Information - SafeHands</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=block"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",

            theme: {
                extend: {

                    colors: {
                        "on-primary-container": "#eeefff",
                        "on-background": "#111c2d",
                        "surface": "#f9f9ff",
                        "primary-container": "#2563eb",
                        "primary": "#004ac6",
                        "secondary-fixed": "#d9e2ff",
                        "on-surface-variant": "#434655",
                        "surface-container-low": "#f0f3ff",
                        "on-tertiary": "#ffffff",
                        "surface-muted": "#F8FAFC",
                        "on-tertiary-container": "#ffede6",
                        "error": "#ba1a1a",
                        "primary-fixed": "#dbe1ff",
                        "on-primary-fixed": "#00174b",
                        "surface-dim": "#cfdaf2",
                        "surface-container-lowest": "#ffffff",
                        "status-warning": "#FEBB02",
                        "surface-bright": "#f9f9ff",
                        "tertiary-container": "#bc4800",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-error": "#ffffff",
                        "secondary": "#375ca8",
                        "on-secondary-container": "#113e89",
                        "on-primary": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed-variant": "#7d2d00",
                        "border-subtle": "#F1F5F9",
                        "status-info": "#AAECF3",
                        "surface-container-highest": "#d8e3fb",
                        "surface-container-high": "#dee8ff",
                        "inverse-primary": "#b4c5ff",
                        "surface-container": "#e7eeff",
                        "secondary-container": "#8aacfe",
                        "background": "#f9f9ff",
                        "outline": "#737686",
                        "secondary-fixed-dim": "#b0c6ff",
                        "on-surface": "#111c2d",
                        "error-container": "#ffdad6",
                        "surface-tint": "#0053db",
                        "tertiary-fixed-dim": "#ffb596",
                        "inverse-surface": "#263143",
                        "on-secondary": "#ffffff",
                        "status-success": "#025747",
                        "on-tertiary-fixed": "#360f00",
                        "tertiary-fixed": "#ffdbcd",
                        "outline-variant": "#c3c6d7",
                        "surface-variant": "#d8e3fb",
                        "on-secondary-fixed": "#001945",
                        "inverse-on-surface": "#ecf1ff",
                        "tertiary": "#943700",
                        "on-secondary-fixed-variant": "#1a438e"
                    },

                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },

                    spacing: {
                        "gutter": "24px",
                        "base": "8px",
                        "container-max": "1280px",
                        "margin-mobile": "16px",
                        "margin-desktop": "40px"
                    },

                    fontFamily: {
                        "label-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-lg": ["Inter"]
                    },

                    fontSize: {
                        "label-md": [
                            "14px",
                            {
                                lineHeight: "20px",
                                letterSpacing: "0.01em",
                                fontWeight: "500"
                            }
                        ],

                        "headline-lg": [
                            "32px",
                            {
                                lineHeight: "40px",
                                letterSpacing: "-0.01em",
                                fontWeight: "600"
                            }
                        ],

                        "body-md": [
                            "16px",
                            {
                                lineHeight: "24px",
                                fontWeight: "400"
                            }
                        ],

                        "display-lg": [
                            "48px",
                            {
                                lineHeight: "56px",
                                letterSpacing: "-0.02em",
                                fontWeight: "700"
                            }
                        ],

                        "label-sm": [
                            "12px",
                            {
                                lineHeight: "16px",
                                letterSpacing: "0.05em",
                                fontWeight: "600"
                            }
                        ],

                        "headline-md": [
                            "24px",
                            {
                                lineHeight: "32px",
                                fontWeight: "600"
                            }
                        ],

                        "body-lg": [
                            "18px",
                            {
                                lineHeight: "28px",
                                fontWeight: "400"
                            }
                        ]
                    }
                }
            }
        };
    </script>

    <!-- Existing caregiver registration CSS -->
    <link rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-register.css">

</head>

<body class="bg-surface text-on-background min-h-screen flex flex-col">


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <header
        class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest shadow-sm border-b border-subtle">

        <!-- Logo -->
        <div class="flex items-center gap-2">

            <span class="font-headline-md text-headline-md font-bold text-primary">
                SafeHands
            </span>

        </div>


        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8">

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                Find Jobs
            </a>

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                Resources
            </a>

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                About Us
            </a>

            <a
                class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1"
                href="/safehands_mvc/register.php">
                Register
            </a>

        </nav>


        <!-- Right side -->
        <div class="flex items-center gap-4">

            <!-- Language -->
            <div class="flex items-center gap-2 font-label-md text-label-md">

                <a
                    href="/safehands_mvc/register/professional"
                    class="text-primary font-bold hover:text-primary transition-all">
                    English
                </a>

                <span class="text-outline-variant">|</span>

                <a
                    href="/safehands_mvc/register/professionalSi"
                    class="text-on-surface-variant hover:text-primary transition-all">
                    සිංහල
                </a>

            </div>


            <!-- Login -->
            <a
                href="/safehands_mvc/login/login.php"
                class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all">
                Login
            </a>

        </div>

    </header>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="flex-grow pt-24 pb-16 px-margin-mobile md:px-margin-desktop bg-surface">

        <div class="max-w-[800px] mx-auto">


            <!-- Breadcrumb -->
            <nav
                class="flex items-center gap-2 mb-6 text-on-surface-variant font-label-md text-label-md">

                <a
                    class="hover:text-primary transition-colors"
                    href="/safehands_mvc/register.php">
                    Register
                </a>

                <span class="material-symbols-outlined text-sm">
                    chevron_right
                </span>

                <span class="font-bold text-on-background">
                    Become a Caregiver
                </span>

            </nav>


            <!-- Page Heading -->
            <div class="mb-12">

                <h1 class="font-display-lg text-display-lg text-primary mb-2">
                    Become a SafeHands Caregiver
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                    Complete the following steps to apply as a verified caregiver
                    and start your professional journey with us.
                </p>

            </div>


            <!-- =================================================
                 STEP INDICATOR
            ================================================== -->

            <div class="mb-12 flex flex-col md:flex-row items-center gap-4">


                <!-- STEP 1 - COMPLETED -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-status-success rounded-xl text-on-primary shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary text-status-success flex items-center justify-center font-bold">

                        <span class="material-symbols-outlined text-sm">
                            check
                        </span>

                    </div>

                    <span class="font-label-md text-label-md">
                        Personal Info
                    </span>

                </div>


                <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


                <!-- STEP 2 - ACTIVE -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-primary-container rounded-xl text-on-primary-container shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary-container text-primary flex items-center justify-center font-bold">
                        2
                    </div>

                    <span class="font-label-md text-label-md">
                        Professional Info
                    </span>

                </div>


                <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


                <!-- STEP 3 - PENDING -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-surface-container-high rounded-xl text-on-surface-variant shadow-sm">

                    <div
                        class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold">
                        3
                    </div>

                    <span class="font-label-md text-label-md">
                        Verification
                    </span>

                </div>

            </div>


            <!-- =================================================
                 FORM CARD
            ================================================== -->

            <div
                class="bg-surface-container-lowest border border-subtle rounded-xl shadow-sm overflow-hidden">

                <div class="p-8 md:p-12">


                    <form
                        action="/safehands_mvc/register/saveProfessional"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-8">


                        <!-- =================================================
                             PROFESSIONAL DETAILS
                        ================================================= -->

                        <div>

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    work
                                </span>

                                Professional Details

                            </h3>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                                <!-- Highest Qualification -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Highest Qualification *

                                    </label>

                                    <select
                                        name="highest_qualification"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
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

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Years of Experience *

                                    </label>

                                    <input
                                        type="number"
                                        name="years_experience"
                                        min="0"
                                        placeholder="e.g. 5"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Professional Certifications -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Professional Certifications *

                                    </label>

                                    <input
                                        type="text"
                                        name="professional_certification"
                                        placeholder="e.g. CPR, First Aid"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Languages -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Languages Spoken *

                                    </label>

                                    <input
                                        type="text"
                                        name="languages"
                                        placeholder="e.g. English, Sinhala"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Service Areas -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Service Areas / Districts *

                                    </label>

                                    <input
                                        type="text"
                                        name="service_areas"
                                        placeholder="e.g. Colombo, Gampaha"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Expected Daily Rate -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Expected Daily Rate (Optional)

                                    </label>

                                    <input
                                        type="text"
                                        name="expected_daily_rate"
                                        placeholder="e.g. Rs. 5,000"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary">

                                </div>


                                <!-- Biography -->

                                <div class="flex flex-col gap-2 md:col-span-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        Short Professional Biography *

                                    </label>

                                    <textarea
                                        name="description"
                                        rows="4"
                                        placeholder="Tell us about your experience and passion for caregiving..."
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required></textarea>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             PROFILE PHOTO
                        ================================================== -->

                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    account_circle
                                </span>

                                Profile Photo

                            </h3>


                            <div
                                class="border-2 border-dashed border-outline-variant rounded-xl p-8 flex flex-col items-center justify-center gap-4 bg-surface-muted hover:bg-surface-container-low transition-colors">

                                <span
                                    class="material-symbols-outlined text-4xl text-outline">
                                    cloud_upload
                                </span>


                                <div class="text-center">

                                    <p
                                        class="font-label-md text-label-md text-on-background">

                                        Click to upload or drag and drop

                                    </p>

                                    <p class="text-sm text-on-surface-variant">

                                        PNG, JPG or GIF (max. 2MB)

                                    </p>

                                </div>


                                <input
                                    type="file"
                                    name="profile_photo"
                                    id="profile-photo-upload"
                                    class="hidden"
                                    accept="image/png,image/jpeg,image/gif,image/webp">


                                <button
                                    type="button"
                                    class="px-4 py-2 bg-primary-container text-on-primary-container rounded-full text-sm font-semibold hover:bg-primary-fixed transition-colors"
                                    onclick="document.getElementById('profile-photo-upload').click()">

                                    Select File

                                </button>


                                <p
                                    id="selected-file-name"
                                    class="text-sm text-primary hidden">
                                </p>

                            </div>

                        </div>


                        <!-- =================================================
                             ACTION BUTTONS
                        ================================================== -->

                        <div
                            class="pt-12 flex flex-col-reverse md:flex-row justify-end gap-4">


                            <!-- BACK -->

                            <a
                                href="/safehands_mvc/register/caregiver"
                                class="h-12 px-8 rounded-xl border border-subtle text-on-surface-variant font-label-md text-label-md hover:bg-surface-muted transition-all flex items-center justify-center">

                                <span class="material-symbols-outlined text-sm mr-1">
                                    arrow_back
                                </span>

                                Back

                            </a>


                            <!-- SAVE & CONTINUE -->

                            <button
                                type="submit"
                                class="h-12 px-12 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">

                                Save &amp; Continue

                                <span class="material-symbols-outlined text-sm">
                                    arrow_forward
                                </span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- =================================================
                 WHY JOIN SAFEHANDS
            ================================================== -->

            <div
                class="mt-12 bg-primary-container rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">


                <div
                    class="md:w-1/2 p-8 md:p-12 text-on-primary-container">

                    <h4 class="font-headline-md text-headline-md mb-4">
                        Why join SafeHands?
                    </h4>


                    <ul class="space-y-4 font-body-md text-body-md">

                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Competitive pay with direct bank transfers.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Flexible schedule that fits your lifestyle.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Access to continuous healthcare training modules.
                            </span>

                        </li>

                    </ul>

                </div>


                <div class="md:w-1/2 w-full h-64 md:h-80 overflow-hidden">

                    <img
                        class="w-full h-full object-cover"
                        alt="Professional caregiver"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDIzMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc">

                </div>

            </div>

        </div>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer
        class="w-full py-8 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-muted border-t border-subtle">

        <div
            class="flex flex-col gap-1 items-center md:items-start">

            <span
                class="font-headline-md text-headline-md font-bold text-primary">

                SafeHands

            </span>

            <p
                class="font-body-md text-body-md text-on-surface-variant opacity-90">

                © 2024 SafeHands Healthcare Services.
                All rights reserved.

            </p>

        </div>


        <div class="flex flex-wrap justify-center gap-6">

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                Privacy Policy
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                Terms of Service
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                Help Center
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                Contact Support
            </a>

        </div>

    </footer>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        // Show selected profile photo filename

        const profileInput =
            document.getElementById('profile-photo-upload');

        const selectedFileName =
            document.getElementById('selected-file-name');


        profileInput.addEventListener('change', function () {

            if (this.files.length > 0) {

                selectedFileName.textContent =
                    'Selected: ' + this.files[0].name;

                selectedFileName.classList.remove('hidden');

            } else {

                selectedFileName.classList.add('hidden');

            }

        });


        // Add focus effect to form labels

        const inputs =
            document.querySelectorAll(
                'input:not([type="file"]), select, textarea'
            );


        inputs.forEach(function (input) {

            input.addEventListener('focus', function () {

                const label =
                    this.parentElement.querySelector('label');

                if (label) {
                    label.classList.add('text-primary');
                }

            });


            input.addEventListener('blur', function () {

                const label =
                    this.parentElement.querySelector('label');

                if (label) {
                    label.classList.remove('text-primary');
                }

            });

        });

    </script>

</body>

</html>