<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'SafeHands') ?></title>

    <!-- Patient/Profile styles first -->
    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/patient.css?v=2"
    >

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/profile.css?v=2"
    >

    <!-- Dashboard CSS LAST -->
    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/family.css?v=2"
    >

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
</head>

<body>

    <?= $content ?>

    <script src="/safehands_mvc/public/assets/js/family.js?v=<?= time() ?>"></script>
    <script src="/safehands_mvc/public/assets/js/patient.js?v=1790345723"></script>
    <script src="/safehands_mvc/public/assets/js/profile.js?v=<?= time() ?>"></script>

</body>
</html>