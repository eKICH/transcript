<?php
  //include "header.php";
  include "header-test.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transcript - Department Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#dept").submit(function(event){
           event.preventDefault();
           var deptname = $("#deptname").val();
           var status = $("#status").val();
           var submit = $("#dept-submit").val();

           $(".form-message").load("includes/department.inc.php", {
            deptname: deptname,
            status: status,
            submit: submit
           });
         });
       });
     </script>

  </head>
  <body id="depart" style="background-color: #c0c0c0;">
    <h3 style="color: blue; margin-top:3vh; margin-left:20vw;">ADD DEPARTMENT DETAILS</h3>
    <div class="container" style="margin-top: 2vh; margin-left:20vw; width:80vw;">
      <form id="dept" action="includes/department.inc.php" method="post" >
        <div class="row" style="margin-top:6vh">
            <div class="col col-md-4">
              <label for="deptname">Department Name</label>
              <input type="text" class="form-control" id="deptname" name="deptname"  placeholder="Dept Name">
            </div>
            <div class="col col-md-4">
              <input type="text" class="form-control" id="status" name="status"  value="Active" hidden>
            </div>
      </div><br>
      <button type="submit" name="dept-submit" id="dept-submit" class="btn btn-primary">Register Department</button>
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
