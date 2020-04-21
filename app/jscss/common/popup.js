import {_} from './common'

function createDomWrapper(){
    if (_('.popup-wrap').objects[0]==='undefined'){
        let columnWrapper = document.createElement('div');
        columnWrapper.classList.add('popup-wrap column');
        document.body.append(columnWrapper);
        return columnWrapper;
    }else{
        return _('.popup-wrap').objects[0];
    }
}

function createMessage(){
    if (_('.popup-wrap').objects[0]!=='undefined'){
        let columnWrapper = document.createElement('div');
        columnWrapper.classList.add('popup-wrap');
        document.body.append(columnWrapper);
    }
    let str = "<div class = 'popup-wrap column'>";
}

async function popup(message, status) {

    let str = '';
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