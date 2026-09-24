 <?php

$caregiver = $caregiver ?? [];

$isLoggedIn = isset($_SESSION['user_id']);

$name = $caregiver['name'] ?? 'Caregiver';
$specialization = $caregiver['specialization'] ?? 'Caregiver';
$district = $caregiver['district'] ?? 'Not specified';
$experience = $caregiver['experience'] ?? 'Not specified';
$education = $caregiver['education'] ?? 'Not specified';
$rating = $caregiver['rating'] ?? '0.0';
$languages = $caregiver['languages'] ?? [];
$description = $caregiver['description'] ?? 'No description available.';
$image = $caregiver['image'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($name) ?> - Caregiver Profile | SafeHands Healthcare</title>

    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-profile.css">
</head>

<body>

<header class="site-header">
    <div class="site-header-inner">

        <a href="/safehands_mvc/" class="site-logo">
            SafeHands Healthcare
        </a>

        <button
            type="button"
            class="mobile-menu-button"
            id="mobile-menu-button"
            aria-label="Open navigation"
            aria-expanded="false"
        >
            ☰
        </button>

        <nav class="main-navigation" id="main-navigation">
            <a href="/safehands_mvc/">Home</a>
            <a href="/safehands_mvc/#about">About</a>
            <a href="/safehands_mvc/#services">Services</a>
            <a href="/safehands_mvc/caregiver" class="active">Find Caregivers</a>
            <a href="/safehands_mvc/#contact">Contact</a>

            <?php if (!$isLoggedIn): ?>
                <div class="guest-buttons mobile-guest-buttons">
                    <a href="/safehands_mvc/login" class="login-link">Login</a>
                    <a href="/safehands_mvc/register" class="register-button">Register</a>
                </div>
            <?php endif; ?>
        </nav>

        <?php if (!$isLoggedIn): ?>
            <div class="guest-buttons desktop-guest-buttons">
                <a href="/safehands_mvc/login" class="login-link">Login</a>
                <a href="/safehands_mvc/register" class="register-button">Register</a>
            </div>
        <?php endif; ?>

    </div>
</header>

<main class="page-container">

    <nav class="breadcrumb-row">
        <div class="breadcrumbs">
            <a href="/safehands_mvc/">Home</a>
            <span>›</span>
            <a href="/safehands_mvc/caregiver">Find Caregivers</a>
            <span>›</span>
            <span class="current">Caregiver Profile</span>
        </div>

        <a href="/safehands_mvc/caregiver" class="back-link">
            ← <span>Back to Caregivers</span>
        </a>
    </nav>

    <div class="content-grid">

        <div class="main-column">

            <section class="card profile-card">
                <div class="profile-header">

                    <div class="profile-image-wrapper">
                        <?php if (!empty($image)): ?>
                            <img
                                class="profile-image"
                                src="<?= htmlspecialchars($image) ?>"
                                alt="<?= htmlspecialchars($name) ?>"
                            >
                        <?php else: ?>
                            <div class="profile-image-placeholder">Caregiver</div>
                        <?php endif; ?>
                    </div>

                    <div class="profile-main-info">

                        <div class="profile-title-row">
                            <h1><?= htmlspecialchars($name) ?></h1>

                            <span class="verified-badge">
                                <span class="verified-icon">✓</span>
                                Verified
                            </span>
                        </div>

                        <p class="specialization">
                            <?= htmlspecialchars($specialization) ?>
                        </p>

                        <div class="details-grid">

                            <div class="detail-item">
                                <span class="detail-label">Rating</span>
                                <span class="detail-value rating-value">
                                    <span class="star">★</span>
                                    <?= htmlspecialchars($rating) ?>
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Experience</span>
                                <span class="detail-value">
                                    <?= htmlspecialchars($experience) ?>
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Location</span>
                                <span class="detail-value">
                                    <?= htmlspecialchars($district) ?>
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Languages</span>
                                <span class="detail-value">
                                    <?= htmlspecialchars(implode(', ', $languages)) ?>
                                </span>
                            </div>

                        </div>

                        <div class="skill-summary">
                            <span class="summary-tag">
                                <span class="tag-icon">✚</span>
                                <?= htmlspecialchars($specialization) ?>
                            </span>

                            <span class="summary-tag">
                                <span class="tag-icon">🎓</span>
                                <?= htmlspecialchars($education) ?>
                            </span>
                        </div>

                    </div>
                </div>
            </section>

            <section class="card">
                <h2>About Me</h2>

                <div class="description-content">
                    <p><?= htmlspecialchars($description) ?></p>

                    <p>
                        I am committed to providing compassionate and professional
                        care while supporting the comfort, dignity, and independence
                        of every client.
                    </p>
                </div>
            </section>

            <section class="card">
                <h2>Contact Information</h2>

                <?php if ($isLoggedIn): ?>

                    <div class="contact-grid">

                        <div class="contact-item">
                            <span class="contact-icon">☎</span>
                            <div>
                                <p class="detail-label">Phone Number</p>
                                <p class="contact-value">+94 77 123 4567</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-icon">✉</span>
                            <div>
                                <p class="detail-label">Email Address</p>
                                <p class="contact-value">caregiver@safehands.com</p>
                            </div>
                        </div>

                    </div>

                <?php else: ?>

                    <div class="contact-grid guest-contact">

                        <div class="contact-item">
                            <span class="contact-icon muted-icon">☎</span>
                            <div>
                                <p class="detail-label">Phone Number</p>
                                <p class="contact-value">+94 ••• ••• •••</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-icon muted-icon">✉</span>
                            <div>
                                <p class="detail-label">Email Address</p>
                                <p class="contact-value">s•••••@email.com</p>
                            </div>
                        </div>

                    </div>

                    <div class="login-notice">
                        <div class="notice-message">
                            <span class="notice-icon">🔒</span>
                            <p>
                                Contact information is only available to registered
                                and logged-in Family Members.
                            </p>
                        </div>

                        <a href="/safehands_mvc/login" class="primary-button">
                            Login to View Contact Details
                        </a>
                    </div>

                <?php endif; ?>
            </section>

            <section class="skills-section">
                <h2>Professional Skills</h2>

                <div class="skills-list">
                    <span>Medication Assistance</span>
                    <span>Personal Hygiene Support</span>
                    <span>Meal Preparation</span>
                    <span>Mobility Assistance</span>
                    <span>Companionship</span>
                    <span>Dementia Care</span>
                    <span>Blood Pressure Monitoring</span>
                    <span>Emergency Response</span>
                </div>
            </section>

            <section class="card">
                <h2>Work Experience</h2>

                <div class="experience-list">

                    <article class="experience-item">
                        <div class="timeline-icon">⌂</div>

                        <div class="experience-content">
                            <h3>Senior Home Care Specialist</h3>
                            <p class="company-name">ABC Home Care</p>
                            <span class="date-badge">2022 - Present</span>

                            <p>
                                Providing professional elderly care and supporting
                                clients with daily activities, medication reminders,
                                mobility, and companionship.
                            </p>
                        </div>
                    </article>

                    <article class="experience-item">
                        <div class="timeline-icon">☀</div>

                        <div class="experience-content">
                            <h3>Certified Care Assistant</h3>
                            <p class="company-name">Sunrise Elder Care</p>
                            <span class="date-badge">2019 - 2022</span>

                            <p>
                                Assisted clients with daily living activities,
                                monitored vital signs, and supported social
                                engagement.
                            </p>
                        </div>
                    </article>

                </div>
            </section>

            <section class="reviews-section">

                <div class="section-heading-row">
                    <h2>Client Reviews</h2>

                    <button type="button" class="view-reviews-button">
                        View All Reviews →
                    </button>
                </div>

                <div class="reviews-grid">

                    <article class="review-card">
                        <div class="review-stars">★★★★★</div>
                        <p>
                            "Sarah was incredible with my mother. Her professionalism
                            and kind heart made a difficult transition much easier
                            for our family."
                        </p>

                        <div class="review-author">
                            <strong>Amali Perera</strong>
                            <span>October 2023</span>
                        </div>
                    </article>

                    <article class="review-card">
                        <div class="review-stars">★★★★★</div>
                        <p>
                            "Extremely punctual and organized. She handles medication
                            reminders perfectly. Highly recommended for clinical
                            home care."
                        </p>

                        <div class="review-author">
                            <strong>Ranjan Silva</strong>
                            <span>August 2023</span>
                        </div>
                    </article>

                    <article class="review-card">
                        <div class="review-stars">★★★★★</div>
                        <p>
                            "Sarah's expertise in dementia care was evident from day
                            one. She knew exactly how to de-escalate stressful
                            situations."
                        </p>

                        <div class="review-author">
                            <strong>Dinali K.</strong>
                            <span>July 2023</span>
                        </div>
                    </article>

                </div>
            </section>

        </div>

        <aside class="sidebar">

            <?php if (!$isLoggedIn): ?>

                <section class="guest-notice">
                    <span class="notice-icon">🔒</span>
                    <p>
                        Available work shifts, booking functionality, and caregiver
                        contact information are only available to registered Family
                        Members.
                    </p>
                </section>

                <section class="booking-card">

                    <h2>Ready to Book This Caregiver?</h2>

                    <p>
                        Create a SafeHands account or sign in to view available
                        shifts and request a booking with
                        <?= htmlspecialchars($name) ?>.
                    </p>

                    <div class="booking-buttons">
                        <a href="/safehands_mvc/login" class="booking-login-button">
                            Login
                        </a>

                        <a href="/safehands_mvc/register" class="booking-register-button">
                            Create Account
                        </a>
                    </div>

                </section>

            <?php else: ?>

                <section class="booking-card">

                    <h2>Ready to Book This Caregiver?</h2>

                    <p>
                        View available shifts and request a booking with
                        <?= htmlspecialchars($name) ?>.
                    </p>

                    <a
                        href="/safehands_mvc/caregiver/availability/<?= (int)($caregiver['id'] ?? 0) ?>"
                        class="booking-login-button full-width"
                    >
                        Book Caregiver
                    </a>

                </section>

            <?php endif; ?>

            <section class="card qualifications-card">
                <h2>Qualifications</h2>

                <div class="qualification-list">

                    <div class="qualification-item">
                        <span class="qualification-icon">🎓</span>
                        <span><?= htmlspecialchars($education) ?></span>
                    </div>

                    <div class="qualification-item">
                        <span class="qualification-icon">▣</span>
                        <span>Certified Caregiver</span>
                    </div>

                    <div class="qualification-item">
                        <span class="qualification-icon">✚</span>
                        <span>First Aid Certified</span>
                    </div>

                    <div class="qualification-item">
                        <span class="qualification-icon">✓</span>
                        <span>Police Clearance Verified</span>
                    </div>

                </div>
            </section>

            <section class="similar-section">
                <h2>Similar Caregivers</h2>

                <div class="similar-list">

                    <div class="similar-card">
                        <div class="similar-avatar">●</div>

                        <div>
                            <h3>Other Caregiver</h3>
                            <div class="similar-rating">★ 4.8</div>
                        </div>
                    </div>

                    <div class="similar-card">
                        <div class="similar-avatar">●</div>

                        <div>
                            <h3>Professional Caregiver</h3>
                            <div class="similar-rating">★ 4.7</div>
                        </div>
                    </div>

                </div>
            </section>

        </aside>

    </div>
</main>

<footer class="site-footer">
    <div class="footer-inner">

        <div class="footer-brand">
            <div class="site-logo">SafeHands Healthcare</div>
            <p>© 2024 SafeHands Healthcare. All rights reserved.</p>
        </div>

        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Cookie Policy</a>
            <a href="#">Accessibility</a>
        </div>

        <div class="footer-social">
            <a href="#" aria-label="Share">↗</a>
            <a href="#" aria-label="Email">✉</a>
        </div>

    </div>
</footer>

<script src="/safehands_mvc/public/assets/js/caregiver-profile.js"></script>

</body>
</html>
