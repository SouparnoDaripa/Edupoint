<?php
  include('header.php');
  session_start();
  if(isset($_POST["e"])){
		include_once('../php_includes/db_con.php');
		$e = mysqli_real_escape_string($db_conx, $_POST['e']);//user email id
		$p = $_POST["p"];//password
		$p_hash = md5($p);
		if($e == "" || $p_hash == ""){
			echo "login_failed";
			exit();
		}else{
			$sql = "SELECT id, password from admin where email = '".$e."' LIMIT 1";
		    $query = mysqli_query($db_conx, $sql);
		    $row = mysqli_fetch_row($query);
		    $admin_id = $row[0];
		    $admin = $e;
		    $adminpass = $row[1];
		    if($p_hash != $adminpass){
		    	echo "login_failed";
		    	exit();
		    }else{		    	
		    	//create sessions
		    	$_SESSION['adminid'] = $admin_id;
		    	$_SESSION['admin'] = $admin;
		    	$_SESSION['adminpass'] = $adminpass;
		    	exit();
		    }
		}
	}
?>
<script>
function login(){
  var e = _("email").value;
  var p = _("password").value;
  if(e == "" || p == ""){
    var url = "admin_login.php";
    window.location = url;
  } else{
      var ajax = ajaxObj("POST", "admin_login.php");
      ajax.onreadystatechange = function(){
        if(ajaxReturn(ajax) == true){
          //console.log(ajax.responseText);
          if((ajax.responseText).trim() == "login_failed"){
              var url = "admin_login.php";
              window.location = url;
          }
        }else{
           //_("loginform").innerHTML = ajax.responseText;
           var url = "admin-dashboard.php";
           window.location = url;
        }
      }
      ajax.send("e="+e+"&p="+p);
  }
}
</script>
<body>
<div class="container">
<div class="row form-box">
	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-xs-12">
		<div class="page-login-form well">
			<div class="description text-center">
				Login				
			</div>
			<div class="login-status"><span id="status"></span></div>
			<form id="loginform" onsubmit="return false;">
				<div class="form-group label-floating">
			      <label for="email" class="control-label">Email</label>
			      <input type="email" class="form-control" id="email" max-length="100">
			    </div>
				<div class="form-group label-floating">
			      <label for="password" class="control-label">Password</label>
			      <input type="password" class="form-control" id="password" max-length="100">
			    </div>	
				<button id="loginbtn" onclick="login()" class="btn btn-warning btn-raised btn-lg btn-block btn-login">
					Log in</button>
			</form>
		</div>
	</div>
</div>
</div>
<?php include('footer.php'); ?>