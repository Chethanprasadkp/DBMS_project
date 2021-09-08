<?php
include 'connection.php';
$id = $_GET['id'];

$sql = " DELETE FROM `apply_leave_student` WHERE `id` = $id ";

$delete = mysqli_query($con, $sql);
if($delete)
{
    echo "Deleted successfully";
    header('Location: leave_status_student.php');
}
else
{
    echo "Error in deleting";
}
?>