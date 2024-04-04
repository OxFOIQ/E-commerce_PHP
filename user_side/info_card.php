<?php

session_start() ;
include("connect.php");

// $reference=$_SESSION['ref'];

$official_client_mail =  $_SESSION['fix_client_mail'];


if (!isset($_SESSION["user"])){
    header("Location: formulaire.php");
    exit();
}


if (!isset($_SESSION['activ_commande'])){
    header("Location: commande.php");
    exit();
}


if (isset($_POST['purchase'])){

    $cardnumber = $_POST['cardnumber'] ;
    $cardholdername =mysqli_real_escape_string($connection,$_POST['cardholdername']) ;
    $error = array();


    if (empty($cardnumber) OR empty($cardholdername)){
      array_push($error , "all fields are required");
    }
  

    if(!filter_var($cardnumber, FILTER_VALIDATE_INT)) {
        array_push($error,"card should be digits");
    }

    if (preg_match('/^\d{4}(\s\d{4}){3}$/', $cardnumber)) {
        array_push($error,"card should be in form xxxx xxxx xxxx xxxx");
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $cardholdername)) {
        array_push ($error ,"Invalid card name");
      } 

    // print_r($error);
    
    $encryption_key = openssl_random_pseudo_bytes(16);
    $iv = openssl_random_pseudo_bytes(16);
    $encrypted_card_number = openssl_encrypt($cardnumber, "AES-128-CBC", $encryption_key, 0, $iv);
    


if (count($error) ===0){

        $ajout_plus_confim=("UPDATE commandes SET client_card = ? , commandeholdername= ?
        WHERE client_mail= ? ");
        $stmt=mysqli_stmt_init($connection);
        $prepare=mysqli_stmt_prepare($stmt,$ajout_plus_confim);
        mysqli_stmt_bind_param($stmt,"sss",$encrypted_card_number,$cardholdername,$official_client_mail);
        mysqli_stmt_execute($stmt);
        header("Location: facture.php");
        exit ;
        } else {
            print_r($error);
        }
      

}  



// $encryption_key = openssl_random_pseudo_bytes(32);
// $cardnumber = preg_replace('/[^0-9]/', '', $cardnumber);
// $expiry_date = preg_replace('/[^0-9]/', '', $expiry_date);
// $cvv = preg_replace('/[^0-9]/', '', $cvv);

// $iv_length = openssl_cipher_iv_length('aes-256-cbc');
// $iv = openssl_random_pseudo_bytes($iv_length);

// $ciphertext = openssl_encrypt(
// $cardnumber . '|' . $expiry_date . '|' . $cvv,'aes-256-cbc',$encryption_key,OPENSSL_RAW_DATA,$iv);



?>
