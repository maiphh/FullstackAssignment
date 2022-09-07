<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Shipper</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  include_once "header.php"
    ?>

  <!-- Order Headings -->

  <main>
    <div class="orderlist">
      <img class="productpic" src="database\images\product-images\test.jpg" alt="product pic">
      <h1>
        <a href="order.shipper.php">Order #1</a>  <!-- Order number needs data input (meaning linked to the database) -->
      </h1>
      <p>$599</p> <!-- Order price needs data input (meaning linked to the database) -->
    </div>

    <div>
      <p>Address:</p> <!-- Address needs data input (meaning linked to the database) -->
      <p>Total:</p> <!-- Total price needs data input (meaning linked to the database) -->
      <label for="shipperconfirm">Status</label>
      
      <select id="shipperconfirm">
        <option value="Active">Active</option>
        <option value="delivered">Delievered</option> <!-- Make the Order dissapeared if user choose this option -->
        <option value="canceled">Canceled</option> <!-- Make the Order dissapeared if user choose this option -->
      </select>
    </div>


  </main>


</body>
</html>