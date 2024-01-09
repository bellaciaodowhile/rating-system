let profile = document.querySelector('.header .flex .profile');
console.log('Hello')
if (document.querySelector('#user-btn') != undefined) {

   document.querySelector('#user-btn').onclick = () =>{
      profile.classList.toggle('active');
   }
}

window.onscroll = () =>{
   profile.classList.remove('active');
}

document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   inputNumber.oninput = () =>{
      if(inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   };
});

let formReview = document.querySelector('.form__add__review');
formReview.addEventListener('submit', function(e) {
   e.preventDefault();
   let title = formReview.querySelector('input[name="title"]').value;
   let description = formReview.querySelector('textarea[name="description"]').value;
   let rating = formReview.querySelector('select[name="rating"]').value;
   let idPost = formReview.querySelector('input[name="idPost"]').value;
   let submit = '';
   console.log({
      title,
      description,
      rating,
      submit,
      idPost
   })
   AJAX({
      url: 'helpers/add__review.php',
      data: [{
         title,
         description,
         rating,
         submit,
         idPost
      }],
      success: function(res) {
         console.log(res)
         res = JSON.parse(res);
         if (res) {
            alert('Ha ocurrido un error');
         } else {
            location.href = BASE_URL + 'view_post.php?get_id=' + res;
            alert('redirige')
         }
      }
   })
});