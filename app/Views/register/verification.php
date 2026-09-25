 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification - SafeHands</title>
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/verification.css">
</head>
<body>

<header class="site-header">
    <div class="brand">SafeHands</div>

    <nav class="main-navigation">
        <a href="#">Find Jobs</a>
        <a href="#">Resources</a>
        <a href="#">About Us</a>
        <a href="/safehands_mvc/register.php" class="active">Register</a>
    </nav>

    <div class="header-actions">
        <div class="language-switcher">
            <a href="/safehands_mvc/register/verification" class="active-language">English</a>
            <span>|</span>
            <a href="/safehands_mvc/register/verificationSi">සිංහල</a>
        </div>

        <a href="/safehands_mvc/login/login.php" class="login-button">Login</a>
    </div>
</header>

<main class="main-content">
    <div class="content-container">

        <nav class="breadcrumb">
            <a href="/safehands_mvc/register.php">Registration</a>
            <span>›</span>
            <span>Register as a Caregiver</span>
        </nav>

        <section class="page-header">
            <h1>Become a SafeHands Caregiver</h1>
            <p>Complete the following steps to apply as a verified caregiver.</p>
        </section>

        <section class="steps">
            <div class="step completed">
                <span class="step-number">✓</span>
                <span>Personal Information</span>
            </div>
            <div class="step-line"></div>
            <div class="step completed">
                <span class="step-number">✓</span>
                <span>Professional Information</span>
            </div>
            <div class="step-line"></div>
            <div class="step current">
                <span class="step-number">3</span>
                <span>Verification</span>
            </div>
        </section>

        <section class="form-card">
            <form action="/safehands_mvc/register/verificationSubmit" method="POST" enctype="multipart/form-data" class="verification-form">

                <div class="form-section">
                    <h2><span class="section-icon">✓</span> Verification Documents</h2>

                    <div class="document-groups">

                        <section>
                            <h3>Required Documents *</h3>
                            <div class="document-grid">

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> NIC Front *</div>
                                    <input type="file" name="nic_front" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> NIC Back *</div>
                                    <input type="file" name="nic_back" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> Qualification Certificate *</div>
                                    <input type="file" name="qualification_certificate" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card">
                                    <div class="document-title"><span>▣</span> Police Clearance Certificate *</div>
                                    <input type="file" name="police_clearance" accept=".jpg,.jpeg,.png,.pdf" required>
                                </div>

                                <div class="document-card full-width">
                                    <div class="document-title"><span>◉</span> Profile Photo *</div>
                                    <input type="file" name="profile_photo" accept=".jpg,.jpeg,.png" required>
                                </div>

                            </div>
                        </section>

                        <section>
                            <h3>Optional Documents</h3>
                            <div class="document-grid">

                                <div class="document-card">
                                    <div class="document-title optional"><span>✚</span> First Aid Certificate</div>
                                    <input type="file" name="first_aid_certificate" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                                <div class="document-card">
                                    <div class="document-title optional"><span>▤</span> Experience Letter</div>
                                    <input type="file" name="experience_letter" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                                <div class="document-card full-width">
                                    <div class="document-title optional"><span>✚</span> Medical Fitness Certificate</div>
                                    <input type="file" name="medical_fitness_certificate" accept=".jpg,.jpeg,.png,.pdf">
                                </div>

                            </div>
                        </section>

                    </div>
                </div>

                <div class="confirmation">
                    <label>
                        <input type="checkbox" name="document_confirmation" value="1" required>
                        <span>I confirm that all documents I have uploaded are true and accurate.</span>
                    </label>
                </div>

                <div class="form-actions">
                    <a href="/safehands_mvc/register/professional" class="back-button">← Back</a>
                     <button
    type="button"
    class="submit-button"
    onclick="window.location.href='/safehands_mvc/register/success'">
    Submit Application <span>→</span>
</button>
            </form>
        </section>

        <section class="support-section">
            <div class="support-content">
                <h2>Why join SafeHands?</h2>
                <ul>
                    <li><span>✓</span><span>Competitive payments with bank transfers.</span></li>
                    <li><span>✓</span><span>Flexible schedules that fit your lifestyle.</span></li>
                    <li><span>✓</span><span>Access to continuous healthcare training programmes.</span></li>
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
        <p>© 2024 SafeHands Healthcare Services. All rights reserved.</p>
    </div>
    <div class="footer-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Help Center</a>
        <a href="#">Contact Support</a>
    </div>
</footer>

<script src="/safehands_mvc/public/assets/js/verification.js"></script>
</body>
</html>
