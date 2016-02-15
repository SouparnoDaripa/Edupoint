<?php
	session_start();
// session data to an empty array
	$_SESSION = array();
// Destroy session variables
	session_destroy();
    if(isset($_SESSION['username'])){
    	header("location: message.php?msg=Error: Login_Failed");
    }else{
    	header("location: admin_login.php");
    	exit();
    }
?>