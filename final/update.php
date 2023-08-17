<?php 

include "config.php";

$id = $_GET['id'];

$sql = "select * from `final` where id = '$id'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

    $username = $row['username'];
    $password = $row['password'];
    $pName = $row['pName'];
    $pPrice = $row['pPrice'];
    $pQuantity = $row['pQuantity'];

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pName = $_POST['pName'];
        $pPrice = $_POST['pPrice'];
        $pQuantity = $_POST['pQuantity'];

        $sql = "update `final` set id='$id', username='$username', password='$password',pName='$pName',pPrice='$pPrice',pQuantity='$pQuantity' where id = '$id'";

        $result = mysqli_query($con,$sql);

        if($result){
            header('location:read.php');
        }else{
            die(mysqli_error($con));
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
<form method="post">
     username : <input type="text" name="username" placeholder="Enter Your Username" value="<?php echo $username;?>"><br>
     password : <input type="text" name="password" placeholder="Enter Your Password"  value="<?php echo $password;?>"><br>
     productName : <input type="text" name="pName" placeholder="Enter Your Product Name"  value="<?php echo $pName;?>"><br>
     productPrice : <input type="text" name="pPrice" placeholder="Enter Your Product Price"  value="<?php echo $pPrice;?>"><br>
     productQuantity : <input type="text" name="pQuantity" placeholder="Enter Your Product Quantity"  value="<?php echo $pQuantity;?>"><br><br>
       <input type="submit" name="submit" value="update">
    </form>
</body>
</html>