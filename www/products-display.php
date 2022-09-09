

  <h1>Products</h1>
  <div class="product-display">

    <?php
    if(isset($_SESSION['type'])) {
    if($_SESSION['type']=='C'){
    foreach ($products as $product) {
      displayProduct($product['0'], $product['1'], $product['2'], $product['3'], $product['4'],$product['5']);
    }}
    else {
      foreach ($products as $product) {
        viewProduct($product['0'], $product['1'], $product['2'], $product['3'], $product['4'],$product['5']);
    }}
  }
  else {
    foreach ($products as $product) {
      viewProduct($product['0'], $product['1'], $product['2'], $product['3'], $product['4'],$product['5']);
    }
  }
    ?>

  </div>
