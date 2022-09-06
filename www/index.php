<?php
include_once 'header.php';
include_once(__DIR__ . '\includes\functions.inc.php');
$products = readProducts();
$products_post_filters;
?>
<div class="banner">

</div>
<div class="main-content">


  <!-- Search and Filter starts here -->
  <?php //include_once 'filters.php' 
  ?>
  <!-- Search and Filter ends here -->

  <!-- Product display starts here -->
  <?php include_once 'products-display.php'; ?>
  <!-- Product display ends here -->

</div>

<!-- Footer starts here -->
<?php include_once 'footer.php' ?>
<!-- Footer ends here -->