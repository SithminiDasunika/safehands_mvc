<?php

$caregiver = $caregiver ?? [];

$isLoggedIn = isset($_SESSION['user_id']);

$name = $caregiver['name'] ?? 'Caregiver';
$specialization = $caregiver['specialization'] ?? 'Caregiver';
$district = $caregiver['district'] ?? 'Not specified';
$experience = $caregiver['experience'] ?? 'Not specified';
$education = $caregiver['education'] ?? 'Not specified';
$rating = $caregiver['rating'] ?? '0.0';
$languages = $caregiver['languages'] ?? [];
$description = $caregiver['description'] ?? 'No description available.';
$image = $caregiver['image'] ?? '';

?>

<!DOCTYPE html>
<html class="light" lang="en">

<head>

    <meta charset="utf-8">

    <meta
        content="width=device-width, initial-scale=1.0"
        name="viewport"
    >

    <title>
        <?= htmlspecialchars($name) ?> - Caregiver Profile | SafeHands Healthcare
    </title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >

    <style>

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;

            display: inline-block;
            vertical-align: middle;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(241, 245, 249, 1);
        }

        .timeline-dot::after {
            content: '';
            position: absolute;
            left: 50%;
            top: 24px;
            bottom: -24px;
            width: 2px;
            background: #F1F5F9;
            transform: translateX(-50%);
        }

        .timeline-item:last-child .timeline-dot::after {
            display: none;
        }

    </style>

    <script>

        tailwind.config = {

            darkMode: "class",

            theme: {

                extend: {

                    colors: {

                        "tertiary-container": "#bc4800",
                        "secondary-container": "#8aacfe",
                        "tertiary": "#943700",
                        "surface-container-high": "#dee8ff",
                        "secondary-fixed-dim": "#b0c6ff",
                        "on-tertiary-fixed": "#360f00",
                        "surface-container": "#e7eeff",
                        "inverse-surface": "#263143",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#00174b",
                        "primary": "#004ac6",
                        "on-background": "#111c2d",
                        "secondary-fixed": "#d9e2ff",
                        "surface-container-low": "#f0f3ff",
                        "error": "#ba1a1a",
                        "surface-dim": "#cfdaf2",
                        "status-warning": "#FEBB02",
                        "outline": "#737686",
                        "surface-variant": "#d8e3fb",
                        "on-error-container": "#93000a",
                        "on-primary-container": "#eeefff",
                        "on-secondary": "#ffffff",
                        "on-surface-variant": "#434655",
                        "on-primary-fixed-variant": "#003ea8",
                        "surface": "#f9f9ff",
                        "inverse-primary": "#b4c5ff",
                        "on-tertiary-fixed-variant": "#7d2d00",
                        "secondary": "#375ca8",
                        "primary-container": "#2563eb",
                        "status-success": "#025747",
                        "surface-muted": "#F8FAFC",
                        "on-tertiary": "#ffffff",
                        "surface-bright": "#f9f9ff",
                        "primary-fixed-dim": "#b4c5ff",
                        "tertiary-fixed-dim": "#ffb596",
                        "on-secondary-fixed": "#001945",
                        "tertiary-fixed": "#ffdbcd",
                        "on-secondary-fixed-variant": "#1a438e",
                        "surface-tint": "#0053db",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#111c2d",
                        "on-error": "#ffffff",
                        "on-secondary-container": "#113e89",
                        "on-primary": "#ffffff",
                        "background": "#f9f9ff",
                        "on-tertiary-container": "#ffede6",
                        "surface-container-highest": "#d8e3fb",
                        "primary-fixed": "#dbe1ff",
                        "outline-variant": "#c3c6d7",
                        "status-info": "#AAECF3",
                        "border-subtle": "#F1F5F9",
                        "inverse-on-surface": "#ecf1ff"

                    },

                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },

                    spacing: {
                        "container-max": "1280px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "base": "8px",
                        "margin-desktop": "40px"
                    },

                    fontFamily: {
                        "label-sm": ["Inter"],
                        "display-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-md": ["Inter"]
                    },

                    fontSize: {

                        "label-sm": [
                            "12px",
                            {
                                lineHeight: "16px",
                                letterSpacing: "0.05em",
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

                        "body-md": [
                            "16px",
                            {
                                lineHeight: "24px",
                                fontWeight: "400"
                            }
                        ],

                        "body-lg": [
                            "18px",
                            {
                                lineHeight: "28px",
                                fontWeight: "400"
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

                        "label-md": [
                            "14px",
                            {
                                lineHeight: "20px",
                                letterSpacing: "0.01em",
                                fontWeight: "500"
                            }
                        ],

                        "headline-lg-mobile": [
                            "24px",
                            {
                                lineHeight: "32px",
                                fontWeight: "600"
                            }
                        ],

                        "headline-md": [
                            "24px",
                            {
                                lineHeight: "32px",
                                fontWeight: "600"
                            }
                        ]

                    }

                }

            }

        };

    </script>

</head>


<body class="bg-background text-on-surface font-body-md">


<!-- ========================================================= -->
<!-- NAVIGATION -->
<!-- ========================================================= -->

<header class="bg-surface border-b border-subtle sticky top-0 z-50">

    <div
        class="flex justify-between items-center w-full h-16 px-margin-desktop max-w-container-max mx-auto"
    >

        <!-- Logo -->

        <a
            href="/safehands_mvc/"
            class="font-headline-md text-headline-md font-bold text-primary"
        >
            SafeHands Healthcare
        </a>


        <!-- Navigation -->

        <nav class="hidden md:flex items-center gap-gutter">

            <a
                href="/safehands_mvc/"
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
            >
                Home
            </a>

            <a
                href="/safehands_mvc/#about"
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
            >
                About
            </a>

            <a
                href="/safehands_mvc/#services"
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
            >
                Services
            </a>

            <a
                href="/safehands_mvc/caregiver"
                class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1"
            >
                Find Caregivers
            </a>

            <a
                href="/safehands_mvc/#contact"
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
            >
                Contact
            </a>

        </nav>


        <!-- Guest buttons -->

        <?php if (!$isLoggedIn): ?>

            <div class="flex items-center gap-4">

                <a
                    href="/safehands_mvc/login"
                    class="font-label-md text-label-md text-primary px-4 py-2 hover:bg-surface-container transition-all"
                >
                    Login
                </a>

                <a
                    href="/safehands_mvc/register"
                    class="font-label-md text-label-md bg-primary text-on-primary px-6 py-2.5 rounded-lg hover:opacity-90 transition-all"
                >
                    Register
                </a>

            </div>

        <?php endif; ?>

    </div>

</header>



<!-- ========================================================= -->
<!-- MAIN -->
<!-- ========================================================= -->

<main
    class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-8"
>


<!-- Breadcrumb -->

<nav
    class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4"
>

    <div
        class="flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm"
    >

        <a
            href="/safehands_mvc/"
            class="hover:text-primary"
        >
            Home
        </a>

        <span class="material-symbols-outlined text-[16px]">
            chevron_right
        </span>

        <a
            href="/safehands_mvc/caregiver"
            class="hover:text-primary"
        >
            Find Caregivers
        </a>

        <span class="material-symbols-outlined text-[16px]">
            chevron_right
        </span>

        <span class="text-primary font-bold">
            Caregiver Profile
        </span>

    </div>


    <a
        href="/safehands_mvc/caregiver"
        class="flex items-center gap-2 text-primary font-label-md text-label-md hover:underline"
    >

        <span class="material-symbols-outlined">
            arrow_back
        </span>

        Back to Caregivers

    </a>

</nav>



<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">


<!-- ========================================================= -->
<!-- LEFT COLUMN -->
<!-- ========================================================= -->

<div class="lg:col-span-8 space-y-gutter">


<!-- ========================================================= -->
<!-- PROFILE HEADER -->
<!-- ========================================================= -->

<section
    class="bg-surface-container-lowest rounded-xl border border-subtle shadow-sm p-6 md:p-8"
>

    <div class="flex flex-col md:flex-row gap-8 items-start">


        <!-- Image -->

        <div
            class="relative w-full md:w-48 h-48 rounded-xl overflow-hidden shrink-0 border border-subtle"
        >

            <img
                class="w-full h-full object-cover"
                src="<?= htmlspecialchars($image) ?>"
                alt="<?= htmlspecialchars($name) ?>"
            >

        </div>


        <!-- Main information -->

        <div class="flex-grow">


            <div class="flex flex-wrap items-center gap-3 mb-2">

                <h1
                    class="font-headline-lg text-headline-lg text-on-surface"
                >
                    <?= htmlspecialchars($name) ?>
                </h1>

                <span
                    class="bg-status-success/10 text-status-success px-3 py-1 rounded-full text-label-sm flex items-center gap-1"
                >

                    <span
                        class="material-symbols-outlined text-[14px]"
                        style="font-variation-settings: 'FILL' 1;"
                    >
                        verified
                    </span>

                    Verified

                </span>

            </div>


            <p
                class="text-body-lg font-body-lg text-on-surface-variant mb-4"
            >
                <?= htmlspecialchars($specialization) ?>
            </p>


            <!-- Details -->

            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-6 py-6 border-y border-subtle"
            >


                <!-- Rating -->

                <div class="flex flex-col">

                    <span
                        class="text-label-sm font-label-sm text-outline mb-1 uppercase tracking-wider"
                    >
                        Rating
                    </span>

                    <span
                        class="flex items-center gap-1 font-bold text-on-surface"
                    >

                        <span
                            class="material-symbols-outlined text-status-warning"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            star
                        </span>

                        <?= htmlspecialchars($rating) ?>

                    </span>

                </div>


                <!-- Experience -->

                <div class="flex flex-col">

                    <span
                        class="text-label-sm font-label-sm text-outline mb-1 uppercase tracking-wider"
                    >
                        Experience
                    </span>

                    <span class="font-bold text-on-surface">

                        <?= htmlspecialchars($experience) ?>

                    </span>

                </div>


                <!-- Location -->

                <div class="flex flex-col">

                    <span
                        class="text-label-sm font-label-sm text-outline mb-1 uppercase tracking-wider"
                    >
                        Location
                    </span>

                    <span class="font-bold text-on-surface">

                        <?= htmlspecialchars($district) ?>

                    </span>

                </div>


                <!-- Languages -->

                <div class="flex flex-col">

                    <span
                        class="text-label-sm font-label-sm text-outline mb-1 uppercase tracking-wider"
                    >
                        Languages
                    </span>

                    <span class="font-bold text-on-surface">

                        <?= htmlspecialchars(
                            implode(', ', $languages)
                        ) ?>

                    </span>

                </div>

            </div>


            <!-- Skills -->

            <div class="mt-6 flex flex-wrap gap-3">

                <span
                    class="bg-surface-muted border border-subtle px-3 py-1.5 rounded-lg text-label-md flex items-center gap-2"
                >

                    <span class="material-symbols-outlined text-primary text-[18px]">
                        medical_services
                    </span>

                    <?= htmlspecialchars($specialization) ?>

                </span>


                <span
                    class="bg-surface-muted border border-subtle px-3 py-1.5 rounded-lg text-label-md flex items-center gap-2"
                >

                    <span class="material-symbols-outlined text-primary text-[18px]">
                        school
                    </span>

                    <?= htmlspecialchars($education) ?>

                </span>

            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- ABOUT ME -->
<!-- ========================================================= -->

<section
    class="bg-surface-container-lowest rounded-xl border border-subtle p-6 md:p-8"
>

    <h2
        class="font-headline-md text-headline-md text-on-surface mb-4"
    >
        About Me
    </h2>

    <div
        class="space-y-4 text-on-surface-variant text-body-md leading-relaxed"
    >

        <p>
            <?= htmlspecialchars($description) ?>
        </p>

        <p>
            I am committed to providing compassionate and professional
            care while supporting the comfort, dignity, and independence
            of every client.
        </p>

    </div>

</section>



<!-- ========================================================= -->
<!-- CONTACT INFORMATION -->
<!-- ========================================================= -->

<section
    class="bg-surface-container-lowest rounded-xl border border-subtle p-6 md:p-8"
>

    <h2
        class="font-headline-md text-headline-md text-on-surface mb-6"
    >
        Contact Information
    </h2>


    <?php if ($isLoggedIn): ?>

        <!-- Logged-in contact -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div
                class="flex items-center gap-4 p-4 bg-surface-muted rounded-lg border border-subtle"
            >

                <span class="material-symbols-outlined text-primary">
                    call
                </span>

                <div>

                    <p class="text-label-sm text-outline uppercase tracking-wider">
                        Phone Number
                    </p>

                    <p class="font-bold text-on-surface-variant">
                        +94 77 123 4567
                    </p>

                </div>

            </div>


            <div
                class="flex items-center gap-4 p-4 bg-surface-muted rounded-lg border border-subtle"
            >

                <span class="material-symbols-outlined text-primary">
                    mail
                </span>

                <div>

                    <p class="text-label-sm text-outline uppercase tracking-wider">
                        Email Address
                    </p>

                    <p class="font-bold text-on-surface-variant">
                        caregiver@safehands.com
                    </p>

                </div>

            </div>

        </div>


    <?php else: ?>

        <!-- Logged-out contact -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div
                class="flex items-center gap-4 p-4 bg-surface-muted rounded-lg border border-subtle"
            >

                <span class="material-symbols-outlined text-outline">
                    call
                </span>

                <div>

                    <p class="text-label-sm text-outline uppercase tracking-wider">
                        Phone Number
                    </p>

                    <p class="font-bold text-on-surface-variant">
                        +94 ••• ••• •••
                    </p>

                </div>

            </div>


            <div
                class="flex items-center gap-4 p-4 bg-surface-muted rounded-lg border border-subtle"
            >

                <span class="material-symbols-outlined text-outline">
                    mail
                </span>

                <div>

                    <p class="text-label-sm text-outline uppercase tracking-wider">
                        Email Address
                    </p>

                    <p class="font-bold text-on-surface-variant">
                        s•••••@email.com
                    </p>

                </div>

            </div>

        </div>


        <div
            class="bg-primary/5 border border-primary/20 rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-6"
        >

            <div class="flex gap-4">

                <span
                    class="material-symbols-outlined text-primary shrink-0"
                    style="font-variation-settings: 'FILL' 1;"
                >
                    lock
                </span>

                <p class="text-body-md text-on-primary-fixed-variant">

                    Contact information is only available to registered
                    and logged-in Family Members.

                </p>

            </div>


            <a
                href="/safehands_mvc/login"
                class="whitespace-nowrap bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all shadow-sm"
            >
                Login to View Contact Details
            </a>

        </div>

    <?php endif; ?>

</section>



<!-- ========================================================= -->
<!-- PROFESSIONAL SKILLS -->
<!-- ========================================================= -->

<section>

    <h2
        class="font-headline-md text-headline-md text-on-surface mb-6"
    >
        Professional Skills
    </h2>


    <div class="flex flex-wrap gap-2">

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Medication Assistance
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Personal Hygiene Support
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Meal Preparation
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Mobility Assistance
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Companionship
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Dementia Care
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Blood Pressure Monitoring
        </span>

        <span class="bg-primary/5 text-primary border border-primary/20 px-4 py-2 rounded-xl text-label-md font-medium">
            Emergency Response
        </span>

    </div>

</section>



<!-- ========================================================= -->
<!-- WORK EXPERIENCE -->
<!-- ========================================================= -->

<section
    class="bg-surface-container-lowest rounded-xl border border-subtle p-6 md:p-8"
>

    <h2
        class="font-headline-md text-headline-md text-on-surface mb-8"
    >
        Work Experience
    </h2>


    <div class="space-y-12">


        <!-- Experience 1 -->

        <div class="flex gap-6 timeline-item relative">

            <div
                class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 timeline-dot relative z-10"
            >

                <span class="material-symbols-outlined text-primary">
                    home_health
                </span>

            </div>


            <div class="pt-1">

                <h3 class="font-bold text-on-surface text-body-lg">
                    Senior Home Care Specialist
                </h3>

                <p class="text-primary font-medium mb-2">
                    ABC Home Care
                </p>

                <span
                    class="bg-surface-muted px-2 py-1 rounded text-label-sm text-outline"
                >
                    2022 - Present
                </span>

                <p
                    class="mt-4 text-on-surface-variant text-body-md"
                >
                    Providing professional elderly care and supporting
                    clients with daily activities, medication reminders,
                    mobility, and companionship.
                </p>

            </div>

        </div>



        <!-- Experience 2 -->

        <div class="flex gap-6 timeline-item relative">

            <div
                class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 timeline-dot relative z-10"
            >

                <span class="material-symbols-outlined text-primary">
                    wb_sunny
                </span>

            </div>


            <div class="pt-1">

                <h3 class="font-bold text-on-surface text-body-lg">
                    Certified Care Assistant
                </h3>

                <p class="text-primary font-medium mb-2">
                    Sunrise Elder Care
                </p>

                <span
                    class="bg-surface-muted px-2 py-1 rounded text-label-sm text-outline"
                >
                    2019 - 2022
                </span>

                <p
                    class="mt-4 text-on-surface-variant text-body-md"
                >
                    Assisted clients with daily living activities,
                    monitored vital signs, and supported social
                    engagement.
                </p>

            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- CLIENT REVIEWS -->
<!-- ========================================================= -->

<section class="space-y-6">

    <div class="flex items-center justify-between">

        <h2
            class="font-headline-md text-headline-md text-on-surface"
        >
            Client Reviews
        </h2>

        <button
            class="text-primary font-label-md text-label-md hover:underline flex items-center gap-1"
        >
            View All Reviews

            <span class="material-symbols-outlined text-[18px]">
                arrow_forward
            </span>

        </button>

    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">


        <!-- Review 1 -->

        <div
            class="bg-surface-container-lowest border border-subtle p-6 rounded-xl flex flex-col h-full"
        >

            <div class="flex items-center gap-1 text-status-warning mb-3">

                ★★★★★

            </div>

            <p
                class="text-on-surface-variant italic mb-6 flex-grow"
            >
                "Sarah was incredible with my mother. Her professionalism
                and kind heart made a difficult transition much easier
                for our family."
            </p>

            <div>

                <p class="font-bold text-on-surface">
                    Amali Perera
                </p>

                <p class="text-label-sm text-outline">
                    October 2023
                </p>

            </div>

        </div>



        <!-- Review 2 -->

        <div
            class="bg-surface-container-lowest border border-subtle p-6 rounded-xl flex flex-col h-full"
        >

            <div class="flex items-center gap-1 text-status-warning mb-3">

                ★★★★★

            </div>

            <p
                class="text-on-surface-variant italic mb-6 flex-grow"
            >
                "Extremely punctual and organized. She handles medication
                reminders perfectly. Highly recommended for clinical
                home care."
            </p>

            <div>

                <p class="font-bold text-on-surface">
                    Ranjan Silva
                </p>

                <p class="text-label-sm text-outline">
                    August 2023
                </p>

            </div>

        </div>



        <!-- Review 3 -->

        <div
            class="bg-surface-container-lowest border border-subtle p-6 rounded-xl flex flex-col h-full"
        >

            <div class="flex items-center gap-1 text-status-warning mb-3">

                ★★★★★

            </div>

            <p
                class="text-on-surface-variant italic mb-6 flex-grow"
            >
                "Sarah's expertise in dementia care was evident from day
                one. She knew exactly how to de-escalate stressful
                situations."
            </p>

            <div>

                <p class="font-bold text-on-surface">
                    Dinali K.
                </p>

                <p class="text-label-sm text-outline">
                    July 2023
                </p>

            </div>

        </div>

    </div>

</section>


</div>



<!-- ========================================================= -->
<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->

<aside class="lg:col-span-4 space-y-gutter">


<?php if (!$isLoggedIn): ?>

    <!-- Guest notice -->

    <section
        class="bg-primary/5 border border-primary/20 rounded-xl p-6 flex gap-4"
    >

        <span
            class="material-symbols-outlined text-primary shrink-0"
            style="font-variation-settings: 'FILL' 1;"
        >
            lock
        </span>

        <p
            class="text-label-md text-on-primary-fixed-variant leading-relaxed"
        >

            Available work shifts, booking functionality, and caregiver
            contact information are only available to registered Family
            Members.

        </p>

    </section>



    <!-- Guest CTA -->

    <section
        class="bg-primary p-8 rounded-xl shadow-lg text-on-primary"
    >

        <h2
            class="font-headline-md text-headline-md mb-4"
        >
            Ready to Book This Caregiver?
        </h2>

        <p class="opacity-90 mb-8 text-body-md">

            Create a SafeHands account or sign in to view available
            shifts and request a booking with
            <?= htmlspecialchars($name) ?>.

        </p>


        <div class="flex flex-col gap-3">

            <a
                href="/safehands_mvc/login"
                class="w-full text-center bg-on-primary text-primary font-bold py-4 rounded-lg hover:bg-opacity-90 transition-all text-label-md"
            >
                Login
            </a>


            <a
                href="/safehands_mvc/register"
                class="w-full text-center bg-primary-container text-on-primary border border-on-primary/30 font-bold py-4 rounded-lg hover:bg-on-primary/10 transition-all text-label-md"
            >
                Create Account
            </a>

        </div>

    </section>


<?php else: ?>

    <!-- Logged-in booking CTA -->

    <section
        class="bg-primary p-8 rounded-xl shadow-lg text-on-primary"
    >

        <h2
            class="font-headline-md text-headline-md mb-4"
        >
            Ready to Book This Caregiver?
        </h2>

        <p class="opacity-90 mb-8 text-body-md">

            View available shifts and request a booking with
            <?= htmlspecialchars($name) ?>.

        </p>


        <a
            href="/safehands_mvc/caregiver/availability/<?= (int)($caregiver['id'] ?? 0) ?>"
            class="block w-full text-center bg-on-primary text-primary font-bold py-4 rounded-lg hover:bg-opacity-90 transition-all text-label-md"
        >
            Book Caregiver
        </a>

    </section>

<?php endif; ?>



<!-- ========================================================= -->
<!-- QUALIFICATIONS -->
<!-- ========================================================= -->

<section
    class="bg-surface-container-lowest rounded-xl border border-subtle p-6 space-y-4"
>

    <h2 class="font-bold text-on-surface text-body-lg">
        Qualifications
    </h2>


    <div class="grid grid-cols-1 gap-3">


        <div
            class="flex items-center gap-3 p-3 bg-surface-muted rounded-lg border border-subtle"
        >

            <span class="material-symbols-outlined text-primary">
                school
            </span>

            <span class="text-label-md font-medium">
                <?= htmlspecialchars($education) ?>
            </span>

        </div>


        <div
            class="flex items-center gap-3 p-3 bg-surface-muted rounded-lg border border-subtle"
        >

            <span class="material-symbols-outlined text-primary">
                card_membership
            </span>

            <span class="text-label-md font-medium">
                Certified Caregiver
            </span>

        </div>


        <div
            class="flex items-center gap-3 p-3 bg-surface-muted rounded-lg border border-subtle"
        >

            <span class="material-symbols-outlined text-primary">
                medical_information
            </span>

            <span class="text-label-md font-medium">
                First Aid Certified
            </span>

        </div>


        <div
            class="flex items-center gap-3 p-3 bg-surface-muted rounded-lg border border-subtle"
        >

            <span class="material-symbols-outlined text-primary">
                verified_user
            </span>

            <span class="text-label-md font-medium">
                Police Clearance Verified
            </span>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- SIMILAR CAREGIVERS -->
<!-- ========================================================= -->

<section class="space-y-4">

    <h2 class="font-bold text-on-surface text-body-lg">
        Similar Caregivers
    </h2>


    <div class="space-y-4">


        <div
            class="flex items-center gap-4 bg-surface-container-lowest p-4 rounded-xl border border-subtle hover:shadow-md transition-all cursor-pointer"
        >

            <div
                class="w-16 h-16 rounded-lg bg-primary/10 flex items-center justify-center shrink-0"
            >

                <span class="material-symbols-outlined text-primary">
                    person
                </span>

            </div>

            <div>

                <h3 class="font-bold text-on-surface">
                    Other Caregiver
                </h3>

                <div class="flex items-center gap-1 text-label-sm">

                    <span
                        class="material-symbols-outlined text-status-warning text-[14px]"
                        style="font-variation-settings: 'FILL' 1;"
                    >
                        star
                    </span>

                    4.8

                </div>

            </div>

        </div>


        <div
            class="flex items-center gap-4 bg-surface-container-lowest p-4 rounded-xl border border-subtle hover:shadow-md transition-all cursor-pointer"
        >

            <div
                class="w-16 h-16 rounded-lg bg-primary/10 flex items-center justify-center shrink-0"
            >

                <span class="material-symbols-outlined text-primary">
                    person
                </span>

            </div>

            <div>

                <h3 class="font-bold text-on-surface">
                    Professional Caregiver
                </h3>

                <div class="flex items-center gap-1 text-label-sm">

                    <span
                        class="material-symbols-outlined text-status-warning text-[14px]"
                        style="font-variation-settings: 'FILL' 1;"
                    >
                        star
                    </span>

                    4.7

                </div>

            </div>

        </div>


    </div>

</section>


</aside>

</div>

</main>



<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer
    class="bg-surface-container border-t border-subtle mt-16"
>

    <div
        class="flex flex-col md:flex-row justify-between items-center py-12 px-margin-desktop w-full max-w-container-max mx-auto gap-8"
    >


        <div
            class="flex flex-col items-center md:items-start gap-2"
        >

            <div
                class="font-headline-md text-headline-md text-primary font-bold"
            >
                SafeHands Healthcare
            </div>

            <p
                class="font-label-sm text-label-sm text-on-surface-variant"
            >
                © 2024 SafeHands Healthcare. All rights reserved.
            </p>

        </div>


        <div class="flex flex-wrap justify-center gap-8">

            <a
                class="font-label-sm text-label-sm text-on-surface-variant hover:underline hover:text-primary transition-colors"
                href="#"
            >
                Privacy Policy
            </a>

            <a
                class="font-label-sm text-label-sm text-on-surface-variant hover:underline hover:text-primary transition-colors"
                href="#"
            >
                Terms of Service
            </a>

            <a
                class="font-label-sm text-label-sm text-on-surface-variant hover:underline hover:text-primary transition-colors"
                href="#"
            >
                Cookie Policy
            </a>

            <a
                class="font-label-sm text-label-sm text-on-surface-variant hover:underline hover:text-primary transition-colors"
                href="#"
            >
                Accessibility
            </a>

        </div>


        <div class="flex gap-4">

            <a
                class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all"
                href="#"
            >

                <span class="material-symbols-outlined">
                    share
                </span>

            </a>


            <a
                class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all"
                href="#"
            >

                <span class="material-symbols-outlined">
                    mail
                </span>

            </a>

        </div>

    </div>

</footer>



<!-- ========================================================= -->
<!-- SIMPLE HOVER EFFECT -->
<!-- ========================================================= -->

<script>

    document
        .querySelectorAll('.cursor-pointer')
        .forEach(card => {

            card.addEventListener('mouseenter', () => {

                card.style.transform = 'translateY(-2px)';

            });

            card.addEventListener('mouseleave', () => {

                card.style.transform = 'translateY(0)';

            });

        });

</script>


</body>
</html>