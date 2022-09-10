<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$users = get_list_from_file('..\..\database\accounts.db');
$id = count($users) - 1;


if (isset($_POST["customersubmit"])) {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp = $_POST['pwdrp'];
  $address = $_POST['address'];
  $profilepic = $_FILES['profilepic'];

  if (invalidUsername($username) !== false) {
    header("location:../signup.customers.php?error=invalidUsername");
    exit();
  }

  if (invalidPassword($pwd) !== false) {
    header("location:../signup.customers.php?error=invalidPassword");
    exit();
  }

  if (pwdMatch($pwd, $pwdrp) !== false) {
    header("location:../signup.customers.php?error=passwordDontMatch");
    exit();
  }

  if (invalidInput($address) !== false) {
    header("location:../signup.customers.php?error=invalidAddress");
    exit();
  }

  if (usernameExist($username) !== false) {
    header("location:../signup.customers.php?error=usernameExisted");
    exit();
  }

  createCustomer($id, $username, $pwd, $profilepic, $address);
  header('Location: ../login.php');
} elseif (isset($_POST["vendorsubmit"])) {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp = $_POST['pwdrp'];
  $bname = $_POST['bname'];
  $baddress = $_POST['baddress'];
  $profilepic = $_FILES['profilepic'];

  if (invalidUsername($username) !== false) {
    header("location:../signup.vendors.php?error=invalidUsername");
    exit();
  }

  if (invalidPassword($pwd) !== false) {
    header("location:../signup.vendors.php?error=invalidPassword");
    exit();
  }

  if (pwdMatch($pwd, $pwdrp) !== false) {
    header("location:../signup.vendors.php?error=passwordDontMatch");
    exit();
  }

  if (invalidInput($bname) !== false) {
    header("location:../signup.vendors.php?error=invalidBussinessName");
    exit();
  }

  if (invalidInput($baddress) !== false) {
    header("location:../signup.vendors.php?error=invalidBussinessAddress");
    exit();
  }

  if (usernameExist($username) !== false) {
    header("location:../signup.vendors.php?error=usernameExisted");
    exit();
  }

  if (bnameExist($bname) !== false) {
    header("location:../signup.vendors.php?error=bnameExisted");
    exit();
  }

  if (baddressExist($baddress) !== false) {
    header("location:../signup.vendors.php?error=baddressExisted");
    exit();
  }

  createVendor($id, $username, $pwd, $profilepic, $bname, $baddress);
  header('Location: ../login.php');
} elseif (isset($_POST["shippersubmit"])) {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $pwdrp = $_POST['pwdrp'];
  $hub = $_POST['hub'];
  $profilepic = $_FILES['profilepic'];

  if (invalidUsername($username) !== false) {
    header("location:../signup.shippers.php?error=invalidUsername");
    exit();
  }

  if (invalidPassword($pwd) !== false) {
    header("location:../signup.shippers.php?error=invalidPassword");
    exit();
  }

  if (pwdMatch($pwd, $pwdrp) !== false) {
    header("location:../signup.shippers.php?error=passwordDontMatch");
    exit();
  }

  if (usernameExist($username) !== false) {
    header("location:../signup.shippers.php?error=usernameExisted");
    exit();
  }

  createShipper($id, $username, $pwd, $profilepic, $hub);
  header('Location: ../login.php');
} else {
  header("location: ../signup.php");
  exit();
}
