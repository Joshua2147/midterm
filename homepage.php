<?php
session_start();

include ("dbconnect.php");


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <div class="wrapper">
        <h1>Hello, <?php echo $_SESSION['user_id']; ?> </h1>
        <a href="display.php" >View Activity</a><br><br>
    </div>
</center>
    <p>
       
        <a href="logout.php" class="button">Sign Out</a>
    </p>
    
</body>
</html>