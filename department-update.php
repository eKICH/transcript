<?php
//include database connection
  require "includes/dbh.inc.php";

//Declare variables

$newdepartment = $conn->real_escape_string($_POST['newdepartment']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE departments SET department_name='$_POST[newdepartment]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
