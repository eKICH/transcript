<?php
  //include "header.php";
  include "header-test.php";

  include "includes/dbh.inc.php";

  $query = "SELECT * FROM courses";
  $result = $conn->query($query);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Transcript Management System - Course View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  </head>
<body id="course"> <br> <br>
<div class="container">
<p>This section shows all Courses in the system. You can edit or Delete the Course as per your requirement</p><br>
	<table id="usertable" class="display table table-sm table-bordered mb-0" action="">
    <thead>
      <tr>
        <th>ID</th>
        <th>Course ID</th>
        <th>Level</th>
        <th>Course Name</th>
        <th>Department</th>
        <th>Status</th>
        <th>Edit</th>
				<th>Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php
		while($rows = mysqli_fetch_assoc($result))
		{
	?>
      <tr>
        <td><?php echo $rows['id']; ?></td>
        <td><?php echo $rows['course_id']; ?></td>
        <td><?php echo $rows['level']; ?></td>
        <td><?php echo $rows['course_name']; ?></td>
        <td><?php echo $rows['department']; ?></td>
		    <td><?php echo $rows['status']; ?></td>
<td><a href="courseedit.php?id=<?php echo $rows['id'];?>" title="Click to Edit Course Details"  data-toggle="tooltip" style="text-decoration:none;">Edit</a></td>
<td>
<a href="course-delete.php?id=<?php echo $rows['id'];?>" title="Click to Delete Course"  data-toggle="tooltip" style="text-decoration:none;">Delete</a>
</td>
      </tr>
		<?php
		}
		?>
    </tbody>

  </table>
  <br>
<form method="POST" action="export-course.php">

	<input type="submit" class="btn btn-danger" name="exportcourse" value="Export CSV File"/>

</form>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {
		$('#usertable').DataTable();
		} );
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
