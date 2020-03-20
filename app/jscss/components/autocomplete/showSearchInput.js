
    let search_wrap = document.querySelector('.search-wrap');
    document.querySelector('.find').addEventListener('click',function () {
        search_wrap.style.transition =  'transform .2s ease';
        search_wrap.classList.toggle('search-show');
    })

    document.querySelector('body').addEventListener('click', function (e) {
        let search_wrap = document.querySelector('.search-wrap');
        if (!e.target.className === "find") {
            search_wrap.classList.remove('search-show');
        }
    });
