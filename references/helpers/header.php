<header class="header">

   <section class="flex">

      <a href="index.php" class="logo">
         <img src="<?php echo BASE_URL; ?>uploaded_files/logo.png" class="logo__ratingme" alt="RatingMe">
      </a>
      <div class="menu-burguer-white">
         <div class="menu-line"></div>
         <div class="menu-line"></div>
         <div class="menu-line"></div>
      </div>

      <nav class="navbar">
         <a href="index.php" class="references">
            Referencias
         </a>
         <?php if($user_id == ''){ ?>
         <a href="login.php">
            Iniciar sesión
            <i class="fas fa-arrow-right-to-bracket"></i>
         </a>
         <a href="register.php">
            Regístrate
            <i class="far fa-registered"></i>
         </a>
         <?php } ?>
         <?php if($user_id != ''){ ?>
         <div id="user-btn" class="far fa-user"></div>
         <?php }; ?>
      </nav>

      <?php
         if($user_id != ''){
      ?>
      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <?php if($fetch_profile['image'] != ''){ ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="" class="image">
         <?php }; ?>
         <p><?= $fetch_profile['name']; ?></p>
         <?php if($fetch_profile['vip'] == ''){ ?>
         <a href="javascript:void(0);" class="btn d-vip btn__vip">Rating Me <span class="vip">VIP</span></a>
         <?php } else if ($fetch_profile['vip_status'] == '') { ?>
         <a href="javascript:void(0);" class="btn d-vip btn__vip">Rating Me <span class="vip">PROCESO</span></a>
         <?php } else { ?>
         <a href="javascript:void(0);" class="btn d-vip btn__vip">Rating Me <span class="vip">ACTIVO</span></a>
         <?php } ?>
         
         <a href="view_post.php?get_id=<?= $post_id; ?>" class="btn btn--white">Mis referencias</a>
         <a href="update.php" class="btn btn--white">Editar perfil</a>
         <a href="helpers/logout.php" class="delete-btn"
            onclick="return confirm('¿Esta seguro de cerrar sesión?');">Cerrar sesion</a>
         <?php }else{ ?>
         <div class="flex-btn">
            <p>Inicia sesion o registrate</p>
            <a href="login.php" class="inline-option-btn">Inicia sesion</a>
            <a href="register.php" class="inline-option-btn">Registrate</a>
         </div>
         <?php }; ?>
      </div>
      <?php }; ?>
   </section>
</header>

<!-- VIP Rating Me -->
<div class="main__vip">
   <div class="modal__vip">
      <button class="modal__vip-close">
         <i class="fa fa-times"></i>
      </button>
      <img src="<?php echo BASE_URL; ?>uploaded_files/pay.png" alt="RatingMe">
      <form class="form__vip">
      <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
      $select_profile->execute([$user_id]);
      if($select_profile->rowCount() > 0){
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      
      
      if($user_vip == '') { ?>
         <?php if($user_id != '') { ?>
         <input type="text" name="idUser" value="<?php echo $user_id; ?>" hidden="hidden">
         <input type="number" name="vip" class="input__vip" placeholder="Order ID">
         <button class="btn__submit__vip mb-5" type="submit">
            Enviar referencia
         </button>
         <?php } else { ?>
            <button href="login.php" class="btn__submit__vip mb-2">
               Iniciar sesión
            </button>
            <a href="register.php" class="mb-2">¿No te has registrado? Regístrate</a>
         <?php } ?>
      <?php } else if ($fetch_profile['vip_status'] == '') { ?>
         <div class="btn__submit__vip mb-2">
            <p>Procesando VIP</p>
         </div>
      <?php } else { ?>
         <div class="btn__submit__vip mb-2">
            <p>VIP Activo</p>
         </div>
      <?php } ?>
   <?php } ?>


      </form>
   </div>
</div>