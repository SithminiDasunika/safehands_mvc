<?php
// Extracted from controller data binding
$patient = $data['patient'] ?? [];
?>

<div class="profile-page">
    <main class="profile-container">

        <!-- Breadcrumb -->
        <nav class="profile-breadcrumb">
            <span>Dashboard</span>
            <span class="breadcrumb-arrow">›</span>
            <span>Patients</span>
            <span class="breadcrumb-arrow">›</span>
            <span class="current">Patient Profile</span>
        </nav>

        <!-- Patient Header -->
        <section class="profile-header">
            <div class="patient-heading">
                <div class="patient-photo">
                    <?php if (!empty($patient['profile_photo'])): ?>
                        <img src="/safehands_mvc/<?= htmlspecialchars($patient['profile_photo']) ?>" alt="Profile Photo" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">
                    <?php else: ?>
                        <div class="patient-photo-placeholder">
                            <?= htmlspecialchars(strtoupper(substr($patient['full_name'] ?? 'P', 0, 2))) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="patient-heading-info">
                    <div class="patient-title-row">
                        <h1><?= htmlspecialchars($patient['full_name'] ?? 'N/A') ?></h1>
                        <span class="care-status">
                            <?= htmlspecialchars($patient['mobility_status'] ?? 'Active') ?>
                        </span>
                    </div>

                    <p>
                        Age: <?= htmlspecialchars($patient['age'] ?? 'N/A') ?>
                        <span>•</span>
                        Gender: <?= htmlspecialchars($patient['gender'] ?? 'N/A') ?>
                        <span>•</span>
                        Blood Group: <?= htmlspecialchars($patient['blood_group'] ?? 'N/A') ?>
                        <span>•</span>
                        Relationship: <?= htmlspecialchars($patient['relationship'] ?? 'N/A') ?>
                    </p>
                </div>
            </div>

            <div class="profile-header-actions">
                <a href="/safehands_mvc/patient/edit/<?= $patient['patient_id'] ?>" class="btn btn-outline">
                    Edit Patient Profile
                </a>
                <button type="button" class="btn btn-primary" data-action="medical-history">
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
                    <h2><span class="section-icon">P</span> About Patient</h2>
                    <div class="info-list">
                        <div class="info-item">
                            <span>Full Name</span>
                            <strong><?= htmlspecialchars($patient['full_name'] ?? '') ?></strong>
                        </div>
                        <div class="info-item">
                            <span>Date of Birth</span>
                            <strong><?= htmlspecialchars($patient['date_of_birth'] ?? '') ?></strong>
                        </div>
                        <div class="info-item">
                            <span>NIC Number</span>
                            <strong><?= htmlspecialchars($patient['nic'] ?? '') ?></strong>
                        </div>
                        <div class="info-item">
                            <span>Phone</span>
                            <strong><?= htmlspecialchars($patient['phone'] ?? '') ?></strong>
                        </div>
                        <div class="info-item">
                            <span>Address</span>
                            <strong><?= htmlspecialchars($patient['address'] ?? '') ?></strong>
                        </div>
                    </div>
                </section>

                <!-- Emergency Contact -->
                <section class="profile-card emergency-card">
                    <h2><span class="section-icon emergency-icon">!</span> Emergency Contact</h2>
                    <div class="emergency-list">
                        <div>
                            <span>Name</span>
                            <strong><?= htmlspecialchars($patient['emergency_contact_name'] ?? 'N/A') ?></strong>
                        </div>
                        <div>
                            <span>Relationship</span>
                            <strong><?= htmlspecialchars($patient['emergency_contact_relationship'] ?? 'N/A') ?></strong>
                        </div>
                        <div>
                            <span>Primary Phone</span>
                            <strong class="phone-highlight"><?= htmlspecialchars($patient['emergency_contact_phone'] ?? 'N/A') ?></strong>
                        </div>
                        <div>
                            <span>Alt Phone</span>
                            <strong><?= htmlspecialchars($patient['emergency_alternative_phone'] ?? 'N/A') ?></strong>
                        </div>
                    </div>
                </section>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="profile-right">
                <!-- Vitals -->
                <section class="vitals-grid">
                    <div class="vital-card">
                        <span class="vital-icon">KG</span>
                        <span class="vital-label">Weight</span>
                        <strong><?= htmlspecialchars($patient['weight'] ?? '-') ?> <small>kg</small></strong>
                    </div>
                    <div class="vital-card">
                        <span class="vital-icon heart">♥</span>
                        <span class="vital-label">BP</span>
                        <strong><?= htmlspecialchars($patient['blood_pressure'] ?? '-') ?> <small>mmHg</small></strong>
                    </div>
                    <div class="vital-card">
                        <span class="vital-icon warning">+</span>
                        <span class="vital-label">Mobility</span>
                        <strong class="truncate"><?= htmlspecialchars($patient['mobility_status'] ?? '-') ?></strong>
                    </div>
                    <div class="vital-card">
                        <span class="vital-icon calendar">▣</span>
                        <span class="vital-label">Updated At</span>
                        <strong class="small-value"><?= date('d M Y', strtotime($patient['updated_at'] ?? 'now')) ?></strong>
                    </div>
                </section>

                <!-- Medical Information -->
                <section class="profile-card medical-card">
                    <h2><span class="section-icon">+</span> Medical Information</h2>
                    <div class="medical-grid">
                        <div>
                            <span class="field-label">Active Conditions</span>
                            <div class="tag-list">
                                <?php if (!empty($patient['medical_conditions'])): ?>
                                    <?php foreach ((array)$patient['medical_conditions'] as $condition): ?>
                                        <span class="condition-tag"><?= htmlspecialchars($condition) ?></span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>None</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div>
                            <span class="field-label danger-label">Allergies</span>
                            <p class="danger-text"><?= htmlspecialchars($patient['allergies'] ?? 'None') ?></p>
                        </div>

                        <div>
                            <span class="field-label">Current Medications</span>
                            <p><?= htmlspecialchars($patient['current_medications'] ?? 'None') ?></p>
                        </div>

                        <div>
                            <span class="field-label">Dietary Restrictions</span>
                            <p><?= htmlspecialchars($patient['dietary_restrictions'] ?? 'None') ?></p>
                        </div>

                        <div class="full-width">
                            <span class="field-label">Special Care Instructions</span>
                            <ul class="care-list">
                                <?php if (!empty($patient['special_care_requirements'])): ?>
                                    <?php foreach ((array)$patient['special_care_requirements'] as $instruction): ?>
                                        <li><?= htmlspecialchars($instruction) ?></li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li>No special instructions specified.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Bottom Actions -->
        <section class="bottom-actions">
            <div>
                <h2>Need to schedule more care?</h2>
                <p>Ensure continuous professional attention.</p>
            </div>
            <div class="bottom-action-buttons">
                <a href="/safehands_mvc/caregiver" class="btn btn-primary">Book Caregiver</a>
                <a href="/safehands_mvc/patient/edit/<?= $patient['patient_id'] ?>" class="btn btn-outline">Edit Patient Profile</a>
                <form action="/safehands_mvc/patient/delete/<?= $patient['patient_id'] ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                    <button type="submit" class="btn btn-danger">Delete Patient</button>
                </form>
            </div>
        </section>
    </main>
</div>