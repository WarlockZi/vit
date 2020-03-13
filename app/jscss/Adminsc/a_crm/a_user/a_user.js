import './a_user.sass'

$('#users div[data-id]').on('change', function () {
    crudUser('UPDATE', $(this));
});
function crudUser(crud, target) {

    var rights = [];
    $('input:checkbox:checked').each(function () {
        rights.push($(this).data('id'));
    });
    rights = rights.join(',');

    var data = {
        token: $('#token').val(),
        model: 'user',
        field: 'field',
        action: crud,
        table: 'users',
        val: $.trim($(target).find('#id').text()),
        values: {
            conf: $(target).find('#conf').val(),
            email: $.trim($(target).find('#email').text()),
            sName: $.trim($(target).find('#s-name').text()),
            name: $.trim($(target).find('#name').text()),
            mName: $.trim($(target).find('#m-name').text()),
            phone: $.trim($(target).find('#phone').text()),
            bday: $.trim($(target).find('#bday').val()),
            hired: $.trim($(target).find('#hired').val()),
            fired: $.trim($(target).find('#fired').val()),
            extension: $.trim($(target).find('#extension').val()),
            rights: rights,
        },
    };
    debugger;
    var param = 'param=' + JSON.stringify(data);

//    debugger;
    $.ajax({
        url: '/adminsc/users',
        method: 'post',
        data: param,
        success: function (data) {
            debugger;
        },
        error: function (err) {
            debugger;
            alert('сервер ответил ошибкой' + err)
        }
//      post('/adminsc/users', data);
    });
}




$('.wrap').on('click', '.save', function () {
    var self = $(this)[0];
    if (self.classList.contains('new')) {
        crudUser('INSERT', $(this));
    }
    else {
        crudUser('UPDATE', $(this));
    }
});


$('.wrap').on('click', '.btnadd-user', function () {
    var data = {
        action: 'addUser'
    };
    post('/adminsc/users', data).then(function (str) {
        $('tbody').append(str);
    });
});




