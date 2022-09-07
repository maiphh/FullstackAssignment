<?php
include_once "header.php";

include_once (__DIR__ / '\includes\functions.inc.php');

$products = readProducts();
  ?>

  <!-- Order Headings -->


    <div class="orderlist">
      <img class="productpic" src="database\images\product-images\test.jpg" alt="product pic">
      <h1>
        <a href="productDetail.php">Product name</a>  <!-- Product needs data input (meaning linked to the database) -->
      </h1>
      <p>$599</p> <!-- Order price needs data input (meaning linked to the database) -->
    </div>

    <div>
      <p>Address:</p> <!-- Address needs data input (meaning linked to the database) -->
      <p>Total:</p> <!-- Total price needs data input (meaning linked to the database) -->
      
      <select id="orderstatus">
        <option value="Active">Active</option>
        <option value="delivered">Delievered</option> <!-- Make the Order dissapeared if user choose this option -->
        <option value="canceled">Canceled</option> <!-- Make the Order dissapeared if user choose this option -->
      </select>
    </div>


 


