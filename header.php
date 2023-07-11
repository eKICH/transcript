<?php session_start(); ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" style="color:#000;" href="" >Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" style="font-size:18px;">
          <li class="active nav-item">
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
  </ul>
  <form class="form-inline my-2 my-lg-0">
     <li class="nav-item dropdown" style="list-style: none;">
     <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
     style="text-decoration:none; color:#fff;">
     <?php  echo "".$_SESSION['userid']; ?>
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
  		  <a class="dropdown-item" href="includes/admin-logout.inc.php">Logout</a>
     </div>
     </li>

   </form>
      </div>
    </nav>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#student a:contains('Student')").parent().addClass('active').siblings().removeClass('active');
            $("#lecture a:contains('Lecturer')").parent().addClass('active').siblings().removeClass('active');
            $("#course a:contains('Course')").parent().addClass('active').siblings().removeClass('active');
            $("#depart a:contains('Department')").parent().addClass('active').siblings().removeClass('active');
            $("#user a:contains('User')").parent().addClass('active').siblings().removeClass('active');
            $("#unit a:contains('Unit')").parent().addClass('active').siblings().removeClass('active');
            $("#semesterplus a:contains('Semester')").parent().addClass('active').siblings().removeClass('active');
          });
        </script>
