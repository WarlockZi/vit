window.onload = function () {
///////////////////////////    REGISTER     /////////////////////
   document.querySelector("[name = 'reg']").addEventListener("click", function (e) {
      e.preventDefault();
      var email = document.querySelector('input[type = email]').value,
          password = document.querySelector("input[type= password]").value,
          confPass = document.querySelector("[name='confPass']").value,
          surName = document.querySelector("[name='surName']").value,
          name = document.querySelector("[name='name']").value,
          secName = document.querySelector("[name='secName']").value,
          token = document.querySelector("[name = 'token']").value;
      formData = new FormData(),
          xhr = new XMLHttpRequest();
      formData.append('email', email);
      formData.append('password', password);
      formData.append('confPass', confPass);
      formData.append('surName', surName);
      formData.append('name', name);
      formData.append('secName', secName);
      formData.append('token', token);
      xhr.open('POST', PROJ + '/user/register', true);
      xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      xhr.send(formData);
      xhr.onreadystatechange = function (res) {

         if (xhr.readyState == 4 && xhr.status == 200) {

            if (xhr.responseText) {

               $('body').after(xhr.responseText);
               var overlay = document.querySelector(".overlay"),
                   box = document.querySelector(".messageBox"),
                   clos = document.querySelector(".messageClose")
               ;
               overlay.addEventListener("click", function () {
                  overlay.autocomplete.display = 'none';
                  box.autocomplete.display = 'none';
               });
               clos.addEventListener("click", function () {
                  overlay.autocomplete.display = 'none';
                  box.autocomplete.display = 'none';
               });
            }
         }
         else {
            if (xhr.status != 200) {
            }
         }
      };
   });
};