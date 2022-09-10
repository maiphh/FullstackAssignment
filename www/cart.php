<?php
include_once 'header.php';
include_once 'includes/functions.inc.php';
delete_cart();
clear_cart();
refresh_cart();
check_out();
// if ($_SESSION['count'] == 0) {
//   $_SESSION['cart'] = array();
//   $cartQuantityList = explode(',', $_GET['cartQuantityList']);
//   $cartIdList = explode(',', $_GET['cartIdList']);
//   $i = 0;
//   foreach ($cartIdList as $id) {
//     $_SESSION['cart'][$id] = $cartQuantityList[$i];
//     $i++;
//   }
//   $_SESSION['count'] = 1;
//   header("Refresh:0");
// }
// if (isset($_POST['checkout'])) {

//   $handle = fopen('..\database\distribution-hubs\1\5.db', 'w');
//   $uid = $_SESSION['ID'];
//   $name = $_SESSION['bname'];
//   $address = $_SESSION['address'];
//   $orders = get_list_from_file('..\database\orders.db');
//   $oid = count($orders) - 1;
//   $order_file = fopen('..\database\orders.db', 'a');
//   $order = array($oid, $uid, $name, $address, 'y');
//   fputcsv($order_file, $order);
//   fclose($order_file);

//   $cart = array('pID', 'quantity');
//   foreach ($_SESSION['cart'] as $id => $quantity) {
//     fputcsv($handle, $cart);
//     $cart = array($id, $quantity);
//   }
//   fclose($handle);
//   $_SESSION['cart'] = array();
// }
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