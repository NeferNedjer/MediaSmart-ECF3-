document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.flex-product');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    
    if (!carousel || !prevBtn || !nextBtn) return;

    let position = 0;
    const cardWidth = document.querySelector('.card-product').offsetWidth + 20;
    let autoplayInterval;
    const autoplayDelay = 3700;
    
    function moveCarousel(direction) {
        const containerWidth = carousel.parentElement.offsetWidth;
        const totalWidth = carousel.scrollWidth;
        const maxScroll = -(totalWidth - containerWidth);
        
        if (direction === 'next') {
            position -= cardWidth;
            
            // Si on atteint la fin
            if (position < maxScroll) {
                // Copier le premier élément à la fin
                const firstCard = carousel.firstElementChild;
                carousel.appendChild(firstCard.cloneNode(true));
                carousel.removeChild(firstCard);
                
                // Réinitialiser la position
                position += cardWidth;
            }
        } else {
            position += cardWidth;
            
            // Si on est au début
            if (position > 0) {
                // Copier le dernier élément au début
                const lastCard = carousel.lastElementChild;
                carousel.insertBefore(lastCard.cloneNode(true), carousel.firstElementChild);
                carousel.removeChild(lastCard);
                
                // Ajuster la position
                position -= cardWidth;
            }
        }

        carousel.style.transition = 'transform 0.3s ease-in-out';
        carousel.style.transform = `translateX(${position}px)`;
    }

    function startAutoplay() {
        stopAutoplay();
        autoplayInterval = setInterval(() => {
            moveCarousel('next');
        }, autoplayDelay);
    }

    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
        }
    }

    // Event Listeners
    prevBtn.addEventListener('click', () => {
        moveCarousel('prev');
        stopAutoplay();
    });

    nextBtn.addEventListener('click', () => {
        moveCarousel('next');
        stopAutoplay();
    });

    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);

    // Initialize
    startAutoplay();
});