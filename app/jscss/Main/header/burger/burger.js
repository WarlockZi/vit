import './burger.sass'
import {_} from '../../../common/common'

_('.burger-wrap').on('click', function () {
    let menu = _('#burger-menu')[0];
    menu.classList.toggle('show');
});