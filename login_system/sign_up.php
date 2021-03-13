<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include 'database/db_connection.php'; //connecting to database
   $username = $_POST["username"];
   $password = $_POST["password"];
   $confirmpassword = $_POST["confirmpassword"];
   //$exits =false;

   // check whether this username Exists
   $existsSql = "SELECT * FROM `users` WHERE username =  '$username'";
   $result = mysqli_query($conn, $existsSql);
   $numExitsRows = mysqli_num_rows($result);
   if ($numExitsRows > 0) {
      //$exists = true;
      $showError = "Username already exisits !";
   } else {
      //$exists = false;
      if (($password == $confirmpassword)) {
         $sql = "INSERT INTO `users` (`username`, `password`,`dt`) VALUES ('$username', '$password',current_timestamp())";
         $result = mysqli_query($conn, $sql);
         if ($result) {
            $showAlert = true;
         }
      } else {
         $showError = "Password do not match! <br>";
      }
   }
} ?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link href="image.css" rel="stylesheet">
   <title>Sign up</title>
</head>

<body>
   <?php require 'C:/Apache24/htdocs/restro/nav_bar/navigation.php' ?>

   <!-- <h1>Hello, world!</h1> -->
   <div class="container">
      <div class="my-2">
         <?php
         if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success</strong> Account created !!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>';
         }
         if ($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>ops!</strong><br> Account cannot be created !!<br> ' . $showError . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>';
         }
         ?> </div>
      <h1 class="col-md-6">Sign up to Online Restaurant</h1>
      <form action="/restro/login_system/sign_up.php" method="post">
         <div class="form-group col-md-4">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp"
               maxlength="20">
         </div>
         <div class="form-group col-md-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" maxlength="20">
         </div>
         <div class="form-group col-md-4">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" maxlength="20">
            <small id="emailHelp" class="form-text text-muted">please enter same password!</small>
         </div>
         <button type="submit" class="btn btn-primary col-md-2 ml-5">Submit</button>
      </form>
   </div>
   <!-- Optional JavaScript; choose one of the two! -->
   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
   </script>
</body>

</html>