import './common.sass';
import '../components/popup/popup.sass';
import {MyJQ} from "./MyJQ";
// import {Validator} from "./Validator";

const uniq = (array) => Array.from(new Set(array));

async function get(key) {
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

function post(url = '/adminsc', data) {
    return new Promise(function (resolve, reject) {
        var req = new XMLHttpRequest();
        req.open('POST', url);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        req.setRequestHeader('Content-Type', 'application/json');
        req.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        req.send('param=' + JSON.stringify(data));
        req.onerror = function () {
            reject(Error("Error from post req Common/common"));
        };
        req.onload = function () {
            resolve(req.response);
        };
    });
}

class ajax_body {
    constructor(table = 'user', action = 'read') {
        this.url = '/adminsc',
            this.action = action,
            this.token = _("meta[name = 'token']").toArray()[0].content,
            this.table = table,
            this.model = table,
            this.values = {};

        this.ownFields();

        if (_('.shared').objects.length) {
            this.sharedFilds();
        }
        return this;
    }

    ownFields() {
        let vals = _('.field').objects;
        for (var i of vals) {
            this.values[`${i.id}`] = _(i).fullfill();
        }
    };

    sharedFilds() {

        let ids = [];
        let right = _('.shared.right:checked').objects;
        for (let i of right) {
            ids.push(+i.id);
        }
        this.values.shared = {};
        this.values.shared[`right`] = ids;
    }
}

async function popup(message) {
    let str = '';
    for (let mes in message) {
        str += `<p>${message[mes]}</p>`
    }
    // str = "<p>Пользователь сохранен</p>"

    let popup = document.createElement('div');
    popup.classList.add('popup');
    popup.innerHTML = str
    let body = document.querySelector('body');
    body.append(popup);

    let d = await setTimeout(function () {
        popup.style.opacity = 1;
    }, 20);

    d = await setTimeout(function () {
        popup.style.opacity = 0;
    }, 118200);

    return popup;
}

function _(arg) {
    return new MyJQ(arg);
}

function validation(type, str, self) {
    if (type === 'email') {
        if (str.length < 5) throw Error('Почта не менее 5 символов');
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2.3}$/;
        if(str.match(emailPattern)){
            self.classList.add('valid');
        }else{
            self.classList.add('invalid');
        }

    } else if (type === 'password') {

        var passwordPattern = /^(a-zA-Z0-9_\-])+$/;
    }
    var namePattern = /^[а-яА-Яa-zA-Z0-9!%&@#$\^*?_~+]+$/;


}

export {post, get, popup, uniq, ajax_body, _, validation};
