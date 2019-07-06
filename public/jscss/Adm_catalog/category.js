$(function () {
   var url = '/adminsc/catalog';

// При закрытии окна выбора свойств
   $('body').on('click', '.messageClose', function () {
      debugger;
      var close = document.querySelector('.messageClose'),
      overlay = document.querySelector('.overlay'),
      propIds = Array(),
      box = document.querySelector('.messageBox')
      ;
      var propEls = $('.prop-list>.prop-name');
      var catId = $_GET('id');
      for (var i = 0; i < propEls.length; i++) {
         var checked = propEls[i].getElementsByTagName('input')[0].checked;
         if (checked) {
            propIds.push(propEls[i].id);
         }
      }

      var data = {
         action: 'addCatProps',
         propIds: propIds,
         catId: catId
      }
      post(url, data);

      overlay.remove();
      box.remove();
   });


// Добавить свойство
   $('.properties').on('click', '.add-prop', function () {
      var catId = $_GET('id');
      var propsCollection = $('.property');//; 
      var propIdsOnPage = {};//.data('prop'); 
      for (var i = 0; i < propsCollection.length; i++) {
         propIdsOnPage[i] = propsCollection[i].getAttribute('data-prop');
      }
      var param = {
         action: 'getCatProps',
         catId: catId,
         propIdsOnPage: propIdsOnPage
      };
      post(url, param).then(function (data) {
//         debugger;
         if (data) {
            var data = JSON.parse(data);
            $('body').append(data.snippet);
         }
      });


   });


   function addProp(self, enter) {
      var a = $(self).parent().find('.value'),
      b = a[0],
      a = $(b).clone();
      $(a).text('');
// установка курсора в начало ред строки
      var list = $('.val:first');
      if (enter) {
         $(self).parent().append(a);
      }
      else {
         $(self).prev().append(a);
      }
      $(a).focus();
   }
   ;




   function $_GET(key) {
//      debugger;
      var p = window.location.search;
      p = p.match(new RegExp(key + '=([^&=]+)'));
      return p ? p[1] : false;
   }


   function post(url, data) {
      return new Promise(function (resolve, reject) {
         var req = new XMLHttpRequest();
         req.open('POST', url);
         req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         req.setRequestHeader('Content-Type', 'application/json');
         req.setRequestHeader("X-Requested-With", "XMLHttpRequest");
         req.send('param=' + JSON.stringify(data));
         req.onerror = function () {
            reject(Error("Network Error"));
         };
         req.onload = function () {
            resolve(req.response);
         };
      });
   }

});