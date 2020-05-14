import './tags.sass'
import {_, post, ajax_body} from '../../common/common'

let id = _('#id');

_('.tag-save').on('click', function () {
    let data = new ajax_body('tag', 'create');
    id && post(null, data);
});



