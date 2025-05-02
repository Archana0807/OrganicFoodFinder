<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <script>
        function validation() {
    var name =
        document.forms.Register.name.value;
    var email =
        document.forms.Register.email.value;
    var phone =
        document.forms.Register.phonenum.value;
    var password =
        document.forms.Register.password.value;

    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
    var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
    var regName = /\d+$/g;								 // Javascript reGex for Name validation

    if (name == "" || regName.test(name)) {
        alert("Please enter your name properly.");
        return false;
        name.focus();
       
    }

    if (email == "" || !regEmail.test(email)) {
        alert("Please enter a valid e-mail address.");
        return false;
        email.focus();
       
    }
    
    if (password == "") {
        alert("Please enter your password");
        return false;
        password.focus();
    }

    if(password.length <6){
        alert("Password should be atleast 6 character long");
        return false;
        password.focus();

    }
    if (phone == "" || !regPhone.test(phone)) {
        alert("Please enter valid phone number.");
        return false;
        phone.focus();
    }
}
    
    </script>

    <link rel="stylesheet" href="style.css"/>
 
</head>
<body>
<?php
require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phonenum    = stripslashes($_REQUEST['phonenum']);
        $phonenum    = mysqli_real_escape_string($con, $phonenum);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (name, phonenum, email, username, password)
                     VALUES ('$name', '$phonenum', '$email', '$username','$password')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }

    } else {
?>
<header>
</header>
<h1 style="font-size:45px;text-align:center;color:FF0000">Organic Food Finder </h1>  
    <form class="form" action="" onsubmit="return validation()" method="post" name="Register">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Registeration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" autofocus="true"/>
        <input type="text" class="login-input" name="email" placeholder="Email"/>
        <input type="text" class="login-input" name="phonenum" placeholder="Mobile Number" />
        <input type="text" class="login-input" name="username" placeholder="Username"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Register" name="Register" class="login-button"/>
        <p class="link"><a href="index.php">Login</a></p>
  </form>
<?php
    }
?>

</body>
</html>