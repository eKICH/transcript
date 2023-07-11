<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $level = $_POST['level'];
    $cname = $_POST['cname'];
    $selectdept = $_POST['selectdept'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorcourse = false;


    if (empty($level) || empty($cname) || empty($selectdept)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }


    else{

       $sql = "SELECT course_name FROM courses WHERE course_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $cname);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Course Name Already Exists!..</span>";
           $errorcourse = true;

         }

     else{
           $sql = "SELECT id FROM courses";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TCID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO courses (course_id, level, course_name, department, status)
          VALUES (?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

        }
        else {

            mysqli_stmt_bind_param($stmt, "sssss", $number, $level, $cname, $selectdept, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$number." Course Registered Successfully!..</span>";

              }
           }
         }
      }
    }
  else {
    echo "<span class='form-error'>There was an error!..</span>";
    exit();
  }
 ?>

 <script>

   $("#level, #cname, #selectdept").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorcourse = "<?php echo $errorcourse; ?>";

  if (errorEmpty == true) {

    $("#level, #cname, #selectdept").addClass("input-error");

  }

  if (errorcourse == true) {

    $("#cname").addClass("input-error");

  }


  if (errorEmpty == false && errorcourse == false) {

    $("#level, #cname, #selectdept").val("");

  }

 </script>
