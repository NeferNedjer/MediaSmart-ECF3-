const burgerButton = document.getElementById('burger-button');
const menuOverlay = document.querySelector('.menu-overlay');
const menuContent = document.querySelector('.menu-content');

// Fonction pour ouvrir et fermer le menu avec animation
function toggleMenu() {
    menuOverlay.classList.toggle('active');

    // Si le menu est ouvert, on joue l'animation du menu
    if (menuOverlay.classList.contains('active')) {
        // On joue l'animation en faisant glisser le menu à gauche
        menuContent.style.transform = 'translateX(0)';
    } else {
        // Si le menu se ferme, on le cache en dehors de l'écran
        menuContent.style.transform = 'translateX(100%)';
    }
}

// Fonction pour fermer le menu si on clique sur le fond sombre
function closeMenu(event) {
    if (event.target === menuOverlay) {
        menuOverlay.classList.remove('active');
        menuContent.style.transform = 'translateX(100%)';
    }
}

burgerButton.addEventListener('click', toggleMenu);

menuOverlay.addEventListener('click', closeMenu);
