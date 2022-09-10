<?php
include_once 'header.php';
include_once 'includes/functions.inc.php';
delete_cart();
clear_cart();
$products = read_product_cart($_SESSION['cart']);
if ($_SESSION['count'] == 0) {
  $cartQuantityList = explode(',', $_GET['cartQuantityList']);
  $cartIdList = explode(',', $_GET['cartIdList']);
  $i = 0;
  foreach ($cartIdList as $id) {
    $_SESSION['cart'][$id] = $cartQuantityList[$i];
  }
  $_SESSION['count'] = 1;
  header("Refresh:0");
}
?>


<div class="main-content">
  <h1>Shopping Cart</h1>
  <?php
  foreach ($products as $product) {
    display_product_cart($product['pID'], $product['name'], $product['price'], $product['image'], $_SESSION['cart'][intval($product['pID'])]);
  }
  ?>
  <div class="input-btn-container cart-checkout-container">
    <div class="checkout-btn">
      <button type="button" name="addtocart">Check Out</button>
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