<!DOCTYPE html>
<html class="registration-page">
<head>
    <meta charset="utf-8"/>
    <title>Search</title>
</head>
<body>
<?php

require("db.php");

if(isset($_POST['submit'])){

$artmean = $_POST['artmean'];
$sql = "SELECT * FROM comm_form WHERE artmean LIKE '%$artmean%' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "Artist Name: " . $row["artistname"]. " - Email: " . $row["email"]. " -Art Mean:" . $row["artmean"]. " -Art Movement:" 
 . $row["artmovements"] ."<br>";
 }

} else {
 echo "0 results";
}
mysqli_close($conn);
}
?>

<h2>Find user based on art means</h2>

<form method="post">
  <label for="artmean">Art Mean</label>
  <input type="text" id="artmean" name="artmean">
  <input type="submit" name="submit" value="View Results">
</form>

<a href="databasecontrol.php">Back to Control Page</a>
</body>