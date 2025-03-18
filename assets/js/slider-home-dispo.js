document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.flex-product');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    
    if (!carousel || !prevBtn || !nextBtn) return;

    let position = 0;
    const cardWidth = document.querySelector('.card-product').offsetWidth + 20; 
    let autoplayInterval;
    const autoplayDelay = 3700; 

    function updateButtonsState() {
        const maxScroll = -(carousel.scrollWidth - carousel.parentElement.offsetWidth);
        prevBtn.disabled = position === 0;
        nextBtn.disabled = position <= maxScroll;
    }

    function moveCarousel(direction) {
        const containerWidth = carousel.parentElement.offsetWidth;
        const maxScroll = -(carousel.scrollWidth - containerWidth);
        
        if (direction === 'next') {
            position = Math.max(position - cardWidth, maxScroll);
            
            if (position <= maxScroll) {
                position = 0;
            }
        } else {
            position = Math.min(position + cardWidth, 0);
        }

        carousel.style.transform = `translateX(${position}px)`;
        updateButtonsState();
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

   
    prevBtn.addEventListener('click', () => {
        moveCarousel('prev');
        stopAutoplay();
    });

    nextBtn.addEventListener('click', () => {
        moveCarousel('next');
        stopAutoplay();
    });

   
    carousel.addEventListener('mouseenter', stopAutoplay);
    // Reprendre l'autoplay quand la souris quitte le carousel
    carousel.addEventListener('mouseleave', startAutoplay);

    
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            position = 0;
            carousel.style.transform = `translateX(0)`;
            updateButtonsState();
        }, 250);
    });

    
    updateButtonsState();
    startAutoplay(); 
});