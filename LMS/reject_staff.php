<?php
include 'connection.php';
$s_id = $_GET['s_id'];
$s_startdate = $_GET['ss'];

$sql = " UPDATE `apply_leave_staff` SET `s_status`='rejected' WHERE s_id = $s_id and s_startdate = $s_startdate ";
$approve = mysqli_query($con, $sql);

if($approve)
{
    echo "Rejected successfully";
    header('Location: approve_leave.php');
}
else
{
    echo "Error while rejecting";
}
?>
