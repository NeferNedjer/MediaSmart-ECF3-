document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.flex-product');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const cardWidth = document.querySelector('.card-product').offsetWidth + 20; // Width + gap
    let position = 0;
    
    function updateCarouselPosition() {
        carousel.style.transform = `translateX(${position}px)`;
    }
    
    function moveCarousel(direction) {
        const containerWidth = carousel.parentElement.offsetWidth;
        const maxScroll = -(carousel.scrollWidth - containerWidth);
        
        if (direction === 'next') {
            position = Math.max(position - cardWidth, maxScroll);
        } else {
            position = Math.min(position + cardWidth, 0);
        }
        
        updateCarouselPosition();
    }
    
    prevBtn.addEventListener('click', () => moveCarousel('prev'));
    nextBtn.addEventListener('click', () => moveCarousel('next'));
});