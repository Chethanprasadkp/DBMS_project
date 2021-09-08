<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reset Password</title>
		<link rel="stylesheet" type="text/css" href="reset.css">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>
	<body>
		<input type="checkbox" id="check">
    	<label for="check">
    		<i class="fas fa-bars" id="btn"></i>
    		<i class="fas fa-times" id="cancel"></i>
    	</label>
    	<nav class="sidebar">
    		<div>
        		<img class="logo" src="logo.jpeg">
        		<ul>
          			<li><a href="index.php">Home</a></li>
          			<li><a href="#">Login <i class="fas fa-caret-down"></i></a>
            			<ul>
              				<li><a href="adminlogin.php">Admin login</a></li>
              				<li><a href="stafflogin.php">Staff login</a></li>
              				<li><a href="studentlogin.php">Student login</a></li>
            			</ul>
          			</li>
          			<li><a href="about.php">About</a></li>
        		</ul>
      		</div>
    	</nav>
		<div class="wrapper">
			<div class="title">Change Password</div>
			<form action=" " method="POST">
				<div class="field">
          			<input type="text" name="user" required>
          			<label>Username</label>
        		</div>
				<div  class="field">
					<input type="password" name="newpsw" required>
					<label>Enter New Password</label>
				</div>
				<div  class="field">
					<input type="password" name="verpsw" required>
					<label>Confirm Password</label>
				</div><br>
				<div class="field" id="reset">
					<input type="submit" name="reset" value="Reset Password">
				</div>
			</form>
		</div>
	</body>
</html>
<?php
include('connection.php');
if(isset($_POST['reset']))
{
	$username = $_POST['user'];
	$newpsw = $_POST['newpsw'];
	$verpsw = $_POST['verpsw'];

	$sql = "SELECT * from staff where s_email ='$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if($count == 1){
		if($newpsw == $verpsw){
			$query = $con->prepare("update `staff` set `s_pswd`='".$newpsw."' where `s_email`='".$username."'");
			$query->execute();
			header('Location: stafflogin.php');
			$query->close();		
		}
		else{
			echo "<h1> Passwords Don't Match.</h1>";
		}
	}
	else{
		echo "<h1> Invalid Username</h1>";
	}
	$con->close();
}
?>