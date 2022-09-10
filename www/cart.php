<?php
include_once 'header.php';
include_once 'includes/functions.inc.php';
delete_cart();
clear_cart();
refresh_cart();
check_out();
?>


<div class="main-content">
  <h1>Shopping Cart</h1>
  <?php
  if (count($_SESSION['cart']) == 0) {
  } else {
    $products = read_product_cart($_SESSION['cart']);
    foreach ($products as $product) {
      display_product_cart($product['pID'], $product['name'], $product['price'], $product['image'], $_SESSION['cart'][intval($product['pID'])]);
    }
  }
  ?>
  <div class="input-btn-container cart-checkout-container">
    <div class="checkout-btn">
      <form action="cart.php" method="post">
        <input type="hidden" name="checkout" value="$checkout">
        <!-- <input type="submit" value="Check Out"> -->
        <button onclick="removeAll()" type="submit" name="checkout">Check Out</button>
      </form>
    </div>

    <div class="cancel-cart">
      <form action="cart.php" method="post">
        <input type="hidden" name="clear">
        <input onclick="removeAll()" type="submit" value="Remove All">
      </form>
    </div>
  </div>
</div>

<?php
// Footer
include_once 'footer.php';
?>