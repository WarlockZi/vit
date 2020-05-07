import './login.sass'
import {post, ajax_body, _, validate} from '../../common/common'


_('#password').on('keyup', function () {
    validate('password',this.value, this);
});

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
