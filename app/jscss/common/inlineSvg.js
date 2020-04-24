import {_} from './common'

imgToSVG().then((res) => addListeners(res));
// imgToSVG();
// setTimeout(addListeners, 800);

async function imgToSVG() {
    let imgCollection = _('img.img-svg').toArray();
    imgCollection.map(async function (el) {
        let elClass = el.getAttribute('class');
        var imgURL = el.src;

        async function fetchData() {
            let data = await fetch(imgURL);
            let text = await data.text();
        };
        let xml = StringToXMLDom(text);
        let svg = xml.getElementsByTagName('svg')[0];
        svg.setAttribute('class', elClass);
        el.parentNode.replaceChild(svg, el);
    });
    alert(1);
    return 'ddd';
}

function addListeners(res) {
    let arr = _('svg').objects;
    arr.map((el) => {
        el.addEventListener('mouseover', showPassword);
        el.addEventListener('mouseout', hidePassword);
    });
    alert(res + 2);
}

function showPassword() {
    _('.view')[0].style.opacity = 0;
    _('.no-view')[0].style.opacity = 1;
    let f = this.parentElement.querySelector('input');
    f.setAttribute('type', 'text');
}

function hidePassword() {
    _('.view')[0].style.opacity = 1;
    _('.no-view')[0].style.opacity = 0;
    let f = this.parentElement.querySelector('input');
    f.setAttribute('type', 'password');
}

function StringToXMLDom(string) {
    var xmlDoc = null;
    if (window.DOMParser) {
        let parser = new DOMParser();
        xmlDoc = parser.parseFromString(string, "text/xml");
    } else // Internet Explorer
    {
        xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async = "false";
        xmlDoc.loadXML(string);
    }
    return xmlDoc;
}