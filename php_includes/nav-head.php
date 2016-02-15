<?php
$sql = "SELECT * from users where id = '".$log_id."' LIMIT 1";
$query = mysqli_query($db_conx, $sql);
$row = mysqli_fetch_row($query);
echo '<nav class="navbar navbar-fixed-top" role="navigation">
		  <div class="container">

			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#index-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">Tuts Point</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->

			<div class="collapse navbar-collapse" id="index-navbar-collapse">
			  <ul class="nav navbar-nav navbar-right top-nav">
			    <li><img class="nav-profile-box" src="image/'.$row[6].'" alt=""></li>
				<li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$row[1].'</a>
	                 <ul class="dropdown-menu">
	                    <li class=""><a href="profile.php"><span class="glyphicon glyphicon-cog">  Edit-Profile</span></a> </li>
	                    <li><a href="dashboard.php"><span class="glyphicon glyphicon-cog">  Dashboard</span></a></li>
						<li><a href="notification.php"><span class="glyphicon glyphicon-cog">  Notification</a></span></li>
	                    <li><a href="logout.php"><span class="glyphicon glyphicon-off">  Logout</span></a> </li>
	                 </ul></li>
	            <li><a class="help" href="#help">Help</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
	   </div><!-- /.container-->
	</nav>'?>