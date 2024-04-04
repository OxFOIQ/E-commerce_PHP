<?php

session_start() ;

include("../user_side/connect.php");


if (!isset($_SESSION["admin"])){
  header("Location: admin_sign_in.php");
  exit ;
}


if(isset($_POST["register"])){

    $firstname =mysqli_real_escape_string($connection , $_POST["firstname"]) ;
    $lastname =mysqli_real_escape_string ($connection , $_POST["lastname"]);
    $state =  $_POST["state"];
    $country = $_POST["countrya"];
    $district = $_POST["district"];
    $email = mysqli_real_escape_string ($connection , $_POST["email"]);
    $password = mysqli_real_escape_string ($connection , $_POST["password"]);
    $passwordconfirm = mysqli_real_escape_string ($connection , $_POST["passwordconfirm"]);
    $phonenumber = mysqli_real_escape_string ($connection , $_POST["phonenumber"]);
    $passwordhash=password_hash($password,PASSWORD_DEFAULT);
    $error = array();
  
    if (empty($firstname) OR empty($lastname)OR empty($state) 
    OR empty($country )OR empty($district)OR empty($email)OR empty($password)
    OR empty($passwordconfirm)OR empty($phonenumber)){
      array_push($error , "all fields are required");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error , "email not valid bro");
      }
  
    if ($password !== $passwordconfirm){
    array_push($error , "Password does not much ");
    } 
    
    $req="SELECT * FROM user WHERE email='$email'";
    $result=mysqli_query($connection,$req);
    if (mysqli_num_rows($result) > 0){
      array_push($error , "Please change email , Existing account");
    }
  
    if (count($error) > 0){
      foreach($error as $err){
        echo"<div class='alert alert-danger w-50'>$err</div>";
      }

    }else{
    // insert data 
    $verif_status = 1;
    $req="INSERT INTO user (firstname,lastname,country,state,district,email,password,phonenumber,verif_status) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($connection);
    $prepare=mysqli_stmt_prepare( $stmt,$req);

    if($prepare){
      mysqli_stmt_bind_param($stmt,"ssssssssi",$firstname,$lastname,$country,$state,$district,$email,$passwordhash,$phonenumber,$verif_status);
      mysqli_stmt_execute($stmt);
             echo"<div class='alert alert-success w-50'>SUCCESS REGISTRATION</div>";
      }
    }
  }


?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title> ADD </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>


    <nav class="navbar navbar-expand-lg navbar-dark gradient-custom fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold mx-5" href="#">STOREAL</a>
    
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars text-dark"></i>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
            <li class="nav-item text-center mx-2 mx-lg-1">
              <a class="nav-link" href="messages.php">
                <div>
                  <i class="fas fa-bell fa-lg mb-1"></i>
                  <span class="badge rounded-pill badge-notification bg-dark"></span>
                </div>
                Messages
              </a>
            </li>
            <li class="nav-item text-center mx-2 mx-lg-1">
              <a class="nav-link" href="#!">
                <div>
                  <i class="fas fa-globe-americas fa-lg mb-1"></i>
                  <span class="badge rounded-pill badge-notification bg-dark"></span>
                </div>
                News
              </a>
            </li>
          </ul>
    
          <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
            <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-white" type="submit" data-mdb-ripple-color="dark">
              Search
            </button>
          </form>


          <li class="nav-item text-center mx-2 mx-lg-1">
              <a class="nav-link text-dark" href="adminlogout.php">
                <div>
                  <i class="fas fa-bell fa-lg mb-1"></i>
                </div>
                LogOut
              </a>
            </li>
        </div>
      </div>
    </nav>

  <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark mt-4"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="dashboard.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
             <li class="my-4"><hr class="dropdown-divider bg-dark" /></li> 
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                All users 
              </div>
            </li>
                <li>
              <a href="layouts.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Layouts</span>
              </a>
            </li>
            <li>
                <a href="client_feedback.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                  <span>Reviews</span>
                </a>
            </li>

            <li>
                <a href="#" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                  <span>ADD</span>
                </a>
            </li>
            <li>
                <a href="remove.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                  <span>Remove</span>
                </a>
            </li>
            <li>
                <a href="update.php" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                  <span>Update</span>
                </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
       
        <div class="row">
          <div class="col-lg-12 mb-3">

            <div class="card">
                
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> ADD Users
              </div>


                
                    <form action="add.php" method="POST">
                      <!-- <form action="formulaire.php" method="POST" class="was-validated"> -->

                        <!-- Full name input -->
                        <div class="form-group mt-5">
                          <div class="input-group w-100">
                            <input type="text" name="firstname" id="firstname"  aria-label="First name" class="form-control" placeholder="First Name" >
                            <input type="text" name="lastname" id="lastname" aria-label="Last name" class="form-control" placeholder="Last Name" >
                          </div>
                            <i class="fa-solid fa-user text-dark"></i>
                            <label for="fname" class="text-dark">Full Name</label>
                            <p  id="fullnamemsg"></p>
                        </div>
                      
    <!-- ================================================================== -->

                            <!-- Location -->

                          <div class="form form-check-label mb-4 mt-4 w-100 ">
                            <select class="form-control " name="state" id="countySel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                            <i class="fa-solid fa-map-location-dot text-dark"></i>
                            <label class="form-label text-dark" for="form3Example3"> Country</label>
                          </div>

                          
                          <div class="form form-check-label mb-4 w-100">
                            <select class="form-control " name="countrya" id="stateSel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                              <i class="fa-sharp fa-solid fa-location-dot text-dark"></i>
                              <label class="form-label text-dark" for="form3Example3"> State</label>
                          </div>


                          <div class="form form-check-label mb-4 w-100">
                            <select class="form-control " name="district" id="districtSel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                            <i class="fa-sharp fa-solid fa-house-flag text-dark"></i>
                            <label class="form-label text-dark" for="form3Example3"> District</label>
                          </div>


     <!-- ========================================================================= -->


                          <!-- Email signup -->
                          <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control mt-4 w-100" placeholder="Enter Email Adress" />
                              <i class="fa-solid fa-envelope text-dark"></i>
                              <label class="form-label text-dark" for="form3Example3">Email Address</label>
                          </div>


                        <!-- Password signup -->
                        <div class="form-group">
                          <input type="password" name="password" class="form-control mt-4 w-100" id="pwnd" placeholder="Enter Password" name="pswd" >
                          <i class="fa-solid fa-lock text-dark"></i>
                          <label for="pwd" class="text-dark">Password:</label>
                          <p  id="messageee"><span id="strength"></span></p>
                          <div class="valid-feedback">Valid.</div>
                          <!-- <div class="invalid-feedback">Please fill out this field with the right info.</div> -->
                        </div>


                      <!-- Password Confirmation signup -->
                        <div class="form-outline mb-4">
                          <input type="password" name="passwordconfirm" id="form3Example5" class="form-control mt-4 w-100" id="confpwnd" placeholder="Confirm Password" name="confirmpass" />
                          <i class="fa-solid fa-key text-dark"></i>
                          <label class="form-label text-dark" for="form3Example5">Confirm Password</label>
                          <p  id="matchornot"><span id=""></span></p>

                        </div>


                        <!-- phone number singup -->
                        <div class="form-outline mb-4">
                          <input type="tel" id="typePhone" name="phonenumber" class="form-control w-100" placeholder="+XXX-XXXXXXXX" 
                                  pattern="['+']{1}[0-9]{3}-[0-9]{8}" />
                          <i class="fa-solid fa-phone text-dark"></i>
                          <label class="form-label text-dark" for="form3Example5">Telephone Number</label>
                        </div>


                        <!-- Submit button signup-->
                          <button type="submit" name="register" class="btn btn-dark mb-4">Register</button>
                       
                      </form>


            </div>
          </div>

        </div>
      </div>
    </main>
    <script src="../user_side/Country+State+District-City-Data.js"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>

