<?php 

include_once ("connect.php");

session_start();

// if (!isset($_SESSION["user"])&& !isset($_SESSION["firstname"])){
if (!isset($_SESSION["user"])){
  header("Location: formulaire.php");
  die();
}

if (!isset($_SESSION['panier'])){
  $_SESSION['panier'] = array();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

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
                <a class="nav-link" id="navbari" href="#">
                  <i class="fas fa-cart-shopping mx-2"></i>Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari"  href="wishlist.php">
                  <i class="fas fa-heart-circle-plus mx-2"></i>WishList 
                   <span> <?= array_sum($_SESSION['panier'])?></span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="feedback.php">
                <i class="fa-solid fa-envelope mx-2"></i></i>Feedback
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="navbari" href="help.php"> 
                  <i class="fas fa-info mx-2"></i>Help
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navbari" href="settings.php">
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


<div class="jumbotron">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner ">
          <div class="carousel-item active">
            <img src="./our prodcuts/model-2598393.jpg" class=" w-100" alt="Something Went Wrong">
          </div>
          <div class="carousel-item active">
            <img src="./our prodcuts/maiinpage.jpg" class=" w-100" alt="Something Went Wrong">
          </div>
          <div class="carousel-item active">
            <img src="./our prodcuts/man-1253004.jpg" class=" w-100" alt="Something Went Wrong">
          </div>
        
          <!-- <div class="carousel-item active">
            <img src="./our prodcuts/smee.jpg" class=" w-100" alt="Something Went Wrong">
          </div> -->
        </div>
      </div>
</div>


<!-- empty space -->
<div class="container-fluid mb-5 mt-5">
  <div class="row">
      <h1 class="text-break text-center">
        <?php echo 'Welcome ' .$_SESSION["firstname"]." in Our Store" ?>
      </h1>
  </div>
</div>


<!-- products -->
<div class="container-fluid">
  <div class="row text-center ">
  <?php 
  $req=mysqli_query($connection,"SELECT * FROM produit");
  while($row = mysqli_fetch_assoc($req)){
  ?>
    <div class="col-lg-4 shadowww">
        <img class="img-fluid w-50" src="./our prodcuts/<?= $row['image'] ?>"> 
          <div class="shopnow">
            <h4 class="text-break mt-4"><?= $row['nom_produit'] ?></h4>
            <h6 class="text-break mt-4 text-success "><?= $row['quantite'] ?></h6>
            <h4 class="text-break mt-4"><?= $row['prix_unitaire'] ?>$</h4>
            <a type="button"
            class=" saveall btn btn-floating btn-dark btn-lg mt-4 mb-5" 
            href="wishlist.php?prod_id=<?=$row['id_produit'] ?>">
              SAVE
              <i class="mx-1 my-2 fas fa-bookmark"></i>
            </a>
            <a type="button" class="btn btn-floating btn-dark btn-lg mt-4 mb-5" href="ProductDetail.php?prod_id_detail=<?=$row['id_produit'] ?>" >
                Details
              <i class=" mx-1 my-2 fas fa-bag-shopping"></i>
            </a>
          </div>
    </div>
   <?php } ?>
  </div>
</div>


  <!-- footer -->

  <div class="jumbotrom text-center justify-content-center align-items-center mt-5" id="about">

    <footer class="text-black text-center text-lg-start">
      <div class="container p-4">
        <div class="row mt-4">
          <div class="col-lg-8 col-md-12 mb-4 mb-md-0">
            <div class="mt-4">
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google"></i></a>
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 mb-md-0 ">

            <ul class="fa-ul">
              <li class="mb-3 fw-bolder font-monospace">
                <span class="fa-li "><i class="fas fa-home"></i></span><span class="ms-3">Sahline, 00-5012, Tunis</span>
              </li>
              <li class="mb-3 fw-bold font-monospace">
                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-3">contact@storeal.com</span>
              </li>
              <li class="mb-0 fw-bold font-monospace">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-3">+216 53 166 663</span>
              </li>
            </ul>

          </div>

        </div>
      </div>

      <div class="text-center p-3 ">
        © 2023 Copyright:
        <a class="text-black" href="https://STOREAL.com/">storeal.com</a>
      </div>
      <div class="made text-end mx-4">
        <i class="fas fa-heart-circle-bolt"></i><span class="ms-3">made with love in Sahline</span>
        <p></p>
      </div>
    </footer>

  </div>



<script src="purchase.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     
</body>
</html>