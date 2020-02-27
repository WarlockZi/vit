/*! For license information please see login.js.LICENSE.txt */
!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s="./app/jscss/User/user_login.js")}({"./app/jscss/User/user_login.js":function(e,t,n){"use strict";n.r(t);var r=n("./app/jscss/common.js");window.onload=function(){document.querySelector("body").addEventListener("click",(function(e){"messageClose"===e.target.className&&(window.location.href="/user/cabinet")})),document.querySelector("#login").addEventListener("click",(async function(e){e.preventDefault();let t={};t.email=document.querySelector("input[type = email]").value,t.pass=document.querySelector("input[type= password]").value,t.token=document.querySelector("[name = 'token']").value;let n=await Object(r.post)("/user/login",t),o=document.createElement("div");o.innerHTML=n,document.querySelector("body").append(o),o.querySelector(".overlay").style.display="block"}))}},"./app/jscss/common.js":function(e,t,n){"use strict";n.r(t),n.d(t,"post",(function(){return s})),n.d(t,"get",(function(){return o})),n.d(t,"uniq",(function(){return r}));n("./app/jscss/common.sass");const r=e=>Array.from(new Set(e));async function o(e){var t=window.location.search;return!!(t=t.match(new RegExp(e+"=([^&=]+)")))&&t[1]}async function s(e,t){return new Promise((function(n,r){var o=new XMLHttpRequest;o.open("POST",e),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),o.setRequestHeader("Content-Type","application/json"),o.setRequestHeader("X-Requested-With","XMLHttpRequest"),o.send("param="+JSON.stringify(t)),o.onerror=function(){r(Error("Network Error"))},o.onload=function(){n(o.response)}}))}},"./app/jscss/common.sass":function(e,t,n){var r=n("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),o=n("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common.sass");"string"==typeof(o=o.__esModule?o.default:o)&&(o=[[e.i,o,""]]);var s={insert:"head",singleton:!1},i=(r(o,s),o.locals?o.locals:{});e.exports=i},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common.sass":function(e,t,n){},"./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":function(e,t,n){"use strict";var r,o=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},s=function(){var e={};return function(t){if(void 0===e[t]){var n=document.querySelector(t);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(e){n=null}e[t]=n}return e[t]}}(),i=[];function a(e){for(var t=-1,n=0;n<i.length;n++)if(i[n].identifier===e){t=n;break}return t}function c(e,t){for(var n={},r=[],o=0;o<e.length;o++){var s=e[o],c=t.base?s[0]+t.base:s[0],u=n[c]||0,l="".concat(c," ").concat(u);n[c]=u+1;var d=a(l),f={css:s[1],media:s[2],sourceMap:s[3]};-1!==d?(i[d].references++,i[d].updater(f)):i.push({identifier:l,updater:v(f,t),references:1}),r.push(l)}return r}function u(e){var t=document.createElement("style"),r=e.attributes||{};if(void 0===r.nonce){var o=n.nc;o&&(r.nonce=o)}if(Object.keys(r).forEach((function(e){t.setAttribute(e,r[e])})),"function"==typeof e.insert)e.insert(t);else{var i=s(e.insert||"head");if(!i)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");i.appendChild(t)}return t}var l,d=(l=[],function(e,t){return l[e]=t,l.filter(Boolean).join("\n")});function f(e,t,n,r){var o=n?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(e.styleSheet)e.styleSheet.cssText=d(t,o);else{var s=document.createTextNode(o),i=e.childNodes;i[t]&&e.removeChild(i[t]),i.length?e.insertBefore(s,i[t]):e.appendChild(s)}}function p(e,t,n){var r=n.css,o=n.media,s=n.sourceMap;if(o?e.setAttribute("media",o):e.removeAttribute("media"),s&&btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(s))))," */")),e.styleSheet)e.styleSheet.cssText=r;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(r))}}var m=null,y=0;function v(e,t){var n,r,o;if(t.singleton){var s=y++;n=m||(m=u(t)),r=f.bind(null,n,s,!1),o=f.bind(null,n,s,!0)}else n=u(t),r=p.bind(null,n,t),o=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(n)};return r(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;r(e=t)}else o()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=o());var n=c(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var r=0;r<n.length;r++){var o=a(n[r]);i[o].references--}for(var s=c(e,t),u=0;u<n.length;u++){var l=a(n[u]);0===i[l].references&&(i[l].updater(),i.splice(l,1))}n=s}}}}});
//# sourceMappingURL=login.js.map