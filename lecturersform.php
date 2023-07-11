<?php
  include "header.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transcript - Lecturer Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#lecture").submit(function(event){
           event.preventDefault();
           var lname = $("#lname").val();
           var mobile = $("#mobile").val();
           var gender = $("#gender").val();
           var department = $("#department").val();
           var status = $("#status").val();
           var submit = $("#lecturer-submit").val();

           $(".form-message").load("includes/lecturer.inc.php", {
            lname: lname,
            mobile: mobile,
            gender: gender,
            department: department,
            status: status,
            submit: submit
           });
         });
       });
     </script>
  </head>
  <body id="lecture" style="background-color: #c0c0c0;">
    <div class="container" style="margin-top: 2vh;">
      <h3 style="text-align: center; color: blue;">ADD LECTURER DETAILS</h3>
      <form id="lecture" action="includes/lecturer.inc.php" method="post">
        <div class="row" style="margin-top:6vh">
          <div class="col col-md-4">
              <label for="lecname">Lecturer Name</label>
              <input type="text" class="form-control" id="lname" name="lname"  placeholder="Lecturer Name">
          </div>
        <div class="col col-md-4">
        <label for="mobno">Mobile No.</label>
        <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Mobile No.">
        </div>

        <div class="col col-md-4">
          <label for="selectgender">Gender</label>
          <select id="gender" name="gender" class="form-control">
            <option selected hidden></option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
    <div class="row" style="margin-top:6vh;">
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
                  <label for="selectdept">Department</label>
                  <select id="department" name="department" class="form-control">
                    <?php echo $select;?>
                    <?php echo $options;?>
                  </select>
            </div>
            <div class="col col-md-4">

                <input type="text" class="form-control" id="status" name="status"  value="Active" hidden>
            </div>
    </div><br>
    <button type="submit" id="lecturer-submit" name="lecturer-submit" class="btn btn-primary">Register Lecturer</button>
    <span class="form-message"></span>
</form>
</div>
</body>
</html>
