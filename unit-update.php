<?php
//include database connection
  require "includes/dbh.inc.php";

//Declare variables
//$newunitid = $conn->real_escape_string($_POST['newunitid']);
$newunitname = $conn->real_escape_string($_POST['newunitname']);
$newdepartment = $conn->real_escape_string($_POST['newdepartment']);
$newcourse = $conn->real_escape_string($_POST['newcourse']);
$newlevel = $conn->real_escape_string($_POST['newlevel']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE units SET unit_name='$_POST[newunitname]',department='$_POST[newdepartment]',course='$_POST[newcourse]',level='$_POST[newlevel]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
