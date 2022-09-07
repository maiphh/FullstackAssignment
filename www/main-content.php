<?php
// Include functions.inc.php for general purpose functions
include_once 'includes\functions.inc.php';

// Set variable products as the products list from products.db
$products = read_filter_products();
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