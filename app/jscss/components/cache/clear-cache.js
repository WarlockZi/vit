document.querySelector('.clear-cache').addEventListener('click', clearCache);

async function clearCache() {
    alert('Кеш очищен!');
    let response = await fetch('/adminsc/clearCache')
    let result = await response.text();
    alert(result);
}
