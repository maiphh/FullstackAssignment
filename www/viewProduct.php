<?php
include_once 'header.php';
if (!$_SESSION['type'] == 'V') {
  header('location:index.php');
}
include_once(__DIR__ . '\includes\functions.inc.php');
$products = read_filter_products();
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
        viewProduct($product['pID'], $product['ID'], $product['name'], $product['price'], $product['image'], $product['des']);
      }
    }
    ?>

  </div>




</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>