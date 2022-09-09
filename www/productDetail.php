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
<div class="quantity-input">
        <input type="number" name="quantity" value="1" placeholder="1" id = "quantity<?=$_GET["pID"]?>">
        <input type="hidden" name="pID" value="$pID">
</div>
<?php
if (isset($_SESSION['type'])) {
  if($_SESSION['type']!=='V') {
    echo <<<HEREDOC
    <button onclick = "addToCart({$_GET["pID"]},{$_GET["ID"]},'{$_GET['name']}',{$_GET['price']},'{$_GET['image']}','{$_GET['des']}',getQuantity({$_GET["pID"]}))">Add to Cart </button>
HEREDOC;
  }
}
else {
  echo '<button type="button" name="addtocart">Add to Cart</button>';
}
 ?>

 <script src="cartfunction.js"></script>
