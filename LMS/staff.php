<?php
session_start();
$s_id= $_SESSION['id'];
include 'connection.php';
$sql = "SELECT * FROM `staff` WHERE s_id=$s_id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Staff</title>
	<link rel="stylesheet" type="text/css" href="add_user.css">
	<link rel="stylesheet" type="text/css" href="staff.css">
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
				<li><?php echo '<img src="data:image;base64,'.base64_encode($row['s_profilephoto']).'" alt="Avatar" class="avatar">'; ?></li>
				<li><a href="#">Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
					<ul>
						<li><a href="staff.php">Profile</a></li>
						<li><a href="apply_leave_staff.php">Apply Leave</a></li>
						<li><a href="leave_status_staff.php">Leave Status</a></li>
						<li><a href="approve_leave.php">Approve leave</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<?php
    $s_id= $_SESSION['id'];

    include 'connection.php';
    $sql = "SELECT * FROM `staff` WHERE s_id=$s_id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $s_firstname = $row['s_firstname'];
    $s_lastname = $row['s_lastname'];
    $s_phno = $row['s_phno'];
    $s_email = $row['s_email'];
    $s_department = $row['s_department'];
    $s_yearjoined = $row['s_yearjoined'];

    ?>

	<h1 style="text-align: center;">Profile</h1>
	<div class="wrapper">
		<form action=" " method="POST" enctype="multipart/form-data">
			<div class="image-container">
				<?php echo '<img src="data:image;base64,'.base64_encode($row['s_profilephoto']).'" alt="Avatar" style="margin-left: 190px; margin-top: 20px; height: 150px; width: 150px;" class="avatar">'; ?>
			</div>
			<div class="main-container">
			<div class="field">
				<label><i class="fa fa-user info"></i>First Name</label>
				<input type="text" class="input" id="fname" disabled  value="<?php echo  $s_firstname ;?>"  name="fname" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-user info"></i>Last Name</label>
				<input type="text" class="input" id="lname" disabled value="<?php echo  $s_lastname ;?>" name="lname" required="*">
			</div>
			<div class="field">
				<label><i class="fa fa-phone info"></i>Mobile</label>
				<input type="number" class="input" id="phno" disabled  value="<?php echo  $s_phno ;?>" name="phno" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-envelope info"></i>Email</label>
				<input type="text" class="input" id="email" disabled value="<?php echo $s_email ;?>" name="email" required="*">
			</div>
			<div class="field">
		    	<label><i class="fa fa-book info"></i>Department</label>
				<input type="text" class="input" id="dept" disabled  value="<?php echo $s_department ;?>"  name="dept" required="*">
			</div>
			<div class="field">
				<label><i class="fa fa-calendar info"></i>Year Joined</label>
				<input type="year" class="input" id="year" disabled value="<?php echo $s_yearjoined ;?>" name="year" required="*">
			</div>
			<hr>
			<a href="staff_reset.php">Change password</a>
		</div>
	 	</form>
	</div>
</body>
</html>