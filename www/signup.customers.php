<?php
include_once 'header.php';

?>

<div class="signup-container">

<div class="form-container">
<script src="validate.js"></script>
<form action="includes/signup.inc.php" method="post" enctype="multipart/form-data" id="signup-form"  onsubmit="return checkC()">

<?php


 include_once 'signupform.php';
 ?>

 <div class="signupinput">
   <input type="text"  name="address" placeholder="Address">
   <?php
   require_once 'signupcheck.php';
    ?>
   <div class="signup signup-shipper">
    <button type="submit" name="customersubmit">Create New Account</button>
    </div>
  </form>
  <div class="signin">
    <a href="login.php">Sign in</a>
  </div>
<script src="validate.js"></script>
