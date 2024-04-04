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
    <title>Admin Dashboard</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark gradient-custom fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid ">
        <!-- Navbar brand -->
        <a class="navbar-brand fw-bold mx-5" href="#">STOREAL</a>
    
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
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
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
              Dashboard
              </div>
            </li>
            <li>
              <a href="dashboard.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Commande</span>
              </a>
            </li>
             <li class="my-4"><hr class="dropdown-divider bg-light" /></li> 
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

              <!-- <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Dashboard</span>
                    </a>
                  </li>
                </ul>
              </div> -->
            
            <!-- <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Charts</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Tables</span>
              </a>
            </li> -->
          </ul>
        </nav>
      </div>
    </div>

    <!-- offcanvas -->
    <main class="mt-5 pt-3 mt-5">
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
       
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Users Commande
              </div>



              <div class="card-body">
                    <div class="row">
                    <?php 
                            $req=mysqli_query($connection," SELECT sum(total_achat)as total , count(total_achat) as count , datecommande , count(statu) as statuss FROM commandes ");
                            while($row = mysqli_fetch_assoc($req)){
                      ?>
                        <div class="col-lg-6 col-md-2 col-sm-1 ">
                            <div class="card text-white bg-dark mb-3 pb-5" style="max-width: 20rem;">
                                <div class="card-header">Total Income</div>
                                <div class="card-body">
                                    <h4 class="card-title"> $ <?= $row['total']?></h4>
                                    <p class="card-text">FROM <?= $row['count'] . " commandes "?> </p>
                                    <h4 class="card-title mt-5"><?= date('Y-m-d') ?></h4>
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-2 col-sm-1 ">
                            <div class="card text-white bg-dark mb-3 pb-5" style="max-width: 20rem;">
                                <div class="card-header">Commande Status</div>
                                <div class="card-body">
                                    <h4 class="card-title"> Commandes Not Processed Yet  : <?= $row['statuss']?></h4>
                                    <h4 class="card-title mt-5"><?= date('Y-m-d') ?></h4>
                              </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
               </div>







                  



              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                        <th>Email</th>
                        <th>Telephone Number</th>
                        <th>Location</th>
                        <th>Reference Commande</th>
                        <th>Purchasing Total</th>
                        <th>Commande Date</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php 
                        $req=mysqli_query($connection," SELECT * FROM commandes");
                        while($row = mysqli_fetch_assoc($req)){
                        ?>
                      <tr>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['client_mail'] ?></td>
                        <td><?= $row['phonenumber'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= $row['reference'] ?></td>
                        <td>$ <?= $row['total_achat'] ?></td>
                        <td><?= $row['datecommande'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Location</th>
                        <th>Reference Commande</th>
                        <th>Purchasing Total</th>
                        <th>Commande Date</th>
                        <th>Telephone Number</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
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
