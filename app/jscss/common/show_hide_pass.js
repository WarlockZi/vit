import {_, img2svg} from './common'

(async () => {
        await img2svg();
        addListeners();
    }
)();

function addListeners() {
    let arr = _('svg.view').objects;
    arr.push(_('svg.no-view').objects[0]);
    arr.map((el) => {
        el.addEventListener('mouseover', showPassword);
        el.addEventListener('mouseout', hidePassword);
    });
}

function showPassword() {
    _('.view')[0].style.opacity = 0;
    _('.no-view')[0].style.opacity = 1;
    showText(this);
}

function showText(self) {
    let f = self.parentElement.querySelector('input');
    f.setAttribute('type', 'text');
}

function hidePassword() {
    _('.view')[0].style.opacity = 1;
    _('.no-view')[0].style.opacity = 0;
    hideText(this);
}

function hideText(self) {
    let f = self.parentElement.querySelector('input');
    f.setAttribute('type', 'password');
}

