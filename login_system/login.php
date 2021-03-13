<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include 'database/db_connection.php';
   $username = $_POST["username"];
   $password = $_POST["password"];

   $sql = "Select * from users where username='$username' and password='$password' ";
   $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
      $sno = $row['sno'];
   }
   $num = mysqli_num_rows($result);
   if ($num == 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $sno;
      header("location: ./../main_index.php");
   } else {
      $showError = "Invalid Credentials";
   }
} ?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link href="image.css" rel="stylesheet">
   <title>Log in</title>
</head>

<body>
   <?php require 'C:/Apache24/htdocs/restro/nav_bar/navigation.php' ?>
   <?php
   if ($login) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success</strong> you are logged in !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>';
   }
   if ($showError) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error! </strong><br>' . $showError . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>';
   }
   ?>
   <div class="partition" style="
    width: 100%;
    height: 600px;">
      <div class="container my-2">
         <h1 class="col-md-6">Login to Online Restaurant</h1>
         <form action="/restro/login_system/login.php" method="post">
            <div class="form-group col-md-4 ">
               <label for="username">Username</label>
               <input type="text" class="form-control" name="username" id="username" maxlength="20">
            </div>
            <div class="form-group col-md-4">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" maxlength="20" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary col-md-2 ml-5">Login</button>
            <!-- <div class="form-group col-md-6">
            <h1 for="text">If you are new here ! </h1>

         </div>
         <button type="submit" class="btn btn-primary" href="/login_system/sign_up.php/">Sign up</button> -->

         </form>
      </div>
   </div>
   <!-- Optional JavaScript; choose one of the two! -->
   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
   </script>
</body>

</html>