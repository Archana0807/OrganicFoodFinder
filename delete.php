<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Organic Food Finder</h1>
	<link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
    $name=$_GET['name'];
    include('db.php');
    $result = mysqli_query($con, "SELECT * from `products` where name='$name'");
    $row=mysqli_fetch_array($result);
    unlink("products/".$row['productName']);
    mysqli_query($con,"delete from `products` where name='$name'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'>Click here to see products<a href='myProducts.php'>Products</a></p>
    </div>";
?>