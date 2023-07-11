<?php
  require "studentheader.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transcript - Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  </head>
  <body style="background-color: #c0c0c0;">
    <div class="container" style="margin-left: 80px; padding: 20px 0px;">
      <?php

          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                  echo '<p class="error" style="color:red; margin-left:1vw; margin-top:-5vh;">All fields are Mandatory!</p>';
              }
          }

         ?>
      <form action="result-transcript.php" method="POST">
        <div class="row" style="margin-top:3vh; margin-left: 10vw;">

              <div class="col col-md-4">
                <?php

                  include "includes/dbh.inc.php";

                  $sql = "SELECT * FROM semester ORDER BY semester ASC";

                  $result = mysqli_query($conn, $sql);

                  $options = "";
                  $select = "";

                  while($row = mysqli_fetch_array($result))
                  {
                    $select = $select."<option hidden>---Select Semester---</option>";
                    $options = $options."<option>$row[year] $row[semester]</option>";
                  }

                 ?>
                      <label for="semester">Semester</label>
                      <select id="semester" name="semester" class="form-control" readonly>
                        <?php echo $select;?>
                        <?php echo $options;?>
                      </select>
              </div>
              <div class="col col-md-4">
                <label for="yearofstudy">Year of Study</label>
                <select id="yearofstudy" name="yearofstudy" class="form-control" readonly>
                  <option selected hidden>---Select Year of Study---</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="col col-md-4">

                  <!--<label for="SID">SID</label>-->
                  <input type="text" name="sid" class="form-control" value="<?php  echo "".$_SESSION['userid']; ?>" readonly hidden>
              </div>
          </div><br>
            <button class="btn btn-primary" name="btn-submit" style="margin-left: 11vw;" value="">View Transcript</button><br><br>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
