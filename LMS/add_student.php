<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Student</title>
	<link rel="stylesheet" type="text/css" href="add_user.css">
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
	<div class="topbar">
		<div id="nav">
			<ul>
				<li><img src="default.png" alt="Avatar" class="avatar"></li>
				<li><a href="admin.php"> Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
					<ul>
						<li><a href="add_staff.php">Add Staff</a></li>
						<li><a href="add_student.php">Add Student</a></li>
						<li><a href="manage_staff.php">Manage Staff</a></li>
						<li><a href="manage_student.php">Manage Student</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>	
	</div>
	<div class="wrapper">
		<div class="title">Register Here!!</div><br>
	  	<form action=" " method="POST" enctype="multipart/form-data">
			<div class="field">
				<label>First Name</label>
				<input type="text" class="input" id="fname" name="fname" required="*">
			</div>
			<div class="field">
		    	<label>Last Name</label>
				<input type="text" class="input" id="lname" name="lname" required="*">
			</div>
			<div class="field">
				<label>Phone Number</label>
				<input type="number" class="input" id="phno" name="phno" required="*">	
			</div>
			<div class="field">
		    	<label>Email</label>
				<input type="text" class="input" id="email" name="email" required="*">
			</div>
			<div class="field">
		    	<label>Department</label>
				<input type="text" class="input" id="dept" name="dept" required="*">
			</div>
			<div class="field">
		    	<label>Semester</label>
				<input type="number" class="input" id="sem" name="sem" required="*">
			</div>
			<div class="field">
				<label>Year Joined</label>
				<input type="year" class="input" id="year" name="year" required="*">	
			</div>
			<div class="field">
				<label>Set Password</label>
    			<input type="password" class="input" name="psw" id="psw" required="*">
			</div>
			<div class="field">
				<label>Set Profile Photo</label>
				<input type="file" id="myFile" name="image" required="*">
			</div>
			<div class="field">
				<input type="submit" name="submit" value="Add" class="btn">
			</div>
	 	</form>   
	</div>
	<?php
	include('connection.php');
	if(isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phno = $_POST['phno'];
		$email = $_POST['email'];
		$dept = $_POST['dept'];
    	$sem = $_POST['sem'];
		$year = $_POST['year'];
		$psw = $_POST['psw'];
		$filename = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    	$query = "INSERT INTO `student`(`first_name`,`last_name`,`pho`,`email`,`department`,`sem`,`year_joined`,`pswd`,`profile_photo`) VALUES('$fname','$lname','$phno','$email','$dept','$sem','$year','$psw','$filename')";
    	$sql = mysqli_query($con,$query);

    	if($sql){
    		echo "<h2>Added successfully</h2>";
    		header('Location: add_student.php');
    	}
    	else{
    		echo "<h2>Error occurred while adding</h2>";
    		header('Location: add_student.php');
    	}
	}
	?>
</body>
</html>