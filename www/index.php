<?php
include_once 'header.php';
include_once(__DIR__ . '\includes\functions.inc.php');
$products = readProducts();
?>

<div class="banner">

</div>
<div class="main-content">


  <h1>Products</h1>
  <div class="search">
  </div>

  <!-- Search and Filter starts here -->
  <?php include_once 'filters.php'
  ?>
  <!-- Search and Filter ends here -->

  <!-- Product display starts here -->
  <?php include_once 'products-display.php'; ?>
  <!-- Product display ends here -->
</div>

<!-- Footer starts here -->
<?php include_once 'footer.php' ?>
<!-- Footer ends here -->