import './login.sass'
import {post, ajax_body, _} from '../../common/common'

/////////////////////////    Login     /////////////////////

_("#login").on("click",async function (e) {
        e.preventDefault();
        let body = new ajax_body();
        body.email = document.querySelector('input[type = email]').value,
            body.pass = document.querySelector('input[type= password]').value;
        let res = await post('/user/login', body);
        if (res == "в кабинет") {
            window.location = '/user/cabinet';
        } else {
            window.location = '/adminsc';
        }
    });
