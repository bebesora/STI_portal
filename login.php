<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user.php');
      }
      elseif($row['user_type'] == 'registrar'){
         $_SESSION['registrar_name'] = $row['name'];
         header('location:registrar.php');
      }
      elseif($row['user_type'] == 'accounting'){
         $_SESSION['accounting_name'] = $row['name'];
         header('location:accounting.php');
      }
      elseif($row['user_type'] == 'admission'){
         $_SESSION['admission_name'] = $row['name'];
         header('location:admission.php');
      }
      elseif($row['user_type'] == 'guidance'){
         $_SESSION['guidance_name'] = $row['name'];
         header('location:guidance.php');
      }
   }
   else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login</title>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
            <div class="form-container">
            <img class="logo" src="images/stidasmalogo.png" alt="">
               <form action="" method="post">
                  <h3>login now</h3>
                  <?php
                  if(isset($error)){
                     foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                     };
                  };
                  ?>
                  <input type="email" name="email" required placeholder="Enter your email">
                  <input type="password" name="password" required placeholder="Enter your password">
                  <select name="user_type">
                  <option value="user">New Student</option>
                  <option value="user">Existing Student</option>
                  </select>
                  <input type="submit" name="submit" value="login now" class="form-btn">
                  <input type="button" value="Admission" class="form-btn" style="background: #D0322D; color: white;" class="btn-close" data-bs-toggle="modal" data-bs-target="#myModal">
                  <p>don't have an account? <a href="register.php">register now</a></p>
               </form>
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Admission</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                         
                                                <form action="code.php" method="GET">
                                                <input type="hidden" name="user_id">    
                                                <label class="form-label required" >Type of student</label>
                                                   <div class="mb-3">
                                                   <select class="form-select" aria-label="Default select example">
                                                   <option value="1">New student</option>
                                                   <option value="2">Existing student</option>
                                                   </select>
                                                   </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Sti Campus</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                         <option value="1">Dasmariñas</option>
                                                         </select>
                                                    </div>
                                                    <div class="mb-3">
                                                         <label class="form-label required" >Courses</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                         <option value="1">Senior High School</option>
                                                         <option value="1">BSCS</option>
                                                         <option value="1">BSIT</option>
                                                         <option value="1">BSBA</option>
                                                         <option value="1">BSAIS</option>
                                                         <option value="1">BSA</option>
                                                         <option value="1">BSHM</option>
                                                         <option value="1">BMMA</option>
                                                         <option value="1">BACOMM</option>
                                                         <option value="1">BSTM</option>
                                                         </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                <button type="submit" name = "update_user" class="btn btn-primary" >Submit</button>
                                            </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
        </div>
    </body>
    <script src="script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>