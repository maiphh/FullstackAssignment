<?php
include_once 'header.php';

if(isset($_SESSION['type'])) {

if($_SESSION['type']=='S') {

$orders = get_list_from_file('..\database\orders.db');


?>

<div class="main-content">

 <h1>Order List of <?=$_SESSION['hub']?></h1>
<div class="order-container">


<?php

if($_SESSION['hub']=='hub1') {
foreach($orders as $order) {
  if($order!=null){
  if($order[4]==1 && $order[5]=='a') {
    displayOrders($order[0]);
    $count=1;
  }
}
}
}

if($_SESSION['hub']=='hub2') {
  foreach($orders as $order) {
    if($order!=null){
    if($order[4]==2 && $order[5]=='a') {
      displayOrders($order[0]);
    }
  }
  }
}

if($_SESSION['hub']=='hub3') {
  foreach($orders as $order) {
    if($order!=null){
    if($order[4]==3 && $order[5]=='a') {
      displayOrders($order[0]);
    }
  }
  }
}

echo "</div>";
echo "</div>";



}

else header('location:index.php');

}

else header('location:index.php');
 ?>
















 <?php
 // Footer
 include_once 'footer.php';
 ?>
