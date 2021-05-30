
<?php
$servername = "localhost";
$username = "root";
$password = "";
$databname= "test";
$error= [];

// Create connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $databname);
 // Check connection
 if (mysqli_connect_error ()) {
    die ("Database connection failed:". mysqli_connect_error ()); } 

?> 
