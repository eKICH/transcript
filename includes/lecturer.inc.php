<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorlname = false;


    if (empty($lname) || empty($mobile) || empty($gender) || empty($department)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }


    else{

       $sql = "SELECT lecturer_name FROM lecturer WHERE lecturer_name=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $lname);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Lecturer Name Already Exists!..</span>";
           $errorlname = true;

         }

     else{
           $sql = "SELECT id FROM lecturer";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TLID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO lecturer (lecturer_id, lecturer_name, mobile, gender, department, status)
          VALUES (?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {

            mysqli_stmt_bind_param($stmt, "ssssss", $number, $lname, $mobile, $gender, $department, $status);
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

   $("#lname, #mobile, #gender, #department").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorlname = "<?php echo $errorlname; ?>";

  if (errorEmpty == true) {

    $("#lname, #mobile, #gender, #department").addClass("input-error");

  }

  if (errorlname == true) {

    $("#lname").addClass("input-error");

  }


  if (errorEmpty == false && errorlname == false) {

    $("#lname, #mobile, #gender, #department").val("");

  }

 </script>
