
<?php
include_once 'header.php';
 ?>

<div class="contact">

<h1>Contact Us</h1>

<form class="contat-form" action="index.html" method="post" enctype="multipart/form-data">
  <div class="input-purpose">
    <label for="purpose">Account Type</label>
    <select id="purpose" name="purpose" class="inputfield">
      <option value="sell">Customer</option>
      <option value="buy">Vendor</option>
      <option value="buy">Shipper</option>
    </select>

  </div>

  <div class="input-name">
    <label for="fullname">Full Name: </label>
    <input type="text" name="name" value="" id="fullname" class="inputfield" required>
  </div>

  <div class="input-email">
    <label for="email">Email: </label>
    <input type="email" name="email" value="" id="email" class="inputfield" required>
  </div>

  <div class="input-phone">
    <label for="phone">Phone Number: </label>
    <input type="tel" name="phone" value="" id="phone" class="inputfield" required>
  </div>

  <div class="input-contact-way">
    <p>How Can We Contact You:</p>
    <div class="">

    </div>
    <input type="checkbox" name="By email" value="By email" id="byemail">
    <label for="byemail" class="checkbox-input">By Email</label>

    <input type="checkbox" name="By Phone" value="By Phone" id="byphone">
    <label for="byphone" class="checkbox-input">By Phone</label>
  </div>

  <div class="recieve-newsletter">
    <p>Do you want to receive our weekly newsletter:</p>
    <input type="radio" name="newsletter" value="yes" id="yes" checked>
    <label for="yes" class="radio-input">Yes</label>
    <input type="radio" name="newsletter" value="no" id="no">
    <label for="no" class="radio-input">No</label>

  </div>

  <div class="input-note">
    <label for="note">Note: </label>
<div class="note-area">
  <textarea id="note" name="note" rows="8" cols="80"></textarea>
</div>

  </div>

<div class="input-button">

  <div class="input-submit">
    <input type="submit" name="submit" value="Submit" class="btn" id="submit-btn">

  </div>

  <div class="input-reset">
    <input type="reset" name="reset" value="Reset" class="btn" id="reset-btn">
  </div>
</div>



</form>

</div>



<?php
// Footer
include_once 'footer.php';
?>
