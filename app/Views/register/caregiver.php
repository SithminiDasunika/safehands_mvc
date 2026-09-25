 <!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Register - SafeHands Caregiver</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
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

                        "headline-lg-mobile": [
                            "24px",
                            {
                                lineHeight: "32px",
                                fontWeight: "600"
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

   <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;

            display: inline-block;
            vertical-align: middle;
        }

        .form-focus-ring:focus {
            outline: none;
            border-color: #004ac6;
            box-shadow: 0 0 0 4px rgba(0, 74, 198, 0.1);
        }
    </style>
</head>

<body class="bg-surface text-on-background min-h-screen flex flex-col">

    <!-- =========================================================
         TOP NAVIGATION
    ========================== -->
    <header
        class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest dark:bg-inverse-surface shadow-sm border-b border-subtle dark:border-outline-variant">

        <!-- Logo -->
        <div class="flex items-center gap-2">
            <span class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed">
                SafeHands
            </span>
        </div>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8">

                <a href="#">
                    Find Jobs
                </a>

                <a href="#">
                    Resources
                </a>

                <a href="#">
                    About Us
                </a>

         <a class="hover:text-primary transition-colors"
   href="/safehands_mvc/register.php">
    Register
</a>
        </nav>

        <!-- Right Side -->
        <div class="flex items-center gap-4">

            <!-- Language Switcher -->
            <div class="flex items-center gap-2 font-label-md text-label-md">

                <a href="caregiver.php"
                    class="text-primary font-bold hover:text-primary transition-all">
                    English
                </a>

                    <span>|</span>

                    <a href="/safehands_mvc/register/caregiverSi">
                        සිංහල
                    </a>

                </div>

            <!-- Login -->
            <a href="/safehands_mvc/login/login.php"
   class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all">
    Login
</a>
        </div>

    </header>


    <!-- =========================================================
         MAIN CONTENT
    ========================== -->
    <main class="flex-grow pt-24 pb-16 px-margin-mobile md:px-margin-desktop bg-surface">

        <div class="max-w-[800px] mx-auto">

            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 mb-6 text-on-surface-variant font-label-md text-label-md">

                 <a class="hover:text-primary transition-colors"
   href="/safehands_mvc/register.php">
    Register
</a>

                <span class="material-symbols-outlined text-sm">
                    chevron_right
                </span>

                <span class="font-bold text-on-background">
                    Become a Caregiver
                </strong>

            </nav>


            <!-- Page Header -->
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
                 PROGRESS INDICATOR
            ========================== -->
            <div class="mb-12 flex flex-col md:flex-row items-center gap-4">

                <!-- Step 1 -->
                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-primary-container rounded-xl text-on-primary-container shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary-container text-primary flex items-center justify-center font-bold">
                        1
                    </div>

                    <span>
                        Personal Info
                    </span>

                </div>


                <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


                <!-- Step 2 -->
                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-surface-container rounded-xl text-on-surface-variant opacity-60">

                    <div
                        class="w-8 h-8 rounded-full bg-outline-variant text-on-surface-variant flex items-center justify-center font-bold">
                        2
                    </div>

                    <span>
                        Professional Info
                    </span>

                </div>


                <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


                <!-- Step 3 -->
                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-surface-container rounded-xl text-on-surface-variant opacity-60">

                    <div
                        class="w-8 h-8 rounded-full bg-outline-variant text-on-surface-variant flex items-center justify-center font-bold">
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
            <div class="bg-surface-container-lowest border border-subtle rounded-xl shadow-sm overflow-hidden">

                <div class="p-8 md:p-12">

                    <form action="/safehands_mvc/register/professional.php" method="GET" class="space-y-8">

                        <!-- Personal Details -->
                        <div>

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    person
                                </span>

                                Personal Details

                            </h2>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <!-- Full Name -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Full Name
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="e.g. Anjali Perera"
                                        type="text" />

                                </div>


                                <!-- NIC -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        NIC Number
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="9xxxxxxxxV"
                                        type="text" />

                                </div>


                                <!-- Date of Birth -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Date of Birth
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        type="date" />

                                </div>


                                <!-- Gender -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Gender
                                    </label>

                                    <select
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all">

                                        <option value="">
                                            Select Gender
                                        </option>

                                        <option
                                            value="male"
                                            <?= oldValue('gender') === 'male'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Male
                                        </option>

                                        <option
                                            value="female"
                                            <?= oldValue('gender') === 'female'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Female
                                        </option>

                                        <option
                                            value="other"
                                            <?= oldValue('gender') === 'other'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Other
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </section>


                        <!-- =========================
                             CONTACT & LOCATION
                        ========================== -->
                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    home
                                </span>

                                Contact &amp; Address

                            </h2>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <!-- Phone -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Phone Number
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="+94 7x xxx xxxx"
                                        type="tel" />

                                </div>


                                <!-- Email -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Email Address
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="anjali@example.com"
                                        type="email" />

                                </div>


                                <!-- Address -->
                                <div class="flex flex-col gap-2 md:col-span-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Home Address
                                    </label>

                                    <textarea
                                        class="p-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="Street name, City, Zip Code"
                                        rows="2"></textarea>

                                </div>


                                <!-- District -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        District
                                    </label>

                                    <select
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all">

                                        <option value="">
                                            Select District
                                        </option>

                                        <option
                                            value="Colombo"
                                            <?= oldValue('district') === 'Colombo'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Colombo
                                        </option>

                                        <option
                                            value="Gampaha"
                                            <?= oldValue('district') === 'Gampaha'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Gampaha
                                        </option>

                                        <option
                                            value="Kandy"
                                            <?= oldValue('district') === 'Kandy'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Kandy
                                        </option>

                                        <option
                                            value="Galle"
                                            <?= oldValue('district') === 'Galle'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Galle
                                        </option>

                                        <option
                                            value="Matara"
                                            <?= oldValue('district') === 'Matara'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Matara
                                        </option>

                                        <option
                                            value="Kalutara"
                                            <?= oldValue('district') === 'Kalutara'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Kalutara
                                        </option>

                                        <option
                                            value="Kurunegala"
                                            <?= oldValue('district') === 'Kurunegala'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Kurunegala
                                        </option>

                                        <option
                                            value="Ratnapura"
                                            <?= oldValue('district') === 'Ratnapura'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Ratnapura
                                        </option>

                                        <option
                                            value="Jaffna"
                                            <?= oldValue('district') === 'Jaffna'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Jaffna
                                        </option>

                                        <option
                                            value="Batticaloa"
                                            <?= oldValue('district') === 'Batticaloa'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Batticaloa
                                        </option>

                                        <option
                                            value="Trincomalee"
                                            <?= oldValue('district') === 'Trincomalee'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Trincomalee
                                        </option>

                                        <option
                                            value="Anuradhapura"
                                            <?= oldValue('district') === 'Anuradhapura'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Anuradhapura
                                        </option>

                                        <option
                                            value="Polonnaruwa"
                                            <?= oldValue('district') === 'Polonnaruwa'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Polonnaruwa
                                        </option>

                                        <option
                                            value="Badulla"
                                            <?= oldValue('district') === 'Badulla'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Badulla
                                        </option>

                                        <option
                                            value="Monaragala"
                                            <?= oldValue('district') === 'Monaragala'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Monaragala
                                        </option>

                                        <option
                                            value="Hambantota"
                                            <?= oldValue('district') === 'Hambantota'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Hambantota
                                        </option>

                                        <option
                                            value="Nuwara Eliya"
                                            <?= oldValue('district') === 'Nuwara Eliya'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Nuwara Eliya
                                        </option>

                                        <option
                                            value="Kegalle"
                                            <?= oldValue('district') === 'Kegalle'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Kegalle
                                        </option>

                                        <option
                                            value="Puttalam"
                                            <?= oldValue('district') === 'Puttalam'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Puttalam
                                        </option>

                                        <option
                                            value="Mannar"
                                            <?= oldValue('district') === 'Mannar'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Mannar
                                        </option>

                                        <option
                                            value="Vavuniya"
                                            <?= oldValue('district') === 'Vavuniya'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Vavuniya
                                        </option>

                                        <option
                                            value="Mullaitivu"
                                            <?= oldValue('district') === 'Mullaitivu'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Mullaitivu
                                        </option>

                                        <option
                                            value="Kilinochchi"
                                            <?= oldValue('district') === 'Kilinochchi'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Kilinochchi
                                        </option>

                                        <option
                                            value="Ampara"
                                            <?= oldValue('district') === 'Ampara'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Ampara
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </section>


                        <!-- =========================
                             ACCOUNT SECURITY
                        ========================== -->
                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    lock
                                </span>

                                Account Security

                            </h2>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <!-- Password -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Password
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="Min. 8 characters"
                                        type="password" />

                                </div>


                                <!-- Confirm Password -->
                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        Confirm Password
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="Repeat your password"
                                        type="password" />

                                </div>

                            </div>

                        </section>


                        <!-- =========================
                             ACTION BUTTONS
                        ========================== -->
                        <div class="pt-12 flex flex-col-reverse md:flex-row justify-end gap-4">

                            <button
                                class="h-12 px-8 rounded-xl border border-subtle text-on-surface-variant font-label-md text-label-md hover:bg-surface-muted transition-all"
                                type="button">

                            <a
                                href="/safehands_mvc/register"
                                class="cancel-button"
                            >
                                Cancel

                            </button>


                             <button 
    type="button"
    onclick="window.location.href='/safehands_mvc/register/professional'"
    class="h-12 px-12 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">

    Next
</button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- =================================================
                 WHY JOIN SAFEHANDS
            ========================== -->
            <div
                class="mt-12 bg-primary-container rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">

                <div class="md:w-1/2 p-8 md:p-12 text-on-primary-container">

                    <h4 class="font-headline-md text-headline-md mb-4">
                        Why join SafeHands?
                    </h2>

                    <ul class="space-y-4 font-body-md text-body-md">

                        <li class="flex items-start gap-3">

                            <span class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Competitive pay with direct bank transfers.
                            </span>
                        </li>


                        <li class="flex items-start gap-3">

                            <span class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Flexible schedule that fits your lifestyle.
                            </span>
                        </li>


                        <li class="flex items-start gap-3">

                            <span class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                Access to continuous healthcare training modules.
                            </span>
                        </li>

                    </ul>

                </div>


                <div class="why-image">

                    <img
                        class="w-full h-full object-cover"
                        alt="A professional caregiver in a healthcare setting."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDizMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc" />

                </div>

            </section>

        </div>

    </main>


    <!-- =========================================================
         FOOTER
    ========================== -->
    <footer
        class="w-full py-8 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-muted dark:bg-inverse-surface border-t border-subtle dark:border-outline-variant">

        <div class="flex flex-col gap-1 items-center md:items-start">

            <span class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed">
                SafeHands
            </span>

            <p class="font-body-md text-body-md text-on-surface-variant opacity-90">
                © 2024 SafeHands Healthcare Services. All rights reserved.
            </p>

            </div>


        <div class="flex flex-wrap justify-center gap-6">

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                Privacy Policy
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                Terms of Service
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                Help Center
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                Contact Support
            </a>

            </div>

        </div>

    </footer>


    <!-- =========================
         JAVASCRIPT
    ========================== -->
    <script>

        // Form submission
        document.querySelector('form').addEventListener('submit', function (e) {

            e.preventDefault();

            const btn = e.target.querySelector('button[type="submit"]');

            const originalContent = btn.innerHTML;

            btn.innerHTML =
                '<span class="material-symbols-outlined animate-spin">progress_activity</span> Processing...';

            btn.disabled = true;

            setTimeout(() => {

                alert('Moving to Step 2: Professional Information...');

                btn.innerHTML = originalContent;

                btn.disabled = false;

            }, 1000);

        });


        // Input focus effects
        const inputs = document.querySelectorAll('input, select, textarea');

        inputs.forEach(input => {

            input.addEventListener('focus', () => {

                input.parentElement
                    .querySelector('label')
                    ?.classList.add('text-primary');

            });


            input.addEventListener('blur', () => {

                input.parentElement
                    .querySelector('label')
                    ?.classList.remove('text-primary');

            });

        });

    </script>

</body>

</html>