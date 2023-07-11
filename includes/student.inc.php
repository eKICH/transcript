<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $studentname = $_POST['studentname'];
    $datepicker = $_POST['datepicker'];
    $mobile = $_POST['mobile']; // Validate Mobile
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $level = $_POST['level'];
    $password= $_POST['password'];
    $repassword = $_POST['repassword'];
    $status = $_POST['status'];

    $uppercase = preg_match('@[A-Z]@', $password);

    $errorEmpty = false;
    $errorstudent = false;
    $errorMatch = false;
    $errorLength = false;


    if (empty($studentname) || empty($datepicker) || empty($mobile) || empty($gender) || empty($department) || empty($course) || empty($level) || empty($password) || empty($repassword)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif ($password != $repassword) {
      echo "<span class='form-error'>Password and repassword should match!..</span>";
      $errorMatch = true;
    }
    elseif (!$uppercase || strlen($password) < 6) {
      echo "<span class='form-error'>Atleast 6 characters or more and should include atleast one upper case letter!..</span>";
      $errorLength = true;
    }


    else{

       $sql = "SELECT student_name FROM students WHERE student_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $studentname);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Student Already Exists!..</span>";
           $errorstudent = true;

         }

     else{
           $sql = "SELECT id FROM students";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TSID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO students (student_id, student_name, doreg, mobile, gender, dept, course, level, password, status)
          VALUES (?,?,?,?,?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssssssssss", $number, $studentname, $datepicker, $mobile, $gender, $department, $course, $level, $hashedpwd, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$number." Student Registered Successfully!..</span>";
              }
           }
         }
      }
    }
  else {
    echo "<span class='form-error'>There was an error!..</span>";
  }
 ?>

 <script>

   $("#studentname, #datepicker, #mobile, #gender, #department, #level, #password, #repassword, #course").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorstudent = "<?php echo $errorstudent; ?>";
  var errorMatch = "<?php echo $errorMatch; ?>";
  var errorLength = "<?php echo $errorLength; ?>";

  if (errorEmpty == true) {

    $("#studentname, #datepicker, #mobile, #gender, #department, #level, #password, #repassword, #course").addClass("input-error");

  }

  if (errorstudent == true) {

    $("#studentname").addClass("input-error");

  }

  if (errorMatch == true) {

    $("#password, #repassword").addClass("input-error");

  }

  if (errorLength == true) {

    $("#password, #repassword").addClass("input-error");

  }


  if (errorEmpty == false && errorstudent == false && errorMatch == false && errorLength == false) {

    $("#studentname, #datepicker, #mobile, #gender, #department, #level, #password, #repassword, #course").val("");

  }

 </script>
