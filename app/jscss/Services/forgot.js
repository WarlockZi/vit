import {_, post, validate} from '../common/common'

_('#email').on('keyup', function () {

    validate('email', _('#email').val(), this);

    // this.style.background = '#f7f7f7';
});