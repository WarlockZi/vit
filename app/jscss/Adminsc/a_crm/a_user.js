import './a_user.sass'
import {_, post, ajax_body, popup} from './../../common/common'

debugger;
_('.save_user').on('click', async (e)=> {
    var body = new ajax_body('user', 'update');
    body.id =  _('#id').text();

    let res = await post('/adminsc', body);
    if (res === 'ajax done'){
        let body = document.querySelector('body');
        body.append(popup(['Пользователь сохранен', 'Все хорошо!']));
    }
});


// _('.wrap').on('click', '.save', function () {
//     var self = _(this)[0];
//     if (self.classList.contains('new')) {
//         crudUser('INSERT', _(this));
//     }
//     else {
//         crudUser('UPDATE', _(this));
//     }
// });
//
// _('.wrap').on('click', '.btnadd-user', function () {
//     var data = {
//         action: 'addUser'
//     };
//     post('/adminsc/users', data).then(function (str) {
//         _('tbody').append(str);
//     });
// });




