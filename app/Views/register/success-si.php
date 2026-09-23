<!DOCTYPE html>
<html class="light" lang="si">

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>SafeHands - අයදුම්පත සාර්ථකයි</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-background": "#111c2d",
                        "surface": "#f9f9ff",
                        "primary": "#004ac6",
                        "on-surface-variant": "#434655",
                        "surface-muted": "#F8FAFC",
                        "surface-container-lowest": "#ffffff",
                        "status-warning": "#FEBB02",
                        "on-primary": "#ffffff",
                        "border-subtle": "#F1F5F9",
                        "status-success": "#025747",
                        "outline": "#737686"
                    },

                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },

                    spacing: {
                        "margin-mobile": "16px",
                        "margin-desktop": "40px"
                    },

                    fontFamily: {
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"]
                    },

                    fontSize: {
                        "label-md": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "500"
                        }],
                        "label-sm": ["12px", {
                            lineHeight: "16px",
                            fontWeight: "600"
                        }],
                        "headline-md": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            fontWeight: "600"
                        }],
                        "body-md": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "400"
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
        }

        .success-animation {
            animation: scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes scaleIn {

            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }

        }

    </style>

</head>


<body class="bg-surface-container-lowest text-on-background min-h-screen flex flex-col">


<main class="flex-grow flex items-center justify-center px-margin-mobile md:px-margin-desktop py-12">

    <div class="max-w-[1000px] w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">


        <!-- Image -->
        <div class="hidden lg:block relative rounded-xl overflow-hidden shadow-xl aspect-[4/5]">

            <img
                class="w-full h-full object-cover"
                alt="Caregiver helping an elderly person"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTzLQuLTMUYNQq_N7zjVsQPKF3ylmswkkc2P5a5Rtq7cb_rsmrukTmnaSPp4t7K5k3iXKC7unzn457Q2Dugm4Kix3NkIh23iLoOYLZtMS8UmvTOwRHHVlwP8nT5yhY5JowJMMvKco92sraV_FYpIX3jNAWGViYlhBGVCvvDHbx5qGv9LijYULR5Jo4SLdzqJNTjWFC74BV8ZI6w2XBmEsgZx3GiEV8f0ctugnz0cBxJEvPSuPhP3bF5DyYqDjb-yfzouk51Fs1RRQ"
            >

            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

            <div class="absolute bottom-8 left-8 right-8 text-white">

                <p class="font-headline-md text-headline-md mb-2">
                    Caregivers සවිබල ගැන්වීම
                </p>

                <p class="font-body-md text-body-md opacity-90">
                    නිවසේදී උසස් තත්ත්වයේ සෞඛ්‍ය සේවාවක් ලබා දීමට කැපවූ වෘත්තීයවේදීන්ගේ ජාලයට එක්වන්න.
                </p>

            </div>

        </div>


        <!-- Content -->
        <div class="flex flex-col items-center lg:items-start text-center lg:text-left space-y-8">


            <!-- Language -->
            <div class="self-end flex items-center gap-1 border border-border-subtle rounded-lg px-2 py-1">

                <a
                    href="/safehands_mvc/register/success"
                    class="px-2 py-1 rounded text-on-surface-variant font-label-md text-label-md hover:text-primary">
                    English
                </a>

                <span class="text-on-surface-variant">
                    |
                </span>

                <a
                    href="/safehands_mvc/register/successSi"
                    class="px-2 py-1 rounded text-primary font-label-md text-label-md font-bold">
                    සිංහල
                </a>

            </div>


            <!-- Success Icon -->
            <div class="w-20 h-20 bg-status-success/10 rounded-full flex items-center justify-center success-animation">

                <span
                    class="material-symbols-outlined text-[48px] text-status-success"
                    style="font-variation-settings: 'FILL' 1;">
                    check_circle
                </span>

            </div>


            <!-- Heading -->
            <div class="space-y-4">

                <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background">
                    අයදුම්පත සාර්ථකව ඉදිරිපත් කරන ලදී
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">
                    SafeHands සඳහා අයදුම් කිරීම පිළිබඳව ඔබට ස්තූතියි. ඉහළම සත්කාර ප්‍රමිතීන් සහතික කිරීම සඳහා අපගේ පරිපාලන කණ්ඩායම ඔබගේ තොරතුරු සමාලෝචනය කරනු ඇත.
                </p>

            </div>


            <!-- Status -->
            <div class="flex items-center gap-2 px-4 py-2 bg-status-warning/10 rounded-full border border-status-warning/20">

                <span class="w-2 h-2 rounded-full bg-status-warning animate-pulse"></span>

                <span class="font-label-md text-label-md text-on-surface-variant">
                    සත්‍යාපනය බලාපොරොත්තුවෙන්
                </span>

            </div>


            <!-- Info -->
            <div class="w-full bg-surface-muted border border-border-subtle rounded-xl p-6 shadow-sm">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <div class="space-y-1">

                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">
                            සමාලෝචන තත්ත්වය
                        </p>

                        <div class="flex items-center gap-2">

                            <span class="material-symbols-outlined text-primary text-[20px]">
                                assignment_ind
                            </span>

                            <p class="font-body-md text-body-md font-semibold">
                                සමාලෝචනය බලාපොරොත්තුවෙන්
                            </p>

                        </div>

                    </div>


                    <div class="space-y-1">

                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">
                            ඇස්තමේන්තුගත කාලය
                        </p>

                        <div class="flex items-center gap-2">

                            <span class="material-symbols-outlined text-primary text-[20px]">
                                schedule
                            </span>

                            <p class="font-body-md text-body-md font-semibold">
                                වැඩ කරන දින 1-3
                            </p>

                        </div>

                    </div>

                </div>


                <div class="mt-6 pt-6 border-t border-border-subtle">

                    <p class="font-body-md text-body-md text-on-surface-variant italic text-sm">
                        ඔබගේ ගිණුම සත්‍යාපනය කළ පසු ඔබට විද්‍යුත් තැපැල් දැනුම්දීමක් ලැබෙනු ඇත.
                    </p>

                </div>

            </div>


            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 w-full">

                <a
                    class="flex-1 bg-primary text-on-primary font-label-md text-label-md px-8 py-3 rounded-lg text-center hover:bg-primary/90 transition-all shadow-md active:scale-95"
                    href="/safehands_mvc/login/login.php">

                    පිවිසීමට

                </a>


                <a
                    class="flex-1 bg-surface-container-lowest border border-border-subtle text-on-surface-variant font-label-md text-label-md px-8 py-3 rounded-lg text-center hover:bg-surface-muted transition-all active:scale-95"
                    href="/safehands_mvc/index.php">

                    මුල් පිටුවට

                </a>

            </div>


            <!-- Help -->
            <div class="pt-4">

                <p class="font-body-md text-body-md text-on-surface-variant">

                    උදව් අවශ්‍යද?

                    <a
                        class="text-primary font-semibold hover:underline"
                        href="#">
                        සහාය අමතන්න
                    </a>

                </p>

            </div>

        </div>

    </div>

</main>


<!-- Footer -->
<footer class="w-full py-8 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-muted border-t border-subtle">

    <div class="font-headline-md text-headline-md font-bold text-primary">
        SafeHands
    </div>

    <div class="flex flex-wrap justify-center gap-6">

        <a href="#" class="font-body-md text-on-surface-variant hover:underline">
            පෞද්ගලිකත්ව ප්‍රතිපත්තිය
        </a>

        <a href="#" class="font-body-md text-on-surface-variant hover:underline">
            සේවා කොන්දේසි
        </a>

        <a href="#" class="font-body-md text-on-surface-variant hover:underline">
            උපකාරක මධ්‍යස්ථානය
        </a>

        <a href="#" class="font-body-md text-on-surface-variant hover:underline">
            සහාය අමතන්න
        </a>

    </div>

    <div class="font-body-md text-on-surface-variant opacity-75">
        © 2024 SafeHands Healthcare Services. සියලු හිමිකම් ඇවිරිණි.
    </div>

</footer>


<script>

    document.addEventListener('DOMContentLoaded', () => {

        const container = document.querySelector('main');

        container.style.opacity = '0';
        container.style.transform = 'translateY(10px)';

        setTimeout(() => {

            container.style.transition =
                'all 0.6s cubic-bezier(0.16, 1, 0.3, 1)';

            container.style.opacity = '1';
            container.style.transform = 'translateY(0)';

        }, 100);

    });

</script>

</body>
</html>