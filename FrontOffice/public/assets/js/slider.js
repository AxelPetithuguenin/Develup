// SWIPER PROCHAINES ACTIONS //  
let swiperCardsProchainesActions = new Swiper(".card-content-prochaines-actions", {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  pagination: {
    el: ".swiper-pagination-prochaines-actions",
    clickable: true,
    dynamicBullets: true,
  },

  navigation: {
    nextEl: ".swiper-button-next-prochaines-actions",
    prevEl: ".swiper-button-prev-prochaines-actions",
  },

  autoplay: { 
    delay: 3000, 
    disableOnInteraction: false 
  },

  breakpoints:{
    1120: {
      slidesPerView: 1,
    },
  }
});


// SWIPER ACTUALITE //  
let swiperCardsActualite = new Swiper(".card-content-actualite", {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  pagination: {
    el: ".swiper-pagination-actualite",
    clickable: true,
    dynamicBullets: true,
  },

  navigation: {
    nextEl: ".swiper-button-next-actualite",
    prevEl: ".swiper-button-prev-actualite",
  },

  autoplay: { 
    delay: 3000, 
    disableOnInteraction: false 
  },

  breakpoints:{
    1200: {
      slidesPerView: 3,
    },
    700: {
      slidesPerView: 2,
    },
  },
});

// SWIPER TEMOIGANGE //  
let swiperCardsTemoignage = new Swiper(".card-content-temoignage", {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  pagination: {
    el: ".swiper-pagination-temoignage",
    clickable: true,
    dynamicBullets: true,
  },

  navigation: {
    nextEl: ".swiper-button-next-temoignage",
    prevEl: ".swiper-button-prev-temoignage",
  },

  autoplay: { 
    delay: 3000, 
    disableOnInteraction: false 
  },

  breakpoints:{
    968: {
      slidesPerView: 3,
    },
    653: {
      slidesPerView: 2,
    },
  },
});


// SWIPER ADHERENT //  
let swiperCardsAdherent = new Swiper(".card-content", {
  loop: true,
  spaceBetween: 10,
  grabCursor: false,

  pagination: {
    el: ".swiper-pagination-adherent",
    clickable: true,
    dynamicBullets: true,
  },

  autoplay: { 
    delay: 3000, 
    disableOnInteraction: false 
  },

  breakpoints:{
    1049: {
      slidesPerView: 3,
    },
    560: {
      slidesPerView: 2,
    },
  }
});


