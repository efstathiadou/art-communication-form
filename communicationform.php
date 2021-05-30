<?php
include("auth_session.php")
?>

<?php
    require('db.php');
    $emailErr="";
    $email = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

if($_SERVER["REQUEST_METHOD"] == "POST"){

            $create_datetime = date("Y-m-d H:i:s");

            $artistname = test_input($_POST["artistname"]);

            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr="Email is invalid.";
            }

          $artmean = test_input($_POST["artmean"]);
          $artmovements = test_input($_POST["artmovements"]);
          if(empty($emailErr)){
            $query = " INSERT into `comm_form` (artistname, email, artmean, artmovements, create_datetime) 
            VALUES ('$artistname', '$email', '$artmean', '$artmovements','$create_datetime')";
            $result = mysqli_query($conn,$query);

            if ($result) {
                  echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='logout.php'>Logout</a></p>
                      </div>";
              }
              else {
                  echo "<div class='form'>
                      <h3>Registration failed.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
              } 
          }
  }
    mysqli_close($conn);
  
?>

<!DOCTYPE html>
<html class="registration-page">
<head>
    <meta charset="utf-8">
    <title>Communication Form</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
        <div class="register-container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
         method="post">
            <h1 class="login-title"> Communication Form</h1>
            
            <div>
              <input type="text" class="login-input" name="artistname" placeholder="Artist Name" required />
              <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
              <span class="error"> <?php echo $emailErr;?></span>
              <br>
              <br>
            </div>
            
            <div >
                <label for="" class="login-input" >Art Means:</label><br><br>
                <input type="radio" value="Music"  name="artmean" required/> Music <br>
                <input type="radio" value="Photography"  name="artmean"/> Photography <br>
                <input type="radio" value="Cinematography"  name="artmean"/> Cinematography <br>
                <input type="radio" value="Visual"  name="artmean"/> Visual <br>
            </div>
            <br>
           
            <label for="" class="login-input">Artistic Movement:</label> <br><br>
            <select name="artmovements" required>
                    <option value="">--Select Movement--</option>
                    <option value="Romanticism">Romanticism</option>
                    <option value="Realism">Realism</option>
                    <option value="Surrealism">Surrealism</option>
            </select>
            <br>
            <br>
            <div >
                 <button type="submit" name="save" class="login-button">Submit</button>
             </div>
            <p><a href="logout.php">Logout</a></p>
        </form>
        </div>

      
    
  
</body>
</html>