<?php
include 'connection.php';
$id = $_GET['id'];
$start_date = $_GET['s'];

$sql = " UPDATE `apply_leave_student` SET `status`='rejected' WHERE id = $id and start_date = '$start_date' ";
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
