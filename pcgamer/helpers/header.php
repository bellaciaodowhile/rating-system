
<header class="header">

   <section class="flex">

      <a href="index.php" class="logo">PC Gamer References</a>

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
         <a href="view_post.php?get_id=<?= $post_id; ?>" class="btn">Mis referencias</a>
         <a href="update.php" class="btn">Editar perfil</a>
         <a href="helpers/logout.php" class="delete-btn" onclick="return confirm('¿Esta seguro de cerrar sesión?');">Cerrar sesion</a>
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