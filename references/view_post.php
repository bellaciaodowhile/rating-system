<?php

include 'helpers/connect.php';
session_start();
if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:index.php');
}

if(isset($_POST['delete_review'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `reviews` WHERE id = ?");
   $verify_delete->execute([$delete_id]);
   
   if($verify_delete->rowCount() > 0){
      $delete_review = $conn->prepare("DELETE FROM `reviews` WHERE id = ?");
      $delete_review->execute([$delete_id]);
      $success_msg[] = 'Referencia eliminada.';
   }else{  
      $warning_msg[] = 'Referencia ya eliminada.';
   }

}

?>
 <?php
      $select_post = $conn->prepare("SELECT * FROM `posts` WHERE id = ? LIMIT 1");
      $select_post->execute([$get_id]);
      if($select_post->rowCount() > 0){
         while($fetch_post = $select_post->fetch(PDO::FETCH_ASSOC)){

        $total_ratings = 0;
        $rating_1 = 0;
        $rating_2 = 0;
        $rating_3 = 0;
        $rating_4 = 0;
        $rating_5 = 0;

        $select_ratings = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ?");
        $select_ratings->execute([$fetch_post['id']]);
        $total_reivews = $select_ratings->rowCount();
        while($fetch_rating = $select_ratings->fetch(PDO::FETCH_ASSOC)){
            $total_ratings += $fetch_rating['rating'];
            if($fetch_rating['rating'] == 1){
               $rating_1 += $fetch_rating['rating'];
            }
            if($fetch_rating['rating'] == 2){
               $rating_2 += $fetch_rating['rating'];
            }
            if($fetch_rating['rating'] == 3){
               $rating_3 += $fetch_rating['rating'];
            }
            if($fetch_rating['rating'] == 4){
               $rating_4 += $fetch_rating['rating'];
            }
            if($fetch_rating['rating'] == 5){
               $rating_5 += $fetch_rating['rating'];
            }
        }

        if($total_reivews != 0){
            $average = round($total_ratings / $total_reivews, 1);
        }else{
            $average = 0;
        }
        
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>  Rating Me | Referencias de: <?= $fetch_post['title']; ?></title>

   <link rel="shortcut icon" href="<?php echo BASE_URL . "uploaded_files/icon.png"; ?>">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'helpers/header.php'; ?>
<!-- header section ends -->

<!-- view posts section starts  -->

<section class="view-post">

   <div class="heading jcsb"><h1>Referencias</h1> <a href="index.php" class="inline-option-btn" style="margin-top: 0;">Todas las referencias</a></div>

   <div class="row">
      <div class="col">
         <img src="uploaded_files/<?= $fetch_post['image']; ?>" alt="" class="image">
         <h3 class="title"><?= $fetch_post['title']; ?></h3>
      </div>
      <div class="col">
         <div class="flex">
            <div class="total-reviews">
               <h3><?= $average; ?><i class="fas fa-star"></i></h3>
               <p><?= $total_reivews; ?> ref.</p>
            </div>
            <div class="total-ratings">
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><?= $rating_5; ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><?= $rating_4; ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><?= $rating_3; ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><?= $rating_2; ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <span><?= $rating_1; ?></span>
               </p>
            </div>
         </div>
      </div>
   </div>
   
   
</section>

<!-- view posts section ends -->

<!-- reviews section starts  -->

<section class="reviews-container">
   <?php
   if (isset($_SESSION['user'])) {
      if ($fetch_post['title'] != $_SESSION['user']) {
         if ($user_id != '') {
            $select_reviews = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ?");
            $select_reviews->execute([$get_id]);
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE `name` = ? LIMIT 1");
            $select_profile->execute([$fetch_post['title']]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

            if($fetch_profile['vip_status'] == '' &&  $select_reviews->rowCount() < 5){ ?>
            <div class="heading"><h1>Referencias de clientes</h1> <a href="add_review.php?get_id=<?= $get_id; ?>" class="inline-btn" style="margin-top: 0;">añadir referencia</a></div>
         <?php } else if ($select_reviews->rowCount() == 5 && $fetch_profile['vip_status'] == '') { ?>
         <div class="heading"><h1 style="text-transform: inherit;">Este usuario tiene un límite de 5 referencias. Su cliente deberá adquirir el VIP para añadir más referencias.</h1></div>
         <?php } else { ?> 
            <div class="heading"><h1>Referencias de clientes</h1> <a href="add_review.php?get_id=<?= $get_id; ?>" class="inline-btn" style="margin-top: 0;">añadir referencia</a></div>
         <?php }
         }
      }
   } 
}
}else{
      header('location:404.php');
   } ?>
   <div class="box-container">

   <?php
      $select_reviews = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ? ORDER BY idAdmin DESC");
      $select_reviews->execute([$get_id]);
      if($select_reviews->rowCount() > 0){
         while($fetch_review = $select_reviews->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box" <?php if($fetch_review['user_id'] == $user_id){echo 'style="order: -1;"';}; ?>>
      <?php
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_user->execute([$fetch_review['user_id']]);
         while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="user">
         <?php if($fetch_user['image'] != ''){ ?>
            <img src="uploaded_files/<?= $fetch_user['image']; ?>" alt="">
         <?php }else{ ?>   
            <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
         <?php }; ?>   
         <div>
            <p><?= $fetch_user['name']; ?></p>
            <span><?= $fetch_review['date']; ?></span>
         </div>
      </div>
      <?php }; ?>
      <div class="ratings">
         <?php if($fetch_review['rating'] == 1){ ?>
            <p style="background:var(--red);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
         <?php }; ?> 
         <?php if($fetch_review['rating'] == 2){ ?>
            <p style="background:var(--orange);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
         <?php }; ?>
         <?php if($fetch_review['rating'] == 3){ ?>
            <p style="background:var(--orange);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
         <?php }; ?>   
         <?php if($fetch_review['rating'] == 4){ ?>
            <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
         <?php }; ?>
         <?php if($fetch_review['rating'] == 5){ ?>
            <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
         <?php }; ?>
      </div>
      <h3 class="title"><?= $fetch_review['title']; ?></h3>
      <?php if($fetch_review['description'] != ''){ ?>
         <p class="description"><?= $fetch_review['description']; ?></p>
      <?php }; ?>  
      <?php if($fetch_review['user_id'] == $user_id){ ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
            <a href="update_review.php?get_id=<?= $fetch_review['id']; ?>" class="inline-option-btn">Editar referencia</a>
            <input type="submit" value="Eliminar referencia" class="inline-delete-btn" name="delete_review" onclick="return confirm('¿Esta seguro de eliminar esta referecia? No hay vuelta atrás');">
         </form>
      <?php }; ?>   
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No existe niguna referencia para este usuario.</p>';
      }
   ?>

   </div>

</section>

<!-- reviews section ends -->

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