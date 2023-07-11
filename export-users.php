<?php

if(isset($_POST['exportusers'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Users_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','User ID','Email','level','Status','Date Created'));
	$query ="SELECT id, user_id, email, level, status, date_created FROM users ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
