<?php

if(isset($_POST['exportstudent'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Students_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Student ID','Student_Name','DOR','Mobile','Gender','Department','Course','Level','Status','Date Created'));
	$query ="SELECT id, student_id, student_name, doreg, mobile, gender, dept, course, level, status, date_created FROM students ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
