import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/bundle';


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