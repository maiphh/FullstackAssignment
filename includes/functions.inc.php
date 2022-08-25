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

function usernameExist($username) {
  $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','r');
  while(!feof($handle)) {
    $line = fgetcsv($handle);
    if(is_array($line)){
    if($line[1]==$username) {
      return true;
    }
  }
}
return false;
}

function uploadImage($profilepic,$id) {
  $name = explode('.',$profilepic['name']);
  $extension = end($name);
  $profilepicName = strval($id).'.'.$extension;
  $profilepicLink = 'C:\xampp\htdocs\Fullstack\database\images\\'.$profilepicName;
  move_uploaded_file($profilepic['tmp_name'],$profilepicLink);
  return $profilepicLink;
}

function createCustomer($id,$username,$pwd,$profilepic,$address) {
  $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','a');

  $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);

  if(empty($profilepic['name'])) {
    $profilepicLink = 'C:\xampp\htdocs\Fullstack\database\images\default.png';
  }
  else {
    $profilepicLink = uploadImage($profilepic,$id);
  }

  $new_user = array($id,$username,$hashpwd,$profilepicLink,$address,null,null,null,'C');
    fputcsv($handle, $new_user);
  }

function createVendor($id,$username,$pwd,$profilepic,$bname,$baddress) {
    $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','a');

    $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);

    if(empty($profilepic['name'])) {
      $profilepicLink = 'C:\xampp\htdocs\Fullstack\database\images\default.png';
    }
    else {
      $profilepicLink = uploadImage($profilepic,$id);
    }

    $new_user = array($id,$username,$hashpwd,$profilepicLink,null,$bname,$baddress,null,'V');
      fputcsv($handle, $new_user);
    }


function createShipper($id,$username,$pwd,$profilepic,$hub) {
        $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','a');

        $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);

        if(empty($profilepic['name'])) {
          $profilepicLink = 'C:\xampp\htdocs\Fullstack\database\images\default.png';
        }
        else {
          $profilepicLink = uploadImage($profilepic,$id);
        }

        $new_user = array($id,$username,$hashpwd,$profilepicLink,null,null,null,$hub,'S');
          fputcsv($handle, $new_user);
        }

function readUsers() {
  $users=[];
  $handle = fopen('C:\xampp\htdocs\Fullstack\database\accounts.db','r');
  while(!feof($handle)) {
    $user = fgetcsv($handle);
    $users[] = $user;
  }
  return $users;
}
