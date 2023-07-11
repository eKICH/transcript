<?php require "includes/login.inc.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Login - Transcript Management System</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css2/styles.css">
</head>
<body style="background-color: #f5f8fa;">

  <!--<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#" style="color: #fff; font-weight:bold; font-family:sans-serif;">Transcript Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link"  style="padding: 0px 50px;" href="admin-login.php" >Admin/Lecturer Login</a>
        </li>
      </ul>
    </div>
  </nav>-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Transcript Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!--<li class="active nav-item">
          <a class="nav-link" href="http://localhost/transcript/admindash.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/studentsform.php">Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/coursesform.php">Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/departmentsform.php">Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/unitform.php">Unit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/usersform.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/transcript/semester.php">Semester</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>-->
      </ul>
     <form class="form-inline my-2 my-lg-0">
     <li class="nav-item" style="list-style: none; color:#000;">
     <a class="nav-link" style="color:#fff;" href="admin-login.php">Admin/Lecturer Login</a>
     </li>
        <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="http://localhost/Ticketing/login.php?" style="list-style: none; text-decoration-line: none; color: #fff;">Log Out</a></button>-->
      </form>
    </div>
  </nav>


<section class="container-fluid">
	<section class="row justify-content-center">
		<section class="col-12 col-sm-6 col-md-3">
<script type="text/javascript">
        function validate(){
        var sid=document.f2.sid.value;
        var password=document.f2.password.value;
        var status=false;

        if(sid==""){
        document.getElementById("emaillocation").innerHTML=
        "Student Id can't be blank!";
        status=false;
        }else{
        document.getElementById("emaillocation").innerHTML=
        "";
        status=true;
        }

        if(password==""){
        document.getElementById("passwordlocation").innerHTML=
        "Password Required!";
        status=false;
        }else{
        document.getElementById("passwordlocation").innerHTML=
        "";
        status=true;
        }

        return status;
        }
</script>
<br><br>


			<form name="f2" class="form-container top" action="" method="POST" onsubmit="return validate()"><br>
        <h2>Student Login</h2>
        <div style="color:red;">
				<?php
            if (isset($_GET['error']))
              echo $_GET['error'];

         ?>
       </div>
				  <div class="form-group form">
					<label for="sid">Student ID</label>
					<input type="text" class="form-control" id="sid" name="student_id"  style="width: 300px;">
					<!--<small id="email"  class="form-text text-muted">We'll never share your email with anyone else.</small>-->
					<span id="emaillocation" style="color:red"></span>
				  </div>
				  <div class="form-group form">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"  style="width: 300px;">
					<span id="passwordlocation" style="color:red"></span>
        </div>
          <!--<a href="" title="Click to Reset password"  data-toggle="tooltip" style="float: left;">Forgot Password!</a><br>-->
				  <input type="submit" name="btn-submit" class="btn btn-info form" value="Login" style="width:22vw; margin-top:25px;">

			</form>
      <?php

          if (isset($_GET['newpwd'])) {
           if ($_GET['newpwd'] == "passwordupdated") {
              echo '<p class="alert alert-success" style="margin-top:2vh; margin-left:2vw;">Your password has been reset!</p>';
          }
        }

       ?>
       <?php

           if (isset($_GET['loggedout'])) {
            if ($_GET['loggedout'] == "success") {
               echo '<p class="alert alert-success" style="margin-top:2vh; margin-left:2vw;">You have been logged out!</p>';
           }
         }

        ?>
		</section>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
