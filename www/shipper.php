<?php
include_once 'header.php';
include_once (__DIR__.'\includes\functions.inc.php');
$products = readProducts();
 ?>
  
  <div class="order-container">
    <h1>ORDER LIST</h1>
    <div class= "order-detail">

      <div class= "order-impage">
        <img src="database\images\product-images\test.jpg" alt="">
      </div>
      
      <div class= "order-list">
        <h2>
            <a href="order.shipper.php">Order #1</a>  
          </h2>
          <p> <?=$_GET['price']?>$</p> <!-- Order price needs data input (meaning linked to the database) -->
          <a href="order.shipper.php">Details</a>
      </div>

    
    </div>

  </div>
