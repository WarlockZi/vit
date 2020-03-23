import './a_category.sass'
import {post, uniq} from '../../common/common'

let catProps = document.querySelector('.properties');
let catProp = document.querySelectorAll('.catProp');
let arra = Array.from(catProp);
let a = arra.map(function(el) {
    return el.innerText
});
let select = document.querySelector('#props');
console.log(a);

function addParagraph(self) {
    let p = document.createElement('p');
    p.value = self.options[self.selectedIndex].value;
    p.innerHTML = self.options[self.selectedIndex].innerHTML;
    catProps.append(p);
}

function delOption(select, chosen) {
    chosen.parentNode.removeChild(chosen);
    select.options[select.selectedIndex] = 0;
}

select.addEventListener('change', function() {
    let chosen = (this.options[this.selectedIndex]);

    if (a.indexOf(chosen.innerHTML) == -1) {
        alert('попали');
        addParagraph(this);
        delOption(this, chosen);
    }
})







//
// post.token = document.querySelector('#token').value;
// post.url = '/adminsc';
// post.action = action ? action : 'update';
//
// let category = Object.create();
// category.model = 'category';
// category.pkey = 'id';
// category.pkeyVal = null;
// category.fields = {};
//
// // изменение  / добавление названия значения
// document
//     .querySelector('.category-update-btn')
//     .addEventListener('click', function () {
//
//         var Obj = new obj('update');
//         Obj.pkeyVal = document.querySelector('#id').value;
//
//         Obj.fields.name = document.querySelector('#name').value;
//         Obj.fields.alias = document.querySelector('#alias').value;
//         Obj.fields.title = document.querySelector('#title').value;
//         Obj.fields.keywords = document.querySelector('#keywords').value;
//         Obj.fields.description = document.querySelector('#description').value;
//         Obj.fields.core = document.querySelector('#core').value;
//         Obj.fields.text = document.querySelector('#text').value;
//         var props = document.querySelector('.properties select option:selected');
// //      debugger;
//         var prop = [];
//
//         for (let val of props) {
//             if (val.value)
//                 prop.push(val.value);
//         }
//         prop = uniq(prop);
//
//         Obj.fields.props = prop.join(',');
//         setTimeout(function () {
//             post(Obj.url, Obj)
//         }, 800);
//
//     });
//
//
// // создание нового селекта
// $('.properties.column').on('change', '.new-prop', function () {
//     let val = $(this).find('option:selected').val();
//     let clone = $(this).clone(true);
//     $(this).removeClass('new-prop');
//     $(clone).find('option[value = ' + val + ']').remove();
//     $('.properties.column option[value= ' + val + ']').not($(this).find('option:selected')).remove();
//     $(clone).insertBefore($('.add-property'));
//
//     var Obj = new obj('update');
//     Obj.pkeyVal = $('#id').value;
//     var props = $('.properties select option:selected');
//     var prop = [];
//
//     for (let val of props) {
//         if (val.value)
//             prop.push(val.value);
//     }
//     prop = uniq(prop);
//
//     Obj.fields.props = prop.join(',');
//     setTimeout(function () {
//         post(Obj.url, Obj)
//     }, 800);
//
// });
//
// // редактирование текущего  селекта
// $('.properties.column').on('change', 'select', function () {
//     var Obj = new obj('update');
//     Obj.pkeyVal = $('#id').value;
//     var props = $('.properties select option:selected');
//     debugger;
//     var prop = [];
//
//     for (let val of props) {
//         if (val.value)
//             prop.push(val.value);
//     }
//     prop = uniq(prop);
//     Obj.fields.props = prop.join(',');
//
//     Obj.fields.props = prop.join(',');
//     setTimeout(function () {
//         post(Obj.url, Obj)
//     }, 800);
//
//
// });
