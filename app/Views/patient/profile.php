<?php
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
if (!function_exists('sh_calculate_age')) {
    function sh_calculate_age(?string $dob): ?int {
        if (!$dob) return null;
        try {
            return (new DateTime('today'))->diff(new DateTime($dob))->y;
        } catch (Exception $e) { return null; }
    }
}
if (!function_exists('sh_format_date')) {
    function sh_format_date(?string $date, string $format = 'd F Y'): string {
        if (!$date) return '—';
        try { return (new DateTime($date))->format($format); } 
        catch (Exception $e) { return htmlspecialchars($date); }
    }
}
if (!function_exists('sh_split_list')) {
    function sh_split_list(?string $value): array {
        if (!$value || trim($value) === '') return [];
        $pieces = array_map('trim', preg_split('/\r\n|\r|\n|,/', $value));
        return array_values(array_filter($pieces, fn($p) => $p !== ''));
    }
}

$fullName = $patient['full_name'] ?? '';
$age = sh_calculate_age($patient['date_of_birth'] ?? null);
$initials = sh_patient_initials($fullName);
$conditions = sh_split_list($patient['medical_conditions'] ?? null);
$specialCare = sh_split_list($patient['special_care_requirements'] ?? null);
$hasPhoto = !empty($patient['profile_photo']) && file_exists($patient['profile_photo']);
$hasDocument = !empty($patient['medical_document']);
?>

  <main class="main-content">
    
    <!-- Breadcrumb Navigation -->
    <nav class="breadcrumb">
      <span>Dashboard</span>
      <span class="material-symbols-outlined" style="font-size: 16px;">chevron_right</span>
      <span>Patients</span>
      <span class="material-symbols-outlined" style="font-size: 16px;">chevron_right</span>
      <span class="active">Patient Profile</span>
    </nav>

    <!-- Patient Profile Header -->
    <section class="profile-header">
      <div class="profile-info-group">
        <div class="avatar">
          <?php if ($hasPhoto): ?>
             <img src="<?= htmlspecialchars($patient['profile_photo']) ?>" alt="<?= htmlspecialchars($fullName) ?>">
          <?php else: ?>
             <div class="patient-photo-placeholder"><?= htmlspecialchars($initials) ?></div>
          <?php endif; ?>
        </div>
        <div class="profile-details">
          <div class="name-badge-row">
            <h1 class="patient-name"><?= htmlspecialchars($fullName) ?></h1>
            <span class="badge-status">Currently Receiving Care</span>
          </div>
          <p class="patient-meta">
              Age: <?= $age !== null ? htmlspecialchars((string) $age) : '—' ?> • 
              Gender: <?= htmlspecialchars($patient['gender'] ?? '—') ?> • 
              Blood Group: <?= htmlspecialchars($patient['blood_group'] ?: '—') ?> • 
              Relationship: <?= htmlspecialchars($patient['relationship'] ?? '—') ?>
          </p>
        </div>
      </div>
      <div class="profile-actions">
        <a href="/safehands_mvc/patient/edit/<?= (int) $patient['patient_id'] ?>" class="btn btn-outline">Edit Profile</a>
        <button class="btn btn-primary" data-action="medical-history">View Medical History</button>
      </div>
    </section>

    <!-- Bento Grid Section -->
    <div class="bento-grid">
      
      <!-- Left Column: Personal Data & Emergency Info -->
      <div class="col-left stack">
        
        <!-- About Card -->
        <div class="card">
          <h3 class="card-title">
            <span class="material-symbols-outlined">person</span> About Patient
          </h3>
          <div class="data-list">
            <div class="data-item">
              <span class="data-label">Full Name</span>
              <span class="data-value"><?= htmlspecialchars($fullName) ?></span>
            </div>
            <div class="data-item">
              <span class="data-label">Date of Birth</span>
              <span class="data-value"><?= sh_format_date($patient['date_of_birth'] ?? null) ?></span>
            </div>
            <div class="data-item">
              <span class="data-label">NIC Number</span>
              <span class="data-value"><?= htmlspecialchars($patient['nic'] ?: '—') ?></span>
            </div>
            <div class="data-item">
              <span class="data-label">Phone</span>
              <span class="data-value"><?= htmlspecialchars($patient['phone'] ?: '—') ?></span>
            </div>
            <div class="data-item">
              <span class="data-label">Address</span>
              <span class="data-value"><?= nl2br(htmlspecialchars($patient['address'] ?: '—')) ?></span>
            </div>
          </div>
        </div>

        <!-- Emergency Contact Card -->
        <div class="card card-emergency">
          <h3 class="card-title">
            <span class="material-symbols-outlined">emergency</span> Emergency Contact
          </h3>
          <div class="data-list">
            <div class="emergency-row">
              <span class="data-label">Name</span>
              <span class="data-value" style="font-weight: 700;"><?= htmlspecialchars($patient['emergency_contact_name'] ?: '—') ?></span>
            </div>
            <div class="emergency-row">
              <span class="data-label">Relationship</span>
              <span class="data-value"><?= htmlspecialchars($patient['emergency_contact_relationship'] ?: '—') ?></span>
            </div>
            <div class="emergency-row">
              <span class="data-label">Primary Phone</span>
              <span class="data-value highlight"><?= htmlspecialchars($patient['emergency_contact_phone'] ?: '—') ?></span>
            </div>
            <div class="emergency-row">
              <span class="data-label">Alt Phone</span>
              <span class="data-value"><?= htmlspecialchars($patient['emergency_alternative_phone'] ?: '—') ?></span>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Column: Vitals, Medical History, Reports -->
      <div class="col-right stack">
        
        <!-- Quick Vitals Cards Grid -->
        <div class="vitals-grid">
          <div class="vital-card">
            <span class="material-symbols-outlined vital-icon" style="color: var(--color-primary);">monitor_weight</span>
            <span class="data-label">Weight</span>
            <p class="vital-value"><?= $patient['weight'] !== null ? htmlspecialchars($patient['weight']) : '—' ?> <span class="vital-unit">kg</span></p>
          </div>
          <div class="vital-card">
            <span class="material-symbols-outlined vital-icon" style="color: var(--color-error);">favorite</span>
            <span class="data-label">BP</span>
            <p class="vital-value"><?= htmlspecialchars($patient['blood_pressure'] ?: '—') ?> <span class="vital-unit">mmHg</span></p>
          </div>
          <div class="vital-card">
            <span class="material-symbols-outlined vital-icon" style="color: var(--color-warning);">medical_services</span>
            <span class="data-label">Condition</span>
            <p class="data-value truncate" style="font-weight: 700; margin-top: 4px;"><?= htmlspecialchars($conditions[0] ?? 'None recorded') ?></p>
          </div>
          <div class="vital-card">
            <span class="material-symbols-outlined vital-icon" style="color: #375ca8;">calendar_month</span>
            <span class="data-label">Last Check</span>
            <p class="data-value" style="font-weight: 700; margin-top: 4px;"><?= sh_format_date($patient['updated_at'] ?? null, 'd M Y') ?></p>
          </div>
        </div>

        <!-- Medical Info Details Card -->
        <div class="card">
          <h3 class="card-title">
            <span class="material-symbols-outlined">health_and_safety</span> Medical Information
          </h3>
          <div class="medical-grid">
            <div>
              <span class="data-label">Active Conditions</span>
              <div class="tag-container">
                <?php if (empty($conditions)): ?>
                    <span class="tag">None recorded</span>
                <?php else: ?>
                    <?php foreach ($conditions as $condition): ?>
                        <span class="tag"><?= htmlspecialchars($condition) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
            <div>
              <span class="data-label text-error">Allergies</span>
              <p class="data-value text-error" style="font-weight: 700; margin-top: 4px;"><?= htmlspecialchars($patient['allergies'] ?: 'None recorded') ?></p>
            </div>
            <div>
              <span class="data-label">Current Medications</span>
              <p class="data-value" style="margin-top: 4px;"><?= nl2br(htmlspecialchars($patient['current_medications'] ?: 'None recorded')) ?></p>
            </div>
            <div>
              <span class="data-label">Mobility</span>
              <p class="data-value" style="margin-top: 4px;"><?= htmlspecialchars($patient['mobility_status'] ?: '—') ?></p>
            </div>
            <div class="span-full">
              <span class="data-label">Special Care Instructions</span>
              <?php if (empty($specialCare)): ?>
                  <p class="data-value" style="margin-top: 4px;">No special care instructions recorded.</p>
              <?php else: ?>
                  <ul class="medical-list">
                      <?php foreach ($specialCare as $instruction): ?>
                          <li><?= htmlspecialchars($instruction) ?></li>
                      <?php endforeach; ?>
                  </ul>
              <?php endif; ?>
            </div>
            
            <?php if (!empty($patient['dietary_restrictions'])): ?>
                <div class="span-full">
                    <span class="data-label">Dietary Restrictions</span>
                    <p class="data-value" style="margin-top: 4px;"><?= nl2br(htmlspecialchars($patient['dietary_restrictions'])) ?></p>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($patient['doctors_notes'])): ?>
                <div class="span-full">
                    <span class="data-label">Doctor's Notes</span>
                    <p class="data-value" style="margin-top: 4px;"><?= nl2br(htmlspecialchars($patient['doctors_notes'])) ?></p>
                </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Care History Table -->
        <div class="card-table-wrapper">
          <div class="table-header">
            <h3 class="card-title" style="margin-bottom: 0;">
              <span class="material-symbols-outlined">history</span> Care History & Reports
            </h3>
            <button class="link-btn">View All History</button>
          </div>
          <div class="table-overflow">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Caregiver</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>08 July 2026</td>
                  <td style="font-weight: 500;">Nadeesha Perera</td>
                  <td>4 Hours</td>
                  <td><span class="badge-status">Completed</span></td>
                  <td class="text-right"><button class="action-btn-text">View Report</button></td>
                </tr>
                <tr>
                  <td>05 July 2026</td>
                  <td style="font-weight: 500;">Sunil Jayasuriya</td>
                  <td>8 Hours</td>
                  <td><span class="badge-status">Completed</span></td>
                  <td class="text-right"><button class="action-btn-text">View Report</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="report-snippet">
            <span class="data-label" style="display: block; margin-bottom: 8px;">Recent Report Snippet</span>
            <p class="snippet-text">"Patient was cooperative during the morning session. Completed 15 mins of light stretches. Medication adherence was perfect. Appetite was good for lunch. Slight swelling noticed in ankles." - Nadeesha P.</p>
          </div>
        </div>

        <!-- Important Documents List Card -->
        <div class="card">
          <h3 class="card-title">
            <span class="material-symbols-outlined">description</span> Important Documents
          </h3>
          <div class="document-list">
              
            <?php if ($hasDocument): ?>
                <div class="document-card">
                  <div class="document-info">
                    <span class="material-symbols-outlined doc-icon">picture_as_pdf</span>
                    <div>
                      <p class="doc-title">Medical Document</p>
                      <p class="doc-meta">Uploaded with this patient's profile</p>
                    </div>
                  </div>
                  <div class="doc-actions">
                    <a href="<?= htmlspecialchars($patient['medical_document']) ?>" target="_blank" class="icon-btn" title="View"><span class="material-symbols-outlined">visibility</span></a>
                    <a href="<?= htmlspecialchars($patient['medical_document']) ?>" download class="icon-btn" title="Download"><span class="material-symbols-outlined">download</span></a>
                  </div>
                </div>
            <?php else: ?>
                <p class="data-value" style="margin-top: 4px;">No documents uploaded yet.</p>
            <?php endif; ?>
            
          </div>

          <a href="/safehands_mvc/patient/edit/<?= (int) $patient['patient_id'] ?>" class="upload-btn">
            <span class="material-symbols-outlined">add_circle</span> Upload New Document
          </a>
        </div>

      </div>
    </div>

    <!-- Bottom Action Section -->
    <section class="bottom-cta">
      <div>
        <h4 class="cta-heading">Need to schedule more care?</h4>
        <p class="cta-subtext">Ensure <?= htmlspecialchars($fullName) ?> receives continuous professional attention.</p>
      </div>
      <div class="cta-buttons">
        <a href="/safehands_mvc/caregiver" class="btn btn-primary" style="padding: 12px 32px;">Book Caregiver</a>
        <a href="/safehands_mvc/patient/edit/<?= (int) $patient['patient_id'] ?>" class="btn btn-outline" style="padding: 12px 32px; background-color: #ffffff;">Edit Patient Profile</a>
        
        <form method="POST" action="/safehands_mvc/patient/delete/<?= (int) $patient['patient_id'] ?>" onsubmit="return confirm('Are you sure you want to delete this patient profile? This cannot be undone.');" style="display:inline;">
            <button type="submit" class="btn btn-danger-outline" style="padding: 12px 32px;">Delete Patient</button>
        </form>
      </div>
    </section>

  </main>
  
  <div id="profileToast" class="profile-toast"></div>

