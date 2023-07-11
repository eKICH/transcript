<?php
require "includes/dbh.inc.php";


$user_id = $_REQUEST['id'];
$query = "DELETE FROM users WHERE id='$user_id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/users_view.php");
?>
