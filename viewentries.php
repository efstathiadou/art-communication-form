<?php
require("db.php");

$sql = "SELECT artistname, email, artmean, artmovements FROM comm_form";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "Artist Name: " . $row["artistname"]. " - Email: " . $row["email"]. " -Art Mean:" . $row["artmean"]. " -Art Movement:" 
 . $row["artmovements"] ."<br>";}

} else {
 echo "0 results";
}
echo "<a href='databasecontrol.php'>Back to Control Page</a>";
mysqli_close($conn);

?>