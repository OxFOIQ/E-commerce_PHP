<?php 

include_once ("connect.php");

session_start();

if (!isset($_SESSION["user"])){
  header("Location: formulaire.php");
  die();
}

  
if(isset($_GET['prod_id'])){
  $id = $_GET['prod_id'] ;
  $produit = mysqli_query($connection ," SELECT * FROM produit WHERE id_produit = '$id' " );
  
  if (empty(mysqli_fetch_assoc ($produit))){
    die("Product Not Found !!");
  }
  if(isset($_SESSION['panier'][$id])){
    $_SESSION['panier'][$id]++ ;
  }else{
    $_SESSION['panier'][$id] = 1 ;
    // echo"Product Updated Successfully in Wishlist";
    // var_dump($_SESSION['panier']);
  }
    header("Location: product.php");
    exit ;
}

  if (isset($_GET['del'])){
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
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


<header class="">
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top ">
        <div class="container-fluid">
          <a class="navbar-brand text-white" id="storyel" href="#">STORYEL</a>
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
                <a class="nav-link" id="navbari"  href="#">
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

<!-- jomla -->
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-12">
        <h1></h1>  
    </div>
  </div>
</div>


<div class="container-fluid mt-5">
<?php 
  $total = 0;
    $all_ids=array_keys($_SESSION['panier']);
    if (empty($all_ids)){
      echo"<h1 class='text-center pt-5'>Empty Wishlist</h1> <br/>
            <h2 class='text-center pt-5'>We have awesome products,go and select your best choice :)</h2>
            <a href='product.php' class='text-center text-black pt-5' > < Product page ..</a>
            ";
    }else{
      $products = mysqli_query($connection, " SELECT * FROM produit WHERE id_produit IN (".implode(',',$all_ids).") ");
      foreach ($products as $product):
        $total = $total +  $product['prix_unitaire'] * $_SESSION['panier'][$product['id_produit']] ; 
    ?>
   <div class="row text-center justify-content-center align-items-center">
    
     <div class="col-lg-2 col-sm-6 mt-5">
       <img class="img-fluid w-50" src="./our prodcuts/<?= $product['image'] ?>" alt=""> 
     </div>
     <div class="col-lg-2 col-sm-6 mt-5">
         <p><?= $product['nom_produit'] ?></p>
         <h6><?= $product['description'] ?></h6>
     </div>
     <div class="col-lg-2 col-sm-6 mt-5">
         <h6><?= $product['prix_unitaire'] ?>$</h6>
     </div>
     <div class="col-lg-2 col-sm-6 mt-5">
         <h6><?=$_SESSION['panier'][$product['id_produit']]?></h6>
     </div>

       <div class="col-lg-2 col-sm-6 mt-5">
          <h6><?=$_SESSION['panier'][$product['id_produit']] * $product['prix_unitaire'] ?>$</h6>
      </div>

     <div class="col-lg-2 col-sm-6 mt-5">
      <a href="wishlist.php?del=<?=$product['id_produit']?>"><i class="fa-solid fa-trash-can text-black"></i></a>
   </div>
</div>
<hr>
</div>

<?php endforeach; } ?>

<div class="container-fluid text-center ">
      <div class="row mt-5 ">
        <div class="col-12 text-center ">
        <?php 
          if ($total > 0) {
          ?>
            <h3 class=""><?="Total : ". $total ?>$</h3>
          <?php } ?>

        </div> 
        <?php 
          if ($total > 0) {
          ?>
        <a type="button"
      class="btn btn-dark mt-3 mb-4 fw-bold pt-3 pb-4 w-100 text-center"
      href="commande.php?product_sum=<?=$total?>$"  >
      SHIP NOW
           </a>
         <?php } ?>
      </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>  
<script src="purchase.js"></script>
</body>
</html>
