<!DOCTYPE html>
<html>
<head>
	<title>AUTHENTICATION</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification</title>
   
</head>  
<link rel="stylesheet" type="text/css" href="style.css">
<body>
    
    <div class="wrapper"><?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
        <h2>FORGET PASSWORD</h2>
        
        
        <form role="form" method="post">

                <div class="form-group">
                	
                    <label>Email<br></label>
                    <input type="text" name="verified_email" class="box" placeholder="Enter Verified email..">
                   
                </div><br>
                <div class="form-group">
                   <center> <button type="submit" name="forget" class="button">SEND</button><BR> </center>
                  
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

$conn3 = mysqli_connect($dbhost ,$dbuser,$dbpass,$dbname);

if(isset($_POST['forget']))
{ 
        $myemail = $_POST['verified_email'];
        
		$query_email= "SELECT * FROM users WHERE email='$myemail'";
		$exist_em = mysqli_query($conn3, $query_email);

		$resultmails = mysqli_query($conn3, $query_email);

		if (empty($myemail)){
				header("Location: forgetpass.php?error=Enter your verified email");
						exit();

		}else if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
       header("Location: forgetpass.php?error=Invalid email");
        exit();

        }else if(mysqli_num_rows($exist_em) < 1 ){
			header("Location: forgetpass.php?error=Email Address Doesn't exists");		
			exit();	

		}else if(mysqli_num_rows($resultmails) === 1) {

			$row3 = mysqli_fetch_assoc($resultmails);
			 $_SESSION['email'] = $row3['email'];
			if($row3['email'] === $myemail){

					header("Location: changepass.php");
                 
		           	
		       			}
					}
				}

		?>