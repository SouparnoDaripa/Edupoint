<?php
	session_start();
	if(isset($_SESSION["username"])){
		header("location: index.php");
		exit();
	}
?>
<?php
	if(isset($_POST["e"])){
		include_once('db_con.php');
		$e = mysqli_real_escape_string($db_conx, $_POST['e']);//user email id
		$p = $_POST["p"];//password
		$p_hash = md5($p);
		$ckb = $_POST["ckb"];//check box
		$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
		if($e == "" || $p_hash == ""){
			echo "login_failed";
			exit();
		}else{
			$sql = "SELECT id, username, password from users where email = '".$e."' LIMIT 1";
		    $query = mysqli_query($db_conx, $sql);
		    $row = mysqli_fetch_row($query);
		    $db_uid = $row[0];
		    $db_username = $row[1];
		    $db_pass_str = $row[2];
		    $db_user = str_replace(" ", "_", $db_username);
		    if($p_hash != $db_pass_str){
		    	echo "login_failed";
		    	exit();
		    }else{		    	
		    	//create sessions and cookies
		    	$_SESSION['userid'] = $db_uid;
		    	$_SESSION['username'] = $db_user;
		    	$_SESSION['password'] = $db_pass_str;
		    	if($ckb == true){
		    		setcookie("bid", $db_uid, strtotime('+30 days'), "/" , "", "", TRUE);
		    		setcookie("user", $db_user, strtotime('+30 days'), "/" , "", "", TRUE);
		    		setcookie("pass", $db_pass_str, strtotime('+30 days'), "/" , "", "", TRUE);
		    	}
		    	// update ip field
		    	$sql = "UPDATE users SET ip='$ip' where username = '$db_username' LIMIT 1";
		    	$query= mysqli_query($db_conx, $sql);
		    	echo "success";
		    	exit();
		    }
		}
		exit();
    }
?> 