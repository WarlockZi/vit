import {_} from '../../common/common'

let search_wrap = _('.search-wrap')[0];
_('.find-wrap')[0].addEventListener('click', function () {
    search_wrap.style.transition = 'transform .2s ease';
    search_wrap.classList.toggle('search-show');
})

_('body')[0].addEventListener('click', function (e) {
    let search_wrap = _('.search-wrap')[0];
    if (!e.target.className === "find") {
        search_wrap.classList.remove('search-show');
    }
});
