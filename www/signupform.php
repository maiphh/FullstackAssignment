<div class="signup-container">

<div class="form-container">
<script src="validate.js"></script>
<form action="includes/signup.inc.php" method="post" enctype="multipart/form-data" id="signup-form"  onsubmit="return check()">
  <div class="signupinput">
    <input type="text"  name="username" placeholder="Username" id="username">
  </div>
  <div class="signupinput">
    <input type="password"  name="pwd" placeholder="Password" id="pwd">
  </div>
  <div class="signupinput">
    <input type="password" name="pwdrp" placeholder="Repeat Password" id="pwdrp">
  </div>
  <div class="input-group mb-3" >
    <input type="file" class="form-control" id="inputGroupFile02" name='profilepic'>
  </div>
