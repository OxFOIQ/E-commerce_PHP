<?php

session_start() ;

include("../user_side/connect.php");


if (!isset($_SESSION["admin"])){
  header("Location: admin_sign_in.php");
  exit ;
}

if(isset($_POST["delete"])){

 $email = mysqli_real_escape_string ($connection , $_POST["email"]);
 $forlname = mysqli_real_escape_string($connection ,$_POST["forlname"]) ;
 
 $error=array() ;

if (empty($email) OR empty(($forlname))){
    array_push($error , "all field are required");
}


 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error , "email not valid bro");
  }

if (!preg_match("/^[a-zA-Z\s]+$/",$forlname)){
  array_push($error , "name is required") ;
}

if (count($error)==0){

    // $query = "DELETE FROM user WHERE email='$email' AND firstname= '$forlname' OR lastname = '$forlname' ";
    // $result = mysqli_query($connection, $query);
    $query ="DELETE FROM user WHERE email= ? AND firstname= ? OR lastname = ? ";
    $stmt = mysqli_stmt_init($connection) ;
    $prepare = mysqli_stmt_prepare($stmt , $query) ;
    if ($prepare){
      mysqli_stmt_bind_param ($stmt , "sss",$email,$forlname ,$forlname) ;
      mysqli_stmt_execute($stmt) ;
      mysqli_stmt_close($stmt) ;
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
    <title> Remove </title>
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
                <a href="add.php" class="nav-link px-3 active">
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
                <span><i class="bi bi-table me-2"></i></span> Delete Users
              </div>


                
                    <form action="remove.php" method="POST">
                    
                    <div class="form-outline mb-4">
                            <input type="text" name="forlname" id="form3Example3" class="form-control mt-4 w-100" placeholder="Enter User Name" />
                              <i class="fa-solid fa-person text-dark"></i>
                              <label class="form-label text-dark" for="form3Example3">First name or Last name</label>
                          </div>
                    
                    <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control mt-4 w-100" placeholder="Enter Email Adress" />
                              <i class="fa-solid fa-envelope text-dark"></i>
                              <label class="form-label text-dark" for="form3Example3">Email Address</label>
                          </div>
                         <button type="submit" name="delete" class="btn btn-dark mb-4">Delete</button>
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

