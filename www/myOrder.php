<?php
include_once 'header.php';
if($_SESSION['type']=='C') {
$orders = get_list_from_file('..\database\orders.db');
?>


<div class="main-content">

 <h1>My Order</h1>
<div class="order-container">

<?php
foreach($orders as $order) {
  if($order!=null) {
  if($order[1]==$_SESSION['ID']) {
    if($order[5]=='a') {
      $status = 'Active';
    }
    elseif ($order[5]=='c') {
      $status = 'Canceled';
    }
    else {
      $status = 'Delivered';
    }
    displayMyOrder($order[0],$status);
  }
}
}



}
else {
  header('location:index.php');
}

echo '</div>';
echo '</div>';
// Footer
include_once 'footer.php';
?>
