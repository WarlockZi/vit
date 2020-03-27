import {post} from "../../common/common";


function cat_props_to_array() {
    let catProps = document.querySelectorAll('.del-prop');
    if (catProps) {
        // let arra = Array.prototype.slice.call(catProps);
        let array = Array.from(catProps);
        let l = array.length;
        let cat_properties = array.map(function (el) {
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
    delPropBtn.dataset.id = option.value;
    delPropBtn.classList.add('del-prop');
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

select.addEventListener('change', async function () {
    let chosen = (this.options[this.selectedIndex]);
    let el_cat_props = document.querySelector('.cat-properties');
    let arr_cat_props = cat_props_to_array();

    if (arr_cat_props.indexOf(chosen.innerHTML) == -1) {
        addParagraph(this, el_cat_props);
        delOption(this, chosen);
    }

    let obj = {};
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

    let deleted = await post('/adminsc', obj);

});

class prop_printer {
    constructor(el, className) {
        this.el = el;
        this.className = className;
    }
    toHTML() {
        return `
            <div class="cat-property row">
               <div title="удалить" data-id="">X</div>
               <p></p>
            </div>
        `
    }
}

var a_category_prop = {
    constructor(wrapper_class) {
        this.wrapper = new prop_printer('wrapper', 'wrapper_class');
    },
    foo: function () {
    }
};
