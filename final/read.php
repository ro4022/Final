<?php 

session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}else{
    header('location:login.php');
}

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Read Data Table</h1>
    <table border="2px solid black">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>pName</th>
                <th>pPrice</th>
                <th>pQuantity</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            $sql = "select * from `final`";

            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $pName = $row['pName'];
                    $pPrice = $row['pPrice'];
                    $pQuantity = $row['pQuantity'];

                    echo '<tr>
                      <th>'.$id.'</th>
                      <th>'.$username.'</th>
                      <th>'.$password.'</th>
                      <th>'.$pName.'</th>
                      <th>'.$pPrice.'</th>
                      <th>'.$pQuantity.'</th>
                      <td>
                      <button><a href="update.php?id='.$id.'">Update</a></button>
                      <button><a href="delete.php?id='.$id.'">Delete</a></button>
                      </td>
                    </tr>';

                }
            }

            
            ?>
        </tbody>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>
