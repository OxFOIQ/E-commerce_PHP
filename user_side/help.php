<?php
session_start();

if (!isset($_SESSION["user"])){
    header("Location: formulaire.php");
    die();
  }

include("../user_side/connect.php");

$email= $_SESSION["email"] ;

if (isset($_POST['help'])){

$text=mysqli_real_escape_string($connection,$_POST['gethelp']);
$error = array();

  if (empty($text)){
    array_push($error , "you should write something");
  }

  if (!preg_match("/^[a-zA-Z0-9\s]+$/", $text)) {
    array_push ($error ,"something wrong");
  } 
  

  if (count($error)===0){
    $help_request = "UPDATE user SET help = ? WHERE email = ? ";
    $stmt = mysqli_stmt_init($connection);
    $prepare=mysqli_stmt_prepare($stmt,$help_request) ;
        if ($prepare){
            mysqli_stmt_bind_param($stmt,"ss",$text,$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
}



}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HELP</title>
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

<style>

    body{
        padding-top: 120px;
        box-sizing: border-box;
    }
</style>
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
                <a class="nav-link" id="navbari" href="home.php">
                <i class="fa-solid fa-envelope mx-2"></i></i>Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="product.php">
                  <i class="fas fa-cart-shopping mx-2"></i>Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="help.php">
                  <i class="fas fa-info mx-2"></i>Help
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


        <section class="p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
              <h2 class ="text-break text-center mb-5">We'll Try To Solve Ur Problem Withing 24H Or Less</h2>
              <div class="card">
                  <div class="card-body m-3">
                    <div class="row">
                          <form action="help.php" method="POST" class="">
                              <div class="col-lg-10">
                                  <p class="fw-bold lead mb-2"><strong><?= $_SESSION['firstname'] ." ".$_SESSION['lastname'] ?></strong></p>
                                  <p class="fw-bold text-muted mb-3">Request</p>
                                  <p class="text-muted fw-light mb-4">
                                      <textarea name="gethelp" class="form-control w-100" placeholder="Write Your Request To Get Help From Our Support .." rows="6"></textarea>
                                      <label class="form-label" for="form4Example6">GET HELP WHITIN 24H ..</label>
                                  </p>
                              </div>
                              <div class="container text-center">
                                  <button type="submit" name="help" class="btn btn-dark p-3">Submit</button>
                              </div>
                          </form>
                        </div>
                  </div>
              </div>
            </div>
        </div>
        </section>
        
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     
</body>
</html>