<?php

$servername = "localhost";
$dBUsername ="root";
$dBPassword = "";
$dBName = "transcript";

$conn = Mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection Failed: ".Mysqli_connect_error());
}
