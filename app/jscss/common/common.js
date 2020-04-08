import './common.sass';
import {MyJQ} from "./MyJQ";

const uniq = (array) => Array.from(new Set(array));

async function get(key) {
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

function post(url, data) {
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
        this.values.shared = {};

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
        this.values.shared[`right`] = ids;
    }
}

function popup(message) {
    let str = '';
    for (let mes in message) {
        str += "<p>${mes}</p>"
    }

    let popup = document.createElement('div');
    popup.classList.add('popup');
    popup.innerHTML(str);

    return popup;
}

function _(arg) {
    return new MyJQ(arg);
}

export {post, get, uniq, ajax_body, _};
