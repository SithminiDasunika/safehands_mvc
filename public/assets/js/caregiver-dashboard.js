// Micro-interaction: Update active state for navigation links if clicked
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        document.querySelectorAll('.nav-link').forEach(l => {
            l.classList.remove('active');
        });
        this.classList.add('active');
    });
});

// Simple button active effect simulation
document.querySelectorAll('button').forEach(btn => {
    btn.addEventListener('click', () => {
        btn.style.opacity = '0.9';
        setTimeout(() => btn.style.opacity = '1', 100);
    });
});
