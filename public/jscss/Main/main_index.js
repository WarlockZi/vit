import '../../../public/jscss/components/swiper/swiper.sass';
import '../../../public/jscss/components/header/header.sass';
import '../../../public/jscss/components/footer/footer.sass';

import Swiper from 'swiper';
import '../User/user_login';
import '../components/autocomplete/autocomplete';

window.onload = function () {
     alert('\d');
    var newSwiper = new Swiper('.swiper-container-new', {
        autoplay: 20,
        speed: 500,
        loop: true,
        mousewheelControl: true,
        mousewheelForceToAxis: true, // just use the horizontal axis to
        slidesPerView: 5,
        spaceBetween: 10,
        touchEventsTarget: 'container',
        grabCursor: true,
    });
// Later add callback
    newSwiper.on('slideChangeStart', function () {
        console.log('slide change start');
    });

// Add one more handler for this event
    newSwiper.on('slideChangeStart', function () {
        console.log('slide change start 2');
    });

// Add handler that will be executed only once
    newSwiper.once('sliderMove', function () {
        console.log('slider moved');
    });
}