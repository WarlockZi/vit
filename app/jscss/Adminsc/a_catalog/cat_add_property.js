import {post, _} from "../../common/common";
import {a_category_ajax} from './a_category'

function cat_props_to_array() {
    let catProps = _('.del-prop');

    if (catProps) {
        let array = Array.from(catProps);
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

let select = _('#select_props').on('change', async function () {

    let chosen = (this.options[this.selectedIndex]);
    let el_cat_props = document.querySelector('.cat-properties');
    let arr_cat_props = cat_props_to_array();

    if (arr_cat_props.indexOf(chosen.innerHTML) == -1) {
        addParagraph(this, el_cat_props);
        delOption(this, chosen);
    }

    let obj = new a_category_ajax();
    obj.values = {};
    obj.values.shared = {};
    obj.values.shared.table = 'prop';
    obj.values.shared.id = chosen.value;

    await post('/adminsc', obj);

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
