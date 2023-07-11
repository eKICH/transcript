<?php
require "includes/dbh.inc.php";


$dept_id = $_REQUEST['id'];
$query = "DELETE FROM departments WHERE id='$dept_id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/department_view.php");
?>
