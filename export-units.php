<?php

if(isset($_POST['exportunit'])){
	// Include Db
	include "includes/dbh.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Units_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Units ID','Unit Name','Department','Course','Level','Status','Date Created'));
	$query ="SELECT id, units_id,unit_name,department,course,level,status, date_created FROM units ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>
