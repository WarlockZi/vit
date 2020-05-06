import './popup.sass'
import {_, sleep} from './common'

async function popup(message, error) {
    const timer = 3000;

    let str = '';
    for (let mes in message) {
        str += `<p>${message[mes]}</p>`
    }

    let popup = document.createElement('div');
    popup.classList.add('popup');
    if (error) {
        popup.classList.add('popup-not-ok');
    }

    popup.innerHTML = str;

    let wrapper = createDomWrapper();
    wrapper.append(popup);
    await sleep(10);
    popup.style.opacity = 1;
    await sleep(timer);
    popup.style.opacity = 0;
    await sleep(timer + 10);
    popup.remove();
}

function createDomWrapper() {
    let wrapper = _('.popup-wrap').objects;
    if (wrapper.length !== 0) {
        return wrapper[0];
    }
    let columnWrapper = document.createElement('div');
    columnWrapper.classList.add('popup-wrap');
    columnWrapper.classList.add('column');
    document.body.append(columnWrapper);
    return columnWrapper;
}

export {popup}