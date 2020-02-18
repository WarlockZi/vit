import '../../../public/jscss/components/swiper/swiper.sass';
import '../../../public/jscss/components/header/header.sass';
import '../../../public/jscss/components/footer/footer.sass';

import Swiper from 'swiper';
import '../User/user_login';
import '../components/autocomplete/autocomplete';

window.onload = function () {
    var newSwiper = new Swiper('.swiper-container-new', {
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        speed: 5000,
        loop: true,
        mousewheelControl: false,
        mousewheelForceToAxis: true, // just use the horizontal axis to
        slidesPerView: 5,
        spaceBetween: 10,
        grabCursor: true,
        watchSlidesVisibility: true,
    });
// Add handler that will be executed only once
    newSwiper.once('sliderMove', function () {
        console.log('slider moved');
    });
}