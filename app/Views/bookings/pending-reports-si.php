<?php
$completedSessions = $completed ?? [];
$pendingCount = count(array_filter($completedSessions, static fn($booking) => empty($booking['has_report'])));
?>

<link rel="stylesheet" href="/safehands_mvc/public/assets/css/pending-reports.css?v=1">

<main class="pending-reports-page">
    <div class="pending-reports-toolbar">
        <span class="page-context">Caregiver workspace</span>
        <nav class="report-language-switcher" aria-label="භාෂාව තෝරන්න">
            <a href="/safehands_mvc/bookings/pendingReports">English</a>
            <span aria-hidden="true"></span>
            <a class="active" href="/safehands_mvc/bookings/pendingReportsSi" aria-current="page">සිංහල</a>
        </nav>
    </div>

    <section class="pending-reports-heading">
        <div>
            <p class="section-eyebrow">සත්කාර පසු විපරම</p>
            <h1>පොරොත්තු වාර්තා</h1>
            <p class="heading-description">අවසන් කළ සත්කාර සැසි පරීක්ෂා කර, ඉදිරිපත් කිරීමට ඇති වාර්තා සම්පූර්ණ කරන්න.</p>
        </div>
        <div class="pending-count"><span class="count-dot"></span><?= $pendingCount ?> <span>වාර්තා ඉදිරිපත් කළ යුතුයි</span></div>
    </section>

    <?php if (($_GET['msg'] ?? '') === 'report_deleted'): ?>
        <div role="status" class="reports-help-note" style="margin-top:-10px; margin-bottom:18px;">
            <span class="help-note-icon" aria-hidden="true">✓</span>
            <div><h2>වාර්තාව මකා ඇත</h2><p>වාර්තාව ඉවත් කර ඇත. අවසන් කළ සැසිය මෙහි පවතින අතර නැවත වාර්තාවක් ඉදිරිපත් කළ හැකිය.</p></div>
        </div>
    <?php endif; ?>

    <section class="pending-reports-list" aria-label="අවසන් කළ සත්කාර සැසි">
        <?php if (empty($completedSessions)): ?>
            <div class="reports-empty-state">
                <div class="empty-state-icon" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none"><rect x="11" y="7" width="26" height="34" rx="5"/><path d="M18 18h12M18 24h12M18 30h7"/><path d="m29 33 3 3 6-7"/></svg>
                </div>
                <h2>දැනට සියල්ල යාවත්කාලීනයි</h2>
                <p>දැනට වාර්තාවක් අවශ්‍ය වන අවසන් කළ සත්කාර සැසියක් නැත. නව සැසි සූදානම් වූ විට මෙහි පෙන්වනු ඇත.</p>
                <a class="back-to-schedule" href="/safehands_mvc/caregiver/schedule">ඔබගේ කාලසටහන බලන්න <span aria-hidden="true">→</span></a>
            </div>
        <?php else: ?>
            <?php foreach ($completedSessions as $booking): ?>
                <article class="completed-session-card">
                    <div class="session-person">
                        <img src="<?= htmlspecialchars($booking['image'] ?? 'https://via.placeholder.com/150') ?>" alt="" class="session-avatar">
                        <div>
                            <h2><?= htmlspecialchars($booking['patient'] ?? 'නොදන්නා රෝගියා') ?></h2>
                            <p><?= htmlspecialchars($booking['date'] ?? '') ?> <span class="session-separator">·</span> සත්කාර සැසිය අවසන්</p>
                        </div>
                    </div>
                    <div class="session-actions">
                        <a href="/safehands_mvc/booking/details/<?= htmlspecialchars($booking['id'] ?? '') ?>" class="session-secondary-button">වෙන්කිරීම බලන්න</a>
                        <?php if (!empty($booking['has_report'])): ?>
                            <a href="/safehands_mvc/care-report/show/<?= (int)($booking['report_id'] ?? 0) ?>" class="session-primary-button">වාර්තාව බලන්න</a>
                            <a href="/safehands_mvc/booking/report/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" class="session-secondary-button">වාර්තාව සංස්කරණය</a>
                            <form class="session-delete-form" method="POST" action="/safehands_mvc/booking/deleteReport/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" onsubmit="return confirm('මෙම සැසියේ වාර්තාව මකා දමන්නද? සැසිය කාලසටහනේ පවතින අතර වාර්තාව නැවත ඉදිරිපත් කළ හැක.');">
                                <button type="submit" class="session-delete-button">මකන්න</button>
                            </form>
                        <?php else: ?>
                            <a href="/safehands_mvc/booking/report/<?= (int)($booking['id'] ?? 0) ?>/<?= (int)($booking['session_id'] ?? 0) ?>" class="session-primary-button">වාර්තාව සම්පූර්ණ කරන්න <span aria-hidden="true">→</span></a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <aside class="reports-help-note">
        <span class="help-note-icon" aria-hidden="true">i</span>
        <div><h2>පොරොත්තු වාර්තා ගැන</h2><p>සෑම සත්කාර සැසියකටම පසු දෛනික වාර්තාව සම්පූර්ණ කිරීමෙන් සත්කාර ක්‍රියාකාරකම් සහ නිරීක්ෂණ පිළිබඳව පවුල දැනුවත් කළ හැකිය.</p></div>
    </aside>
</main>
