  <h1>Products</h1>
  <div class="product-display">

    <?php
    foreach ($products as $product) {
      displayProduct($product[1], $product[2], $product[3]);
    }
    ?>

  </div>