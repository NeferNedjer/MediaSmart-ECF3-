document.addEventListener('DOMContentLoaded', function() {
    const topHiddenResaBar = document.getElementById('top-hidden-resa-bar');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) { 
            if (!topHiddenResaBar.classList.contains('visible')) {
                topHiddenResaBar.style.display = 'block';
                setTimeout(() => {
                    topHiddenResaBar.style.opacity = '1';
                }, 10); 
                topHiddenResaBar.classList.add('visible');
            }
        } else {
            if (topHiddenResaBar.classList.contains('visible')) {
                topHiddenResaBar.style.opacity = '0';
                setTimeout(() => {
                    topHiddenResaBar.style.display = 'none';
                }, 500); 
                topHiddenResaBar.classList.remove('visible');
            }
        }
    });
});