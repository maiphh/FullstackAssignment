<?php
include_once 'header.php';
include_once 'includes/functions.inc.php';
delete_cart();
clear_cart();
$products = read_product_cart($_SESSION['cart']);
?>
<div class="main-content">
    <div class="cancel-cart">
        <form action="cart.php" method="post">
            <input type="hidden" name="clear">
            <input type="submit" value="Delete All">
        </form>
    </div>
    <?php
    foreach ($products as $product) {
        display_product_cart($product['pID'], $product['name'], $product['price'], $product['image'], $_SESSION['cart'][intval($product['pID'])]);
    }
    ?>
</div>
<?php
include_once 'includes/savetolocalstorage.inc.php';
// Footer
include_once 'footer.php';
?>