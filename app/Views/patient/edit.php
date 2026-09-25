<?php
if (!function_exists('sh_split_list')) {
    function sh_split_list(?string $value): array {
        if (!$value || trim($value) === '') return [];
        $pieces = preg_split('/
||
|,/', $value);
        return array_values(array_filter(array_map('trim', $pieces), fn($p) => $p !== ''));
    }
}
if (!function_exists('sh_patient_initials')) {
    function sh_patient_initials(string $name): string {
        $parts = preg_split('/\s+/', trim($name));
        $initials = '';
        foreach (array_slice($parts, 0, 2) as $part) {
            $initials .= mb_strtoupper(mb_substr($part, 0, 1));
        }
        return $initials !== '' ? $initials : '?';
    }
}

$conditions = sh_split_list($patient['medical_conditions'] ?? null);
$hasPhoto = !empty($patient['profile_photo']) && file_exists($patient['profile_photo']);
$hasDocument = !empty($patient['medical_document']);
$flashSuccess = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);
$fullName = $patient['full_name'] ?? '';
$initials = sh_patient_initials($fullName);
?>

<!-- Success Notification -->
<div class="success-banner" id="success-notification">
    <span class="material-symbols-outlined">check_circle</span>
    <p>Patient profile updated successfully. Redirecting...</p>
</div>

<!-- Navigation Shell -->
<nav class="navbar">
    <div class="nav-left">
        <span class="nav-brand">SafeHands</span>
        <div class="nav-links">
            <a href="#" class="nav-link">Dashboard</a>
            <a href="/safehands_mvc/patient" class="nav-link active">Patients</a>
            <a href="#" class="nav-link">Find Caregivers</a>
            <a href="#" class="nav-link">My Bookings</a>
        </div>
    </div>
    <div class="nav-right">
        <button class="nav-icon-btn"><span class="material-symbols-outlined">notifications</span></button>
        <div class="nav-avatar">
            <img src="https://ui-avatars.com/api/?name=Admin&background=004ac6&color=fff" alt="Admin">
        </div>
    </div>
</nav>

<main class="main-content">
    
    <!-- Breadcrumbs & Header -->
    <div class="mb-8" style="margin-bottom: 32px;">
        <nav class="breadcrumb">
            <a href="/safehands_mvc/patient">Patients</a>
            <span class="material-symbols-outlined" style="font-size: 16px;">chevron_right</span>
            <a href="/safehands_mvc/patient/profile/<?= (int) $patient['patient_id'] ?>"><?= htmlspecialchars($fullName) ?></a>
            <span class="material-symbols-outlined" style="font-size: 16px;">chevron_right</span>
            <span class="current">Edit Profile</span>
        </nav>
        <h1 class="page-title">Edit Patient Profile</h1>
    </div>

    <form id="edit-profile-form" method="POST" action="/safehands_mvc/patient/update/<?= (int) $patient['patient_id'] ?>" enctype="multipart/form-data">
        <input type="hidden" name="patient_id" value="<?= (int) $patient['patient_id'] ?>">

        <div class="layout-grid">
            
            <!-- Left Column: Patient Preview -->
            <div class="col-preview">
                <div class="preview-card">
                    <div class="preview-center">
                        <div class="photo-wrapper">
                            <div class="photo-circle">
                                <?php if ($hasPhoto): ?>
                                    <img id="patientPhotoPreview" src="<?= htmlspecialchars($patient['profile_photo']) ?>" alt="Patient">
                                <?php else: ?>
                                    <div id="patientPhotoPreviewText"><?= htmlspecialchars($initials) ?></div>
                                    <img id="patientPhotoPreview" src="" alt="" style="display:none;">
                                <?php endif; ?>
                            </div>
                            <button type="button" class="edit-photo-icon" onclick="document.getElementById('patientPhoto').click()">
                                <span class="material-symbols-outlined" style="font-size: 14px;">edit</span>
                            </button>
                        </div>
                        
                        <input type="file" id="patientPhoto" name="profile_photo" accept=".jpg,.jpeg,.png" hidden onchange="previewPhoto(event)">
                        
                        <h2 class="preview-name"><?= htmlspecialchars($fullName) ?></h2>
                        <p class="preview-relation"><?= htmlspecialchars($patient['relationship'] ?: '—') ?></p>
                        
                        <div class="status-badge">
                            <span class="dot"></span> Currently Receiving Care
                        </div>
                        
                        <button type="button" class="change-photo-btn" onclick="document.getElementById('patientPhoto').click()">
                            <span class="material-symbols-outlined" style="font-size: 20px;">photo_camera</span>
                            Change Photo
                        </button>
                    </div>

                    <div class="stats-divider">
                        <h3 class="stats-title">Profile Stats</h3>
                        <div class="stat-row">
                            <span class="stat-label">Last Updated</span>
                            <span class="stat-val"><?= !empty($patient['updated_at']) ? date('M d, Y', strtotime($patient['updated_at'])) : '—' ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Patient Since</span>
                            <span class="stat-val"><?= !empty($patient['created_at']) ? date('M d, Y', strtotime($patient['created_at'])) : '—' ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Edit Form -->
            <div class="col-form">
                <div class="form-card">
                    
                    <!-- Section 1: Personal Information -->
                    <section class="form-section">
                        <div class="section-header">
                            <span class="material-symbols-outlined">person</span>
                            <h3>Personal Information</h3>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" class="form-input" value="<?= htmlspecialchars($patient['full_name'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-input" value="<?= htmlspecialchars($patient['date_of_birth'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-input">
                                    <option value="Male" <?= ($patient['gender']??'') === 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= ($patient['gender']??'') === 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option value="Other" <?= ($patient['gender']??'') === 'Other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select id="blood_group" name="blood_group" class="form-input">
                                    <?php foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg): ?>
                                        <option value="<?= $bg ?>" <?= ($patient['blood_group']??'') === $bg ? 'selected' : '' ?>><?= $bg ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nic">NIC Number</label>
                                <input type="text" id="nic" name="nic" class="form-input" value="<?= htmlspecialchars($patient['nic'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <select id="relationship" name="relationship" class="form-input">
                                    <?php foreach (['Father', 'Mother', 'Grandfather', 'Grandmother', 'Spouse', 'Self', 'Other'] as $rel): ?>
                                        <option value="<?= $rel ?>" <?= ($patient['relationship']??'') === $rel ? 'selected' : '' ?>><?= $rel ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" value="<?= htmlspecialchars($patient['phone'] ?? '') ?>">
                            </div>
                            <div class="form-group col-full">
                                <label for="address">Home Address</label>
                                <input type="text" id="address" name="address" class="form-input" value="<?= htmlspecialchars($patient['address'] ?? '') ?>">
                            </div>
                        </div>
                    </section>

                    <!-- Section 2: Medical Information -->
                    <section class="form-section">
                        <div class="section-header">
                            <span class="material-symbols-outlined">medical_services</span>
                            <h3>Medical Information</h3>
                        </div>
                        <div class="form-grid">
                            <div class="form-group col-full">
                                <label>Primary Medical Conditions</label>
                                <div class="tags-container" id="conditionsContainer">
                                    <?php foreach ($conditions as $condition): ?>
                                        <span class="condition-tag">
                                            <?= htmlspecialchars($condition) ?>
                                            <button type="button" onclick="this.parentElement.remove(); updateConditionsHidden();"><span class="material-symbols-outlined" style="font-size: 14px;">close</span></button>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="condition-input-wrapper">
                                    <input type="text" id="conditionInput" class="form-input" placeholder="e.g. Hypertension">
                                    <button type="button" onclick="addCondition()">Add</button>
                                </div>
                                <input type="hidden" id="medical_conditions" name="medical_conditions" value="<?= htmlspecialchars(implode(', ', $conditions)) ?>">
                            </div>
                            <div class="form-group">
                                <label for="allergies">Allergies</label>
                                <input type="text" id="allergies" name="allergies" class="form-input" placeholder="e.g. None" value="<?= htmlspecialchars($patient['allergies'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="mobility_status">Mobility Status</label>
                                <select id="mobility_status" name="mobility_status" class="form-input">
                                    <?php foreach (['Independent', 'Walking Assistance', 'Wheelchair User', 'Bedridden'] as $mob): ?>
                                        <option value="<?= $mob ?>" <?= ($patient['mobility_status']??'') === $mob ? 'selected' : '' ?>><?= $mob ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-full">
                                <label for="current_medications">Current Medications</label>
                                <textarea id="current_medications" name="current_medications" class="form-input" rows="3"><?= htmlspecialchars($patient['current_medications'] ?? '') ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="special_care_requirements">Special Care Requirements</label>
                                <textarea id="special_care_requirements" name="special_care_requirements" class="form-input" placeholder="e.g. Assistance with bathing..." rows="3"><?= htmlspecialchars($patient['special_care_requirements'] ?? '') ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dietary_restrictions">Dietary Restrictions</label>
                                <textarea id="dietary_restrictions" name="dietary_restrictions" class="form-input" placeholder="e.g. Low sodium diet..." rows="3"><?= htmlspecialchars($patient['dietary_restrictions'] ?? '') ?></textarea>
                            </div>
                            <div class="form-group col-full">
                                <label for="doctors_notes">Doctor's Notes</label>
                                <textarea id="doctors_notes" name="doctors_notes" class="form-input" rows="3"><?= htmlspecialchars($patient['doctors_notes'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </section>

                    <!-- Section 3: Emergency Contact -->
                    <section class="form-section">
                        <div class="section-header">
                            <span class="material-symbols-outlined">emergency</span>
                            <h3>Emergency Contact</h3>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="emergency_contact_name">Contact Name</label>
                                <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="form-input" value="<?= htmlspecialchars($patient['emergency_contact_name'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="emergency_contact_relationship">Relationship</label>
                                <input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship" class="form-input" value="<?= htmlspecialchars($patient['emergency_contact_relationship'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="emergency_contact_phone">Phone Number</label>
                                <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" class="form-input" value="<?= htmlspecialchars($patient['emergency_contact_phone'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="emergency_alternative_phone">Alternative Phone</label>
                                <input type="tel" id="emergency_alternative_phone" name="emergency_alternative_phone" class="form-input" value="<?= htmlspecialchars($patient['emergency_alternative_phone'] ?? '') ?>">
                            </div>
                        </div>
                    </section>

                    <!-- Section 4: Medical Documents -->
                    <section class="form-section">
                        <div class="section-header-row">
                            <div class="section-header" style="margin-bottom: 0;">
                                <span class="material-symbols-outlined">description</span>
                                <h3>Medical Documents</h3>
                            </div>
                        </div>
                        
                        <?php if ($hasDocument): ?>
                            <div class="doc-item">
                                <div class="doc-info">
                                    <div class="doc-icon-box">
                                        <span class="material-symbols-outlined">picture_as_pdf</span>
                                    </div>
                                    <div>
                                        <p class="doc-title">Medical Document</p>
                                        <p class="doc-meta">Uploaded document</p>
                                    </div>
                                </div>
                                <div class="doc-actions">
                                    <button type="button" class="doc-btn doc-btn-replace" onclick="document.getElementById('medicalDoc').click()">Replace</button>
                                </div>
                            </div>
                        <?php else: ?>
                            <p style="font-size: 14px; color: var(--color-on-surface-variant); margin-bottom: 12px;">No documents uploaded yet.</p>
                            <button type="button" class="btn-reset" onclick="document.getElementById('medicalDoc').click()">
                                <span class="material-symbols-outlined" style="font-size: 16px; vertical-align: middle;">upload</span> Upload Document
                            </button>
                        <?php endif; ?>
                        
                        <input type="file" id="medicalDoc" name="medical_document" accept=".pdf,.doc,.docx" hidden>
                        <p id="docFilename" style="font-size: 12px; color: var(--color-primary); margin-top: 8px;"></p>
                    </section>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="reset" class="btn-reset">Reset Changes</button>
                        <div class="action-group">
                            <a href="/safehands_mvc/patient/profile/<?= (int) $patient['patient_id'] ?>" class="btn-cancel">Cancel</a>
                            <button type="submit" id="save-btn" class="btn-save">Save Changes</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-brand">
        <span class="footer-logo">SafeHands</span>
        <span class="footer-copy">© 2024 SafeHands Caregiving Services. All rights reserved.</span>
    </div>
    <div class="footer-links">
        <a href="#" class="footer-link">Privacy Policy</a>
        <a href="#" class="footer-link">Terms of Service</a>
        <a href="#" class="footer-link">Contact Support</a>
        <a href="#" class="footer-link">Help Center</a>
    </div>
</footer>

<script>
    <?php if ($flashSuccess): ?>
    document.addEventListener('DOMContentLoaded', () => {
        const notify = document.getElementById('success-notification');
        notify.classList.add('show');
        setTimeout(() => notify.classList.remove('show'), 3000);
    });
    <?php endif; ?>

    function previewPhoto(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('patientPhotoPreview');
                const text = document.getElementById('patientPhotoPreviewText');
                img.src = e.target.result;
                img.style.display = 'block';
                if(text) text.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    }
    
    document.getElementById('medicalDoc').addEventListener('change', function(e) {
        if(e.target.files[0]) {
            document.getElementById('docFilename').textContent = "Selected: " + e.target.files[0].name;
        }
    });

    function addCondition() {
        const input = document.getElementById('conditionInput');
        const val = input.value.trim();
        if (val) {
            const container = document.getElementById('conditionsContainer');
            const span = document.createElement('span');
            span.className = 'condition-tag';
            span.innerHTML = `${val} <button type="button" onclick="this.parentElement.remove(); updateConditionsHidden();"><span class="material-symbols-outlined" style="font-size: 14px;">close</span></button>`;
            container.appendChild(span);
            input.value = '';
            updateConditionsHidden();
        }
    }

    function updateConditionsHidden() {
        const tags = document.querySelectorAll('.condition-tag');
        const conditions = Array.from(tags).map(tag => tag.childNodes[0].textContent.trim());
        document.getElementById('medical_conditions').value = conditions.join(', ');
    }
</script>
