<?php

if(isset($_POST['exportcourse'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Courses_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Course ID','Level','Course Name','Department','Status','Date Created'));
	$query ="SELECT id,course_id,level,course_name,department,status,date_created FROM courses ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
