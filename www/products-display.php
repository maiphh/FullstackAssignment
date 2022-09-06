  <h1>Products</h1>
  <div class="product-display">

    <?php
    foreach ($products as $product) {
      displayProduct($product['name'], $product['price'], $product['image']);
    }
    ?>

  </div>