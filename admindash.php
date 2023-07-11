<?php
  //include "header.php";
  include "header-test.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Transcript - Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/global.css">
  </head>
  <body style="background-color: #c0c0c0;">
    <div class="container" style=" margin-top:2vw; margin-left:10vw; width: 75vw;">

            <div class="row" style="color: #7fe5f0;">

              <div class="col col-md-4">
                <div class="card">
                        <h5 style="color: #7fe5f0;"class="card-header">Student Details</h5>
                        <div class="card-body">

                          <a href="http://localhost/transcript/studentsform.php" class="btn btn-primary">Add Student</a>
                          <a href="http://localhost/transcript/student_view.php" class="btn btn-primary">View</a>
                        </div>
                </div>
              </div>
            <!--  <div class="col col-md-4">
                <div class="card">
                        <h5 class="card-header">Lecturer Details</h5>
                        <div class="card-body">

                          <a href="http://localhost/transcript/lecturersform.php" class="btn btn-primary">Add lecturer</a>
                          <a href="" class="btn btn-primary">View</a>
                        </div>
                </div> -->
                <div class="col col-md-4">
                  <div class="card">
                          <h5 class="card-header">Course Details</h5>
                          <div class="card-body">

                            <a href="http://localhost/transcript/coursesform.php" class="btn btn-primary">Add Course</a>
                            <a href="http://localhost/transcript/course_view.php" class="btn btn-primary">View</a>
                          </div>
                  </div>
                </div>
                <div class="col col-md-4">
                  <div class="card">
                          <h5 class="card-header">Department Details</h5>
                          <div class="card-body">

                            <a href="http://localhost/transcript/departmentsform.php" class="btn btn-primary">Add Department</a>
                            <a href="http://localhost/transcript/department_view.php" class="btn btn-primary">View</a>
                          </div>
                  </div>
                </div>

              </div>
              <div class="row" style="margin-top:10vh;  color: #7fe5f0;">

                <div class="col col-md-4">
                  <div class="card">
                          <h5 class="card-header">Users</h5>
                          <div class="card-body">

                            <a href="http://localhost/transcript/usersform.php" class="btn btn-primary">Add User</a>
                            <a href="http://localhost/transcript/users_view.php" class="btn btn-primary">View</a>
                          </div>
                  </div>
                </div>
                <div class="col col-md-4">
                  <div class="card">
                          <h5 class="card-header">Units</h5>
                          <div class="card-body">

                            <a href="http://localhost/transcript/unitform.php" class="btn btn-primary">Add Unit</a>
                            <a href="http://localhost/transcript/unit_view.php" class="btn btn-primary">View</a>
                          </div>
                  </div>
                </div>
                <div class="col col-md-4">
                  <div class="card">
                          <h5 class="card-header">Semester</h5>
                          <div class="card-body">

                            <a href="http://localhost/transcript/semester.php" class="btn btn-primary">Add Semester</a>
                            <a href="http://localhost/transcript/semester_view.php" class="btn btn-primary">View</a>
                          </div>
                  </div>
                </div>
              </div>
            </div>







<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
     integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
     integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
