import './swiper.sass'
import { Swiper, Mousewheel, Zoom, Lazy, Autoplay} from 'swiper/js/swiper.esm.js';
Swiper.use([Mousewheel, Zoom, Lazy, Autoplay ]);

window.onload = function () {

    var newSwiper = new Swiper('.swiper-container-new', {
        // autoplay: {
        //     delay: 300,
        //     disableOnInteraction: false,
        // },
        speed: 9000,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
                width: 620,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
                width: 760,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
                width: 1020,
            },
        },
        mousewheelControl: false,
        mousewheelForceToAxis: true, // just use the horizontal axis to
        grabCursor: true,

        lazy: {
            loadPrevNext: true,
            loadPrevNextAmount: 1,
        },

    });
    newSwiper.width = "100%";
};