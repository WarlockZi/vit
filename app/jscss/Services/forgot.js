import {_, post, validate} from '../common/common'

_('#email').on('keyup', function () {

    var errors = validate('email', _('#email').val(), this);
    // alert(errors);

});
_('.forgot').on('click', function () {
    // if (!errors) {
        var data = {};
        data.action = 'email';
        data.model = 'adminsc';
        data.email = _('#email').val();
        post('adminsc', data);
    // }
});
