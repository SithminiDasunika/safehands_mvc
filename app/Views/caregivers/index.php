<header class="top-navbar">

    <nav class="navbar-container">

        <div class="nav-left">

            <a
                href="/safehands_mvc/"
                class="logo"
            >
                SafeHands
            </a>


            <div class="main-navigation">

                <a href="/safehands_mvc/">
                    Home
                </a>

                <a href="/safehands_mvc/#about">
                    About
                </a>

                <a href="/safehands_mvc/#services">
                    Services
                </a>

                <a
                    href="/safehands_mvc/caregiver"
                    class="active"
                >
                    Find Caregivers
                </a>

                <a href="/safehands_mvc/#contact">
                    Contact
                </a>

            </div>

        </div>


        <div class="navigation-actions">

            <a
                href="/safehands_mvc/login"
                class="login-button"
            >
                Login
            </a>

            <a
                href="/safehands_mvc/register"
                class="register-button"
            >
                Register
            </a>

        </div>

    </nav>

</header>



<main class="page-container">


    <!-- =========================================
         PAGE HEADER
    ========================================== -->

    <section class="page-header">

        <h1>
            Find Trusted Caregivers
        </h1>

        <p>
            Browse verified caregivers based on their
            qualifications, experience, ratings, and location.
        </p>

    </section>



    <!-- =========================================
         SEARCH
    ========================================== -->

    <section class="search-section">

        <form
            id="searchForm"
            class="search-form"
        >


            <div class="search-field">

                <label for="name">
                    NAME
                </label>

                <input
                    type="text"
                    id="name"
                    placeholder="Search by name"
                >

            </div>


            <div class="search-field">

                <label for="district">
                    DISTRICT
                </label>

                <select id="district">

                    <option value="">
                        Any District
                    </option>

                <option value="Colombo District">Colombo</option>
<option value="Gampaha District">Gampaha</option>
<option value="Kalutara District">Kalutara</option>
<option value="Kandy District">Kandy</option>
<option value="Matale District">Matale</option>
<option value="Nuwara Eliya District">Nuwara Eliya</option>
<option value="Galle District">Galle</option>
<option value="Matara District">Matara</option>
<option value="Hambantota District">Hambantota</option>
<option value="Jaffna District">Jaffna</option>
<option value="Kilinochchi District">Kilinochchi</option>
<option value="Mannar District">Mannar</option>
<option value="Mullaitivu District">Mullaitivu</option>
<option value="Vavuniya District">Vavuniya</option>
<option value="Batticaloa District">Batticaloa</option>
<option value="Ampara District">Ampara</option>
<option value="Trincomalee District">Trincomalee</option>
<option value="Kurunegala District">Kurunegala</option>
<option value="Puttalam District">Puttalam</option>
<option value="Anuradhapura District">Anuradhapura</option>
<option value="Polonnaruwa District">Polonnaruwa</option>
<option value="Badulla District">Badulla</option>
<option value="Monaragala District">Monaragala</option>
<option value="Ratnapura District">Ratnapura</option>
<option value="Kegalle District">Kegalle</option>

                </select>

            </div>


            <div class="search-field">

                <label for="qualification">
                    QUALIFICATION
                </label>

                <select id="qualification">

                    <option value="">
                        All Levels
                    </option>

                    <option>
                        Certified Nursing Assistant (CNA)
                    </option>

                    <option>
                        Licensed Practical Nurse (LPN)
                    </option>

                    <option>
                        Registered Nurse (RN)
                    </option>

                    <option>
                        First Aid Certified
                    </option>

                </select>

            </div>


            <div class="search-field">

                <label for="language">
                    LANGUAGE
                </label>

                <select id="language">

                    <option value="">
                        Any Language
                    </option>

                    <option>
                        English
                    </option>

                    <option>
                        Spanish
                    </option>

                    <option>
                        Mandarin
                    </option>

                    <option>
                        French
                    </option>

                </select>

            </div>


            <div class="search-field">

                <label for="experience">
                    EXPERIENCE
                </label>

                <select id="experience">

                    <option value="">
                        Any Experience
                    </option>

                    <option>
                        1-3 Years
                    </option>

                    <option>
                        3-5 Years
                    </option>

                    <option>
                        5-10 Years
                    </option>

                    <option>
                        10+ Years
                    </option>

                </select>

            </div>


            <div class="search-actions">

                <button
                    type="submit"
                    class="search-button"
                >
                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        ></circle>

                        <path d="m20 20-4-4"></path>

                    </svg>

                    Search

                </button>


                <button
                    type="reset"
                    class="clear-button"
                    id="clearButton"
                >
                    Clear
                </button>

            </div>

        </form>

    </section>



    <!-- =========================================
         CONTENT
    ========================================== -->

    <div class="content-layout">


        <!-- =====================================
             SIDEBAR
        ====================================== -->

        <aside class="sidebar">


            <div class="filter-group">

                <h3>
                    VERIFICATION
                </h3>

                <label class="checkbox-label">

                    <input
                        type="checkbox"
                        id="verifiedOnly"
                        checked
                    >

                    <span>
                        Verified Caregivers Only
                    </span>

                </label>

            </div>



            <div class="filter-group">

                <h3>
                    EXPERIENCE LEVEL
                </h3>

                <label class="checkbox-label">

                    <input
                        type="checkbox"
                        class="experience-filter"
                        value="Senior"
                    >

                    <span>
                        Senior (10+ yrs)
                    </span>

                </label>


                <label class="checkbox-label">

                    <input
                        type="checkbox"
                        class="experience-filter"
                        value="Advanced"
                    >

                    <span>
                        Advanced (5-10 yrs)
                    </span>

                </label>


                <label class="checkbox-label">

                    <input
                        type="checkbox"
                        class="experience-filter"
                        value="Experienced"
                    >

                    <span>
                        Experienced (2-5 yrs)
                    </span>

                </label>

            </div>



            <div class="filter-group">

                <h3>
                    GENDER PREFERENCE
                </h3>

                <div class="gender-buttons">

                    <button
                        type="button"
                        class="gender-button"
                    >
                        Female
                    </button>

                    <button
                        type="button"
                        class="gender-button"
                    >
                        Male
                    </button>

                </div>

            </div>



            <div class="filter-group">

                <h3>
                    LANGUAGES
                </h3>

                <div class="language-tags">

                    <button type="button">
                        English
                    </button>

                    <button type="button">
                        Spanish
                    </button>

                    <button type="button">
                        Mandarin
                    </button>

                    <button type="button">
                        Arabic
                    </button>

                </div>

            </div>

        </aside>



        <!-- =====================================
             RESULTS
        ====================================== -->

        <section class="results-section">


            <div class="results-header">

                <p>
                    <strong id="resultCount">
                        <?= count($caregivers) ?>
                    </strong>

                    caregivers found in your area
                </p>


                <select id="sortSelect">

                    <option value="match">
                        Sort by: Best Match
                    </option>

                    <option value="rating">
                        Sort by: Highest Rating
                    </option>

                    <option value="experience">
                        Sort by: Most Experienced
                    </option>

                </select>

            </div>



            <div
                class="results-grid"
                id="resultsGrid"
            >

                <?php foreach ($caregivers as $caregiver): ?>

                    <article
                        class="caregiver-card"
                        data-name="<?= htmlspecialchars($caregiver['name']) ?>"
                        data-district="<?= htmlspecialchars($caregiver['district']) ?>"
                        data-rating="<?= htmlspecialchars($caregiver['rating']) ?>"
                        data-experience="<?= htmlspecialchars($caregiver['experience']) ?>"
                    >

                        <div class="card-content">


                            <div class="caregiver-header">

                                <div class="profile-image-wrapper">

                                    <img
                                        src="<?= htmlspecialchars($caregiver['image']) ?>"
                                        alt="<?= htmlspecialchars($caregiver['name']) ?>"
                                        class="profile-image"
                                    >

                                    <span class="verified-badge">

                                        <svg viewBox="0 0 24 24">

                                            <path
                                                d="M20 6L9 17l-5-5"
                                            ></path>

                                        </svg>

                                    </span>

                                </div>


                                <div class="caregiver-main-info">

                                    <div class="name-rating">

                                        <h2>
                                            <?= htmlspecialchars($caregiver['name']) ?>
                                        </h2>

                                        <div class="rating">

                                            <svg viewBox="0 0 24 24">

                                                <path
                                                    d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-2.9-5.6 2.9 1.1-6.2L3 9.6l6.2-.9L12 3z"
                                                ></path>

                                            </svg>

                                            <span>
                                                <?= htmlspecialchars($caregiver['rating']) ?>
                                            </span>

                                        </div>

                                    </div>


                                    <p class="specialization">
                                        <?= htmlspecialchars($caregiver['specialization']) ?>
                                    </p>


                                    <p class="district">

                                        <svg viewBox="0 0 24 24">

                                            <path
                                                d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z"
                                            ></path>

                                            <circle
                                                cx="12"
                                                cy="9"
                                                r="2.5"
                                            ></circle>

                                        </svg>

                                        <?= htmlspecialchars($caregiver['district']) ?>

                                    </p>

                                </div>

                            </div>



                            <div class="caregiver-details">

                                <div>

                                    <span>
                                        EXPERIENCE
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($caregiver['experience']) ?>
                                    </strong>

                                </div>


                                <div>

                                    <span>
                                        EDUCATION
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars($caregiver['education']) ?>
                                    </strong>

                                </div>

                            </div>



                            <p class="description">
                                "<?= htmlspecialchars($caregiver['description']) ?>"
                            </p>



                            <div class="caregiver-languages">

                                <?php foreach ($caregiver['languages'] as $language): ?>

                                    <span>
                                        <?= htmlspecialchars($language) ?>
                                    </span>

                                <?php endforeach; ?>

                            </div>

                        </div>



                        <div class="card-footer">

                            <a
                                href="/safehands_mvc/caregiver/profile/<?= $caregiver['id'] ?>"
                                class="view-profile"
                            >
                                View Profile
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>



            <!-- EMPTY STATE -->

            <div
                class="empty-state"
                id="emptyState"
            >

                <div class="empty-icon">

                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="10"
                            cy="10"
                            r="6"
                        ></circle>

                        <path d="m15 15 5 5"></path>

                    </svg>

                </div>


                <h3>
                    No caregivers found
                </h3>


                <p>
                    Try adjusting your search filters
                    or clearing some parameters to see
                    more results.
                </p>


                <button
                    type="button"
                    id="resetFilters"
                >
                    Reset Filters
                </button>

            </div>



            <!-- PAGINATION -->

            <div class="pagination">

                <button
                    type="button"
                    class="pagination-button"
                    id="previousPage"
                >

                    <svg viewBox="0 0 24 24">

                        <path d="M15 18l-6-6 6-6"></path>

                    </svg>

                    Previous

                </button>


                <div class="page-numbers">

                    <button
                        class="page-number active"
                        type="button"
                    >
                        1
                    </button>

                    <button
                        class="page-number"
                        type="button"
                    >
                        2
                    </button>

                    <button
                        class="page-number"
                        type="button"
                    >
                        3
                    </button>

                </div>


                <button
                    type="button"
                    class="pagination-button"
                    id="nextPage"
                >

                    Next

                    <svg viewBox="0 0 24 24">

                        <path d="m9 18 6-6-6-6"></path>

                    </svg>

                </button>

            </div>

        </section>

    </div>



    <!-- =========================================
         CTA
    ========================================== -->

    <section class="cta-section">

        <div class="cta-content">

            <h2>
                Looking for personalized caregiving support?
            </h2>

            <p>
                Create a SafeHands account to book verified
                caregivers and manage care services seamlessly
                through our platform.
            </p>


            <a
                href="/safehands_mvc/register"
                class="cta-button"
            >

                Create Account

                <svg viewBox="0 0 24 24">

                    <path d="M5 12h14"></path>

                    <path d="m13 6 6 6-6 6"></path>

                </svg>

            </a>

        </div>

    </section>

</main>



<footer class="footer">

    <div class="footer-container">

        <div>

            <span class="footer-logo">
                SafeHands
            </span>

            <p>
                Professional healthcare solutions
                for families and facilities.
            </p>

        </div>


        <div class="footer-right">

            <div class="footer-links">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Service
                </a>

                <a href="#">
                    Contact Support
                </a>

            </div>


            <p>
                © 2024 SafeHands Healthcare.
                All rights reserved.
            </p>

        </div>

    </div>

</footer>