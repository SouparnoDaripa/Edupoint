<?php
	session_start();
// session data to an empty array
	$_SESSION = array();
// expire the cookies
	if(isset($_COOKIE["uid"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
		setcookie("uid", "", strtotime('-5 days'), "/");
		setcookie("user", "", strtotime('-5 days'), "/");
		setcookie("pass", "", strtotime('-5 days'), "/");
	}
// Destroy session variables
	session_destroy();
    if(isset($_SESSION['username'])){
    	header("location: message.php?msg=Error:_Login_Failed");
    }else{
    	header("location: index.php");
    	exit();
    }
?>