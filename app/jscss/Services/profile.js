import {_, ajax_body, popup, post} from "../common/common";

_('.save_profile').on('click', async (e) => {
    var body = new ajax_body('user', 'update');
    body.id = _('#id').text();

    let res = await post('/adminsc', body);

});
