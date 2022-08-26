<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <?php
            if(isset($_SESSION['type'])) {
              if($_SESSION['type']=='C'){
                echo '<a class="nav-link" href="myAccount.php">My Account</a>';
                echo '<a class="nav-link" href="includes/logout.inc.php">Logout</a>';
              }
              elseif($_SESSION['type']=='V'){
                echo '<a class="nav-link" href="viewProduct.php">View My Product</a>';
                echo '<a class="nav-link" href="addProduct.php">Add Product</a>';
                echo '<a class="nav-link" href="myAccount.php">My Account</a>';
                echo '<a class="nav-link" href="includes/logout.inc.php">Logout</a>';
              }
              elseif($_SESSION['type']=='S'){
                echo '<a class="nav-link" href="myAccount.php">My Account</a>';
                echo '<a class="nav-link" href="includes/logout.inc.php">Logout</a>';
              }
            }
            else {
              echo '<a class="nav-link" href="login.php">Login</a>';
              echo '<a class="nav-link" href="signup.php">Signup</a>';
            }
             ?>
          </div>
        </div>
      </div>
    </nav>
