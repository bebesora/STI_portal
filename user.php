<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}
?>
<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student page</title>
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
                    <span class="name"><?php echo $_SESSION['user_name']?></span>
                    <span class="profession">Student</span>
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
                <div class="enrollHeader">
                    <h4>Enrollment</h4>
                        <form>
                        <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 12px;">Mode of Payment</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Cash</option>
                        <option value="1">Installment</option>
                        </select>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-size: 12px;">Student's Mobile #</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-size: 11px;">Guardian's Mobile #</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Section</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                <p>BSIT 1.1A</p> 
                                <button type="submit" class="btn btn-primary" id ="enrollbtn1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Show</button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Schedule</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="excel1">
                                                <table><?php
                                                // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
                                                require "vendor/autoload.php";
                                                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                                                $spreadsheet = $reader->load("Sample-Schedule-RAF.xlsx");
                                                $worksheet = $spreadsheet->getActiveSheet();
                                                
                                                // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
                                                foreach ($worksheet->getRowIterator() as $row) {
                                                // (B1) READ CELLS
                                                $cellIterator = $row->getCellIterator();
                                                $cellIterator->setIterateOnlyExistingCells(false);
                                                
                                                // (B2) OUTPUT HTML
                                                echo "<tr>";
                                                foreach ($cellIterator as $cell) { echo "<td>". $cell->getValue() ."</td>"; }
                                                echo "</tr>";
                                                }
                                                ?></table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                <p>BSIT 1.1B</p> 
                                <button type="submit" class="btn btn-primary" id ="enrollbtn2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Show</button>
                                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Schedule</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="excel1">
                                                <table><?php
                                                // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
                                                require "vendor/autoload.php";
                                                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                                                $spreadsheet = $reader->load("Sample-Schedule-RAF.xlsx");
                                                $worksheet = $spreadsheet->getActiveSheet();
                                                
                                                // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
                                                foreach ($worksheet->getRowIterator() as $row) {
                                                // (B1) READ CELLS
                                                $cellIterator = $row->getCellIterator();
                                                $cellIterator->setIterateOnlyExistingCells(false);
                                                
                                                // (B2) OUTPUT HTML
                                                echo "<tr>";
                                                foreach ($cellIterator as $cell) { echo "<td>". $cell->getValue() ."</td>"; }
                                                echo "</tr>";
                                                }
                                                ?></table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                <label class="form-check-label" for="gridRadios3">
                                <p>BSIT 1.1C</p> 
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                <label class="form-check-label" for="gridRadios3">
                                <p>BSIT 1.1D</p> 
                                </label>
                            </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary" id ="enrollbtn3">Enroll</button>
                        </form>
                </div>
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