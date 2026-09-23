<!DOCTYPE html>
<html class="light" lang="si">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>වෘත්තීය තොරතුරු - SafeHands</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=block"
        rel="stylesheet">

    <!-- Tailwind -->
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
                        "on-surface-variant": "#434655",
                        "surface-container-low": "#f0f3ff",
                        "on-tertiary": "#ffffff",
                        "surface-muted": "#F8FAFC",
                        "on-tertiary-container": "#ffede6",
                        "error": "#ba1a1a",
                        "primary-fixed": "#dbe1ff",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#737686",
                        "on-surface": "#111c2d",
                        "surface-container": "#e7eeff",
                        "surface-container-high": "#dee8ff",
                        "surface-container-highest": "#d8e3fb",
                        "outline-variant": "#c3c6d7",
                        "status-success": "#025747"
                    },

                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },

                    spacing: {
                        "margin-mobile": "16px",
                        "margin-desktop": "40px"
                    },

                    fontFamily: {
                        "label-md": ["Inter"],
                        "body-md": ["Inter"],
                        "display-lg": ["Inter"],
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


    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/caregiver-register.css">

</head>


<body class="bg-surface text-on-background min-h-screen flex flex-col">


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <header
        class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest shadow-sm border-b border-subtle">

        <div class="flex items-center gap-2">

            <span
                class="font-headline-md text-headline-md font-bold text-primary">

                SafeHands

            </span>

        </div>


        <nav class="hidden md:flex items-center gap-8">

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                රැකියා සොයන්න
            </a>

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                සම්පත්
            </a>

            <a
                class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors"
                href="#">
                අප ගැන
            </a>

            <a
                class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1"
                href="/safehands_mvc/register.php">

                ලියාපදිංචි වන්න

            </a>

        </nav>


        <!-- Language + Login -->

        <div class="flex items-center gap-4">


            <div class="flex items-center gap-2 font-label-md text-label-md">

                <a
                    href="/safehands_mvc/register/professional"
                    class="text-on-surface-variant hover:text-primary transition-all">

                    English

                </a>

                <span class="text-outline-variant">|</span>

                <a
                    href="/safehands_mvc/register/professionalSi"
                    class="text-primary font-bold hover:text-primary transition-all">

                    සිංහල

                </a>

            </div>


            <a
                href="/safehands_mvc/login/login.php"
                class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all">

                ඇතුල් වන්න

            </a>

        </div>

    </header>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main
        class="flex-grow pt-24 pb-16 px-margin-mobile md:px-margin-desktop bg-surface">

        <div class="max-w-[800px] mx-auto">


            <!-- Breadcrumb -->

            <nav
                class="flex items-center gap-2 mb-6 text-on-surface-variant font-label-md text-label-md">

                <a
                    class="hover:text-primary transition-colors"
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


            <!-- Heading -->

            <div class="mb-12">

                <h1
                    class="font-display-lg text-display-lg text-primary mb-2">

                    SafeHands රැකවරණ සේවකයෙකු වන්න

                </h1>


                <p
                    class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">

                    සත්‍යාපිත රැකවරණ සේවකයෙකු ලෙස අයදුම් කිරීමට සහ අප සමඟ ඔබේ වෘත්තීය ගමන ආරම්භ කිරීමට පහත පියවර සම්පූර්ණ කරන්න.

                </p>

            </div>


            <!-- =================================================
                 STEPS
            ================================================== -->

            <div
                class="mb-12 flex flex-col md:flex-row items-center gap-4">


                <!-- STEP 1 -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-status-success rounded-xl text-on-primary shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary text-status-success flex items-center justify-center font-bold">

                        <span class="material-symbols-outlined text-sm">
                            check
                        </span>

                    </div>

                    <span class="font-label-md text-label-md">
                        පුද්ගලික තොරතුරු
                    </span>

                </div>


                <div
                    class="hidden md:block w-8 h-[2px] bg-outline-variant">
                </div>


                <!-- STEP 2 -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-primary-container rounded-xl text-on-primary-container shadow-md">

                    <div
                        class="w-8 h-8 rounded-full bg-on-primary-container text-primary flex items-center justify-center font-bold">

                        2

                    </div>

                    <span class="font-label-md text-label-md">
                        වෘත්තීය තොරතුරු
                    </span>

                </div>


                <div
                    class="hidden md:block w-8 h-[2px] bg-outline-variant">
                </div>


                <!-- STEP 3 -->

                <div
                    class="flex flex-1 items-center gap-3 p-4 bg-surface-container-high rounded-xl text-on-surface-variant shadow-sm">

                    <div
                        class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold">

                        3

                    </div>

                    <span class="font-label-md text-label-md">
                        සත්‍යාපනය
                    </span>

                </div>

            </div>


            <!-- =================================================
                 FORM
            ================================================== -->

            <div
                class="bg-surface-container-lowest border border-subtle rounded-xl shadow-sm overflow-hidden">

                <div class="p-8 md:p-12">


                    <form
                        action="/safehands_mvc/register/saveProfessional"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-8">


                        <!-- Professional Details -->

                        <div>

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span
                                    class="material-symbols-outlined text-primary">
                                    work
                                </span>

                                වෘත්තීය තොරතුරු

                            </h3>


                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-6">


                                <!-- Qualification -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        ඉහළම අධ්‍යාපන සුදුසුකම *

                                    </label>

                                    <select
                                        name="highest_qualification"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                        <option value="">
                                            සුදුසුකම තෝරන්න
                                        </option>

                                        <option value="Diploma in Nursing">
                                            හෙද ඩිප්ලෝමාව
                                        </option>

                                        <option value="BSc Nursing">
                                            BSc හෙද උපාධිය
                                        </option>

                                        <option value="Caregiving Certificate">
                                            රැකවරණ සේවා සහතිකය
                                        </option>

                                        <option value="Other">
                                            වෙනත්
                                        </option>

                                    </select>

                                </div>


                                <!-- Experience -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        සේවා පළපුරුද්ද (වසර) *

                                    </label>

                                    <input
                                        type="number"
                                        name="years_experience"
                                        min="0"
                                        placeholder="උදා: 5"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Certifications -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        වෘත්තීය සහතික *

                                    </label>

                                    <input
                                        type="text"
                                        name="professional_certification"
                                        placeholder="උදා: CPR, First Aid"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Languages -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        කතා කරන භාෂා *

                                    </label>

                                    <input
                                        type="text"
                                        name="languages"
                                        placeholder="උදා: සිංහල, ඉංග්‍රීසි"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Service Areas -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        සේවා ප්‍රදේශ / දිස්ත්‍රික්ක *

                                    </label>

                                    <input
                                        type="text"
                                        name="service_areas"
                                        placeholder="උදා: කොළඹ, ගම්පහ"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required>

                                </div>


                                <!-- Daily Rate -->

                                <div class="flex flex-col gap-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        අපේක්ෂිත දෛනික ගාස්තුව (විකල්ප)

                                    </label>

                                    <input
                                        type="text"
                                        name="expected_daily_rate"
                                        placeholder="උදා: රු. 5,000"
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary">

                                </div>


                                <!-- Biography -->

                                <div
                                    class="flex flex-col gap-2 md:col-span-2">

                                    <label
                                        class="font-label-md text-label-md text-on-background">

                                        කෙටි වෘත්තීය හැඳින්වීම *

                                    </label>

                                    <textarea
                                        name="description"
                                        rows="4"
                                        placeholder="ඔබගේ පළපුරුද්ද සහ රැකවරණ සේවාව සඳහා ඇති කැමැත්ත පිළිබඳව අපට කියන්න..."
                                        class="block w-full rounded-lg border-subtle text-sm text-on-surface-variant focus:ring-primary"
                                        required></textarea>

                                </div>

                            </div>

                        </div>


                        <!-- Profile Photo -->

                        <div class="pt-8 border-t border-subtle">

                            <h3
                                class="font-headline-md text-headline-md text-on-background mb-6 flex items-center gap-2">

                                <span
                                    class="material-symbols-outlined text-primary">
                                    account_circle
                                </span>

                                පැතිකඩ ඡායාරූපය

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

                                        උඩුගත කිරීමට ක්ලික් කරන්න හෝ ඇද දමන්න

                                    </p>

                                    <p class="text-sm text-on-surface-variant">

                                        PNG, JPG හෝ GIF (උපරිම 2MB)

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

                                    ගොනුව තෝරන්න

                                </button>


                                <p
                                    id="selected-file-name"
                                    class="text-sm text-primary hidden">
                                </p>

                            </div>

                        </div>


                        <!-- Buttons -->

                        <div
                            class="pt-12 flex flex-col-reverse md:flex-row justify-end gap-4">


                            <!-- BACK -->
 <button
    type="button"
    onclick="window.location.href='/safehands_mvc/register/caregiverSi'"
    class="h-12 px-8 rounded-xl border border-subtle text-on-surface-variant font-label-md text-label-md hover:bg-surface-muted transition-all flex items-center justify-center">

    <span class="material-symbols-outlined text-sm mr-1">
        arrow_back
    </span>

    ආපසු
</button>


                            <!-- SAVE -->
 <button
    type="button"
    onclick="window.location.href='/safehands_mvc/register/verificationSi'"
    class="h-12 px-12 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2">

    ඉදිරියට

    <span class="material-symbols-outlined text-sm">
        arrow_forward
    </span>

</button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- WHY SAFEHANDS -->

            <div
                class="mt-12 bg-primary-container rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">


                <div
                    class="md:w-1/2 p-8 md:p-12 text-on-primary-container">

                    <h4
                        class="font-headline-md text-headline-md mb-4">

                        SafeHands සමඟ එක්වන්නේ ඇයි?

                    </h4>


                    <ul
                        class="space-y-4 font-body-md text-body-md">


                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">

                                check_circle

                            </span>

                            <span>
                                බැංකු හරහා සෘජු ගෙවීම් සමඟ තරඟකාරී වැටුප්.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">

                                check_circle

                            </span>

                            <span>
                                ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහනක්.
                            </span>

                        </li>


                        <li class="flex items-start gap-3">

                            <span
                                class="material-symbols-outlined text-on-tertiary-container">

                                check_circle

                            </span>

                            <span>
                                අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු මොඩියුල සඳහා ප්‍රවේශය.
                            </span>

                        </li>

                    </ul>

                </div>


                <div
                    class="md:w-1/2 w-full h-64 md:h-80 overflow-hidden">

                    <img
                        class="w-full h-full object-cover"
                        alt="වෘත්තීය රැකවරණ සේවකයෙකු"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDIzMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyyE6mCqkISP4R-5aKyFf26H3yR0-wlXziyQcTc">

                </div>

            </div>

        </div>

    </main>


    <!-- FOOTER -->

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
                සියලු හිමිකම් ඇවිරිණි.

            </p>

        </div>


        <div
            class="flex flex-wrap justify-center gap-6">

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                පෞද්ගලිකත්ව ප්‍රතිපත්තිය
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                සේවා කොන්දේසි
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                උපකාරක මධ්‍යස්ථානය
            </a>

            <a
                class="font-body-md text-body-md text-on-surface-variant hover:underline hover:text-primary"
                href="#">
                සහාය අමතන්න
            </a>

        </div>

    </footer>


    <!-- FILE NAME DISPLAY -->

    <script>

        const profileInput =
            document.getElementById('profile-photo-upload');

        const selectedFileName =
            document.getElementById('selected-file-name');


        profileInput.addEventListener('change', function () {

            if (this.files.length > 0) {

                selectedFileName.textContent =
                    'තෝරාගත් ගොනුව: ' + this.files[0].name;

                selectedFileName.classList.remove('hidden');

            } else {

                selectedFileName.classList.add('hidden');

            }

        });


        // Focus effects

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