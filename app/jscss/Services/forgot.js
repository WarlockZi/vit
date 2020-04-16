import {_, post, validate} from '../common/common'

_('#email').on('keyup', function () {

    var errors = validate('email', _('#email').val(), this);
    alert (errors);
    post('adminsc', 'vvoronik@yandex.ru');

});