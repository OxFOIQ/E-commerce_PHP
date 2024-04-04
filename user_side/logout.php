<?php 
session_start();
session_destroy();
header("Location: formulaire.php");
die();
?>
