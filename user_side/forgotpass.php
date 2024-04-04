<?php
include("connect.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


if(isset($_POST["verify"])){

    $email =mysqli_real_escape_string ($connection ,$_POST["email"]) ;

    $token=md5(rand());
  
    $check_mail = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

    $check_mail_run = mysqli_query($connection,$check_mail);

  if(mysqli_num_rows($check_mail_run) > 0 ){

    $mailfound= mysqli_fetch_array($check_mail_run);
    $get_name=$mailfound["firstname"];
    $get_email=$mailfound["email"];
    $Update_Token = "UPDATE user set verify_token ='$token' where email = '$get_email' LIMIT 1" ;

    $Update_Token_Exec=mysqli_query($connection,$Update_Token);

    if($Update_Token_Exec){
        // send_password_reset($get_name,$get_email,$token);
        $mail = new PHPMailer(true);
        $mail->isSMTP();                 
        $mail->SMTPAuth   = true;     
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Username   = 'mzoughiamyyne@gmail.com'; 
        $mail->Password   = 'cukfilefnyiixpvq';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('support@Storeal.com');
        $mail->addAddress($get_email); 
        $mail->isHTML(true); 
        $mail->Subject = 'Reset Password ';
        $mail_template = "
          <h2>Hello</h2>
          <h3>You are receiving this email because we received a password reset request for your account.</h3>
          <br/><br/>
          <a href='http://localhost/ecomsite/user_side/updatepassword.php?token=$token&email=$get_email'> Click Me To reset your Password </a>
          " ;

          http://localhost/user_side/updatepassword.php

        $mail->Body = $mail_template ;
        $mail->send();
        
        $_SESSION["status"] = "Check your email box";
        header("Location: formulaire.php");
        exit ;
    }else{
      $_SESSION["status"] = "Something went wrong. #1 ";
      header("Location: forgotpass.php");
        die();
    }

}else{
    $_SESSION["status"] = "Email not found ";
    header("Location: formulaire.php");
    die();
}

}

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ForgotPass</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li class="nav-item">
                    <a class="nav-link " id="navbari" href="formulaire.php">Sign in </a>
                </li>

                </ul>
            </div>
            </div>
        </nav>   
    </header>      

   <br> <br>
    
<div class="container-fluid bg-black">

  <div class="container-fluid ">   
    <div class="row">

          <div class="col-lg-7 col-sm-12 col-md-12">
            <img class="img-fluid rounded-5 w-75 p-0 m-0" src="./our prodcuts/maaannnn.png" alt="">
          </div>
          
            <div class="col-lg-5 col-sm-12 mt-5"> <br><br><br>
                    <h1 class="text-light text-center text-break">Reset Your Password</h1>
                    <p class="text-light text-center text-break"> Check your mail box to Confirm your request</p>
                <div class="myform mx-5">    

                <form action="forgotpass.php" method="POST">

                      <div class="form-outline ">
                                <input type="email" name="email" id="form3Example6" class=" form-control mt-5 w-100" placeholder="Enter Email Adress" />
                                <i class="fa-solid fa-envelope text-light"></i>
                                <label class="form-label text-light" for="form3Example6">Email address</label>
                      </div>
                                <button type="submit" name="verify"  class="btn btn-dark mt-4 mb-4 ">Verify</button> 
                      </form>
                </div>
            </div>
    </div>
  </div>

    <div class="container-fluid" >

      <footer class="text-black text-center text-lg-start footy">

      <div class="container p-4">

      <div class="row mt-4 justify-content-center align-items-center">

          <div class="col-lg-8 col-md-12 mb-4 mb-md-0 ">
              <div class="mt-4">

              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>

                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google"></i></a>

                <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>

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