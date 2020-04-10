import './login.sass'
import '../components/user_menu/user_menu.sass'
import {post, ajax_body, _} from '../common/common'

/////////////////////////    Login     /////////////////////

_(".login").on("click",async function (e) {
        // e.preventDefault();
        let body = new ajax_body();
        body.url = '/user/login',
        body.action = 'getByEmailAndPass',
        body.email = document.querySelector('input[type = email]').value,
            body.password = document.querySelector('input[type= password]').value;
        let res = await post(body.url, body);
        if (res) {
            window.location = res;
        } else {
            window.location = '/';
        }
    });
