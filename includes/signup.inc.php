<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST["customersubmit"])) {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp= $_POST['pwdrp'];
  $address = $_POST['address'];

  if(invalidUsername($username)!==false) {
    header("location:../signup.customers.php?error=invalidUsername");
    exit();
  }

  if(invalidPassword($pwd)!==false) {
    header("location:../signup.customers.php?error=invalidPassword");
    exit();
  }

  if(pwdMatch($pwd,$pwdrp)!==false) {
    header("location:../signup.customers.php?error=passwordDontMatch");
    exit();
  }

  if(invalidInput($address)!==false) {
    header("location:../signup.customers.php?error=invalidAddress");
    exit();
  }

  createCustomer($username,$pwd,$address);
}

else if(isset($_POST["vendorsubmit"])) {
  $name = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp= $_POST['pwdrp'];
  $bname = $_POST['bname'];
  $baddress = $_POST['baddress'];

  if(invalidUsername($username)!==false) {
    header("location:../signup.vendors.php?error=invalidUsername");
    exit();
  }

  if(invalidPassword($pwd)!==false) {
    header("location:../signup.vendors.php?error=invalidPassword");
    exit();
  }

  if(pwdMatch($pwd,$pwdrp)!==false) {
    header("location:../signup.customers.php?error=passwordDontMatch");
    exit();
  }

  if(invalidInput($bname)!==false) {
    header("location:../signup.customers.php?error=invalidBussinessName");
    exit();
  }

  if(invalidInput($baddress)!==false) {
    header("location:../signup.customers.php?error=invalidBussinessAddress");
    exit();
  }
}

else if(isset($_POST["shippersubmit"])) {
  $name = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp= $_POST['pwdrp'];
  $hub = $_POST['hub'];

  if(invalidUsername($username)!==false) {
    header("location:../signup.shippers.php?error=invalidUsername");
    exit();
  }

  if(invalidPassword($pwd)!==false) {
    header("location:../signup.shippers.php?error=invalidPassword");
    exit();
  }

  if(pwdMatch($pwd,$pwdrp)!==false) {
    header("location:../signup.customers.php?error=passwordDontMatch");
    exit();
  }
}

else {
  header("location: ../signup.php");
  exit();
}
