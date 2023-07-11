<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $dept = $_POST['dept'];
    $course = $_POST['course'];
    $level = $_POST['level'];
    $unit_name = $_POST['unit_name'];
    $student_name = $_POST['student_name'];
    $sid = $_POST['sid'];
    $semester = $_POST['semester'];
    $yearofstudy = $_POST['yearofstudy'];
    $assignment = $_POST['assignment'];
    $cat = $_POST['cat'];
    $exam = $_POST['exam'];
    $score = $_POST['score'];
    $grade = $_POST['grade'];
    $hours = $_POST['hours'];


    $errorEmpty = false;
    $errorsname = false;
    $errorassignment= false;
    $errorcat= false;
    $errorexam= false;


    if (empty($dept) || empty($course) || empty($level) || empty($unit_name) || empty($student_name)
  || empty($sid) || empty($semester) || empty($yearofstudy) || empty($assignment) || empty($cat) || empty($exam) || empty($score) || empty($grade) || empty($hours)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif ($assignment > 15) {
      echo "<span class='form-error'>Assignment Score should be 15 or Less!..</span>";
      $errorassignment = true;
    }
    elseif ($cat > 15) {
      echo "<span class='form-error'>Cat Score should be 15 or Less!..</span>";
      $errorcat = true;
    }
    elseif ($cat > 100) {
      echo "<span class='form-error'>Exam Score should be 100 or Less!..</span>";
      $errorexam = true;
    }

    else{

       $sql = "SELECT unit_name, student_name FROM exams WHERE unit_name=? AND student_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
   }
   else {
         mysqli_stmt_bind_param($stmt, "ss", $unit_name, $student_name);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Results Already submitted!..</span>";
           $errorsname = true;

         }

     else{
           /*$sql = "SELECT id FROM lecturer";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TLID";

           $number = $prefix." - ".sprintf('%01d', $nextid);*/

          $sql = "INSERT INTO exams (department, course, level, unit_name, student_name, sid, semester, yearofstudy, assignment, cat, exam, score, grade, hours)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {

            mysqli_stmt_bind_param($stmt, "ssssssssssssss", $dept, $course, $level, $unit_name, $student_name, $sid,
             $semester, $yearofstudy, $assignment, $cat, $exam, $score, $grade, $hours);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$unit_name." ".$student_name." Results Submitted Successfully!..</span>";
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

   $("#dept, #course, #level, #unit_name, #student_name, #sid, #semester, #yearofstudy, #assignment, #cat, #exam, #score, #grade, #hours").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorsname = "<?php echo $errorsname; ?>";
  var errorassignment = "<?php echo $errorassignment; ?>";
  var errorcat = "<?php echo $errorcat; ?>";
  var errorexam = "<?php echo $errorexam; ?>";

  if (errorEmpty == true) {

    $("#dept, #course, #level, #unit_name, #student_name, #sid, #semester, #yearofstudy, #assignment, #cat, #exam, #score, #grade, #hours").addClass("input-error");

  }

  if (errorsname == true) {

    $("#unit_name").addClass("input-error");

  }

  if (errorassignment == true) {

    $("#assignment").addClass("input-error");

  }

  if (errorcat == true) {

    $("#cat").addClass("input-error");

  }

  if (errorexam == true) {

    $("#exam").addClass("input-error");

  }


  if (errorEmpty == false && errorsname == false && errorassignment == false && errorcat == false) {

    $("#dept, #course, #level, #unit_name, #student_name, #sid, #semester, #yearofstudy, #assignment, #cat, #exam, #score, #grade").val("");

  }

 </script>
