<?php

@include 'config.php';

session_start();


?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrar page</title>
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
                    <span class="name"><?php echo $_SESSION['registrar_name']?></span>
                    <span class="profession">Registrar</span>
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
                    <li class="nav-link" onclick="show2()">
                        <a href="#">
                            <i class='bx bxs-edit icon'></i>
                            <span class="text nav-text" onclick="show2()">Enrollment</span>
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
    </section>
</body>
    <script src="script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>