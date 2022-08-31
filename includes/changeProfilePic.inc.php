<?php
session_start();
if(isset($_POST['change'])) {
  if(is_uploaded_file($_FILES['newprofilepic']['tmp_name'])) {
    $profilepic = $_FILES['newprofilepic'];
    require_once 'functions.inc.php';
    $users = readUsers();
    $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','w');
    foreach($users as $user) {
      if(isset($user[1])){
      if($user[1]==$_SESSION['username']) {
        $user[3] = uploadImage($profilepic,$user[0]);
        $_SESSION['profilepic']= $user[3];
        fputcsv($handle, $user);
      }
      else {
        fputcsv($handle, (array)$user);
      }
    }
    }
      fclose($handle);
      header('location: ../myAccount.php');
      exit();
  }
  else {
    header('location:../myAccount.php?error=noimageselect');
    exit();
  }
}
else {
  header('location: ../myAccount.php');
  exit();
}
