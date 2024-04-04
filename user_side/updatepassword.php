<?php
include("connect.php");
session_start();


if (isset($_POST['update'])){

  $email = mysqli_real_escape_string ($connection , $_POST["email"]);
  $new_pass = mysqli_real_escape_string ($connection , $_POST["new_pass"]);
  $conf_new_pass = mysqli_real_escape_string ($connection , $_POST["conf_new_pass"]);
  $new_password_hash=password_hash( $conf_new_pass,PASSWORD_DEFAULT);
  $token = mysqli_real_escape_string ($connection , $_POST["password_token"]);

  if (empty($email) OR empty($new_pass)){
    echo "all fields are required" ;
  }



  if (strlen($new_pass) < 8){
    echo "Password must be over then 8 caracter bro";
    } 
  
  
    if (!preg_match("/^[a-zA-Z]+$/", $new_pass)) {
      echo "Password should contain at least one lowercase and one uppercase letter";
    }
  
  
    if (!preg_match("#\d+#", $new_pass)) {
      echo "Password should contain at least one digit.";
    }
  
    if (!preg_match("#\W+#", $new_pass)) {
      echo "Password should contain at least one special character.";
      }


if(!empty($token)){

  if(!empty($email)&& !empty($new_pass)&& !empty($conf_new_pass)){

    $check_token_in_db= "SELECT verify_token from user where verify_token='$token' LIMIT 1" ;
    $check_token_exec= mysqli_query ($connection,$check_token_in_db);
      if(mysqli_num_rows($check_token_exec) > 0){

        if( $new_pass ===  $conf_new_pass){

          $update_password = "UPDATE user SET password='$new_password_hash' where verify_token='$token' LIMIT 1 ";
          $update_password_exec= mysqli_query ($connection,$update_password);

          if($update_password_exec){
            $new_token_generated = md5(rand())."newtokenbystoreal";
            $update_new_token = "UPDATE user SET verify_token='$new_token_generated' where verify_token='$token' LIMIT 1 ";
            $update_new_token_exec= mysqli_query ($connection,$update_new_token);

            $_SESSION["status"] = "password updated successfully";
            header("Location: product.php");
            exit();

          }else{

            $_SESSION["status"] = "password does not updated , there is something went wrong ";
            header("Location: updatepassword.php");
            exit();

          }

        }else{

        $_SESSION["status"] = "password && confirm password does not match";
        header("Location: updatepassword.php");
        exit();
        }
        
      }else{

        $_SESSION["status"] = " invalid token";
        header("Location: updatepassword.php");
        exit();
      }
  }else{

    $_SESSION["status"] = "Check your info Something wrong";
  header("Location: updatepassword.php?token=$token&email=$email");
  exit();

  }

}else{
  $_SESSION["status"] = "token not available";
  header("Location: updatepassword.php");
  exit();
}



}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UpdatePassword</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- =============================================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- ================================================================================ -->
        <link rel="stylesheet" href="formulaire.css">
        </head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top ">
            <div class="container-fluid">
            <a class="navbar-brand text-white" id="storyel" href="#">STORYEL</a>
            <button id="bouton" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " id="navbari" href="home.php">Home </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>   
    </header>      

   <br> <br>
    
<div class="container-fluid bg-black">
<!-- backgorud color noir -->

  <div class="container-fluid ">   
    <div class="row text">

          <div class="col-lg-7 col-sm-12 col-md-12">
            <img class="img-fluid rounded-5 w-75 p-0 m-0" src="./our prodcuts/maaannnn.png" alt="">
          </div>
          
          <div class="col-lg-5 col-sm-12 mt-5">

            <div class="myform mx-5">

                      <!-- <form action="veriform.php" method="POST"  class="was-validated"> -->
                      <form action="updatepassword.php" method="POST" >

                              <!-- hidden token -->
                              <div class="form-outline ">
                                <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>"/>
                              </div>

                              <!-- Email input -->
                              <div class="form-outline ">
                                <input type="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" name="email" id="form3Example6" class=" form-control mt-5 w-100" placeholder="Enter Email Adress" />
                                <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                <i class="fa-solid fa-envelope text-light"></i>
                                <label class="form-label text-light" for="form3Example6">Email address</label>
                                <!-- <div class="valid-feedback">Valid.</div> -->

                              </div>
                            
                              <!-- Password input -->
                              <div class="form-outline">
                                <input type="password"  name="new_pass" id="form3Example7" class="form-control mt-4 w-100" placeholder="Enter Password" />
                                <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                <i class="fa-solid fa-lock text-light"></i>
                                <label class="form-label text-light" for="form3Example7">Password</label>
                                <!-- <div class="valid-feedback ">Valid.</div> -->
                              </div>


                              <!-- Password Confirmation input -->
                              <div class="form-outline">
                                <input type="password"  name="conf_new_pass" id="form3Example7" class="form-control mt-4 w-100" placeholder="Enter Password" />
                                <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                <i class="fa-solid fa-lock text-light"></i>
                                <label class="form-label text-light" for="form3Example7">Password</label>
                                <!-- <div class="valid-feedback ">Valid.</div> -->
                              </div>


                                <!-- sign in buttom -->
                                  <button type="submit" name="update"  class="btn btn-dark mt-4 mb-4 ">Update</button> 
                                 <!-- sign in buttom -->
                      </form>

                    </div>    
          </div>
    </div>
  </div>



    <div class="container-fluid" >

      <footer class="text-black text-center text-lg-start footy">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row mt-4 justify-content-center align-items-center">
            <!--Grid column-->
            <div class="col-lg-8 col-md-12 mb-4 mb-md-0 ">
              <div class="mt-4">
                <!-- Facebook -->
                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
                <!-- Google -->
                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google"></i></a>
                <!-- Twitter -->
                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
                <!-- linkedin  -->
                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-md-0 mt-5 text-light">

              <ul class="fa-ul " >
                <li class="mb-3 fw-bolder font-monospace">
                  <span class="fa-li "><i class="fas fa-home text-light"></i></span><span class="ms-3">Sahline, 000-5012, Tunis</span>
                </li>
                <li class="mb-3 fw-bold font-monospace">
                  <span class="fa-li"><i class="fas fa-envelope text-light"></i></span><span class="ms-3">contact@storeal.com</span>
                </li>
                <li class="mb-0 fw-bold font-monospace">
                  <span class="fa-li"><i class="fas fa-phone text-light"></i></span><span class="ms-3">+216 53 166 663</span>
                </li>
              </ul>
            
            </div>

          </div>
        </div>

      </footer>

    </div>




</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     
</body>
</html>