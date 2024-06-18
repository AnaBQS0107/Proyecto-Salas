

document.getElementById('menu-icon').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
});

var closeBtn = document.querySelector('.close-btn');
closeBtn.addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.remove('show');
});