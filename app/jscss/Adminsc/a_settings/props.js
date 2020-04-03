import './props.sass'
import {ajax_body, _} from "../../common/common";

// show first prop card
let f = _('.prop-container');
if (!f.objects.length == 0) {
    f.first().classList.add('active');
}

// toggle prop cards visibility
_('.prop').on('click', function () {
    _('.active').removeClass('active');
    let row = this.dataset.id;
    _(`[data-prop-id='${row}']`).addClass('active');
});

// fill out ajax body
class props_ajax_body extends ajax_body {
    constructor(action) {
        super(action);
        this.model = 'prop';
        this.table = 'prop';
        this.id = +document.querySelector('#id').innerText;
        this.action = action ? action : 'update';
        return this;
    }
}

// изменение названия свойства / добавление
_('.property-block').on('input', '.property-name', function () {
    var props_ajax_body = new props_ajax_body(this, 'update');
    props_ajax_body.pkeyVal = this.getAttribute('data-id');
    props_ajax_body.values.name = this.value.trim();

    if (this.parentNode.classList.contains('new')) {
        var clone = this.parentNode.cloneNode(true);
        clone.innerHTML = '';
        var parent = this.parentNode.parentNode;
        parent.append(clone);
        this.classList.remove('new');
    }

//      debugger;
    setTimeout(function () {
        post(props_ajax_body.url, props_ajax_body)
    }, 800);
});
// изменение селекта
_('select.type').on('change', function () {
    var props_ajax_body = new props_ajax_body(this, 'update');
    props_ajax_body.pkeyVal = this.getAttribute('data-id');
    props_ajax_body.values.type = this[this.selectedIndex].value;
    post(props_ajax_body.url, props_ajax_body);
});

// изменение сортировки
_('.property-block').on('input', '.sort', function () {
//      debugger;
    var props_ajax_body = new props_ajax_body(this, 'update');
    props_ajax_body.pkeyVal = this.getAttribute('data-id');
    props_ajax_body.values.sort = this.innerHTML;
    post(props_ajax_body.url, props_ajax_body);
});

// добавление значения 
_('.property-block').on('input', '.value, .add-prop-val', function () {

    let val = $(this).text(),
        id = $(this).parent().parent().parent().data('prop'),
        str = $(this).parent().find('span'),
        vals = new Set(str),
        dd = [];

    vals.forEach(function (item, same, set) {
        if (item.innerText)
            dd.push(item.innerText);
    });

    val = dd.join(',').trim(',');

    debugger;
    if (this.classList.contains('add-prop-val')) {
        var clone = this.cloneNode(true);
        clone.innerHTML = '';
        this.classList.remove('add-prop-val');
        var el = this.parentNode.querySelector('.new');
        var parent = this.parentNode;
        parent.insertBefore(clone, el);
    }

    post(props_ajax_body.url, props_ajax_body);

});




