let find =document.querySelector('.find');
find.onclick = function (){
    let search_wrap = document.querySelector('.search-wrap');
    search_wrap.classList.toggle('search-show')
    let autocomplete = document.querySelector('#autocomplete');
    autocomplete.classList.toggle('search-show');
}