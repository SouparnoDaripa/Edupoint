<?php
  include('php_includes/header.php');
  include('php_includes/login.php');
  include('php_includes/nav-header.php');
?>

<body>
 <div id="main-container">
<div class="container">
<div class="row form-box">
	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-xs-12">
		<div class="page-login-form well">
			<div class="description text-center">
				Login				
			</div>
			<div class="login-status alert alert-danger" id="login-status" style="display:none;">
			  <span id="status"></span>
			</div>
			<!-- <div class="login-status"><span id="status"></span></div> -->
			<form id="loginform" onsubmit="return false;">
				<div class="form-group label-floating">
			      <label for="email" class="control-label">Email</label>
			      <input type="email" class="form-control" onfocus="clearBox('login-status','status')" id="email" max-length="100">
			    </div>
				<div class="form-group label-floating">
			      <label for="password" class="control-label">Password</label>
			      <input type="password" class="form-control" onfocus="clearBox('login-status','status')" id="password" max-length="100">
			    </div>	
				<div class="checkbox">
					<label>
						<input id="remember" type="checkbox" name="remember" checked>
						Remember me	
					</label>
				</div>
				<div class="form-group">
				<div class="form-links">
					<a href="#" class="forgot-pass">Forgot Password?</a>
				</div>
				<button id="loginbtn" onclick="login()" class="btn btn-warning btn-raised btn-lg btn-block btn-login">
					Log in</button>
				</div>
			</form>
			<div class="form-links">
				<p>Don't you have an account? <a href="signup.php">Sign Up</a></p>
		    </div>
		</div>

	</div>
</div>
</div>
 <div id="main-container">
<?php include('footer.php'); ?>