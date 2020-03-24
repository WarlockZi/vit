import {post} from "../../common/common";

let catProp = document.querySelectorAll('.catProp');
let arra = Array.from(catProp);
let cat_properties = arra.map(function (el) {
    return el.innerText;
});

let select = document.querySelector('#select_props');

function addParagraph(self, appendTo) {
    let catProp = document.createElement('div');
    catProp.classList.add('cat-property', 'row');
    let p = document.createElement('p');
    p.value = self.options[self.selectedIndex].value;
    p.innerHTML = self.options[self.selectedIndex].innerHTML;
    catProp.append(p);
    let delPropBtn = document.createElement('div');
    delPropBtn.title = 'удалить';
    delPropBtn.onclick = "delProperty(<?= $prop['id'] ?>)";
    delPropBtn.innerText = "X";
    catProp.append(delPropBtn);
    appendTo.append(catProp);


}

function delOption(select, chosen) {
    chosen.parentNode.removeChild(chosen);
}
function addProperty() {

}

select.addEventListener('change', function () {
    let chosen = (this.options[this.selectedIndex]);
    let catProps = document.querySelector('.cat-properties');

    if (cat_properties.indexOf(chosen.innerHTML) == -1) {
        addParagraph(this, catProps);
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
