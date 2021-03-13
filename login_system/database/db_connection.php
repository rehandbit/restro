<?php
//db connection
$servername = "localhost";
$username = "root";
$password = "admin";
$db = "users_php";
//making connection
$conn = new mysqli($servername, $username, $password, $db);
if (!$conn) {
   die("Connection failed: ");
}