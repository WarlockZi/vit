import './a_menu.sass'
import {_} from "../../common/common"

_('.a-menu').on('mouseenter', function () {
    this.style.width = '71px';
});
_('.a-menu').on('mouseleave', function () {
    this.style.width = '32px';
});

let path = window.location.pathname;
let paths = path.match('(adminsc$)|(crm)|(settings)|(Sitemap)|(catalog)')[0];

switch (paths) {
    case 'catalog':
        _('.module.catalog')[0].classList.add('activ');
        break;
    case 'crm':
        _('.module.crm')[0].classList.add('activ');
        break;
    case 'settings':
        _('.module.settings')[0].classList.add('activ');
        break;
    case 'adminsc':
        _('.module.home')[0].classList.add('activ');
        break;

}
