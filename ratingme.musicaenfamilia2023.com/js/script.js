function AJAX({
   url,
   data = [],
   success,
   error
}) {
   let req = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
   req.open("POST", BASE_URL + url, true);

   function dataFn() {
      let insideData = '';
      data.map((x) => {
         Object.keys(x).map((field, indexField) => {
            if (indexField == 0) {
               insideData += Object.keys(x)[indexField] + '=' + (Array.isArray(Object.values(x)[indexField]) ? JSON.stringify(Object.values(x)[indexField]) : Object.values(x)[indexField].toString().trim())
            } else {
               insideData += '&' + Object.keys(x)[indexField] + '=' + (Array.isArray(Object.values(x)[indexField]) ? JSON.stringify(Object.values(x)[indexField]) : (typeof Object.values(x)[indexField] == 'string' ? Object.values(x)[indexField].trim() : Object.values(x)[indexField]))
            }
         })
         if (data.length > 1) {
            insideData += '__';
         }
      });
      if (data.length > 1) {
         insideData = 'arrData=' + JSON.stringify(data);
      }
      return insideData;
   }
   req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   req.send(dataFn())
   req.onreadystatechange = (e) => {
      if (req.readyState == 4 && req.status == 200) {
         if (req.status == 200) {
            success(req.responseText);
         } else {
            error(req.status);
         }
      }
   }
}
moment.lang('es', {
   months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
   monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split('_'),
   weekdays: 'Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado'.split('_'),
   weekdaysShort: 'Dom._Lun._Mar._Mier._Jue._Vier._Sab.'.split('_'),
   weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sa'.split('_')
});


let profile = document.querySelector('.header .flex .profile');
if (document.querySelector('#user-btn') != undefined) {

   document.querySelector('#user-btn').onclick = () => {
      profile.classList.toggle('active');
   }
}

window.onscroll = () => {
   if (profile != undefined) {
      profile.classList.remove('active');
   }
}

// document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
//    inputNumber.oninput = () => {
//       if (inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
//    };
// });

let formReview = document.querySelector('.form__add__review');
if (formReview != undefined) {
   formReview.addEventListener('submit', function (e) {
      e.preventDefault();
      let form = new FormData(formReview);
      let title = formReview.querySelector('input[name="title"]').value;
      let description = formReview.querySelector('textarea[name="description"]').value;
      let rating = form.get('rating');
      let idPost = formReview.querySelector('input[name="idPost"]').value;
      let submit = '';
      let date = moment().format('LLL');
      AJAX({
         url: 'components/add__review.php',
         data: [{
            title,
            description,
            rating,
            submit,
            idPost,
            date
         }],
         success: function (res) {
            res = JSON.parse(res);
            if (res == 'error') {
              alert('Ha ocurrido un error');
            } else {
              location.href = BASE_URL + 'view_post.php?get_id=' + res;
            }
         }
      })
   });
}
// Menu
var iconMenu = document.querySelector('.menu-burguer-white');
iconMenu.addEventListener('click', function () {
   if (iconMenu.classList.contains('open')) {
      iconMenu.classList.remove('open');
      document.querySelector('.header').style.height = '108px';
      document.querySelector('.header').style.overflow = 'hidden';
   } else {
      iconMenu.classList.add('open');
      document.querySelector('.header').style.height = '100%';
      document.querySelector('.header').style.overflow = 'visible';
   }
}, false);
document.querySelector('.modal__vip-close').onclick = function (e) {
   e.preventDefault();
   document.querySelector('.main__vip').style.display = 'none';
};

[...document.querySelectorAll('.btn__vip')].map(item => {
   item.onclick = function (e) {
      e.preventDefault();
      document.querySelector('.main__vip').style.display = 'flex';
   }
});

// Vip
let formVip = document.querySelector('.form__vip');
if (formVip != undefined) {
   formVip.addEventListener('submit', function (e) {
      e.preventDefault();
      let idUser = formVip.querySelector('input[name="idUser"]').value;
      let ref = formVip.querySelector('input[name="vip"]').value;
      let date = moment().format('LLL');
      if (ref != '') {
         if (confirm('Debe confirmar muy bien el número de referencia ¿desea continuar?')) {
            AJAX({
               url: 'components/add__review.php',
               data: [{
                  idUser,
                  ref,
                  date
               }],
               success: function (response) {
                  response = JSON.parse(response);
                  if (response == 'error') {
                     alert('Ha ocurrido un error');
                  } else if (response == 'success') {
                     alert('¡Operación exitosa! Gracias por confiar en nosotros, en breve activaremos su cuenta VIP. Deberá iniciar sesión nuevamente.');
                     location.href = BASE_URL + 'components/logout.php';
                  } else {
                     alert('Debe colocar la referencia para continuar.');
                  }
               }
            })
         }
      } else {
         alert('Debe colocar la referencia para continuar.');
      }
   });
}