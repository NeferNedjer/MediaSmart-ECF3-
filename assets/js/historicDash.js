document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('historique-tbody');
    console.log(tableBody);
    const tableHeaders = document.querySelectorAll('#historique-table th');
    let sortConfig = { key: 'date', direction: 'asc' };
    let historiqueData = [];

    // Récupérer les données du tableau HTML
    document.querySelectorAll('#historique-tbody tr').forEach(row => {
        const cells = row.querySelectorAll('th');
        historiqueData.push({
            id_user: cells[0].innerText,
            titre: cells[1].innerText,
            exemplaire: cells[2].innerText,
            categorie: cells[3].innerText,
            sousCategorie: cells[4].innerText,
            date: cells[5].innerText,
            type: cells[6].innerText,
            statut: cells[7].innerText
        });
    });

    function getStatusBadgeClass(statut) {
        switch (statut) {
            case 'Déchiré':
                return 'badge-red';
            case 'Bon':
                return 'badge-jaune';
            case 'Mauvais':
                return 'badge-red';
            case 'A jeter':
                return 'badge-red';
            default:
                return 'badge-green';
        }
    }

    // Fonction pour trier les données
    function sortData(key) {
        let direction = 'asc';
        if (sortConfig.key === key && sortConfig.direction === 'asc') {
            direction = 'desc';
        }
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

    // Fonction pour afficher les données dans le tableau
    function renderTable() {
        // Trier les données
        const sortedData = [...historiqueData].sort((a, b) => {
            if (a[sortConfig.key] < b[sortConfig.key]) {
                return sortConfig.direction === 'asc' ? -1 : 1;
            }
            if (a[sortConfig.key] > b[sortConfig.key]) {
                return sortConfig.direction === 'asc' ? 1 : -1;
            }
            return 0;
        });

        // Vider le corps du tableau
        tableBody.innerHTML = '';

        // Afficher les données triées dans le tableau
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

    // Ajouter des gestionnaires d'événements aux en-têtes de colonne
    tableHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const key = header.dataset.sort;
            sortData(key);
        });
    });

    // Initialiser le tableau
    renderTable();
});