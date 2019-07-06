
window.onload = function () {


   var controller = 'test';
   if (window.location.pathname.indexOf('freetest') + 1) {
      controller = 'freetest';
   }




////////////////    Подсказка   ///////////////////////////////////////////
   $("[data-tooltip]").mousemove(function (eventObject) {
      var data_tooltip = $(this).attr("data-tooltip");
      $("#tooltip").text(data_tooltip)
      .css({
         "top": eventObject.screenY - 10,
         "left": eventObject.screenX - 1490
      })
      .show();
   }).mouseout(function () {
      $("#tooltip").hide()
      .text("")
      .css({
         "top": 0,
         "left": 0
      });
   });
   


}
