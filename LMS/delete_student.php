<?php
include 'connection.php';
$id = $_GET['id'];

$sql = " DELETE FROM student WHERE id = $id ";

$delete = mysqli_query($con, $sql);
if($delete)
{
    echo "Deleted successfully";
    header('Location: manage_student.php');
}
else
{
    echo "Error in deleting";
}
?>