import './login.sass'
import {post} from '../../common/common'
/////////////////////////    Login     /////////////////////
window.onload = function () {

    let login_button = document.querySelector("#login");
    if (login_button) {
        login_button.addEventListener("click",
            async function (e) {
                e.preventDefault();
                let obj = {};
                obj.email = document.querySelector('input[type = email]').value,
                    obj.pass = document.querySelector('input[type= password]').value,
                    obj.token = document.querySelector("[name = 'token']").value;
                let res = await post('/user/login', obj);
                if (res == "в кабинет") {
                    window.location = '/user/cabinet';
                } else {
                    window.location = '/adminsc';
                }
            });
    }
};