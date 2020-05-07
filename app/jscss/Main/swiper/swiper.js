import './swiper.sass'
import { Swiper, Mousewheel, Zoom, Lazy, Autoplay} from 'swiper/js/swiper.esm.js';
Swiper.use([Mousewheel, Zoom, Lazy, Autoplay ]);

window.onload = function () {

    var newSwiper = new Swiper('.swiper-container-new', {
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        loop: true,
        breakpoints: {
            325: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            400: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            600: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
        mousewheelControl: true,
        mousewheelForceToAxis: true, // just use the horizontal axis to
        grabCursor: true,
        preloadImages: false,
        // lazy: true,

        lazy: {
            loadPrevNext: true,
            loadPrevNextAmount: 1,
        },

    });

};