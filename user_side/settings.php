<?php

session_start() ;

include("../user_side/connect.php");


if (!isset($_SESSION["user"])){
  header("Location: formulaire.php");
  exit ;
}


if(isset($_POST["updateprofile"])){

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
  
    // if (empty($firstname) OR empty($lastname)OR empty($state) 
    // OR empty($country )OR empty($district)OR empty($email)OR empty($password)
    // OR empty($passwordconfirm)OR empty($phonenumber)){
    //   array_push($error , "all fields are required");
    // }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error , "email not valid bro");
      }
  
    if ($password !== $passwordconfirm){
    array_push($error , "Password does not much ");
    } 
    
    $req="SELECT * FROM user WHERE email='$email'";
    $result=mysqli_query($connection,$req);

    if (mysqli_num_rows($result) == 1 OR count($error) > 0){
      $update_user="UPDATE user SET firstname = ? , lastname = ? , state = ? ,country = ? , district = ? , 
      password = ? ,phonenumber = ?  WHERE email= ? ";
      $stmt=mysqli_stmt_init($connection);
      $prepare=mysqli_stmt_prepare($stmt,$update_user);

        if($prepare){
          mysqli_stmt_bind_param($stmt,"ssssssss",$firstname,$lastname, $state,$country ,$district , $passwordhash , $phonenumber ,$email);
          mysqli_stmt_execute($stmt);
      }else{
        print("error") ;
        die();
      }
    }else{
        print("email maybe not found Or something went wrong !");
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Nova+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous">
<!-- =================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="products.css">
    <title>Settings</title>

</head>
<body>
    

<header>
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top ">
        <div class="container-fluid">
          <a class="navbar-brand text-white" id="storyel" href="home.php">STORYEL</a>
          <button id="bouton" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link " id="navbari" href="home.php"> 
                  <i class="fas fa-house-user mx-2"></i>Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="product.php">
                  <i class="fas fa-cart-shopping mx-2"></i>Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari"  href="settings.php">
                  <i class="fas fa-gear mx-2"></i>Settings
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="logout.php">
                  <i class="fas fa-right-from-bracket mx-2"></i>Log Out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>   
</header>    




<main class="mt-5 pt-3">
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-md-12">
            <h4 class="mt-4 mb-4 ">Account Informations :</h4>
          </div>
        </div>
       
        <div class="row">
          <div class="col-lg-12 mb-3">

            <div class="card">
                
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Update Profile
              </div>

                    <form action="settings.php" method="POST">
                      <!-- <form action="formulaire.php" method="POST" class="was-validated"> -->

                        <!-- Full name input -->
                        <div class="form-group mt-4">
                          <div class="input-group w-100">
                            <input type="text" name="firstname" id="firstname"  aria-label="First name" class="form-control" placeholder="First Name" >
                            <input type="text" name="lastname" id="lastname" aria-label="Last name" class="form-control" placeholder="Last Name" >
                          </div>
                            <i class="fa-solid fa-user text-dark"></i>
                            <label for="fname" class="text-dark">Full Name</label>
                            <p  id="fullnamemsg"></p>
                        </div>
                      

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
                          <button type="submit" name="updateprofile" class="btn btn-dark mb-4">Update</button>
                      </form>
            </div>
          </div>

        </div>
      </div>
    </main>


    <script src="Country+State+District-City-Data.js" ></script>     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     
</body>
</html>