import '../components/swiper/swiper.sass'
import '../components/header/header.sass'
import '../components/footer/footer.sass'
import '../components/alert/alert'
import '../components/coockie/coockie'
import '../components/autocomplete/autocomplete'
import '../components/breadcrumbs/breadcrumbs.sass'

import '../Catalog/catalog_product.sass'
import '../Catalog/catalog_product.sass'
import '../Catalog/prod.sass'

import '../common'

import { Swiper, Mousewheel, Zoom, Lazy, Autoplay} from 'swiper/js/swiper.esm.js';
Swiper.use([Mousewheel, Zoom, Lazy, Autoplay ]);

window.onload = function () {

    var newSwiper = new Swiper('.swiper-container-new', {
        autoplay: {
            delay: 300,
            disableOnInteraction: false,
        },
        speed: 9000,
        loop: true,
        // width: 600,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
        mousewheelControl: false,
        mousewheelForceToAxis: true, // just use the horizontal axis to
        // slidesPerView: 5,
        // spaceBetween: 10,
        grabCursor: true,
        zoom: {
            maxRatio: 1.5,
        },
        lazy: {
             loadPrevNext: true,
             loadPrevNextAmount: 1,
        },
        // preloadImages: true,
        // watchSlidesVisibility: true,
    });
};
