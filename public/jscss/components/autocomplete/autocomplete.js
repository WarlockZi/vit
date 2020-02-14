import './autocomplete.sass';

async function autoComplete(Input) {
    let response = await fetch('/search?q=' + Input);
    return await response.json();

}


export default window.getValue = async function (val) {
var result = document.querySelector('.result-search');
// if no value
    if (!val) {
        result.innerHTML = '';
        return
    }
    // search goes here
    var data = await autoComplete(val);

    // debugger;
    // append list data
    var res = '<ul>';
    data.forEach(e => {
        res += '<li>' +
            `<a href = '${e.url}'>`+
            `<img src='/pic/${e.pic}' alt='${e.value}'>`+
            e.value+
            '</a></li>';
    });
    res += '</ul>';
    result.innerHTML = res;

    document.querySelector('body').addEventListener('click', function (e) {
        const search = document.querySelector('.result-search ul');
        if (document.querySelector('.result-search ul') && e.target !== search) {
            search.remove();
        }
    });
}
