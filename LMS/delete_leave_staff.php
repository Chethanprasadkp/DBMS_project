<?php
include 'connection.php';
$s_id = $_GET['s_id'];

$sql = " DELETE FROM `apply_leave_staff` WHERE s_id = $s_id ";

$delete = mysqli_query($con, $sql);
if($delete)
{
    echo "Deleted successfully";
    header('Location: leave_status_staff.php');
}
else
{
    echo "Error in deleting";
}
?>