import './common.sass';
import {MyJQ} from "./MyJQ";

const uniq = (array) => Array.from(new Set(array));

async function get(key) {
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

async function post(url, data) {
//      debugger;
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
    constructor(action='update') {
        this.action = action,
            this.token = _("meta[name = 'token']").toArray()[0].content,
            this.url = '/adminsc';
        return this;
    }

}
function _(arg) {
    return new MyJQ(arg);
}

export {post, get, uniq, ajax_body, _};
