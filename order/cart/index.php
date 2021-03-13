<?php
session_start();
include './../database/dbconnection.php';




$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `cart` WHERE `item_id`='$item_id'");
$row = mysqli_fetch_assoc($result);
$item_id = $row['item_id'];
$user_id = $row['user_id'];
$selecteditem = $row['selecteditem'];

$cartArray = array(
	$code=>array(
	'item_id'=>$item_id,
	'user_id'=>$user_id,
	'selecteditem'=>$selecteditem,
	'quantity'=>1,
	
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>