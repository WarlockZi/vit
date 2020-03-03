import './coockie.sass'

window.addEventListener('DOMContentLoaded ', get_cookie());

// get_cookie('cn');

function get_cookie(cookie_name) {
    var results = document.cookie.match('(^|;)?' + cookie_name + '=([^;]*)');
    var s = document.querySelector('#cookie-notice');
    if (results) {
        // document.querySelector('#cookie-notice').style.bottom = '-100%';
    } else {
        s.style.bottom = '0';
    }
    // alert('dd' + s);
    // document.querySelector('#cookie-notice').style.bottom = '0';
    setCookie();
    return null;

}

function setCookie() {
    alert('Установим куки');
    const date = new Date(),
        minute = 60 * 1000,
        day = minute * 60 * 24;
    var days = 1;
    date.setTime(date.getTime() + (days * day));
    // document.querySelector('#cookie-notice').style.bottom = '-100%';
    document.cookie = "cn=1; path=/; SameSite=lax; expires=" + date;
}


