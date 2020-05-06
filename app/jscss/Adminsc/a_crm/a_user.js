import './a_user.sass'
import {_, post, ajax_body, popup} from './../../common/common'

_('.save_user').on('click', async (e) => {
    var body = new ajax_body('user', 'update');
    body.id = _('#id').text();

    let res = await post('/adminsc', body);
    if (res)
        return popup(['Пользователь сохранен', 'Все хорошо!']);
    return popup(['Пользователь не сохранен', 'произошла ошибка'], 'not');
});




