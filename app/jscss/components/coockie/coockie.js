import './coockie.sass'

document.addEventListener('DOMContentLoaded', function () {

    get_cookie('cn');

    function get_cookie(cookie_name) {

        let hasCookie = document.cookie.match('(^|;)?' + cookie_name + '=([^;]*)');

        addCookieHTML();
        let s = document.querySelector('#cookie-notice');
        if (hasCookie) { //нашли куку
            s.style.bottom = '-1000%';
        } else {
            // s.style.transition = '1s';
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
        // addCookieHTML();
        let s = document.querySelector('#cookie-notice');
        s.style.bottom = '-1000%';
    }

    function addCookieHTML() {
        let el = document.createElement('div');
        el.id = "cookie-notice";
        el.role = "cookie";
        el.innerHTML =
            'Продолжая использовать сайт, вы даете согласие на обработку файлов cookie,' +
            'пользовательских данных (сведения о местоположении; тип и версия ОС; тип и версия Браузера; тип устройства и' +
            'разрешение его экрана; источник откуда пришел на сайт пользователь; с какого сайта или по какой рекламе;' +
            'язык ОС и Браузера; какие страницы открывает и на какие кнопки нажимает пользователь; ip-адрес) в целях' +
            'функционирования сайта, проведения ретаргетинга и проведения статистических исследований и обзоров. Если вы' +
            'не хотите, чтобы ваши данные обрабатывались, покиньте сайт.' +
            '<span id="cn-accept-cookie">Соглашаюсь</span>'
        ;

        let footer = document.querySelector('footer');
        footer.append(el)
        el.style.bottom = '-1000%';
    }

});




