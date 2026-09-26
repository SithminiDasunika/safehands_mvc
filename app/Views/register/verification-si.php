 <!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>සත්‍යාපනය - SafeHands</title>
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/verification.css?v=2">
</head>
<body>

<header class="site-header">
    <div class="brand">SafeHands</div>

    <nav class="main-navigation">
        <a href="#">රැකියා සොයන්න</a>
        <a href="#">සම්පත්</a>
        <a href="#">අප ගැන</a>
        <a href="/safehands_mvc/register.php" class="active">ලියාපදිංචි වන්න</a>
    </nav>

    <div class="header-actions">
        <div class="language-switcher">
            <a href="/safehands_mvc/register/verification">English</a>
            <span>|</span>
            <a href="/safehands_mvc/register/verificationSi" class="active-language">සිංහල</a>
        </div>

        <a href="/safehands_mvc/login/login.php" class="login-button">පිවිසෙන්න</a>
    </div>
</header>

<main class="main-content">
    <div class="content-container">

        <nav class="breadcrumb">
            <a href="/safehands_mvc/register.php">ලියාපදිංචිය</a>
            <span>›</span>
            <span>Caregiver ලෙස ලියාපදිංචි වන්න</span>
        </nav>

        <section class="page-header">
            <h1>SafeHands Caregiver කෙනෙකු වන්න</h1>
            <p>සත්‍යාපිත Caregiver කෙනෙකු ලෙස අයදුම් කිරීමට පහත පියවර සම්පූර්ණ කරන්න.</p>
        </section>

        <section class="steps">
            <div class="step completed">
                <span class="step-number">✓</span>
                <span>පුද්ගලික තොරතුරු</span>
            </div>
            <div class="step-line"></div>
            <div class="step completed">
                <span class="step-number">✓</span>
                <span>වෘත්තීය තොරතුරු</span>
            </div>
            <div class="step-line"></div>
            <div class="step current">
                <span class="step-number">3</span>
                <span>සත්‍යාපනය</span>
            </div>
        </section>

        <section class="form-card">
            <?php if (!empty($errors)): ?>
                <div class="form-errors">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="/safehands_mvc/register/verificationSubmit" method="POST" enctype="multipart/form-data" class="verification-form">

                <div class="form-section">
                    <h2><span class="section-icon">✓</span> සත්‍යාපන ලේඛන</h2>

                    <div class="document-groups">

                        <section>
                            <h3>අවශ්‍ය ලේඛන *</h3>
                            <div class="document-grid">

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> NIC ඉදිරිපස *</div>
                                    <input type="file" name="nic_front" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> NIC පිටුපස *</div>
                                    <input type="file" name="nic_back" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> සුදුසුකම් සහතිකය *</div>
                                    <input type="file" name="qualification_certificate" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> පොලිස් නිෂ්කාශන සහතිකය *</div>
                                    <input type="file" name="police_clearance" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card full-width">
                                    <div class="document-title"><span>◉</span> පැතිකඩ ඡායාරූපය *</div>
                                    <input type="file" name="profile_photo" accept=".jpg,.jpeg,.png" required>
                                </div>

                            </div>
                        </section>

                        <section>
                            <h3>විකල්ප ලේඛන</h3>
                            <div class="document-grid">

                                <div class="document-card">
                                    <div class="document-title optional"><span>✚</span> ප්‍රථමාධාර සහතිකය</div>
                                    <input type="file" name="first_aid_certificate" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                                <div class="document-card">
                                    <div class="document-title optional"><span>▤</span> සේවා පළපුරුද්දේ ලිපිය</div>
                                    <input type="file" name="experience_letter" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                                <div class="document-card full-width">
                                    <div class="document-title optional"><span>✚</span> වෛද්‍ය යෝග්‍යතා සහතිකය</div>
                                    <input type="file" name="medical_fitness_certificate" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                            </div>
                        </section>

                    </div>
                </div>

                <div class="confirmation">
                    <label>
                        <input type="checkbox" name="document_confirmation" value="1" required>
                        <span>මම උඩුගත කරන ලද සියලුම ලේඛන සත්‍ය හා නිවැරදි බව තහවුරු කරමි.</span>
                    </label>
                </div>

                <div class="form-actions">
                    <a href="/safehands_mvc/register/professionalSi" class="back-button">← ආපසු</a>
                    <button
                        type="submit"
                        class="submit-button">
                        අයදුම්පත ඉදිරිපත් කරන්න <span>→</span>
                    </button> 
                </div>

            </form>
        </section>

        <section class="support-section">
            <div class="support-content">
                <h2>SafeHands සමඟ එක්වන්නේ ඇයි?</h2>
                <ul>
                    <li><span>✓</span><span>බැංකු මාරු කිරීම් සමඟ තරඟකාරී ගෙවීම්.</span></li>
                    <li><span>✓</span><span>ඔබේ ජීවන රටාවට ගැළපෙන නම්‍යශීලී කාලසටහන.</span></li>
                    <li><span>✓</span><span>අඛණ්ඩ සෞඛ්‍ය සේවා පුහුණු වැඩසටහන් සඳහා ප්‍රවේශය.</span></li>
                </ul>
            </div>
            <div class="support-image">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwMEcLjLCFh5GSxfaDIzMqanqf78_bQz7xKP7TJdYHQVwzPwK8H7Z3Tni6lfocHMdt1d5UqxngPBrOwhWQV7vLOlKC0mo4I2l0bf7BAY3SzgoO2t47cXP_OzylVca2p2SUkN9lMH_307AfN5ly5C3G2_Re-lFRj3zUmv7lYgAkNC1JGFFgHNb5MiBHfIlwf7BtS901iJhwwU5YXONquq1ijP259qyWLDtgHrk0IyycM" alt="Professional caregiver">
            </div>
        </section>

    </div>
</main>

<footer class="site-footer">
    <div class="footer-brand">
        <strong>SafeHands</strong>
        <p>© 2024 SafeHands Healthcare Services. සියලු හිමිකම් ඇවිරිණි.</p>
    </div>
    <div class="footer-links">
        <a href="#">පෞද්ගලිකත්ව ප්‍රතිපත්තිය</a>
        <a href="#">සේවා කොන්දේසි</a>
        <a href="#">උපකාරක මධ්‍යස්ථානය</a>
        <a href="#">සහාය අමතන්න</a>
    </div>
</footer>

<script src="/safehands_mvc/public/assets/js/verification.js"></script>
</body>
</html>
