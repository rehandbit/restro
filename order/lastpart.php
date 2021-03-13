<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: ./../login_system/login.php");
   exit;
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
   <link href="image.css" rel="stylesheet">
   <title>Your Order~ <?php echo $_SESSION['username'] ?> </title>
</head>

<body style="background-color: #F1F3F6;">
   <?php require 'C:\Apache24\htdocs\restro\nav_bar\navigation.php' ?>
   <div class="container my-3">
      <div class="conwhite" style="height: 546px; margin-left: 0px;width: 900px; background-color:initial">
         <div class="delivery" style="width:900px;">
            <h4><?php echo $_SESSION['username'] ?> ~ Your Order arriving in 20 minutes !!!</h4>
            <!-- <h1>Your order arriving in 30 minutes !!</h1> -->
         </div>
         <div class="checkoutsection" style="height: 500px;margin-right: 960px;">

            <div class="container my-4">
               <h3>Your Order !</h3>
               <table>
                  <th style="width: 190px;" class="menucolumn">Item</th>
                  <hr>
               </table>
            </div>
            <?php
            include './../database/dbconnection.php';
            $userId = $_SESSION['userid'];
            $sql = "SELECT * FROM cart INNER JOIN menu ON cart.item_id = menu.sno WHERE cart.user_id = '$userId' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
               $menu_item = $row['menu_item'];

               // $price = $row['price'];
               echo ' <table class="table">
							<tr>
								<td><strong style="font-size: xx-large">' . $menu_item . '</strong></td></tr></table>';
            }
            ?>
         </div>
         <!-- address -->
         <div class="checkoutsection" style="height: 500px;margin-right: 460px;">

            <div class="container my-4">
               <h3>Your Address !</h3>
               <table>
                  <th style="width: 190px;" class="menucolumn"> </th>
                  <hr>
               </table>
            </div>
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

               // $price = $row['price'];
               echo ' <table class="table">
							<tr>
                        <td><strong style="font-size: xx-large">' . $fname . '</strong></td></tr></table>';
               echo '<br>';
               echo ' <table class="table">
							<tr>
                        <td><strong style="font-size: xx-large">' . $area . '</strong></td></tr></table>';
               echo '<br>';
               echo ' <table class="table">
							<tr>
                        <td><style="font-size: large">' . $pincode . '</style=></td></tr></table>';

               break;
            }
            ?>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
   </script>
   <div class="footer" style="width: 100%; margin-left:0px;">
      <?php include 'C:/Apache24/htdocs/restro/footer/footer.php' ?>
   </div>
</body>

</html>