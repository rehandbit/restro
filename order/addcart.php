<?php include 'C:\Apache24\htdocs\restro\database\dbconnection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: ./../login_system/login.php");
   exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // collect value of input field
   $itemId = $_POST['itemId'];
   if (empty($itemId)) {
      echo "item id is empty";
   } else {
      echo $itemId;
      $userId = $_SESSION['userid'];
   }
   // header("location: order.php");

   $showalert = false;
   if ($method = 'POST') {
      $sql = "INSERT INTO `cart` (`item_id`, `user_id`)VALUES ('$itemId', '$userId')";
      $result = mysqli_query($conn, $sql);
      $showalert = true;
      if ($showalert) {
         echo ' item not added <br>';
      } else {
         echo 'item added succssfully <br>';
      }
   }

   header("location: order.php");
}