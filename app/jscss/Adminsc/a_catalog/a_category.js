import './a_category.sass'

import './cat_add_property'
import './cat_del_property'
import {_} from '../../common/MyJQ'
import {ajax_body} from "../../common/common";

class a_category_ajax extends ajax_body{
    constructor(action) {
        super(action);
        this.table = 'category';
        this['model'] = 'category';
        this.id = +document.querySelector('#id').innerText;
        this.action = action ? action : 'update';
        return this;
    }
}

export {a_category_ajax};


