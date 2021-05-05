<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="loginform.css">
  

</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="">
  	<div class="input-group">
  		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
  		<label>Username</label>
  		<input type="text" name="username" placeholder="Enter Username.." >
  	</div>
  	<div class="input-group1">
  		<label>Password</label>
  		<input class="EP" type="password" name="password" placeholder="Enter Password.." id="myInput">
    
    <br><input class="CB" type="checkbox" onclick="myFunction()">&nbsp;Show Password</br>
        <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
    </div>
  	
  	<div class="input-group">
  		<center>
    <button type="submit" class="btn" name="login_user">Submit</button>
	
	</center>
  	</div>
    <br>
  	<center class="NYP"><p><br>
  		Forgot Pass? <a href="forgetpass.php" style="color: #DF5B5B;">Click here</a> <br>
  		No account? <a href="register.php" style="color: #DF5B5B;">Sign up</a>
  	</center></p>
  </form>
</body>
</html>

<?php
session_start();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbacc";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(isset($_POST['login_user']))
{
	$user_name = $_POST['username'];
	$pass = $_POST['password'];


			if(empty($user_name)) {
						header("Location: loginform.php?error=User Name is required");
						exit();
			}

			else if(empty($pass)){
						header("Location: loginform.php?error=Password is required");
						exit();
			}

			else if(!empty($user_name) && !empty($pass)){
					//READ to database
					$query = "select * from users where username = '$user_name' limit 1" ;
					$result = mysqli_query($con, $query);

			
					if ($result)
							{
								if($result && mysqli_num_rows($result) > 0)
									{
									$user_data = mysqli_fetch_assoc($result);
									$_SESSION['email'] = $user_data['email'];
									$_SESSION['user_id'] = $user_data['user_id'];
									if ($user_data['password'] === $pass)
									{	
									
										header("Location: verification.php");
										die;
										
									}
									
										header("Location: loginform.php?error=Incorrect Username and Password");
									
									
									}
						}
						else {
									header("Location: loginform.php?error=Incorrect Username and Password");
										 }

					}
		    }

 ?>