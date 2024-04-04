<?php 

include_once ("connect.php");

session_start();

if (!isset($_SESSION["user"])){
  header("Location: formulaire.php");
  die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>

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
<div class="container-fluid mt-4">
    <div class="row">
        <p></p>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12 ">
          
            <form method="POST" action="info_com.php">
              
                  <h3 class="font-monospace text-decoration-underline fw-bold mt-4" id = "contact">CONTACT</h3>

                  <div class="form-outline mb-4">
                      <input type="email" name="email" id="form3Example3" class="form-control mt-4 w-100" value="<?= $_SESSION["email"] ?>"/>
                        <i class="fa-solid fa-envelope text-black fw-bold"></i>
                        <label class="form-label text-black fw-bold" for="form3Example3">Email Address</label>
                  </div>

                  <h3 class="font-monospace text-decoration-underline fw-bold">SHIPPING INFORMATIONS</h3>

                  <div class="form-outline mt-4">
                            <input type="text" id="typeDis" name="location" class="form-control w-100" value=""/>
                            <i class="fa-sharp fa-solid fa-house-flag text-black fw-bold"></i>
                            <label class="form-label text-black fw-bold" for="form3Example3">Your Location</label>
                  </div>

                  <div class="form-outline mt-4">
                            <input type="text" id="typePhone" name="zipcode" class="form-control w-100" placeholder="XXXX"/>
                            <i class="fa-solid fa-location text-black fw-bold"></i>
                            <label class="form-label text-black fw-bold" for="form3Example5"> ZIP Code</label>
                  </div>


                  <div class="form-group mt-4">
                            <div class="input-group w-100">
                                  <input type="text" name="firstname" id="firstname"  aria-label="First name" class="form-control" value="<?= $_SESSION["firstname"] ?>" >
                                  <input type="text" name="lastname" id="lastname" aria-label="Last name" class="form-control" value ="<?= $_SESSION["lastname"] ?>">
                            </div>
                              <i class="fa-solid fa-user text-black fw-bold"></i>
                                <label for="fname" class="text-black fw-bold">Full Name</label>
                              <p  id="fullnamemsg"></p>
                  </div>

                  <div class="form-outline mt-4">
                            <input type="text" id="typePhone" name="company" class="form-control w-100" placeholder="Optional"/>
                            <i class="fa-solid fa-building text-black fw-bold"></i>
                            <label class="form-label text-black fw-bold" for="form3Example5"> Your Company</label>
                  </div>


                  <div class="form-outline mt-4">
                            <input type="tel" id="typePhone" name="phonenumber" class="form-control w-100" value ="<?=$_SESSION["tlfn"] ?>"/>
                            <i class="fa-solid fa-phone text-black fw-bold"></i>
                            <label class="form-label text-black fw-bold" for="form3Example5">Telephone Number</label>
                  </div>


                  <div class="text-center justify-content-center align-items-center">
                      <a href="Product.php" class="link-underline-danger mt-3 float-start fw-bold"> < Return</a>
                      <button type="submit" name="commande"  class="btn btn-dark mt-3 mb-3 pb-2 pt-2 float-end text-break fw-bold">Confirm</button> 
                  </div>
            </form>      
        </div>   

    <div class="col-lg-5 col-md-12 col-sm-12 mt-5">  
        <!-- <div class="col-lg-5 col-md-12 col-sm-12 bg-black">   -->
            <!-- <img class="img-fluid w-100" src="./our prodcuts/maaannnn2.png" alt=""> -->
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
            
          <div class="row text-center justify-content-center align-items-center mt-5">
            
              <div class="col-lg-2 col-sm-6 mt-5">
                <img class="img-fluid w-50" src="./our prodcuts/<?= $product['image'] ?>" alt=""> 
              </div>

              <div class="col-lg-2 col-sm-6 mt-5">
                  <p class="fw-bold"><?= $product['nom_produit'] ?></p>
              </div>

              <div class="col-lg-2 col-sm-6 mt-5">
                  <h6 class="fw-bold"><?=$_SESSION['panier'][$product['id_produit']]?></h6>
              </div>

                <div class="col-lg-2 col-sm-6 mt-5">
                    <h6 class="fw-bold"><?=$_SESSION['panier'][$product['id_produit']] * $product['prix_unitaire'] ?>$</h6>
                </div>

                <div class="col-lg-2 col-sm-6 mt-5">
                <a class="text-black" href="wishlist.php?del=<?=$product['id_produit']?>"><i class="fa-solid fa-trash-can"></i></a>
              </div>

          </div>

          <hr>

            <?php endforeach; } ?>
            <div class="col-12 text-center ">
              <h3 class=""><?="Total : ". $total ?>$</h3>
          </div> 
      </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     
</body>
</html>