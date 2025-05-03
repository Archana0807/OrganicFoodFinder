<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Post</title>
    <link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="style.css"/>
<header>
<div class="container">
  <nav>
        <ul>
        <ul>
        <li><a href = "home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
            <li><a href = "sellProduct.php">Sell Products</a>&nbsp;&nbsp;</li>
            <li><a href = "myProducts.php">My Products</a>&nbsp;&nbsp;</li>
            <li><a href = "logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
        </ul>
    </nav>       
</div>
</header>
</head>
<body>
<?php
    require('db.php');
    include('authentication.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // removes backslashes
        $username = $_SESSION['username'];
        $post = stripslashes($_REQUEST['post']);
        $post = mysqli_real_escape_string($con, $post);
        $phnum = stripslashes($_REQUEST['phnum']);
        $phnum = mysqli_real_escape_string($con, $phnum);
        $query    = "INSERT into `posts` (description, phnum, username) VALUES ('$post', '$phnum', '$username')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Posted successfully.</h3><br/>
                  <p class='link'>Click Here for <a href='home.php'>Home</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>You are not Eligible</h3><br/>
                  <p class='link'>Click here for <a href='home.php'>Home</a> again.</p>
                  </div>";
        }
    }
else{

?>
<h1 style="font-size:30px;text-align:center;color:#000000">Agri Guide</h1>
    <form class="form" action="" method="post">
    <form>
    <h1 class="form-title">Post</h1>
    <textarea name="post" class="login-input" placeholder="Write your post" rows="4" columns = "60" required /></textarea>
    <input type="text" class="login-input" name="phnum" placeholder="Mobile No" required />
    <input type="submit" name="submit" value="Post" class="form-button">
    </form>
<?php
    }
?>

</body>


</html>