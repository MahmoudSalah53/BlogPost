// import Swiper core , navigation, pagination
import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";

// import css
import 'swiper/css';
import 'swiper/css/pagination';

let swiperInstance = null;

function initSwiper() {

    if (swiperInstance) {
        swiperInstance.destroy(true, true);
        swiperInstance = null;
    }

    swiperInstance = new Swiper('.swiper', {
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
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
        autoHeight: false,
        autoplay: {
            delay: 5000,
        },

    });
}

document.addEventListener('DOMContentLoaded', initSwiper);

document.addEventListener('livewire:navigated', () => {

    setTimeout(initSwiper, 100);
});
