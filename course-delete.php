<?php
require "includes/dbh.inc.php";


$course_id = $_REQUEST['id'];
$query = "DELETE FROM courses WHERE id=".$course_id;
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/course_view.php");
?>
