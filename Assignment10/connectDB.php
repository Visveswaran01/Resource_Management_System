<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "resource_ms";


$conn = mysqli_connect($servername, $username, $password,$dbName);

if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

$_SESSION["conn"] = $conn;

?>