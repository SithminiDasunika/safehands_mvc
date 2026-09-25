<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'SafeHands Admin') ?></title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/admin.css?v=<?= time() ?>"
    >

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
</head>

<body>

    <?= $content ?>

    <script src="/safehands_mvc/public/assets/js/admin.js?v=<?= time() ?>"></script>

</body>
</html>
