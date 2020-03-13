$(function () {
   var url = '/adminsc/settings/instructions';


   //Инструкция как работать с выделением
   //https://learn.javascript.ru/range-textrange-selection#demo-mix

// закрыть меню
   $('.doc').on('click', 'menu .close', function () {
      $(this).parent().remove();
   });

   $('.doc').on('click', 'p', function (e) {
      var sel = window.getSelection();
      var start = sel.getRangeAt(0).startOffset;
      var end = sel.getRangeAt(0).endOffset;
// если есть выделение
      if (end - start) {
         var self = this;
         var p = this.innerHTML;
// есть теги
         var match = p.match(/<.*?>/g);
         if (match) {
            var actions = [
               "<p>Удалить ссылку</p>"
            ];
            showMenu(self, actions);
// нет тегов
         }
         else {
//            debugger;
            var actions = [
               "<p>Вставить ссылку</p>"
            ];
            showMenu($(this), actions);

            var b = "<a href = '#'>";
            var c = "</a>";
            var output = [p.slice(0, start), b, p.slice(start, end), c, p.slice(end)].join('');
            self.innerHTML = output;
         }
// если нет выделения
      }
      else {
         showMenu(slef, actions);
      }

   });

   function stripTags(str) {
      return str.replace(/<.*?>/g, '');
   }

   function showMenu(slef, actions) {
      var menu = document.createElement('menu');
      $(menu).css('display', 'flex');
      $(slef).parent().append(menu);

      if ("<p>Вставить ссылку</p>" in actions) {
//         debugger;
         var data = {
            action: 'getAllModuls',
            role: 'mop',
         };

         post(url, data).then(function (res) {
            var moduls = JSON.parse(res);
            var html = "<div class = 'column'>";
            for (var i = 0; i < moduls.length; i++) {
               html +=
               "<div class = 'row'>" +
               "<p>" + moduls[i].id + "</p>" +
               "<p class = 'desc'>" + moduls[i].name + "</p>" +
               "<p class = 'no'>" + moduls[i].text + "</p>" +
               "</div>";
            }
            html += "</div>";
            var text = '';
            for (var i = 0; i < actions.length; i++) {
               text += actions[i];
            }
            text += "<span class = 'close'>x<span>";
            $(menu).html(text);
            $(menu).append(html);
            $(menu).show();

         });

      }


   }

   function removeLink(self) {
      var str = self.parent().parent().parent().find('p').html();
      var text = stripTags(str);
      $(self).parent().parent().parent().find('p:first').html(text);
   }

   function addProp(self, enter) {
//debugger;
      var a = $(self).parent().find('.value'),
      b = a[0],
      a = $(b).clone();
      $(a).text(' ');
      debugger;
// установка курсора в начало ред строки
      var list = $('.val:first');
      if (enter) {
         $(self).parent().append(a);
      }
      else {
         $(self).before(a);
      }
      $(a).focus();
   }
   ;

   $('.doc').on('keydown', 'p', function (event) {
      var char = event.which;
      debugger;
      if (char == 13) { // это Enter
         event.preventDefault();
         addProp($(this), true);
         return;
      }
   });





});