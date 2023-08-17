<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "final";

$con = new mysqli($hostname,$username,$password,$database);

if(!$con){
    die(mysqli_error($con));
}


?>