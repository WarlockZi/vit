import './tags.sass'
import '../../common/common.sass'
import {_, post, ajax_body, popup} from '../../common/common'

// let id = _('#id').attr('data-id');

// pick tag from menu for edit
_('.tags-menu').on('click', function (e) {
    if (e.target.classList.contains('name')) {
        let card = e.target.parentNode;
        let del = card.querySelector('.del');

        let id = del.dataset.id;
        let name = e.target.innerText;
        _('.tag-wrap .card #name').text(name);
        _('.tag-wrap .card #id').attr('data-id', id );
    }
});

//// save tag
_('.tag-save').on('click', save);

//// delete tag
_('.tag-del').on('click', function () {
    deleteTag(this);
});
_('.tags-menu').on('click', function (e) {
    (e.target.className == 'del') && deleteTag(e.target);
});


// toggle radio shared
_('.shared').on('click', function (e) {
    if (!this.classList.contains('shared')) return;
    let arShared = this.parentNode.querySelectorAll('.shared');
    Array.from(arShared).forEach((i) => {
        if (i.classList.contains('checked'))
            i.classList.toggle('checked');
    });
    this.classList.toggle('checked');
    _('#id').attr('data-id') && save();
});


function addMenuItem(id, name) {
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
    data.id = self.dataset.id ? self.dataset.id : self.parentNode.dataset.id;
    let res = await post(null, data);
    res === 'deleted' && popup(['Тэг удален']);
    self.parentNode.remove();
}

async function save() {
    let name = _('#name').text();
    if (!name) return;
    let data = new ajax_body('tag', 'create');
    let id = _('#id').attr('data-id');
    if (!id) { //create
        let i = await post(null, data);
        addMenuItem(i, name);
        _('#name').text('');
        clearField();
    } else {//update
        data = new ajax_body();
        let i = await post(null, data);

    }
}

async function clearField(self) {

}
