<?php
 	if(isset($_POST['uid']) && isset($_POST['sid']) && isset($_POST['cno'])){
 		$uid= $_POST['uid'];
 		$sid= $_POST['sid'];
 		$cno= $_POST['cno'];
 		$sql="INSERT into review (sub_id, chap_no, user_id, saved_dt) values ('$sub_id', '$chap_no', '$user_id', now())";
    	$result= mysqli_query($db_conx, $sql);
 	}else{
 		echo "failed";
 	}
 ?>