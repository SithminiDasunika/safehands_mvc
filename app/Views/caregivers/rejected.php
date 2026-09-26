<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<style>
.material-symbols-outlined { font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24; vertical-align: middle; }
.rejected-page-body { font-family: "Inter", sans-serif; -webkit-font-smoothing: antialiased; }
</style>
<div class="rejected-page-body">
    <!-- TopNavBar -->
    <nav class="rejected-nav">
        <div class="rejected-nav-container">
            <div class="rejected-nav-logo">SafeHands</div>
            <div class="rejected-nav-links">
                <a class="rejected-nav-link" href="/safehands_mvc/home">Home</a>
                <a class="rejected-nav-link" href="#">About</a>
                <a class="rejected-nav-link" href="#">Services</a>
                <div class="rejected-nav-divider"></div>
                <a href="/safehands_mvc/login/logout" class="rejected-nav-btn" style="text-decoration:none;">
                    <span class="material-symbols-outlined" style="font-size:20px;">logout</span> Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="rejected-main">
        <div class="rejected-container">
            <!-- Rejection Card -->
            <div class="rejected-card">
                <!-- Card Header -->
                <div class="rejected-card-header">
                    <div class="rejected-icon-wrapper">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">error</span>
                    </div>
                    <h1 class="rejected-title">Your Caregiver Application Was Not Approved</h1>
                    <p class="rejected-desc">
                        Thank you for your interest in joining SafeHands. After reviewing your application and submitted verification information, we’re unable to approve your caregiver account at this time.
                    </p>
                </div>

                <div class="rejected-card-body">
                    <!-- Status Box -->
                    <div class="rejected-status-box">
                        <div>
                            <p class="rejected-status-label">Status Report</p>
                            <h3 class="rejected-status-title">Application Review Completed</h3>
                        </div>
                        <div class="rejected-status-badge">
                            NOT APPROVED
                        </div>
                    </div>

                    <!-- Reason for Decision -->
                    <div>
                        <h4 class="rejected-reason-title">
                            <span class="material-symbols-outlined" style="font-size:18px;">gavel</span>
                            Reason for Decision
                        </h4>
                        <div class="rejected-reason-box">
                            "<?= htmlspecialchars($_SESSION['rejection_reason'] ?? 'Your application did not meet our verification standards.') ?>"
                        </div>

                    </div>

                    <!-- Next Steps Grid -->
                    <div>
                        <h4 class="rejected-steps-title">What can I do next?</h4>
                        <div class="rejected-steps-grid">
                            <!-- Card 1 -->
                            <div class="rejected-step-card">
                                <div class="rejected-step-icon">
                                    <span class="material-symbols-outlined">support_agent</span>
                                </div>
                                <h5 class="rejected-step-title">Contact Support</h5>
                                <p class="rejected-step-desc">
                                    Contact the SafeHands support team if you need clarification about the decision.
                                </p>
                            </div>
                            <!-- Card 2 -->
                            <div class="rejected-step-card">
                                <div class="rejected-step-icon">
                                    <span class="material-symbols-outlined">description</span>
                                </div>
                                <h5 class="rejected-step-title">Review Information</h5>
                                <p class="rejected-step-desc">
                                    Check that your personal details, qualifications, NIC and verification documents are accurate and valid.
                                </p>
                            </div>
                            <!-- Card 3 -->
                            <div class="rejected-step-card">
                                <div class="rejected-step-icon">
                                    <span class="material-symbols-outlined">refresh</span>
                                </div>
                                <h5 class="rejected-step-title">Reapply if Eligible</h5>
                                <p class="rejected-step-desc">
                                    If reapplication is permitted, correct the required information and submit a new application.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Important Notice -->
                    <div class="rejected-notice">
                        <span class="material-symbols-outlined">info</span>
                        <p class="rejected-notice-text">
                            Your caregiver account cannot access caregiver services, bookings, availability management, care reports, or earnings while the application is not approved.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="rejected-actions">
                        <button class="rejected-btn rejected-btn-primary">
                            <span class="material-symbols-outlined" style="font-size:20px;">support_agent</span>
                            Contact Support
                        </button>
                        <a href="/safehands_mvc/home" class="rejected-btn rejected-btn-outline">
                            <span class="material-symbols-outlined" style="font-size:20px;">home</span>
                            Back to Home
                        </a>
                        <a href="/safehands_mvc/login/logout" class="rejected-btn rejected-btn-text" style="text-decoration:none;">
                            Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Area (Subtle) -->
            <div class="rejected-footer-subtle">
                <p>
                    ©2026 SafeHands. Professional Caregiving Excellence.
                </p>
            </div>
        </div>
    </main>

    <!-- Footer Component -->
    <footer class="rejected-footer">
        <div class="rejected-footer-grid">
            <div>
                <div class="rejected-footer-brand">SafeHands</div>
                <p class="rejected-footer-desc">
                    Trusted professional healthcare network connecting families with vetted caregivers.
                </p>
            </div>
            <div>
                <h6 class="rejected-footer-title">Quick Links</h6>
                <ul class="rejected-footer-list">
                    <li><a class="rejected-footer-link" href="#">Privacy Policy</a></li>
                    <li><a class="rejected-footer-link" href="#">Terms of Service</a></li>
                    <li><a class="rejected-footer-link" href="#">Help Center</a></li>
                </ul>
            </div>
            <div>
                <h6 class="rejected-footer-title">Social</h6>
                <ul class="rejected-footer-list">
                    <li><a class="rejected-footer-link" href="#">Facebook</a></li>
                    <li><a class="rejected-footer-link" href="#">LinkedIn</a></li>
                    <li><a class="rejected-footer-link" href="#">Instagram</a></li>
                </ul>
            </div>
            <div>
                <h6 class="rejected-footer-title">Support</h6>
                <p class="rejected-footer-text">Available 24/7 for urgent matters.</p>
                <a class="rejected-footer-email" href="mailto:support@safehands.com">support@safehands.com</a>
            </div>
        </div>
    </footer>
</div>
