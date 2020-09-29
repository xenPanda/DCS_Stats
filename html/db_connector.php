<?php
$con = mysqli_connect("localhost","user","password","stats");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

function db_close_con($con) {
  mysqli_close($con);
}

?>
