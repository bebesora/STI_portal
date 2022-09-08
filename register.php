<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']); 
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="form-container">
            <img class="logo" src="images/stidasmalogo.png" alt="">
            <form action="" method="post">
               <h3>register now</h3>
               <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
               ?>
               <input type="text" name="name" required placeholder="Enter your name">
               <input type="email" name="email" required placeholder="Enter your email">
               <input type="text" name="student number" required placeholder="Enter your student number">
               <input type="password" name="password" required placeholder="Enter your password">
               <input type="password" name="cpassword" required placeholder="Confirm your password">
               <select name="user_type">
                  <option value="user">New Student</option>
                  <option value="user">Existing Student</option>
                  <option value="admin">admin</option>
                  <option value="registrar">registrar</option>
                  <option value="accounting">accounting</option>
                  <option value="admission">admission</option>
                  <option value="guidance">guidance</option>
               </select>
               <input type="submit" name="submit" value="register now" class="form-btn">
               <p>already have an account? <a href="login.php">login now</a></p>
            </form>
         
         </div>
         
    </body>
</html>