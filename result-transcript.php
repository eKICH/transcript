<?php
  include "studentheader.php";
if (isset($_POST['btn-submit'])) {
  require "includes/dbh.inc.php";

  $semester = $_POST['semester'];
  $yearofstudy = $_POST['yearofstudy'];
  $sid = $_POST['sid'];

  if (empty($semester) || empty($yearofstudy)) {
    header("Location: studenttranscript.php?error=emptyfields");
    exit();
  }

  else {
    $sql = "SELECT * FROM exams WHERE sid = '".$sid."' AND semester = '".$semester."' AND yearofstudy = '".$yearofstudy."'";
    $result = $conn->query($sql);
    //$result = mysqli_query($conn, $sql);
  }
}

  else {
    //echo "No Results Found!..";
    header("Location:studenttranscript.php");
    exit();
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Result Transcript - Transcript</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body style="background: #f5f8fa;">
    <div class="container">

      <div class="alert alert-dark" style="font-weight:bold; margin-top: 20px;">

        <label for="studentname">Student Name: <span style="margin-left:81px; font-weight: lighter;">
          <?php
            include "includes/dbh.inc.php";
            $semester = $_POST['semester'];
            $yearofstudy = $_POST['yearofstudy'];
            $sid = $_POST['sid'];
            $sql = "SELECT student_id, student_name, dept, level, course FROM students WHERE student_id = '".$sid."'";
            $res = $conn->query($sql);
            $rows = $res->fetch_assoc();
            echo $rows['student_name'];
           ?></span> </label><br>
        <label for="studentid">Student ID: <span style="margin-left:110px; font-weight: lighter;"><?php echo $rows['student_id'];?></span></label><br>
        <label for="deptname">Dept Name: <span style="margin-left:105px; font-weight: lighter;"><?php echo $rows['dept']; ?></span></label><br>
        <label for="coursename">Course Name: <span style="margin-left:90px; font-weight: lighter;"><?php echo $rows['level'] .' '.'in'. ' '. $rows['course'] ; ?></span></label><br>
        <?php

        include "includes/dbh.inc.php";
        $semester = $_POST['semester'];
        $yearofstudy = $_POST['yearofstudy'];
        $sid = $_POST['sid'];

        $sql = "SELECT semester, yearofstudy FROM exams WHERE sid = '".$sid."' AND semester = '".$semester."' AND yearofstudy = '".$yearofstudy."'";
        $res = $conn->query($sql);
        $rows = $res->fetch_assoc();
         ?>
        <label for="semester">Semester: <span style="margin-left:120px; font-weight: lighter;"><?php echo $rows['semester']; ?></span></label><br>
        <label for="yearofstudy">Year of Study: <span style="margin-left:90px; font-weight: lighter;"><?php echo $rows['yearofstudy']; ?></span></label>
      </div>
      <!--<span style="margin-left:60vw;"><input type="submit" name="export" value="Export to PDF" class="btn btn-danger"> </span>-->
      <table class="table table-bordered" style=" width:75vw; margin-top:4vh;">
        <thead style="text-align:center;">
          <tr>
            <th style="width:25vw;">Unit Id / Name</th>
            <th>Score %</th>
            <th>Grade</th>
            <th>Hours</th>
          </tr>
      </thead>
      <?php
      if ($result->num_rows > 0) {
        while($rows = $result->fetch_assoc())
        {
      ?>
      <tbody style="text-align:center;">

          <tr>
            <td><?php echo $rows['unit_name']; ?></td>
            <td><?php echo $rows['score']; ?></td>
            <td><?php echo $rows['grade']; ?></td>
            <td><?php echo $rows['hours']; ?></td>
          </tr>
      </tbody>
      <?php
    		}
      } else {
      //  echo "No Results Found!. Please check back later..";
        echo '<p class="alert alert-danger" style="margin-left:1vw; margin-top:5vh;">No Results Found!. Please Make a selection of the semester and year to display results..</p>';
      }
    	?>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
