import {_, ajax_body, post, popup} from '../common/common'

_(".register").on("click", async function (e) {
    e.preventDefault();
    let body = new ajax_body('user', 'create' );

    await post(null, body);
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
