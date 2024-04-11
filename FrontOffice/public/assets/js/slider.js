// SWIPER JS // 
let swiperCards = new Swiper(".slider-prochaines-actions-container", {
  loop: true,
  spaceBetween: 15,
  grabCursor: true,

  pagination: {
    el: ".swiper-pagination-prochaine-action",
    clickable: true,
    dynamicBullets: true,
  },

  navigation: {
    nextEl: ".swiper-button-next-prochaine-action",
    prevEl: ".swiper-button-prev-prochaine-action",
  },

  breakpoints:{
    1120: {
      slidesPerView: 1,
    },
  },
});

// SWIPER ACTUALITE // 
let swiperCardsActualite = new Swiper(".slider-actualite-container", {
  loop: true,
  spaceBetween: 15,
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

  breakpoints:{
    1120: {
      slidesPerView: 1,
    },
  },
});

// SWIPER TEMOIGNAGE // 
let swiperCardsTemoignage = new Swiper(".slider-temoignage-container", {
  loop: true,
  spaceBetween: 15,
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

  breakpoints:{
    600: {
      slidesPerView: 2,
    },
  },
});

// SWIPER ADHERENT // 
let swiperCardsAdherent = new Swiper(".slider-adherent-container", {
  loop: true,
  spaceBetween: 50,
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
    653: {
      slidesPerView: 3,
    },
    450: {
      slidesPerView: 2,
    },
  },
});