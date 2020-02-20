import '../../../public/jscss/components/swiper/swiper.sass';
import '../../../public/jscss/components/header/header.sass';
import '../../../public/jscss/components/footer/footer.sass';


// import '../User/user_login';
import '../common.sass';
import '../components/autocomplete/autocomplete';
import Swiper from "swiper";

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
        // watchSlidesVisibility: true,
        preloadImages: false,
        // Enable lazy loading
        lazy: true
    });
// Add handler that will be executed only once
    newSwiper.once('sliderMove', function () {
        console.log('slider moved');
    });
};