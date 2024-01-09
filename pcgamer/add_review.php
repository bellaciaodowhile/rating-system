<?php

include 'helpers/connect.php';

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:index.php');
}

// if(isset($_POST['submit'])){

//    if($user_id != ''){

//       $id = create_unique_id();
//       $title = $_POST['title'];
//       $title = filter_var($title, FILTER_SANITIZE_STRING);
//       $description = $_POST['description'];
//       $description = filter_var($description, FILTER_SANITIZE_STRING);
//       $rating = $_POST['rating'];
//       $rating = filter_var($rating, FILTER_SANITIZE_STRING);

//       $verify_review = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ? AND user_id = ?");
//       $verify_review->execute([$get_id, $user_id]);

//       $add_review = $conn->prepare("INSERT INTO `reviews`(id, post_id, user_id, rating, title, description) VALUES(?,?,?,?,?,?)");
//       $add_review->execute([$id, $get_id, $user_id, $rating, $title, $description]);
//       $success_msg[] = 'Operación exitosa!';
//       header('location:view_post.php?get_id='.$get_id);
//       // if($verify_review->rowCount() > 0){
//       //    $warning_msg[] = 'Operación exitosa!';
//       // }else{
//       // }

//    }else{
//       $warning_msg[] = 'Inicia sesión primero';
      
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PC Gamer References | Referencia</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'helpers/header.php'; ?>
<!-- header section ends -->

<!-- add review section starts  -->

<section class="account-form">

   <form class="form__add__review" method="post">
      <h3>Agregando referencia</h3>
      <p class="placeholder">Nombre del servicio <span>*</span></p>
      <input type="text" name="title" required maxlength="50" placeholder="Venta de USDT" class="box">
      <input type="text" name="idPost" value="<?= $get_id; ?>" hidden="hidden">
      <p class="placeholder">Comentario</p>
      <textarea name="description" class="box" placeholder="Rápido, seguro y serio" maxlength="1000" cols="30" rows="10"></textarea>
      <p class="placeholder">Del 1 al 5 ¿Que valor le darías? <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="Enviar referencia" name="submit" class="btn">
      <a href="view_post.php?get_id=<?= $get_id; ?>" class="option-btn">Atrás</a>
   </form>

</section>

<!-- add review section ends -->














<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script>
   const BASE_URL = "<?php echo BASE_URL; ?>"
</script>
<script src="js/app.js"></script>
<script src="js/script.js"></script>

<?php include 'helpers/alers.php'; ?>

</body>
</html>