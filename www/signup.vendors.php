<?php
include_once 'header.php';

 ?>

 <div class="signup-container">

 <div class="form-container vendor-container">

 <form action="includes/signup.inc.php" method="post" enctype="multipart/form-data">
   <div class="signupinput">
     <input type="text"  name="username" placeholder="Username">
   </div>
   <div class="signupinput">
     <input type="password"  name="pwd" placeholder="Password">
   </div>
   <div class="signupinput">
     <input type="password" name="pwdrp" placeholder="Reapeat Password">
   </div>
   <div class="input-group mb-3" >
     <input type="file" class="form-control" id="inputGroupFile02" name='profilepic'>
   </div>

 <div class="signupinput">
   <input type="text"  name="bname" placeholder="Bussiness Name">
 </div>
 <div class="signupinput">
   <input type="text"  name="baddress" placeholder="Bussiness Address">
 </div>
 <?php
 require_once 'signupcheck.php';
  ?>
 <div class="signup signup-shipper">

  <button type="submit" name="vendorsubmit">Create New Account</button>
  </div>
</form>
<div class="signin">
  <a href="login.php">Sign in</a>
</div>
