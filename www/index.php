<<<<<<< HEAD
<!-- Header starts here -->
<?php include_once 'header.php' ?>
<!-- Header ends here -->
=======
<?php
include_once 'header.php';
include_once (__DIR__.'\includes\functions.inc.php');
$products = readProducts();
 ?>
>>>>>>> 1c9a482 (index page)

<div class="main-content">
  <!-- Search and Filter starts here -->
  <?php include_once 'filters.php'
  ?>
  <!-- Search and Filter ends here -->

  <!-- Product display starts here -->
  <?php include_once 'products-display.php' ?>
  <!-- Product display ends here -->
</div>

<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
=======
 <div class="banner">

 </div>

<div class="main-content">

<h1>Products</h1>
<div class="search">

</div>


<div class="product-display">

<?php
foreach($products as $product) {
  displayProduct($product[1],$product[2],$product[3]);
}
 ?>

</div>




</div>

>>>>>>> 1c9a482 (index page)

<!-- Footer starts here -->
<?php include_once 'footer.php' ?>
<!-- Footer ends here -->