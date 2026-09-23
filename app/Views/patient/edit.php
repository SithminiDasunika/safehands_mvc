<?php

$patient = [
    'name' => 'Mr. Silva',
    'full_name' => 'Fernando Silva',
    'dob' => '1952-05-14',
    'gender' => 'Male',
    'blood_group' => 'A+',
    'nic' => '521342678V',
    'relationship' => 'Father',
    'phone' => '+94 77 123 4567',
    'address' => '42/A, Hospital Road, Colombo 07, Sri Lanka',
    'allergies' => 'Penicillin, Peanuts',
    'mobility' => 'Walking Assistance',
    'medications' => 'Metformin 500mg (Daily), Lisinopril 10mg (Daily), Baby Aspirin 81mg (Daily)',
    'special_care' => '',
    'dietary' => 'Low sodium, low sugar intake recommended.',
    'doctor_notes' => 'Stable condition. Needs regular monitoring of blood glucose levels twice a day.',
    'emergency_name' => 'Mrs. Silva (Daughter-in-law)',
    'emergency_relationship' => 'Daughter-in-law',
    'emergency_phone' => '+94 77 987 6543',
    'emergency_alt_phone' => '+94 11 234 5678'
];

$conditions = [
    'Hypertension',
    'Type 2 Diabetes'
];

$documents = [
    [
        'name' => 'Medical Reports - 2023.pdf',
        'date' => 'Oct 05, 2023',
        'size' => '2.4 MB',
        'type' => 'DOC'
    ],
    [
        'name' => 'Doctor Prescriptions.pdf',
        'date' => 'Sep 18, 2023',
        'size' => '1.1 MB',
        'type' => 'RX'
    ],
    [
        'name' => 'Lab Reports - Blood Work.pdf',
        'date' => 'Aug 22, 2023',
        'size' => '3.8 MB',
        'type' => 'LAB'
    ]
];

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
        <span><?= htmlspecialchars($patient['name']) ?></span>
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


    <form id="editPatientForm">

        <div class="edit-layout">

            <!-- ========================= -->
            <!-- LEFT SIDEBAR -->
            <!-- ========================= -->

            <aside class="patient-sidebar">

                <div class="patient-preview">

                    <div class="patient-photo-wrapper">

                        <img
                            id="patientPhotoPreview"
                            src="/safehands_mvc/public/assets/images/default-patient.png"
                            alt="Patient Photo"
                            class="patient-photo"
                        >

                        <div class="photo-overlay">
                            Change
                        </div>

                    </div>

                    <input
                        type="file"
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


                    <h2><?= htmlspecialchars($patient['name']) ?></h2>

                    <p class="patient-relation">
                        <?= htmlspecialchars($patient['relationship']) ?>
                    </p>

                    <span class="care-status">
                        Currently Receiving Care
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
                            Oct 12, 2023
                        </strong>

                    </div>


                    <div class="stat-item">

                        <span class="stat-label">
                            Care Level
                        </span>

                        <strong>
                            Premium
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
                                value="<?= htmlspecialchars($patient['full_name']) ?>"
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
                                value="<?= htmlspecialchars($patient['dob']) ?>"
                            >

                        </div>


                        <!-- Gender -->

                        <div class="form-group">

                            <label for="gender">
                                Gender
                            </label>

                            <select id="gender" name="gender">

                                <option value="Male"
                                    <?= $patient['gender'] === 'Male' ? 'selected' : '' ?>>
                                    Male
                                </option>

                                <option value="Female"
                                    <?= $patient['gender'] === 'Female' ? 'selected' : '' ?>>
                                    Female
                                </option>

                                <option value="Other"
                                    <?= $patient['gender'] === 'Other' ? 'selected' : '' ?>>
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
                                        <?= $patient['blood_group'] === $blood ? 'selected' : '' ?>
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
                                value="<?= htmlspecialchars($patient['nic']) ?>"
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
                                        <?= $patient['relationship'] === $relationship ? 'selected' : '' ?>
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
                                value="<?= htmlspecialchars($patient['phone']) ?>"
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
                            ><?= htmlspecialchars($patient['address']) ?></textarea>

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
                                value="<?= htmlspecialchars($patient['allergies']) ?>"
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
                                    <?= $patient['mobility'] === 'Independent' ? 'selected' : '' ?>
                                >
                                    Independent
                                </option>

                                <option
                                    value="Walking Assistance"
                                    <?= $patient['mobility'] === 'Walking Assistance' ? 'selected' : '' ?>
                                >
                                    Walking Assistance
                                </option>

                                <option
                                    value="Wheelchair User"
                                    <?= $patient['mobility'] === 'Wheelchair User' ? 'selected' : '' ?>
                                >
                                    Wheelchair User
                                </option>

                                <option
                                    value="Bedridden"
                                    <?= $patient['mobility'] === 'Bedridden' ? 'selected' : '' ?>
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
                            ><?= htmlspecialchars($patient['medications']) ?></textarea>

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
                            ><?= htmlspecialchars($patient['special_care']) ?></textarea>

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
                            ><?= htmlspecialchars($patient['dietary']) ?></textarea>

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
                            ><?= htmlspecialchars($patient['doctor_notes']) ?></textarea>

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
                                value="<?= htmlspecialchars($patient['emergency_name']) ?>"
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
                                        <?= $patient['emergency_relationship'] === $relationship ? 'selected' : '' ?>
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
                                value="<?= htmlspecialchars($patient['emergency_phone']) ?>"
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
                                value="<?= htmlspecialchars($patient['emergency_alt_phone']) ?>"
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
                            PDF, JPG, JPEG or PNG. Maximum file size: 10MB.
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