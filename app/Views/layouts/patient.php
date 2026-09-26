<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'My Patients | SafeHands') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/patient.css?v=2">
</head>
<body>
    <?= $content ?>
    <!-- Removed patient.js as it might conflict, or maybe keep it if needed. Let's see if patient.js does anything we need. -->
    <script src="/safehands_mvc/public/assets/js/patient.js"></script>
</body>
</html>
