<?php
  //include "header.php";
  include "header-test.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transcript - User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css2/styles.css">
     <script>

       $(document).ready(function(){
         $("#reg").submit(function(event){
           event.preventDefault();
           var email = $("#email").val();
           var username = $("#username").val();
           var password = $("#password").val();
           var repassword = $("#repassword").val();
           var level = $("#level").val();
           var status = $("#status").val();
           var submit = $("#user-submit").val();

           $(".form-message").load("includes/signup.inc.php", {
             email: email,
             username: username,
             password: password,
             repassword: repassword,
             level: level,
             status: status,
             submit: submit
           });
         });
       });
     </script>
  </head>

  <body id="user" style="background-color: #c0c0c0;">
    <div class="container" style="margin-top: 2vh;">
      <h3 style="text-align: center; color: blue;">ADD USER DETAILS</h3>

      <form id="reg" action="includes/signup.inc.php" method="post">
        <div class="row" style="margin-top:6vh">

          <div class="col col-md-4">

              <label for="studentid">Email <span class="form-error">*</span></label>
              <input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email">
          </div>
          <div class="col col-md-4">

              <label for="username">User Name <span class="form-error">*</span></label>
              <input type="textarea" class="form-control" id="username" name="username" autocomplete="off"  placeholder="User Name">
          </div>
          <div class="col col-md-4">

              <label for="Password">Password <span class="form-error">*</span></label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>

      </div>
      <div class="row" style="margin-top:6vh">

        <div class="col col-md-4">
            <label for="Password">Re-Password <span class="form-error">*</span></label>
            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-type Password">
        </div>

        <div class="col col-md-4">
            <label for="inputlevel">Level <span class="form-error">*</span></label>
            <select id="level" name="level" class="form-control">
              <option selected hidden placeholder="Level"></option>
              <option value="admin">Admin</option>
              <option value="lecturer">Lecturer</option>
            </select>

        </div>
        <div class="col col-md-4">
            <input type="text" class="form-control" id="status" name="status" value="Active" hidden>
        </div>
      </div><br>
      <button id="user-submit" type="submit" class="btn btn-primary" name="submit-user">Register User</button>
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
