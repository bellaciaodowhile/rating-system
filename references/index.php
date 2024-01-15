<?php

include 'helpers/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>  Rating Me | Referencias</title>
   <link rel="shortcut icon" href="<?php echo BASE_URL . "uploaded_files/icon.png"; ?>">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'helpers/header.php'; ?>
<!-- header section ends -->

<!-- view all posts section starts  -->

<section class="all-posts">
   <a href="javascript:void(0);" class="banner__vip btn__vip">
      <img src="<?php echo BASE_URL; ?>uploaded_files/vip.png" class="vip__desktop" alt="Rating Me VIP">
      <img src="<?php echo BASE_URL; ?>uploaded_files/vipmobile.png" class="vip__mobile" alt="Rating Me VIP">
   </a>
   <div class="heading"><h1>Todas las referencias</h1></div>

   <div class="box-container">

   <?php
      $select_posts = $conn->prepare("SELECT * FROM `posts`");
      $select_posts->execute();
      if($select_posts->rowCount() > 0){
         while($fetch_post = $select_posts->fetch(PDO::FETCH_ASSOC)){

         $post_id = $fetch_post['id'];

         $count_reviews = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ?");
         $count_reviews->execute([$post_id]);
         $total_reviews = $count_reviews->rowCount();
   ?>
   <div class="box">
      <!-- <div class="d-flex aic mb-2">
         <img src="<?php echo BASE_URL; ?>uploaded_files/verified.png" class="verified" alt="User Verified">
         <h1>Usuario verificado</h1>
      </div> -->
      <div class="box__content">
         <img src="uploaded_files/<?= $fetch_post['image']; ?>" alt="<?= $fetch_post['title']; ?>" class="image">
         <h3 class="title"><?= $fetch_post['title']; ?></h3>
         <p class="total-reviews"><i class="fas fa-star"></i> <span><?= $total_reviews; ?></span></p>

      </div>
      <div class="box__footer">
         <a href="view_post.php?get_id=<?= $post_id; ?>">Ver referencias</a>
      </div>

   </div>
   <?php
      }
   }else{
      echo '<p class="empty">No existe ningún usuario registrado.</p>';
   }
   ?>

   </div>

</section>
<!-- view all posts section ends -->














<?php include 'helpers/footer.php'; ?>
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