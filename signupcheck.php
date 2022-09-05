<?php
if(isset($_GET['error'])) {
  echo '<div class="error">';
  if($_GET['error']=='invalidUsername') {
    echo '<p>Username must contains only letters (lower and upper case) and digits, has a length from 8 to 15 characters</p>';
  }

  if($_GET['error']=='invalidPassword') {
    echo '<p>Password must contains at least one upper case letter, one lower case letter, one digit, one special letter in the set !@#$%^&*, NO other kind of characters, from 8 to 20 characters</p>';
  }

  if($_GET['error']=='passwordDontMatch') {
    echo '<p>Password does not match</p>';
  }

  if($_GET['error']=='usernameExisted') {
    echo '<p>Username already taken</p>';
  }

  if($_GET['error']=='invalidAddress') {
    echo '<p>Address must contains at least 5 characters</p>';
  }

  if($_GET['error']=='invalidBussinessName') {
    echo '<p>Bussiness Name must contains at least 5 characters</p>';
  }

  if($_GET['error']=='invalidBussinessAddress') {
    echo '<p>Bussiness Address must contains at least 5 characters</p>';
  }

  if($_GET['error']=='bnameExisted') {
    echo '<p>Bussiness Name already exist</p>';
  }

  if($_GET['error']=='baddressExisted') {
    echo '<p>Bussiness Address already exist</p>';
  }
  echo '</div>';
}


 ?>