let splide = new Splide( '.splide', {
  perPage: 3,
  gap    : '5rem',
  type:'loop',
  pagination: false,
  autoplay: true,
  interval:4000,
  pauseOnHover:true,
  breakpoints: {
    640: {
      perPage: 2,
      gap    : '.7rem',
      height : '6rem',
    },
    480: {
      perPage: 1,
      gap    : '.7rem',
      height : '6rem',
    },
  },
  
} );

splide.mount();

