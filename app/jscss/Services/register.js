import {_, ajax_body, post, popup} from '../common/common'

_(".register").on("click", async function (e) {

    let body = new ajax_body('user', 'register');
    // body.model = 'user';

    let res = await post('/user/register', body);
    if (res === 'email occupied') {
        popup(['Указанный email занят.']);
    } else if (res === 'confirm email') {
        popup(['Зайдите на email и перейдите по указанной там ссылке для активизации']);
    }
    popup(['Регистрация успешна!', 'все хорошо!']);


    // var overlay = document.querySelector(".overlay"),
    //     box = document.querySelector(".messageBox"),
    //     clos = document.querySelector(".messageClose")
    // ;
    // overlay.addEventListener("click", function () {
    //     overlay.autocomplete.display = 'none';
    //     box.autocomplete.display = 'none';
    // });
    // clos.addEventListener("click", function () {
    //     overlay.autocomplete.display = 'none';
    //     box.autocomplete.display = 'none';
    // });
});
