<?php

$patient = [
    'display_name' => 'Mr. Silva',
    'full_name' => 'Mr. Ananda Silva',
    'age' => 78,
    'gender' => 'Male',
    'blood_group' => 'A+',
    'relationship' => 'Father',
    'dob' => '12 May 1948',
    'nic' => '481324567V',
    'phone' => '+94 77 123 4567',
    'address' => 'No. 45, Flower Road, Colombo 07',
    'status' => 'Currently Receiving Care',

    'weight' => '68',
    'blood_pressure' => '130/85',
    'last_check' => '10 June 2026',

    'conditions' => [
        'Hypertension',
        'Mild Arthritis'
    ],

    'allergies' => 'Penicillin',

    'medications' =>
        'Lisinopril 10mg daily (Morning)',

    'mobility' =>
        'Independent with walking cane',

    'special_care' => [
        'Strict low salt diet (DASH diet compliant)',
        'Assist with light morning stretches for arthritis management',
        'Monitor fluid intake throughout the day'
    ],

    'emergency' => [
        'name' => 'Sithmini Silva',
        'relationship' => 'Daughter',
        'phone' => '+94 77 987 6543',
        'alternative_phone' => '+94 11 234 5678'
    ]
];

$care_history = [
    [
        'date' => '08 July 2026',
        'caregiver' => 'Nadeesha Perera',
        'duration' => '4 Hours',
        'status' => 'Completed'
    ],
    [
        'date' => '05 July 2026',
        'caregiver' => 'Sunil Jayasuriya',
        'duration' => '8 Hours',
        'status' => 'Completed'
    ]
];

$documents = [
    [
        'icon' => 'PDF',
        'name' => 'Medical Report - June 2026',
        'details' => 'Uploaded 12 June • 2.4 MB'
    ],
    [
        'icon' => 'Rx',
        'name' => 'Doctor Prescription - Cardiac',
        'details' => 'Uploaded 02 May • 1.1 MB'
    ],
    [
        'icon' => 'LAB',
        'name' => 'Lab Results - Blood Work',
        'details' => 'Uploaded 28 Apr • 4.5 MB'
    ]
];

?>

<div class="profile-page">

    <main class="profile-container">

        <!-- Breadcrumb -->
        <nav class="profile-breadcrumb">

            <span>Dashboard</span>

            <span class="breadcrumb-arrow">›</span>

            <span>Patients</span>

            <span class="breadcrumb-arrow">›</span>

            <span class="current">
                Patient Profile
            </span>

        </nav>


        <!-- Patient Header -->
        <section class="profile-header">

            <div class="patient-heading">

                <div class="patient-photo">

                    <div class="patient-photo-placeholder">
                        AS
                    </div>

                </div>


                <div class="patient-heading-info">

                    <div class="patient-title-row">

                        <h1>
                            <?= htmlspecialchars($patient['display_name']) ?>
                        </h1>

                        <span class="care-status">
                            <?= htmlspecialchars($patient['status']) ?>
                        </span>

                    </div>


                    <p>

                        Age:
                        <?= htmlspecialchars($patient['age']) ?>

                        <span>•</span>

                        Gender:
                        <?= htmlspecialchars($patient['gender']) ?>

                        <span>•</span>

                        Blood Group:
                        <?= htmlspecialchars($patient['blood_group']) ?>

                        <span>•</span>

                        Relationship:
                        <?= htmlspecialchars($patient['relationship']) ?>

                    </p>

                </div>

            </div>


            <div class="profile-header-actions">

                <button
                    type="button"
                    class="btn btn-outline"
                    data-action="edit-profile"
                >
                    Edit Profile
                </button>


                <button
                    type="button"
                    class="btn btn-primary"
                    data-action="medical-history"
                >
                    View Medical History
                </button>

            </div>

        </section>


        <!-- Main Grid -->
        <div class="profile-grid">


            <!-- LEFT COLUMN -->
            <div class="profile-left">


                <!-- About Patient -->
                <section class="profile-card">

                    <h2>

                        <span class="section-icon">
                            P
                        </span>

                        About Patient

                    </h2>


                    <div class="info-list">


                        <div class="info-item">

                            <span>
                                Full Name
                            </span>

                            <strong>
                                <?= htmlspecialchars($patient['full_name']) ?>
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Date of Birth
                            </span>

                            <strong>
                                <?= htmlspecialchars($patient['dob']) ?>
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                NIC Number
                            </span>

                            <strong>
                                <?= htmlspecialchars($patient['nic']) ?>
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Phone
                            </span>

                            <strong>
                                <?= htmlspecialchars($patient['phone']) ?>
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Address
                            </span>

                            <strong>
                                <?= htmlspecialchars($patient['address']) ?>
                            </strong>

                        </div>

                    </div>

                </section>



                <!-- Emergency Contact -->
                <section class="profile-card emergency-card">

                    <h2>

                        <span class="section-icon emergency-icon">
                            !
                        </span>

                        Emergency Contact

                    </h2>


                    <div class="emergency-list">


                        <div>

                            <span>
                                Name
                            </span>

                            <strong>
                                <?= htmlspecialchars(
                                    $patient['emergency']['name']
                                ) ?>
                            </strong>

                        </div>


                        <div>

                            <span>
                                Relationship
                            </span>

                            <strong>
                                <?= htmlspecialchars(
                                    $patient['emergency']['relationship']
                                ) ?>
                            </strong>

                        </div>


                        <div>

                            <span>
                                Primary Phone
                            </span>

                            <strong class="phone-highlight">

                                <?= htmlspecialchars(
                                    $patient['emergency']['phone']
                                ) ?>

                            </strong>

                        </div>


                        <div>

                            <span>
                                Alt Phone
                            </span>

                            <strong>

                                <?= htmlspecialchars(
                                    $patient['emergency']['alternative_phone']
                                ) ?>

                            </strong>

                        </div>

                    </div>

                </section>

            </div>



            <!-- RIGHT COLUMN -->
            <div class="profile-right">


                <!-- Vitals -->
                <section class="vitals-grid">


                    <div class="vital-card">

                        <span class="vital-icon">
                            KG
                        </span>

                        <span class="vital-label">
                            Weight
                        </span>

                        <strong>

                            <?= htmlspecialchars($patient['weight']) ?>

                            <small>
                                kg
                            </small>

                        </strong>

                    </div>


                    <div class="vital-card">

                        <span class="vital-icon heart">
                            ♥
                        </span>

                        <span class="vital-label">
                            BP
                        </span>

                        <strong>

                            <?= htmlspecialchars(
                                $patient['blood_pressure']
                            ) ?>

                            <small>
                                mmHg
                            </small>

                        </strong>

                    </div>


                    <div class="vital-card">

                        <span class="vital-icon warning">
                            +
                        </span>

                        <span class="vital-label">
                            Condition
                        </span>

                        <strong class="truncate">
                            Hypertension
                        </strong>

                    </div>


                    <div class="vital-card">

                        <span class="vital-icon calendar">
                            ▣
                        </span>

                        <span class="vital-label">
                            Last Check
                        </span>

                        <strong class="small-value">

                            <?= htmlspecialchars(
                                $patient['last_check']
                            ) ?>

                        </strong>

                    </div>

                </section>



                <!-- Medical Information -->
                <section class="profile-card medical-card">

                    <h2>

                        <span class="section-icon">
                            +
                        </span>

                        Medical Information

                    </h2>


                    <div class="medical-grid">


                        <div>

                            <span class="field-label">
                                Active Conditions
                            </span>

                            <div class="tag-list">

                                <?php foreach (
                                    $patient['conditions']
                                    as $condition
                                ): ?>

                                    <span class="condition-tag">

                                        <?= htmlspecialchars(
                                            $condition
                                        ) ?>

                                    </span>

                                <?php endforeach; ?>

                            </div>

                        </div>


                        <div>

                            <span class="field-label danger-label">
                                Allergies
                            </span>

                            <p class="danger-text">

                                <?= htmlspecialchars(
                                    $patient['allergies']
                                ) ?>

                            </p>

                        </div>


                        <div>

                            <span class="field-label">
                                Current Medications
                            </span>

                            <p>

                                <?= htmlspecialchars(
                                    $patient['medications']
                                ) ?>

                            </p>

                        </div>


                        <div>

                            <span class="field-label">
                                Mobility
                            </span>

                            <p>

                                <?= htmlspecialchars(
                                    $patient['mobility']
                                ) ?>

                            </p>

                        </div>


                        <div class="full-width">

                            <span class="field-label">
                                Special Care Instructions
                            </span>


                            <ul class="care-list">

                                <?php foreach (
                                    $patient['special_care']
                                    as $instruction
                                ): ?>

                                    <li>

                                        <?= htmlspecialchars(
                                            $instruction
                                        ) ?>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                </section>



                <!-- Care History -->
                <section class="profile-card history-card">


                    <div class="card-heading-row">

                        <h2>

                            <span class="section-icon">
                                ↺
                            </span>

                            Care History &amp; Reports

                        </h2>


                        <button
                            type="button"
                            class="text-button"
                            data-action="view-history"
                        >
                            View All History
                        </button>

                    </div>


                    <div class="table-wrapper">

                        <table class="history-table">

                            <thead>

                                <tr>

                                    <th>Date</th>

                                    <th>Caregiver</th>

                                    <th>Duration</th>

                                    <th>Status</th>

                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php foreach (
                                    $care_history
                                    as $history
                                ): ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars(
                                                $history['date']
                                            ) ?>
                                        </td>

                                        <td>
                                            <strong>
                                                <?= htmlspecialchars(
                                                    $history['caregiver']
                                                ) ?>
                                            </strong>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars(
                                                $history['duration']
                                            ) ?>
                                        </td>

                                        <td>

                                            <span class="completed-badge">

                                                <?= htmlspecialchars(
                                                    $history['status']
                                                ) ?>

                                            </span>

                                        </td>

                                        <td class="table-action">

                                            <button
                                                type="button"
                                                class="text-button report-button"
                                            >
                                                View Report
                                            </button>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>


                    <div class="report-snippet">

                        <span class="field-label">
                            Recent Report Snippet
                        </span>

                        <p>

                            "Patient was cooperative during the
                            morning session. Completed 15 mins of
                            light stretches. Medication adherence
                            was perfect. Appetite was good for lunch.
                            Slight swelling noticed in ankles."
                            - Nadeesha P.

                        </p>

                    </div>

                </section>



                <!-- Documents -->
                <section class="profile-card documents-card">

                    <h2>

                        <span class="section-icon">
                            D
                        </span>

                        Important Documents

                    </h2>


                    <div class="documents-list">

                        <?php foreach (
                            $documents
                            as $document
                        ): ?>

                            <div class="document-item">


                                <div class="document-info">

                                    <span class="document-icon">

                                        <?= htmlspecialchars(
                                            $document['icon']
                                        ) ?>

                                    </span>


                                    <div>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $document['name']
                                            ) ?>

                                        </strong>

                                        <span>

                                            <?= htmlspecialchars(
                                                $document['details']
                                            ) ?>

                                        </span>

                                    </div>

                                </div>


                                <div class="document-actions">

                                    <button
                                        type="button"
                                        class="icon-button document-view"
                                    >
                                        View
                                    </button>

                                    <button
                                        type="button"
                                        class="icon-button document-download"
                                    >
                                        Download
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <button
                        type="button"
                        class="upload-button"
                        data-action="upload-document"
                    >

                        <span>+</span>

                        Upload New Document

                    </button>


                    <input
                        type="file"
                        id="documentUpload"
                        hidden
                        accept=".pdf,.jpg,.jpeg,.png"
                    >

                </section>

            </div>

        </div>



        <!-- Bottom Actions -->
        <section class="bottom-actions">

            <div>

                <h2>
                    Need to schedule more care?
                </h2>

                <p>
                    Ensure Mr. Silva receives continuous
                    professional attention.
                </p>

            </div>


            <div class="bottom-action-buttons">

                <button
                    type="button"
                    class="btn btn-primary"
                    data-action="book-caregiver"
                >
                    Book Caregiver
                </button>


                <button
                    type="button"
                    class="btn btn-outline"
                    data-action="edit-profile"
                >
                    Edit Patient Profile
                </button>


                <button
                    type="button"
                    class="btn btn-danger"
                    data-action="delete-patient"
                >
                    Delete Patient
                </button>

            </div>

        </section>

    </main>


    <div
        id="profileToast"
        class="profile-toast"
    ></div>

</div>