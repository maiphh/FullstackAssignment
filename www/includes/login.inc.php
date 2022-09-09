<?php
if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $users = readUsers();

  if (emptyInput($username) !== false) {
    header('location:../login.php?error=emptyUsername');
    exit();
  }

  if (emptyInput($pwd) !== false) {
    header('location:../login.php?error=emptyPassword');
    exit();
  }

  if (usernameExist($username) === false) {
    header('location:../login.php?error=usernameNotExisted');
    exit();
  }

  foreach ($users as $user) {

    $checkPwd = password_verify($pwd, $user[2]);
    if ($user[1] == $username && $checkPwd) {
      session_start();
      $_SESSION = array();
      $_SESSION['ID'] = $user[0];
      $_SESSION['username'] = $username;
      $_SESSION['pwd'] = $user[2];
      $_SESSION['profilepic'] = $user[3];
      $_SESSION['address'] = $user[4];
      $_SESSION['bname'] = $user[5];
      $_SESSION['baddress'] = $user[6];
      $_SESSION['hub'] = $user[7];
      $_SESSION['type'] = $user[8];
      $_SESSION['justlogin'] = true;
      $_SESSION['cart'] = [];
      header('location:../index.php');
      exit();
    }
  }

  header('location:../login.php?error=wrongLogin');
  exit();
} else {
  header('location:../login.php');
  exit();
}
