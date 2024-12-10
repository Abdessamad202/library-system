import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/bundle';

let swiperHome = new Swiper('.hero-swiper', {
  loop: true,
  spaceBetween: -24, // Default space between slides
  grabCursor: true,
  slidesPerView: 1, // Number of slides to show at once
  centeredSlides: true,

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },

  breakpoints: {
    // Small devices (portrait phones, less than 576px)
    576: {
      slidesPerView: 1, // Show 1 slide on small devices
      spaceBetween: -16, // Adjust space between slides for smaller screens
    },

    // Medium devices (tablets, 576px and up)
    768: {
      slidesPerView: 2, // Show 2 slides on tablets
      spaceBetween: -24, // Adjust space for tablets
    },

    // Large devices (desktops, 992px and up)
    992: {
      slidesPerView: 3, // Show 3 slides on medium desktop screens
      spaceBetween: -32, // Adjust space between slides for desktops
    },

    // Extra large devices (large desktops, 1200px and up)
    1200: {
      slidesPerView: 3, // Show 3 slides on large desktops
      spaceBetween: -32, // Adjust space for large screens
    },

    // Ultra large screens (larger than 1200px)
    1500: {
      slidesPerView: 4, // Show 4 slides for extra large screens
      spaceBetween: -40, // Adjust space for ultra large screens
    },
  },

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
let NewBooksSwiper = new Swiper('.new-books-slider', {
  loop: true,
  // slidesPerView: 3,
  spaceBetween: 30,
  grabCursor: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
      centeredSlides: true,

    },
    991: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
  }
});