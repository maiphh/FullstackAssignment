<?php
include_once 'header.php';

?>

<div class="signup-container">

<div class="form-container">
<script src="validate.js"></script>
<form action="includes/signup.inc.php" method="post" enctype="multipart/form-data" id="signup-form"  onsubmit="return checkS()">

<?php


 include_once 'signupform.php';
 ?>



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
