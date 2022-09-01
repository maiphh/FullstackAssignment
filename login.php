<?php
include_once 'header.php';
 ?>

<div class="signin-container">
<div class="form-container">

 <form action="includes/login.inc.php" method="post">
   <div>
     <input type="text" name="username" placeholder="Username">
   </div>
   <div>
     <input type="password" class="" name="pwd" placeholder="Password">
   </div>
   <button type="submit" class="" name="submit">Submit</button>
 </form>
</div>
</div>
<?php
 if(isset($_GET['error'])) {
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
 }





?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
