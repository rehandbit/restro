<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$db = "users_php";
// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
  die("Connection failed: ");
}