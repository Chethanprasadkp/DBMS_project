<?php
session_start();
$s_id= $_SESSION['id'];
include 'connection.php';
$sql = "SELECT * FROM `staff` WHERE s_id=$s_id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$query="SELECT s_reason,s_startdate,s_enddate,s_status FROM apply_leave_staff WHERE s_id=$s_id";
$resultquery = mysqli_query($con,$query);
if(mysqli_num_rows($resultquery) > 0){
}
else
{
  $msg = "No Record found";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Leave Status Staff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="staff.css">
  <link rel="stylesheet" type="text/css" href="leave_status.css">
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
  <br><br>
  <br>
  <h1 style="text-align: center;">Leave Status</h1>
  <h2 style="margin-left:380px">Total leaves Approved : <?php echo $row['count'];?></h2>
  <div class="container">
    <table>
      <tr>
        <thead>
          <th>Leave type</th>
          <th>Starting date</th>
          <th>Ending date </th>
          <th>Status</th>
          <!-- <th>Delete</th> -->
        </tr>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($resultquery))
            {
              echo '<tr>' ;
              echo '<td>' . $row['s_reason'] . '</td>' ;
              echo '<td>' . $row['s_startdate'] . '</td>' ;
              echo '<td>' . $row['s_enddate'] . '</td>' ;
              echo '<td>' . $row['s_status'] . '</td>' ;
              // echo "<td><a href='delete_leave_staff.php?s_id=$s_id'><button type='button' class='btn btn-danger' style='background: lightcoral;'>Delete</button></a></td>";
              echo '<tr>' ;
            }
          ?>
        </tbody>
    </table>
  </div>
</body>
</html>
