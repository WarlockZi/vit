import {_, ajax_body, popup, post} from "../../common/common";

_('.submit').on('click', async (e) => {
    var body = new ajax_body('user', 'update');
    body.id = _('#id').text();

    let res = await post('/adminsc', body);
    // if (res === 'ajax done') {
    //     let body = document.querySelector('body');
    //     body.append(popup(['Пользователь сохранен', 'Все хорошо!']));
    // }
});
