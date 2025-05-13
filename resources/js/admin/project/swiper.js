$(document).ready(function () {
    new Swiper(".myGallerySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        pagination: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {slidesPerView: 1},
            576: {slidesPerView: 2},
            768: {slidesPerView: 2},
            992: {slidesPerView: 2}
        }
    });
})
