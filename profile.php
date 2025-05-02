<?php
include('db.php');
include('authentication.php');
$username = $_SESSION['username'];

// Fetch current user data
$query = mysqli_query($con, "SELECT * FROM `users` WHERE username='$username'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="main.css"/>
    <script>
        function validation() {
            var email = document.forms["update"]["email"].value;
            var phone = document.forms["update"]["phnum"].value;

            var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var regPhone = /^\d{10}$/;

            if (email === "" || !regEmail.test(email)) {
                alert("Please enter a valid e-mail address.");
                return false;
            }
            if (phone === "" || !regPhone.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="addProduct.php">Sell Products</a></li>
            <li><a href="myProducts.php">My Products</a></li>
            <li><a href="view_reviews.php">Reviews</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<form class="form" method="POST" name="update" onsubmit="return validation()" action="update_profile.php">
    <h1 class="login-title">Edit Profile</h1>

    <label>Email</label>
    <input type="text" class="login-input" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

    <label>Mobile Number</label>
    <input type="text" class="login-input" name="phnum" value="<?php echo htmlspecialchars($row['phonenum']); ?>" required>

    <input type="submit" class="login-button" name="update" value="Update Profile">

    <p class="link"><a href="home.php">Back to Home</a></p>
</form>
</body>
</html>
