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
<?php
	$query= "SELECT * from users where id = '$log_id' LIMIT 1";
    $result= mysqli_query($db_conx, $query);
    $row= mysqli_fetch_array($result);
	echo '<div class= "user-profile container">
			<div class="row background-img">
				<div class="col-md-2 col-sm-2 col-xs-3">
						<img class="profile-image img-responsive" src="image/'.$row[6].'">
				</div>
				<div class="col-md-10 col-sm-10 col-xs-9">
					<div class="profile-name">
						<h2>'.$row[1].'</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title"><strong>Personal Information</strong></h3>
				  </div>
				  <div class="panel-body">
				    <p><strong>Email    : </strong> '.$row[2].'</p>';
				    if($row[4] == 'f') { $gen="Female"; }
				    else if($gen == 'm') { $row[4]="Male"; }
				    else { $gen = "Others"; }
				    echo '<p><strong>Gender   : </strong> '.$gen.'</p>
				    <div class="text-center"
					    <!-- Button trigger modal -->
				        <button type="button" class="btn btn-success btn-sm btn-raised" data-toggle="modal" data-target="#modal-edit-profile"> Edit
				        </button>
				    </div>
				  </div>
				</div>
			</div>
		  </div>';
?>
<?php
  include('footer.php');
?>