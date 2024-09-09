/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */

import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

export function init() {
  const productSlider = new Swiper('[data-product-slider]', {
    modules: [Pagination, Navigation],
    navigation: {
      prevEl: '[data-product-slider-prev]',
      nextEl: '[data-product-slider-next]',
    },
    pagination: {
      el: '[data-product-slider-pagination]',
      type: 'bullets',
    },
  });

  const productRelatedSlider = new Swiper('[data-product-related-slider]', {
    modules: [Autoplay],
    slidesPerView: 1.2,
    spaceBetween: 20,
    navigation: false,
    pagination: false,
    loop: true,
    autoplay: {
      delay: 5000,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      576: {
        slidesPerView: 2.2,
        spaceBetween: 30,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
  });

  const productHighlightsSlider = new Swiper('[data-product-highlights-slider]', {
    modules: [Autoplay, Navigation],
    slidesPerView: 1.2,
    spaceBetween: 20,
    navigation: {
      prevEl: '[data-product-highlights-prev]',
      nextEl: '[data-product-highlights-next]',
    },
    pagination: false,
    loop: false,
    breakpoints: {
      576: {
        slidesPerView: 2.2,
        spaceBetween: 30,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
  });

  const categoryHighlightsSlider = new Swiper('[data-category-highlights-slider]', {
    modules: [Autoplay, Navigation],
    slidesPerView: 1.2,
    spaceBetween: 20,
    navigation: {
      prevEl: '[data-category-highlights-prev]',
      nextEl: '[data-category-highlights-next]',
    },
    pagination: false,
    loop: false,
    breakpoints: {
      576: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
  });

  const shopUspsSlider = new Swiper('[data-usps-slider]', {
    modules: [Autoplay],
    loop: true,
    slidesPerView: 1,
    autoplay: {
      delay: 5000,
    },
    navigation: false,
    pagination: false,
    allowTouchMove: false,
    breakpoints: {
      720: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      1140: {
        slidesPerView: 3,
        spaceBetween: 40,
        autoplay: false,
      },
    },
  });
}
