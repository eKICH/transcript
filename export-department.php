<?php

if(isset($_POST['exportdepartment'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Department_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Department ID','Department Name','Status','Date Created'));
	$query ="SELECT id, department_id, department_name, status, date_created FROM departments ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
