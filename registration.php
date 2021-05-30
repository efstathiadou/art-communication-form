<!DOCTYPE html>
<html class="registration-page">
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");

        //Check for duplicate username
       $check_duplicate_username= "SELECT username FROM users WHERE username='$username'";
       $result= mysqli_query($conn, $check_duplicate_username);
       $count = mysqli_num_rows($result);

        if($count>0)
        {
            echo "<div class='form'>
            <h3>Username already exists.</h3><br/>
            <p class='link'>Click here to <a href='registration.php'>registrer</a> again.</p>
            </div>";

            return false;
        }
        
       //Success
        else{
            $query    = "INSERT into `users` (username, password, create_datetime)
                        VALUES ('$username', '" . md5($password) . "', '$create_datetime')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='form'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
            }
            //Blank 
            else {
                echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                    </div>";
                 }
         }       
    } 

    else {
        ?>
        <div class="register-container">
            <form class="form" action="" method="post">
                <h1 class="login-title">Registration</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" required />
                <input type="password" class="login-input" name="password" placeholder="Password" required>
                <input type="submit" name="submit" value="Register" class="login-button">
                <p class="link"><a href="login.php">Click to Login</a></p>
            </form>
        </div>

        <?php
     }
?>
</body>
</html>