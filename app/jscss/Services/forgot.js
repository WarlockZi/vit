import {_, post, validate, popup} from '../common/common'

_('#email').on('keyup', function () {

    var errors = validate('email', _('#email').val(), this);
    // alert(errors);

});
_('.forgot').on('click', async function () {
    // if (!errors) {
        var data = {};
        data.action = 'email';
        data.model = 'adminsc';
        data.email = _('#email').val();
        await post('adminsc', data);
        popup(['На указанную почту отправлено письмо со ссылкой для восстановления пароля']);
    // }
});
