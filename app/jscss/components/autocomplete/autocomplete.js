import './showSearchInput'
import './autocomplete.sass';

async function getValue(input) {
    let response = await fetch('/search?q=' + input);
    return await response.json();
}

function createHTML(data) {
    var res = '<ul>';
    data.forEach(e => {
        res += '<li>' +
            `<a href = '${e.url}'>` +
            `<div class="pic">` +
            `<img src='/pic/${e.pic}'` +
            `alt='${e.value}'>` +
            `</div>` +
            `<div class="result-search-text">` + e.value +
            '</div></li>';
    });
    return res += '</ul>';
}

function showOverlay() {
    if (!document.querySelector('.overlay')) {

        let overlay = document.createElement("div");
        overlay.classList.add('overlay');
        overlay.style.display = 'block';
        overlay.style.zIndex = '5';
        document.querySelector('body').append(overlay);
    }
}

function hideOverlay() {
    let overlay = document.querySelector('.overlay');
    overlay.remove();
}

function hideSearchResult(e) {
    let search = document.querySelector('.result-search ul');
    debugger;
    if (search
        && e.target !== search
        && e.target.id !== 'autocomplete') {

        search.remove();

        document.querySelector('#autocomplete').value = '';

        hideOverlay();
    }
}

export default window.autoComplete = async function (val) {

    var result = document.querySelector('.result-search');

    if (!val) {
        result.innerHTML = '';
        return
    }
    var data = await getValue(val);

    result.innerHTML = createHTML(data);

    showOverlay();

    document.querySelector('body').addEventListener('click', function (e) {
        hideSearchResult(e);

    })
}

