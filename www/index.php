<?php
// Header
include_once 'header.php';

// Include functions.inc.php for general purpose functions
include_once(__DIR__ . '\includes\functions.inc.php');

// Set variable products as the products list from products.db
$products = readProducts();

// Set variable for display products after filtering
$products_post_filters;
?>

<div class="banner">

</div>
<div class="main-content">

  <?php
  // Search and filters products
  include_once 'filters.php';

  // Products display
  include_once 'products-display.php';
  ?>

</div>

<!-- Footer -->
<?php include_once 'footer.php' ?>