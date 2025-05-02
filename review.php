<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Review</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="review_rating.css"/>
<header>
    <div class="header_input">
    <nav>
        <ul>
            <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
            <li><a href = "sellProduct.php">Sell Products</a>&nbsp;&nbsp;</li>
            <li><a href = "view_reviews.php">Reviews</a>&nbsp;&nbsp;</li>
            <li><a href = "myProducts.php">My Products</a>&nbsp;&nbsp;</li>
            <li><a href = "Profile.php">Profile</a>&nbsp;&nbsp;</li>
            <li><a href = "logout.php">Logout</a>&nbsp;&nbsp;</li>
        
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<?php
  require('db.php');
- include('authentication.php');
  $username = $_SESSION['username'];
  if(isset($_POST["review"]))
{ 

  $rating = stripslashes($_REQUEST['rating']);
  //escapes special characters in a string$
  $rating = mysqli_real_escape_string($con, $rating);
  $comments = stripslashes($_REQUEST['comments']);
  $comments = mysqli_real_escape_string($con, $comments);
  $query="INSERT into `reviews` (username, rating, notes)
  VALUES ('$username', '$rating','$comments')";
  $result= mysqli_query($con, $query);
  if ($result) {
    echo "<div class='form'>
          <h3>You haven given review successfully.</h3><br/>
          <p class='link'>Click here to <a href='user_home.php'>Home Page</a></p>
          </div>";
} else {
    echo "<div class='form'>
          <h3>Required fields are missing.</h3><br/>
          <p class='link'>Click here to <a href='review.php'>Review</a> again.</p>
          </div>";
}
}
else{
?>
<form class="form" method="post"> 
  <span class="star-rating">
  <input type="radio" name="rating" value="1"><i></i>
  <input type="radio" name="rating" value="2"><i></i>
  <input type="radio" name="rating" value="3"><i></i>
  <input type="radio" name="rating" value="4"><i></i>
  <input type="radio" name="rating" value="5"><i></i>
  </span>
  <input type = "text" name="comments" placeholder="Post your review" class="form-input">
  <input type = "submit" name="review" value="review" class="form-button">
  </form>

 
<?php
}

?>
</div>