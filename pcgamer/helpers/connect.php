<?php 
   define('BASE_URL', 'http://localhost/rating/pcgamer/');
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
   }else{
      $user_id = '';
      $post_id = '';
   }

?>
<?php 
// SERVER
// $db_name = 'mysql:host=localhost:3306;dbname=jardins8_pc';
// $db_user_name = 'jardins8_widget';
// $db_user_pass = '55j8UIOwsS.';

// $conn = new PDO($db_name, $db_user_name, $db_user_pass);

// function create_unique_id(){
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $characters_lenght = strlen($characters);
//     $random_string = '';
//     for($i = 0; $i < 20; $i++){
//       $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
//     }
//     return $random_string;
// }


//    if(isset($_COOKIE['user_id'])){
//       $user_id = $_COOKIE['user_id'];
//       $post_id = $_COOKIE['post_id'];
//    }else{
//       $user_id = '';
//       $post_id = '';
//    }

?>