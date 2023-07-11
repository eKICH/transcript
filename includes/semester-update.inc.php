<?php
//include database connection
require "includes/dbh.inc.php";

//Declare variables
$newyear = $conn->real_escape_string($_POST['newyear']);
$newsemester = $conn->real_escape_string($_POST['newsemester']);

//update query
$sql = "UPDATE semester SET year='$_POST[newyear]',semester='$_POST[newsemester]' WHERE id=$_POST[id]";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
