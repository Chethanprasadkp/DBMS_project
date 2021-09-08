<?php
include 'connection.php';
$id = $_GET['id'];
$start_date = $_GET['s'];

$sql = " UPDATE `apply_leave_student` SET `status`='approved' WHERE id = $id and start_date = '$start_date'";
$approve = mysqli_query($con, $sql);

if($approve)
{
    echo "Approved successfully";
    header('Location: approve_leave.php');
}
else
{
    echo "Error while approving";
}
?>
