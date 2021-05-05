<?php
session_start();
 $server="localhost";
 $aunmae="root";
 $apassword = "";
 $db_name = "dbacc";
 $conn2 = mysqli_connect($server, $aunmae, $apassword, $db_name);
//session_unset();
//session_destroy();
 $user = $_SESSION['user_id'];
 $activity = "Logout";

 $sql4 = "INSERT INTO event (user_id, activity) VALUES ('$user','$activity')";
 $result4 = mysqli_query($conn2, $sql4) or die(mysqli_error($conn2));
 if($result4){
 header("Location:loginform.php");
 }else{
 echo "ERROR";
 }