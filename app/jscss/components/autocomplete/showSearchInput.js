let find = document.querySelector('.find');
let search_wrap = document.querySelector('.search-wrap');
find.onclick = function () {
    search_wrap.style.transition =  'transform .2s ease';
    search_wrap.classList.toggle('search-show');
};

document.querySelector('body').addEventListener('click', function (e) {
    let search_wrap = document.querySelector('.search-wrap');
    if (!e.target.className === "find") {
        search_wrap.classList.remove('search-show');
    }
});