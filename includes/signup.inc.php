<?php

  if (isset($_POST['submit'])) {

    require "dbh.inc.php";

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $uppercase = preg_match('@[A-Z]@', $password);

    $errorEmpty = false;
    $errorEmail = false;
    $errorMatch = false;
    $errorLength = false;
    $errorusername = false;
    $erroremail = false;

    if (empty($email) || empty($username) || empty($password) || empty($repassword) || empty($level)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<span class='form-error'>Enter a valid Email Address!..</span>";
      $errorEmail = true;
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

       $sql = "SELECT username FROM users WHERE username=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
         exit();
   }
   else {
         mysqli_stmt_bind_param($stmt, "s", $username);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Username Already Taken!..</span>";
           $errorusername = true;

         }
         else {
                  $sql = "SELECT email FROM users WHERE email=?";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
                    exit();
                  }
                  else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                      echo "<span class='form-error'>Email Already Taken!..</span>";
                      $erroremail = true;

                  }

     else{
           $sql = "SELECT id FROM users";
           $res = mysqli_query($conn,$sql);
           $lastid = 0;
           while ($row = mysqli_fetch_assoc($res) ) {
             $lastid = $row['id'];
           }

           $nextid = $lastid+1;

           $prefix = "TUID";

           $number = $prefix." - ".sprintf('%01d', $nextid);

          $sql = "INSERT INTO users (user_id, email, username, password, level, status)
          VALUES (?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
            exit();
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssssss", $number, $email, $username, $hashedPwd, $level, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>".$number." User Registered Successfully!..</span>";

              }
           }
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

   $("#email, #username, #password, #repassword, #level").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorEmail = "<?php echo $errorEmail; ?>";
  var errorMatch = "<?php echo $errorMatch; ?>";
  var errorLength = "<?php echo $errorLength; ?>";
  var errorusername = "<?php echo $errorusername; ?>";
  var erroremail = "<?php echo $erroremail; ?>";


  if (errorEmpty == true) {

    $("#email, #username, #password, #repassword, #level").addClass("input-error");

  }

  if (errorEmail == true) {

    $("#email").addClass("input-error");

  }

  if (errorMatch == true) {

    $("#password, #repassword").addClass("input-error");

  }

  if (errorLength == true) {

    $("#password, #repassword").addClass("input-error");

  }

  if (errorusername == true) {

    $("#username").addClass("input-error");

  }

  if (erroremail == true) {

    $("#email").addClass("input-error");

  }

  if (errorEmpty == false && errorEmail == false && errorMatch == false && errorLength == false && errorusername == false && erroremail == false) {

    $("#email, #username, #password, #repassword, #level").val("");

  }

 </script>
