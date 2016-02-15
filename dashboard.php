<?php
  include_once('php_includes/check_login_status.php');
  if($user_ok == true){
	     include_once('php_includes/header.php');
  		 include_once('php_includes/nav-head.php');
  }
  else{
	    header("location: index.php");
  }
?>
<div id="main-container">
	<div class="container dashboard">
		<?php
            $query= "SELECT st_id from savedtopics WHERE user_id = '$log_id' LIMIT 1";
            $result= mysqli_query($db_conx, $query);
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) <1){
                include_once('noresults.php');
            }
             // while($row= mysqli_fetch_array($result)){
             //            echo '<div class="col-md-4 col-sm-6 col-xs-12">
             //                <div class="well subject-box text-center">
             //                    <h4><a href="chapter.php?sub_id='.$row[0].'">'.$row[3].'</a></h4>
             //                </div>
             //            </div>';
             // }
        ?>
	</div>
</div>

<?php
  include('footer.php');
?>