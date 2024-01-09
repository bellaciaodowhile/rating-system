<?php

session_destroy();
include 'connect.php';

setcookie('user_id', '', time() - 1, '/');
setcookie('post_id', '', time() - 1, '/');

header('location:../index.php');

?>