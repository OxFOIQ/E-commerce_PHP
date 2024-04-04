<?php 
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

session_start();
if (isset($_SESSION["user"])){
  header("Location: product.php");
  die();
}

if(isset($_POST["submit"])){



  //mysqli_real_escape_string : to sanitize inputs , to prevent sql injection
  $firstname =mysqli_real_escape_string($connection , $_POST["firstname"]) ;
  $lastname =mysqli_real_escape_string ($connection , $_POST["lastname"]);
  $state =  $_POST["state"];
  $country = $_POST["countrya"];
  $district = $_POST["district"];
  $email = mysqli_real_escape_string ($connection , $_POST["email"]);
  $password = mysqli_real_escape_string ($connection , $_POST["password"]);
  $passwordconfirm = mysqli_real_escape_string ($connection , $_POST["passwordconfirm"]);
  $phonenumber = mysqli_real_escape_string ($connection , $_POST["phonenumber"]);
  $passwordhash=password_hash($password,PASSWORD_DEFAULT);
  $error = array();

  if (empty($firstname) OR empty($lastname)OR empty($state) 
  OR empty($country )OR empty($district)OR empty($email)OR empty($password)
  OR empty($passwordconfirm)OR empty($phonenumber)){
    array_push($error , "all fields are required");
  }

  if (!preg_match("/^[a-zA-Z\s]+$/", $firstname)) {
    array_push ($error ,"Invalid firstname");
  } 

    if (!preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
      array_push ($error ,"Invalid lastname");
    } 
    //Helps ensure data integrity and prevent..
    //..invalid email entries.
    //Validates an email address against a set
    //..of rules based on RFC 822 (with some exceptions).
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error , "email not valid");
  }

  if (strlen($password) < 8){
  array_push($error , "Password must be over then 8 caracter");
  } 

  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).+$/', $password)) {
    array_push ($error ,"Password should contain at least one lowercase and one uppercase letter");
  }

  if (!preg_match("#\d+#", $password)) {
    array_push ($error ,"Password should contain at least one digit.");
  }

  if (!preg_match("#\W+#", $password)) {
    array_push ($error ,"Password should contain at least one special character.");
    }


  if ($password !== $passwordconfirm){
  array_push($error , "Password does not much bro");
  } 

  $code = rand(100000, 999999);

  $req="SELECT * FROM user WHERE email='$email'";
  $result=mysqli_query($connection,$req);
  $IfExist = mysqli_num_rows($result);
  if ($IfExist > 0){
    array_push($error , "Please change email , Existing account");
  }

  if (count($error) > 0){
    foreach($error as $err){
      echo"<div class='alert alert-danger'>$err</div>";
    }
  }else{




  // insert data 
  // using mysqli_stmt_prepare and mysqli_stmt_bind_param to prevent SQL INJECTION
  //mysqli_stmt_prepare : Prepares a SQL statement for execution, ensuring placeholder for variables to prevent SQL injection attacks.
  // Enhances security and efficiency for repeated queries.
  
  //mysqli_stmt_bind_param : Binds variables to the prepared statement's placeholders, specifying their data types.
  
  //mysqli_stmt_execute() to execute the prepared statement after binding variables.
  $req="INSERT INTO user (firstname,lastname,state,district,email,password,phonenumber,code) VALUES (?,?,?,?,?,?,?,?,?)";
  $stmt=mysqli_stmt_init($connection);
  
  $prepare=mysqli_stmt_prepare( $stmt,$req);

  if($prepare){

    mysqli_stmt_bind_param($stmt,"ssssssssi",
    $firstname,$lastname,$country,$state,$district,
    $email,$passwordhash,$phonenumber,$code);

    mysqli_stmt_execute($stmt);
   










    $check_mail = "SELECT email FROM user WHERE email = '$email' LIMIT 1";

    $check_mail_run = mysqli_query($connection,$check_mail);

    if(mysqli_num_rows($check_mail_run) > 0 ){

      $mailfound= mysqli_fetch_array($check_mail_run);

          if($mailfound){
              $mail = new PHPMailer(true);
              $mail->isSMTP();                 
              $mail->SMTPAuth   = true;     
              $mail->Host       = 'smtp.gmail.com'; 
              $mail->Username   = 'mzoughiamyyne@gmail.com'; 
              $mail->Password   = 'cukfilefnyiixpvq';
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
              $mail->Port       = 465;
              $mail->setFrom('support@Storeal.com');
              $mail->addAddress($email); 
              $mail->isHTML(true); 
              $mail->Subject = 'Confirmation Account';
              $mail_template = "
                <h2>Welcom</h2>
                <h3>You are receiving your request to create an account.
                  and this is your confirmation code $code.
                </h3>         
                                " ;
              $mail->Body = $mail_template ;
              $mail->send();
              $_SESSION["status"] = "Check your email box";
              header("Location: verifsign.php");
              exit ;
          }else{
            $_SESSION["status"] = "mail not found . ";
            header("Location: formulaire.php");
              exit; 
            }
  
    }else{
    $_SESSION["status"] = "something wrong. ";
    header("Location: formulaire.php");
    die();
    }

    }else{
    die ("somthing went wrong bro");
    }

    }

}

?>


