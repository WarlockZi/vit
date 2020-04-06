import './a_user.sass'
import {_, post, ajax_body} from './../../../common/common'


_('.save_user').on('click', function (e) {
    debugger;
    let target = e.target;
    crudUser();
});

async function crudUser() {

    var rights = [];
    rights['table'] = 'right';
    let right = _('.js-shared-right:checked').objects;
    for (let i of right){
        rights.push(+i.id);
    }
    rights['ids'] = rights;

    let vals = _('.value').objects;
    let shared = _('.shared').objects;


    var body = new ajax_body('user', 'update');

    for (var i of vals){
        let id = i.id;
        body.values[`${id}`] = _(i).fullfill();
    }
    body.values.shared['rights'] = rights;


    body.id =  _('#id').text(),
        // body.values.conf = _('#conf').value(),
        // body.values.email = _('#email').value(),
        // body.values.sName = _('#s-name').value(),
        // body.values.name = _('#name').text(),
        // body.values.mName = _('#m-name').text(),
        // body.values.phone = _('#phone').text(),
        // body.values.bday = _('#bday').text(),
        // body.values.hired = _('#hired').text(),
        // body.values.fired = _('#fired').text(),
        // body.values.extension = _('#extension').text(),
        // body.values.shared.table = 'right';
        // body.values.shared.ids = rights;

    await post('/adminsc/users', body);

}




_('.wrap').on('click', '.save', function () {
    var self = _(this)[0];
    if (self.classList.contains('new')) {
        crudUser('INSERT', _(this));
    }
    else {
        crudUser('UPDATE', _(this));
    }
});


_('.wrap').on('click', '.btnadd-user', function () {
    var data = {
        action: 'addUser'
    };
    post('/adminsc/users', data).then(function (str) {
        _('tbody').append(str);
    });
});




