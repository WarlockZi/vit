import './tags.sass'
import {_, post, ajax_body, popup} from '../../common/common'

let id = _('#id');
//// create tag
_('.tag-add').on('click', function () {
    let data = new ajax_body('tag', 'create');
    id && post(null, data);
});

//// delete tag
_('.tag-del').on('click', async function () {
    let data = new ajax_body('tag', 'delete');
    data.id = this.dataset.id;
    let res =  await post(null, data);
    alert(res);
    res==='deleted' && popup(['Тэг удален']);

});



