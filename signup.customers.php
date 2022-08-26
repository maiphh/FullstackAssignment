<?php
include_once 'header.php';
 include_once 'signupform.php';
 ?>

 <div class="mb-3">
   <label for="exampleInputEmail1" class="form-label">address</label>
   <input type="text"  name="address">
 </div>
 <button type="submit" class="btn btn-primary" name="customersubmit">Submit</button>
</form>

<?php
require_once 'signupcheck.php';
 ?>
