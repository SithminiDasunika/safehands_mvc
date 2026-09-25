<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'Payment History - SafeHands') ?>
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/payment-history.css"
    >

</head>

<body>

    <?= $content ?>

    <script
        src="/safehands_mvc/public/assets/js/payment-history.js"
    ></script>

</body>

</html>