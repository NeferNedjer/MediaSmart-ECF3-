let currentIndex = 0;
const slides = document.querySelectorAll('.carrousel-item');
const totalSlides = slides.length;

function moveSlide(step) {
   currentIndex += step;

    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    updateSlidePosition();
}

function updateSlidePosition() {
    
    const carrousel = document.querySelector('.carrousel');
    const offset = -currentIndex * 100;
    carrousel.style.transform = `translateX(${offset}%)`;
}

setInterval(() => {
    moveSlide(1);
}, 3000);