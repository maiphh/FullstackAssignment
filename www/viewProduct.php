<?php
include_once 'header.php';
if (!$_SESSION['type'] == 'V') {
  header('location:index.php');
}
include_once(__DIR__ . '\includes\functions.inc.php');
$products = readProducts();

?>

<div class="banner">

</div>

<div class="main-content">

  <h1>My Products</h1>
  <div class="search">

  </div>


  <div class="product-display">

    <?php
    foreach ($products as $product) {
      if ($product[1] == $_SESSION['ID']) {
        // viewProduct($product['pID'], $product['ID'], $product['name'], $product['price'], $product['image'], $product['des']);
        viewProduct($product['0'], $product['1'], $product['2'], $product['3'], $product['4'], $product['5']);
      }
    }
    ?>

  </div>




</div>


<?php
// Footer
include_once 'footer.php';
?>
