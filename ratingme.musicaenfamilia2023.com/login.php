<?php

include 'components/connect.php';
session_start();
if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $verify_email = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
   $verify_email->execute([$email]);
   

   if($verify_email->rowCount() > 0){
      $fetch = $verify_email->fetch(PDO::FETCH_ASSOC);
      $verfiy_pass = password_verify($pass, $fetch['password']);
      if($verfiy_pass == 1){
         setcookie('user_id', $fetch['id'], time() + 60*60*24*30, '/');
         setcookie('user_vip', $fetch['vip'], time() + 60*60*24*30, '/');
         setcookie('user_vipstatus', $fetch['vip_status'], time() + 60*60*24*30, '/');
         header('location:index.php');
         $_SESSION['user'] = $fetch['name'];
         $post = $conn->prepare("SELECT * FROM `posts` WHERE title = ? LIMIT 1");
         $post->execute([$fetch['name']]);
         if($post->rowCount() > 0) {
            $fetchpost = $post->fetch(PDO::FETCH_ASSOC);
            setcookie('post_id', $fetchpost['id'], time() + 60*60*24*30, '/');
         }
      }else{
         $warning_msg[] = 'Datos incorrectos';
      }
   }else{
      $warning_msg[] = 'Datos incorrectos';
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>  Rating Me | Inicio de sesión</title>

   <link rel="shortcut icon" href="<?php echo BASE_URL . "uploaded_files/icon.png"; ?>">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/header.php'; ?>
<!-- header section ends -->

<!-- login section starts  -->

<section class="account-form">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>  Rating Me</h3>
      <p class="placeholder">Correo <span>*</span></p>
      <input type="email" name="email" required maxlength="50" placeholder="mail@mail.com" class="box">
      <p class="placeholder">your password <span>*</span></p>
      <input type="password" name="pass" required maxlength="50" placeholder="********" class="box">
      <p class="link">¿Aún no tienes cuenta? <a href="register.php">¡Regístrate!</a></p>
      <input type="submit" value="Entrar" name="submit" class="btn">
   </form>

</section>









<!-- login section ends -->














<?php include 'components/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/app.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/alers.php'; ?>

</body>
</html>