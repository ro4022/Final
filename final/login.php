<?php 
session_start();

if(isset($_SESSION['username'])){
    header('location:read.php');
}

include "config.php";

$login=0;
$invalid=0;


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from `final` where username = '$username' and password = '$password'";

    $result = mysqli_query($con,$sql);

    if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $_SESSION['username'] = $username;
            $login=1;
            header("location:read.php");
        }else{
            $invalid=1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="login.php" method="post">
      username  : <input type="text" name="username" placeholder="Enter Your Username"><br>
      password  : <input type="password" name="password" placeholder="Enter Your Password"><br><br>
        <input type="submit" name="submit" value="login">
    </form>
</body>
</html>