<?php

if(isset($_POST['exportsemester'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Semester_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Year','Semester','Date Created'));
	$query ="SELECT id, year,semester,date_created FROM semester ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
