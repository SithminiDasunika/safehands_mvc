<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($title ?? 'Booking Details | SafeHands') ?>
    </title>


    <link
        rel="stylesheet"
        href="/safehands_mvc/public/assets/css/booking-details.css"
    >

</head>


<body>

    <?= $content ?>


    <script
        src="/safehands_mvc/public/assets/js/booking-details.js"
    ></script>

</body>

</html>