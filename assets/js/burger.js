const burgerIcon = document.querySelector('.burger-button');
const burgerVisible = document.getElementById('burger-menu');
let menuIsOpen = false; 

gsap.set(burgerVisible, { 
  y: -150,
  opacity: 0, 
  display: 'none' 
});

burgerIcon.addEventListener('click', () => {
  if (!menuIsOpen) {
    burgerVisible.style.display = 'block';
    
    gsap.to(burgerVisible, {
      y: 0, 
      opacity: 1,
      duration: 0.65,
      ease: "slow.out",
      onComplete: () => {
        menuIsOpen = true; 
      }
    });
  } else {
    
    gsap.to(burgerVisible, {
      y: -150,
      opacity: 0,
      duration: 0.5,
      ease: "power2.in",
      onComplete: () => {
        burgerVisible.style.display = 'none';
        menuIsOpen = false; 
      }
    });
  }
});