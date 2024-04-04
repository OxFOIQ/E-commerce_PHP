<?php
include("connect.php");

if (isset($_POST["update"])){

$input_code = $_POST["conf_code"];
$mail= $_POST["remail"];

$error = array();

if (empty($input_code)){
  array_push($error , "field is required to verify");
}

if (!ctype_digit($input_code)){
  array_push($error , "code should contain only digits");
}

if (strlen($input_code) != 6){
  array_push($error , "code should contain 6 digits exactly");
}

  $request="SELECT email , code FROM user WHERE code = '$input_code' ";

  $response=mysqli_query($connection,$request);
 
  $user=mysqli_fetch_array($response,MYSQLI_ASSOC);


if ($response){

  if ($input_code != $user["code"] || $mail!= $user["email"]){
    array_push($error , "wrong code or email");
    header("location: account_fail_created.php");
    exit() ;
  }
    if (count($error) === 0 && $input_code === $user["code"] && $mail===$user["email"]){
    $up_verif_stat= "UPDATE user SET verif_status = '1' where email = '$mail' ";
    if(mysqli_query($connection, $up_verif_stat)){
      header("location: account_succ_created.php");
      exit();
    }
      // }else{
      //   header("location: account_fail_created.php");
      //   exit();
      // }
  }
}

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Conf sign</title>
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
    
<div class="container-fluid bg-black ">
<!-- backgorud color noir -->

  <div class="container-fluid ">   
    <div class="row text">

          <div class="col-lg-7 col-sm-12 col-md-12">
            <img class="img-fluid rounded-5 w-75 p-0 m-0" src="./our prodcuts/maaannnn.png" alt="">
          </div>
          
          <div class="col-lg-5 col-sm-12 mt-5 ">

            <div class="myform mx-5">

                    <div class="form-outline ">
                        <!-- <input type="hidden" name="code" value="<?php if(isset($_GET['code'])){echo $_GET['code'];}?>"/> -->
                        <input type="hidden" name="code" value="<?php if(isset($_GET['code'])){echo $_GET['code'];}?>"/>

                      </div>

                      <form action="verifsign.php" method="POST" >
                            <h2 class="text-center text-break text-light mt-5">Check your Mailbox</h2>
                            <div class="form-outline ">
                                <input type="email" name="remail" id="form3Example6" class=" form-control mt-5 w-100" placeholder="Enter Email Adress" />
                                <i class="fa-solid fa-envelope text-light"></i>
                                <label class="form-label text-light" for="form3Example6">Email address</label>
                              </div>
                              <div class="form-outline ">
                                <input type="text" name="conf_code" id="" class=" form-control mt-4 w-100" placeholder="Enter Verification Code" />
                                <i class="fa-solid fa-key text-light"></i>
                                <label class="form-label text-light" for="form3Example6">Activation Code</label>
                              </div>

                                <!-- sign in buttom -->
                                  <button type="submit" name="update"  class="btn btn-dark mt-4 mb-4 ">Activate</button> 
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