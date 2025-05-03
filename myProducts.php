<!DOCTYPE HTML>

<html>
<head>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="style.css"/>
    <head>
    <header>
    <nav>
        <ul>
        <li><a href = "home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
            <li><a href = "sellProduct.php">Sell Products</a>&nbsp;&nbsp;</li>
            <li><a href = "view_reviews.php">Reviews</a>&nbsp;&nbsp;</li>
            <li><a href = "posts.php">Posts</a>&nbsp;&nbsp;</li>
            <li><a href = "logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
</div>
</header>

</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Products</h1>
<?php
 require('db.php');
 include('authentication.php');
 $username = $_SESSION['username'];
 $result = mysqli_query($con,"SELECT * from products where username='$username'");

 echo "<table border='1'> 
 <tr>
 <th>Product</th>
 <th>Name</th>
 <th>Quantity</th>
 <th>Price</th>
 <th>Edit</th>
 <th>Delete</th>
 </tr>";
 while($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td><img src='products/{$row['productName']}' width='100'></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['price']."</td>";
?>
 <td><a href="edit.php?name=<?php echo $row['name']; ?>">Edit</a></td>
 <td><a href="delete.php?name=<?php echo $row['name']; ?>">Delete</a></td>
<?php
 }
 ?>
</body>