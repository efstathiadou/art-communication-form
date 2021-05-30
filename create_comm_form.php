<?php
require('db.php');

$sql = "CREATE TABLE comm_form (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    artmean VARCHAR(30) NOT NULL,
    artmovements VARCHAR(30) NOT NULL ,
    create_datetime TIMESTAMP
);";

if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$stmt = $conn->prepare("INSERT INTO comm_form (artistname, email, artmean, artmovements) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $artistname, $email, $artmean, $artmovements);

$artistname="Delacrux";
$email="dela@art.gr";
$artmean="Visual";
$artmovements="Realism";
$stmt->execute();

$artistname="Bambi";
$email="bambi@art.gr";
$artmean="Photography";
$artmovements="Realism";
$stmt->execute();

echo "<br/>New records created successfully";
echo "<a href='databasecontrol.php'>Back to Control Page</a>";
$stmt->close();

$conn->close();
?>