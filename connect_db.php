<?php

//Database Varaibles
$servernaem = "localhost";
$username = "root";
$password = "";
$database = "picross";


//Connecting Database
$conn = mysqli_connect($servernaem,$username,$password,$database);
if(!$conn){
    echo "Connection failed";
}
?>
