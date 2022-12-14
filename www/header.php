<?php
session_start();
include_once 'includes/functions.inc.php';
if_in_cart();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logo.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="asset\themify-icons\themify-icons.css" rel="stylesheet">
</head>

<body>
  <nav>
    <input type="checkbox" id="menu">
    <label for="menu" class="ti-menu">

    </label>

    <label class="logo"><a href="index.php">Logo.</a></label>
    <ul>


      <?php
      if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'C') {
          echo '<li onclick="pushToUrl()"><a href=#>Shopping Cart</a></li>';
          echo '<li><a href="myOrder.php">My Order</a></li>';
          echo '<li><a href="myAccount.php">My Account</a></li>';
          echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
        } elseif ($_SESSION['type'] == 'V') {
          echo '<li><a href="viewProduct.php">View My Product</a></li>';
          echo '<li><a href="addProducts.php">Add Product</a></li>';
          echo '<li><a href="myAccount.php">My Account</a></li>';
          echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
        } elseif ($_SESSION['type'] == 'S') {
          echo '<li><a href="order.php">Order List</a></li>';
          echo '<li><a href="myAccount.php">My Account</a></li>';
          echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
        }
      } else {
        echo '<li><a class="signin signin-btn" href="login.php">Sign in</a></li>';
        echo '<li><a class="signup" href="signup.php">Sign up</a></li>';
      }
      ?>
      <li><a class="ti-home" href="index.php"></a> </li>
    </ul>
  </nav>

<div class="noti">

<div class="noti-content">

<i class="ti-check"></i>

<div class="message">
  <span  class="text text-1">Success</span>
  <span  class="text text-2">Added to Cart!</span>
</div>
</div>
<i class="ti-close close"></i>

<div class="progress">

</div>

</div>
