<?php
include('db.php');
include('authentication.php');

$username = $_SESSION['username'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phnum = mysqli_real_escape_string($con, $_POST['phnum']);

    $update = mysqli_query($con, "UPDATE `users` SET email='$email', phnum='$phnum' WHERE username='$username'");

    if ($update) {
        $message = "Profile updated successfully.";
    } else {
        $message = "Error updating profile. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="form">
    <h3><?php echo $message; ?></h3>
    <p class="link">Click here to go <a href="home.php">Home</a></p>
</div>
</body>
</html>
