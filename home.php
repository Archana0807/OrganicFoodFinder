<!DOCTYPE HTML>

<html>
<head>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="style.css"/>
    <header>
    <nav>
        <ul>
            <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
            <li><a href = "sellProduct.php">Sell Products</a>&nbsp;&nbsp;</li>
            <li><a href = "view_reviews.php">Reviews</a>&nbsp;&nbsp;</li>
            <li><a href = "myProducts.php">My Products</a>&nbsp;&nbsp;</li>
            <li><a href = "Profile.php">profile</a>&nbsp;&nbsp;</li>
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
 $result = mysqli_query($con,"SELECT products.name as product_name, users.name as username, price, quantity,  productName, phonenum FROM products JOIN users ON products.username=users.username");

 echo "<table border='1'> 
 <tr>
 <th>Product</th>
 <th>Name</th>
 <th>Price</th>
 <th>Seller  Name</th>
 <th>Contact  Details</th>
 </tr>";
 while($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td><img src='products/{$row['productName']}' width='100'></td>";
echo "<td>".$row['product_name']."</td>";
echo "<td>".$row['price']."</td>";

echo "<td>".$row['username']."</td>";
echo "<td>".$row['phnum']."</td>";

 echo "</tr>";
 }
 ?>
</body>
