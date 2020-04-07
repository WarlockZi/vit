import '../components/swiper/swiper'
import {_} from '../common/common'
import './header.sass'
import './footer.sass'
import '../components/alert/alert'
import '../components/coockie/coockie'
import '../components/autocomplete/autocomplete'
import '../components/breadcrumbs/breadcrumbs.sass'

import './catalog/prod.sass'
import './main.sass'
import './catalog/product.sass'
import "../components/user_menu/user_menu.sass"



_('.user-menu').on('click', function () {
    window.location.href = '/user/login';
});

// jQuery.event.special.touchstart =
//     {// чтобы не было ошибки при прикосновениях пальцем на мобилке
//         setup: function (_, ns, handle) {
//             if (ns.includes("noPreventDefault")) {
//                 this.addEventListener("touchstart", handle, {passive: false});
//             } else {
//                 this.addEventListener("touchstart", handle, {passive: true});
//             }
//         }
//     };
// jQuery.event.special.touchmove =
//     {
//         setup: function (_, ns, handle) {
//             if (ns.includes("noPreventDefault")) {
//                 this.addEventListener("touchstart", handle, {passive: false});
//             } else {
//                 this.addEventListener("touchstart", handle, {passive: true});
//             }
//         }
//     };