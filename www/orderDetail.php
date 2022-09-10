<?php
include_once 'header.php';

if(isset($_SESSION['type'])) {

if($_SESSION['type']=='S') {

$oid = $_GET['oid'];
if($_SESSION['hub']=='hub1') {
  $hub = 1;
}
elseif ($_SESSION['hub']=='hub2') {
$hub = 2;
}
else $hub=3;




$orders = get_list_from_file('..\database\distribution-hubs\\'.$hub.'\\'.$oid.'.db');
$orderList = get_list_from_file('..\database\orders.db');
$products = get_list_from_file('..\database\products.db');

foreach($orderList as $order) {
  if($order != null) {
    if($order[0]==$oid) {
      $username = $order[2];
      $address = $order[3];
    }
  }
}

}
else header('location:index.php');

?>

<div class="main-content">

 <h1>Order #<?=$_GET['oid']?></h1>

<?php
$totalPrice = 0;
foreach($orders as $order) {
  if($order!=null){
    $pID =$order[0];
    $quantity = $order[1];

    foreach ($products as $product) {
      if($product!=null) {
        if($product[0]==$pID) {
          $pID = $product[0];
          $ID = $product[1];
          $name = $product[2];
          $price = $product[3];
          $image = $product[4];
          $des = $product[5];
          $totalPrice += $price*$quantity;
          displayOrderDetail($pID,$name,$price,$image,$quantity);
        }
      }
    }
  }
}

if(isset($_POST['ship'])) {
$handle = fopen('..\database\orders.db','w');
foreach($orderList as $order) {
  if($order != null) {
    if($order[0]==$oid) {
      $order[5]='d';
      fputcsv($handle,$order);
    }
    else fputcsv($handle,$order);
  }
}

fclose($handle);
header('location:order.php');
}
else header('orderDetail.php?oid='.$_GET['oid']);


if(isset($_POST['cancel'])) {
$handle = fopen('..\database\orders.db','w');
foreach($orderList as $order) {
  if($order != null) {
    if($order[0]==$oid) {
      $order[5]='c';
      fputcsv($handle,$order);
    }
    else fputcsv($handle,$order);
  }
}

fclose($handle);
header('location:order.php');
}
else header('orderDetail.php?oid='.$_GET['oid']);
?>
<div class="orderInfo">
  <h2>Customer Info</h2>
 <p><span>Username: </span> <?=$username?></p>
 <p><span>Address: </span> <?=$address?></p>
 <p><span>Total Price: </span><?=$totalPrice?>$</p>
</div>

<div class="input-btn-container cart-checkout-container">
  <div class="checkout-btn">
    <form action="orderDetail.php?oid=<?=$_GET['oid']?>" method="post">
      <input type="hidden" name="ship" value="$checkout">
      <!-- <input type="submit" value="Check Out"> -->
      <button onclick="" type="submit" name="ship">Ship</button>
    </form>
  </div>

  <div class="cancel-cart">
    <form action="orderDetail.php?oid=<?=$_GET['oid']?>" method="post">
      <input type="hidden" name="cancel">
      <input onclick="" type="submit" value="Cancel">
    </form>
  </div>
</div>

<?php
echo "</div>";



}

else header('location:index.php');


 ?>





  <?php
  // Footer
  include_once 'footer.php';
  ?>
