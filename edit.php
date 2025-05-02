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
	include('db.php');
	$name=$_GET['name'];
	$query=mysqli_query($con,"select * from `products` where name='$name'");
	$row=mysqli_fetch_array($query);
?>
<form class="form" method="POST" name="edit" action="update.php?name=<?php echo $name; ?>">
    <h1 class="login-title">Edit</h1>
		<label>Price</label><input type="text" class="login-input" value="<?php echo $row['price']; ?>" name="price">
		<label>Quantity</label><input type="text" class="login-input" value="<?php echo $row['quantity']; ?>" name="quantity">
		<input type="submit" class="login-button" name="update">
		<p class="link"><a href="home.php">Home</a><p>
	</form>
</body>
</html>