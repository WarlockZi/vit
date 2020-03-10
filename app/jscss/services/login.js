import './login.sass'
import {post} from '../common'
/////////////////////////    Login     /////////////////////
window.onload = function () {

    document.querySelector("#login").addEventListener("click",
        async function (e) {
            e.preventDefault();
            let obj = {};
            obj.email = document.querySelector('input[type = email]').value,
                obj.pass = document.querySelector('input[type= password]').value,
                obj.token = document.querySelector("[name = 'token']").value;
            let res = await post('/user/login', obj);
            if  (res == "в кабинет"){
                window.location = '/user/cabinet';
            }else{
                window.location = '/adminsc';
            }
            // let overlay = document.createElement('div');
            // overlay.innerHTML = res;
            // document.querySelector('body').append(overlay);
            // overlay.querySelector('.overlay').style.display = "block";
        });
};