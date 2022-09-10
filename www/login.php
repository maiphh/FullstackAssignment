<?php
include_once 'header.php';
 ?>

<div class="signin-container">
<div class="form-container">

<h1>Logo.</h1>
 <form action="includes/login.inc.php" method="post">
   <div class="login">
     <input type="text" name="username" placeholder="Username">
   </div>
   <div class="login">
     <input type="password" class="" name="pwd" placeholder="Password">
   </div>
   <div class="submit-container">

  <span><a href="commingSoon.php">Forgotten password?</a></span>
   <button type="submit" class="" name="submit">Sign in</button>

 </div>
 <?php
  if(isset($_GET['error'])) {
    echo '<div class="error">';
    if($_GET['error']=='emptyUsername') {
      echo '<p>Please enter your username</p>';
    }

    if($_GET['error']=='emptyPassword') {
      echo '<p>Please enter your password</p>';
    }

    if($_GET['error']=='usernameNotExisted') {
      echo '<p>Username does not exist</p>';
    }

    if($_GET['error']=='wrongLogin') {
      echo '<p>Wrong username or password</p>';
    }
    echo '</div>';
  }
 ?>

 </form>

 <div class="signup">
   <a href="signup.php">Create New Account</a>

 </div>
</div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
