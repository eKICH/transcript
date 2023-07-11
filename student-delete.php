<?php
require "includes/dbh.inc.php";


$student_id = $_REQUEST['id'];
$query = "DELETE FROM students WHERE id=$student_id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/student_view.php");
?>
