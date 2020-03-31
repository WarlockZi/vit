function MyJquery(element) {

    this.element = element;

    this.on = function (eventname, f) {
        for (var i = 0; i < this.element.length; i++) {
            this.element[i].addEventListener(eventname, f)
        }
        return this;
    };
    this.addClass = function (name) {
        for (var i = 0; i < this.element.length; i++) {
            this.element[i].classList.add(name);
        }
        return this;
    };
    this.text = function () {
        return this.element.innerText;
    };
    this.value = function () {
        return this.element.value;
    };
    this.append = function (child) {
        return this.element[0].append(child);
    };
    this.remove = function () {
        return this.element[0].style.display = 'none';
    };
    this.show = function () {
        return this.element[0].style.display = 'flex';
    };

}

export function _(selector) {
    if (typeof selector == 'string') {
        var elements = document.querySelectorAll(selector);
        return new MyJquery(elements);
    }else{
        return new MyJquery(elements);
    }
}