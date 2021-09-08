<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="login.css">
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
    	<div class="title">Admin Login</div>
		  <form action=" " method="POST">
		  	<div class="field">
          	<input type="text" id="user" name="user" required>
          	<label>Username</label>
        </div>
        <div class="field">
          	<input type="password" id="pass" name="pass" required>
          	<label>Password</label>
        </div>
        <!--<div class="content">
          <div class="pass-link"><a href="admin_reset.php">Forgot password?</a></div>
        </div>--><br>
        <div class="field">
          	<input type="submit" name="submit" id="btn" value="Login">
        </div>
      </form>
    </div>
  </body>
</html>
<?php   
include('connection.php');
if(isset($_POST['submit']))
{ 
  $username = $_POST['user'];  
  $password = $_POST['pass']; 
      
  $sql = "select * from admin_login where a_usrname = '$username' and a_pswd = '$password'";  
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);
          
  if($count == 1){
    $_SESSION['usrname'] = $username;
    header('Location: admin.php');
  }  
  else{  
    echo "<h2> Login failed. Invalid username or password.</h2>";
  }
}  
?>