import {post, _} from "../../common/common"
import {a_category_ajax} from './a_category'
// import {_} from '../../common/MyJQ'


let cat_properties = _('.cat-properties').on('click', function (e) {
    if (!e.target.classList.contains('del-prop')) return;
    let del_btn = e.target;
    let name = del_btn.nextElementSibling.innerText;
    let id = del_btn.dataset.id;

    delProperty(id, name, del_btn);


});

async function delProperty(id, name, self) {
    let req = new a_category_ajax();
    req.values = {};
    req.values.shared = {};
    req.action = "delProp";
    req.values.shared.table = "props";
    req.values.shared.id = id;

    let deleted = await post(req.url, req);

    let option = new Option(name, id);

    let select = _('#select_props');

    select.append(option);
    self.parentNode.remove()

}


