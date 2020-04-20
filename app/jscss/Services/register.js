import {_, ajax_body, post, popup} from '../common/common'

_(".register").on("click", async function (e) {

    let body = new ajax_body('user', 'register');

    let res = await post('/user/register', body);
    if (res === 'email occupied') {
        return popup(['Указанный email занят.','Попробуйте указать другой'],false);
    } else if (res === 'confirm email') {
        return popup(['Зайдите на email и перейдите по указанной там ссылке для активизации']);
    }

});
