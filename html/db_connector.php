<!--
  DCS_Stats - DCS stats collection via Slmod and insert into MySql DB

  Author: Chris Barilla (Panda)
  Date:   09/05/2020

  Filename: db_connector.php
  Version: 0.0.1
-->
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
