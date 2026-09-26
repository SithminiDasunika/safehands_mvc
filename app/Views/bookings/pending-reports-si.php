<div style="display:flex; justify-content:flex-end; padding:12px 0;">
            <div class="language-switcher" style="display:flex; align-items:center; gap:8px; margin-right:12px; font-size:15px;">
                <a href="/safehands_mvc/bookings/pendingReports" style="color:#059669; text-decoration:none;">English</a>
                <span style="color:#9ca3af;">|</span>
                <a href="/safehands_mvc/bookings/pendingReportsSi" style="color:#059669; font-weight:700; text-decoration:none;">සිංහල</a>
            </div>
</div>
<link rel="stylesheet" href="/safehands_mvc/public/assets/css/caregiver/dashboard.css?v=2">
<style>
.booking-page-header {
    margin-bottom: 24px;
}
.booking-page-header h1 {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 8px;
}
.booking-page-header p {
    color: #6b7280;
    font-size: 14px;
}
.completed-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.completed-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
}
.completed-person {
    display: flex;
    align-items: center;
    gap: 16px;
}
.caregiver-image {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}
.completed-person h3 {
    margin: 0 0 4px;
    font-size: 16px;
    color: #111827;
}
.completed-person p {
    margin: 0;
    color: #6b7280;
    font-size: 14px;
}
.booking-actions {
    display: flex;
    gap: 12px;
}
.primary-button, .secondary-button {
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
}
.primary-button {
    background: #059669;
    color: white;
    border: none;
}
.secondary-button {
    background: white;
    color: #111827;
    border: 1px solid #d1d5db;
}
</style>

<div class="booking-page-header">
    <h1>පොරොත්තු වාර්තා</h1>
    <p>ඔබගේ අවසන් කළ සත්කාර සැසි සඳහා වාර්තා බලන්න සහ කළමනාකරණය කරන්න.</p>
</div>

<section class="booking-section">
    <div class="completed-list">
        <?php if (empty($completed)): ?>
            <div style="padding: 24px; text-align: center; color: #6b7280; background: white; border-radius: 12px; border: 1px solid #e5e7eb;">
                අවසන් කළ සත්කාර සැසි කිසිවක් හමු නොවීය.
            </div>
        <?php else: ?>
            <?php foreach ($completed as $booking): ?>
                <div class="completed-card">
                    <div class="completed-person">
                        <img src="<?= htmlspecialchars($booking['image'] ?? 'https://via.placeholder.com/150') ?>" alt="Caregiver" class="caregiver-image">
                        <div>
                            <h3><?= htmlspecialchars($booking['patient'] ?? 'Unknown Patient') ?></h3>
                            <p><?= htmlspecialchars($booking['date'] ?? '') ?> • අවසන් කර ඇත</p>
                        </div>
                    </div>
                    
                    <div class="booking-actions">
                        <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="primary-button">
                            වෙන්කිරීම බලන්න
                        </a>
                        <?php if (!empty($booking['has_report'])): ?>
                            <a href="/safehands_mvc/care-report/index/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="primary-button">
                                වාර්තාව බලන්න
                            </a>
                            <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="secondary-button">
                                වාර්තාව සංස්කරණය කරන්න
                            </a>
                            <a href="/safehands_mvc/booking/deleteReport/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="secondary-button" style="color:#dc2626; border-color:#dc2626;" onclick="return confirm('ඔබට විශ්වාසද මෙම සත්කාර වාර්තාව මැකීමට අවශ්‍ය බව?');">
                                වාර්තාව මකන්න
                            </a>
                        <?php else: ?>
                            <a href="/safehands_mvc/booking/report/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="secondary-button" style="background:#fef3c7; border-color:#f59e0b; color:#92400e;">
                                වාර්තාව ඉදිරිපත් කරන්න
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
