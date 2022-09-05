<?php
include_once 'header.php';
require_once 'signupform.php';
 ?>
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


 <div class="input-group mb-3 hubselect">
<label class="input-group-text hublabel" for="inputGroupSelect01">Distribution Hubs</label>
<select class="form-select" id="inputGroupSelect01" name='hub'>
  <option value="hub1">Hub 1</option>
  <option value="hub2">Hub 2</option>
  <option value="hub3">Hub 3</option>
</select>
</div>
<?php
require_once 'signupcheck.php';
 ?>
<div class="signup signup-shipper">

 <button type="submit" name="shippersubmit">Create New Account</button>
 </div>
</form>
<div class="signin">
  <a href="login.php">Sign in</a>
</div>
 </div>
 </div>
<script src="validate.js"></script>
