import {post} from "../../common/common"
import {preparedObj} from './a_category'

const cat_properties = document.querySelector('.cat-properties');

if (cat_properties) {

    cat_properties.addEventListener('click', function (e) {
        if (!event.target.classList.contains('del-prop'))return;
            let del_btn = event.target;
            let name = del_btn.nextSibling.innerText;
            let id = del_btn.dataset.id;

            delProperty(id, name, del_btn);

    });
}

async function delProperty(id, name, self) {
    let obj = new preparedObj();
    obj.values = {};
    obj.values.shared = {};
    obj.action = "delProp";
    obj.values.shared.table = "props";
    obj.values.shared.id = id;

    let deleted = await post(obj.url, obj);

    let option = new Option(name, id);

    let select = document.querySelector('#select_props');
    if (select) {
        select.append(option);
        self.parentNode.remove()
    }
}


