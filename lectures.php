<?php
 include_once('php_includes/check_login_status.php');
 include_once('php_includes/header.php');
 if(isset($_GET["sub_id"]) && $_GET["chap_no"]){
   $sub_id= $_GET["sub_id"];
   $chap_no= $_GET["chap_no"];
 }else{
    header("location: index.php");
 }
?>
<script src="js/extras.js"></script>
</head>
<body>
     <?php 
        if($user_ok == true){
            include_once('php_includes/nav-head.php');
        }
        else{
            include_once('php_includes/nav-header.php');
        }
    ?>
 <div id="main-container">
<div class="container">
  	<div class="row lect">
      <div class="col-sm-2">
          <ul id="sidebar" class="nav nav-stacked">
            <li role="presentation" class="active"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
            <li role="presentation"><a href="#videolectures" aria-controls="videolectures" role="tab" data-toggle="tab">Video Lectures</a></li>
            <li role="presentation"><a href="#exercises" aria-controls="exercises" role="tab" data-toggle="tab">Exercises</a></li>
            <!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
          </ul> 
      </div>

      <div class="col-sm-7">
      <div class="header">
      	<?php
      		$query= "SELECT subject_name from subject where id= '$sub_id'";
         	$result= mysqli_query($db_conx, $query);
         	$row= mysqli_fetch_array($result);
         	echo '<h1 class="text-center">'.$row[0].'</h1>';
         	$query= "SELECT chap_no,chapter_name from chapter where chap_no= '$chap_no' AND sub_id='$sub_id'";
         	$result= mysqli_query($db_conx, $query);
         	$row= mysqli_fetch_array($result);
         	echo '<a href="#"><h2 class="text-center"> Chapter : '.$row[0].'  '.$row[1].'</a></h2><hr/>';
      	?>
      </div>
      <div class="tab-content">
    	<div role="tabpanel" class="tab-pane fade" id="videolectures">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    	<?php
      	 $query= "SELECT * from lecture where sub_id= '$sub_id' AND chap_no= '$chap_no'";
         $result= mysqli_query($db_conx, $query);
         if(mysqli_num_rows($result) <1){
            include_once('noresults.php');
         }
         while($row= mysqli_fetch_array($result)){
          echo '
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="heading'.$row[0].'">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row[0].'" aria-expanded="false" aria-controls="collapse'.$row[0].'">
		          '.$row[3].'
		        </a>
		      </h4>
		    </div>
		    <div id="collapse'.$row[0].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$row[0].'">
		      <div class="panel-body">
		        <embed width="600" height="415" src="'.$row[5].'" allowfullscreen>
		      </div>
		    </div>
		  </div>';
		 }
		 ?>
		  
		</div>
        	<hr>
         </div>
         <div role="tabpanel" class="tab-pane fade in active" id="notes">
          <div class="row">
            <div class="col-sm-4"><img class="img-responsive" src="//placehold.it/220x180/777777/FFF"></div>
            <div class="col-sm-8"><h2>Large, Small or Tiny</h2><p>
              The new fluid grid comes in 3 flavors, or actually sizes. The large grid <code>col-lg-*</code> works exactly like the Bootstrap 2.x <code>span*</code> did.
              There is also a small grid that is realized using the <code>col-sm-*</code> classes. This smaller grid is ideal for smartphones and tablets. 
              Finally, there is the non-stacking tiny grid <code>col-*</code> that is intended for very small screens less that 480px.
              </p></div>
          </div>
        	<hr>
         </div>
          <div role="tabpanel" class="tab-pane fade" id="exercises">
          <div class="row">
            <div class="col-sm-8"><h2>A Playground</h2><p>
              Bootply is a playground for Bootstrap. Designers and developers use Bootply to edit, design, prototype, test and find examples that use Bootstrap 3.
              Use Bootply to hand-code HTML, Javascript, CSS and drop in the Bootstrap classes. There is a also a visual drag-and-drop builder that is perfect for wire-framing and mockups.
              </p></div>
            <div class="col-sm-4"><img class="img-responsive" src="//placehold.it/220x180/777777/FFF"></div>
          </div>
        	<hr>
        </div>
      </div>
      <hr>
       <div class="row review">
       <h3>Reviews</h3>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg btn-raised" data-toggle="modal" data-target="#modal-review">
          Add Review
        </button>
      <hr>
      <?php include('reviews.php');?>
      </div>
      </div>
      <div class="col-sm-3">
        <div id="rightCol" data-offset-top="300">
        <div class="well shadow-box text-center">
          <button class="btn btn-raised btn-lg btn-success" onclick= "saveToDash()">Save this Topic</button>
          You can save this lecture series so that you can refer to it anytime you want from your dashboard.</div>
         </div>
      </div>
    </div>
</div>
</div>

<?php
include('modals/modal_add_review.php'); 
include_once('footer.php'); ?>
