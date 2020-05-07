import './coockie.sass'


addCookieHTML();

const hasCookie = get_cookie('cn');

showNotification(hasCookie);

function showNotification(hasCookie) {
    if (hasCookie) {
        return false;
    } else {
        setTimeout(function () {
            let s = document.querySelector('#cookie-notice');
            s.style.bottom = '0';
        }, 500);
    }
}

function hideNotification() {
    let s = document.querySelector('#cookie-notice');
    s.style.bottom = '-35%';
}

function get_cookie(cookie_name) {
    let hasCookie = document.cookie.match('(^|;)?' + cookie_name + '=([^;]*)');
    if (hasCookie) {
        return true;
    } else {
        return null;
    }
}

function setCookie() {
    const date = new Date(),
        minute = 60 * 1000,
        day = minute * 60 * 24;
    let days = 1;
    date.setTime(date.getTime() + (days * day));
    document.cookie = "cn=1; path=/; SameSite=lax; expires=" + date;

    hideNotification();

}

function addCookieHTML() {
    let el = document.createElement('div');
    el.id = "cookie-notice";
    el.role = "cookie";
    el.innerHTML =
        'Мы используем cookie-файлы для наилучшего представления' +
        'нашего сайта. Продолжая использовать этот сайт,' +
        'вы соглашаетесь с использованием cookie-файлов.' +
        '<span id="cn-accept-cookie">Соглашаюсь</span> <a href="/about/politicaconf">Подробнее</a>'
    ;
    let footer = document.querySelector('footer');
    footer.append(el);
    document.querySelector('#cn-accept-cookie').addEventListener('click', setCookie);
}

// });




