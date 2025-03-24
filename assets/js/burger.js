const burgerButton = document.getElementById('burger-button');
const menuOverlay = document.querySelector('.menu-overlay');
const menuContent = document.querySelector('.menu-content');
const sideBar = document.getElementById('sidebar');

// Fonction pour basculer l'état du menu
function toggleMenu() {
    menuOverlay.classList.toggle('active');
    sideBar.classList.toggle('sidebar-closed'); // Ferme la sidebar lorsque le menu est ouvert

    // Si le menu est ouvert, on joue l'animation du menu
    if (menuOverlay.classList.contains('active')) {
        // On fait glisser le menu
        menuContent.style.transform = 'translateX(0)';
    } else {
        // On cache le menu
        menuContent.style.transform = 'translateX(100%)';
    }
}

// Fonction pour fermer le menu si on clique sur le fond sombre
function closeMenu(event) {
    if (event.target === menuOverlay) {
        menuOverlay.classList.remove('active');
        menuContent.style.transform = 'translateX(100%)';
        sideBar.classList.remove('sidebar-closed'); // On réouvre la sidebar si le menu est fermé
    }
}

burgerButton.addEventListener('click', toggleMenu);
menuOverlay.addEventListener('click', closeMenu);
