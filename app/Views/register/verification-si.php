<!DOCTYPE html>
<html class="light" lang="si">

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=block" rel="stylesheet">

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
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },

                    spacing: {
                        gutter: "24px",
                        base: "8px",
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
                        "label-md": ["14px", {
                            lineHeight: "20px",
                            letterSpacing: "0.01em",
                            fontWeight: "500"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            letterSpacing: "-0.01em",
                            fontWeight: "600"
                        }],
                        "body-md": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "display-lg": ["48px", {
                            lineHeight: "56px",
                            letterSpacing: "-0.02em",
                            fontWeight: "700"
                        }],
                        "label-sm": ["12px", {
                            lineHeight: "16px",
                            letterSpacing: "0.05em",
                            fontWeight: "600"
                        }],
                        "headline-md": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "body-lg": ["18px", {
                            lineHeight: "28px",
                            fontWeight: "400"
                        }]
                    }
                }
            }
        };
    </script>

    <title>සත්‍යාපනය - SafeHands</title>

</head>


<body class="bg-surface text-on-background min-h-screen flex flex-col">


<!-- Navigation -->
<header class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest shadow-sm border-b border-subtle">

    <div class="flex items-center gap-2">

        <span class="font-headline-md text-headline-md font-bold text-primary">
            SafeHands
        </span>

    </div>


    <nav class="hidden md:flex items-center gap-8">

        <a href="#"
           class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors">
            රැකියා සොයන්න
        </a>

        <a href="#"
           class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors">
            සම්පත්
        </a>

        <a href="#"
           class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors">
            අප ගැන
        </a>

        <a href="/safehands_mvc/register.php"
           class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1">
            ලියාපදිංචි වන්න
        </a>

    </nav>


   <div class="flex items-center gap-4">

    <!-- Language Switcher -->
    <div class="flex items-center gap-1 border border-subtle rounded-lg px-2 py-1">

        <a
            href="/safehands_mvc/register/verification"
            class="px-2 py-1 rounded text-on-surface-variant font-label-md text-label-md hover:text-primary">
            English
        </a>

        <span class="text-on-surface-variant">|</span>

        <a
            href="/safehands_mvc/register/verificationSi"
            class="px-2 py-1 rounded text-primary font-label-md text-label-md font-bold">
            සිංහල
        </a>

    </div>


    <!-- Login -->
    <a
        href="/safehands_mvc/login/login.php"
        class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all">
        පිවිසෙන්න
    </a>

</div>

</header>


<!-- Main -->
<main class="flex-grow pt-24 pb-16 px-margin-mobile md:px-margin-desktop bg-surface">

    <div class="max-w-[800px] mx-auto">


        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 mb-6 text-on-surface-variant font-label-md text-label-md">

            <a href="/safehands_mvc/register.php"
               class="hover:text-primary transition-colors">
                ලියාපදිංචිය
            </a>

            <span class="material-symbols-outlined text-sm">
                chevron_right
            </span>

            <span class="font-bold text-on-background">
                Caregiver ලෙස ලියාපදිංචි වන්න
            </span>

        </nav>


        <!-- Header -->
        <div class="mb-12">

            <h1 class="font-display-lg text-display-lg text-primary mb-2">
                SafeHands Caregiver කෙනෙකු වන්න
            </h1>

            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                සත්‍යාපිත Caregiver කෙනෙකු ලෙස අයදුම් කිරීමට පහත පියවර සම්පූර්ණ කරන්න.
            </p>

        </div>


        <!-- Steps -->
        <div class="mb-12 flex flex-col md:flex-row items-center gap-4">


            <!-- Step 1 -->
            <div class="flex flex-1 items-center gap-3 p-4 bg-status-success rounded-xl text-on-primary shadow-md">

                <div class="w-8 h-8 rounded-full bg-on-primary text-status-success flex items-center justify-center font-bold">

                    <span class="material-symbols-outlined text-sm">
                        check
                    </span>

                </div>

                <span class="font-label-md text-label-md">
                    පුද්ගලික තොරතුරු
                </span>

            </div>


            <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


            <!-- Step 2 -->
            <div class="flex flex-1 items-center gap-3 p-4 bg-status-success rounded-xl text-on-primary shadow-md">

                <div class="w-8 h-8 rounded-full bg-on-primary text-status-success flex items-center justify-center font-bold">

                    <span class="material-symbols-outlined text-sm">
                        check
                    </span>

                </div>

                <span class="font-label-md text-label-md">
                    වෘත්තීය තොරතුරු
                </span>

            </div>


            <div class="hidden md:block w-8 h-[2px] bg-outline-variant"></div>


            <!-- Step 3 -->
            <div class="flex flex-1 items-center gap-3 p-4 bg-primary-container rounded-xl text-on-primary-container shadow-md">

                <div class="w-8 h-8 rounded-full bg-on-primary-container text-primary flex items-center justify-center font-bold">
                    3
                </div>

                <span class="font-label-md text-label-md">
                    සත්‍යාපනය
                </span>

            </div>

        </div>


        <!-- Card -->
        <div class="bg-surface-container-lowest border border-subtle rounded-xl shadow-sm overflow-hidden">

            <div class="p-8 md:p-12">

                <form action="/safehands_mvc/register/verificationSubmit"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-8">


                    <!-- Heading -->
                    <div>

                        <h3 class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                            <span class="material-symbols-outlined text-primary">
                                verified_user
                            </span>

                            සත්‍යාපන ලේඛන

                        </h3>


                        <div class="space-y-8">


                            <!-- Required -->
                            <section>

                                <h4 class="font-label-md text-label-md text-on-surface-variant mb-4 uppercase tracking-wider">
                                    අවශ්‍ය ලේඛන *
                                </h4>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                                    <!-- NIC Front -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-primary">
                                                badge
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                NIC ඉදිරිපස *
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="nic_front"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- NIC Back -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-primary">
                                                badge
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                NIC පිටුපස *
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="nic_back"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- Qualification -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-primary">
                                                school
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                සුදුසුකම් සහතිකය *
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="qualification_certificate"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- Police -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-primary">
                                                gavel
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                පොලිස් නිෂ්කාශන සහතිකය *
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="police_clearance"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- Profile -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted md:col-span-2">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-primary">
                                                account_circle
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                පැතිකඩ ඡායාරූපය *
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="profile_photo"
                                            accept=".jpg,.jpeg,.png"
                                            required
                                            class="block w-full text-sm"
                                        >

                                    </div>

                                </div>

                            </section>


                            <!-- Optional -->
                            <section>

                                <h4 class="font-label-md text-label-md text-on-surface-variant mb-4 uppercase tracking-wider">
                                    විකල්ප ලේඛන
                                </h4>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                                    <!-- First Aid -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-outline">
                                                medical_services
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                ප්‍රථමාධාර සහතිකය
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="first_aid_certificate"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- Experience -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-outline">
                                                description
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                සේවා පළපුරුද්දේ ලිපිය
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="experience_letter"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="block w-full text-sm"
                                        >

                                    </div>


                                    <!-- Medical -->
                                    <div class="border border-subtle rounded-lg p-4 bg-surface-muted md:col-span-2">

                                        <div class="flex items-center gap-3 mb-3">

                                            <span class="material-symbols-outlined text-outline">
                                                health_and_safety
                                            </span>

                                            <span class="font-body-md text-body-md">
                                                වෛද්‍ය යෝග්‍යතා සහතිකය
                                            </span>

                                        </div>

                                        <input
                                            type="file"
                                            name="medical_fitness_certificate"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="block w-full text-sm"
                                        >

                                    </div>

                                </div>

                            </section>

                        </div>

                    </div>


                    <!-- Confirmation -->
                    <div class="pt-8 border-t border-subtle">

                        <label class="flex items-start gap-3 cursor-pointer">

                            <input
                                class="mt-1 rounded border-subtle text-primary focus:ring-primary"
                                name="document_confirmation"
                                value="1"
                                required
                                type="checkbox"
                            >

                            <span class="font-body-md text-body-md text-on-surface-variant">
                                මම උඩුගත කරන ලද සියලුම ලේඛන සත්‍ය හා නිවැරදි බව තහවුරු කරමි.
                            </span>

                        </label>

                    </div>


                    <!-- Buttons -->
                    <div class="pt-12 flex flex-col-reverse md:flex-row justify-end gap-4">


                        <!-- Back -->
                        <button
                            type="button"
                            onclick="window.location.href='/safehands_mvc/register/professionalSi'"
                            class="h-12 px-8 rounded-xl border border-subtle text-on-surface-variant font-label-md text-label-md hover:bg-surface-muted transition-all">

                            <span class="material-symbols-outlined text-sm mr-1">
                                arrow_back
                            </span>

                            ආපසු

                        </button>


                        <!-- Submit -->
                         <button
    type="button"
    onclick="window.location.href='/safehands_mvc/register/successSi'"
    class="h-12 px-12 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">

    අයදුම්පත ඉදිරිපත් කරන්න

    <span class="material-symbols-outlined text-sm">
        send
    </span>

</button>

                    </div>

                </form>

            </div>

        </div>


        <!-- Support -->
        <div class="mt-12 bg-primary-container rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">

            <div class="md:w-1/2 p-8 md:p-12 text-on-primary-container">

                <h4 class="font-headline-md text-headline-md mb-4">
                    SafeHands සමඟ එක්වන්නේ ඇයි?
                </h4>

                <ul class="space-y-4 font-body-md text-body-md">

                    <li class="flex items-start gap-3">

                        <span class="material-symbols-outlined text-on-tertiary-container">
                            check_circle
                        </span>

                        <span>
                            බැංකු මාරු කිරීම් සමඟ තරඟකාරී ගෙවීම්.
                        </span>

                    </li>

                    <li class="flex items-start gap-3">

                        <span class="material-symbols-outlined text-on-tertiary-container">
                            check_circle
                        </span>

                        <span>
                            ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහන.
                        </span>

                    </li>

                    <li class="flex items-start gap-3">

                        <span class="material-symbols-outlined text-on-tertiary-container">
                            check_circle
                        </span>

                        <span>
                            අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු වැඩසටහන් සඳහා ප්‍රවේශය.
                        </span>

                    </li>

                </ul>

            </div>


            <div class="md:w-1/2 w-full h-64 md:h-80 overflow-hidden">

                <img
                    class="w-full h-full object-cover"
                    alt="Professional caregiver"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDIzMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyycM"
                >

            </div>

        </div>

    </div>

</main>


<!-- Footer -->
<footer class="w-full py-8 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-muted border-t border-subtle">

    <div class="flex flex-col gap-1 items-center md:items-start">

        <span class="font-headline-md text-headline-md font-bold text-primary">
            SafeHands
        </span>

        <p class="font-body-md text-body-md text-on-surface-variant opacity-90">
            © 2024 SafeHands Healthcare Services. සියලු හිමිකම් ඇවිරිණි.
        </p>

    </div>


    <div class="flex flex-wrap justify-center gap-6">

        <a href="#" class="font-body-md text-body-md text-on-surface-variant hover:underline">
            පෞද්ගලිකත්ව ප්‍රතිපත්තිය
        </a>

        <a href="#" class="font-body-md text-body-md text-on-surface-variant hover:underline">
            සේවා කොන්දේසි
        </a>

        <a href="#" class="font-body-md text-body-variant hover:underline">
            උපකාරක මධ්‍යස්ථානය
        </a>

        <a href="#" class="font-body-md text-body-md text-on-surface-variant hover:underline">
            සහාය අමතන්න
        </a>

    </div>

</footer>

</body>
</html>