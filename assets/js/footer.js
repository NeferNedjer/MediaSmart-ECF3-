document.addEventListener('DOMContentLoaded', function() {
    const footer = document.getElementById('footer');
    

    window.addEventListener('resize', function() {
        if (window.innerWidth < 768) {
            footer.style.display = 'none';
        } else {
            footer.style.display = 'block'; 
        }
    });
});
