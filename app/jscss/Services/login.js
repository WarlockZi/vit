import './login.sass'
import '../components/user_menu/user_menu.sass'
import {post, ajax_body, _} from '../common/common'

/////////////////////////    Login     /////////////////////
_(".login").on("click",async function (e) {
        let body = new ajax_body();
        body.model = '';
        let res = await post('/user/login', body);
        if (res === 'в админку') {
            window.location = '/adminsc';
        } else if (res ==='в кабинет') {
            window.location = '/';
        }
    });
