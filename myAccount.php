<?php
require_once 'header.php';
?>

<div class="myAccount-container">

<div class="myAccount-form-container">
  <div class="ma-profilepic">
    <img src="<?=$_SESSION['profilepic']?>" alt="">
    <div class="ma-username">
      <p><?=$_SESSION['username']?></p>
    </div>
    <form action="includes/changeProfilePic.inc.php" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3" >
        <input type="file" class="form-control" id="inputGroupFile02" name='newprofilepic'>
        <button type="submit" class="btn btn-primary" name="change">Change</button>
      </div>

    </form>
  </div>

<?php
echo '<div class="ma-info">';
if($_SESSION['type']=='C') {
    echo '<span>Account Type: </span><p>Customer</p>';
echo '<div>';
 echo '<span>Address: </span><p>'. $_SESSION['address'].'</p>';
echo '</div>';
}
elseif($_SESSION['type']=='V') {
  echo '<span>Account Type: </span><p>Vendor</p>';
  echo '<div>';
 echo '<span>Bussiness name: </span><p>'. $_SESSION['bname'].'</p>';
 echo '</div>';
 echo '<div>';
 echo '<span>Bussiness address: </span><p>'.$_SESSION['baddress'].'</p>';
 echo '</div>';
}
else {
    echo '<span>Account Type: </span><p>Shipper</p>';
    echo '<div>';
 echo '<span>Hub: </span><p>'.$_SESSION['hub'].'</p>';
 echo '</div>';
}
echo '<div>';

?>
</div>
</div>




<!-- <form action="includes/changeProfilePic.inc.php" method="post" enctype="multipart/form-data">
  <div class="input-group">
    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="newprofilepic">
    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="change">Button</button>
  </div>
</form> -->
