import './coockie.sass'

document.addEventListener('DOMContentLoaded', function () {

    get_cookie('cn');

    function get_cookie(cookie_name) {

        let results = document.cookie.match('(^|;)?' + cookie_name + '=([^;]*)');
        let s = document.querySelector('#cookie-notice');
        if (results) { //нашли куку
            s.style.bottom = '-1000%';
        } else {
            s.style.bottom = '0';
        }
        return null;
    }

    document.querySelector('#cn-accept-cookie').addEventListener('click', setCookie);

    function setCookie() {
        // alert('Установим куки');
        const date = new Date(),
            minute = 60 * 1000,
            day = minute * 60 * 24;
        let days = 1;
        date.setTime(date.getTime() + (days * day));
        document.cookie = "cn=1; path=/; SameSite=lax; expires=" + date;
        let s = document.querySelector('#cookie-notice');
        s.style.bottom = '-1000%';
    }
});




