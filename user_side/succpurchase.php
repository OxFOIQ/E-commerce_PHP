
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

if (!isset($_SESSION['complete'])){
    header("Location: commande.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>succpurchasing</title>

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

<style>
    @keyframes typing {
  from {
    width: 0;
  }
}

@keyframes blink-caret {
  50% {
    border-color: transparent;
  }
}
/* When you change the amount of characters in the h1, you have to change 
the with: 14ch and  steps(14, end), if there is 14 characters, put 14, 
if there is 20 put 20 */
.animation {
  font: bold 200% Consolas, Monaco, monospace;
  border-right: .1em solid black;
  width: 68.20ch;
  margin: 2em 2em;
  white-space: nowrap;
  overflow: hidden;
  animation: typing 5s steps(68, end),
	           blink-caret .5s step-end infinite alternate;
  }

  .animation2 {
  font: bold 200% Consolas, Monaco, monospace;
  border-right: .1em solid black;
  width: 30.20ch;
  margin: 2em 2em;
  white-space: nowrap;
  overflow: hidden;
  animation: typing 6s steps(30, end),
	           blink-caret .5s step-end infinite alternate;
  }


body{
  padding-top: 180px;
}



.dot-wave{
  top: 190px;
  padding-left: 700px;
}


.dot-wave {
  --uib-size: 50px;
  --uib-speed: 0.6s;
  --uib-color: #0d0909;
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  justify-content: space-between;
  width: var(--uib-size);
  height: calc(var(--uib-size) * 0.17);
  padding-top: calc(var(--uib-size) * 0.34);
}

.dot-wave__dot {
  flex-shrink: 0;
  width: calc(var(--uib-size) * 0.17);
  height: calc(var(--uib-size) * 0.17);
  border-radius: 50%;
  background-color: var(--uib-color);
  will-change: transform;
}

.dot-wave__dot:nth-child(1) {
  animation: jump824 var(--uib-speed) ease-in-out
    calc(var(--uib-speed) * -0.45) infinite;
}

.dot-wave__dot:nth-child(2) {
  animation: jump824 var(--uib-speed) ease-in-out
    calc(var(--uib-speed) * -0.3) infinite;
}

.dot-wave__dot:nth-child(3) {
  animation: jump824 var(--uib-speed) ease-in-out
    calc(var(--uib-speed) * -0.15) infinite;
}

.dot-wave__dot:nth-child(4) {
  animation: jump824 var(--uib-speed) ease-in-out infinite;
}

@keyframes jump824 {
  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(-200%);
  }
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
                <a class="nav-link" id="navbari" href="logout.php">
                  <i class="fas fa-right-from-bracket mx-2"></i>Log Out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>   
</header>      


            <div class=" animation">
              <h1>We emailed you , Check Your mailBox for further info !</h1>
           </div>

            <div class=" animation2">
              <h1>Thanks for your Trust :)</h1>
           </div>


        <div class="dot-wave">
          <div class="dot-wave__dot"></div>
          <div class="dot-wave__dot"></div>
          <div class="dot-wave__dot"></div>
          <div class="dot-wave__dot"></div>
      </div>


</body>


</html>