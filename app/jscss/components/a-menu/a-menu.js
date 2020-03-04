import './a-menu.sass';

let path = window.location.pathname;

let catalog = path.match(/.?catalog.?/);
let crm = path.match(/crm/);
let settings = path.match(/settings/);
let Sitemap = /adminsc\/Sitemap/;

switch (path) {
    case catalog:
        document.querySelector('.module.catalog').classList.add('activ');
        break;
    case crm:
        document.querySelector('.module.crm').classList.add('activ');
        break;
    case settings:
        document.querySelector('.module.settings').classList.add('activ');
        break;
    case '/adminsc':
        document.querySelector('.module.home').classList.add('activ');
        break;


}

//
// switch (window.location.pathname) {
//     case '/adminsc/catalog':
//     case '/adminsc/catalog/category':
//     case '/adminsc/catalog/product':
//     case '/adminsc/catalog/products':
//         document.querySelector('.module.catalog').classList.add('activ');
//         break;
//     case '/adminsc/crm':
//     case '/adminsc/crm/users':
//         document.querySelector('.module.crm').classList.add('activ');
//         break;
//     case '/adminsc/settings':
//     case '/adminsc/Sitemap':
//     case '/adminsc/settings/pics':
//     case '/adminsc/settings/prop':
//     case '/adminsc/settings/props':
//         document.querySelector('.module.settings').classList.add('activ');
//         break;
//     case '/adminsc':
//         document.querySelector('.module.home').classList.add('activ');
//         break;
// }