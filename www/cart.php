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
  if ($_SESSION['cart'] == null) {
    echo '<h3>There is no product in your shopping cart.</h3>';
  } else {
    $products = read_product_cart($_SESSION['cart']);
    foreach ($products as $product) {
      display_product_cart($product['pID'], $product['name'], $product['price'], $product['image'], $_SESSION['cart'][intval($product['pID'])]);
    }
    echo <<<HEREDOC
    <div class="input-btn-container cart-checkout-container">
      <div class="checkout-btn">
        <form action="cart.php" method="post">
          <input type="hidden" name="checkout" value="checkout">
          <!-- <input type="submit" value="Check Out"> -->
          <button class="btn-hover" onclick="removeAll()" type="submit" name="checkout">Check Out</button>
        </form>
      </div>

      <div class="cancel-cart">
        <form action="cart.php" method="post">
          <input type="hidden" name="clear">
          <input class="btn-hover" onclick="removeAll()" type="submit" value="Remove All">
        </form>
      </div>
    </div>
  </div>
HEREDOC;
  }
  ?>


</div>
<?php
// Footer
include_once 'footer.php';
?>