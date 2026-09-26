<?php
$caregiverName = $caregiverName ?? ($_SESSION['caregiver_name'] ?? 'Caregiver');
$caregiverId = $caregiverId ?? ($_SESSION['caregiver_id'] ?? null);

$profileUrl = $caregiverId
    ? '/safehands_mvc/caregiver/profile/' . (int)$caregiverId
    : '/safehands_mvc/caregivers';

$profilePhoto = $profilePhoto ?? '/safehands_mvc/public/assets/images/login-caregiver.jpg';
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>රැකවරණ සේවා Dashboard | SafeHands</title>

    <link rel="stylesheet"
          href="/safehands_mvc/public/assets/css/caregiver-dashboard.css?v=2">
</head>

<body>

 <header class="dashboard-header">

    <div class="header-container">

        <a href="/safehands_mvc/caregiver/dashboardSi"
           class="brand">
            SafeHands
        </a>

        <button type="button"
                class="mobile-menu-button"
                id="mobileMenuButton"
                aria-label="විවෘත කරන්න">
            ☰
        </button>

        <nav class="main-navigation" id="mainNavigation">

            <a href="/safehands_mvc/caregiver/dashboard"
               class="nav-link active">
                උපකරණ පුවරුව
            </a>

            <a href="/safehands_mvc/caregiver/scheduleSi"
               class="nav-link">
                මගේ උපලේඛනය
            </a>

            <a href="/safehands_mvc/caregiver/manageAvailabilitySi"
               class="nav-link">
                ලබා ගත හැකි වේලාව
            </a>

            <a href="/safehands_mvc/caregiver/earningsSi"
               class="nav-link">
                ආදායම්
            </a>

            <a href="/safehands_mvc/caregiver/notificationsSi"
               class="nav-link">
                දැනුම්දීම්
            </a>

        </nav>

        <div class="header-actions">

            <!-- Language Switcher -->
            <div class="language-switcher">

                <a href="/safehands_mvc/caregiver/dashboard">
                    English
                </a>

                <span>|</span>

                <a href="/safehands_mvc/caregiver/dashboardSi"
                   class="active-language">
                    සිංහල
                </a>

            </div>

            <!-- Caregiver Profile -->
            <div class="user-menu">

                <img src="<?= htmlspecialchars($profilePhoto) ?>"
                     alt="රැකවරණ සේවා සපයන්නාගේ පැතිකඩ"
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

                <p class="page-label">රැකවරණ සේවා Dashboard</p>

                <h1>
                    නැවත සාදරයෙන් පිළිගනිමු,
                    <?= htmlspecialchars($caregiverName) ?>
                </h1>

                <p class="page-description">
                    ඔබගේ රැකවරණ සේවා පැතිකඩ, ලබා ගත හැකි වේලාවන්,
                    සේවාවන් සහ වෘත්තීය තොරතුරු කළමනාකරණය කරන්න.
                </p>

            </div>

        </section>


        <!-- PROFILE HEADER -->

        <section class="profile-card">

            <div class="profile-main">

                <div class="profile-image-wrapper">

                    <img src="<?= htmlspecialchars($profilePhoto) ?>"
                         alt="රැකවරණ සේවා පැතිකඩ"
                         class="profile-image"
                         id="profilePreview">

                    <span class="verified-badge">
                        ✓ තහවුරු කරන ලදී
                    </span>

                </div>


                <div class="profile-information">

                    <h2>
                        <?= htmlspecialchars($caregiverName) ?>
                    </h2>

                    <p class="profile-role">
                        වෘත්තීය රැකවරණ සේවා සපයන්නා
                    </p>

                    <div class="profile-meta">

                        <span>
                            🎓 වෘත්තීය සුදුසුකම
                        </span>

                        <span>
                            💼 පළපුරුදු රැකවරණ සේවා සපයන්නා
                        </span>

                        <span>
                            ⭐ 5.0 ශ්‍රේණිගත කිරීම
                        </span>

                    </div>

                </div>

            </div>


            <div class="profile-actions">

                <a href="<?= htmlspecialchars($profileUrl) ?>"
                   class="secondary-button">
                    පොදු පැතිකඩ බලන්න
                </a>

                <button type="button"
                        class="primary-button"
                        id="editProfileButton">
                    පැතිකඩ සංස්කරණය කරන්න
                </button>

            </div>

        </section>


        <!-- PROFILE COMPLETION -->

        <section class="completion-card">

            <div class="completion-header">

                <div>

                    <h2>ඔබගේ පැතිකඩ සම්පූර්ණ කරන්න</h2>

                    <p>
                        පවුල් සඳහා නිවැරදි තොරතුරු ලබා දීම සඳහා
                        ඔබගේ වෘත්තීය තොරතුරු යාවත්කාලීනව තබා ගන්න.
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
                        <strong>තවත් සහතිකයක් එක් කරන්න</strong>
                        <small>ඔබගේ වෘත්තීය පැතිකඩ වැඩිදියුණු කරන්න</small>
                    </span>

                </button>


                <button type="button"
                        class="completion-action"
                        id="updatePhotoButton">

                    <span class="completion-icon">📷</span>

                    <span>
                        <strong>පැතිකඩ ඡායාරූපය යාවත්කාලීන කරන්න</strong>
                        <small>මෑතකාලීන වෘත්තීය ඡායාරූපයක් භාවිතා කරන්න</small>
                    </span>

                </button>


                <button type="button"
                        class="completion-action"
                        id="completeSkillsButton">

                    <span class="completion-icon">✓</span>

                    <span>
                        <strong>ඔබගේ කුසලතා සම්පූර්ණ කරන්න</strong>
                        <small>ඔබගේ රැකවරණ සේවා කුසලතා එක් කරන්න</small>
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
                        දළ විශ්ලේෂණය
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="professional">
                        වෘත්තීය තොරතුරු
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="pricing">
                        සේවා මුර මිල
                    </button>

                    <button type="button"
                            class="profile-tab"
                            data-tab="documents">
                        ලේඛන
                    </button>

                </div>


                <!-- OVERVIEW -->

                <section class="tab-content active"
                         id="overview">

                    <div class="section-heading">

                        <div>

                            <h2>දළ විශ්ලේෂණය</h2>

                            <p>
                                ඔබගේ මූලික රැකවරණ සේවා තොරතුරු.
                            </p>

                        </div>

                    </div>


                    <div class="information-grid">

                        <div class="information-item">

                            <label>සම්පූර්ණ නම</label>

                            <input type="text"
                                   name="full_name"
                                   value="<?= htmlspecialchars($caregiverName) ?>">

                        </div>


                        <div class="information-item">

                            <label>දුරකථන අංකය</label>

                            <input type="text"
                                   name="phone"
                                   value="">

                        </div>


                        <div class="information-item">

                            <label>විද්‍යුත් තැපැල් ලිපිනය</label>

                            <input type="email"
                                   name="email"
                                   value="">

                        </div>


                        <div class="information-item">

                            <label>දිස්ත්‍රික්කය</label>

                            <input type="text"
                                   name="district"
                                   value="">

                        </div>


                        <div class="information-item full-width">

                            <label>භාෂා</label>

                            <input type="text"
                                   name="languages"
                                   placeholder="උදාහරණය: සිංහල, ඉංග්‍රීසි, දෙමළ">

                        </div>


                        <div class="information-item full-width">

                            <label>මා ගැන</label>

                            <textarea name="biography"
                                      rows="5"
                                      placeholder="කෙටි වෘත්තීය හැඳින්වීමක් ලියන්න..."></textarea>

                        </div>

                    </div>

                </section>


                <!-- PROFESSIONAL INFORMATION -->

                <section class="tab-content"
                         id="professional">

                    <div class="section-heading">

                        <div>

                            <h2>වෘත්තීය තොරතුරු</h2>

                            <p>
                                ඔබගේ වෘත්තීය සුදුසුකම් සහ
                                රැකවරණ සේවා කුසලතා කළමනාකරණය කරන්න.
                            </p>

                        </div>

                    </div>


                    <div class="information-grid">

                        <div class="information-item full-width">

                            <label>වෘත්තීය සාරාංශය</label>

                            <textarea name="professional_summary"
                                      rows="5"
                                      placeholder="ඔබගේ වෘත්තීය පළපුරුද්ද විස්තර කරන්න..."></textarea>

                        </div>


                        <div class="information-item">

                            <label>ඉහළම අධ්‍යාපන සුදුසුකම</label>

                            <input type="text"
                                   name="highest_qualification"
                                   placeholder="සුදුසුකම ඇතුළත් කරන්න">

                        </div>


                        <div class="information-item">

                            <label>පළපුරුද්දේ වසර ගණන</label>

                            <input type="number"
                                   name="years_experience"
                                   min="0"
                                   value="0">

                        </div>


                        <div class="information-item">

                            <label>කුසලතා</label>

                            <input type="text"
                                   name="skills"
                                   placeholder="වැඩිහිටි සත්කාරය, ප්‍රථමාධාර ආදිය">

                        </div>


                        <div class="information-item">

                            <label>කතා කරන භාෂා</label>

                            <input type="text"
                                   name="professional_languages"
                                   placeholder="සිංහල, ඉංග්‍රීසි">

                        </div>


                        <div class="information-item">

                            <label>විශේෂීකරණය</label>

                            <input type="text"
                                   name="specialization"
                                   placeholder="උදාහරණය: වැඩිහිටි සත්කාරය">

                        </div>


                        <div class="information-item">

                            <label>ලබා ගත හැකි තත්ත්වය</label>

                            <select name="availability_status">

                                <option value="Available">
                                    ලබා ගත හැක
                                </option>

                                <option value="Partially Available">
                                    අර්ධ වශයෙන් ලබා ගත හැක
                                </option>

                                <option value="Unavailable">
                                    ලබා ගත නොහැක
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

                            <h2>සේවා මුර මිල</h2>

                            <p>
                                විවිධ සේවා මුර සඳහා ඔබගේ
                                රැකවරණ සේවා මිල ගණන් සකස් කර යාවත්කාලීන කරන්න.
                            </p>

                        </div>

                    </div>


                    <div class="pricing-grid">

                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>උදෑසන</h3>
                                <span>6:00 AM - 12:00 PM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="morning_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ සේවා මුරය</span>

                            </div>

                        </div>


                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>දහවල්</h3>
                                <span>12:00 PM - 6:00 PM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="afternoon_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ සේවා මුරය</span>

                            </div>

                        </div>


                        <div class="pricing-card">

                            <div class="pricing-header">
                                <h3>සවස</h3>
                                <span>6:00 PM - 12:00 AM</span>
                            </div>

                            <div class="price-input">

                                <span>Rs.</span>

                                <input type="number"
                                       name="evening_price"
                                       min="0"
                                       placeholder="0.00">

                                <span>/ සේවා මුරය</span>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- DOCUMENTS -->

                <section class="tab-content"
                         id="documents">

                    <div class="section-heading">

                        <div>

                            <h2>ලේඛන</h2>

                            <p>
                                ඔබ ඉදිරිපත් කළ සත්‍යාපන ලේඛන බලන්න.
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
                                    ලියාපදිංචි වීමේදී ඉදිරිපත් කරන ලදී
                                </span>

                            </div>

                            <span class="document-status">
                                තහවුරු කරන ලදී
                            </span>

                        </div>


                        <div class="document-item">

                            <div class="document-icon">
                                ✓
                            </div>

                            <div class="document-information">

                                <strong>
                                    සුදුසුකම් සහතිකය
                                </strong>

                                <span>
                                    ලියාපදිංචි වීමේදී ඉදිරිපත් කරන ලදී
                                </span>

                            </div>

                            <span class="document-status">
                                තහවුරු කරන ලදී
                            </span>

                        </div>


                        <div class="document-item">

                            <div class="document-icon">
                                ✓
                            </div>

                            <div class="document-information">

                                <strong>
                                    පොලිස් නිෂ්කාශන සහතිකය
                                </strong>

                                <span>
                                    ලියාපදිංචි වීමේදී ඉදිරිපත් කරන ලදී
                                </span>

                            </div>

                            <span class="document-status">
                                තහවුරු කරන ලදී
                            </span>

                        </div>

                    </div>


                    <div class="upload-document">

                        <label for="additionalDocument">
                            අමතර ලේඛනයක් උඩුගත කරන්න
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
                        වෙනස්කම් අවලංගු කරන්න
                    </button>

                    <button type="submit"
                            class="primary-button">
                        සියලු වෙනස්කම් සුරකින්න
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

                    <h3>ඉක්මන් සංඛ්‍යාලේඛන</h3>

                    <div class="stat-item">

                        <span>සම්පූර්ණ කළ රැකියා</span>
                        <strong>0</strong>

                    </div>

                    <div class="stat-item">

                        <span>මුළු ආදායම</span>
                        <strong>Rs. 0</strong>

                    </div>

                    <div class="stat-item">

                        <span>සාමාන්‍ය ශ්‍රේණිගත කිරීම</span>
                        <strong>5.0 ⭐</strong>

                    </div>

                    <div class="stat-item">

                        <span>පැතිකඩ නැරඹීම්</span>
                        <strong>0</strong>

                    </div>

                </div>


                <div class="sidebar-card visibility-card">

                    <h3>පැතිකඩ දෘශ්‍යතාව</h3>

                    <p>
                        ඔබගේ පැතිකඩ දැනට රැකවරණ සේවා සපයන්නන්
                        සොයන පවුල් සඳහා දෘශ්‍යමාන වේ.
                    </p>

                    <label class="switch">

                        <input type="checkbox"
                               checked
                               id="profileVisibility">

                        <span class="slider"></span>

                    </label>

                    <span class="visibility-status"
                          id="visibilityStatus">
                        දෘශ්‍යමානයි
                    </span>

                </div>


                <div class="sidebar-card support-card">

                    <h3>උදව් අවශ්‍යද?</h3>

                    <p>
                        ඔබගේ රැකවරණ සේවා ගිණුම සම්බන්ධයෙන්
                        සහාය අවශ්‍ය නම් SafeHands සහාය අමතන්න.
                    </p>

                    <a href="/safehands_mvc/contact"
                       class="support-link">
                        සහාය අමතන්න →
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