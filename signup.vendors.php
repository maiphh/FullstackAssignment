<?php
include_once 'header.php';
 include_once 'signupform.php';
 ?>
 <div class="mb-3">
   <label for="exampleInputEmail1" class="form-label">Bussiness name</label>
   <input type="text"  name="bname">
 </div>
 <div class="mb-3">
   <label for="exampleInputEmail1" class="form-label">Bussiness address</label>
   <input type="text"  name="baddress">
 </div>
 <button type="submit" class="btn btn-primary" name="vendorsubmit">Submit</button>
</form>

<?php
require_once 'signupcheck.php';
 ?>
