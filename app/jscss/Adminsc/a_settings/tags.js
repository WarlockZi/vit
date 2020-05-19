import './tags.sass'
import '../../common/common.sass'
import {_, post, ajax_body, popup} from '../../common/common'

let id = _('#id').text();

//// save tag
_('.tag-save').on('click', async function () {
    let name = _('#name').text();
    if (!name) return;
    let data = new ajax_body('tag', 'create');
    if (typeof id === 'string') { //create
        let i = await post(null, data);
        addMenuItem(i, name);
        _('#name').text('');
        clearField();
    }else{//update
        let i = await post(null, data);
        id &&
        addMenuItem(i, name);
    }
});

//// delete tag
_('.tag-del').on('click', function (){
    deleteTag (this);
});
_('.tags-menu').on('click', function (e){
    (e.target.className == 'del')&& deleteTag (e.target);
});




function addMenuItem(id, name){
    let card = document.createElement('div');
    card.classList.add('card');

    let tagName = document.createElement('div');
    tagName.innerText = name;

    let del = document.createElement('div');
    del.innerText = 'X';
    del.classList.add('del');
    del.dataset.id = id;

    card.append(tagName);
    card.append(del);
    let tagsMenu = _('.tags-menu')[0];
    tagsMenu.append(card);
}

async function deleteTag(self) {
    let data = new ajax_body('tag', 'delete');
    data.id = self.dataset.id?self.dataset.id:self.parentNode.dataset.id;
    let res =  await post(null, data);
    res==='deleted' && popup(['Тэг удален']);
    self.parentNode.remove();
}

async function clearField(self) {

}