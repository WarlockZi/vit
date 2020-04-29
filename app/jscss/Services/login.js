import './login.sass'
import '../components/user_menu/user_menu.sass'
import {validate, popup, post, ajax_body, _} from '../common/common'

/////////////////////////    Login     /////////////////////
_('#email').on('keyup', function () {
    let errors = validate('email', _('#email').val(), this);
});

_(".login").on("click", async function (e) {


    let body = new ajax_body();
    body.url = '/user/login',
        body.action = 'getByEmailAndPass',
        body.email = _('#email').value,
        body.password = _('#password').value;
    let res = await post(body.url, body);
    if (res) {
        window.location = res;
    } else {
        window.location = '/';
    }
});
