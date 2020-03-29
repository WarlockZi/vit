import {post} from "../../common/common"
import {preparedObj} from './a_category'
import {_} from '../../common/MyJQ'

// const cat_properties = document.querySelector('.cat-properties');
// if (cat_properties) {
//     cat_properties.addEventListener('click', function (e) {
//
let cat_properties = _('.cat-properties').on('click', function (e) {
    if (!e.target.classList.contains('del-prop')) return;
    let del_btn = e.target;
    let name = del_btn.nextElementSibling.innerText;
    let id = del_btn.dataset.id;

    delProperty(id, name, del_btn);


});


//
//     });
// }

async function delProperty(id, name, self) {
    let obj = new preparedObj();
    obj.values = {};
    obj.values.shared = {};
    obj.action = "delProp";
    obj.values.shared.table = "props";
    obj.values.shared.id = id;

    let deleted = await post(obj.url, obj);

    let option = new Option(name, id);

    let select = _('#select_props');

    select.append(option);
    self.parentNode.remove()

}


