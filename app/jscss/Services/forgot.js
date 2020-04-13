import {_, post, validation} from '../common/common'

_('#email').on('keyup', function () {

    validation('email', _('#email').val(), this);

    // this.style.background = '#f7f7f7';
});