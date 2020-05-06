import {_} from './common'

export default async function img2svg() {
    let imgCollection = Array.from(_('img.img-svg'));
    await Promise.all(imgCollection.map(async (el) => {
        let elClass = el.getAttribute('class');
        var elSrc = el.src;
        let data = await fetch(elSrc);
        let text = await data.text();
        let xml = await StringToXMLDom(text);
        let svg = await xml.getElementsByTagName('svg')[0];
        svg.setAttribute('class', elClass);
        el.parentNode.replaceChild(svg, el);
    }));
}

function StringToXMLDom(string) {
    var xmlDoc = null;
    if (window.DOMParser) {
        let parser = new DOMParser();
        xmlDoc = parser.parseFromString(string, "text/xml");
    } else {// Internet Explorer
        xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async = "false";
        xmlDoc.loadXML(string);
    }
    return xmlDoc;
}
