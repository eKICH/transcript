<?php
//Include Database Connection
  require "dbh.inc.php";

//Start Session


$error = '';
if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = ("SELECT * FROM users WHERE email='$email'");
	$data = mysqli_query($conn, $query);

	$total = mysqli_num_rows($data);

	if($total > 0){
		$row = mysqli_fetch_array($data);
		$password_hash = $row['password'];
		if(password_verify($password,$password_hash)){
      session_start();
      $_SESSION['email'] = $row['email'];
			$_SESSION['level'] = $row['level'];
      if($row['level']=="admin"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/transcript/admindash.php");

				}else if($row['level']=="lecturer"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/transcript/results.php");

				}
		}
		else{
      $error = "Wrong email or Password!";
			header("Location:http://localhost/transcript/admin-login.php?error=".$error);
		}
	}

}

?>
