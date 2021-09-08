<?php
session_start();
$s_id= $_SESSION['id'];
include 'connection.php';
$sql = "SELECT * FROM `staff` WHERE s_id=$s_id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$dept = $row['s_department']
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leave Application</title>
	<link rel="stylesheet" href="apply_leave.css">
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
          		<li><a href="#">Login<i class="fas fa-caret-down"></i></a>
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
				<li><a href="#"> Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
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
	<div class="wrapper">
		<div class="title">Leave Application</div><br>
	  	<form action=" " method="POST">
			<div class="input_field">
				<label>First Name</label>
				<input type="text" name="fname" class="input" required="*">
		    	<label>Last Name</label>
				<input type="text" name="lname" class="input" required="*">
			</div>
			<div class="input_field">
				<label>Country Code</label>
				<input type="number" name="countrycode" class="input" required="*">
				<label>Phone Number</label>
				<input type="number" name="phno" class="input" required="*">	
			</div>
			<div class="input_field">
				<label>Category</label>
				<div class="custom_select">
					<select name="category">
						<option value=" ">Select</option>
						<option value="Student">Student</option>
						<option value="Faculty">Faculty</option>
						<option value="Others">Others</option>
					</select>
				</div>
			</div>
			<div class="input_field">
				<label>Starting</label>
				<input type="date" name="startdate" class="input" required="*">
		
				<label>Ending</label>
				<input type="date" name="enddate" class="input" required="*">
			</div>
			<div class="input_field">
				<label>Reason</label>
				<textarea class="textarea" name="reason" required="*"></textarea>
			</div>
			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" required="*">
					<span class="checkmark"></span>
				</label>
				<p>Confirm</p>
			</div>
			<div class="input_field">
				<input type="submit" name="submit" value="Submit" class="btn">
			</div>
	 	</form>   
	</div>
	<?php
	include('connection.php');
	if(isset($_POST['submit']))
	{
		$s_id= $_SESSION['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$countrycode = $_POST['countrycode'];
		$phno = $_POST['phno'];
		$category = $_POST['category'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$reason = $_POST['reason'];

   		$query = "INSERT INTO `apply_leave_staff`(`s_id`,`s_firstname`,`s_lastname`,`s_department`,`s_countrycode`,`s_phno`,`s_category`,`s_startdate`,`s_enddate`,`s_reason`) VALUES('$s_id','$fname','$lname','$dept','$countrycode','$phno','$category','$startdate','$enddate','$reason')";
    	$sql = mysqli_query($con,$query);

    	if($sql){
    		echo "<h2>Applied successfully</h2>";
    	}
    	else{
    		echo "<h2>Error occurred while applying</h2>";
    	}
	}
	?>
</body>
</html>