<?php
  //include "header.php";
  include "header-test.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transcript - Student Registraion</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
     <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#student").submit(function(event){
           event.preventDefault();
           var studentname = $("#studentname").val();
           var datepicker = $("#datepicker").val();
           var mobile = $("#mobile").val();
           var gender = $("#gender").val();
           var department = $("#department").val();
           var course = $("#course").val();
           var level = $("#level").val();
           var password = $("#password").val();
           var repassword = $("#repassword").val();
           var status = $("#status").val();
           var submit = $("#student-submit").val();

           $(".form-message").load("includes/student.inc.php", {
            studentname: studentname,
            datepicker: datepicker,
            mobile: mobile,
            gender: gender,
            department: department,
            course: course,
            level: level,
            password: password,
            repassword: repassword,
            status: status,
            submit: submit
           });
         });
       });
     </script>
  </head>
<body id="student" style="background-color: #c0c0c0;">
<div class="container" style="margin-top: 2vh;">
          <h3 style="text-align: center; color: blue;">ADD STUDENT DETAILS</h3>
          <form id="student" action="includes/student.inc.php" method="post" >
                <div class="row" style="margin-top:6vh">
                    <div class="col col-md-4">
                        <label for="studentname">Student Name</label>
                        <input type="text" class="form-control" id="studentname" name="studentname"  placeholder="Full Student Name" autocomplete="off">
                    </div>
                    <div class="col col-md-4">
                        <label for="dateofreg">Date Of Registraion</label>
                        <input type="text" class="form-control" id="datepicker" name="datepicker"  placeholder="Date Of Registration" autocomplete="off">
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    <div class="col col-md-4">
                        <label for="mobno">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Mobile No." autocomplete="off">
                    </div>
                  </div>
                  <div class="row" style="margin-top:6vh;">
                    <div class="col col-md-4">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option selected hidden></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="col col-md-4">
                      <?php

                        include "includes/dbh.inc.php";

                        $sql = "SELECT * FROM departments ORDER BY department_name ASC";

                        $result = mysqli_query($conn, $sql);

                        $options = "";
                        $select = "";

                        while($row = mysqli_fetch_array($result))
                        {
                          $select = $select."<option hidden></option>";
                          $options = $options."<option>$row[department_name]</option>";
                        }

                       ?>
                          <label for="department">Department</label>
                          <select id="department" name="department" class="form-control">
                            <?php echo $select;?>
       							        <?php echo $options;?>
                          </select>
                    </div>
                    <div class="col col-md-4">
                      <?php

                        include "includes/dbh.inc.php";

                        $sql = "SELECT * FROM courses ORDER BY course_name ASC";

                        $result = mysqli_query($conn, $sql);

                        $options = "";
                        $select = "";

                        while($row = mysqli_fetch_array($result))
                        {
                          $select = $select."<option hidden></option>";
                          $options = $options."<option>$row[course_name]</option>";
                        }

                       ?>
                      <label for="course">Course</label>
                        <select id="course" name="course" class="form-control">
                          <?php echo $select;?>
                          <?php echo $options;?>
                        </select>
                    </div>
                  </div> <br>

                  <div class="row">
                    <div class="col col-md-4">
                      <label for="coursename">Level:</label>
                      <select class="form-control" name="level" id="level">
                        <option value="" hidden></option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Certificate">Certificate</option>
                        <option value="Masters">Masters</option>
                        <option value="Phd">Phd</option>
                      </select>
                    </div>

                    <div class="col col-md-4">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col col-md-4">
                      <label for="repassword">Re-Password</label>
                      <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-Password">
                    </div>

                        <div class="col col-md-4">

                            <input type="text" class="form-control" id="status" name="status" value="Active" hidden>
                        </div>
                  </div> <br>
                <button type="submit" name="student-submit" id="student-submit" class="btn btn-primary">Register Student</button>
                <span class="form-message"></span>
            </form>
    </div>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
         integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
         integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
