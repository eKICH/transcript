<?php
//include "header.php";
include "header-test.php"; 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transcript - Semester Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css2/styles.css">
    <script>

      $(document).ready(function(){
        $("#sem").submit(function(event){
          event.preventDefault();
          var year = $("#year").val();
          var semester = $("#semester").val();
          var submit = $("#semester-submit").val();

          $(".form-message").load("includes/semester.inc.php", {
           year: year,
           semester: semester,
           submit: submit
          });
        });
      });
    </script>
  </head>
  <body id="semesterplus" style="background-color: #c0c0c0;">
    <div class="container">
      <h3 style="font-family:calibir; margin-top:3vh; margin-left:27vw; color:blue;">Semester Details</h3>
      <form id="sem" class="" action="includes/semester.inc.php" method="post">
        <div class="row" style="margin-left:16vw; margin-top:3vh;">
          <div class="col col-md-4">
            <label for="semester">Year</label>
            <input type="text" name="year" id="year" class="form-control" placeholder="Example 2020/2021">
          </div>

          <div class="col col-md-4">
            <label for="semester">Semester</label>
            <select id="semester" name="semester" class="form-control">
              <option selected hidden></option>
              <option value="First">First</option>
              <option value="Second">Second</option>
              <option value="Third">Third</option>
            </select>
          </div>
        </div><br>
        <button type="submit" id="semester-submit" name="semester-submit" class="btn btn-primary" style="margin-left:17vw;">Submit Semester</button>
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
