import './a_category.sass'

import './cat_add_property'
import './cat_del_property'
import {_} from '../../common/MyJQ'

class a_category_ajax {
    constructor(action) {
        this.token = _("meta[name = 'token']").content;
        this.url = '/adminsc';
        this.table = 'category';
        this['model'] = 'category';
        this.id = +document.querySelector('#id').innerText;
        this.action = action ? action : 'update';
    }
}

export {a_category_ajax};


