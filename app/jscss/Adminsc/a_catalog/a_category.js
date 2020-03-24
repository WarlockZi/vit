import './a_category.sass'

import './cat_add_property'
import './cat_del_property'

class preparedObj{
    constructor(){
        this.token = document.querySelector('#token').value;
        this.url = '/adminsc';
        this.table = 'category';
        this['model'] = 'category';
        this.id = +document.querySelector('#id').innerText;
        this.action = 'update';
    }


}

export {preparedObj};


