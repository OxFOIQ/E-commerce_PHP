<?php 
session_start();
session_destroy();
header("Location: admin_sign_in.php");
die();
?>
