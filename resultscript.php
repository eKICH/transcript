<?php
include "studentheader.php";
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   </head>
   <body>
     <?php

     include "includes/dbh.inc.php";
     $semester = $_POST['semester'];
     $yearofstudy = $_POST['yearofstudy'];
     $sid = $_POST['sid'];

      $sql = "SELECT * FROM exams WHERE sid = '".$sid."' AND semester = '".$semester."' AND yearofstudy = '".$yearofstudy."'";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
      echo '<div class="list"> Unit Name: ' . $row["unit_name"]. '</div>
      <div class="list">Score %: ' . $row["score"]. '</div>
      <div class="list">Grade: ' . $row["grade"]. '</div>
       <div class="list">Hours: ' . $row["hours"]. '</div>' ;
      }
?>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
     integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
     integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   </body>
 </html>
