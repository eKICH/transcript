<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $inputdept = $_POST['inputdept'];
    $inputcourse = $_POST['inputcourse'];
    $unitname = $_POST['unitname'];
    $level = $_POST['level'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorunit = false;


    if (empty($inputdept) || empty($inputcourse) || empty($unitname) || empty($level)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }


    else{

       $sql = "SELECT unit_name FROM units WHERE unit_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $unitname);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Unit Name Already Exists!..</span>";
           $errorunit = true;

         }

     else{
           $sql = "SELECT id FROM units";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TUID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO units (units_id, unit_name, department, course, level, status)
          VALUES (?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {

            mysqli_stmt_bind_param($stmt, "ssssss", $number, $unitname, $inputdept, $inputcourse, $level, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$number." Unit Registered Successfully!..</span>";
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

   $("#inputdept, #inputcourse, #unitname, #level").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorunit = "<?php echo $errorunit; ?>";

  if (errorEmpty == true) {

    $("#inputdept, #inputcourse, #unitname, #level").addClass("input-error");

  }

  if (errorunit == true) {

    $("#unitname").addClass("input-error");

  }


  if (errorEmpty == false && errorunit == false) {

    $("#inputdept, #inputcourse, #unitname, #level").val("");

  }

 </script>
