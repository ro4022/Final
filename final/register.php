<?php 

$user=0;
$success=0;

include "config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pQuantity = $_POST['pQuantity'];

    $sql = "select * from `final` where username = '$username'";
    $sql = "select * from `final` where password = '$password'";

    $result = mysqli_query($con,$sql);

    if($result){
       $num = mysqli_num_rows($result);
       if($num>0){
        $user=1;
        header('location:login.php');
       }else{
        $sql = "insert into `final` (username,password,pName,pPrice,pQuantity) values ('$username','$password','$pName','$pPrice','$pQuantity')";

        $result = mysqli_query($con,$sql);

        if($result){
            header('location:login.php');
        }
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
    <h1>registration form</h1>
    <form action="register.php" method="post">
     username : <input type="text" name="username" placeholder="Enter Your Username"><br>
     password : <input type="text" name="password" placeholder="Enter Your Password"><br>
     productName : <input type="text" name="pName" placeholder="Enter Your Product Name"><br>
     productPrice : <input type="text" name="pPrice" placeholder="Enter Your Product Price"><br>
     productQuantity : <input type="number" name="pQuantity" placeholder="Enter Your Product Quantity" autocomplete="off"><br><br>
       <input type="submit" name="submit" value="insert">
    </form>
</body>
</html>