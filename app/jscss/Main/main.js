import '../components/swiper/swiper'
import '../common/common'
import './components/header/header.sass'
import './components/footer/footer.sass'
import '../components/alert/alert'
import '../components/coockie/coockie'
import '../components/autocomplete/autocomplete'
import '../components/breadcrumbs/breadcrumbs.sass'

import './catalog/prod.sass'
import './main.sass'
import './catalog/catalog_product.sass'




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