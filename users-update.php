<?php
//include database connection
  require "includes/dbh.inc.php";

//Declare variables

$newemail = $conn->real_escape_string($_POST['newemail']);
$newlevel = $conn->real_escape_string($_POST['newlevel']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE users SET email='$_POST[newemail]',level='$_POST[newlevel]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
