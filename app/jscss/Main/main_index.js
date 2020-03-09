import '../components/swiper/swiper'
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