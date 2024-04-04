<?php 

include("connect.php");

session_start();
if (isset($_SESSION["user"])){
  header("Location: product.php");
  die();
}

if(isset($_POST["login"])){
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

        $request="SELECT * FROM user WHERE email = '$mail' ";

        $response=mysqli_query($connection,$request);

        $user=mysqli_fetch_array($response,MYSQLI_ASSOC);

        if($user){

            if(password_verify($pass,$user["password"]) && $user["verif_status"]=='1'){
                session_start();
                $_SESSION["user"]="yes";
                $_SESSION["firstname"]=$user["firstname"];
                $_SESSION["lastname"]=$user["lastname"];
                $_SESSION["id"]=$user["id"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["time"] = date('Y-m-d H:i:s');
                // $_SESSION["district"] = $user["district"];
                // $_SESSION["country"] = $user["country"];
                $_SESSION["tlfn"] = $user["phonenumber"];

                header("Location: product.php?account_id=".$_SESSION["id"]);
                die();
            }else{
                echo"Password Wrong or account not activated yet";
            }

        }else{
            echo"something went wrong";
        }
}
?>