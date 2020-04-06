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
            reject(Error("Network Error"));
        };
        req.onload = function () {
            resolve(req.response);
        };
    });
}

class ajax_body {
    constructor(table = 'user', action = 'update') {
        this.url = '/adminsc',
        this.action = action,
            this.token = _("meta[name = 'token']").toArray()[0].content,
            this.table = table,
            this.model = table,
            this.values = {};
            this.values.shared = {};
        return this;
    }
}

function _(arg) {
    return new MyJQ(arg);
}

export {post, get, uniq, ajax_body, _};
