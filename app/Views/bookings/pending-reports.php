<?php
$completedSessions = $completed ?? [];
$pendingCount = count(array_filter($completedSessions, static fn($booking) => empty($booking['has_report'])));
?>

<link rel="stylesheet" href="/safehands_mvc/public/assets/css/pending-reports.css?v=1">

<main class="pending-reports-page">
    <div class="pending-reports-toolbar">
        <span class="page-context">Caregiver workspace</span>
        <nav class="report-language-switcher" aria-label="Choose language">
            <a class="active" href="/safehands_mvc/bookings/pendingReports" aria-current="page">English</a>
            <span aria-hidden="true"></span>
            <a href="/safehands_mvc/bookings/pendingReportsSi">සිංහල</a>
        </nav>
    </div>

    <section class="pending-reports-heading">
        <div>
            <p class="section-eyebrow">Care follow-up</p>
            <h1>Pending Reports</h1>
            <p class="heading-description">Review completed care sessions and finish any reports that are still due.</p>
        </div>
        <div class="pending-count"><span class="count-dot"></span><?= $pendingCount ?> <span><?= $pendingCount === 1 ? 'report due' : 'reports due' ?></span></div>
    </section>

    <?php if (($_GET['msg'] ?? '') === 'report_deleted'): ?>
        <div role="status" class="reports-help-note" style="margin-top:-10px; margin-bottom:18px;">
            <span class="help-note-icon" aria-hidden="true">✓</span>
            <div><h2>Report deleted</h2><p>The report was removed. The completed session remains here and can receive a new report.</p></div>
        </div>
    <?php endif; ?>

    <section class="pending-reports-list" aria-label="Completed care sessions">
        <?php if (empty($completedSessions)): ?>
            <div class="reports-empty-state">
                <div class="empty-state-icon" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none"><rect x="11" y="7" width="26" height="34" rx="5"/><path d="M18 18h12M18 24h12M18 30h7"/><path d="m29 33 3 3 6-7"/></svg>
                </div>
                <h2>You’re all caught up</h2>
                <p>No completed care sessions need a report right now. New sessions will appear here when they’re ready.</p>
                <a class="back-to-schedule" href="/safehands_mvc/caregiver/schedule">View your schedule <span aria-hidden="true">→</span></a>
            </div>
        <?php else: ?>
            <?php foreach ($completedSessions as $booking): ?>
                <article class="completed-session-card">
                    <div class="session-person">
                        <img src="<?= htmlspecialchars($booking['image'] ?? 'https://via.placeholder.com/150') ?>" alt="" class="session-avatar">
                        <div>
                            <h2><?= htmlspecialchars($booking['patient'] ?? 'Unknown Patient') ?></h2>
                            <p><?= htmlspecialchars($booking['date'] ?? '') ?> <span class="session-separator">·</span> Care session completed</p>
                        </div>
                    </div>
                    <div class="session-actions">
                        <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="session-secondary-button">View booking</a>
                        <?php if (!empty($booking['has_report'])): ?>
                            <a href="/safehands_mvc/care-report/show/<?= (int)($booking['report_id'] ?? 0) ?>" class="session-primary-button">View report</a>
                            <a href="/safehands_mvc/booking/report/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" class="session-secondary-button">Edit report</a>
                            <form class="session-delete-form" method="POST" action="/safehands_mvc/booking/deleteReport/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" onsubmit="return confirm('Delete this session’s report? The completed session will stay on the schedule, and a report can be submitted again.');">
                                <button type="submit" class="session-delete-button">Delete</button>
                            </form>
                        <?php else: ?>
                            <a href="/safehands_mvc/booking/report/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" class="session-primary-button">Complete report <span aria-hidden="true">→</span></a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <aside class="reports-help-note">
        <span class="help-note-icon" aria-hidden="true">i</span>
        <div><h2>About pending reports</h2><p>Complete a daily care report after each session to keep the family informed about care activities and observations.</p></div>
    </aside>
</main>
