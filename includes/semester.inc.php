<?php

if (isset($_POST['submit'])) {

  require "dbh.inc.php";

  $year = $_POST['year'];
  $semester = $_POST['semester'];

  $errorEmpty = false;
  $erroryear = false;


  if (empty($year) || empty($semester)) {
    echo "<span class='form-error'>All fields are mandatory!..</span>";
    $errorEmpty = true;
  }
  else {
        $sql = "INSERT INTO semester (year, semester) VALUES (?,?)";
        $stmt =  mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
      }
      else {

          mysqli_stmt_bind_param($stmt, "ss", $year, $semester);
          mysqli_stmt_execute($stmt);
          echo "<span class='form-success'>".$year." ".$semester." Semester Submitted Successfully!..</span>";
        }
      }
    }

else {
  echo "<span class='form-error'>There was an error!..</span>";
}
?>

<script>

  $("#year, #semester").removeClass("input-error");

 var errorEmpty = "<?php echo $errorEmpty; ?>";


 if (errorEmpty == true) {

   $("#year, #semester").addClass("input-error");

 }



 if (errorEmpty == false) {

   $("#year, #semester").val("");

 }

</script>
