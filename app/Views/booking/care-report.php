<?php
$booking = $booking ?? [];
$patient = $patient ?? [];
$caregiver = $caregiver ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeHands | Submit Daily Care Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-booking.css?v=2">
    <link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver-submit-report.css?v=2">
</head>
<body>

<!-- Top Navigation Bar -->
<header class="header" style="background:#fff; border-bottom:1px solid #f1f5f9; position:sticky; top:0; z-index:50;">
    <div class="header-inner" style="display:flex; justify-content:space-between; align-items:center; max-width:1280px; margin:0 auto; padding:0 40px; height:64px;">
        <div style="display:flex; align-items:center; gap:32px;">
            <span style="font-size:24px; font-weight:700; color:var(--primary);">SafeHands</span>
            <nav style="display:flex; gap:24px;">
                <a href="/safehands_mvc/caregiver/dashboard" style="text-decoration:none; color:var(--on-surface-variant); font-weight:500;">Dashboard</a>
                <a href="#" style="text-decoration:none; color:var(--primary); font-weight:700; border-bottom:2px solid var(--primary); padding-bottom:4px;">My Schedule</a>
               
            </nav>
        </div>
        <div style="display:flex; align-items:center; gap:16px;">
            <img src="<?= htmlspecialchars($caregiver['image'] ?? 'https://via.placeholder.com/150') ?>" alt="Caregiver" style="width:40px; height:40px; border-radius:50%; object-fit:cover; border:2px solid var(--primary-container);">
        </div>
    </div>
</header>

<main class="max-w-container" style="padding-top:32px;">
    
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="/safehands_mvc/caregiver/dashboard" style="text-decoration:none; color:var(--on-surface-variant);">Dashboard</a>
        <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
        <span>Today's Schedule</span>
        <span class="material-symbols-outlined" style="font-size:16px;">chevron_right</span>
        <span class="active">Daily Care Report</span>
    </div>

    <div id="report-form-container">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-text">
                <h1 class="text-headline-lg">Submit Daily Care Report</h1>
                <p class="text-body-md">Complete today's care report before ending the service. Ensure all medical data and observations are accurate for the family's review.</p>
            </div>
            
            <div class="patient-card">
                <div class="patient-info">
                    <img src="<?= htmlspecialchars($patient['image'] ?? 'https://via.placeholder.com/150') ?>" class="patient-img" alt="Patient">
                    <div class="patient-details">
                        <h3 class="text-label-md"><?= htmlspecialchars($patient['name'] ?? 'Mr. Silva') ?></h3>
                        <p>Booking ID: <strong>BK-2026-<?= str_pad($booking['id'] ?? 125, 5, '0', STR_PAD_LEFT) ?></strong></p>
                    </div>
                </div>
                <div class="patient-meta">
                    <div class="meta-item">
                        <p class="label">DATE</p>
                        <p class="value text-label-md"><?= htmlspecialchars($booking['service_date'] ?? '15 July 2026') ?></p>
                    </div>
                    <div class="meta-item">
                        <p class="label">SHIFT</p>
                        <p class="value text-label-md" style="color:var(--primary);"><?= htmlspecialchars($booking['service_time'] ?? 'Morning Shift') ?></p>
                    </div>
                </div>
            </div>
        </div>

        <form id="dailyReportForm" action="/safehands_mvc/booking/submitReport/<?= htmlspecialchars($booking['id'] ?? '') ?>" method="POST">
            
            <!-- Section 1 -->
            <section class="form-section">
                <div class="section-header">
                    <span class="material-symbols-outlined">clinical_notes</span>
                    <h2 class="text-label-sm">1. Care Activities</h2>
                </div>
                <div class="section-body grid-3 grid-gap-y">
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Assisted Bathing">
                        <span class="text-body-md">Assisted Bathing</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Dressing">
                        <span class="text-body-md">Dressing</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Medication Administered" checked>
                        <span class="text-body-md">Medication Administered</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Meal Prep">
                        <span class="text-body-md">Meal Prep</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Feeding">
                        <span class="text-body-md">Feeding</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Walking Assistance">
                        <span class="text-body-md">Walking Assistance</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Exercise">
                        <span class="text-body-md">Exercise</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="Companionship">
                        <span class="text-body-md">Companionship</span>
                    </label>
                    <label class="checkbox-group">
                        <input type="checkbox" name="activities[]" value="BP Monitoring">
                        <span class="text-body-md">BP Monitoring</span>
                    </label>
                </div>
            </section>

            <!-- Section 2 -->
            <section class="form-section">
                <div class="section-header">
                    <span class="material-symbols-outlined">pill</span>
                    <h2 class="text-label-sm">2. Medication Information</h2>
                </div>
                <div class="section-body">
                    <div class="form-group" style="margin-bottom:24px; max-width:50%;">
                        <label class="text-label-sm">Was medication administered?</label>
                        <select class="form-control" name="med_status">
                            <option>Yes, according to schedule</option>
                            <option>No, patient refused</option>
                            <option>No, medication unavailable</option>
                        </select>
                    </div>
                    <div class="grid-3">
                        <div class="form-group">
                            <label class="text-label-sm">Medication Name</label>
                            <input type="text" class="form-control" name="med_name" placeholder="e.g., Lisinopril">
                        </div>
                        <div class="form-group">
                            <label class="text-label-sm">Time Administered</label>
                            <input type="time" class="form-control" name="med_time">
                        </div>
                        <div class="form-group">
                            <label class="text-label-sm">Status</label>
                            <div class="status-buttons">
                                <button type="button" class="btn-status active">Taken</button>
                                <button type="button" class="btn-status">Refused</button>
                                <button type="button" class="btn-status">Missed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="grid-2">
                <!-- Section 3 -->
                <section class="form-section">
                    <div class="section-header">
                        <span class="material-symbols-outlined">restaurant</span>
                        <h2 class="text-label-sm">3. Meal Information</h2>
                    </div>
                    <div class="section-body" style="display:flex; flex-direction:column; gap:16px;">
                        <div style="display:flex; align-items:center; gap:16px;">
                            <label class="text-label-sm" style="width:120px;">Breakfast</label>
                            <select class="form-control" name="meal_breakfast" style="flex:1;">
                                <option>Completed</option>
                                <option>Partially</option>
                                <option>Refused</option>
                            </select>
                        </div>
                        <div style="display:flex; align-items:center; gap:16px;">
                            <label class="text-label-sm" style="width:120px;">Water Intake</label>
                            <select class="form-control" name="meal_water" style="flex:1;">
                                <option>Adequate</option>
                                <option>Moderate</option>
                                <option>Low</option>
                            </select>
                        </div>
                    </div>
                </section>
                <!-- Section 4 -->
                <section class="form-section">
                    <div class="section-header">
                        <span class="material-symbols-outlined">mood</span>
                        <h2 class="text-label-sm">4. Patient Condition</h2>
                    </div>
                    <div class="section-body" style="display:flex; flex-direction:column; gap:16px;">
                        <div style="display:flex; align-items:center; gap:16px;">
                            <label class="text-label-sm" style="width:120px;">Condition</label>
                            <select class="form-control" name="condition_status" style="flex:1;">
                                <option>Stable</option>
                                <option>Good</option>
                                <option>Fair</option>
                            </select>
                        </div>
                        <div style="display:flex; align-items:center; gap:16px;">
                            <label class="text-label-sm" style="width:120px;">Mood</label>
                            <select class="form-control" name="condition_mood" style="flex:1;">
                                <option>Happy</option>
                                <option>Calm</option>
                                <option>Irritable</option>
                            </select>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Section 5 -->
            <section class="form-section">
                <div class="section-header">
                    <span class="material-symbols-outlined">monitoring</span>
                    <h2 class="text-label-sm">5. Health Observations</h2>
                </div>
                <div class="section-body grid-3">
                    <div class="form-group">
                        <label class="text-label-sm">Blood Pressure (mmHg)</label>
                        <input type="text" class="form-control" name="vitals_bp" placeholder="e.g., 120/80">
                    </div>
                    <div class="form-group">
                        <label class="text-label-sm">Temperature (°F)</label>
                        <input type="text" class="form-control" name="vitals_temp" placeholder="e.g., 98.4">
                    </div>
                    <div class="form-group">
                        <label class="text-label-sm">Heart Rate (BPM)</label>
                        <input type="text" class="form-control" name="vitals_hr" placeholder="e.g., 72">
                    </div>
                </div>
            </section>

            <!-- Section 6 -->
            <section class="form-section">
                <div class="section-header">
                    <span class="material-symbols-outlined">edit_note</span>
                    <h2 class="text-label-sm">6. Additional Notes</h2>
                </div>
                <div class="section-body">
                    <textarea name="shift_summary" class="form-control" style="width:100%; box-sizing:border-box;" rows="4" placeholder="Enter detailed observations..."></textarea>
                </div>
            </section>

            <!-- Confirmation -->
            <div class="confirmation-box">
                <input type="checkbox" required>
                <div>
                    <h3 class="text-body-md">I confirm that the information provided is accurate</h3>
                    <p class="text-label-sm">This report will be shared with the medical board and the family.</p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">Submit Report</button>
            </div>

        </form>
    </div>

    <!-- Success State -->
    <div id="success-state" class="success-state">
        <div class="success-icon">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        <h1 class="text-display-lg">Report Submitted Successfully</h1>
        <p class="text-body-lg">The family member can now view today's care report. A digital copy has also been sent to your supervisor.</p>
        <div class="success-actions">
            <a href="/safehands_mvc/caregiver/schedule" class="btn-secondary" style="display:flex; align-items:center; text-decoration:none; color:inherit;">View Schedule</a>
            <a href="/safehands_mvc/bookings" class="btn-primary" style="display:flex; align-items:center; text-decoration:none;">Return to Dashboard</a>
        </div>
    </div>

</main>


<script src="/safehands_mvc/public/assets/js/caregiver-submit-report.js?v=<?= time() ?>"></script>

<?php if (!empty($existingData)): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const data = <?= json_encode($existingData) ?>;
    
    // Populate checkboxes
    if (data.activities && Array.isArray(data.activities)) {
        const checkboxes = document.querySelectorAll('input[name="activities[]"]');
        checkboxes.forEach(cb => {
            const act = data.activities.find(a => a.name === cb.value);
            if (act && act.completed) {
                cb.checked = true;
            } else {
                cb.checked = false;
            }
        });
    }

    // Populate selects
    if (data.medication && data.medication.status) {
        const medStatus = document.querySelector('select[name="med_status"]');
        if (medStatus) medStatus.value = data.medication.status;
    }
    if (data.meal && data.meal.breakfast) {
        const mealB = document.querySelector('select[name="meal_breakfast"]');
        if (mealB) mealB.value = data.meal.breakfast;
    }
    if (data.meal && data.meal.water) {
        const mealW = document.querySelector('select[name="meal_water"]');
        if (mealW) mealW.value = data.meal.water;
    }
    if (data.condition && data.condition.status) {
        const cond = document.querySelector('select[name="condition_status"]');
        if (cond) cond.value = data.condition.status;
    }
    if (data.condition && data.condition.mood) {
        const mood = document.querySelector('select[name="condition_mood"]');
        if (mood) mood.value = data.condition.mood;
    }

    // Populate text inputs
    if (data.medication && data.medication.name) {
        const medName = document.querySelector('input[name="med_name"]');
        if (medName) medName.value = data.medication.name;
    }
    if (data.medication && data.medication.time) {
        const medTime = document.querySelector('input[name="med_time"]');
        if (medTime) medTime.value = data.medication.time;
    }
    if (data.vitals && data.vitals.bp) {
        const bp = document.querySelector('input[name="vitals_bp"]');
        if (bp) bp.value = data.vitals.bp;
    }
    if (data.vitals && data.vitals.temp) {
        const temp = document.querySelector('input[name="vitals_temp"]');
        if (temp) temp.value = data.vitals.temp;
    }
    if (data.vitals && data.vitals.hr) {
        const hr = document.querySelector('input[name="vitals_hr"]');
        if (hr) hr.value = data.vitals.hr;
    }

    // Populate textarea
    if (data.shift_summary) {
        const notes = document.querySelector('textarea[name="shift_summary"]');
        if (notes) notes.value = data.shift_summary;
    }

    // Change Submit button text
    const submitBtn = document.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.textContent = 'Update Report';
    }
    
    // Change page title
    const headerTitle = document.querySelector('.page-header h1');
    if (headerTitle) {
        headerTitle.textContent = 'Update Daily Care Report';
    }
});
</script>
<?php endif; ?>
</body>
</html>
