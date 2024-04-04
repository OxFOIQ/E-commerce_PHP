<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Nova+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- =================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <!-- navbar -->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top ">
      <div class="container-fluid">
        <a class="navbar-brand text-white" id="storyel" href="#">STORYEL</a>
        <button id="bouton" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " id="navbari" href="#header">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="navbari" href="#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="navbari" href="product.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="navbari" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="navbari" target="blank" href="formulaire.php">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <!-- carousell -->
  <div class="jumbotron ">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./our prodcuts/maiinpage.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item active">
          <img src="./our prodcuts/man-1253004.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item active">
          <img src="./our prodcuts/model-2598393.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item active">
          <img src="./our prodcuts/smee.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </div>


  <!-- empty space -->
  <div class="container-fluid bg-white mb-5">
    <div class="row">
      <p class=""></p>
    </div>
  </div>



  <!-- Photos -->
  <div class="container-fluid">
    <div class="row text-center">

      <div class="col-lg-6">
        <img class="img-fluid w-50" src="./our prodcuts/mougela-1-transformed.png" alt="">
      </div>

      <div class="col-lg-6">
        <img class="img-fluid w-50" src="./our prodcuts/mougela-2-transformed.png" alt="">
      </div>

    </div>
  </div>

  <!-- empty space -->
  <div class="container-fluid bg-black mt-5">
    <div class="row">
      <p class=""></p>
    </div>
  </div>

  <!-- Ready to shop -->
  <div class="container-fluid ">
    <div class="row align-items-center justify-content-center">

      <div class="col-4">
        <img src="./our prodcuts/fleche.png" alt="" class="img-fluid w-100 d-block">
      </div>

      <div class="col-4">
        <div class="readtoshop">
          <h2 class="ready ">READY</h2>
          <h2 class="ship">TO SHOP !!</h2>
        </div>
      </div>

      <div class="col-4">
        <img src="./our prodcuts/fleche2.png" alt="" class="img-fluid w-100 ">
      </div>

    </div>
    <div class="shopnow text-center">
      <button type="button" class="btn btn-dark rounded-0 p-3 mb-5">Shop Now</button>
    </div>
  </div>



  <div class="container">
    <div class="row">
      <p id="features"></p>
    </div>
  </div>

  <!-- Minimalist analog -->
  <div class="container-fluid bg-black">
    <div class="row">
      <h1 class="text-center text-break text-light" id="paragraphe">
        STORYEL IS A MINIMALIST ANALOG WATCH. THE WATCH HAS TWO DIALS,
        WITH HOURS AT THE TOP AND MINUTES AT THE BOTTOM. WHEN THEY ROTATE,
        THE TIME IS SHOWN IN THE MIDDLE INSIDE THE HOURGLASS.
      </h1>
    </div>
  </div>


  <!-- new collection -->
  <div class="container-fluid">
    <div class="row ">
      <div class="col-12 text-center mt-5 pt-3 pb-5 rounded-2" id="aazzeerr">
        <span class="text text-center text-break mt-5 mb-4 text-black">New </span>
        <span class="ready text-center text-break mt-5 mb-4 text-black"> Collection</span>
      </div>
      <div class="col-12">
        <img src="./our prodcuts/watch.png" alt="" class="img-fluid d-block w-100">
      </div>
    </div>
  </div>


  <!-- empty space -->
  <div class="container-fluid bg-black mt-5">
    <div class="row">
      <p class=""></p>
    </div>
  </div>


  <!-- all in one store and search img -->
  <div class="container-fluid mb-3">
    <div class="row align-items-center justify-content-center">
      <div class="col-10">
        <div class="all row mt-5 fw-bold">
          <p class="text-center text-break ">All what u looking For</p>
          <p class="inonesore text-center text-break"> In One Store</p>
        </div>
      </div>

      <div class="col-2">
        <img src="./our prodcuts/search.gif" alt="" class="w-75">
      </div>
    </div>
  </div>



  <!-- Product pics -->

  <div class="container-fluid">

    <div class="col-12 w-100  img-fluid">
      <section class="sec1">
        <!-- <img src="wa9fa.jpg" class="d-block w-100" alt="xyz"> -->
      </section>
    </div>

    <div class="col-12 w-100  img-fluid">
      <section class="sec2">
        <!-- <img src="wa9fa2.jpg" class="d-block w-100" alt="xyz"> -->
      </section>
    </div>

    <div class="col-12 w-100 img-fluid">
      <section class="sec3">
        <!-- <img src="wa9fa3.jpg" class="d-block w-100" alt="xyz"> -->
      </section>
    </div>

    <div class="col-12 w-100  img-fluid">
      <section class="sec4">
        <!-- <img src="wa9fa4.jpg" class="d-block w-100" alt="xyz"> -->
      </section>
    </div>

    <div class="col-12 w-100  img-fluid">
      <section class="sec5">
        <!-- <img src="wa9fa.jpg" class="d-block w-100" alt="xyz"> -->
      </section>
    </div>
    
  </div>


  <!-- Storeal 3D pics -->

  <div class="container-fluid">
    <div class="xyz row justify-content-center">
      <div class="col-1">
        <img src="./our prodcuts/s.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/t.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/o.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/r.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/y.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/e.png" alt="" class="img-fluid w-25">
      </div>
      <div class="col-1">
        <img src="./our prodcuts/l.png" alt="" class="img-fluid w-25">
      </div>
    </div>
  </div>


  <!-- pre footer  (promotion)-->

  <div class="container-fluid">

    <div class="row justify-content-center align-items-center">
      <div class="col-8">
        <h6 class="limited text-center text-break fw-medium ">LIMITED</h6>
        <h6 class="limited text-center text-break fw-medium ">EDITION</h6>
        <br> <br>

        <h6 class="limited text-center text-break fw-medium ">INNOVATION</h6>
        <h6 class="limited text-center text-break fw-medium ">&</h6>
        <h6 class="limited text-center fw-medium ">DESIGN</h6>
        <br>
        <h6 class="limited text-center text-break fw-medium ">BUY</h6>
        <h6 class="limited text-center text-break fw-medium ">NOW</h6>
        <br> <br>

        <h6 class="limited text-center text-break fw-bolder ">GET20%</h6>
        <h6 class="limited text-center text-break fw-bolder ">OFF</h6>
      </div>
      <div class="col-4">
        <img src="./our prodcuts/yed.png" alt="" class="img-fluid w-75">
      </div>
    </div>

  </div>


  <!-- /* =================================================== */ -->

  <!-- shop now pre footer -->

  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-6">
        <button class="cta">
          <span class="hover-underline-animation"> Shop now </span>
          <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
          </svg>
        </button>
      </div>
      <div class="col-4">
        <img src="./our prodcuts/devices.gif" alt="" class="img-fluid w-100 d-block">
      </div>
    </div>

  </div>


  <!-- Eye Gifs -->

  <div class="container-fluid">
    <div class="row ">
      <div class="col-2">
        <img src="" alt="" class="img-fluid w-25 d-block">
      </div>
      <div class="col-2">
        <img src="./our prodcuts/footereye.gif" alt="" class="img-fluid w-50 d-block">
      </div>
      <div class="col-2">
        <img src="" alt="" class="img-fluid w-50 d-block">
      </div>
      <div class="col-2">
        <img src="" alt="" class="img-fluid w-50 d-block">
      </div>
      <div class="col-2">
        <img src="./our prodcuts/footereye.gif" alt="" class="img-fluid w-50 d-block">
      </div>
      <div class="col-2">
        <img src="" alt="" class="img-fluid w-50 d-block">
      </div>
    </div>
  </div>


  <!-- footer -->

  <div class="jumbotrom text-center justify-content-center align-items-center" id="about">

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


  <script src="smoothscrollwithjquery.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- <script src="particles/particles.js"></script>
<script src="particles/app.js"></script> -->

</body>

</html>