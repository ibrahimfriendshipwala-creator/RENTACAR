<?php
$host = "localhost";
$dbname = "db95nyigf4nyww";
$username = "udg55r6gw7kdk";
$password = "mehagkamqn56";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>
