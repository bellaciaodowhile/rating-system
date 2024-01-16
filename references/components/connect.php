<?php 
  define('BASE_URL', 'http://localhost/rating/references/');
  $db_name = 'mysql:host=localhost;dbname=reviews_db';
  $db_user_name = 'root';
  $db_user_pass = '';

  $conn = new PDO($db_name, $db_user_name, $db_user_pass);

  function create_unique_id(){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $characters_lenght = strlen($characters);
      $random_string = '';
      for($i = 0; $i < 20; $i++){
         $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
      }
      return $random_string;
  }

  if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
      $post_id = $_COOKIE['post_id'];
      if (isset($_COOKIE['user_vip'])) {
         $user_vip = $_COOKIE['user_vip'];
      } else {
         $user_vip = '';
      }
      if (isset($_COOKIE['user_vipstatus'])) {
         $user_vipstatus = $_COOKIE['user_vipstatus'];
      } else {
         $user_vipstatus = '';
      }
  }else{
      $user_id = '';
      $post_id = '';
  }

?>
<?php 
// SERVER
   //    $db_name = 'mysql:host=localhost:3306;dbname=leonel_rating';
   //    $db_user_name = 'leonel_rating';
   //    $db_user_pass = '55j8UIOwsS.';
      
   //    $conn = new PDO($db_name, $db_user_name, $db_user_pass);
      
   //    function create_unique_id(){
   //       $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   //       $characters_lenght = strlen($characters);
   //       $random_string = '';
   //       for($i = 0; $i < 20; $i++){
   //          $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
   //       }
   //       return $random_string;
   //    }

   // if(isset($_COOKIE['user_id'])){
   //    $user_id = $_COOKIE['user_id'];
   //    $post_id = $_COOKIE['post_id'];
   //    if (isset($_COOKIE['user_vip'])) {
   //       $user_vip = $_COOKIE['user_vip'];
   //    } else {
   //       $user_vip = '';
   //    }
   //    if (isset($_COOKIE['user_vipstatus'])) {
   //       $user_vipstatus = $_COOKIE['user_vipstatus'];
   //    } else {
   //       $user_vipstatus = '';
   //    }
   // }else{
   //    $user_id = '';
   //    $post_id = '';
   // }

?>