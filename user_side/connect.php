<?php

$server='localhost' ;
$user='root';
$passwd='';
$mydb='mydatabase';

$connection= new mysqli ($server,$user,$passwd,$mydb);
    if($connection -> connect_error){
        echo ("something wrong !".$connection -> connect_error) ;
        exit();
    }  
?>