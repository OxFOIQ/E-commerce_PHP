<?php
session_start();
include("./connect.php");

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
<style>

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
    padding-top: 50px;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #ffffff;
}

.timeline {
  position: relative;
  width: 100%;
  max-width: 1140px;
  margin: 0 auto;
  padding: 15px 0;
}

.timeline::after {
  content: '';
  position: absolute;
  width: 2px;
  background: #eb0808;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -1px;
}

.container {
  padding: 15px 30px;
  position: relative;
  background: inherit;
  width: 50%;
}

.container.left {
  left: 0;
}

.container.right {
  left: 50%;
}

.container::after {
  content: '';
  position: absolute;
  width: 16px;
  height: 16px;
  top: calc(50% - 8px);
  right: -8px;
  background: #ffffff;
  border: 2px solid #eb0808;
  border-radius: 16px;
  z-index: 1;
}

.container.right::after {
  left: -8px;
}

.container::before {
  content: '';
  position: absolute;
  width: 50px;
  height: 2px;
  top: calc(50% - 1px);
  right: 8px;
  background: #eb0808;
  z-index: 1;
}

.container.right::before {
  left: 8px;
}

.container .date {
  position: absolute;
  display: inline-block;
  top: calc(50% - 8px);
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  color: #eb0808;
  text-transform: uppercase;
  letter-spacing: 1px;
  z-index: 1;
}

.container.left .date {
  right: -75px;
}

.container.right .date {
  left: -75px;
}

.container .icon {
  position: absolute;
  display: inline-block;
  width: 40px;
  height: 40px;
  padding: 9px 0;
  top: calc(50% - 20px);
  background: #ffffff;
  border: 2px solid #000000;
  border-radius: 40px;
  text-align: center;
  font-size: 18px;
  color: #000000;
  z-index: 1;
}

.container.left .icon {
  right: 56px;
}

.container.right .icon {
  left: 56px;
}

.container .content {
  padding: 30px 90px 30px 30px;
  background: #000000;
  position: relative;
  border-radius: 0 500px 500px 0;
}

.container.right .content {
  padding: 30px 30px 30px 90px;
  border-radius: 500px 0 0 500px;
}

.container .content h2 {
  margin: 0 0 10px 0;
  font-size: 18px;
  font-weight: normal;
  color: #ffffff;
}

.container .content p {
  margin: 0;
  font-size: 16px;
  line-height: 22px;
  color: #ffffff;
}

@media (max-width: 767.98px) {
  .timeline::after {
    left: 90px;
  }

  .container {
    width: 100%;
    padding-left: 120px;
    padding-right: 30px;
  }

  .container.right {
    left: 0%;
  }

  .container.left::after, 
  .container.right::after {
    left: 82px;
  }

  .container.left::before,
  .container.right::before {
    left: 100px;
    border-color: transparent #006E51 transparent transparent;
  }

  .container.left .date,
  .container.right .date {
    right: auto;
    left: 15px;
  }

  .container.left .icon,
  .container.right .icon {
    right: auto;
    left: 146px;
  }

  .container.left .content,
  .container.right .content {
    padding: 30px 30px 30px 90px;
    border-radius: 500px 0 0 500px;
  }
}


</style>    
    <title>Reviews</title>
</head>
<body>

<a href="feedback.php">< return</a>
    <div class="timeline">
    <?php 
  $req=mysqli_query($connection,"SELECT * FROM user WHERE feedback !='' ");
  while($row = mysqli_fetch_assoc($req)){
  ?>
      <div class="container left">
        <div class="date"><?= $row['firstname']?></div>
        <i class="icon fa fa-home"></i>
        <div class="content">
          <h2><?= $row['email']?></h2>
          <p class="">
             <?= $row['feedback']?>
          </p>
        </div>
      </div>
      <div class="container right">
        <div class="date">FROM</div>
        <i class="icon fa fa-gift"></i>
        <div class="content">
          <h2><?= $row['state']?></h2>
          <p>
              <?= $row['country'] ." ". $row['district'] ?>
          </p>
        </div>
      </div>
      <?php } ?>
  </div>

</body>
</html>