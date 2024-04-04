<?php
session_start() ;
include("../user_side/connect.php");


if (!isset($_SESSION["admin"])){
  header("Location: admin_sign_in.php");
  exit ;
}




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
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
    <title>Admin Layouts</title>
    <style>

.blockquote-custom {
  position: relative;
  font-size: 1.1rem;
}

.blockquote-custom-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -25px;
  left: 50px;
}


    </style>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark gradient-custom fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand fw-bold mx-5" href="dashboard.php">STOREAL</a>
    
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars text-light"></i>
        </button>
    
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Right links -->
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
          <!-- Right links -->
    
          <!-- Search form -->
          <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
            <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-white" type="submit" data-mdb-ripple-color="dark">
              Search
            </button>
          </form>


          <li class="nav-item text-center mx-2 mx-lg-1">
              <a class="nav-link text-light" href="adminlogout.php">
                <div>
                  <i class="fas fa-bell fa-lg mb-1"></i>
                </div>
                LogOut
              </a>
            </li>
        </div>
      </div>
    </nav>



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
                <span><i class="bi bi-table me-2"></i></span>Customers Requests
              </div>

              <div class="card-body">
                    <section class="py-5">
                        <div class="container">
                            <div class="row">
                            <?php 
                                $req=mysqli_query($connection," SELECT * FROM user WHERE help != '' ");
                                  while($row = mysqli_fetch_assoc($req)){
                                  ?>
                                <div class="col-lg-12 mx-auto">
                                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                                        <div class="blockquote-custom-icon bg-black shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
                                        <p class="mb-0 mt-2 font-italic"><a href="#" class="text-black">@ <?= $row['firstname'] ." ". $row['lastname']?></a></p>
                                        <p class="mb-0 mt-2 font-italic">"<?= $row['help']?><a href="#" class="text-black"></a>."</p>
                                        <footer class="blockquote-footer pt-4 mt-4 border-top"><?= $row['email']?>
                                            <cite title="Source Title">#<?= $row['id']?></cite>
                                        </footer>
                                    </blockquote>

                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>

              </div>


            </div>
          </div>

        </div>
      </div>
    </main>



    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
