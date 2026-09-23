<?php

$caregiver = $caregiver ?? [];

$name = $caregiver['name'] ?? 'Caregiver';
$specialization = $caregiver['specialization'] ?? 'Caregiver';
$district = $caregiver['district'] ?? 'Not specified';
$experience = $caregiver['experience'] ?? 'Not specified';
$rating = $caregiver['rating'] ?? '0.0';
$languages = $caregiver['languages'] ?? [];
$image = $caregiver['image'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($name) ?> | Availability | SafeHands
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet"
    >

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

    </style>

</head>


<body class="bg-[#f9f9ff] text-[#111c2d] min-h-screen">


<!-- ========================================================= -->
<!-- NAVIGATION -->
<!-- ========================================================= -->

<header class="w-full sticky top-0 bg-white border-b border-[#F1F5F9] shadow-sm z-50">

    <div
        class="flex justify-between items-center h-20 px-4 md:px-10 max-w-[1280px] mx-auto"
    >

        <!-- Logo -->

        <div class="flex items-center gap-8">

            <a
                href="/safehands_mvc/"
                class="text-2xl font-bold text-[#004ac6]"
            >
                SafeHands
            </a>


            <!-- Navigation -->

            <nav class="hidden lg:flex items-center gap-6">

                <a
                    href="/safehands_mvc/"
                    class="text-[#434655] hover:text-[#004ac6]"
                >
                    Dashboard
                </a>

                <a
                    href="#"
                    class="text-[#434655] hover:text-[#004ac6]"
                >
                    Patients
                </a>

                <a
                    href="/safehands_mvc/caregiver"
                    class="text-[#004ac6] font-bold border-b-2 border-[#004ac6] pb-1"
                >
                    Find Caregivers
                </a>

                <a
                    href="#"
                    class="text-[#434655] hover:text-[#004ac6]"
                >
                    My Bookings
                </a>

            </nav>

        </div>


        <!-- Right side -->

        <div class="flex items-center gap-4">

            <!-- Notification -->

            <button
                type="button"
                class="material-symbols-outlined text-[#434655] p-2 hover:bg-[#f0f3ff] rounded-full"
            >
                notifications
            </button>


            <!-- User -->

            <div class="flex items-center gap-2 pl-4 border-l border-[#F1F5F9]">

                <div
                    class="w-10 h-10 rounded-full bg-[#2563eb] flex items-center justify-center text-white font-bold"
                >
                    AM
                </div>

                <span class="hidden md:block font-medium">
                    Aditya Mendis
                </span>

                <span class="material-symbols-outlined text-[#434655]">
                    expand_more
                </span>

            </div>

        </div>

    </div>

</header>



<!-- ========================================================= -->
<!-- MAIN -->
<!-- ========================================================= -->

<main class="max-w-[1280px] mx-auto px-4 md:px-10 py-8">


    <!-- Breadcrumb -->

    <nav class="flex items-center gap-2 text-sm text-[#434655] mb-6">

        <a
            href="/safehands_mvc/"
            class="hover:text-[#004ac6]"
        >
            Dashboard
        </a>

        <span class="material-symbols-outlined text-[16px]">
            chevron_right
        </span>

        <a
            href="/safehands_mvc/caregiver"
            class="hover:text-[#004ac6]"
        >
            Find Caregivers
        </a>

        <span class="material-symbols-outlined text-[16px]">
            chevron_right
        </span>

        <span class="text-[#004ac6] font-medium">
            Caregiver Availability
        </span>

    </nav>



    <!-- ===================================================== -->
    <!-- CAREGIVER HEADER -->
    <!-- ===================================================== -->

    <section
        class="bg-white border border-[#F1F5F9] rounded-xl shadow-sm overflow-hidden p-6 md:p-8 mb-8"
    >

        <div class="flex flex-col md:flex-row gap-8 items-start md:items-center">


            <!-- Image -->

            <div class="relative shrink-0">

                <div
                    class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-[#e7eeff] bg-cover bg-center"
                    style="background-image: url('<?= htmlspecialchars($image) ?>');"
                ></div>

                <div
                    class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow-sm"
                >

                    <span
                        class="material-symbols-outlined text-[#004ac6]"
                        style="font-variation-settings:'FILL' 1;"
                    >
                        verified
                    </span>

                </div>

            </div>


            <!-- Details -->

            <div class="flex-grow">

                <div class="flex flex-wrap items-center gap-3 mb-2">

                    <h1 class="text-3xl font-bold">
                        <?= htmlspecialchars($name) ?>
                    </h1>

                    <span
                        class="px-3 py-1 bg-[#025747]/10 text-[#025747] text-xs font-semibold rounded-full flex items-center gap-1"
                    >

                        <span class="w-2 h-2 rounded-full bg-[#025747]"></span>

                        Currently Accepting Bookings

                    </span>

                </div>


                <p class="text-lg text-[#434655] mb-4">

                    <?= htmlspecialchars($specialization) ?>

                </p>


                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">


                    <!-- Rating -->

                    <div class="flex items-center gap-2">

                        <span
                            class="material-symbols-outlined text-[#FEBB02]"
                            style="font-variation-settings:'FILL' 1;"
                        >
                            star
                        </span>

                        <span class="font-medium">

                            <?= htmlspecialchars($rating) ?>

                        </span>

                    </div>


                    <!-- Location -->

                    <div class="flex items-center gap-2">

                        <span class="material-symbols-outlined text-[#737686]">
                            location_on
                        </span>

                        <span class="font-medium">

                            <?= htmlspecialchars($district) ?>

                        </span>

                    </div>


                    <!-- Languages -->

                    <div class="flex items-center gap-2">

                        <span class="material-symbols-outlined text-[#737686]">
                            translate
                        </span>

                        <span class="font-medium">

                            <?= htmlspecialchars(
                                implode(', ', $languages)
                            ) ?>

                        </span>

                    </div>


                    <!-- Experience -->

                    <div class="flex items-center gap-2">

                        <span class="material-symbols-outlined text-[#737686]">
                            history
                        </span>

                        <span class="font-medium">

                            <?= htmlspecialchars($experience) ?>

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ===================================================== -->
    <!-- AVAILABILITY CALENDAR -->
    <!-- ===================================================== -->

    <section
        class="bg-white border border-[#F1F5F9] rounded-xl p-6 md:p-8 shadow-sm"
    >

        <!-- Calendar header -->

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

            <h2 class="text-2xl font-semibold">
                Availability Calendar
            </h2>


            <div class="flex items-center gap-4">

                <h3 class="text-2xl font-semibold text-[#004ac6]">
                    July 2026
                </h3>


                <div class="flex items-center border border-[#F1F5F9] rounded-lg overflow-hidden">

                    <button
                        type="button"
                        class="p-2 hover:bg-[#f0f3ff]"
                        title="Previous Month"
                    >

                        <span class="material-symbols-outlined">
                            chevron_left
                        </span>

                    </button>


                    <button
                        type="button"
                        class="p-2 hover:bg-[#f0f3ff] border-l border-[#F1F5F9]"
                        title="Next Month"
                    >

                        <span class="material-symbols-outlined">
                            chevron_right
                        </span>

                    </button>

                </div>

            </div>

        </div>



        <!-- Calendar -->

        <div
            class="grid grid-cols-7 gap-px bg-[#c3c6d7] border border-[#c3c6d7] rounded-xl overflow-hidden shadow-sm"
        >


            <!-- Week headers -->

            <?php

            $days = [
                'Mon',
                'Tue',
                'Wed',
                'Thu',
                'Fri',
                'Sat',
                'Sun'
            ];

            foreach ($days as $day):

            ?>

                <div
                    class="bg-[#f0f3ff] py-3 text-center text-xs font-bold text-[#434655] uppercase"
                >

                    <?= $day ?>

                </div>

            <?php endforeach; ?>



            <!-- Empty June days -->

            <div class="bg-[#F8FAFC]/30 h-32 p-3 text-right text-sm text-[#737686]">
                29
            </div>

            <div class="bg-[#F8FAFC]/30 h-32 p-3 text-right text-sm text-[#737686]">
                30
            </div>



            <!-- Day 1 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    1 Jul
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 MORNING
                    </div>

                    <div class="shift booked">
                        ⚫ AFTERNOON
                    </div>

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 2 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    2
                </span>

                <div class="space-y-1.5">

                    <div class="shift booked">
                        ⚫ MORNING
                    </div>

                    <div class="shift booked">
                        ⚫ AFTERNOON
                    </div>

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 3 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    3
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 MORNING
                    </div>

                    <div class="shift available">
                        🟢 AFTERNOON
                    </div>

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 4 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    4
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 MORNING
                    </div>

                    <div class="shift booked">
                        ⚫ AFTERNOON
                    </div>

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 5 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    5
                </span>

                <div class="space-y-1.5">

                    <div class="shift booked">
                        ⚫ MORNING
                    </div>

                    <div class="shift booked">
                        ⚫ AFTERNOON
                    </div>

                    <div class="shift booked">
                        ⚫ EVENING
                    </div>

                </div>

            </div>



            <!-- Day 6 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    6
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 MORNING
                    </div>

                </div>

            </div>



            <!-- Day 7 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    7
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 8 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold">
                    8
                </span>

            </div>



            <!-- Day 9 -->

            <div class="bg-white min-h-32 p-3">

                <span class="text-sm font-bold block mb-2">
                    9
                </span>

                <div class="space-y-1.5">

                    <div class="shift available">
                        🟢 MORNING
                    </div>

                    <div class="shift available">
                        🟢 EVENING
                    </div>

                </div>

            </div>



            <!-- Day 10 Off Duty -->

            <div class="bg-white min-h-32 p-3 relative">

                <span
                    class="absolute top-3 right-3 w-7 h-7 bg-[#ba1a1a] text-white rounded-full flex items-center justify-center text-sm font-bold"
                >
                    10
                </span>

                <div class="mt-10">

                    <div class="shift off-duty">
                        🔴 OFF DUTY
                    </div>

                </div>

            </div>



            <!-- Remaining days -->

            <?php for ($day = 11; $day <= 31; $day++): ?>

                <div class="bg-white min-h-32 p-3">

                    <span class="text-sm font-bold">
                        <?= $day ?>
                    </span>

                </div>

            <?php endfor; ?>

        </div>



        <!-- Legend -->

        <div
            class="flex flex-wrap gap-8 mt-8 justify-center border-t border-[#F1F5F9] pt-6"
        >

            <div class="flex items-center gap-2.5">

                <span class="w-4 h-4 rounded-full bg-[#025747]"></span>

                <span class="text-sm font-bold text-[#434655]">
                    Available
                </span>

            </div>


            <div class="flex items-center gap-2.5">

                <span class="w-4 h-4 rounded-full bg-[#737686]"></span>

                <span class="text-sm font-bold text-[#434655]">
                    Booked
                </span>

            </div>


            <div class="flex items-center gap-2.5">

                <span class="w-4 h-4 rounded-full bg-[#ba1a1a]"></span>

                <span class="text-sm font-bold text-[#434655]">
                    Off Duty
                </span>

            </div>

        </div>

    </section>



    <!-- ===================================================== -->
    <!-- BOOK BUTTON -->
    <!-- ===================================================== -->

    <div class="mt-8 flex justify-center">

        <a
            href="/safehands_mvc/caregiver/booking/<?= (int)($caregiver['id'] ?? 0) ?>"
            class="w-full md:w-2/3 h-14 bg-[#004ac6] hover:bg-[#2563eb] text-white font-semibold text-xl rounded-xl transition-all shadow-lg flex items-center justify-center gap-3"
        >

            <span class="material-symbols-outlined">
                calendar_month
            </span>

            Book <?= htmlspecialchars($name) ?> Now

        </a>

    </div>


</main>



<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer
    class="w-full mt-16 bg-[#F8FAFC] border-t border-[#F1F5F9] py-8"
>

    <div
        class="flex flex-col md:flex-row justify-between items-center px-4 md:px-10 max-w-[1280px] mx-auto gap-4"
    >

        <span class="text-xl font-bold text-[#111c2d]">
            SafeHands
        </span>

        <div class="flex flex-wrap justify-center gap-6">

            <a href="#" class="text-sm text-[#434655] hover:text-[#004ac6]">
                Privacy Policy
            </a>

            <a href="#" class="text-sm text-[#434655] hover:text-[#004ac6]">
                Terms of Service
            </a>

            <a href="#" class="text-sm text-[#434655] hover:text-[#004ac6]">
                Cookie Policy
            </a>

            <a href="#" class="text-sm text-[#434655] hover:text-[#004ac6]">
                Accessibility
            </a>

        </div>

        <p class="text-sm text-[#434655] text-center">
            © 2024 SafeHands Healthcare Services. All rights reserved.
        </p>

    </div>

</footer>



<style>

.shift {
    padding: 6px 8px;
    border-radius: 5px;
    font-size: 10px;
    font-weight: 600;
}

.available {
    background: rgba(2, 87, 71, 0.10);
    color: #025747;
    border: 1px solid rgba(2, 87, 71, 0.20);
}

.booked {
    background: rgba(115, 118, 134, 0.10);
    color: #737686;
    border: 1px solid rgba(115, 118, 134, 0.20);
}

.off-duty {
    background: rgba(186, 26, 26, 0.10);
    color: #ba1a1a;
    border: 1px solid rgba(186, 26, 26, 0.20);
}

</style>


</body>
</html>