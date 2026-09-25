document.addEventListener('DOMContentLoaded', () => {
    // Update current date
    const dateEl = document.getElementById('current-date');
    if (dateEl) {
        const now = new Date();
        const options = { month: 'long', day: 'numeric', year: 'numeric' };
        dateEl.textContent = now.toLocaleDateString('en-US', options);
    }

    // Active State Logic Simulation
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            // Note: Since this is MVC, usually clicking a link navigates to a new page.
            // This is just a UI simulation for the current view.
            navLinks.forEach(l => {
                l.classList.remove('active');
            });
            link.classList.add('active');
        });
    });
    
    // Hover effect on table rows (can also be handled purely in CSS, but keeping it for completeness if complex logic is added)
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.boxShadow = '0 1px 2px 0 rgba(0, 0, 0, 0.05)';
        });
        row.addEventListener('mouseleave', () => {
            row.style.boxShadow = 'none';
        });
    });
});
