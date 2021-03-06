<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header("location: ./../login_system/login.php");
   exit;
}
?>

<!doctype html>
<html lang="en">
<?php include 'C:\Apache24\htdocs\restro\database\dbconnection.php'; ?>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <title>Welcome <?php echo $_SESSION['username'] ?> </title>

   <!-- css file  -->
   <link href="orderstyle.css" rel="stylesheet">
   <!-- reactjs -->
</head>

<body>
   <?php require 'C:\Apache24\htdocs\restro\nav_bar\navigation.php' ?>

   <img src="./../image/food/noodles.jpg" class="d-block w-100" alt="noodles.jpg">

   <div class="container my-3">
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
            <span><a href="/restro/main_index.php">Home</a></span>
            <span class="order-online">Order</span>
            <!-- <span><a href="/restro/review/review.php">Reviews</a></span> -->
            <span><a href="/restro/menu/menu.php">Menu</a></span>
            <span><a href="/restro/photo/photo.php">Photo</a></span>
         </div>
      </div>
      <div class="relative">
         <div class="left-sticky">
            <div class=" leftside">
               <?php $sql = "SELECT * from `categories`   ORDER BY `sno`  ";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_assoc($result)) {
                  $sno = $row['sno'];
                  $name = $row['name'];
                  echo ' <div class="leftitem category' . $sno . ' ">  ' . $name . '</div>   ';
               }
               ?>

            </div>
         </div>

         <!-- Menu section  -->
         <div class="non-sticky">
            <div class="middlesection my-4">
               <table class="table">
                  <tr>
                     <!-- <h scope="col">sno</h> -->
                     <th scope="col" class="menucolumn" style="padding-bottom: 0px; width: 350px;">Items</th>
                     <th scope="col" class="pricecolumn">price</th>
                     <th scope="col" class="cartbtn">Add to Cart</th>
                  </tr>


                  <form id="addcart" action="addcart.php" method="post">
                     <input type="hidden" name="itemId" id="itemId" value="">
                     <!-- <input type="hideen" name="selecteditem" id="selecteditem" value=""> -->
                     <?php $sql = "SELECT * from `menu`   ORDER BY `category_id`  ";
                     $result = mysqli_query($conn, $sql);
                     while ($row = mysqli_fetch_assoc($result)) {
                        $item = $row['menu_item'];
                        $pricetag = $row['price'];
                        $category = $row['category_id'];
                        $itemId = $row['sno'];
                        // $serial = $row['sno'];
                        echo '
			
						<table class="table">
							<tr onmouseover="highlight( ' . $category . ' )" >
								<td class="menucolumn" name="selecteditems" id="selecteditem">' . $item . '</td>
								<td class="pricecolumn" name="selectedprice" id="selectedprice">₹' . $pricetag . '</td>
								<td class="cartbtn">
									<button type="button" class="btn btn-info" id="addtocart" onclick="addCart(' . $itemId . ')">Add +</button>
								</td>
							</tr>
						</table> ';
                     }
                     ?>
                  </form>
               </table>
            </div>
         </div>


         <!-- checkout area  -->

         <div class="checkoutsection">

            <div class="container my-4">
               <h3>Your Order !</h3>
               <table>
                  <th style="width: 190px;" class="menucolumn">Item</th>
                  <th style="float: right; width:10px;"> (₹)Price</th>
                  <hr>
               </table>
            </div>
            <?php
            $userId = $_SESSION['userid'];
            $sql = "SELECT * FROM cart INNER JOIN menu ON cart.item_id = menu.sno WHERE cart.user_id = '$userId' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
               $menu_item = $row['menu_item'];

               $price = $row['price'];
               echo ' <table class="table">
							<tr>
								<td>' . $menu_item . '</td>
								<td style="float:right">₹' . $price . '</td>
							</tr>
						</table>';
            }
            ?>
            <div>
               <table>
                  <th style="width: 200px;height: 20px;text-align: end;">
                     Total (₹)
                  </th>
               </table>
            </div>
            <button type="submit" class="btn btn-success" id="orderbtnbtn"><a href="checkout.php" style="color: white;">
                  Order</a></button>
            <script>
            function highlight(category) {
               $('.leftitem').removeClass('leftitemhighlight');
               $('.category' + category).addClass('leftitemhighlight');
            }

            function addCart(itemId) {
               document.getElementById("")
               document.getElementById("itemId").value = itemId;
               document.forms[0].submit();
            }
            </script>
         </div>
      </div>

      <?php include 'C:/Apache24/htdocs/restro/footer/footer.php' ?>
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



</body>


</html>