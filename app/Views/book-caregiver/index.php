<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($title ?? 'Book Caregiver | SafeHands Premium Care') ?></title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/safehands_mvc/public/assets/css/booking-create.css?v=2">
</head>
<body>
<!-- TopNavBar -->
<nav class="navbar">
    <div class="nav-container">
        <a href="/safehands_mvc/" class="nav-logo">SafeHands</a>
        <div class="nav-links">
            <a href="/safehands_mvc/family" class="nav-link">Dashboard</a>
            <a href="/safehands_mvc/patient" class="nav-link">Patients</a>
            <a href="/safehands_mvc/caregiver" class="nav-link active">Find Caregivers</a>
            <a href="/safehands_mvc/booking" class="nav-link">My Bookings</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    
    <!-- Header Section -->
    <header class="page-header">
        <h1 class="page-title">Book Caregiver</h1>
        <div class="caregiver-info">
            <div class="caregiver-avatar">
                <img alt="<?= htmlspecialchars($caregiver['name']) ?>" src="<?= htmlspecialchars($caregiver['image']) ?>">
            </div>
            <p class="caregiver-name">Booking <strong><?= htmlspecialchars($caregiver['name']) ?></strong></p>
        </div>
    </header>

    <form id="booking-form" action="/safehands_mvc/book-caregiver/store/<?= (int)$caregiver['id'] ?>" method="POST">
        <div class="grid-container">
            <!-- Form Area -->
            <div class="grid-form">
                
                <!-- Patient Selection -->
                <section class="card">
                    <label class="card-label">Select Patient</label>
                    <div class="input-wrapper">
                        <select class="input-field" name="patient_id" required>
                            <option value="" disabled selected>Select a patient...</option>
                            <?php if (!empty($patients)): ?>
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?= htmlspecialchars($patient['patient_id']) ?>">
                                        <?= htmlspecialchars($patient['full_name']) ?> (<?= htmlspecialchars($patient['relationship']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>No patients found. Please add a patient first.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </section>

                <div id="sessions-container">
                    <!-- Care Session #1 -->
                    <section class="card session-card" data-session-index="1">
                        <div class="card-title">
                            <span class="session-title-text">Care Session #1</span>
                            <button type="button" class="btn-delete" style="display:none;" onclick="removeSession(this)">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                        <div class="two-col-grid">
                            <div>
                                <label class="card-label">Select Date</label>
                                <div class="input-wrapper">
                                    <input class="input-field session-date" type="date" name="sessions[1][date]" required>
                                </div>
                            </div>
                            <div>
                                <label class="card-label">Select Shifts</label>
                                <div class="shift-options">
                                    <label class="shift-label">
                                        <input class="shift-checkbox" type="checkbox" name="sessions[1][shifts][]" value="morning">
                                        <div class="shift-card">
                                            <span class="material-symbols-outlined icon">light_mode</span>
                                            <span class="text">Morning</span>
                                        </div>
                                    </label>
                                    <label class="shift-label">
                                        <input class="shift-checkbox" type="checkbox" name="sessions[1][shifts][]" value="afternoon">
                                        <div class="shift-card">
                                            <span class="material-symbols-outlined icon">wb_sunny</span>
                                            <span class="text">Afternoon</span>
                                        </div>
                                    </label>
                                    <label class="shift-label">
                                        <input class="shift-checkbox" type="checkbox" name="sessions[1][shifts][]" value="evening">
                                        <div class="shift-card">
                                            <span class="material-symbols-outlined icon">dark_mode</span>
                                            <span class="text">Evening</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <button type="button" class="btn-add" id="add-session-btn">
                    <span class="material-symbols-outlined">add_circle</span>
                    Add Another Date
                </button>
            </div>

            <!-- Sidebar Summary -->
            <aside class="grid-sidebar">
                <div class="summary-card">
                    <div class="summary-header">
                        <h4>Booking Summary</h4>
                    </div>
                    <div class="summary-body">
                        <div class="summary-item">
                            <div>
                                <p class="summary-item-title">Selected Shifts</p>
                                <p class="summary-item-desc"><span id="shift-count-display">1</span> Shift(s) x Rs. <?= number_format($caregiver['daily_rate'] ?? 2000) ?></p>
                            </div>
                            <span class="summary-item-price" id="subtotal-display">Rs. <?= number_format($caregiver['daily_rate'] ?? 2000) ?></span>
                        </div>
                        
                        <div class="summary-divider">
                            <span>Platform Fee</span>
                            <span class="price">Rs. 300</span>
                        </div>

                        <div class="summary-total">
                            <span class="summary-total-label">Total Amount</span>
                            <span class="summary-total-price" id="total-display">Rs. <?= number_format(($caregiver['daily_rate'] ?? 2000) + 300) ?></span>
                        </div>

                        <button class="btn-confirm" type="submit">
                            Confirm Booking
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>

                        <div class="secure-badge">
                            <span class="material-symbols-outlined">verified_user</span>
                            <span class="text">Secure Checkout Powered by SafeHands</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </form>
</main>

<script>
    let sessionCount = 1;
    const dailyRate = <?= (float)($caregiver['daily_rate'] ?? 2000) ?>;
    const platformFee = 300;

    document.getElementById('add-session-btn').addEventListener('click', function() {
        sessionCount++;
        
        // Clone the first session
        const firstSession = document.querySelector('.session-card');
        const newSession = firstSession.cloneNode(true);
        
        // Update index and title
        newSession.setAttribute('data-session-index', sessionCount);
        newSession.querySelector('.session-title-text').textContent = 'Care Session #' + sessionCount;
        
        // Show delete button
        newSession.querySelector('.btn-delete').style.display = 'block';
        
        // Clear inputs and update names
        const dateInput = newSession.querySelector('.session-date');
        dateInput.value = '';
        dateInput.name = `sessions[${sessionCount}][date]`;
        
        const checkboxes = newSession.querySelectorAll('.shift-checkbox');
        checkboxes.forEach(cb => {
            cb.checked = false;
            cb.name = `sessions[${sessionCount}][shifts][]`;
            // Re-attach event listener
            cb.addEventListener('change', updateSummary);
        });
        
        // Append to container
        document.getElementById('sessions-container').appendChild(newSession);
        
        updateSummary();
    });

    function removeSession(btn) {
        const sessionCard = btn.closest('.session-card');
        sessionCard.remove();
        
        // Re-index remaining sessions (optional, but good for UI)
        let index = 1;
        document.querySelectorAll('.session-card').forEach(card => {
            card.setAttribute('data-session-index', index);
            card.querySelector('.session-title-text').textContent = 'Care Session #' + index;
            card.querySelector('.session-date').name = `sessions[${index}][date]`;
            card.querySelectorAll('.shift-checkbox').forEach(cb => {
                cb.name = `sessions[${index}][shifts][]`;
            });
            // Hide delete button if it's the only one left
            card.querySelector('.btn-delete').style.display = index === 1 && document.querySelectorAll('.session-card').length === 1 ? 'none' : 'block';
            index++;
        });
        sessionCount = index - 1;
        
        updateSummary();
    }

    function updateSummary() {
        const checkedBoxes = document.querySelectorAll('.shift-checkbox:checked');
        const shiftCount = checkedBoxes.length;
        
        const subtotal = shiftCount * dailyRate;
        const total = shiftCount > 0 ? subtotal + platformFee : 0;
        
        document.getElementById('shift-count-display').textContent = shiftCount;
        document.getElementById('subtotal-display').textContent = 'Rs. ' + subtotal.toLocaleString();
        document.getElementById('total-display').textContent = 'Rs. ' + total.toLocaleString();
    }
    
    // Attach initial event listeners
    document.querySelectorAll('.shift-checkbox').forEach(cb => {
        cb.addEventListener('change', updateSummary);
    });
    
    // Run once on load
    updateSummary();
</script>

</body>
</html>
