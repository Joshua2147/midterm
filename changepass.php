<!DOCTYPE html>
<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbacc";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if($_SERVER['REQUEST_METHOD'] == "POST")
{ 

  $pwd = $_POST['new'];
  $cpwd = $_POST['confnew'];
  // $em=$_POST['old'];
  
  if(empty( $pwd)){
      header("Location: changepass.php?error=Password is required");
      exit();

    }else if(empty($cpwd)){
      header("Location: changepass.php?error=Confirming password is required");
      exit();
    // }else if(empty($em)){
    //   header("Location: forgot.php?error=email is required");
    //   exit();
    // }else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    //    header("Location: forgot.php?error=Invalid email");
    //     exit();  
    } else if(!empty($pwd) && !empty($cpwd))
      {
        if( strlen($pwd ) < 8 ) {
          header("Location: changepass.php?error=Password must be atleast 8 characters");
            exit();
        }else if( !preg_match("#[0-9]+#",  $pwd ) ) {
          header("Location: changepass.php?error=Password must include at least one number!");
          exit();
        }else if( !preg_match("#[a-z]+#",  $pwd) ) {
          header("Location: changepass.php?error=Password must include at least one small 1letter!");
          exit();
        }else if( !preg_match("#[A-Z]+#",  $pwd ) ) {
          header("Location: changepass.php?error=Password must include at least one capital letter!");
          exit();
        }else if( !preg_match("#[\_@&!%]+#",  $pwd) ) {
          header("Location: changepass.php?error=Password must include at least one symbol!");
          exit();

        }else if($_POST['new'] !== $_POST['confnew']) {
        header("Location: changepass.php?error=Password and Confirm password should match!");
          exit();
          
        }else{

        	$em=$_SESSION['email'];

        	// echo $em;
        	$query_pass="UPDATE users set password='$cpwd' where email='$em'";

   			$run2 = mysqli_query($connect,$query_pass) or die(mysqli_error($connect));



   			if ($run2){
   				header("Location: loginform.php");
   			}
   		}
   	}
   }



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="loginform.css">
  

</head>
<body>
  <div class="header">
  	<h2>RESET PASSWORD</h2>
  </div>
	 
  <form method="post" action="">
  	<div class="input-group">
  		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
  		<label>New Password</label>
  		<input type="text" name="new" placeholder="Enter New Password.." >
  	</div>
  	<div class="input-group1">
  		<label>Confirm Password</label>
  		<input class="EP" type="password" name="confnew" placeholder="RE Enter Password.." id="myInput">
    
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
