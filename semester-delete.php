<?php
require "includes/dbh.inc.php";


$semester_id = $_REQUEST['id'];
$query = "DELETE FROM semester WHERE id='$semester_id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/semester_view.php");
?>
