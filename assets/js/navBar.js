document.addEventListener('DOMContentLoaded', function() {
    const floatingNav = document.querySelector('.floating-nav');
    const sidebar = document.getElementById('sidebar');
    const headerHome = document.querySelector('#header-home');
    
   
    floatingNav.style.width = 'calc(100% - 100px)';
    floatingNav.style.margin = '0 17px';
    floatingNav.style.borderRadius = '10px';
    
    // Obtenir la largeur réelle de la sidebar
    const sidebarWidth = sidebar ? getComputedStyle(sidebar).width : '250px';
    let sidebarVisible = true;
    
    // Fonction pour vérifier si la sidebar est ouverte en examinant sa transformation
    function checkSidebarState() {
        if (!sidebar) return false;
        
        const transform = getComputedStyle(sidebar).transform;
        // Si la transformation contient une translation négative, la sidebar est fermée
        sidebarVisible = !(transform.includes('matrix') && transform !== 'matrix(1, 0, 0, 1, 0, 0)');
        return sidebarVisible;
    }
    
    // Fonction pour mettre à jour la position de la nav en fonction de la sidebar
    function updateNavPosition() {
        checkSidebarState();
        
        if (sidebarVisible) {
            floatingNav.style.left = 'calc(02% + ' + sidebarWidth + ' + 5px)';
            floatingNav.style.width = 'calc(100% - ' + sidebarWidth + ' - 5px)'; 
        } else {
            floatingNav.style.left = '7px'; 
            floatingNav.style.width = 'calc(100% - 34px)'; // 17px à gauche + 17px à droite
        }
    }
    
    
    function showNav() {
        floatingNav.style.top = '20px';
    }
    
    
    function hideNav() {
        floatingNav.style.top = '-80px';
    }
    
    // Gestion du scroll 
    window.addEventListener('scroll', function() {
        const headerHeight = headerHome ? headerHome.offsetHeight * 0.9 : window.innerHeight;
        const scrollTop = window.pageYOffset;
        
        if (scrollTop > headerHeight) {
            showNav();
        } else {
            hideNav();
        }
    });
    
    // Observer les changements de style de la sidebar
    if (sidebar) {
        // Utiliser un MutationObserver pour détecter les changements de style inline
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'style') {
                    updateNavPosition();
                }
            });
        });
        
        observer.observe(sidebar, { attributes: true, attributeFilter: ['style'] });
        
        
        sidebar.addEventListener('transitionend', updateNavPosition);
        
        // Ajouter également un écouteur pour le bouton qui contrôle la sidebar
        const sidebarToggleButton = document.querySelector('#sidebar-toggle, #burger-button');
        if (sidebarToggleButton) {
            sidebarToggleButton.addEventListener('click', function() {
                // Utiliser setTimeout pour permettre à la transition CSS de commencer
                setTimeout(updateNavPosition, 50);
                // Vérifier également après la fin de la transition
                setTimeout(updateNavPosition, 300);
            });
        }
    }
    
    // Vérifier l'état initial
    setTimeout(function() {
        updateNavPosition();
        
        const initialScroll = window.pageYOffset || document.documentElement.scrollTop;
        const headerHeight = headerHome ? headerHome.offsetHeight * 0.9 : window.innerHeight;
        
        if (initialScroll > headerHeight) {
            showNav();
        } else {
            hideNav();
        }
    }, 100);
    
    // Vérifier périodiquement l'état de la sidebar pour plus de fiabilité
    setInterval(updateNavPosition, 500);
});