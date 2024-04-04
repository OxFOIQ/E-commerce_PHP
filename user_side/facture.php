
<?php
session_start() ;
include("connect.php");

if (!isset($_SESSION["user"])){
    header("Location: formulaire.php");
    die();
}
if (!isset($_SESSION['activ_commande'])){
    header("Location: commande.php");
    die();
}

$currentDate =  date('Y-m-d H:i:s');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail_offcl = $_SESSION['fix_client_mail'] ;
$reference = $_SESSION['ref'] ;

 $firstname = $_SESSION['fix_client_firstname'] ;
 $lastname = $_SESSION['fix_client_lastname'] ;
 $phonenumber = $_SESSION['fix_client_phonenumber'] ;
 $location = $_SESSION['fix_client_location'] ;

 $total = $_SESSION['total'];

if (isset($_POST['clickcheckmail'])){

  $user_date_com_and_total="UPDATE commandes SET datecommande = ? , reference = ? , total_achat = ? WHERE client_mail= ? ";
          $stmt=mysqli_stmt_init($connection);
          $prepare=mysqli_stmt_prepare($stmt,$user_date_com_and_total);

            if($prepare){
              mysqli_stmt_bind_param($stmt,"ssss",$currentDate,$reference,$total,$mail_offcl);
              mysqli_stmt_execute($stmt);
          }else{
            print("error") ;
            die();
          }


    $check_mail = "SELECT client_mail FROM commandes WHERE client_mail = '$mail_offcl' LIMIT 1";

    $check_mail_run = mysqli_query($connection,$check_mail);


            $mail = new PHPMailer(true);
            $mail->isSMTP();                 
            $mail->SMTPAuth   = true;     
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->Username   = 'mzoughiamyyne@gmail.com'; 
            $mail->Password   = 'cukfilefnyiixpvq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->setFrom('support@Storeal.com');
            $mail->addAddress($mail_offcl); 
            $mail->isHTML(true); 
            $mail->Subject = 'Confirmation Commande';
            $mail_template = "
              <h2>Welcom again</h2>
              <h3>we are receiving your request to make an purchase.
                and this is your reference code $reference.
              </h3>         
              <h3>Your delivery can be done within 3 Days Mr/Mme 
              $lastname  $firstname .
              </h3>             
              <h3>We will call you on $phonenumber when our partner 
                  comes to your location  $location 
              </h3>
              <h3>we will do our best to prepare your delivery as soon as possible <h3/>
              <h3>enjoy your time :) <h3/>
              " ;
            $mail->Body = $mail_template ;
            $mail->send();
            // $_SESSION["confirmation"] = "yes";
            header("Location: succpurchase.php");
            $_SESSION['complete'] ="  yes" ;
            exit ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Facture</title>
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
<style>

#sommet{
    padding-top: 120px;
}
</style>
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


<div class="container-fluid" id="sommet">
    <div class="row ">
        <div class=" col-12">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6">

                    <address>
                         <span>From : <strong>Storeal Store</strong></span>
                        <br>
                        <span>to : <strong><?= $_SESSION['fix_client_firstname']." ".$_SESSION['fix_client_lastname']?></strong></span>
                        <br>
                        <?= $_SESSION['fix_client_location'] ." - ".$_SESSION['fix_client_zipcode']?>
                        <br>
                        <abbr title="Phone">N° </abbr> <?= "(".$_SESSION['fix_client_phonenumber'].")"?>
                    </address>
                </div>
              
                <div class="col-lg-6 col-sm-6 col-md-6 text-end mb-5 mt-4">
                    <p>
                        <em>Date:<strong> <?= $currentDate?></strong></em>
                    </p>
                    
                    <p>
                        <em >Commande Reference # <strong class="fw-bold"><?= $_SESSION['ref']?> </strong></em>
                    </p>
                </div>
            </div>
        
            <div class="row">
                <div class="text-center">
                    <h1 class="font-monospace fw-bold" >INFORMATIONS</h1>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>

                <tbody>
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
                        <tr>
                            <td class="col-md-9"><em><?= $product['nom_produit'] ?></em></td>
                            <td class="col-md-1" style="text-align: center"> <?=$_SESSION['panier'][$product['id_produit']]?></td>
                            <td class="col-md-1 text-center"><?= $product['prix_unitaire'] ?>$</td>
                            <td class="col-md-1 text-center"><?=$_SESSION['panier'][$product['id_produit']] * $product['prix_unitaire'] ?>$</td>
                        </tr>

                        
                        <?php endforeach; } ?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                         <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Discound: (-)</strong>
                            </p>
                            <p>
                                <strong>Tax: (+)</strong>
                            </p>
                          </td>
                            <td class="text-center">
                            <p>
                                <strong>$<?=$total?></strong>
                            </p>
                            <p>
                                <strong>$<?=$total - 100 ?></strong>
                            </p>
                            <p>
                                <strong>$5</strong>
                            </p>
                          </td>
                        </tr>

                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$<?=$total -100 + 5 ;
                                                                            $_SESSION['total']=$total
                              ?></strong></h4></td>
                        </tr>
                </tbody>



                </table>
                <form action="facture.php" method="POST" class="text-center">
                    <button type="submit" name="clickcheckmail" class="btn btn-dark p-4 mt-5 btn-block">
                        Click & Check mail</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>




