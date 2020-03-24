import {post} from "../../common/common"
import {preparedObj} from './a_category'

window.delProperty = async function (id) {
    let obj = new preparedObj();
    obj.values = {};
    obj.values.shared = {};
    obj.action = "delProp";
    obj.values.shared.table = "props";
    obj.values.shared.id = id;

    let deleted = await post(obj.url, obj);

};


// let catProps = document.querySelector('.cat-property');
//
// let obj = {};
// obj.token = document.querySelector('#token').value;
// obj.table = 'category';
// obj['model'] = 'category';
// obj.id = +document.querySelector('#id').innerText;
// obj.action = 'update';
// let shared = {};
// shared.table = 'props';
// shared.id = chosen.value;
// obj.values = {};
// obj.values.shared = shared;
//
// post('/adminsc', obj);

