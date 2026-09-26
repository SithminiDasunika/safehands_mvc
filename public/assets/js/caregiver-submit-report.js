document.addEventListener('DOMContentLoaded', function() {
    const reportForm = document.getElementById('dailyReportForm');
    if(reportForm) {
        reportForm.addEventListener('submit', function(e) {
            // e.preventDefault();
            const container = document.getElementById('report-form-container');
            const success = document.getElementById('success-state');
            // container.style.display = 'none';
            // success.style.display = 'flex';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        const container = document.getElementById('report-form-container');
        const success = document.getElementById('success-state');
        if (container && success) {
            // container.style.display = 'none';
            // success.style.display = 'flex';
        }
    }

    const statusBtns = document.querySelectorAll('.btn-status');
    statusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            this.parentNode.querySelectorAll('.btn-status').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
