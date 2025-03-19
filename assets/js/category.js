document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const sidebar = document.getElementById('sidebar');
    const closeSidebarBtn = document.querySelector('.close-sidebar');
    const showCate = document.getElementById('show-cate');
    const categoryHeaders = document.querySelectorAll('.category-header, .category-header-dvd');
    const authorHeader = document.querySelector('#author-cate h3');
    const authorContent = document.querySelector('.author-hidden');

    



    // Création du bouton d'ouverture
    const openSidebarBtn = document.createElement('button');
    openSidebarBtn.classList.add('open-sidebar');
    openSidebarBtn.innerHTML = '☰';
    openSidebarBtn.setAttribute('aria-label', 'Ouvrir le menu');
    showCate.appendChild(openSidebarBtn);

    // Gestion de la sidebar
    function closeSidebar() {
        sidebar.classList.remove('active');
        sidebar.style.transform = 'translateX(-100%)';
        openSidebarBtn.classList.add('visible');
    }

    function openSidebar() {
        sidebar.classList.add('active');
        sidebar.style.transform = 'translateX(0)';
        openSidebarBtn.classList.remove('visible');
    }

    // Fermer toutes les catégories au démarrage
    function initializeCategories() {
        document.querySelectorAll('.subcategory-list').forEach(list => {
            list.classList.add('hidden');
        });
        if (authorContent) {
            authorContent.style.maxHeight = '0px';
            authorContent.style.overflow = 'hidden';
        }
    }

    // Gestion des clics sur les catégories
    function handleCategoryClick(header) {
        const subcategoryList = header.querySelector('.subcategory-list');
        const arrow = header.querySelector('.arrow');

        // Fermer les autres catégories
        categoryHeaders.forEach(otherHeader => {
            if (otherHeader !== header) {
                const otherList = otherHeader.querySelector('.subcategory-list');
                const otherArrow = otherHeader.querySelector('.arrow');
                if (otherList && otherArrow) {
                    otherList.classList.add('hidden');
                    otherArrow.style.transform = 'rotate(0deg)';
                }
            }
        });

        // Fermer la section auteur si elle est ouverte
        if (authorContent && authorContent.style.maxHeight !== '0px') {
            authorContent.style.maxHeight = '0px';
            if (authorHeader.querySelector('.arrow')) {
                authorHeader.querySelector('.arrow').classList.remove('active');
            }
        }

        // Toggle la catégorie actuelle
        if (subcategoryList && arrow) {
            subcategoryList.classList.toggle('hidden');
            arrow.style.transform = subcategoryList.classList.contains('hidden') 
                ? 'rotate(0deg)' 
                : 'rotate(180deg)';
        }
    }



    // Event Listeners
    closeSidebarBtn.addEventListener('click', closeSidebar);
    openSidebarBtn.addEventListener('click', openSidebar);

    categoryHeaders.forEach(header => {
        header.addEventListener('click', () => handleCategoryClick(header));
    });

    if (authorHeader && authorContent) {
        authorHeader.addEventListener('click', function() {
            // Fermer toutes les catégories
            categoryHeaders.forEach(header => {
                const subcategoryList = header.querySelector('.subcategory-list');
                const arrow = header.querySelector('.arrow');
                if (subcategoryList && arrow) {
                    subcategoryList.classList.add('hidden');
                    arrow.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle la section auteur
            const isHidden = authorContent.style.maxHeight === '0px';
            authorContent.style.maxHeight = isHidden ? authorContent.scrollHeight + 'px' : '0px';
            const authorArrow = authorHeader.querySelector('.arrow');
            if (authorArrow) {
                authorArrow.classList.toggle('active', isHidden);
            }
        });
    }

    // Gestion des sous-catégories
    document.querySelectorAll('.subcategory-item a').forEach(link => {
        link.addEventListener('click', async function(e) {
            e.preventDefault();
            e.stopPropagation();

            try {
                const response = await fetch('/filterMediaByCategory', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        subcategory_id: this.dataset.subcategory
                    })
                });

                const data = await response.json();
                if (data.success) {
                    updateProductDisplay(data.medias);
                    closeSidebar();
                    scrollToResults();
                }
            } catch (error) {
                console.error('Erreur:', error);
            }
        });
    });

    function updateProductDisplay(medias) {
        const section = document.querySelector('#disponibilite-cate .flex-product');
        if (!section) return;

        const html = medias.map(media => `
            <div class="card-product">
                <div class="card">
                    <a href="/media/${media.id_media}">
                        <img src="${media.image_recto}" alt="${media.title}">
                    </a>
                    <div class="title-product1">${media.title}</div>
                    <div class="auteur-product1">${media.author}</div>
                </div>
            </div>
        `).join('');
        
        section.innerHTML = html;
    }

    function scrollToResults() {
        const targetSection = document.querySelector('#disponibilite-cate');
        if (targetSection) {
            targetSection.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    // Initialisation
    initializeCategories();
});