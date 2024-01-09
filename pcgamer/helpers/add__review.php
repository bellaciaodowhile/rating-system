<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $get_id = $_POST['idPost'];
    $id = create_unique_id();
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $rating = $_POST['rating'];
    $rating = filter_var($rating, FILTER_SANITIZE_STRING);

    $verify_review = $conn->prepare("SELECT * FROM `reviews` WHERE post_id = ? AND user_id = ?");
    $verify_review->execute([$get_id, $user_id]);

    $add_review = $conn->prepare("INSERT INTO `reviews`(id, post_id, user_id, rating, title, description) VALUES(?,?,?,?,?,?)");
    $add_review->execute([$id, $get_id, $user_id, $rating, $title, $description]);
    $success_msg[] = 'Operación exitosa!';
    if($add_review->rowCount() > 0){
        $warning_msg[] = 'Operación exitosa!';
        echo json_encode($get_id, JSON_UNESCAPED_UNICODE);
        // header('location:../view_post.php?get_id='.$get_id);
    }else{
        echo json_encode(true, JSON_UNESCAPED_UNICODE);
    }

}

?>