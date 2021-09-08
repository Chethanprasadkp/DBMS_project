<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Staff</title>
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

    <?php
    $s_id= $_GET['s_id'];

    include 'connection.php';
    $sql = "select * from staff where s_id=$s_id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $s_firstname = $row['s_firstname'];
    $s_lastname = $row['s_lastname'];
    $s_phno = $row['s_phno'];
    $s_email = $row['s_email'];
    $s_department = $row['s_department'];
    $s_yearjoined = $row['s_yearjoined'];
    $s_pswd = $row['s_pswd'];

    ?>

	<div class="wrapper">
		<div class="title">View Here</div><br>
	  	<form action=" " method="POST">
			<div class="field">
				<label>First Name</label>
				<input type="text" class="input" id="fname" disabled  value="<?php echo  $s_firstname ;?>"  name="fname" required="*">
			</div>
			<div class="field">
		    	<label>Last Name</label>
				<input type="text" class="input" id="lname" disabled value="<?php echo  $s_lastname ;?>" name="lname" required="*">
			</div>
			<div class="field">
				<label>Phone Number</label>
				<input type="number" class="input" id="phno" disabled  value="<?php echo  $s_phno ;?>" name="phno" required="*">
			</div>
			<div class="field">
		    	<label>Email</label>
				<input type="text" class="input" id="email" disabled value="<?php echo $s_email ;?>" name="email" required="*">
			</div>
			<div class="field">
		    	<label>Department</label>
				<input type="text" class="input" id="dept" disabled  value="<?php echo $s_department ;?>"  name="dept" required="*">
			</div>
			<div class="field">
				<label>Year Joined</label>
				<input type="year" class="input" id="year" disabled value="<?php echo $s_yearjoined ;?>" name="year" required="*">	
			</div>
			<div class="field">
				<label>Password</label>
    			<input type="password" class="input" disabled value="<?php echo $s_pswd ;?>" name="psw" id="psw" required='*'>
			</div>			
	 	</form>   
	</div>
</body>
</html>