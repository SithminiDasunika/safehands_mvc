<?php
$caregiverName = $caregiverName ?? ($_SESSION['caregiver_name'] ?? 'Caregiver');
$caregiverId = $caregiverId ?? ($_SESSION['caregiver_id'] ?? null);

$profileUrl = $caregiverId
    ? '/safehands_mvc/caregiver/profile/' . (int)$caregiverId
    : '/safehands_mvc/caregivers';

$profilePhoto = $profilePhoto ?? '/safehands_mvc/public/assets/images/login-caregiver.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Caregiver Dashboard | SafeHands</title>

    <link rel="stylesheet"
          href="/safehands_mvc/public/assets/css/caregiver-dashboard.css">
</head>

<body>

<header class="dashboard-header">

    <div class="header-container">

        <a href="/safehands_mvc/caregiver/dashboard"
           class="brand">
            SafeHands
        </a>

        <button type="button"
                class="mobile-menu-button"
                id="mobileMenuButton"
                aria-label="Open navigation">
            ☰
        </button>

        <nav class="main-navigation" id="mainNavigation">

            <a href="/safehands_mvc/caregiver/dashboard"
               class="nav-link active">
                Dashboard
            </a>

            <a href="/safehands_mvc/caregiver/schedule"
               class="nav-link">
                My Schedule
            </a>

            <a href="/safehands_mvc/caregiver/manageAvailability"
               class="nav-link">
                Availability
            </a>

            <a href="/safehands_mvc/caregiver/earnings"
               class="nav-link">
                Earnings
            </a>

            <a href="/safehands_mvc/caregiver/notifications"
               class="nav-link">
                Notifications
            </a>

        </nav>

        <div class="header-actions">

            <button type="button"
                    class="icon-button"
                    title="Notifications"
                    id="notificationButton">
                🔔
            </button>

            <div class="user-menu">
                <img src="<?= htmlspecialchars($profilePhoto) ?>"
                     alt="Caregiver profile"
                     class="header-profile-image">

                <span class="header-user-name">
                    <?= htmlspecialchars($caregiverName) ?>
                </span>
            </div>

        </div>

    </div>

</header>


<main class="dashboard-main">

    <div class="page-container">

        <!-- PAGE TITLE -->

        <section class="page-heading">

            <div>
                <p class="page-label">CAREGIVER DASHBOARD</p>

                <h1>
                    Welcome back,
                    <?= htmlspecialchars($caregiverName) ?>
                </h1>

                <p class="page-description">
                    Manage your caregiver profile, availability,
                    services and professional information.
                </p>
            </div>

        </section>


        <!-- PROFILE HEADER -->

        <section class="profile-card">

            <div class="profile-main">

                <div class="profile-image-wrapper">

                    <img src="<?= htmlspecialchars($profilePhoto) ?>"
                         alt="Caregiver profile"
                         class="profile-image"
                         id="profilePreview">

                    <span class="verified-badge">
                        ✓ Verified
                    </span>

                </div>


                <div class="profile-information">

                    <h2>
                        <?= htmlspecialchars($caregiverName) ?>
                    </h2>

                    <p class="profile-role">
                        Professional Caregiver
                    </p>

                    <div class="profile-meta">

                        <span>
                            🎓 Professional Qualification
                        </span>

                        <span>
                            💼 Experienced Caregiver
                        </span>

                        <span>
                            ⭐ 5.0 Rating
                        </span>

                    </div>

                </div>

            </div>


            <div class="profile-actions">

                <a href="<?= htmlspecialchars($profileUrl) ?>"
                   class="secondary-button">
                    Preview Public Profile
                </a>

                <button type="button"
                        class="primary-button"
                        id="editProfileButton">
                    Edit Profile
                </button>

            </div>

        </section>


        <!-- PROFILE COMPLETION -->

        <section class="completion-card">

            <div class="completion-header">

                <div>
                    <h2>Complete Your Profile</h2>

                    <p>
                        Keep your professional information updated
                        to provide accurate information to families.
                    </p>
                </div>

                <strong>75%</strong>

            </div>

            <div class="progress-bar">
                <div class="progress-value"></div>
            </div>

            <div class="completion-actions">

                <button type="button"
                        class="completion-action"
                        id="addCertificationButton">

                    <span class="completion-icon">+</span>

                    <span>
                        <strong>Add another certification</strong>
                        <small>Improve your professional profile</small>
                    </span>

                </button>


                <button type="button"
                        class="completion-action"
                        id="updatePhotoButton">

                    <span class="completion-icon">📷</span>

                    <span>
                        <strong>Update profile photo</strong>
                        <small>Use a recent professional photo</small>
                    </span>

                </button>


                <button type="button"
                        class="completion-action"
                        id="completeSkillsButton">

                    <span class="completion-icon">✓</span>

                    <span>
                        <strong>Complete your skills</strong>
                        <small>Add your caregiving skills</small>
                    </span>

                </button>

            </div>

        </section>


        <!-- MAIN PROFILE AREA -->

        <form id="caregiverProfileForm"
              class="profile-layout">

            <div class="profile-content">

                <!-- TABS -->

                <div class="profile-tabs">

                    <button type="button"
                            class="profile-tab active"
                            data-tab="overview">
                        Overview
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="professional">
                        Professional Information
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="pricing">
                        Shift Price
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="documents">
                        Documents
                    </button>

                </div>


                <!-- OVERVIEW -->

                <section class="tab-content active"
                         id="overview">

                    <div class="section-heading">

                        <div>
                            <h2>Overview</h2>

                            <p>
                                Your basic caregiver information.
                            </p>
                        </div>

                    </div>


                    <div class="information-grid">

                        <div class="information-item">

                            <label>Full Name</label>

                            <input type="text"
                                   name="full_name"
                                   value="<?= htmlspecialchars($caregiverName) ?>">

                        </div>


                        <div class="information-item">

                            <label>Phone Number</label>

                            <input type="text"
                                   name="phone"
                                   value="">

                        </div>


                        <div class="information-item">

                            <label>Email Address</label>

                            <input type="email"
                                   name="email"
                                   value="">

                        </div>


                        <div class="information-item">

                            <label>District</label>

                            <input type="text"
                                   name="district"
                                   value="">

                        </div>


                        <div class="information-item full-width">

                            <label>Languages</label>

                            <input type="text"
                                   name="languages"
                                   placeholder="Example: Sinhala, English, Tamil">

                        </div>


                        <div class="information-item full-width">

                            <label>About Me</label>

                            <textarea name="biography"
                                      rows="5"
                                      placeholder="Write a short professional introduction..."></textarea>

                        </div>

                    </div>

                </section>


                <!-- PROFESSIONAL INFORMATION -->

                <section class="tab-content"
                         id="professional">

                    <div class="section-heading">

                        <div>
                            <h2>Professional Information</h2>

                            <p>
                                Manage your professional qualifications
                                and caregiving skills.
                            </p>
                        </div>

                    </div>


                    <div class="information-grid">

                        <div class="information-item full-width">

                            <label>Professional Summary</label>

                            <textarea name="professional_summary"
                                      rows="5"
                                      placeholder="Describe your professional experience..."></textarea>

                        </div>


                        <div class="information-item">

                            <label>Highest Qualification</label>

                            <input type="text"
                                   name="highest_qualification"
                                   placeholder="Enter qualification">

                        </div>


                        <div class="information-item">

                            <label>Years of Experience</label>

                            <input type="number"
                                   name="years_experience"
                                   min="0"
                                   value="0">

                        </div>


                        <div class="information-item">

                            <label>Skills</label>

                            <input type="text"
                                   name="skills"
                                   placeholder="Elder care, First Aid, etc.">

                        </div>


                        <div class="information-item">

                            <label>Languages Spoken</label>

                            <input type="text"
                                   name="professional_languages"
                                   placeholder="Sinhala, English">

                        </div>


                        <div class="information-item">

                            <label>Specialization</label>

                            <input type="text"
                                   name="specialization"
                                   placeholder="Example: Elderly Care">

                        </div>


                        <div class="information-item">

                            <label>Availability Status</label>

                            <select name="availability_status">

                                <option value="Available">
                                    Available
                                </option>

                                <option value="Partially Available">
                                    Partially Available
                                </option>

                                <option value="Unavailable">
                                    Unavailable
                                </option>

                            </select>

                        </div>

                    </div>

                </section>


                <!-- SHIFT PRICING -->

                <section class="tab-content"
                         id="pricing">

                    <div class="section-heading">

                        <div>
                            <h2>Shift Price</h2>

                            <p>
                                Set and update your caregiving service
                                prices for different shifts.
                            </p>
                        </div>

                    </div>


                    <div class="pricing-grid">

                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>Morning</h3>
                                <span>6:00 AM - 12:00 PM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="morning_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ shift</span>

                            </div>

                        </div>


                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>Afternoon</h3>
                                <span>12:00 PM - 6:00 PM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="afternoon_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ shift</span>

                            </div>

                        </div>


                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>Evening</h3>
                                <span>6:00 PM - 12:00 AM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="evening_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ shift</span>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- DOCUMENTS -->

                <section class="tab-content"
                         id="documents">

                    <div class="section-heading">

                        <div>
                            <h2>Documents</h2>

                            <p>
                                View your submitted verification documents.
                            </p>
                        </div>

                    </div>


                    <div class="documents-list">

                        <div class="document-item">

                            <div class="document-icon">
                                ✓
                            </div>

                            <div class="document-information">

                                <strong>
                                    NIC
                                </strong>

                                <span>
                                    Submitted during registration
                                </span>

                            </div>

                            <span class="document-status">
                                Verified
                            </span>

                        </div>


                        <div class="document-item">

                            <div class="document-icon">
                                ✓
                            </div>

                            <div class="document-information">

                                <strong>
                                    Qualification Certificate
                                </strong>

                                <span>
                                    Submitted during registration
                                </span>

                            </div>

                            <span class="document-status">
                                Verified
                            </span>

                        </div>


                        <div class="document-item">

                            <div class="document-icon">
                                ✓
                            </div>

                            <div class="document-information">

                                <strong>
                                    Police Clearance
                                </strong>

                                <span>
                                    Submitted during registration
                                </span>

                            </div>

                            <span class="document-status">
                                Verified
                            </span>

                        </div>

                    </div>


                    <div class="upload-document">

                        <label for="additionalDocument">
                            Upload Additional Document
                        </label>

                        <input type="file"
                               id="additionalDocument"
                               name="additional_document">

                    </div>

                </section>


                <!-- ACTIONS -->

                <div class="form-actions">

                    <button type="button"
                            class="cancel-button"
                            id="cancelChangesButton">
                        Cancel Changes
                    </button>

                    <button type="submit"
                            class="primary-button">
                        Save All Changes
                    </button>

                </div>


                <div class="save-message"
                     id="saveMessage"
                     aria-live="polite">
                </div>

            </div>


            <!-- SIDEBAR -->

            <aside class="dashboard-sidebar">

                <div class="sidebar-card">

                    <h3>Quick Stats</h3>

                    <div class="stat-item">

                        <span>Completed Jobs</span>
                        <strong>0</strong>

                    </div>

                    <div class="stat-item">

                        <span>Total Earnings</span>
                        <strong>Rs. 0</strong>

                    </div>

                    <div class="stat-item">

                        <span>Average Rating</span>
                        <strong>5.0 ⭐</strong>

                    </div>

                    <div class="stat-item">

                        <span>Profile Views</span>
                        <strong>0</strong>

                    </div>

                </div>


                <div class="sidebar-card visibility-card">

                    <h3>Profile Visibility</h3>

                    <p>
                        Your profile is currently visible to
                        families searching for caregivers.
                    </p>

                    <label class="switch">

                        <input type="checkbox"
                               checked
                               id="profileVisibility">

                        <span class="slider"></span>

                    </label>

                    <span class="visibility-status"
                          id="visibilityStatus">
                        Visible
                    </span>

                </div>


                <div class="sidebar-card support-card">

                    <h3>Need Help?</h3>

                    <p>
                        Contact SafeHands support if you need
                        assistance with your caregiver account.
                    </p>

                    <a href="/safehands_mvc/contact"
                       class="support-link">
                        Contact Support →
                    </a>

                </div>

            </aside>

        </form>

    </div>

</main>


<!-- HIDDEN PROFILE PHOTO INPUT -->

<input type="file"
       id="profilePhotoInput"
       accept="image/*"
       hidden>


<footer class="dashboard-footer">

    <div class="footer-container">

        <p>
            © <?= date('Y') ?> SafeHands Caregiver Service Management System
        </p>

    </div>

</footer>


<script src="/safehands_mvc/public/assets/js/caregiver-dashboard.js"></script>

</body>
</html>