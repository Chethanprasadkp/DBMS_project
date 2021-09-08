<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Student</title>
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
    $id= $_GET['id'];

    include 'connection.php';
    $sql = "select * from student where id=$id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $s_firstname = $row['first_name'];
    $s_lastname = $row['last_name'];
    $s_phno = $row['pho'];
    $s_email = $row['email'];
    $s_department = $row['department'];
    $s_sem = $row['sem'];
    $s_yearjoined = $row['year_joined'];
    $s_pswd = $row['pswd'];

    ?>

	<div class="wrapper">
		<div class="title">Update Here</div><br>
	  	<form action=" " method="POST">
	  		<input type="hidden" name="s_id" value="<?php echo  $id ;?>" >
			<div class="field">
				<label>First Name</label>
				<input type="text" class="input" id="fname"   value="<?php echo  $s_firstname ;?>"  name="fname" required="*">
			</div>
			<div class="field">
		    	<label>Last Name</label>
				<input type="text" class="input" id="lname"  value="<?php echo  $s_lastname ;?>" name="lname" required="*">
			</div>
			<div class="field">
				<label>Phone Number</label>
				<input type="number" class="input" id="phno" value="<?php echo  $s_phno ;?>" name="phno" required="*">
			</div>
			<div class="field">
		    	<label>Email</label>
				<input type="text" class="input" id="email"  value="<?php echo $s_email ;?>" name="email" required="*">
			</div>
			<div class="field">
		    	<label>Department</label>
				<input type="text" class="input" id="dept"   value="<?php echo $s_department ;?>"  name="dept" required="*">
			</div>
			<div class="field">
		    	<label>Semester</label>
				<input type="number" class="input" id="sem"  value="<?php echo $s_sem ;?>" name="sem" required="*">
			</div>
			
			<div class="field">
				<label>Year Joined</label>
				<input type="year" class="input" id="year"  value="<?php echo $s_yearjoined ;?>" name="year" required="*">	
			</div>
			<div class="field">
				<label>Set Password</label>
    			<input type="password" class="input"  value="<?php echo $s_pswd ;?>" name="psw" id="psw" required='*'>
			</div>
			<div class="field">
				<input type="submit" name="submit" value="Update" class="btn">
			</div>			
	 	</form>   
	</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $s_id=$_POST['s_id'];
    $s_firstname = $_POST['fname'];
    $s_lastname = $_POST['lname'];
    $s_phno = $_POST['phno'];
    $s_email = $_POST['email'];
    $s_department = $_POST['dept'];
    $s_sem = $_POST['sem'];
    $s_yearjoined = $_POST['year'];
    $s_pswd = $_POST['psw'];

    include 'connection.php';
    $sql = "UPDATE `student` SET `first_name`= '$s_firstname',`last_name`= '$s_lastname',`email`= '$s_email',`pho`= $s_phno,`department`='$s_department', `sem` = $s_sem, `year_joined`=$s_yearjoined,`pswd`='$s_pswd' WHERE id=$s_id";
    
    $update = mysqli_query($con,$sql);
    if($update)
    {
    	echo "Updated successfully";
    	header('Location:manage_student.php');
    }
    else{
    	echo "Error in updating";
    	header('Location:update_student.php');
    }
}
?>