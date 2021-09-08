<?php
session_start();
$id= $_SESSION['id'];
include 'connection.php';
$sql = "SELECT * FROM `student` WHERE id=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student</title>
	<link rel="stylesheet" type="text/css" href="add_user.css">
	<link rel="stylesheet" type="text/css" href="student.css">
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
				<li><?php echo '<img src="data:image;base64,'.base64_encode($row['profile_photo']).'" alt="Avatar" class="avatar">'; ?></li>
				<li><a href="#">Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
					<ul>
						<li><a href="student.php">Profile</a></li>
						<li><a href="apply_leave_student.php">Apply Leave</a></li>
						<li><a href="leave_status_student.php">Leave Status</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>	
	</div>

	<?php
    $id= $_SESSION['id'];

    include 'connection.php';
    $sql = "select * from student where id=$id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $pho = $row['pho'];
    $email = $row['email'];
    $department = $row['department'];
    $sem = $row['sem'];
    $year_joined = $row['year_joined'];

    ?>

	<h1 style="text-align: center;">Profile</h1>
	<div class="wrapper">
		<form action=" " method="POST">
			<div class="image-container">
				<?php echo '<img src="data:image;base64,'.base64_encode($row['profile_photo']).'" alt="Avatar" class="avatar" style="margin-left: 190px; margin-top: 20px; height: 150px; width: 150px;">'; ?>
			</div>
			<div class="main-container">
			<div class="field">
				<label><i class="fa fa-user info"></i>First Name</label>
				<input type="text" class="input" id="fname" disabled  value="<?php echo  $first_name ;?>"  name="fname" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-user info"></i>Last Name</label>
				<input type="text" class="input" id="lname" disabled value="<?php echo  $last_name ;?>" name="lname" required="*">
			</div>
			<div class="field">
				<label><i class="fa fa-phone info"></i>Mobile</label>
				<input type="number" class="input" id="phno" disabled  value="<?php echo  $pho ;?>" name="phno" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-envelope info"></i>Email</label>
				<input type="text" class="input" id="email" disabled value="<?php echo $email ;?>" name="email" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-book info"></i>Department</label>
				<input type="text" class="input" id="dept" disabled  value="<?php echo $department ;?>"  name="dept" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-book info"></i>Sem</label>
				<input type="number" class="input" id="sem" disabled  value="<?php echo $sem ;?>"  name="sem" required="*">
			</div>
			<div class="field">
				<label><i class="fa fa-calendar info"></i>Year Joined</label>
				<input type="year" class="input" id="year" disabled value="<?php echo $year_joined ;?>" name="year" required="*">
			</div>
			<hr>
			<a href="student_reset.php">Change password</a>
		</div>
	 	</form>
	</div>
</body>
</html>