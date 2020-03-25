import {post} from "../../common/common";

function cat_props_to_array(){
    let catProps = document.querySelectorAll('.del-prop');
    if (catProps) {
        // let arra = Array.prototype.slice.call(catProps);
        let array = Array.from(catProps);
        let l = array.length;
        let cat_properties  = array.map(function (el) {
            return el.innerText;
        });
        return cat_properties;
    }
    return [];

}


function addParagraph(self, appendTo) {
    let catProp = document.createElement('div');
    catProp.classList.add('cat-property', 'row');

    let option = self.options[self.selectedIndex];

    let delPropBtn = document.createElement('div');
    delPropBtn.title = 'удалить';
    delPropBtn.dataset.name = option.innerText;
    delPropBtn.dataset.id = option.value;
    delPropBtn.innerText = "X";
    catProp.append(delPropBtn);

    let p = document.createElement('p');
    p.value = self.options[self.selectedIndex].value;
    p.innerHTML = self.options[self.selectedIndex].innerHTML;
    catProp.append(p);

    appendTo.append(catProp);
}

function delOption(select, chosen) {
    chosen.parentNode.removeChild(chosen);
}

let select = document.querySelector('#select_props');

select.addEventListener('change', function () {
    let chosen = (this.options[this.selectedIndex]);
    let el_cat_props = document.querySelector('.cat-properties');
    let arr_cat_props = cat_props_to_array();

    if (arr_cat_props.indexOf(chosen.innerHTML) == -1) {
        addParagraph(this, el_cat_props);
        delOption(this, chosen);
    }

    let obj  = {};
    obj.token = document.querySelector('#token').value;
    obj.table = 'category';
    obj['model'] = 'category';
    obj.id = +document.querySelector('#id').innerText;
    obj.action = 'update';
    let shared = {};
    shared.table = 'props';
    shared.id = chosen.value;
    obj.values = {};
    obj.values.shared = shared;

    post( '/adminsc', obj);

});
