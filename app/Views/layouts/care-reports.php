<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'Daily Care Reports | SafeHands') ?>
    </title>

    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/care-reports.css"
    >

</head>

<body>

    <?= $content ?>

    <script
        src="/safehands_mvc/public/assets/js/care-reports.js"
    ></script>

</body>

</html>