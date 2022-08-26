<?php
include_once 'header.php'
 ?>


 <form action="includes/login.inc.php" method="post">
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Username</label>
     <input type="text" name="username">
   </div>
   <div class="mb-3">
     <label for="exampleInputPassword1" class="form-label">Password</label>
     <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 </form>
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
