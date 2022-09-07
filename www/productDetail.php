<?php
include_once 'header.php';
 ?>
<div class="product-detail-container">
<h1>Product Detail</h1>

<div class="product-detail">

  <div class="product-detail-img">
    <img src="<?=$_GET['image']?>" alt="">
  </div>

  <div class="product-detail-text">
    <h2>Name: </h2> <p> <?=$_GET['name']?></p> <br>
    <h2>Price: </h2> <p> <?=$_GET['price']?>$</p><br>
    <h2>Description: </h2> <p><?=$_GET['des']?></p>
  </div>
</div>

<?php
if (isset($_SESSION['type'])) {
  if($_SESSION['type']!=='V') {
    echo '<button type="button" name="addtocart">Add to Cart</button>';
  }
}
else {
  echo '<button type="button" name="addtocart">Add to Cart</button>';
}
 ?>
</div>
