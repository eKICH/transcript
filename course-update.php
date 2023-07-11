<?php
//include database connection
  require "includes/dbh.inc.php";

//Declare variables

$newlevel = $conn->real_escape_string($_POST['newlevel']);
$newcourse = $conn->real_escape_string($_POST['newcourse']);
$newdepartment = $conn->real_escape_string($_POST['newdepartment']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE courses SET level='$_POST[newlevel]',course_name='$_POST[newcourse]',department='$_POST[newdepartment]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
