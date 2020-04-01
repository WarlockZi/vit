function MyJQ(arg) {

    if (typeof arg == "string") {
        //превращает полученные объекты в массив и возвращает в собственную функцию
        return new MyJQ(Array.prototype.slice.call(document.querySelectorAll(arg)));
    }
    //обрабатывает массив объектов, записывает их в результирующий массив в удобном виде
    if (typeof arg != "string" && typeof arg != "undefined") {
        for (var i in arg) {
            this[i] = arg[i];
        }
        //устанавлиевается для обработки полученного результата
        this.objects = arg;
        //сохраняется для удобного прохождение результата с помощью for (i=0; i<n; i++)
        this.length = arg.length;
    }
    this.updateEnum = function () {
        for (var i in this) {
            //изменение enumerable, для того, что for не проходил по ненужным элементам возвращаемого объекта
            if (i * 1 != i)
                Object.defineProperty(this, i, {
                    value: this[i],
                    enumerable: false,
                    writable: false,
                    configurable: false
                });
        }
    };
    this.updateEnum();

    this.on = function (eventname, f) {
        for (var i = 0; i < this.objects.length; i++) {
            this.objects[i].addEventListener(eventname, f)
        }
        return this;
    };
    this.addClass = function (name) {
        for (var i = 0; i < this.objects.length; i++) {
            this.objects[i].classList.add(name);
        }
        return this;
    };
    this.removeClass = function (name) {
        for (var i = 0; i < this.objects.length; i++) {
            this.objects[i].classList.remove(name);
        }
        return this;
    };
    this.text = function () {
        return this.objects[0].innerText;
    };
    this.value = function () {
        return this.objects[0].value;
    };
    this.append = function (child) {
        return this.objects[0].append(child);
    };
    this.remove = function () {
        return this.objects[0].style.display = 'none';
    };
    this.show = function () {
        return this.objects[0].style.display = 'flex';
    };
    this.first = function () {
        return this.objects[0];
    };
    //обработка объектов функцией css
    this.css = function (a, b) {
        if (!b) {//Если !b, то есть если 1 аргумент
            return eval("this.objects[0].style." + a);
        } else {//Иначе 2 аргумента
            for (var i in this.objects) {
                eval("this.objects[" + i + "].style." + a + "='" + b + "';");
            }
        }
        return this;
    };
    //возвращает обычным массивом все объекты
    this.toArray = function () {
        return this.objects;
    };

    return this;
}


MyJQ.prototype = new function (arg) {
//splice объявляется для того, чтобы в консоли результат работы функции выдавался как массив хотя на самом деле это другой объект
    this.splice = function () {
    };
};


export  {MyJQ}

