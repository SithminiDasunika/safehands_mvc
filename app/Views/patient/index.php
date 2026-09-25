<?php
if (!function_exists('sh_calculate_age')) {
    function sh_calculate_age(?string $dob): ?int {
        if (!$dob) return null;
        try {
            return (new DateTime('today'))->diff(new DateTime($dob))->y;
        } catch (Exception $e) { return null; }
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
if (!function_exists('sh_split_list')) {
    function sh_split_list(?string $value): array {
        if (!$value || trim($value) === '') return [];
        $pieces = preg_split('/\r\n|\r|\n|,/', $value);
        return array_values(array_filter(array_map('trim', $pieces), fn($p) => $p !== ''));
    }
}
?>

<!-- TopNavBar -->
<nav class="navbar">
    <div class="nav-left">
        <a href="/safehands_mvc" class="nav-brand">SafeHands</a>
        <div class="nav-links">
            <a href="#" class="nav-link">Dashboard</a>
            <a href="/safehands_mvc/patient" class="nav-link active">Patients</a>
            <a href="#" class="nav-link">Find Caregivers</a>
            <a href="#" class="nav-link">My Bookings</a>
        </div>
    </div>
    <div class="nav-right">
        <button aria-label="Notifications" class="nav-icon-btn">
            <span class="material-symbols-outlined">notifications</span>
        </button>
        <div class="nav-avatar">
            <img src="https://ui-avatars.com/api/?name=Admin&background=004ac6&color=fff" alt="User profile photo">
        </div>
    </div>
</nav>

<!-- Main Content Canvas -->
<main class="main-content">
    
    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" class="breadcrumb">
        <a href="#">Dashboard</a>
        <span class="material-symbols-outlined" style="font-size: 16px;">chevron_right</span>
        <span class="current">Patients</span>
    </nav>

    <!-- Header Section -->
    <div class="page-header">
        <div>
            <h1 class="page-title">My Patients</h1>
            <p class="page-desc">View and manage the people you care for through SafeHands.</p>
        </div>
        <a href="/safehands_mvc/patient/create" class="btn-primary">
            <span class="material-symbols-outlined" style="font-size: 20px;">add</span>
            Add Patient
        </a>
    </div>

    <!-- Summary Stats Row -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon primary"><span class="material-symbols-outlined" style="font-size: 20px;">group</span></div>
                <span class="stat-label">Total Patients</span>
            </div>
            <span class="stat-value"><?= (int)($stats['total_patients'] ?? count($patients ?? [])) ?></span>
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon success"><span class="material-symbols-outlined" style="font-size: 20px;">medical_services</span></div>
                <span class="stat-label">Receiving Care</span>
            </div>
            <span class="stat-value">1</span> <!-- Hardcoded mockup stat -->
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon warning"><span class="material-symbols-outlined" style="font-size: 20px;">event</span></div>
                <span class="stat-label">Upcoming Sessions</span>
            </div>
            <span class="stat-value">2</span> <!-- Hardcoded mockup stat -->
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon primary"><span class="material-symbols-outlined" style="font-size: 20px;">description</span></div>
                <span class="stat-label">Recent Reports</span>
            </div>
            <span class="stat-value"><?= count($reports ?? []) ?></span>
        </div>
    </div>

    <!-- All Patients Section -->
    <section style="display: flex; flex-direction: column; gap: 24px;">
        <div class="section-header">
            <div>
                <h2 class="section-title">All Patients</h2>
                <p class="section-desc">Patients registered under your family account.</p>
            </div>
            <div class="search-box">
                <span class="material-symbols-outlined search-icon">search</span>
                <input type="text" class="search-input" placeholder="Search patients..." id="patientSearch">
            </div>
        </div>

        <!-- Patient Grid -->
        <div class="patient-grid">
            <?php if (empty($patients)): ?>
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; background: var(--color-surface-container-lowest); border-radius: var(--radius-xl); border: 1px dashed var(--color-outline-variant);">
                    <span class="material-symbols-outlined" style="font-size: 48px; color: var(--color-outline); margin-bottom: 16px;">person_add</span>
                    <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 8px;">No patients found</h3>
                    <p style="color: var(--color-on-surface-variant); margin-bottom: 24px;">Get started by adding a patient to your family account.</p>
                    <a href="/safehands_mvc/patient/create" class="btn-primary" style="display: inline-flex; width: auto;">Add Patient</a>
                </div>
            <?php else: ?>
                <?php foreach ($patients as $index => $patient): 
                    $age = sh_calculate_age($patient['date_of_birth'] ?? null);
                    $conditions = sh_split_list($patient['medical_conditions'] ?? null);
                    $hasPhoto = !empty($patient['profile_photo']) && file_exists($patient['profile_photo']);
                    $fullName = $patient['full_name'] ?? 'Unknown Patient';
                    $isFirst = $index === 0;
                ?>
                    <div class="patient-card">
                        <div class="patient-card-header">
                            <div class="patient-info">
                                <div class="patient-photo">
                                    <?php if ($hasPhoto): ?>
                                        <img src="<?= htmlspecialchars($patient['profile_photo']) ?>" alt="<?= htmlspecialchars($fullName) ?>">
                                    <?php else: ?>
                                        <?= htmlspecialchars(sh_patient_initials($fullName)) ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h3 class="patient-name"><?= htmlspecialchars($fullName) ?></h3>
                                    <p class="patient-meta">
                                        <?= htmlspecialchars($patient['relationship'] ?: 'Patient') ?> • 
                                        <?= $age !== null ? $age . ' yrs' : '—' ?> • 
                                        <?= htmlspecialchars($patient['gender'] ?? '—') ?> • 
                                        Blood: <?= htmlspecialchars($patient['blood_group'] ?: '—') ?>
                                    </p>
                                    <div class="patient-tags">
                                        <?php foreach (array_slice($conditions, 0, 2) as $condition): ?>
                                            <span class="tag"><?= htmlspecialchars($condition) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if ($isFirst): ?>
                                <span class="status-badge success">
                                    <span class="dot"></span> Currently Receiving Care
                                </span>
                            <?php else: ?>
                                <span class="status-badge warning">
                                    <span class="dot"></span> Care Scheduled
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="patient-schedule">
                            <div class="schedule-row">
                                <div class="schedule-info">
                                    <span class="material-symbols-outlined">person</span>
                                    <span>Caregiver: <?= $isFirst ? 'Nadeesha Perera' : 'Sunil Jayasuriya' ?></span>
                                </div>
                            </div>
                            <div class="schedule-row">
                                <div class="schedule-info">
                                    <span class="material-symbols-outlined">calendar_today</span>
                                    <span>Next: <?= $isFirst ? '16 August • 08:00 AM - 12:00 PM' : '15 August • 04:00 PM - 08:00 PM' ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="patient-actions">
                            <a href="/safehands_mvc/patient/profile/<?= (int) $patient['patient_id'] ?>" class="btn-outline">View Profile</a>
                            <a href="/safehands_mvc/care-reports" class="btn-fill">Daily Care Reports</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Recent Daily Care Reports Section -->
    <?php if (!empty($reports)): ?>
    <section class="reports-section">
        <div class="reports-header">
            <div>
                <h2 class="section-title">Recent Daily Care Reports</h2>
                <p class="section-desc">Latest updates from your patients' caregivers.</p>
            </div>
            <a href="/safehands_mvc/care-reports" class="reports-link">
                View All Reports <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="reports-list">
            <!-- Mockup dynamic implementation if reports existed -->
        </div>
    </section>
    <?php else: ?>
    <!-- Hardcoded Mockup Reports as provided in the HTML -->
    <section class="reports-section">
        <div class="reports-header">
            <div>
                <h2 class="section-title">Recent Daily Care Reports</h2>
                <p class="section-desc">Latest updates from your patients' caregivers.</p>
            </div>
            <a href="/safehands_mvc/care-reports" class="reports-link">
                View All Reports <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="reports-list">
            <!-- Report 1 -->
            <div class="report-card">
                <div class="report-content">
                    <div class="report-meta">
                        <span class="report-name">Mr. Silva</span>
                        <span class="meta-dot"></span>
                        <span class="report-date">15 Aug 2026</span>
                        <span class="meta-dot"></span>
                        <span class="report-status">Completed</span>
                        <span class="meta-dot"></span>
                        <span class="report-caregiver">
                            <span class="material-symbols-outlined">person</span> Nadeesha Perera
                        </span>
                    </div>
                    <p class="report-text">"Patient was comfortable this morning. Medication was taken on time and light stretching was completed."</p>
                </div>
                <a href="/safehands_mvc/care-reports" class="btn-report" style="text-decoration: none;">View Report</a>
            </div>
            <!-- Report 2 -->
            <div class="report-card">
                <div class="report-content">
                    <div class="report-meta">
                        <span class="report-name">Mrs. Kamala</span>
                        <span class="meta-dot"></span>
                        <span class="report-date">14 Aug 2026</span>
                        <span class="meta-dot"></span>
                        <span class="report-status">Completed</span>
                        <span class="meta-dot"></span>
                        <span class="report-caregiver">
                            <span class="material-symbols-outlined">person</span> Sunil Jayasuriya
                        </span>
                    </div>
                    <p class="report-text">"Blood glucose was monitored and prescribed medication was taken after breakfast."</p>
                </div>
                <a href="/safehands_mvc/care-reports" class="btn-report" style="text-decoration: none;">View Report</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">SafeHands</div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact Support</a>
            <a href="#">Help Center</a>
        </div>
        <div class="footer-copy">
            © 2024 SafeHands Healthcare Management. All rights reserved.
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('patientSearch');
    const patientCards = document.querySelectorAll('.patient-card');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            patientCards.forEach(card => {
                const name = card.querySelector('.patient-name').textContent.toLowerCase();
                const meta = card.querySelector('.patient-meta').textContent.toLowerCase();
                if (name.includes(query) || meta.includes(query)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
</script>
