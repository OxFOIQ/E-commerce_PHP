<?php
include("connect.php");
session_start();
if (!isset($_SESSION["user"])){
  header("Location: formulaire.php");
  die();
}

  if(isset($_GET['prod_id_detail'])){
    $id = $_GET['prod_id_detail'] ;
    $produit = mysqli_query($connection ," SELECT * FROM produit WHERE id_produit = '$id' " );
    
    if (empty(mysqli_fetch_assoc ($produit))){
      die("Product Not Found !!");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductDetail</title>

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
                <a class="nav-link" id="navbari" href="product.php">
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
                <a class="nav-link" id="navbari" href="logout.php">
                  <i class="fas fa-right-from-bracket mx-2"></i>Log Out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>   
</header> 


<!-- empty space -->
<div class="container-fluid mb-5 mt-5">
  <div class="row">
    <p class=""></p>
  </div>
</div>



<div class="container-fluid ">
      <div class="row justify-content-center align-items-center text-center">
      <?php 
        $req=mysqli_query($connection," SELECT * FROM produit WHERE id_produit = '$id' ");
        while($row = mysqli_fetch_array($req)){
        ?>
        <div class="col-lg-7 col-md-12">
            <img class="img-fluid w-50" src="./our prodcuts/<?= $row['image'] ?>" alt=""> 
        </div>

        <div class="col-lg-5 col-md-12 mt-5">
          
          <h1 class="text-break" ><?= $row['nom_produit'] ?></h1>

          <p> <?=  $row['highlights'] ?> </p>
          
          <h4 class="text-success"><?= $row['quantite'] ?></h4>


          <h4 class="text mt-4">$<?= $row['prix_unitaire'] ?></h4>


          <h4 class="text-success mt-4"><?= $row['shipping'] ?></h4>

          <!-- <a type="button" class="btn btn-floating btn-dark btn-lg mt-4 mb-5" href="" >
            ADD TO CART
            <i class=" mx-1 my-2 fas fa-cart-shopping"></i>
          </a> -->

          <a type="button" id="saveall" 
            class="btn btn-floating btn-dark btn-lg mt-4 mb-5" 
            href="wishlist.php?prod_id=<?=$row['id_produit'] ?>">
              SAVE
              <i class="mx-1 my-2 fas fa-bookmark"></i>
           </a>

        </div>
        <?php } ?>
      </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     
</body>
</html>