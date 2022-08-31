<?php
require_once 'header.php';

 echo '<p>Username: '.$_SESSION['username'].'</p>';
 echo '<div>';
 // echo 'Profile pic: <img src=\''.$_SESSION['profilepic'].'\' alt="" width="42" height="42">';
 echo 'Profile pic: <img src=\''.$_SESSION['profilepic'].'\' alt="" width="42" height="42">';
?>
  <form action="includes/changeProfilePic.inc.php" method="post" enctype="multipart/form-data">
    <input type="file" name="newprofilepic" value="">
    <button type="submit" class="btn btn-primary" name="change">Submit</button>
  </form>

  <?php
 echo '</div>';
 if($_SESSION['type']=='C') {
   echo '<p>Address: '. $_SESSION['address'].'</p>';
 }
 elseif($_SESSION['type']=='V') {
   echo '<p>Bussiness name: '. $_SESSION['bname'].'</p>';
   echo '<p>Bussiness address: '.$_SESSION['baddress'].'</p>';
 }
 else {
   echo '<p>Hub: '.$_SESSION['hub'].'</p>';
 }
