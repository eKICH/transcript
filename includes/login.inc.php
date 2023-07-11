<?php
//Include Database Connection
require "dbh.inc.php";

//Start Session


$error = '';
if(isset($_POST['btn-submit'])){

	$sid = $_POST['student_id'];
	$password = $_POST['password'];

	$query = ("SELECT * FROM students WHERE student_id='$sid'");
	$data = mysqli_query($conn, $query);

	$total = mysqli_num_rows($data);

	if($total > 0){
		$row = mysqli_fetch_array($data);
		$password_hash = $row['password'];
		if(password_verify($password,$password_hash)){
      session_start();
      $_SESSION['userid']=$sid;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/transcript/studenttranscript.php");
		}
		else{
      $error = "Wrong Student ID or Password!";
			header("Location:../index.php?error=".$error);
		}
	}

}

?>
