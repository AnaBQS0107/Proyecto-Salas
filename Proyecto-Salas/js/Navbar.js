// Navbar.js
document.addEventListener("DOMContentLoaded", function() {
    const menuIcon = document.getElementById('menu-icon');
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');

    menuIcon.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });

    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
});
