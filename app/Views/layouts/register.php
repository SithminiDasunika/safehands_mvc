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

    <?php

    $cssFile = $css ?? 'register.css';

    ?>

    <link
        rel="stylesheet"
        type="text/css"
        href="/safehands_mvc/public/assets/css/<?= htmlspecialchars($cssFile) ?>?v=<?= time() ?>"
    >

</head>

<body>

    <?= $content ?>

</body>

</html>