 <!DOCTYPE html>
<html class="light" lang="si">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>ලියාපදිංචි වන්න - SafeHands රැකවරණ සේවක</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

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

    <!-- TOP NAVIGATION -->
    <header
        class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest dark:bg-inverse-surface shadow-sm border-b border-subtle dark:border-outline-variant">

        <div class="flex items-center gap-2">

            <span class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed">
                SafeHands
            </span>

        </div>


        <nav class="hidden md:flex items-center gap-8">

            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                රැකියා සොයන්න
            </a>

            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                සම්පත්
            </a>

            <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                අප ගැන
            </a>

            <a class="hover:text-primary transition-colors"
   href="/safehands_mvc/register.php">
    ලියාපදිංචි වන්න
</a>

        </nav>


        <!-- Language + Login -->
        <div class="flex items-center gap-4">

            <div class="flex items-center gap-2 font-label-md text-label-md">
               <a href="/safehands_mvc/register/caregiver">
    English
</a>

                <span class="text-outline-variant">|</span>

                <a href="caregiver-si.php"
                    class="text-primary font-bold hover:text-primary transition-all">
                    සිංහල
                </a>

            </div>


                 <!-- Login -->
            <a href="/safehands_mvc/login/login.php"
   class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-all">
     ඇතුල් වන්න
</a>

        </div>

    </header>


    <!-- MAIN -->
    <main class="flex-grow pt-24 pb-16 px-margin-mobile md:px-margin-desktop bg-surface">

        <div class="max-w-[800px] mx-auto">

            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 mb-6 text-on-surface-variant font-label-md text-label-md">

                <a class="hover:text-primary transition-colors"
   href="/safehands_mvc/register.php">
    ලියාපදිංචි වන්න
</a>

                <span class="material-symbols-outlined text-sm">
                    chevron_right
                </span>

                <span class="font-bold text-on-background">
                    රැකවරණ සේවකයෙකු වන්න
                </span>

            </nav>


            <!-- Page Header -->
            <div class="mb-12">

                <h1 class="font-display-lg text-display-lg text-primary mb-2">
                    SafeHands රැකවරණ සේවකයෙකු වන්න
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                    සත්‍යාපිත රැකවරණ සේවකයෙකු ලෙස අයදුම් කිරීමට සහ අප සමඟ ඔබේ වෘත්තීය ගමන ආරම්භ කිරීමට පහත පියවර සම්පූර්ණ කරන්න.
                </p>

            </div>


            <!-- PROGRESS -->
            <div class="mb-12 flex flex-col md:flex-row items-center gap-4">

                <!-- Step 1 -->
                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-primary-container rounded-xl text-on-primary-container shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary-container text-primary flex items-center justify-center font-bold">
                        1
                    </div>

                    <span class="font-label-md text-label-md">
                        පුද්ගලික තොරතුරු
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

                    <span class="font-label-md text-label-md">
                        වෘත්තීය තොරතුරු
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

                    <span class="font-label-md text-label-md">
                        සත්‍යාපනය
                    </span>

                </div>

            </div>


            <!-- FORM -->
            <div class="bg-surface-container-lowest border border-subtle rounded-xl shadow-sm overflow-hidden">

                <div class="p-8 md:p-12">

                    <form action="#" class="space-y-8">

                        <!-- Personal Details -->
                        <div>

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    person
                                </span>

                                පුද්ගලික තොරතුරු

                            </h3>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        සම්පූර්ණ නම
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="උදා: අංජලී පෙරේරා"
                                        type="text" />

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        ජාතික හැඳුනුම්පත් අංකය
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="9xxxxxxxxV"
                                        type="text" />

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        උපන් දිනය
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        type="date" />

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        ස්ත්‍රී / පුරුෂ භාවය
                                    </label>

                                    <select
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all">

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

                        </div>


                        <!-- Contact -->
                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    home
                                </span>

                                සම්බන්ධතා සහ ලිපිනය

                            </h3>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        දුරකථන අංකය
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="+94 7x xxx xxxx"
                                        type="tel" />

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        විද්‍යුත් තැපැල් ලිපිනය
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="anjali@example.com"
                                        type="email" />

                                </div>


                                <div class="flex flex-col gap-2 md:col-span-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        නිවසේ ලිපිනය
                                    </label>

                                    <textarea
                                        class="p-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="වීථිය, නගරය, තැපැල් කේතය"
                                        rows="2"></textarea>

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        දිස්ත්‍රික්කය
                                    </label>

                                    <select
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all">

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

                        </div>


                        <!-- Security -->
                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span class="material-symbols-outlined text-primary">
                                    lock
                                </span>

                                ගිණුම් ආරක්ෂාව

                            </h3>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        මුරපදය
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="අවම අක්ෂර 8ක්"
                                        type="password" />

                                </div>


                                <div class="flex flex-col gap-2">

                                    <label class="font-label-md text-label-md text-on-background">
                                        මුරපදය තහවුරු කරන්න
                                    </label>

                                    <input
                                        class="h-12 px-4 rounded-xl border border-subtle bg-surface-muted form-focus-ring font-body-md text-body-md transition-all"
                                        placeholder="මුරපදය නැවත ඇතුළත් කරන්න"
                                        type="password" />

                                </div>

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="pt-12 flex flex-col-reverse md:flex-row justify-end gap-4">

                            <button
                                class="h-12 px-8 rounded-xl border border-subtle text-on-surface-variant font-label-md text-label-md hover:bg-surface-muted transition-all"
                                type="button">

                                අවලංගු කරන්න

                            </button>


                        <button 
    type="button"
    onclick="window.location.href='/safehands_mvc/register/professionalSi'"
    class="h-12 px-12 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">

    ඊළඟ
</button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- WHY SAFEHANDS -->
            <div
                class="mt-12 bg-primary-container rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">

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
                                බැංකු හරහා සෘජු ගෙවීම් සමඟ තරඟකාරී වැටුප්.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහනක්.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span class="material-symbols-outlined text-on-tertiary-container">
                                check_circle
                            </span>

                            <span>
                                අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු මොඩියුල සඳහා ප්‍රවේශය.
                            </span>

                        </li>

                    </ul>

                </div>


                <div class="md:w-1/2 w-full h-64 md:h-80 overflow-hidden">

                    <img
                        class="w-full h-full object-cover"
                        alt="වෘත්තීය රැකවරණ සේවකයෙකු"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDizMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc" />

                </div>

            </div>

        </div>

    </main>


    <!-- FOOTER -->
    <footer
        class="w-full py-8 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-muted dark:bg-inverse-surface border-t border-subtle dark:border-outline-variant">

        <div class="flex flex-col gap-1 items-center md:items-start">

            <span class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed">
                SafeHands
            </span>

            <p class="font-body-md text-body-md text-on-surface-variant opacity-90">
                © 2024 SafeHands Healthcare Services. සියලු හිමිකම් ඇවිරිණි.
            </p>

        </div>


        <div class="flex flex-wrap justify-center gap-6">

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                පෞද්ගලිකත්ව ප්‍රතිපත්තිය
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                සේවා කොන්දේසි
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                උපකාරක මධ්‍යස්ථානය
            </a>

            <a class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary transition-opacity opacity-90 hover:opacity-100"
                href="#">
                සහාය අමතන්න
            </a>

        </div>

    </footer>


    <!-- JAVASCRIPT -->
    <script>

        document.querySelector('form').addEventListener('submit', function (e) {

            e.preventDefault();

            const btn = e.target.querySelector('button[type="submit"]');

            const originalContent = btn.innerHTML;

            btn.innerHTML =
                '<span class="material-symbols-outlined animate-spin">progress_activity</span> Processing...';

            btn.disabled = true;

            setTimeout(() => {

                alert('පියවර 2 වෙත යමින් පවතී: වෘත්තීය තොරතුරු...');

                btn.innerHTML = originalContent;

                btn.disabled = false;

            }, 1000);

        });


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