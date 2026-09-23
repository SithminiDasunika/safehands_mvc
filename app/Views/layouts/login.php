<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($title ?? 'SafeHands - Login') ?>
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/<?= htmlspecialchars($css ?? 'login.css') ?>"
    >

</head>

<body>

    <?= $content ?>

    <script
        src="/safehands_mvc/public/assets/js/<?= htmlspecialchars($js ?? 'login.js') ?>"
    ></script>

</body>

</html>