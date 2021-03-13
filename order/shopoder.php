<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: ./../login_system/login.php");
   exit;
}
?>
<!doctype html>
<html lang="en">
<?php include './../database/dbconnection.php'; ?>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link href="orderstyle.css" rel="stylesheet">
   <title><?php echo $_SESSION['username'] ?> Restaurant</title>
</head>

<body style="background-color: #F1F3F6;">
   <?php require 'C:\Apache24\htdocs\restro\nav_bar\navigation.php' ?>
   <div class="container">
      <div id="sticky">
         <h2 style="margin-left: 53px;">Welcome <?php echo $_SESSION['username'] ?> Restaurant</h2>
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
            <span><a href="http://localhost/restro/adminmain.php" style="color: #212529;">Your
                  Restaurant</a></span>
            <span class="order-online">Received
               Orders</a></span>
         </div>
      </div>
      <!-- retrive order by user -->


      <?php
      $userId = $_SESSION['userid'];
      $sql = "SELECT * FROM cart INNER JOIN menu ON cart.item_id = menu.sno WHERE cart.user_id = '11' ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
         $menu_item = $row['menu_item'];
         $price = $row['price'];
         echo ' <table class="table">
                     <tr>
                     <td style="width:200px;" >' . $menu_item . '</td>
								<td>₹' . $price . '</td>
							</tr>
						</table>';
      }
      ?>
      <h4>You Received an Order from
         <?php
         //retriving from last order only 
         $sql = "SELECT * FROM users order by sno desc";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($result)) {
            $username = $row['username'];
            echo $row['username'] . "<br>";
            break;
         }         ?></h4>

      <!-- //delivery address -->

      <div class="delivery">
         <h4>DELIVERY ADDRESS :</h4>
         <?php
         //retriving from last order only 
         $sql = "SELECT * from address order by sno desc";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($result)) {
            $sno = $row['sno'];
            $fname = $row['fname'];
            $phone = $row['phone'];
            $pincode = $row['pincode'];
            $locality = $row['locality'];
            $area = $row['area'];
            $city = $row['city'];
            $statee = $row['statee'];
            $landmark = $row['landmark'];
            $altno = $row['altno'];
            // $fname = $row['fname'];
            // $phone = $row['phone'];

            echo '
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">Person Name</th>
                  <th scope="col" style="width: 600px;">Address</th>
                  <th scope="col">Phone Number</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">' . $fname . '</th>
                  <td>' . $area . '</td>
                  <td>' . $phone . '</td>
               </tr>
            </tbody>
         </table>';
            break;
         }         ?>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
   </script>
</body>

</html>