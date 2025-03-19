document.addEventListener('DOMContentLoaded', function() {
    // Elements du DOM
    const tableBody = document.getElementById('historique-tbody');
    const tableHeaders = document.querySelectorAll('#historique-table th');
    const searchInput = document.getElementById('search-historic-user');
    
    // Configuration initiale
    let sortConfig = { key: 'date', direction: 'asc' };
    let historiqueData = [];

    // Récupération des données du tableau HTML
    document.querySelectorAll('#historique-tbody tr').forEach(row => {
        const cells = row.querySelectorAll('td'); // Changed from 'th' to 'td'
        if (cells.length > 0) {
            historiqueData.push({
                id_user: cells[0].textContent,
                titre: cells[1].textContent,
                exemplaire: cells[2].textContent,
                categorie: cells[3].textContent,
                sousCategorie: cells[4].textContent,
                date: cells[5].textContent,
                type: cells[6].textContent,
                statut: cells[7].textContent
            });
        }
    });

    // Fonction pour obtenir la classe du badge selon le statut
    function getStatusBadgeClass(statut) {
        const statusClasses = {
            'Déchiré': 'badge-red',
            'Bon': 'badge-jaune',
            'Mauvais': 'badge-red',
            'A JETER !': 'badge-red',
            'Neuf': 'badge-green'
        };
        return statusClasses[statut] || 'badge-green';
    }

    // Fonction pour trier les données
    function sortData(key) {
        const direction = sortConfig.key === key && sortConfig.direction === 'asc' ? 'desc' : 'asc';
        sortConfig = { key, direction };

        // Mise à jour des indicateurs visuels de tri
        tableHeaders.forEach(header => {
            header.classList.remove('sort-asc', 'sort-desc');
            if (header.dataset.sort === key) {
                header.classList.add(direction === 'asc' ? 'sort-asc' : 'sort-desc');
            }
        });

        renderTable();
    }

    // Fonction de filtrage des données
    function filterData(searchValue) {
        if (!searchValue.trim()) return historiqueData;
        
        const searchLower = searchValue.toLowerCase();
        return historiqueData.filter(item => 
            Object.values(item).some(value => 
                String(value).toLowerCase().includes(searchLower)
            )
        );
    }

    // Fonction pour afficher les données dans le tableau
    function renderTable(data = historiqueData) {
        if (!tableBody) return;

        // Trier les données
        const sortedData = [...data].sort((a, b) => {
            const aValue = a[sortConfig.key];
            const bValue = b[sortConfig.key];

            if (aValue < bValue) return sortConfig.direction === 'asc' ? -1 : 1;
            if (aValue > bValue) return sortConfig.direction === 'asc' ? 1 : -1;
            return 0;
        });

        // Vider et remplir le tableau
        tableBody.innerHTML = '';
        
        if (sortedData.length === 0) {
            const emptyRow = document.createElement('tr');
            emptyRow.innerHTML = '<td colspan="8" class="empty-message">Aucun résultat trouvé</td>';
            tableBody.appendChild(emptyRow);
            return;
        }

        sortedData.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.id_user}</td>
                <td>${item.titre}</td>
                <td>${item.exemplaire}</td>
                <td>${item.categorie}</td>
                <td>${item.sousCategorie}</td>
                <td>${item.date}</td>
                <td>${item.type}</td>
                <td><span class="${getStatusBadgeClass(item.statut)}">${item.statut}</span></td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Event Listeners
    if (tableHeaders) {
        tableHeaders.forEach(header => {
            if (header.dataset.sort) {
                header.addEventListener('click', () => sortData(header.dataset.sort));
            }
        });
    }

    // Débounce function pour la recherche
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    // Appliquer le debounce à la recherche
    if (searchInput) {
        const debouncedSearch = debounce((searchValue) => {
            const filteredData = filterData(searchValue);
            renderTable(filteredData);
        }, 300);

        searchInput.addEventListener('input', (e) => debouncedSearch(e.target.value));
    }

    // Initialisation
    renderTable();
});