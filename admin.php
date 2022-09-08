<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>admin page</title>
        <link rel="stylesheet" href="css/style2.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="images/stidasmalogo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?php echo $_SESSION['admin_name']?></span>
                    <span class="profession">Admin</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">


                <ul class="menu-links">
                    <li class="nav-link" onclick="show()">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i> 
                            <span class="text nav-text" onclick="show()">Home</span>
                        </a>
                    </li>
                    <li class="nav-link" onclick="show6()">
                        <a href="#">
                            <i class='bx bxs-dashboard icon'></i>
                            <span class="text nav-text" onclick="show()">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link" onclick="show2()">
                        <a href="#">
                            <i class='bx bxs-edit icon'></i>
                            <span class="text nav-text" onclick="show2()">Enrollment</span>
                        </a>
                    </li>
                    <li class="nav-link" onclick="show5()">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text" onclick="show5()">Payment</span>
                        </a>
                    </li>
                    <li class="nav-link" onclick="show4()">
                        <a href="#">
                        <i class='bx bxs-book-content icon' ></i>
                            <span class="text nav-text" onclick="show4()">Handbook</span>
                        </a>
                    </li>
                    <li class="nav-link" onclick="show3()">
                        <a href="#">
                            <i class='bx bxs-news icon' ></i>
                            <span class="text nav-text" onclick="show3()">News</span>
                        </a>
                    </li>  


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                
                
            </div>
        </div>

    </nav>

    <section class="home">
            <div class = "home1" id = "idHome">
            <img src="images/stiA.jpg" alt="">
            </div>
            <div class = "home2" id = "idHome2">
            <img src="images/enroll.png" alt="">
            </div>
            <div class = "home3" id = "idHome3">
            <img src="images/grad.png" alt="">
            </div>
            <div class = "home4" id = "idHome4">
            <embed src="handbook/handbook.pdf" type="application/pdf" width="100%" height="800px" />
            </div>
            <div class = "home4" id = "idHome4">
            <embed src="handbook/handbook.pdf" type="application/pdf" width="100%" height="800px" />
            </div>
            <div class = "home5" id = "idHome5">
                <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
        <div class = "home6" id = "idHome6">
        <div class="tblHeaders">
            <h4>Registered User</h4>
            <div class="tblBody">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <button type="submit" class = "button editBtn" style = "background-color: green;  margin-left: 80%;" data-bs-toggle="modal" data-bs-target="#myModal2"> ADD USER</button>
                    <?php
                    $query = "SELECT * FROM user";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                            ?>
                            <tr>
                                <td><?= $row['id'];?></td>
                                <td><?= $row['name'];?></td>
                                <td><?= $row['email'];?></td>
                                <td><?= $row['user_type'];?></td>  
                                <form action="" form = "GET">
                                <input type="hidden" name = "input" value="<?=$row['id']?>">
                                </form>
                                <td><button type="submit" class = "button editBtn" data-bs-toggle="modal" data-bs-target="#myModal" > Edit </button> </td>                                                  
                                <td><button type="submit" class = "button editBtn" style = "background-color: red;"> Delete </button></td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                     ?>
                        <tr>
                            <td colspan = "6">No Record Found</td>
                        </tr>
                     <?php   
                    }
                    ?>
                     <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if(isset($_GET["input"])){
                                                    $user_id = $_GET["input"];
                                                    $users = "SELECT * FROM user WHERE id ='$user_id'";
                                                    $users_run = mysqli_query($conn, $users);
                                                    if(mysqli_num_rows($users_run) > 0){
                                                        foreach($users_run as $user)
                                                        {
                                                            ?>

                                                            
                                                <form action="code.php" method="GET">
                                                <input type="hidden" name="user_id" value="<?=$user['id'];?>">    

                                                    <div class="mb-3">
                                                        <label class="form-label required">ID</label>
                                                        <input type="text" name="user_id" class="form-control" value="<?=$user['id'];?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Name</label>
                                                        <input type="text" name="name" class="form-control" value="<?=$user['name'];?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Email</label>
                                                        <input type="email" name="email" class="form-control" value="<?=$user['email'];?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >User Type</label>
                                                        <input type="text" name="user_type" class="form-control" value="<?=$user['user_type'];?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Password</label>
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                <button type="submit" name = "update_user" class="btn btn-primary" >Update</button>
                                            </div>
                                                </form>
                                                <?php
                                                        }
                                                    }
                                                    else{
                                                        ?>
                                                        <h4>No record found</h4>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            
                                        </div>
                                    </div>
        </div>

        <div class="modal" id="myModal2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">ADD</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                         
                                                <form action="code.php" method="GET">
                                                <input type="hidden" name="user_id">    

                                                    <div class="mb-3">
                                                        <label class="form-label required">ID</label>
                                                        <input type="text" name="user_id" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Name</label>
                                                        <input type="text" name="name" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Email</label>
                                                        <input type="email" name="email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >User Type</label>
                                                        <input type="text" name="user_type" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label required" >Password</label>
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                <button type="submit" name = "update_user" class="btn btn-primary" >ADD</button>
                                            </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
        </div>
                </tbody>
                </table>
            </div>
        </div>
        </div>
        
    </section>

</body>
<script src="script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>