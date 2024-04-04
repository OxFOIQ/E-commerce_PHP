<?php 
session_start();
include ('connect.php');

if (isset($_POST['commande'])){
    $email = mysqli_real_escape_string ($connection , $_POST["email"]);
    $location = mysqli_real_escape_string ($connection , $_POST["location"]);
    $zipcode = mysqli_real_escape_string ($connection , $_POST["zipcode"]);
    $firstname =mysqli_real_escape_string($connection , $_POST["firstname"]) ;
    $lastname =mysqli_real_escape_string ($connection , $_POST["lastname"]);
    $company = mysqli_real_escape_string ($connection , $_POST["company"]);
    $phonenumber = mysqli_real_escape_string ($connection , $_POST["phonenumber"]);
        $error = array();
    
        if (empty($email) OR empty($location) OR empty($zipcode) 
           OR empty($firstname) OR empty($lastname) OR empty($phonenumber) ){
            array_push($error,"all fields are required !");
          }

        if (!preg_match("/^[a-zA-Z\s]+$/", $firstname)) {
            array_push ($error ,"Invalid firstname");
          } 
        
        if (!preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
            array_push ($error ,"Invalid lastname");
          } 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($error , "email not valid bro");
          }
        
         if (!ctype_digit($zipcode) && strlen($zipcode) < 2){
            array_push($error , "zipcode should contain only digits and over 2 numbers");
          }

          // check if mail exist 
          // $req="SELECT * FROM commandes WHERE client_mail='$email'";
          // $result=mysqli_query($connection,$req);
          // $IfExist = mysqli_num_rows($result);
          //   if ($IfExist > 0){
          //     array_push($error , "Please change email , Existing account");
          //   }
          // check if mail exist 

          print_r($error) ;


          $user_com_info="INSERT INTO commandes (client_mail,phonenumber,location,zipcode,firstname,lastname,company) VALUES (?,?,?,?,?,?,?)";
          $stmt=mysqli_stmt_init($connection);
          $prepare=mysqli_stmt_prepare($stmt,$user_com_info);

          if(count($error)===0) {
            if($prepare){
              mysqli_stmt_bind_param($stmt,"sssisss",$email,$phonenumber,$location,$zipcode,$firstname,$lastname,$company);
              mysqli_stmt_execute($stmt);
              header("Location: card.php");
              $_SESSION['activ_commande'] = "yes" ;
              $_SESSION['fix_client_mail'] =$email ;
              $_SESSION['fix_client_phonenumber'] =$phonenumber ;
              $_SESSION['fix_client_location'] =$location ;
              $_SESSION['fix_client_zipcode'] =$zipcode ;
              $_SESSION['fix_client_firstname'] =$firstname ;
              $_SESSION['fix_client_lastname'] =$lastname ;
              exit ;
            }
          }


      
// if (count($error) ===0){
//           $user_mail_first="INSERT INTO commandes (client_mail) VALUES (?)";
//           $stmt=mysqli_stmt_init($connection);
//           $prepare=mysqli_stmt_prepare($stmt,$user_mail_first);    

//               if($prepare){
//                 mysqli_stmt_bind_param($stmt,"s",$email);
//                 mysqli_stmt_execute($stmt);
//               }

//               $req="SELECT * FROM commandes WHERE client_mail='$email'";
//               $result=mysqli_query($connection,$req);
//               // $IfExist = mysqli_num_rows($result);

//               if ($result = $email){
//                 $ajout_info_commande=(" UPDATE commandes SET phonenumber = ? , location = ?, zipcode = ? ,
//                 firstname = ? , lastname = ? , company = ? 
//                 WHERE client_mail= ? ");
//                 $stmt=mysqli_stmt_init($connection);
//                 $prepare=mysqli_stmt_prepare($stmt,$ajout_info_commande);
//                 mysqli_stmt_bind_param($stmt,"sssssss",$phonenumber,$location,$zipcode,$firstname,$lastname,$company,$email);
//                 mysqli_stmt_execute($stmt);
//                 header("Location: card.php");
//                 } else {
//                     print_r($error);
//                 }
//               }
}


// thiiisssss
        // $request="SELECT * FROM commandes WHERE client_mail='$email' AND phonenumber ='$phonenumber' 
        //   AND location = '$location' AND zipcode = '$$zipcode' AND firstname='$firstname' 
        //   AND lastname='$lastname' AND company='$company' ";

        //   $reply=mysqli_query($connection,$request);

        //   if ($reply){
        //     header("Location: card.php");

        //   }else{
        //     $update_info = mysqli_query($connection," UPDATE commandes SET phonenumber ='$phonenumber' 
        //     , firstname='$firstname' , lastname='$lastname' , company='$company' , location = '$location' , zipcode = '$zipcode'
        //      WHERE client_mail='$email' ")  ;
        //       header("Location: card.php");
        //     }

?>

           