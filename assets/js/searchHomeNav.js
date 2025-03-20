document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input#searchbar');
    if (!searchInput) return;

    const resultsContainer = document.createElement('div');
    resultsContainer.classList.add('search-results');
    searchInput.parentNode.appendChild(resultsContainer);

    let timeoutId;

    searchInput.addEventListener('input', function() {
        clearTimeout(timeoutId);
        resultsContainer.style.display = 'none';

        if (this.value.length < 2) return;

        timeoutId = setTimeout(() => {
            const formData = new FormData();
            formData.append('searchMediaHomepage', this.value);

            fetch('searchMediaHomepage', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    resultsContainer.innerHTML = `<p class="no-results">${data.error}</p>`;
                } else {
                    const mediaResults = data.filter(item => item.type === 'media');
                    const artistResults = data.filter(item => item.type === 'artist');

                    let html = '';

                    // Afficher les médias
                    if (mediaResults.length > 0) {
                        html += '<div class="results-section"><h4>Médias</h4>';
                        html += mediaResults.map(media => `
                            <a href="detailMedia/${media.id_media}" class="search-result-item">
                                <div class="search-result-content">
                                    <img src="${media.image_recto || 'assets/img/default-cover.png'}" 
                                         alt="${media.title}" 
                                         onerror="this.src='assets/img/default-cover.png'">
                                    <div class="search-result-info">
                                        <h3>${media.title || 'Sans titre'}</h3>
                                        <p>${media.author || 'Auteur inconnu'}</p>
                                    </div>
                                </div>
                            </a>
                        `).join('');
                        html += '</div>';
                    }

                    // Afficher les artistes
                    if (artistResults.length > 0) {
                        html += '<div class="results-section"><h4>Artistes</h4>';
                        html += artistResults.map(artist => `
                            <a href="author/${artist.id_author}" class="search-result-item">
                                <div class="search-result-content">
                                    <div class="search-result-info">
                                        <h3>${artist.name || 'Nom inconnu'}</h3>
                                        <p>${artist.works_count || 0} œuvre(s)</p>
                                    </div>
                                </div>
                            </a>
                        `).join('');
                        html += '</div>';
                    }

                    if (!html) {
                        html = '<p class="no-results">Aucun résultat trouvé</p>';
                    }

                    resultsContainer.innerHTML = html;
                }
                resultsContainer.style.display = 'block';
            })
            .catch(error => {
                console.error('Erreur:', error);
                resultsContainer.innerHTML = '<p class="no-results">Une erreur est survenue</p>';
                resultsContainer.style.display = 'block';
            });
        }, 300);
    });

    // Cacher les résultats quand on clique en dehors
    document.addEventListener('click', function(e) {
        if (!resultsContainer.contains(e.target) && e.target !== searchInput) {
            resultsContainer.style.display = 'none';
        }
    });
});