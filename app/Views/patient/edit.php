<?php

$patient = $patient ?? [];

$patientId = (int) ($patient['patient_id'] ?? 0);

$patientName = $patient['full_name'] ?? '';
$patientDob = $patient['date_of_birth'] ?? '';
$patientGender = $patient['gender'] ?? '';
$patientBloodGroup = $patient['blood_group'] ?? '';
$patientNic = $patient['nic'] ?? '';
$patientRelationship = $patient['relationship'] ?? '';
$patientPhone = $patient['phone'] ?? '';
$patientAddress = $patient['address'] ?? '';
$patientAllergies = $patient['allergies'] ?? '';
$patientMobility = $patient['mobility_status'] ?? '';
$patientMedications = $patient['current_medications'] ?? '';
$patientSpecialCare = $patient['special_care_requirements'] ?? '';
$patientDietary = $patient['dietary_restrictions'] ?? '';
$patientDoctorNotes = $patient['doctors_notes'] ?? '';
$patientEmergencyName = $patient['emergency_contact_name'] ?? '';
$patientEmergencyRelationship = $patient['emergency_contact_relationship'] ?? '';
$patientEmergencyPhone = $patient['emergency_contact_phone'] ?? '';
$patientEmergencyAltPhone = $patient['emergency_alternative_phone'] ?? '';
$patientPhoto = $patient['profile_photo'] ?? '';

$conditions = [];

if (!empty($patient['medical_conditions'])) {
    $conditions = preg_split(
        '/[\\r\\n,]+/',
        $patient['medical_conditions']
    );

    $conditions = array_values(
        array_filter(
            array_map('trim', $conditions)
        )
    );
}

$documents = [];

if (!empty($patient['medical_document'])) {
    $documentPath = $patient['medical_document'];
    $documentName = basename($documentPath);

    $documents[] = [
        'name' => $documentName,
        'date' => !empty($patient['updated_at'])
            ? date('M d, Y', strtotime($patient['updated_at']))
            : '',
        'size' => '',
        'type' => 'DOC',
        'path' => $documentPath
    ];
}

?>


<div class="edit-patient-page">

    <!-- Success Notification -->
    <div id="successNotification" class="success-notification">
        <div class="success-icon">✓</div>

        <div>
            <strong>Patient profile updated successfully.</strong>
            <span>Your changes have been saved.</span>
        </div>

        <button type="button" onclick="closeNotification()">×</button>
    </div>


    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="#">Patients</a>
        <span>/</span>
        <span><?= htmlspecialchars($patientName) ?></span>
        <span>/</span>
        <strong>Edit Profile</strong>
    </div>


    <!-- Page Header -->
    <div class="page-header">

        <div>
            <h1>Edit Patient Profile</h1>

            <p>
                Update patient information, medical details,
                emergency contacts and documents.
            </p>
        </div>

    </div>


    <form id="editPatientForm" action="/safehands_mvc/patient/update/<?= $patientId ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="patient_id" value="<?= $patientId ?>">

        <div class="edit-layout">

            <!-- ========================= -->
            <!-- LEFT SIDEBAR -->
            <!-- ========================= -->

            <aside class="patient-sidebar">

                <div class="patient-preview">

                    <div class="patient-photo-wrapper">

                        <img
                            id="patientPhotoPreview"
                            src="<?= htmlspecialchars($patientPhoto ?: "/safehands_mvc/public/assets/images/default-patient.png") ?>"
                            alt="Patient Photo"
                            class="patient-photo"
                        >

                        <div class="photo-overlay">
                            Change
                        </div>

                    </div>

                    <input
                        type="file"
                        name="profile_photo"
                        id="patientPhoto"
                        accept=".jpg,.jpeg,.png"
                        hidden
                    >

                    <button
                        type="button"
                        class="change-photo-btn"
                        onclick="document.getElementById('patientPhoto').click()"
                    >
                        Change Photo
                    </button>


                    <h2><?= htmlspecialchars($patientName) ?></h2>

                    <p class="patient-relation">
                        <?= htmlspecialchars($patientRelationship) ?>
                    </p>

                    <span class="care-status">
                        Patient Profile
                    </span>

                </div>


                <!-- Profile Stats -->

                <div class="profile-stats">

                    <h3>Profile Stats</h3>

                    <div class="stat-item">

                        <span class="stat-label">
                            Last Updated
                        </span>

                        <strong>
                            <?= !empty($patient['updated_at'])
                                ? htmlspecialchars(date('M d, Y', strtotime($patient['updated_at'])))
                                : 'Not available' ?>
                        </strong>

                    </div>


                    <div class="stat-item">

                        <span class="stat-label">
                            Care Level
                        </span>

                        <strong>
                            Registered
                        </strong>

                    </div>

                </div>

            </aside>


            <!-- ========================= -->
            <!-- RIGHT CONTENT -->
            <!-- ========================= -->

            <main class="edit-content">


                <!-- ========================= -->
                <!-- PERSONAL INFORMATION -->
                <!-- ========================= -->

                <section class="form-card">

                    <div class="section-header">

                        <div class="section-number">
                            01
                        </div>

                        <div>
                            <h2>Personal Information</h2>

                            <p>
                                Basic information about the patient.
                            </p>
                        </div>

                    </div>


                    <div class="form-grid">

                        <!-- Full Name -->

                        <div class="form-group full-width">

                            <label for="full_name">
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                value="<?= htmlspecialchars($patientName) ?>"
                            >

                        </div>


                        <!-- DOB -->

                        <div class="form-group">

                            <label for="dob">
                                Date of Birth
                            </label>

                            <input
                                type="date"
                                id="dob"
                                name="dob"
                                value="<?= htmlspecialchars($patientDob) ?>"
                            >

                        </div>


                        <!-- Gender -->

                        <div class="form-group">

                            <label for="gender">
                                Gender
                            </label>

                            <select id="gender" name="gender">

                                <option value="Male"
                                    <?= $patientGender === 'Male' ? 'selected' : '' ?>>
                                    Male
                                </option>

                                <option value="Female"
                                    <?= $patientGender === 'Female' ? 'selected' : '' ?>>
                                    Female
                                </option>

                                <option value="Other"
                                    <?= $patientGender === 'Other' ? 'selected' : '' ?>>
                                    Other
                                </option>

                            </select>

                        </div>


                        <!-- Blood Group -->

                        <div class="form-group">

                            <label for="blood_group">
                                Blood Group
                            </label>

                            <select id="blood_group" name="blood_group">

                                <?php
                                $bloodGroups = [
                                    'A+', 'A-',
                                    'B+', 'B-',
                                    'AB+', 'AB-',
                                    'O+', 'O-'
                                ];
                                ?>

                                <?php foreach ($bloodGroups as $blood): ?>

                                    <option
                                        value="<?= $blood ?>"
                                        <?= $patientBloodGroup === $blood ? 'selected' : '' ?>
                                    >
                                        <?= $blood ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- NIC -->

                        <div class="form-group">

                            <label for="nic">
                                NIC
                            </label>

                            <input
                                type="text"
                                id="nic"
                                name="nic"
                                value="<?= htmlspecialchars($patientNic) ?>"
                            >

                        </div>


                        <!-- Relationship -->

                        <div class="form-group">

                            <label for="relationship">
                                Relationship
                            </label>

                            <select
                                id="relationship"
                                name="relationship"
                            >

                                <?php

                                $relationships = [
                                    'Father',
                                    'Mother',
                                    'Grandfather',
                                    'Grandmother',
                                    'Spouse',
                                    'Self',
                                    'Other'
                                ];

                                ?>

                                <?php foreach ($relationships as $relationship): ?>

                                    <option
                                        value="<?= $relationship ?>"
                                        <?= $patientRelationship === $relationship ? 'selected' : '' ?>
                                    >
                                        <?= $relationship ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

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
                                value="<?= htmlspecialchars($patientPhone) ?>"
                            >

                        </div>


                        <!-- Address -->

                        <div class="form-group full-width">

                            <label for="address">
                                Home Address
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                rows="4"
                            ><?= htmlspecialchars($patientAddress) ?></textarea>

                        </div>

                    </div>

                </section>



                <!-- ========================= -->
                <!-- MEDICAL INFORMATION -->
                <!-- ========================= -->

                <section class="form-card">

                    <div class="section-header">

                        <div class="section-number">
                            02
                        </div>

                        <div>

                            <h2>Medical Information</h2>

                            <p>
                                Medical conditions and care requirements.
                            </p>

                        </div>

                    </div>


                    <!-- Conditions -->

                    <div class="form-group">

                        <label>
                            Medical Conditions
                        </label>

                        <div
                            id="conditionsContainer"
                            class="condition-tags"
                        >

                            <?php foreach ($conditions as $condition): ?>

                                <span class="condition-tag">

                                    <?= htmlspecialchars($condition) ?>

                                    <button
                                        type="button"
                                        onclick="removeCondition(this)"
                                    >
                                        ×
                                    </button>

                                </span>

                            <?php endforeach; ?>

                        </div>


                        <div class="add-condition">

                            <input
                                type="text"
                                id="conditionInput"
                                placeholder="Enter medical condition"
                            >

                            <button
                                type="button"
                                onclick="addCondition()"
                            >
                                + Add Condition
                            </button>

                        </div>

                    </div>


                    <div class="form-grid">

                        <!-- Allergies -->

                        <div class="form-group">

                            <label for="allergies">
                                Allergies
                            </label>

                            <input
                                type="text"
                                id="allergies"
                                name="allergies"
                                value="<?= htmlspecialchars($patientAllergies) ?>"
                            >

                        </div>


                        <!-- Mobility -->

                        <div class="form-group">

                            <label for="mobility">
                                Mobility Status
                            </label>

                            <select
                                id="mobility"
                                name="mobility"
                            >

                                <option
                                    value="Independent"
                                    <?= $patientMobility === 'Independent' ? 'selected' : '' ?>
                                >
                                    Independent
                                </option>

                                <option
                                    value="Walking Assistance"
                                    <?= $patientMobility === 'Walking Assistance' ? 'selected' : '' ?>
                                >
                                    Walking Assistance
                                </option>

                                <option
                                    value="Wheelchair User"
                                    <?= $patientMobility === 'Wheelchair User' ? 'selected' : '' ?>
                                >
                                    Wheelchair User
                                </option>

                                <option
                                    value="Bedridden"
                                    <?= $patientMobility === 'Bedridden' ? 'selected' : '' ?>
                                >
                                    Bedridden
                                </option>

                            </select>

                        </div>


                        <!-- Medications -->

                        <div class="form-group full-width">

                            <label for="medications">
                                Current Medications
                            </label>

                            <textarea
                                id="medications"
                                name="medications"
                                rows="4"
                            ><?= htmlspecialchars($patientMedications) ?></textarea>

                        </div>


                        <!-- Special Care -->

                        <div class="form-group full-width">

                            <label for="special_care">
                                Special Care Requirements
                            </label>

                            <textarea
                                id="special_care"
                                name="special_care"
                                rows="4"
                            ><?= htmlspecialchars($patientSpecialCare) ?></textarea>

                        </div>


                        <!-- Dietary -->

                        <div class="form-group full-width">

                            <label for="dietary">
                                Dietary Restrictions
                            </label>

                            <textarea
                                id="dietary"
                                name="dietary"
                                rows="4"
                            ><?= htmlspecialchars($patientDietary) ?></textarea>

                        </div>


                        <!-- Doctor Notes -->

                        <div class="form-group full-width">

                            <label for="doctor_notes">
                                Doctor's Notes
                            </label>

                            <textarea
                                id="doctor_notes"
                                name="doctor_notes"
                                rows="5"
                            ><?= htmlspecialchars($patientDoctorNotes) ?></textarea>

                        </div>

                    </div>

                </section>



                <!-- ========================= -->
                <!-- EMERGENCY CONTACT -->
                <!-- ========================= -->

                <section class="form-card">

                    <div class="section-header">

                        <div class="section-number">
                            03
                        </div>

                        <div>

                            <h2>Emergency Contact</h2>

                            <p>
                                Person to contact during emergencies.
                            </p>

                        </div>

                    </div>


                    <div class="form-grid">

                        <div class="form-group">

                            <label for="emergency_name">
                                Contact Name
                            </label>

                            <input
                                type="text"
                                id="emergency_name"
                                name="emergency_name"
                                value="<?= htmlspecialchars($patientEmergencyName) ?>"
                            >

                        </div>


                        <div class="form-group">

                            <label for="emergency_relationship">
                                Relationship
                            </label>

                            <select
                                id="emergency_relationship"
                                name="emergency_relationship"
                            >

                                <?php

                                $emergencyRelationships = [
                                    'Daughter',
                                    'Son',
                                    'Spouse',
                                    'Daughter-in-law',
                                    'Son-in-law',
                                    'Sibling',
                                    'Other'
                                ];

                                ?>

                                <?php foreach ($emergencyRelationships as $relationship): ?>

                                    <option
                                        value="<?= $relationship ?>"
                                        <?= $patientEmergencyRelationship === $relationship ? 'selected' : '' ?>
                                    >
                                        <?= $relationship ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <div class="form-group">

                            <label for="emergency_phone">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                id="emergency_phone"
                                name="emergency_phone"
                                value="<?= htmlspecialchars($patientEmergencyPhone) ?>"
                            >

                        </div>


                        <div class="form-group">

                            <label for="emergency_alt_phone">
                                Alternative Phone
                            </label>

                            <input
                                type="tel"
                                id="emergency_alt_phone"
                                name="emergency_alt_phone"
                                value="<?= htmlspecialchars($patientEmergencyAltPhone) ?>"
                            >

                        </div>

                    </div>

                </section>



                <!-- ========================= -->
                <!-- MEDICAL DOCUMENTS -->
                <!-- ========================= -->

                <section class="form-card">

                    <div class="section-header">

                        <div class="section-number">
                            04
                        </div>

                        <div>

                            <h2>Medical Documents</h2>

                            <p>
                                Manage patient medical documents.
                            </p>

                        </div>

                    </div>


                    <div
                        id="documentsContainer"
                        class="documents-list"
                    >

                        <?php foreach ($documents as $document): ?>

                            <div class="document-item">

                                <div class="document-icon">
                                    <?= htmlspecialchars($document['type']) ?>
                                </div>


                                <div class="document-info">

                                    <strong>
                                        <?= htmlspecialchars($document['name']) ?>
                                    </strong>

                                    <span>
                                        <?= htmlspecialchars($document['date']) ?>
                                        ·
                                        <?= htmlspecialchars($document['size']) ?>
                                    </span>

                                </div>


                                <div class="document-actions">

                                    <button
                                        type="button"
                                        class="document-btn replace-btn"
                                    >
                                        Replace
                                    </button>

                                    <button
                                        type="button"
                                        class="document-btn remove-btn"
                                    >
                                        Remove
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <div class="upload-area">

                        <input
                            type="file"
                            name="medical_document"
                            id="newDocument"
                            accept=".pdf,.jpg,.jpeg,.png"
                            hidden
                        >

                        <button
                            type="button"
                            class="upload-btn"
                            onclick="document.getElementById('newDocument').click()"
                        >
                            + Upload New Document
                        </button>

                        <p>
                            PDF, JPG, JPEG or PNG. Maximum file size: 5MB.
                        </p>

                    </div>

                </section>



                <!-- ========================= -->
                <!-- ACTION BUTTONS -->
                <!-- ========================= -->

                <div class="form-actions">

                    <button
                        type="button"
                        class="btn btn-reset"
                        id="resetBtn"
                    >
                        Reset Changes
                    </button>


                    <button
                        type="button"
                        class="btn btn-cancel"
                        id="cancelBtn"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="btn btn-save"
                        id="saveBtn"
                    >
                        Save Changes
                    </button>

                </div>

            </main>

        </div>

    </form>

</div>
