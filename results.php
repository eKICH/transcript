<?php
  //include "lecturerheader.php";
  include "header-lecturer.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lecturer Dashboard - Transcript Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#result").submit(function(event){
           event.preventDefault();
           var dept = $("#dept").val();
           var course = $("#course").val();
           var level = $("#level").val();
           var unit_name = $("#unit_name").val();
           var student_name = $("#student_name").val();
           var sid = $("#sid").val();
           var semester = $("#semester").val();
           var yearofstudy = $("#yearofstudy").val();
           var assignment = $("#assignment").val();
           var cat = $("#cat").val();
           var exam = $("#exam").val();
           var score = $("#score").val();
           var grade = $("#grade").val();
           var hours = $("#hours").val();
           var submit = $("#results-submit").val();

           $(".form-message").load("includes/result.inc.php", {
            dept: dept,
            course: course,
            level: level,
            unit_name: unit_name,
            student_name: student_name,
            sid: sid,
            semester: semester,
            yearofstudy: yearofstudy,
            assignment: assignment,
            cat: cat,
            exam: exam,
            score: score,
            grade: grade,
            hours: hours,
            submit: submit
           });
         });
       });
     </script>
     <script>
       $(document).ready(function(e){
         $("input").change(function(){
           var total = 0;
           var percent = 0;
           $("input[name=sum]").each(function(){
             total = total + parseInt($(this).val());
             percent = total/100*100;
           });
           $("input[name=score]").val(percent);
         });
       });
     </script>
  </head>
  <body style="background-color: #c0c0c0;">
  <div class="container" >
      <h3 style="text-align: center; color: blue; margin-top:4vh;">EXAM DETAILS</h3>
      <form id="result" action="includes/result.inc.php" method="post" >
        <div class="row" style="margin-top:2vh">
              <div class="col col-md-3">
                <?php

                  include "includes/dbh.inc.php";

                  $sql = "SELECT * FROM departments ORDER BY department_name ASC";

                  $result = mysqli_query($conn, $sql);

                  $options = "";
                  $select = "";

                  while($row = mysqli_fetch_array($result))
                  {
                    $select .= '<option hidden>---Select Department---</option>';
                    $options .='<option>'.$row["department_name"].'</option>';
                  }

                 ?>
                    <label for="dept">Department Name</label>
                    <select id="dept" name="dept" class="form-control" readonly>
                      <?php echo $select;?>
                      <?php echo $options;?>
                    </select>
              </div>

              <div class="col col-md-3">
                <?php

                  include "includes/dbh.inc.php";

                  $sql = "SELECT * FROM courses ORDER BY course_name ASC";

                  $result = mysqli_query($conn, $sql);

                  $options = "";
                  $select = "";

                  while($row = mysqli_fetch_array($result))
                  {
                    $select = $select."<option hidden>---Select Course---</option>";
                    $options = $options."<option>$row[course_name]</option>";
                  }

                 ?>
                  <label for="course">Course Name</label>
                  <select id="course" name="course" class="form-control" readonly>
                    <?php echo $select;?>
                    <?php echo $options;?>
                  </select>
              </div>
              <div class="col col-md-3">
                <label for="unit">Level of Study</label>
                <select class="form-control" id="level" name="level" readonly>
                  <option selected hidden>---Select level of Study---</option>
                  <option value="Bachelor">Bachelor</option>
                  <option value="Masters">Masters</option>
                  <option value="Phd">Phd</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Certificate">Certificate</option>
                </select>
              </div>
              <div class="col col-md-3">
                <?php

                  include "includes/dbh.inc.php";

                  $sql = "SELECT * FROM units ORDER BY units_id ASC";

                  $result = mysqli_query($conn, $sql);

                  $options = "";
                  $select = "";

                  while($row = mysqli_fetch_array($result))
                  {
                    $select = $select."<option hidden>---Select Unit---</option>";
                    $options = $options."<option>$row[units_id] $row[unit_name]</option>";
                  }
                 ?>
                  <label for="unit">Unit</label>
                  <select class="form-control" id="unit_name" name="unit_name" readonly>
                    <?php echo $select;?>
                    <?php echo $options;?>
                  </select>
              </div>
          </div>

          <div class="row" style="margin-top:6vh">

                <div class="col col-md-3">
                  <?php

                    include "includes/dbh.inc.php";

                    $sql = "SELECT * FROM students ORDER BY student_id ASC";

                    $result = mysqli_query($conn, $sql);

                    $options = "";
                    $select = "";

                    while($row = mysqli_fetch_array($result))
                    {
                      $select = $select."<option hidden>---Select Student---</option>";
                      $options = $options."<option>$row[student_name]</option>";
                    }

                   ?>
                      <label for="studentid">Student Name</label>
                      <select class="form-control" id="student_name" name="student_name" readonly>
                        <?php echo $select;?>
                        <?php echo $options;?>
                      </select>
                </div>
                <div class="col col-md-3">
                  <?php

                    include "includes/dbh.inc.php";

                    $sql = "SELECT * FROM students ORDER BY student_id ASC";

                    $result = mysqli_query($conn, $sql);

                    $options = "";
                    $select = "";

                    while($row = mysqli_fetch_array($result))
                    {
                      $select = $select."<option hidden>---Select Student---</option>";
                      $options = $options."<option>$row[student_id]</option>";
                    }

                   ?>
                  <label for="unit">Student ID</label>
                  <select class="form-control" id="sid" name="sid" readonly>
                    <?php echo $select;?>
                    <?php echo $options;?>
                  </select>
                </div>
                <div class="col col-md-3">
                  <?php

                    include "includes/dbh.inc.php";

                    $sql = "SELECT * FROM semester ORDER BY semester ASC";

                    $result = mysqli_query($conn, $sql);

                    $options = "";
                    $select = "";

                    while($row = mysqli_fetch_array($result))
                    {
                      $select = $select."<option hidden>---Select Semester---</option>";
                      $options = $options."<option>$row[year] $row[semester]</option>";
                    }

                   ?>
                  <label for="sem">Semester</label>
                  <select id="semester" name="semester" class="form-control" readonly>

                    <?php echo $select;?>
                    <?php echo $options;?>

                  </select>
                </div>
                <div class="col col-md-3">
                  <label for="yearofstudy">Year of Study</label>
                  <select id="yearofstudy" name="yearofstudy" class="form-control" readonly>
                    <option selected hidden>---Select Year of Study---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
          </div>

          <div class="row" style="margin-top:4vh">
            <div class="col col-md-4">
              <label for="assignment">Assignment</label>
              <input type="text" class="form-control" id="assignment" name="sum"  placeholder="Assignment Score" autocomplete="off">
            </div>
            <div class="col col-md-4">
              <label for="cat">Cat</label>
              <input type="text" class="form-control" id="cat" name="sum" placeholder="Cat Score" autocomplete="off">
            </div>
            <div class="col col-md-4">
              <label for="exam">Exam</label>
              <input type="text" class="form-control" id="exam" name="sum" placeholder="Exam Score"  autocomplete="off">
            </div>
          </div>
          <div class="row" style="margin-top:4vh">
            <div class="col col-md-4">
              <label for="score">Score %</label>
              <input type="number" class="form-control" id="score" name="score"  placeholder="Score" readonly>
            </div>

            <div class="col col-md-4">
              <label for="grade">Grade</label>
              <!--<input type="text" class="form-control" id="grade" name="grade" autocomplete="off" readonly>-->
              <select class="form-control" name="grade" id="grade">
                <option value="">---Select Grade---</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="Fail">Fail</option>
              </select>
            </div>

            <div class="col col-md-4">
              <label for="hours">Academic hours</label>
              <input type="text" class="form-control" id="hours" name="hours"  Value="42" readonly>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" id="results-submit" name="results-submit">Submit Results</button>
          <span class="form-message"></span>
    </form>
</div>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
