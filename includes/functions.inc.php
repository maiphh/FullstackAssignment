<?php

function invalidUsername($username) {
  $result;
  if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/",$username)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function invalidPassword($pwd) {
  $result;
  if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/",$pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidInput($input) {
  $result;
  if(strlen(trim($input))<5) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd,$pwdrp) {
  $result;
  if($pwd !== $pwdrp) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;

}

function createCustomer($username,$pwd,$address) {
  $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db.txt','a');

  $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);

  $line = [$username,$hashpwd,$address,null,null,null];
  fputcsv($handle,$line);
  fclose($handle);
}

function reading2() {
  $handle = fopen('accounts.db.txt','r');
  while(!feof($handle)) {
    $line = fgetcsv($handle);
    print_r($line);
  }
}
