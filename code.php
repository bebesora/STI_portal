<?php

@include 'config.php';

if(isset($_POST['update_user'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $usertype = $_POST['user_type'];

    $query ="UPDATE user SET name ='$name', email ='$email', password = '$pass', user_type='$usertype' 
    WHERE id = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    
}

?>