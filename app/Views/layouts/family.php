<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'SafeHands') ?>
    </title>


    <!-- =====================================================
         FAMILY DASHBOARD CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/family.css"
    >


    <!-- =====================================================
         ADD PATIENT CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/patient.css"
    >


    <!-- =====================================================
         PATIENT PROFILE CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/profile.css"
    >

</head>


<body>

    <?= $content ?>


    <!-- =====================================================
         FAMILY DASHBOARD JS
    ====================================================== -->

    <script
        src="/safehands_mvc/public/assets/js/family.js"
    ></script>


    <!-- =====================================================
         ADD PATIENT JS
    ====================================================== -->

    <script
        src="/safehands_mvc/public/assets/js/patient.js"
    ></script>


    <!-- =====================================================
         PATIENT PROFILE JS
    ====================================================== -->

    <script
        src="/safehands_mvc/public/assets/js/profile.js"
    ></script>

</body>

</html>