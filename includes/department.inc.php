<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $deptname = $_POST['deptname'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errordept = false;


    if (empty($deptname)) {
      echo "<span class='form-error'>Department Required!..</span>";
      $errorEmpty = true;

    }
    else{

       $sql = "SELECT department_name FROM departments WHERE department_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $deptname);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Department Name Already Exists!..</span>";
           $errordept = true;
         }

     else{
           $sql = "SELECT id FROM departments";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TDID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO departments (department_id, department_name, status)
          VALUES (?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

        }
        else {

            mysqli_stmt_bind_param($stmt, "sss", $number, $deptname, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$number." Department Registered Successfully!..</span>";

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

   $("#deptname").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errordept = "<?php echo $errordept; ?>";

  if (errorEmpty == true) {

    $("#deptname").addClass("input-error");

  }

  if (errordept == true) {

    $("#deptname").addClass("input-error");

  }


  if (errorEmpty == false && errordept == false ) {

    $("#deptname").val("");

  }

 </script>
