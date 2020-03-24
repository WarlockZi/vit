import {post} from "../../common/common";


let catPropDel = document.querySelector('.cat-prop_del');
catPropDel.addEventListener('click', delProperty);

function delProperty() {

        let propId = this.dataset['id'];


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

