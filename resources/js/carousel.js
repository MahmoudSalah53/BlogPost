// import Swiper core , navigation, paginationAdd commentMore actions
import Swiper from "swiper";
import {Autoplay, Navigation, Pagination} from "swiper/modules";

// import css
import 'swiper/css';
import 'swiper/css/pagination';

const swiper = new Swiper('.swiper', {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    speed: 500,
    pagination: {
        el: '.swiper-pagination',
    },
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {slidesPerView: 1},
        768: {slidesPerView: 2},
        1024: {slidesPerView: 3},
    },
    autoHeight: true,
    autoplay: {
        delay: 5000,
    },

});
