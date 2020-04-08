import './a_menu.sass'

let path = window.location.pathname;
let paths = path.match('(adminsc$)|(crm)|(settings)|(Sitemap)|(catalog)')[0];

switch (paths) {
    case 'catalog':
        document.querySelector('.module.catalog').classList.add('activ');
        break;
    case 'crm':
        document.querySelector('.module.crm').classList.add('activ');
        break;
    case 'settings':
        document.querySelector('.module.settings').classList.add('activ');
        break;
    case 'adminsc':
        document.querySelector('.module.home').classList.add('activ');
        break;

}
