<?php 


include("../user_side/connect.php");

if(isset($_POST["login"])){
    $admin_mail =$_POST["adminmail"];
    $admin_pass =$_POST["adminpass"];

    // if ($admin_mail==="admin@storeal.com" && $admin_pass ==="admin123" ){
    //     $_SESSION["admin"]="yes";
    //             header("location: dashboard.php");
    //             die();
    //         }else{
    //             echo"Password Wrong";
    // }

        $request=" SELECT * FROM admininfo WHERE mail = '$admin_mail' ";

        $reply=mysqli_query($connection,$request);

        $admin=mysqli_fetch_array($reply,MYSQLI_ASSOC);

        if($admin){
            // if(password_verify($admin_pass,$admin["pass"])){
            if ($admin_pass === $admin["pass"] ){
                session_start();
                $_SESSION["admin"]="yes";
                header("location: dashboard.php");
                exit ;
            }else{
                echo"Password Wrong";
            }

        }else{
            echo"something went wrong";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ADMIN</title>
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
        <link rel="stylesheet" href="../user_side/formulaire.css">
        </head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand text-white" id="storyel" href="#">STORYEL</a>
                    <button id="bouton" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
            </div>
        </nav>   
    </header>      

   <br> <br>
    
<div class="container-fluid bg-black">
<!-- backgorud color noir -->

  <div class="container-fluid ">   
    <div class="row text">

          <div class="col-lg-7 col-sm-12 col-md-12 mt-5">
            <img class="img-fluid rounded-3 w-100 mt-5" src="../user_side/our prodcuts/model-2598393.jpg" alt="">
          </div>
          
          <div class="col-lg-5 col-sm-12 mt-5">


                <div class="myform mx-5">


                    <!-- signin/register table -->
                            <nav>
                                <div class="nav nav-tabs mytab" id="nav-tab" role="tablist">
                                    <button class="nav-link active mt-4 text-white bg-black" id="nav-signin-tab" data-bs-toggle="tab" data-bs-target="#nav-signin" 
                                        type="button" role="tab" aria-controls="nav-signin" aria-selected="true">Sign In
                                    </button>
                                </div>
                            </nav>


                            <form action="admin_sign_in.php" method="POST">
                                    <!-- Email input -->
                                    <div class="form-outline ">
                                        <input type="email" name="adminmail" id="form3Example6" class=" form-control mt-5 w-100" placeholder="Enter Email Adress" />
                                        <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                        <i class="fa-solid fa-envelope text-light"></i>
                                        <label class="form-label text-light" for="form3Example6">Email address</label>
                                        <!-- <div class="valid-feedback">Valid.</div> -->
                                    </div>
                                    
                                    <!-- Password input -->
                                    <div class="form-outline">
                                        <input type="password"  name="adminpass" id="form3Example7" class="form-control mt-4 w-100" placeholder="Enter Password" />
                                        <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                        <i class="fa-solid fa-lock text-light"></i>
                                        <label class="form-label text-light" for="form3Example7">Password</label>
                                        <!-- <div class="valid-feedback ">Valid.</div> -->
                                    </div>

                                        <!-- sign in buttom -->
                                     <button type="submit" name="login"  class="btn btn-dark mt-4 mb-4 ">Sign In</button> 
                                        
                            </form>
                </div>

        </div>
  </div>


    <div class="container-fluid" >
        <footer class="text-black text-center text-lg-start footy">
            <div class="container p-4">
                <div class="row mt-4 justify-content-center align-items-center">

                    <div class="col-lg-4 col-md-12 mb-md-0 mt-5 text-light">

                        <ul class="fa-ul " >
                            <li class="mb-3 fw-bolder font-monospace">
                            <span class="fa-li "></span><span class="ms-3"></span>
                            </li>
                            <li class="mb-3 fw-bold font-monospace">
                            <span class="fa-li"></span><span class="ms-3"></span>
                            </li>
                            <li class="mb-0 fw-bold font-monospace">
                            <span class="fa-li"></span><span class="ms-3"></span>
                            </li>
                        </ul>
                    
                    </div>

                </div>
            </div>

        </footer>

    </div>

    </div>


</div>

<!-- <script src="../somescript.js" ></script>     

<script src="Country+State+District-City-Data.js" ></script>      -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     
</body>
</html>