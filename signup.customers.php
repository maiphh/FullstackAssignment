<?php
include_once 'header.php';
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
