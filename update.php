<?php
	include('db.php');
	$name=$_GET['name'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	mysqli_query($con,"update `products` set price='$price', quantity='$quantity' where name='$name'");
	echo "<div class='form'>
    <h3>Updated succesfully</h3><br/>
    <p class='link'>Click here to see items<a href='Home.php'>Home</a></p>
    </div>";
?>