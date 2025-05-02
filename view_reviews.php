<?php
require('db.php');
include('authentication.php');

// Fetch all reviews from the database
$query = "SELECT * FROM `reviews` ORDER BY id DESC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>All Reviews</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="main.css"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .review-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .review-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .review-item:last-child {
            border-bottom: none;
        }
        .username {
            font-weight: bold;
            color: #333;
        }
        .rating {
            color: #ffa500;
            font-size: 18px;
        }
        .comment {
            margin-top: 5px;
            color: #555;
        }
        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
<header>
    <div class="header_input">
    <nav>
        <ul>
            <li><a href="user_home.php">Home</a></li> 
            <li><a href="testinomials.php">Testimonials</a></li> 
            <li><a href="my_bookings.php">Booking</a></li>
            <li><a href="contact_us.php">Contact Us</a></li> 
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    </div>
</header>

<div class="review-container">
    <h2>User Reviews</h2>
    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='review-item'>";
            echo "<div class='username'>" . htmlspecialchars($row['username']) . "</div>";
            echo "<div class='rating'>Rating: " . str_repeat("★", (int)$row['rating']) . str_repeat("☆", 5 - (int)$row['rating']) . "</div>";
            echo "<div class='comment'>" . nl2br(htmlspecialchars($row['notes'])) . "</div>";
            echo "</div>";
            
        }
    } else {
        echo "<p>No reviews found.</p>";
    }
    ?>
    <p class="link"><a href="review.php">Add Review</a></p>
</div>
</body>
</html>
