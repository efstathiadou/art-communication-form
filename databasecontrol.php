<?php
include("auth_session.php");
?>

<!DOCTYPE html>

<html class="registration-form">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Database Control Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

<body>
<div class="register-container">
    <form class="form" method="POST" action="create_comm_form.php">
        <button class="login-button" type="submit">Create Database</button>
    </form>
    <form class="form" method="POST" action="viewentries.php">
        <button class="login-button" type="submit">Show Table</button>
    </form>
    <form class="form" method="POST" action="search.php">
        <button class="login-button" type="submit">Search</button>
    </form>
    <a href="logout.php">Logout</a>
</div>
</html>