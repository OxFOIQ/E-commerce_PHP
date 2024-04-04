
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>signForm</title>
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


               <!-- signin/register table -->
              <nav>
                <div class="nav nav-tabs mytab" id="nav-tab" role="tablist">
                  <button class="nav-link active mt-4 text-white bg-black" id="nav-signin-tab" data-bs-toggle="tab" data-bs-target="#nav-signin" 
                  type="button" role="tab" aria-controls="nav-signin" aria-selected="true">Sign In
                  </button>

                  <button class="nav-link mt-4 text-white bg-black" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" 
                  type="button" role="tab" aria-controls="nav-register" aria-selected="false">Register
                  </button>
                </div>
              </nav>
               <!-- signin/register table -->

                  <div class="tab-content" id="nav-tabContent">

                                <!-- Sign in -->
                    <div class="tab-pane fade show active " id="nav-signin" >
                      <!-- <form action="veriform.php" method="POST"  class="was-validated"> -->
                      <form action="Signin.php" method="POST" >

                        
                              <!-- Email input -->
                              <div class="form-outline ">
                                <input type="email" name="mail" id="form3Example6" class=" form-control mt-5 w-100" placeholder="Enter Email Adress" />
                                <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                <i class="fa-solid fa-envelope text-light"></i>
                                <label class="form-label text-light" for="form3Example6">Email address</label>
                                <!-- <div class="valid-feedback">Valid.</div> -->

                              </div>
                            
                              <!-- Password input -->
                              <div class="form-outline">
                                <input type="password"  name="pass" id="form3Example7" class="form-control mt-4 w-100" placeholder="Enter Password" />
                                <!-- <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                                <i class="fa-solid fa-lock text-light"></i>
                                <label class="form-label text-light" for="form3Example7">Password</label>
                                <!-- <div class="valid-feedback ">Valid.</div> -->
                              </div>

                                <!-- sign in buttom -->
                                  <button type="submit" name="login"  class="btn btn-dark mt-4 mb-4 ">Sign In</button> 
                                 <!-- sign in buttom -->
                                 <a href="forgotpass.php" class="link-underline-danger mt-5 float-end">Forgot Password ?</a>
                      </form>

                    </div>
                          <!-- Sign in -->
    

                            <!-- register -->

                    <div class="tab-pane fade " id="nav-register" >
                      <form action="Signup.php" method="POST">
                      <!-- <form action="formulaire.php" method="POST" class="was-validated"> -->

                        <!-- Full name input -->
                        <div class="form-group mt-5">
                          <div class="input-group w-100">
                            <input type="text" name="firstname" id="firstname"  aria-label="First name" class="form-control" placeholder="First Name" >
                            <input type="text" name="lastname" id="lastname" aria-label="Last name" class="form-control" placeholder="Last Name" >
                          </div>
                            <i class="fa-solid fa-user text-light"></i>
                            <label for="fname" class="text-light">Full Name</label>
                            <p  id="fullnamemsg"></p>
                        </div>

                            <!-- <div class="form-group">
                              <input type="text" class="form-control mt-4 d-block w-100" id="fname" placeholder="Enter First Name" name="fname" required>
                              <i class="fa-solid fa-user text-light"></i>
                              <label for="fname" class="text-light">First Name:</label>
                              <div class="invalid-feedback">Please fill out this field with right info.</div> -->
                            <!-- </div> -->
                          

                          
                          <!-- <div class="form-group">
                          <input type="text" class="form-control mt-4 d-block w-100" id="lname" placeholder="Enter Last Name" name="lname" required>
                          <i class="fa-solid fa-user text-light"></i>
                          <label for="fname" class="text-light">Last Name:</label>
                          </div> -->


                      
    <!-- ================================================================== -->

                            <!-- Location -->

                          <div class="form form-check-label mb-4 mt-4 w-100 ">
                            <select class="form-control " name="state" id="countySel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                            <i class="fa-solid fa-map-location-dot text-light"></i>
                            <label class="form-label text-light" for="form3Example3">Your Country</label>
                          </div>

                          
                          <div class="form form-check-label mb-4 w-100">
                            <select class="form-control " name="countrya" id="stateSel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                              <i class="fa-sharp fa-solid fa-location-dot text-light"></i>
                              <label class="form-label text-light" for="form3Example3">Your State</label>
                          </div>


                          <div class="form form-check-label mb-4 w-100">
                            <select class="form-control " name="district" id="districtSel" aria-label=".form-select-lg" >
                              <option selected></option>
                            </select>
                            <i class="fa-sharp fa-solid fa-house-flag text-light"></i>
                            <label class="form-label text-light" for="form3Example3">Your District</label>
                          </div>


     <!-- ========================================================================= -->


                          <!-- Email signup -->
                          <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control mt-4 w-100" placeholder="Enter Email Adress" />
                              <i class="fa-solid fa-envelope text-light"></i>
                              <label class="form-label text-light" for="form3Example3">Email Address</label>
                          </div>


                        <!-- Password signup -->
                        <div class="form-group">
                          <input type="password" name="password" class="form-control mt-4 w-100" id="pwnd" placeholder="Enter Password" name="pswd" >
                          <i class="fa-solid fa-lock text-light"></i>
                          <label for="pwd" class="text-light">Password:</label>
                          <p  id="messageee"><span id="strength"></span></p>
                          <div class="valid-feedback">Valid.</div>
                          <!-- <div class="invalid-feedback">Please fill out this field with the right info.</div> -->
                        </div>


                      <!-- Password Confirmation signup -->
                        <div class="form-outline mb-4">
                          <input type="password" name="passwordconfirm" id="form3Example5" class="form-control mt-4 w-100" id="confpwnd" placeholder="Confirm Password" name="confirmpass" />
                          <i class="fa-solid fa-key text-light"></i>
                          <label class="form-label text-light" for="form3Example5">Confirm Password</label>
                          <p  id="matchornot"><span id=""></span></p>

                        </div>


                        <!-- phone number singup -->
                        <div class="form-outline mb-4">
                          <input type="tel" id="typePhone" name="phonenumber" class="form-control w-100" placeholder="+XXX-XXXXXXXX" 
                                  pattern="['+']{1}[0-9]{3}-[0-9]{8}" />
                          <i class="fa-solid fa-phone text-light"></i>
                          <label class="form-label text-light" for="form3Example5">Telephone Number</label>
                        </div>


                        <!-- Submit button signup-->
                          <button type="submit" name="submit" class="btn btn-dark mb-4">Sign up</button>
                       
                      </form>

                    </div>
                              
                          <!-- register -->
                  </div>
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

<script src="somescript.js" ></script>     

<script src="Country+State+District-City-Data.js" ></script>     

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     
</body>
</html>