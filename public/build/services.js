/*! For license information please see services.js.LICENSE.txt */
!function(e){var s={};function t(o){if(s[o])return s[o].exports;var n=s[o]={i:o,l:!1,exports:{}};return e[o].call(n.exports,n,n.exports,t),n.l=!0,n.exports}t.m=e,t.c=s,t.d=function(e,s,o){t.o(e,s)||Object.defineProperty(e,s,{enumerable:!0,get:o})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,s){if(1&s&&(e=t(e)),8&s)return e;if(4&s&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(t.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&s&&"string"!=typeof e)for(var n in e)t.d(o,n,function(s){return e[s]}.bind(null,n));return o},t.n=function(e){var s=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(s,"a",s),s},t.o=function(e,s){return Object.prototype.hasOwnProperty.call(e,s)},t.p="",t(t.s="./app/jscss/Main/Services/services.js")}({"./app/jscss/Main/Services/about.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/about.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/Services/forgot.js":function(e,s,t){"use strict";t.r(s);var o=t("./app/jscss/common/common.js");Object(o._)("#email").on("keyup",(function(){Object(o.validate)("email",Object(o._)("#email").val(),this)})),Object(o._)(".forgot").on("click",(async function(){var e={action:"email",model:"adminsc"};e.email=Object(o._)("#email").val(),await Object(o.post)("adminsc",e),Object(o.popup)(["На указанную почту отправлено письмо со ссылкой для восстановления пароля"])}))},"./app/jscss/Main/Services/login.js":function(e,s,t){"use strict";t.r(s);t("./app/jscss/Main/Services/login.sass");var o=t("./app/jscss/common/common.js");Object(o._)("#password").on("keyup",(function(){Object(o.validate)("password",this.value,this)})),Object(o._)(".login").on("click",(async function(e){let s=new o.ajax_body;s.model="";let t=await Object(o.post)("/user/login",s);"в админку"===t?window.location="/adminsc":"в кабинет"===t&&(window.location="/")}))},"./app/jscss/Main/Services/login.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/login.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/Services/map.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/map.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/Services/profile.js":function(e,s,t){"use strict";t.r(s);t("./app/jscss/Main/Services/profile.sass");var o=t("./app/jscss/common/common.js");Object(o._)(".save_profile").on("click",async e=>{var s=new o.ajax_body("user","update");s.id=Object(o._)("#id").text();await Object(o.post)("/user/profile",s)})},"./app/jscss/Main/Services/profile.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/profile.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/Services/register.js":function(e,s,t){"use strict";t.r(s);var o=t("./app/jscss/common/common.js");Object(o._)(".register").on("click",(async function(e){let s=new o.ajax_body("user","register"),t=await Object(o.post)("/user/register",s);return"email occupied"===t?Object(o.popup)(["Указанный email занят.","Попробуйте указать другой"],!1):"confirm email"===t?Object(o.popup)(["Зайдите на email и перейдите по указанной там ссылке для активизации"]):void 0}))},"./app/jscss/Main/Services/services.js":function(e,s,t){"use strict";t.r(s);t("./app/jscss/Main/header/header.sass"),t("./app/jscss/Main/footer.sass"),t("./app/jscss/Main/Services/about.sass"),t("./app/jscss/Main/Services/map.sass"),t("./app/jscss/Main/header/autocomplete/autocomplete.js"),t("./app/jscss/common/coockie/coockie.js"),t("./app/jscss/common/show_hide_pass.js"),t("./app/jscss/Main/Services/register.js"),t("./app/jscss/Main/Services/login.js"),t("./app/jscss/Main/Services/profile.js"),t("./app/jscss/Main/Services/forgot.js")},"./app/jscss/Main/footer.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/footer.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/header/autocomplete/autocomplete.js":function(e,s,t){"use strict";t.r(s);t("./app/jscss/Main/header/autocomplete/autocomplete.sass"),t("./app/jscss/Main/header/autocomplete/showSearchInput.js");function o(e){let s=document.querySelector(".result-search ul");s&&e.target!==s&&"autocomplete"!==e.target.id&&(s.remove(),document.querySelector("#autocomplete").value="",document.querySelector(".overlay").remove(),document.querySelector(".search-wrap").classList.remove("search-show"))}s.default=window.autoComplete=async function(e){var s=document.querySelector(".result-search");if(e){var t=await async function(e){let s=await fetch("/search?q="+e);return await s.json()}(e);s.innerHTML=function(e){var s="<ul>";return e.forEach(e=>{s+="<li>"+`<a href = '${e.url}'>`+'<div class="pic">'+`<img src='/pic/${e.pic}'`+`alt='${e.value}'>`+'</div><div class="result-search-text">'+e.value+"</div></li>"}),s+="</ul>"}(t),function(){if(!document.querySelector(".overlay")){let e=document.createElement("div");e.classList.add("overlay"),e.style.display="block",e.style.zIndex="5",document.querySelector("body").append(e)}}(),document.querySelector("body").addEventListener("click",(function(e){o(e)}))}else s.innerHTML=""}},"./app/jscss/Main/header/autocomplete/autocomplete.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/header/autocomplete/autocomplete.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/Main/header/autocomplete/showSearchInput.js":function(e,s,t){"use strict";t.r(s);var o=t("./app/jscss/common/common.js");let n=Object(o._)(".search-wrap")[0];Object(o._)(".find-wrap")[0].addEventListener("click",(function(){n.style.transition="transform .2s ease",n.classList.toggle("search-show")})),Object(o._)("body")[0].addEventListener("click",(function(e){let s=Object(o._)(".search-wrap")[0];"find"===!e.target.className&&s.classList.remove("search-show")}))},"./app/jscss/Main/header/header.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/header/header.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/common/MyJQ.js":function(module,__webpack_exports__,__webpack_require__){"use strict";function MyJQ(arg){if("string"==typeof arg)return new MyJQ(Array.prototype.slice.call(document.querySelectorAll(arg)));if("string"!=typeof arg&&void 0!==arg){for(var i in arg)this[i]=arg[i];this.objects=arg,this.length=arg.length}return this.updateEnum=function(){for(var e in this)1*e!=e&&Object.defineProperty(this,e,{value:this[e],enumerable:!1,writable:!1,configurable:!1})},this.on=function(e,s){for(var t=0;t<this.objects.length;t++)this.objects[t].addEventListener(e,s);return this},this.addClass=function(e){for(var s=0;s<this.objects.length;s++)this.objects[s].classList.add(e);return this},this.removeClass=function(e){for(var s=0;s<this.objects.length;s++)this.objects[s].classList.remove(e);return this},this.text=function(){return this.objects[0].innerText},this.val=function(){return this.objects[0].value},this.append=function(e){return this.objects[0].append(e)},this.remove=function(){return this.objects[0].style.display="none"},this.show=function(){return this.objects[0].style.display="flex"},this.first=function(){return this.objects[0]},this.css=function(a,b){if(!b)return eval("this.objects[0].style."+a);for(var i in this.objects)eval("this.objects["+i+"].style."+a+"='"+b+"';");return this},this.toArray=function(){return this.objects},this.fullfill=function(){if("INPUT"===this.tagName){if("text"===this.type)return this.value;if("checkbox"===this.type)return this.checked?1:0;if("email"===this.type||"password"===this.type)return this.value;if("date"===this.type)return""===this.value?null:this.value}else if("P"!==this.tagName)return"SELECT"===this.tagName?this.options[this.selectedIndex].value:this.innerText},this}__webpack_require__.r(__webpack_exports__),__webpack_require__.d(__webpack_exports__,"MyJQ",(function(){return MyJQ})),MyJQ.prototype=new function(e){this.splice=function(){}}},"./app/jscss/common/body_ajax.js":function(e,s,t){"use strict";t.r(s);var o=t("./app/jscss/common/common.js");s.default=class{constructor(e="user",s="read"){return this.url="/adminsc",this.action=s,this.token=Object(o._)("meta[name = 'token']").toArray()[0].content,this.table=this.model=e,this.values={},this.ownFields(),Object(o._)(".shared").objects.length&&this.sharedFilds(),this}ownFields(){let e=Object(o._)(".field").objects;for(var s of e)this.values[`${s.id}`]=Object(o._)(s).fullfill()}sharedFilds(){let e=[],s=Object(o._)(".shared.right:checked").objects;for(let t of s)e.push(+t.id);this.values.shared={},this.values.shared.right=e}}},"./app/jscss/common/common.js":function(e,s,t){"use strict";t.r(s),t.d(s,"post",(function(){return u})),t.d(s,"get",(function(){return l})),t.d(s,"uniq",(function(){return r})),t.d(s,"_",(function(){return p})),t.d(s,"sleep",(function(){return d}));t("./app/jscss/common/common.sass");var o=t("./app/jscss/common/MyJQ.js"),n=t("./app/jscss/common/validator.js");t.d(s,"validate",(function(){return n.validate}));var i=t("./app/jscss/common/popup.js");t.d(s,"popup",(function(){return i.popup}));var a=t("./app/jscss/common/body_ajax.js");t.d(s,"ajax_body",(function(){return a.default}));var c=t("./app/jscss/common/img2svg.js");t.d(s,"img2svg",(function(){return c.default}));const r=e=>Array.from(new Set(e));async function l(e){var s=window.location.search;return!!(s=s.match(new RegExp(e+"=([^&=]+)")))&&s[1]}function d(e){return new Promise(s=>setTimeout(s,e))}function u(e="/adminsc",s){return new Promise((function(t,o){var n=new XMLHttpRequest;n.open("POST",e),n.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),n.setRequestHeader("Content-Type","application/json"),n.setRequestHeader("X-Requested-With","XMLHttpRequest"),n.send("param="+JSON.stringify(s)),n.onerror=function(){o(Error("Error from post req Common/common"))},n.onload=function(){t(n.response)}}))}function p(e){return new o.MyJQ(e)}},"./app/jscss/common/common.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/common.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/common/coockie/coockie.js":function(e,s,t){"use strict";t.r(s);t("./app/jscss/common/coockie/coockie.sass");var o;function n(){const e=new Date;e.setTime(e.getTime()+864e5),document.cookie="cn=1; path=/; SameSite=lax; expires="+e,document.querySelector("#cookie-notice").style.bottom="-35%"}!function(){let e=document.createElement("div");e.id="cookie-notice",e.role="cookie",e.innerHTML='Мы используем cookie-файлы для наилучшего представлениянашего сайта. Продолжая использовать этот сайт,вы соглашаетесь с использованием cookie-файлов.<span id="cn-accept-cookie">Соглашаюсь</span> <a href="/about/politicaconf">Подробнее</a>',document.querySelector("footer").append(e),document.querySelector("#cn-accept-cookie").addEventListener("click",n)}(),function(e){if(e)return!1;setTimeout((function(){document.querySelector("#cookie-notice").style.bottom="0"}),500)}((o="cn",!!document.cookie.match("(^|;)?"+o+"=([^;]*)")||null))},"./app/jscss/common/coockie/coockie.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/coockie/coockie.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/common/img2svg.js":function(e,s,t){"use strict";t.r(s),t.d(s,"default",(function(){return n}));var o=t("./app/jscss/common/common.js");async function n(){let e=Array.from(Object(o._)("img.img-svg"));await Promise.all(e.map(async e=>{let s=e.getAttribute("class");var t=e.src;let o=await fetch(t),n=await o.text(),i=await function(e){var s=null;if(window.DOMParser){let t=new DOMParser;s=t.parseFromString(e,"text/xml")}else(s=new ActiveXObject("Microsoft.XMLDOM")).async="false",s.loadXML(e);return s}(n),a=await i.getElementsByTagName("svg")[0];a.setAttribute("class",s),e.parentNode.replaceChild(a,e)}))}},"./app/jscss/common/popup.js":function(e,s,t){"use strict";t.r(s),t.d(s,"popup",(function(){return n}));t("./app/jscss/common/popup.sass");var o=t("./app/jscss/common/common.js");async function n(e,s){let t="";for(let s in e)t+=`<p>${e[s]}</p>`;let n=document.createElement("div");n.classList.add("popup"),s&&n.classList.add("popup-not-ok"),n.innerHTML=t,function(){let e=Object(o._)(".popup-wrap").objects;if(0!==e.length)return e[0];let s=document.createElement("div");return s.classList.add("popup-wrap"),s.classList.add("column"),document.body.append(s),s}().append(n),await Object(o.sleep)(10),n.style.opacity=1,await Object(o.sleep)(3e3),n.style.opacity=0,await Object(o.sleep)(3010),n.remove()}},"./app/jscss/common/popup.sass":function(e,s,t){var o=t("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),n=t("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/popup.sass");"string"==typeof(n=n.__esModule?n.default:n)&&(n=[[e.i,n,""]]);var i={insert:"head",singleton:!1},a=(o(n,i),n.locals?n.locals:{});e.exports=a},"./app/jscss/common/show_hide_pass.js":function(e,s,t){"use strict";t.r(s);var o=t("./app/jscss/common/common.js");function n(){Object(o._)(".view")[0].style.opacity=0,Object(o._)(".no-view")[0].style.opacity=1,this.parentElement.querySelector("input").setAttribute("type","text")}function i(){Object(o._)(".view")[0].style.opacity=1,Object(o._)(".no-view")[0].style.opacity=0,this.parentElement.querySelector("input").setAttribute("type","password")}(async()=>{await Object(o.img2svg)(),function(){let e=Object(o._)("svg.view").objects;e.push(Object(o._)("svg.no-view").objects[0]),e.map(e=>{e.addEventListener("mouseover",n),e.addEventListener("mouseout",i)})}()})()},"./app/jscss/common/validator.js":function(e,s,t){"use strict";function o(e,s,t){let o=[];if("string"!=typeof s&&o.push("Vlidator : not string sent to Valigator!"),"email"===e){let e=/^[^ ]+[A-Za-z0-9]+@[^ ]+[A-Za-z0-9]+\.[a-z]{2,3}$/,a=5;s.length<a&&o.push(`Длина email должна быть не менее ${a}`),!s.match(e)&&o.push("Проверьте пробелы в начале почты, в начале домена, знак собачки @, наличие точки "),o.length?i(t):n(t)}else if("password"===e){let e=/^[A-Za-z0-9_\-]+$/,a=5;!s.match(e)&&o.push("Недопустимые символы в пароле"),s.length<a&&o.push("Пароль менше 5 знаков"),o.length?i(t):n(t)}return console.table(o),o}function n(e){e.classList.add("valid"),e.classList.remove("invalid")}function i(e){e.classList.add("invalid"),e.classList.remove("valid")}t.r(s),t.d(s,"validate",(function(){return o}))},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/about.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/login.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/map.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/Services/profile.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/footer.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/header/autocomplete/autocomplete.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/Main/header/header.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/common.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/coockie/coockie.sass":function(e,s,t){},"./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/dist/cjs.js?!./node_modules/sass-loader/dist/cjs.js?!./app/jscss/common/popup.sass":function(e,s,t){},"./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":function(e,s,t){"use strict";var o,n=function(){return void 0===o&&(o=Boolean(window&&document&&document.all&&!window.atob)),o},i=function(){var e={};return function(s){if(void 0===e[s]){var t=document.querySelector(s);if(window.HTMLIFrameElement&&t instanceof window.HTMLIFrameElement)try{t=t.contentDocument.head}catch(e){t=null}e[s]=t}return e[s]}}(),a=[];function c(e){for(var s=-1,t=0;t<a.length;t++)if(a[t].identifier===e){s=t;break}return s}function r(e,s){for(var t={},o=[],n=0;n<e.length;n++){var i=e[n],r=s.base?i[0]+s.base:i[0],l=t[r]||0,d="".concat(r," ").concat(l);t[r]=l+1;var u=c(d),p={css:i[1],media:i[2],sourceMap:i[3]};-1!==u?(a[u].references++,a[u].updater(p)):a.push({identifier:d,updater:v(p,s),references:1}),o.push(d)}return o}function l(e){var s=document.createElement("style"),o=e.attributes||{};if(void 0===o.nonce){var n=t.nc;n&&(o.nonce=n)}if(Object.keys(o).forEach((function(e){s.setAttribute(e,o[e])})),"function"==typeof e.insert)e.insert(s);else{var a=i(e.insert||"head");if(!a)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");a.appendChild(s)}return s}var d,u=(d=[],function(e,s){return d[e]=s,d.filter(Boolean).join("\n")});function p(e,s,t,o){var n=t?"":o.media?"@media ".concat(o.media," {").concat(o.css,"}"):o.css;if(e.styleSheet)e.styleSheet.cssText=u(s,n);else{var i=document.createTextNode(n),a=e.childNodes;a[s]&&e.removeChild(a[s]),a.length?e.insertBefore(i,a[s]):e.appendChild(i)}}function m(e,s,t){var o=t.css,n=t.media,i=t.sourceMap;if(n?e.setAttribute("media",n):e.removeAttribute("media"),i&&btoa&&(o+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),e.styleSheet)e.styleSheet.cssText=o;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(o))}}var j=null,f=0;function v(e,s){var t,o,n;if(s.singleton){var i=f++;t=j||(j=l(s)),o=p.bind(null,t,i,!1),n=p.bind(null,t,i,!0)}else t=l(s),o=m.bind(null,t,s),n=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(t)};return o(e),function(s){if(s){if(s.css===e.css&&s.media===e.media&&s.sourceMap===e.sourceMap)return;o(e=s)}else n()}}e.exports=function(e,s){(s=s||{}).singleton||"boolean"==typeof s.singleton||(s.singleton=n());var t=r(e=e||[],s);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var o=0;o<t.length;o++){var n=c(t[o]);a[n].references--}for(var i=r(e,s),l=0;l<t.length;l++){var d=c(t[l]);0===a[d].references&&(a[d].updater(),a.splice(d,1))}t=i}}}}});
//# sourceMappingURL=services.js.map