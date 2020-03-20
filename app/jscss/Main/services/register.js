import {post} from '../../common/common'

window.onload = function () {
    let reg = document.querySelector("[name = 'reg']");
    if (reg) {
        reg.addEventListener("click", async function (e) {
            e.preventDefault();
            let body
            [email] = document.querySelector('input[type = email]').value,
                body[password] = document.querySelector("input[type= password]").value,
                body[confPass] = document.querySelector("[name='confPass']").value,
                body[surName] = document.querySelector("[name='surName']").value,
                body[name] = document.querySelector("[name='name']").value,
                body[secName] = document.querySelector("[name='secName']").value,
                body[token] = document.querySelector("[name = 'token']").value;
            post('/user/register', body);

            //     formData = new FormData(),
            //     xhr = new XMLHttpRequest();
            // formData.append('email', email);
            // formData.append('password', password);
            // formData.append('confPass', confPass);
            // formData.append('surName', surName);
            // formData.append('name', name);
            // formData.append('secName', secName);
            // formData.append('token', token);
            // xhr.open('POST', PROJ + '/user/register', true);
            // xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            // xhr.send(formData);
            xhr.onreadystatechange = function (res) {
                '/user/register'
                if (xhr.readyState == 4 && xhr.status == 200) {

                    if (xhr.responseText) {

                        $('body').after(xhr.responseText);
                        var overlay = document.querySelector(".overlay"),
                            box = document.querySelector(".messageBox"),
                            clos = document.querySelector(".messageClose")
                        ;
                        overlay.addEventListener("click", function () {
                            overlay.autocomplete.display = 'none';
                            box.autocomplete.display = 'none';
                        });
                        clos.addEventListener("click", function () {
                            overlay.autocomplete.display = 'none';
                            box.autocomplete.display = 'none';
                        });
                    }
                } else {
                    if (xhr.status != 200) {
                    }
                }
            };
        });
    }
}