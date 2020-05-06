import './common.sass'
import {MyJQ} from "./MyJQ"
import {validate} from "./validator"
import {popup} from "./popup"
import  ajax_body from "./body_ajax"
import img2svg from './img2svg'

const uniq = (array) => Array.from(new Set(array));

async function get(key) {
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}
function sleep(ms) {
    return new Promise(
        resolve => setTimeout(resolve, ms)
    );
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

function _(arg) {
    return new MyJQ(arg);
}

export {post, get, popup, uniq, ajax_body, _, validate, sleep, img2svg};
