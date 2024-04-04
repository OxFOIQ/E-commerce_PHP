<?php
include ("connect.php");
session_start() ;

if (!isset($_SESSION["user"])){
    header("Location: formulaire.php");
    die();
}

if (!isset($_SESSION['activ_commande'])){
    header("Location: commande.php");
    die();
}

function generateRandomReference($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$_SESSION['ref'] = generateRandomReference();
// $reference=$_SESSION['ref'];

// print $_SESSION['ref']  ;
// print $reference  ;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Payment Card</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
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
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="card.css">

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
                  <i class="fas fa-heart-circle-plus mx-2"></i>WishList <span><?= array_sum($_SESSION['panier'])?></span>
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


<div class="container mt-5" id="contenera">
        <div class="row mt-5">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row mt-5">
                        <?php 
                            $total = 0;
                            $all_ids=array_keys($_SESSION['panier']);
                            if (empty($all_ids)){
                            echo"<h1 class='text-center'>il'nya pas de commande !</h1>";
                            }else{
                            $products = mysqli_query($connection, " SELECT * FROM produit WHERE id_produit IN (".implode(',',$all_ids).") ");
                            foreach ($products as $product):
                            $total = $total +  $product['prix_unitaire'] * $_SESSION['panier'][$product['id_produit']] ; 
                         ?>
                    <div class="col-4 text-center mt-4 mb-4">
                        <img class="img-fluid w-75" src="./our prodcuts/<?= $product['image'] ?>" alt=""> 
                        <h4 class="fw-bold"><?= $product['prix_unitaire'] ?>$</h4>
                        <h6 class="fw-bold"><?=$_SESSION['panier'][$product['id_produit']]?></h6>

                    </div>
                    <?php endforeach; } ?>

                    <div class="row m-0 bg-light text-center">
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">FROM</p>
                            <p class="h5">Storeal Store</p>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="text-muted">TO</p>
                            <p class="h5 m-0"><?= $_SESSION["fix_client_firstname"]." ".$_SESSION["fix_client_lastname"]?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Tel Number</p>
                            <p class="h5 m-0"><?=$_SESSION["fix_client_phonenumber"]?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Client mail</p>
                            <p class="h5 m-0 text-break"><?= $_SESSION["fix_client_mail"] ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">VAT(2%)</p>
                            <p class="h5 m-0">$5</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Location</p>
                            <p class="h5 m-0">#<?=$_SESSION["fix_client_location"]?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4 mt-5">
                <div class="row m-0">
                    <div class="col-12 px-4 mt-4">

                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0">More Details</p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Qty</p>
                            <p class="fs-14 fw-bold"><?= array_sum($_SESSION['panier'])?></p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Subtotal</p>
                            <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span>
                                 <?=$total?>
                            </p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Shipping</p>
                            <p class="fs-14 fw-bold">FREE SHIPPING</p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Promo code</p>
                            <p class="fs-14 fw-bold">-<span class="fas fa-dollar-sign px-1"></span>100</p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">VAT</p>
                            <p class="fs-14 fw-bold">+<span class="fas fa-dollar-sign px-1"></span>5</p>
                        </div>


                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span>
                                <span class="h4">
                                    <?=$total -100 + 5 ;
                                    $_SESSION['total']  = $total -100 + 5 ;
                                    ?>
                                </span>
                            </div>
                        </div>

                    </div>
                 <form action="info_card.php" method="post">
                    <div class="col-12 px-0 mt-4">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number</p>
                                        <input class="form-control" type="text" value="" name ="cardnumber"
                                            placeholder="XXXX XXXX XXXX XXXX">
                                    </span>
                                    <!-- <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="text" value=""  name =""
                                            placeholder="MM/YYYY">
                                    </div> -->
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text" value="" name ="cardholdername"
                                            placeholder="Name">
                                    </span>
                                    <!-- <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text" value="" placeholder="XXX">
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <button class="btn btn-primary" name="purchase" type="submit">Purchase <span class="fas fa-arrow-right ps-2"></span></button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     
</body>
</html>