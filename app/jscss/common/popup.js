import {_} from './common'

function addDomWrappers(){
    if (_('.popup-wrap').objects[0]!=='undefined'){
        let columnWrapper =
    }

    let str = "<div class = 'popup-wrap column'>";
}

async function popup(message, status) {


    for (let mes in message) {
        str += `<p>${message[mes]}</p>`
    }

    let popup = document.createElement('div');
    popup.classList.add('popup');
    if (!status) {
        popup.classList.add('popup-not-ok');
    }
    popup.innerHTML = str
    let body = document.querySelector('body');
    body.append(popup);

    let d = await setTimeout(function () {
        popup.style.opacity = 1;
    }, 20);

    d = await setTimeout(function () {
        popup.style.opacity = 0;

    }, 118200);

    return popup;
}


export{popup}