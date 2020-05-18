import './tags.sass'
import {_, post, ajax_body, popup} from '../../common/common'

let id = _('#id');

//// save tag
_('.tag-save').on('click', async function () {
    let data = new ajax_body('tag', 'create');
    if (typeof id === 'string') { //create
        let id = await post(null, data);
        addMenuItem(id, _('.name')[0]);
    }else{//update
        let i = await post(null, data);
        let name = _('.name').text();
        id &&
        addMenuItem(i, name);
    }
});

//// delete tag
_('.tag-del').on('click', async function () {
    let data = new ajax_body('tag', 'delete');
    data.id = this.dataset.id;
    let res =  await post(null, data);
    alert(res);
    res==='deleted' && popup(['Тэг удален']);

});

function addMenuItem(id, name){
    let card = document.createElement('div');
    card.classList.add('card');
    let tagName = document.createElement('div');
    tagName.innerText = name;
}

