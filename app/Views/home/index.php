<!-- =========================================================
     NAVIGATION
========================================================= -->

<nav class="navbar" id="navbar">

    <div class="nav-container">

        <a href="#home" class="logo">
            
            <span>SafeHands</span>
        </a>

        <div class="nav-links">

            <a href="#home" class="active">Home</a>

            <a href="#about">About</a>

            <a href="#services">Services</a>

            <a href="/safehands_mvc/caregiver">Find Caregivers</a>
            <a href="#contact">Contact</a>

        </div>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php 
                    $dashboardUrl = '/safehands_mvc/';
                    if (isset($_SESSION['user_role'])) {
                        if ($_SESSION['user_role'] === 'family') $dashboardUrl .= 'family';
                        elseif ($_SESSION['user_role'] === 'caregiver') $dashboardUrl .= 'caregiver-dashboard';
                    }
                ?>
                <a href="<?= $dashboardUrl ?>" class="login-button">
                    Dashboard
                </a>
                <a href="/safehands_mvc/login/logout" class="register-button">
                    Logout
                </a>
            <?php else: ?>
                <a href="/safehands_mvc/login" class="login-button">
                    Login
                </a>
                <a href="/safehands_mvc/register" class="register-button">
                    Register
                </a>
            <?php endif; ?>
        </div>

    </div>

</nav>


<main id="home">


<!-- =========================================================
     HERO SECTION
========================================================= -->

<section class="hero section-container">

    <div class="hero-content">

        <div class="hero-text">

            <div class="verification-badge">
                <span class="icon">✓</span>
                Verified Clinical Excellence
            </div>

            <h1>
                Trusted Care for Your
                <span>Loved Ones</span>
            </h1>

            <p>
                Find verified caregivers, book care services
                with confidence, and stay connected through
                secure daily updates.
            </p>

            <div class="hero-buttons">

            <button
    type="button"
    class="primary-button"
    onclick="window.location.href='/safehands_mvc/caregiver'"
>
    Find Caregivers
    <span>›</span>
</button>

<a href="/safehands_mvc/register/caregiver"
   class="secondary-button"
   style="text-decoration: none; display: flex; align-items: center; justify-content: center;">
    Become a Caregiver
</a>

            </div>

            <ul class="hero-features">

                <li>
                    <span class="check-icon">✓</span>
                    Verified Caregivers
                </li>

                <li>
                    <span class="check-icon">✓</span>
                    Secure Booking
                </li>

                <li>
                    <span class="check-icon">✓</span>
                    Daily Care Reports
                </li>

                <li>
                    <span class="check-icon">✓</span>
                    OTP Arrival Verification
                </li>

            </ul>

        </div>


        <div class="hero-image-container">

            <div class="hero-circle circle-one"></div>

            <div class="hero-circle circle-two"></div>

            <div class="hero-image-wrapper">

            <img
    src="/safehands_mvc/public/assets/images/home.png"
    alt="Professional caregiver assisting an elderly person"
>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TRUST BADGES
========================================================= -->

<section class="trust-section">

    <div class="section-container">

        <div class="trust-grid">

            <div class="trust-card">

                <div class="trust-icon">
                    ✓
                </div>

                <h4>Verified Caregivers</h4>

                <p>
                    Every professional undergoes a rigorous
                    7-point background check.
                </p>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    $
                </div>

                <h4>Secure Payment</h4>

                <p>
                    Encrypted transactions with transparent
                    billing and no hidden fees.
                </p>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    🔑
                </div>

                <h4>OTP Verified Arrival</h4>

                <p>
                    Real-time verification for every visit
                    to ensure your family's safety.
                </p>

            </div>


            <div class="trust-card">

                <div class="trust-icon">
                    ♡
                </div>

                <h4>Emergency Support</h4>

                <p>
                    24/7 access to our clinical support team
                    for any urgent needs.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     ABOUT SECTION
========================================================= -->

<section
    class="about-section section-container"
    id="about"
>

    <div class="about-grid">

        <div class="about-image">

            <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuClNDzxPAm89AjoAT7bwOHBxDSTzmhhxh-LtZXnBGEnVdB3gHXNgpRzXlMfuSPGsKQpeEWbtWTh7SA8ZeBa5eehl3jQeDoIVd5wuDFDAViTqsw5F6QOaSwrJPWieowrJJQAhFOkkFvnDkVSPs4cYB891SYiihEdJQDS8Tr-48wec1vaVa-MDww_udnwnVKU-rxADfvau_RfUhQhxJvd_0-uMkO81o4Uxl8RsTLOFedqyHT1hHO5JuTBo7wD-ebdOmKiD9TtFPBqefM"
                alt="Caregiver and elderly patient"
            >

        </div>


        <div class="about-content">

            <h2>Why SafeHands?</h2>

            <p class="large-text">
                We believe that caregiving should be transparent,
                safe, and easily accessible. SafeHands bridges
                the gap between professional caregivers and
                families through a platform built on rigorous
                verification and real-time communication.
            </p>


            <div class="about-features">

                <div class="about-feature">

                    <div class="feature-icon">
                        ⇄
                    </div>

                    <div>

                        <h4>Total Transparency</h4>

                        <p>
                            Live updates and care logs keep you
                            informed of your loved one's status
                            throughout the day.
                        </p>

                    </div>

                </div>


                <div class="about-feature">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <div>

                        <h4>Unmatched Safety</h4>

                        <p>
                            Every caregiver undergoes a 7-point
                            background check and clinical skill
                            assessment before joining our network.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     SERVICES
========================================================= -->

<section
    class="services-section"
    id="services"
>

    <div class="section-container">

        <div class="section-heading">

            <h2>
                Comprehensive Care Solutions
            </h2>

            <p>
                Providing a safe ecosystem for specialized
                medical assistance and home care services.
            </p>

        </div>


        <div class="services-grid">


            <div class="service-card">

                <div class="service-icon">
                    ✓
                </div>

                <h3>Verified Caregivers</h3>

                <p>
                    Expertly vetted professionals with verified
                    credentials and specialized medical backgrounds.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    □
                </div>

                <h3>Flexible Shift Booking</h3>

                <p>
                    Schedule care precisely when you need it,
                    from hourly visits to 24/7 specialized
                    nursing support.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    ≡
                </div>

                <h3>Daily Care Reports</h3>

                <p>
                    Receive detailed digital reports on medication,
                    nutrition, and activities directly to your app.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    ✓
                </div>

                <h3>Secure OTP Verification</h3>

                <p>
                    Arrivals and departures are verified via OTP
                    to ensure authorized access at all times.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    !
                </div>

                <h3>Emergency Assistance</h3>

                <p>
                    Immediate 24/7 clinical support and ambulance
                    coordination for critical situations.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    $
                </div>

                <h3>Secure Payments</h3>

                <p>
                    Simplified billing and encrypted payment
                    processing for peace of mind.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
========================================================= -->

<section
    class="how-section"
    id="how-it-works"
>

    <div class="section-container">

        <h2 class="center-heading">
            How It Works
        </h2>

        <div class="steps-container">

            <div class="step-line"></div>


            <div class="step">

                <div class="step-circle">

                    <span>1</span>

                    <div class="step-icon">
                        ⌕
                    </div>

                </div>

                <h4>Browse Caregivers</h4>

                <p>
                    Filter by expertise, location, and
                    availability to find your match.
                </p>

            </div>


            <div class="step">

                <div class="step-circle">

                    <span>2</span>

                    <div class="step-icon">
                        +
                    </div>

                </div>

                <h4>Create Account</h4>

                <p>
                    Quickly set up your profile and
                    care requirements.
                </p>

            </div>


            <div class="step">

                <div class="step-circle">

                    <span>3</span>

                    <div class="step-icon">
                        □
                    </div>

                </div>

                <h4>Book Available Shift</h4>

                <p>
                    Confirm your booking with our
                    secure scheduling system.
                </p>

            </div>


            <div class="step">

                <div class="step-circle">

                    <span>4</span>

                    <div class="step-icon">
                        !
                    </div>

                </div>

                <h4>Receive Care Updates</h4>

                <p>
                    Stay updated with real-time reports
                    throughout the session.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TESTIMONIALS
========================================================= -->

<section class="testimonials-section">

    <div class="section-container">

        <h2 class="center-heading">
            Trusted by Families
        </h2>


        <div class="testimonials-grid">


            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "SafeHands has completely changed how we
                    manage my father's care. The daily reports
                    give me such peace of mind while I'm at work."
                </p>

                <div class="testimonial-person">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZ_x576kp3mhQlfTal-kK0KPK2iUmw_vV_1AkFXGkAtaswl0zGEWcUpmdSdTLYYoqaO8v6ehmorPBC5Mu2tJ1RDxDdeq5KeIwr9B0D4nkOfdc9GnJLZqE06-oU18uyT54NnQ-uxvA91m7DrEuuOpR-YrNouErqoHFva4xx6n5YvEzQ7OloW-bQtopF7VJndcvdlNpqFFgtk8aBAv33p2KBF7hIdEl83XSLHJqpjfadHBx3WWXwL2bvH5c26aZVgnilFxCFdFCaU6w"
                        alt="Sarah Mitchell"
                    >

                    <div>
                        <h5>Sarah Mitchell</h5>
                        <p>Family Member</p>
                    </div>

                </div>

            </div>


            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "The OTP verification system makes me feel
                    so much safer. I always know exactly who is
                    entering my mother's home and when."
                </p>

                <div class="testimonial-person">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaaoLaKQmXljMJehGFCDZYpaRFldbIaCq8of7LlRMwp2qSEMOi-qk-5BDH1bwi8OfqPuTGwaCmhYBKHEKlBtpEv7Zv9HhgyhA-mg7pf8XQF8IhBWI4odwWnr0Cnwzwtqr-gNs0r2TCJhpmyBtmNAltxTnVgMxFyTRYzKEL5Rx0mTjoQ4FcUfQrxkmYMN0n1w3sOZOb6PAnuaEDtywLnSmgzVgSMnFdnUqeEx_D-e-zHOkQqwBQD-x3wd04HLTvw3NnIqTXDHKiXPE"
                        alt="David Chen"
                    >

                    <div>
                        <h5>David Chen</h5>
                        <p>Family Member</p>
                    </div>

                </div>

            </div>


            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "Finding qualified caregivers used to take
                    weeks. With SafeHands, I found a fantastic
                    nurse for my husband within 24 hours."
                </p>

                <div class="testimonial-person">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIqNMRUh9DtR0oVTGe_paH2j2-KJxcQhoudOQCqAjwcH9boI08TEZqwokM6I7zdQmQ3wvU6v4DRg-yRFSMa9pH_v1t2P27mp1iVq-AvV6oDSoChFI0hIca_hB4XCdHvRlV3BDkc6ySwoGDftxKipD_W6up9Bk4gMW-M_Zpe5NNkmY-Y6Pu0QbIKCgJoaR08m6UfDZkH3HPu8CtUnFbp9Eixa-hVCXb3RSQHx0jiNw7RXFEcbLA_wy0YpLifto-Yu3jABHwIFtQMPQ"
                        alt="Elena Rodriguez"
                    >

                    <div>
                        <h5>Elena Rodriguez</h5>
                        <p>Family Member</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FAQ
========================================================= -->

<section class="faq-section">

    <div class="faq-container">

        <h2 class="center-heading">
            Frequently Asked Questions
        </h2>


        <details open>

            <summary>
                <span>How are caregivers verified?</span>
                <span class="faq-arrow">⌄</span>
            </summary>

            <div class="faq-answer">

                Every caregiver goes through a rigorous 7-point
                background check, including ID verification,
                criminal record checks and reference calls.

            </div>

        </details>


        <details>

            <summary>
                <span>Can I book care for a single shift?</span>
                <span class="faq-arrow">⌄</span>
            </summary>

            <div class="faq-answer">

                Yes, our platform is designed for flexibility.
                You can book a single 4-hour shift or arrange
                for recurring daily care depending on your needs.

            </div>

        </details>


        <details open>

            <summary>
                <span>What is OTP verification?</span>
                <span class="faq-arrow">⌄</span>
            </summary>

            <div class="faq-answer">

                Upon arrival, the caregiver requests a unique
                One-Time Password from the family member present
                or via the app. This ensures only the assigned
                caregiver can start the shift, enhancing home security.

            </div>

        </details>

    </div>

</section>


<!-- =========================================================
     CONTACT
========================================================= -->

<section
    class="contact-section"
    id="contact"
>

    <div class="section-container">

        <div class="contact-grid">


            <div class="contact-information">

                <h2>
                    Get in Touch
                </h2>

                <p class="contact-description">
                    Our care coordinators are available 24/7
                    to answer your questions and help you find
                    the right caregiver.
                </p>


                <div class="contact-details">

                    <div class="contact-item">

                        <div class="contact-icon">
                            ☎
                        </div>

                        <span>
                            +1 (800) SAFE-HANDS
                        </span>

                    </div>


                    <div class="contact-item">

                        <div class="contact-icon">
                            @
                        </div>

                        <span>
                            support@safehands.com
                        </span>

                    </div>


                    <div class="contact-item">

                        <div class="contact-icon">
                            ●
                        </div>

                        <span>
                            123 Health Plaza, San Francisco, CA
                        </span>

                    </div>

                </div>


                <div class="map-container">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwlGb3kkmni5AOQHST_DEr2U4Pbg_MR5quFajQExnZlbEcvJNsVol1XXtmPLceZPEfVtyXJcAYXQcnlCweR57vOoA3MUohrj5YojkHp4bCPfbDFYuAmFknxUX7HEumcqeDVSRhI7lFCL0B9pxyT6ZPlXSkM1IBA_NBr8O_pXXW90W6qNenUajrtnBZWxnhj5I5tUD6XoumxVyQypby6az8qXCPp7NJChjVBSfXk0SN7ssfzjwoU9RiyHI7sI4FsS3LYJkhY0qPXCo"
                        alt="Location map"
                    >

                </div>

            </div>


            <div class="contact-form-container">

                <form id="contactForm">

                    <div class="form-group">

                        <label>
                            Your Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Full Name"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            placeholder="email@example.com"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Message
                        </label>

                        <textarea
                            name="message"
                            rows="4"
                            placeholder="How can we help you?"
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="send-button"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

</main>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">

    <div class="section-container">

        <div class="footer-grid">


            <div class="footer-brand">

                <div class="footer-logo">

                  

                    <span>SafeHands</span>

                </div>

                <p>
                    Elevating home care through technology,
                    trust, and verified clinical excellence.
                </p>

            </div>


            <div class="footer-column">

                <h5>Quick Links</h5>

                <a href="#how-it-works">
                    Find Caregivers
                </a>

                <a href="#">
                    Safety Standards
                </a>

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Service
                </a>

            </div>


            <div class="footer-column">

                <h5>Company</h5>

                <a href="#about">
                    About Us
                </a>

                <a href="#">
                    Careers
                </a>

                <a href="#">
                    Newsroom
                </a>

                <a href="#contact">
                    Contact
                </a>

            </div>


            <div class="footer-column">

                <h5>Connect</h5>

                <div class="social-links">

                    <a href="#" aria-label="Website">
                        ◉
                    </a>

                    <a href="#" aria-label="Community">
                        ●
                    </a>

                    <a href="#" aria-label="Share">
                        ↗
                    </a>

                </div>

                <p class="copyright">
                    © 2024 SafeHands. All rights reserved.
                </p>

            </div>

        </div>

    </div>

</footer>