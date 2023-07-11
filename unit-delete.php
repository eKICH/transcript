<?php
require "includes/dbh.inc.php";


$unit_id = $_REQUEST['id'];
$query = "DELETE FROM units WHERE id='$unit_id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/transcript/unit_view.php");
?>
