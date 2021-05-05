<html>
    <head>
        <style>
            body{
                background-color: #141414;
            }
            table{
                border-collapse: collapse;
                width: 100%;
                color: white;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
                background-color: #303030;
                }
            th{
                background-color: red;
                color: white;
            }
            tr:nth-child(even) {background-color: #303030}
</style>
</head>
<body bgcolor="#EEFDEF">
<?php 
session_start();

if ( isset($_SESSION['user_id'])) {

 ?>
<?php
		$link_address = '#'; 
// $conn = mysqli_connect("localhost", "root", "", "dbname");
// 		if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbacc";

$conn = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname);

$sql2="SELECT event_id, user_id, activity, time FROM event WHERE user_id='{$_SESSION['user_id']}'
ORDER BY time DESC;";
$result2 = $conn->query($sql2);
$sql1="SELECT event_id, user_id, activity, time FROM event
ORDER BY time DESC;";
	$result = $conn->query($sql1);



		echo "<br/><h3></h3>";
		echo "<table>";
		
echo "<table border='3'>

<tr>

<th>Id</th>

<th>user_id</th>

<th>Activity</th>

<th>Time</th>

</tr>";


if($_SESSION['user_id']===$_SESSION['user_id']){
	if ($result->num_rows > 0)
while($row = $result->fetch_assoc()) {

  echo "<tr>" ;
	echo  "<td>" . $row['event_id'] . "</td>";
	echo "<td>" . $row['user_id'] . "</td>";
	echo " <td>" . $row['activity'] . "</td>";
	echo " <td>" . $row['time'] . "</td>";
	"<tr";
 
}
}
	echo "</table>";
// else{
// 		if ($result2->num_rows > 0)
// 	while($row = $result2->fetch_assoc()) {

//   echo "<tr>" ;
// 	echo  "<td>" . $row['event_id'] . "</td>";
// 	echo "<td>" . $row['userid'] . "</td>";
// 	echo " <td>" . $row['activity'] . "</td>";
// 	echo " <td>" . $row['time'] . "</td>";
// 	"<tr";
 
// }
}


		


?>