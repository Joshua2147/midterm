<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbacc";

$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(isset($_POST['reg_user']))
{	
	
	$user_name = $_POST['username'];
	$pass = $_POST['password'];
	$confirm = $_POST['cpass'];
	$email = $_POST['email'];
	$query_user = "SELECT * FROM users WHERE username ='$user_name'";
  	$query_em = "SELECT * FROM users WHERE email='$email'";
  	$exist_user = mysqli_query($conn1, $query_user);
  	$exist_em = mysqli_query($conn1, $query_em);

		if (empty($user_name)) {
		header("Location: register.php?error=User Name is required");
			exit();
		    
		}else if(mysqli_num_rows($exist_user) > 0){
			header("Location: register.php?error=Username already exists");	
			exit();
		}else if(empty($email)){
				header("Location: register.php?error=Email Address is required");
		    	exit();
		 
		}else if(mysqli_num_rows($exist_em) > 0){
			header("Location: register.php?error=Email Address already exists");		
			exit();
		}else if(empty($email)){
				header("Location: register.php?error=Email Address is required");
		    	exit();
		    
		}else if(mysqli_num_rows($exist_em) > 0){
			header("Location: register.php?error=Email Address already exists");		
			exit();	
		}else if(empty($pass)){
			header("Location: register.php?error=Password is required");
			exit();

		}else if(empty($confirm)){
			header("Location: register.php?error=Confirming password is required");
			exit();
		    
		} else if(!empty($user_name) && !empty($pass) && !empty($email))
			{

			if( strlen($pass ) < 8 ) {
				header("Location: register.php?error=Password must be atleast 8 characters");
			  	exit();
			}else if( !preg_match("#[0-9]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one number!");
				exit();
			}else if( !preg_match("#[a-z]+#", $pass) ) {
				header("Location: register.php?error=Password must include at least one small 1letter!");
				exit();
			}else if( !preg_match("#[A-Z]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one capital letter!");
				exit();
			}else if( !preg_match("#[\_@&!%]+#", $pass ) ) {
				header("Location: register.php?error=Password must include at least one symbol!");
				exit();

			}else if($_POST['password'] !== $_POST['cpass']) {
			header("Location: register.php?error=Password and Confirm password should match!");
				exit();
			
		    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      	header("Location: register.php?error=Invalid email");
		      	exit();
		    }
			else
			{
				//save to database
				$query = "insert into users values (NULL, '$user_name', '$confirm', '$email')";

				mysqli_query($conn1,$query);

				header("Location: loginform.php");
				}

		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="loginform.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2><br><?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
  </div>

  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Username:</label>
  	  <input type="text" placeholder="Enter Username" name="username" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email:</label>
  	  <input type="email" placeholder="Email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password:</label>
  	  <input type="password" placeholder="Enter Password" name="password" pattern= "(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$)" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password:</label>
  	  <input type="password" placeholder="Re-type Password" name="cpass" pattern= "(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$)" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  	</div>
  	<div class="input-group">
  	  <center><button type="submit" class="btn2" name="reg_user">Register</button></center>
  	</div>
  	<center class="AAM"><p>
  		Already a member? <a href="loginform.php" style="color: #DF5B5B;">Sign in</a>
  	</center></p>
  </form>
</body>
</html>