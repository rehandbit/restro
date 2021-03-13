<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: ./../login_system/login.php");
   exit;
}
?>
<?php
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include './../database/dbconnection.php';

   $fname = $_POST["fname"];
   $phone = $_POST["phone"];
   $pincode = $_POST["pincode"];
   $locality = $_POST["locality"];
   $area = $_POST["area"];
   $city = $_POST["city"];
   $statee = $_POST["statee"];
   $landmark = $_POST["landmark"];
   $altno = $_POST["altno"];
   $userId = $_SESSION['userid'];


   $sql = "INSERT INTO address (fname, phone, pincode, locality, area,city, statee, landmark, altno, userId) VALUES ('$fname', '$phone', '$pincode', '$locality', '$area', '$city', '$statee', '$landmark', '$altno', '$userId')";
   $result = mysqli_query($conn, $sql);
   // echo  '$sql' .  $sql;
   // echo '$result' . $result;
   // var_dump($result);
}
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <!-- css file  -->

   <link href="orderstyle.css" rel="stylesheet">

   <title>Checkout~ <?php echo $_SESSION['username'] ?> </title>
</head>

<body style="background-color: #F1F3F6;">



   <?php require 'C:\Apache24\htdocs\restro\nav_bar\navigation.php' ?>

   <div class="container my-3">
      <div class="conwhite">
         <div class="delivery">
            <h4>DELIVERY ADDRESS :</h4>
         </div>
         <form action="/restro/order/checkout.php" method="post">
            <div class="forms-container my-4">

               <div class="row g-4">
                  <div class="col-md">
                     <div class="form-floating">
                        <input type="text" class="form-control" name="fname" id="floatingInputGrid" placeholder="Name">
                        <label for="floatingInputGrid">Name</label>
                     </div>
                  </div>
                  <div class="col-md">
                     <div class="form-floating">
                        <input type="tel" class="form-control" name="phone" id="floatingInputGrid"
                           placeholder="Mobile Number">
                        <label for="floatingSelectGrid">Mobile Number</label>
                     </div>
                  </div>
               </div>
               <div class="row g-4 ">
                  <div class="col-md my-5">
                     <div class="form-floating">
                        <input type="number" class="form-control" name="pincode" id="floatingInputGrid"
                           placeholder="Name">
                        <label for="floatingInputGrid">Pincode</label>
                     </div>
                  </div>
                  <div class="col-md my-5">
                     <div class="form-floating">
                        <input type="text" class="form-control" name="locality" id="floatingInputGrid"
                           placeholder="Locality" rows="5">
                        <label for="floatingSelectGrid">Locality</label>
                     </div>
                  </div>
               </div>
               <div class="form-floating">
                  <textarea class="form-control" name="area" id="floatingTextarea2" placeholder="Address"
                     style="height: 150px"></textarea>
                  <label for="floatingTextarea2">Address (Area and Street)</label>
               </div>
               <div class="row g-4 my-2">
                  <div class="col-md">
                     <div class="form-floating">
                        <input type="text" class="form-control" name="city" id="floatingInputGrid" placeholder="">
                        <label for="floatingInputGrid">city/district/town</label>
                     </div>
                  </div>
                  <div class="col-md">
                     <div class="form-floating">
                        <select class="form-select" name="statee" id="floatingSelectGrid"
                           aria-label="Floating label select example">
                           <option selected>--select state--</option>
                           <option value="1">Jharkhand</option>
                           <option value="Karnataka">Karnataka</option>
                           <option value="3">West Bengal</option>
                        </select>
                        <label for="floatingSelectGrid">State</label>
                     </div>
                  </div>

               </div>
               <div class="row g-4 my-2">
                  <div class="col-md">
                     <div class="form-floating">
                        <input type="text" class="form-control" name="landmark" id="floatingInputGrid"
                           placeholder="Name">
                        <label for="floatingInputGrid">Landmark (optional)</label>
                     </div>
                  </div>
                  <div class="col-md">
                     <div class="form-floating">
                        <input type="text" class="form-control" name="altno" id="floatingInputGrid"
                           placeholder="Mobile Number">
                        <label for="floatingSelectGrid">Alternate Number (optional)</label>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary col-md-2 ml-5" style="color: white;">Submit</button>
               <button type="submit" class="btn btn-primary col-md-2 ml-5"><a href="lastpart.php"
                     style="color: white;">Your Order</a></button>
            </div>
         </form>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
   </script>
   <div class="footer">
      <?php include 'C:/Apache24/htdocs/restro/footer/footer.php' ?>
   </div>
</body>

</html>