<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification</title>
   
</head>  
<link rel="stylesheet" type="text/css" href="style.css">
<body>
    
    <div class="wrapper">
        <h2>Verification</h2>
        
        
        <form role="form" method="post">

                <div class="form-group">
                    <label>Code<br></label>
                    <input type="text" name="code" class="box">
                   
                </div><br>
                <div class="form-group">
                    <button type="submit" name="verify" class="button">VERIFY</button><BR>
                   <center> <a class="" style=" color: white;" href="random.php" target="_blank">GET CODE</a> </center>
                </div>

                
        </form>

    
</body>
</html>	

<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbacc";

 $conn2 = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname);

date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d H:i:s');


if(isset($_POST['verify']))
{ 
    if(empty(trim($_POST["code"]))){
        header("Location: loginform.php?error=Please enter your code in Authentication");
		exit();
    } else{ 

        
        $mycode = $_POST['code'];
        $user= $_SESSION["user_id"];
        $activity = "Login";
        
		$query_code = "SELECT * FROM code WHERE code='$mycode'";

		$result2 = mysqli_query($conn2, $query_code);

		$query3 = "SELECT expiration FROM code where code='$mycode'";
        $result3 = mysqli_query($conn2, $query3);

       $sql4 = "INSERT INTO event (user_id, activity) VALUES ('$user','$activity')";

		if(mysqli_num_rows($result2) === 1){
			$row2 = mysqli_fetch_assoc($result2);
			if($row2['code'] === $mycode){
				if (mysqli_num_rows($result3) === 1){
					 $row3 = mysqli_fetch_assoc($result3);
                	if(($row3["expiration"]) > ($currentDate))
                	{
                    	$result4 = mysqli_query($conn2, $sql4) or die(mysqli_error($conn2));
				            if($result4){
							header("Location: homepage.php");	
							}
							else{
							echo "Event recorder crash";
							}

					}else{
					header("Location: verification.php?error=Expired Code");
					die;
				}
			}
			}else{
			header("Location: verification.php?error=Incorrect Code");
			exit();
       			}
		}else{
			header("Location: verification.php?error=Incorrect Code");
			exit();
       }
   }
}
		?>