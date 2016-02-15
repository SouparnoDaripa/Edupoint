<?php 
  include('php_includes/header.php');
  include('php_includes/signup.php');
  include('php_includes/nav-header.php');
?>
<body>
 <div id="main-container">
<div class="container">
  <div class="row form-box">
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <div class="box registration well">
          <div class="description text-center">
            Register       
          </div>
          <div class="form-status alert alert-danger" id="form-status" style="display:none;">
            <span id="status"></span>
          </div>
          <!-- <div class="form-status" id="form-status"><span id="status"></span></div> -->
          <form name="signupform" id="signupform" onsubmit="return false;">
            <div class="form-group label-floating">
              <label for="fname" class="control-label">First Name</label>
              <input type="text" class="form-control" onfocus="clearBox('form-status','status')" id="fname" max-length="20">
            </div>
            <div class="form-group label-floating">
              <label for="lname" class="control-label">Last Name</label>
              <input type="text" class="form-control" onfocus="clearBox('form-status','status')" id="lname" max-length="20">
            </div>
            <div class="form-group label-floating">
              <label for="email" class="control-label">Email</label>
              <input type="email" class="form-control" onfocus="clearBox('form-status','status')" id="email" max-length="100">
            </div>
            <div class="form-group label-floating">
                <label for="pass" class="control-label">Password</label>
                <input type="password" class="form-control" onfocus="clearBox('form-status','status')" id="pass" max-length="20">
            </div>  
            <div class="form-group label-floating">
                <label for="cpass" class="control-label">Confirm Password</label>
                <input type="password" class="form-control" onfocus="clearBox('form-status','status')" id="cpass" max-length="20">
            </div> 
            <div class="form-group">    
            <p style="font-size:0.85rem; color:#b9b9b9;">By signing up, I agree to Tutspoint's <a class="trms-cond" href="terms_condition.php">Terms and Condition</a>.</p>
            <button id="signupbtn" onclick="signup()" class="btn btn-register btn-warning btn-raised btn-lg btn-block">Create an Account</button>
            </div>
      <div class="login-end">
      <p>Have an account? <a href="login.php">Log in</a></p>
      </div>
      </form>
         </div>
        </div>
      </div>
    </div>
    </div>
<?php include('footer.php'); ?>

