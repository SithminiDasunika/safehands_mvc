<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'SafeHands') ?></title>

    <!-- Patient/Profile styles first -->
    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/patient.css"
    >

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/profile.css"
    >

    <!-- Dashboard CSS LAST -->
    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/family.css?v=<?= time() ?>"
    >
</head>

<body>

    <?= $content ?>

    <script src="/safehands_mvc/public/assets/js/family.js"></script>
    <script src="/safehands_mvc/public/assets/js/patient.js"></script>
    <script src="/safehands_mvc/public/assets/js/profile.js"></script>

</body>
</html>