<?php 
//SetupFile: 

#Database Connection here...

$db_conx = mysqli_connect('localhost', 'root', '', 'tutspoint_db')  OR die('Couldnot connect because : '.mysqli_connect_error());
if(mysqli_connect_errno()){
	echo mysqli_connect_error();
	exit();
}

?>