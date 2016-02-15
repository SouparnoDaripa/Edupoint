<?php
	session_start();
	include_once("db_con.php");

	$user_ok = false;
	$log_id = "";
	$log_username = "";
	$log_password = "";
// user verification function
	function evalLoggedUser($conn, $id, $u, $p){
		$u = str_replace("_", " ", $u);
		$sql = "SELECT * from users where id ='$id' AND username= '$u' AND password= '$p' AND activated = '1' LIMIT 1";
		$query = mysqli_query($conn, $sql);
		$numrows = mysqli_num_rows($query);
		if($numrows > 0){
			return true;
		}
	}
	if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])){
		$log_id= preg_replace('#[^0-9]#i', '', $_SESSION["userid"]);
		$log_username= preg_replace('#[^a-z0-9_]#i', '', $_SESSION["username"]);
		$log_password= preg_replace('#[^a-z0-9]#i', '', $_SESSION["password"]); 
		// verify user
		$user_ok = evalLoggedUser($db_conx, $log_id, $log_username, $log_password);
	}
	if(isset($_COOKIE["uid"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
		$_SESSION["userid"]= preg_replace('#[^0-9]#i', '', $_COOKIE["uid"]);
		$_SESSION["username"]= preg_replace('#[^a-z0-9_]#i', '', $_COOKIE["user"]);
		$_SESSION["password"]= preg_replace('#[^a-z0-9]#i', '', $_COOKIE["pass"]); 
		$log_id = $_SESSION["userid"];
		$log_username =$_SESSION["username"];
		$log_password =$_SESSION["password"];
		// verify user
		$user_ok = evalLoggedUser($db_conx, $log_id, $log_username, $log_password);
	}
?>