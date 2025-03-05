const itemsPerPage = 18; // Nombre d'éléments par page
let currentPage = 1;
const totalItems = 36;
const totalPages = Math.ceil(totalItems / itemsPerPage);

function updatePagination() {
    const pageNumbers = document.querySelectorAll('.page-number');
    pageNumbers.forEach((btn) => {
        btn.classList.remove('active');
        if (parseInt(btn.getAttribute('data-page')) === currentPage) {
            btn.classList.add('active');
        }
    });

    console.log('Affichage des éléments pour la page:', currentPage);
}

document.querySelectorAll('.page-number').forEach((button) => {
    button.addEventListener('click', () => {
        currentPage = parseInt(button.getAttribute('data-page'));
        updatePagination();
    });
});

document.querySelector('.prev-page').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        updatePagination();
    }
});

document.querySelector('.next-page').addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        updatePagination();
    }
});

// Initialisation
updatePagination();
