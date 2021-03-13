<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: login.php");
   exit;
}
?>
<!doctype html>
<html lang="en">
<?php include './../database/dbconnection.php'; ?>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <title>Online restro</title>

   <!-- css file  -->
   <link href="photostyle.css" rel="stylesheet">
   <!-- reactjs -->
</head>

<body>
   <?php require './../nav_bar/navigation.php' ?>
   <img src="./../image/food/noodles.jpg" class="d-block w-100" alt="noodles.jpg">


   <div class="container my-3" style="height: 2000px;">
      <div id="sticky">
         <h2 style="margin-left: 53px;">Welcome to Online Restro order</h2>
         <div class="review">
            <img src="Capture.PNG">
         </div>
         <p class="details">Casual Dining - South Indian, Sandwich, Mughlai,<br> North Indian, Chinese, Seafood,
            Desserts,
            Beverages</p>
         <p class="details">Residency Road
            Open now
            10am – 1am (Today)
         </p>

         <div id="overview">
            <span class="over-view"><a href="http://localhost/restro/main_index.php">Home</a></span>
            <span><a href="http://localhost/restro/order/order.php">Order Online</a></span>
            <!-- <span><a href="http://localhost/restro/review/review.php" style="color: #212529;">Reviews</a></span> -->
            <span><a href="http://localhost/restro/menu/menu.php">Menu</a></span>
            <span class="photo-online">Photo</span>
         </div>
      </div>
      <!-- <hr> -->



   </div>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
   </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
   </script>


   <?php include './../footer/footer.php' ?>
</body>

</html>