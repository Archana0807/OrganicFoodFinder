<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="main.css"/>
    <header>
    <div class="container">
    <nav>
        <ul>
        <li><a href = "home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
            <li><a href = "view_reviews.php">Reviews</a>&nbsp;&nbsp;</li>
            <li><a href = "posts.php">Posts</a>&nbsp;&nbsp;</li>
            <li><a href = "myProducts.php">My Products</a>&nbsp;&nbsp;</li>
            <li><a href = "logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
</div>
</header>
</head>
<body background-image="farmers.png" background-size="cover”>
<?php
include('authentication.php');
require('db.php');
    if (isset($_POST['additem'])) {
        $username = $_SESSION['username'];
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = mysqli_real_escape_string($con, $quantity);
        $price    = stripslashes($_REQUEST['price']);
        $price   = mysqli_real_escape_string($con, $price);
        $productName = $_FILES['productImg']['name'];
        $destination = 'products/'. $productName;
        move_uploaded_file($_FILES['productImg']['tmp_name'], $destination);
        $query    = "INSERT into `products` (name, productName, username, quantity, price)
                     VALUES ('$name','$productName', '$username', '$quantity', '$price')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Successfully added product
                  </h3><br>
                  <p class='link'>Click here to <a href='user_home.php'>Add another product</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='sellProduct.php'>Add a product</a></p>
                  </div>";
        }
    } else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Organic Food Finder</h1>
    <form class="form" action="" method="post" name="additem" enctype="multipart/form-data">
        <h3 class="login-title">Add Product</h3>
        <input type="file" class="login-input" name="productImg" placeholder="Product Image"/>
        <input type="text" class="login-input" name="name" placeholder="Product Name" required/>
        <input type="text" class="login-input" name="quantity" placeholder="Quantity" required/>
        <input type="text" class="login-input" name="price" placeholder="Price" required>
        <input type="submit" value="Add Product" name="additem" class="login-button"/>
</form>
    </div>
    </body>
<?php
    }
?>
</html>

