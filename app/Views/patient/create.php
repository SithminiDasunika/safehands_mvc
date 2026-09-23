<?php
// SafeHands - Add New Patient
// Frontend-only version.
// Backend/database connection will be added later.
?>

<header class="top-nav">

    <div class="nav-container">

        <div class="nav-left">

            <a
                href="/safehands_mvc/family"
                class="brand"
            >
                SafeHands
            </a>

            <nav class="nav-links">

                <a
                    href="/safehands_mvc/family"
                    class="nav-link"
                >
                    Dashboard
                </a>

                <a
                    href="/safehands_mvc/patient"
                    class="nav-link active"
                >
                    Patients
                </a>

                <a
                    href="/safehands_mvc/caregiver"
                    class="nav-link"
                >
                    Find Caregivers
                </a>

                <a
                    href="/safehands_mvc/booking"
                    class="nav-link"
                >
                    My Bookings
                </a>

            </nav>

        </div>


        <!-- RIGHT SIDE -->

        <div class="nav-actions">

            <!-- Notifications -->

            <a
                href="/safehands_mvc/notification"
                class="header-icon"
                aria-label="Notifications"
                title="Notifications"
            >

                <svg
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >

                    <path
                        d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"
                    ></path>

                    <path
                        d="M10 21h4"
                    ></path>

                </svg>

            </a>


            <!-- Profile -->

            <div class="profile-menu">

                <button
                    type="button"
                    class="profile-button"
                    id="profileButton"
                    aria-expanded="false"
                    aria-label="Account menu"
                >

                    <span class="profile-avatar">
                        S
                    </span>

                </button>


                <!-- Profile Dropdown -->

                <div
                    class="profile-dropdown"
                    id="profileDropdown"
                >

                    <div class="profile-dropdown-user">

                        <span class="dropdown-avatar">
                            S
                        </span>

                        <div>

                            <strong>
                                Family Member
                            </strong>

                            <span>
                                SafeHands Account
                            </span>

                        </div>

                    </div>


                    <div class="dropdown-divider"></div>


                    <a
                        href="/safehands_mvc/logout"
                        class="logout-link"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >

                            <path
                                d="M10 17l5-5-5-5"
                            ></path>

                            <path
                                d="M15 12H3"
                            ></path>

                            <path
                                d="M21 19V5"
                            ></path>

                        </svg>

                        <span>
                            Logout
                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>

</header>


<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="main-content">


    <!-- Breadcrumb -->

    <nav
        class="breadcrumb"
        aria-label="Breadcrumb"
    >

        <a href="/safehands_mvc/family">
            Dashboard
        </a>

        <span>
            ›
        </span>

        <a href="/safehands_mvc/patient">
            Patients
        </a>

        <span>
            ›
        </span>

        <span class="active-crumb">
            Add New Patient
        </span>

    </nav>


    <!-- Page Header -->

    <div class="page-header">

        <h1>
            Add New Patient
        </h1>

        <p>
            Create a patient profile to start booking
            professional caregiver services.
        </p>

    </div>


    <!-- =====================================================
         PROGRESS TRACKER
    ====================================================== -->

    <div
        class="progress-tracker"
        id="progress-tracker"
    >

        <div class="tracker-line"></div>

        <div class="tracker-steps">


            <!-- STEP 1 -->

            <div
                class="step-item active"
                id="step-item-1"
            >

                <div
                    class="dot"
                    id="label-1"
                >
                    1
                </div>

                <span class="step-label">
                    Personal Information
                </span>

            </div>


            <!-- STEP 2 -->

            <div
                class="step-item"
                id="step-item-2"
            >

                <div
                    class="dot"
                    id="label-2"
                >
                    2
                </div>

                <span class="step-label">
                    Medical Information
                </span>

            </div>


            <!-- STEP 3 -->

            <div
                class="step-item"
                id="step-item-3"
            >

                <div
                    class="dot"
                    id="label-3"
                >
                    3
                </div>

                <span class="step-label">
                    Emergency &amp; Docs
                </span>

            </div>

        </div>

    </div>


    <!-- =====================================================
         FORM
    ====================================================== -->

    <form
        id="patientForm"
        action="#"
        method="POST"
        enctype="multipart/form-data"
        novalidate
    >

        <div class="form-container">


            <!-- =================================================
                 STEP 1
            ================================================== -->

            <section
                id="step-1-content"
                class="step-transition"
            >

                <div class="card">


                    <!-- PROFILE PHOTO -->

                    <div class="profile-upload">

                        <div class="upload-card">


                            <!-- Camera icon -->

                            <div class="upload-icon-wrapper">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >

                                    <path
                                        d="M4 7h3l1.5-2h7L17 7h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1z"
                                    ></path>

                                    <circle
                                        cx="12"
                                        cy="13"
                                        r="3.5"
                                    ></circle>

                                </svg>

                            </div>


                            <!-- Upload content -->

                            <div class="upload-content">

                                <h3>
                                    Upload Profile Photo
                                </h3>

                                <p>
                                    Add a clear photo of the patient
                                </p>

                                <span class="upload-format">
                                    JPG, JPEG or PNG · Maximum 2MB
                                </span>


                                <!-- Real file input hidden -->

                                <input
                                    type="file"
                                    name="profile_photo"
                                    id="profile_photo"
                                    accept=".jpg,.jpeg,.png"
                                    hidden
                                >


                                <!-- Custom button -->

                                <label
                                    for="profile_photo"
                                    class="choose-photo-btn"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >

                                        <path
                                            d="M12 3v12"
                                        ></path>

                                        <path
                                            d="M7 8l5-5 5 5"
                                        ></path>

                                        <path
                                            d="M5 21h14"
                                        ></path>

                                    </svg>

                                    Choose Photo

                                </label>


                                <div
                                    class="selected-file"
                                    id="profileFileName"
                                ></div>

                            </div>

                        </div>


                        <!-- Photo preview -->

                        <div
                            class="photo-preview"
                            id="profilePhotoPreview"
                        >

                            <img
                                id="profilePreviewImage"
                                src=""
                                alt="Profile preview"
                            >

                            <button
                                type="button"
                                id="removeProfilePhoto"
                                class="remove-photo"
                                aria-label="Remove photo"
                            >
                                ×
                            </button>

                        </div>


                        <p class="upload-hint">
                            Recommended size: 512 × 512px
                        </p>

                    </div>


                    <!-- PERSONAL INFORMATION -->

                    <div class="form-grid">


                        <!-- Full Name -->

                        <div class="form-group">

                            <label for="full_name">
                                Full Name
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                class="form-control"
                                placeholder="e.g. Johnathan Doe"
                                required
                            >

                        </div>


                        <!-- Date of Birth -->

                        <div class="form-group">

                            <label for="date_of_birth">
                                Date of Birth
                                <span>*</span>
                            </label>

                            <input
                                type="date"
                                id="date_of_birth"
                                name="date_of_birth"
                                class="form-control"
                                required
                            >

                        </div>


                        <!-- Gender -->

                        <div class="form-group">

                            <label for="gender">
                                Gender
                                <span>*</span>
                            </label>

                            <select
                                id="gender"
                                name="gender"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Select Gender
                                </option>

                                <option value="Male">
                                    Male
                                </option>

                                <option value="Female">
                                    Female
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </div>


                        <!-- Relationship -->

                        <div class="form-group">

                            <label for="relationship">
                                Relationship
                                <span>*</span>
                            </label>

                            <select
                                id="relationship"
                                name="relationship"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Select Relationship
                                </option>

                                <option value="Father">
                                    Father
                                </option>

                                <option value="Mother">
                                    Mother
                                </option>

                                <option value="Grandfather">
                                    Grandfather
                                </option>

                                <option value="Grandmother">
                                    Grandmother
                                </option>

                                <option value="Spouse">
                                    Spouse
                                </option>

                                <option value="Self">
                                    Self
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </div>


                        <!-- NIC -->

                        <div class="form-group">

                            <label for="nic">
                                NIC Number / ID
                            </label>

                            <input
                                type="text"
                                id="nic"
                                name="nic"
                                class="form-control"
                                placeholder="e.g. 200012345678"
                            >

                        </div>


                        <!-- Phone -->

                        <div class="form-group">

                            <label for="phone">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="+94 77 123 4567"
                            >

                        </div>


                        <!-- Address -->

                        <div class="form-group span-full">

                            <label for="address">
                                Home Address
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                class="form-control"
                                rows="3"
                                placeholder="Street address, City, Apartment, Postal Code"
                            ></textarea>

                        </div>

                    </div>


                    <!-- STEP 1 BUTTONS -->

                    <div class="button-group">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="window.location.href='/safehands_mvc/patient'"
                        >
                            Cancel
                        </button>

                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="goToStep(2)"
                        >
                            Next
                        </button>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 STEP 2
            ================================================== -->

            <section
                id="step-2-content"
                class="step-transition hidden"
            >

                <div class="card">

                    <h3 class="card-title">
                        Clinical Profile
                    </h3>


                    <div class="form-grid">


                        <!-- Blood Group -->

                        <div class="form-group">

                            <label for="blood_group">
                                Blood Group
                            </label>

                            <select
                                id="blood_group"
                                name="blood_group"
                                class="form-control"
                            >

                                <option value="">
                                    Select Blood Group
                                </option>

                                <option value="A+">
                                    A+
                                </option>

                                <option value="A-">
                                    A-
                                </option>

                                <option value="B+">
                                    B+
                                </option>

                                <option value="B-">
                                    B-
                                </option>

                                <option value="AB+">
                                    AB+
                                </option>

                                <option value="AB-">
                                    AB-
                                </option>

                                <option value="O+">
                                    O+
                                </option>

                                <option value="O-">
                                    O-
                                </option>

                            </select>

                        </div>


                        <!-- Mobility -->

                        <div class="form-group">

                            <label for="mobility_status">
                                Mobility Status
                            </label>

                            <select
                                id="mobility_status"
                                name="mobility_status"
                                class="form-control"
                            >

                                <option value="">
                                    Select Mobility Status
                                </option>

                                <option value="Independent">
                                    Independent
                                </option>

                                <option value="Walking Assistance">
                                    Walking Assistance
                                </option>

                                <option value="Wheelchair Bound">
                                    Wheelchair Bound
                                </option>

                                <option value="Bedridden">
                                    Bedridden
                                </option>

                            </select>

                        </div>


                        <!-- Weight -->

                        <div class="form-group">

                            <label for="weight">
                                Weight (kg)
                            </label>

                            <input
                                type="number"
                                id="weight"
                                name="weight"
                                class="form-control"
                                placeholder="e.g. 68.5"
                                min="1"
                                max="500"
                                step="0.1"
                            >

                        </div>


                        <!-- Blood Pressure -->

                        <div class="form-group">

                            <label for="blood_pressure">
                                Blood Pressure
                            </label>

                            <input
                                type="text"
                                id="blood_pressure"
                                name="blood_pressure"
                                class="form-control"
                                placeholder="e.g. 130/85"
                                maxlength="20"
                            >

                        </div>


                        <!-- Medical Conditions -->

                        <div class="form-group span-full">

                            <label>
                                Medical Conditions
                            </label>

                            <div
                                class="tags-container"
                                id="medicalConditionsTags"
                            >

                                <button
                                    type="button"
                                    class="tag condition-tag"
                                    data-condition="Diabetes"
                                >
                                    Diabetes
                                </button>

                                <button
                                    type="button"
                                    class="tag condition-tag"
                                    data-condition="Hypertension"
                                >
                                    Hypertension
                                </button>

                                <button
                                    type="button"
                                    class="tag condition-tag"
                                    data-condition="Dementia"
                                >
                                    Dementia
                                </button>

                                <button
                                    type="button"
                                    class="tag condition-tag"
                                    data-condition="Asthma"
                                >
                                    Asthma
                                </button>

                                <button
                                    type="button"
                                    class="tag condition-tag"
                                    data-condition="Arthritis"
                                >
                                    Arthritis
                                </button>

                                <button
                                    type="button"
                                    class="tag add-tag"
                                    id="addConditionButton"
                                >
                                    + Add Condition
                                </button>

                            </div>


                            <input
                                type="hidden"
                                name="medical_conditions"
                                id="medical_conditions"
                                value=""
                            >


                            <small>
                                Select all conditions that apply.
                            </small>


                            <div
                                id="selectedConditions"
                                class="selected-conditions"
                            ></div>

                        </div>


                        <!-- Allergies -->

                        <div class="form-group">

                            <label for="allergies">
                                Allergies
                            </label>

                            <input
                                type="text"
                                id="allergies"
                                name="allergies"
                                class="form-control"
                                placeholder="e.g. Penicillin, Nuts"
                            >

                        </div>


                        <!-- Dietary Restrictions -->

                        <div class="form-group">

                            <label for="dietary_restrictions">
                                Dietary Restrictions
                            </label>

                            <input
                                type="text"
                                id="dietary_restrictions"
                                name="dietary_restrictions"
                                class="form-control"
                                placeholder="e.g. Low sodium, Vegetarian"
                            >

                        </div>


                        <!-- Current Medications -->

                        <div class="form-group span-full">

                            <label for="current_medications">
                                Current Medications
                            </label>

                            <textarea
                                id="current_medications"
                                name="current_medications"
                                class="form-control"
                                rows="2"
                                placeholder="List all prescribed medicines and dosages"
                            ></textarea>

                        </div>


                        <!-- Special Care -->

                        <div class="form-group span-full">

                            <label for="special_care_requirements">
                                Special Care Requirements
                            </label>

                            <textarea
                                id="special_care_requirements"
                                name="special_care_requirements"
                                class="form-control"
                                rows="2"
                                placeholder="Any specific needs or behavioral observations"
                            ></textarea>

                        </div>


                        <!-- Doctor Notes -->

                        <div class="form-group span-full">

                            <label for="doctors_notes">
                                Doctor's Notes
                            </label>

                            <textarea
                                id="doctors_notes"
                                name="doctors_notes"
                                class="form-control"
                                rows="3"
                                placeholder="Additional notes from the patient's doctor"
                            ></textarea>

                        </div>

                    </div>


                    <!-- STEP 2 BUTTONS -->

                    <div class="button-group">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="goToStep(1)"
                        >
                            Back
                        </button>

                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="goToStep(3)"
                        >
                            Next
                        </button>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 STEP 3
            ================================================== -->

            <section
                id="step-3-content"
                class="step-transition hidden"
            >

                <div class="card">

                    <h3 class="card-title">
                        Safety &amp; Documentation
                    </h3>


                    <!-- Emergency Contact -->

                    <div class="section-block">

                        <div class="section-title">
                            Emergency Contact
                        </div>


                        <div class="form-grid">


                            <div class="form-group">

                                <label for="emergency_contact_name">
                                    Contact Name
                                </label>

                                <input
                                    type="text"
                                    id="emergency_contact_name"
                                    name="emergency_contact_name"
                                    class="form-control"
                                    placeholder="Emergency Person Name"
                                >

                            </div>


                            <div class="form-group">

                                <label for="emergency_contact_relationship">
                                    Relationship
                                </label>

                                <input
                                    type="text"
                                    id="emergency_contact_relationship"
                                    name="emergency_contact_relationship"
                                    class="form-control"
                                    placeholder="e.g. Sibling, Friend"
                                >

                            </div>


                            <div class="form-group">

                                <label for="emergency_contact_phone">
                                    Primary Phone
                                </label>

                                <input
                                    type="tel"
                                    id="emergency_contact_phone"
                                    name="emergency_contact_phone"
                                    class="form-control"
                                    placeholder="+94 77 123 4567"
                                >

                            </div>


                            <div class="form-group">

                                <label for="emergency_alternative_phone">
                                    Secondary Phone (Optional)
                                </label>

                                <input
                                    type="tel"
                                    id="emergency_alternative_phone"
                                    name="emergency_alternative_phone"
                                    class="form-control"
                                    placeholder="+94 77 123 4567"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- Medical Document -->

                    <div class="section-block">

                        <div class="section-title">
                            Medical Document
                        </div>


                        <div class="document-upload">


                            <div class="document-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >

                                    <path
                                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                                    ></path>

                                    <path
                                        d="M14 2v6h6"
                                    ></path>

                                    <path
                                        d="M8 13h8"
                                    ></path>

                                    <path
                                        d="M8 17h6"
                                    ></path>

                                </svg>

                            </div>


                            <div class="document-content">

                                <h4>
                                    Initial medical document
                                </h4>

                                <p>
                                    Upload a prescription, lab report,
                                    medical report, or other relevant
                                    document.
                                </p>

                                <span>
                                    PDF, JPG, JPEG or PNG · Maximum 5MB
                                </span>


                                <input
                                    type="file"
                                    name="medical_document"
                                    id="medical_document"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    hidden
                                >


                                <label
                                    for="medical_document"
                                    class="choose-document-btn"
                                >
                                    Choose Document
                                </label>


                                <div
                                    id="medical-document-name"
                                    class="selected-file"
                                ></div>

                            </div>

                        </div>

                    </div>


                    <!-- STEP 3 BUTTONS -->

                    <div class="button-group">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="goToStep(2)"
                        >
                            Back
                        </button>

                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="createPatientButton"
                        >
                            Create Patient Profile
                        </button>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 LOADING
            ================================================== -->

            <section
                id="loading-state"
                class="spinner-container hidden"
            >

                <div class="spinner"></div>

                <h2>
                    Creating patient profile...
                </h2>

                <p>
                    Saving patient information securely.
                </p>

            </section>

        </div>

    </form>

</main>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="site-footer">

    <div class="footer-container">

        <span class="brand">
            SafeHands
        </span>


        <div class="footer-links">

            <a
                href="#"
                class="footer-link"
            >
                Terms of Service
            </a>

            <a
                href="#"
                class="footer-link"
            >
                Privacy Policy
            </a>

            <a
                href="#"
                class="footer-link"
            >
                Escrow Terms
            </a>

            <a
                href="#"
                class="footer-link"
            >
                Contact Support
            </a>

        </div>


        <p>
            &copy;
            <?= date('Y') ?>
            SafeHands Healthcare.
            All rights reserved.
        </p>

    </div>

</footer>