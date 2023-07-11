<?php
  //include "header.php";
  include "header-test.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transcript - Unit Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#unit").submit(function(event){
           event.preventDefault();
           var inputdept = $("#inputdept").val();
           var inputcourse = $("#inputcourse").val();
           var unitname = $("#unitname").val();
           var level = $("#level").val();
           var status = $("#status").val();
           var submit = $("#unit-submit").val();

           $(".form-message").load("includes/unit.inc.php", {
            inputdept: inputdept,
            inputcourse: inputcourse,
            unitname: unitname,
            level: level,
            status: status,
            submit: submit
           });
         });
       });
     </script>
  </head>
  <body id="unit" style="background-color: #c0c0c0;">
      <h3 style="text-align: center; color: blue; margin-top:3vh;">ADD UNIT DETAILS</h3>
    <div class="container" style="margin-top: 2vh; margin-left:20vw; width:80vw;">
      <form id="unit" action="includes/unit.inc.php" method="post">
      <div class="row" style="margin-top:6vh";>
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
              <label for="inputdept">Department</label>
              <select id="inputdept" name="inputdept" class="form-control">
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
              <label for="inputcourse">Course</label>
              <select id="inputcourse" name="inputcourse" class="form-control">
                <?php echo $select;?>
                <?php echo $options;?>
              </select>
        </div>
        </div>
        <div class="row" style="margin-top:6vh">
          <div class="col col-md-4">
            <label for="unitname">Unit Name</label>
            <input type="text" class="form-control" id="unitname" name="unitname"  placeholder="Unit Name" autocomplete="off">
          </div>
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
            <input type="text" class="form-control" id="status" name="status"  value="Active" hidden>
          </div>
      </div><br>
      <button type="submit" id="unit-submit" name="unit-submit" class="btn btn-primary">Register Unit</button>
      <span class="form-message"></span>
</form>
</div>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
     integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
     integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
