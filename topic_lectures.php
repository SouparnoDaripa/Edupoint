<?php
 include_once('php_includes/check_login_status.php');
 include_once('php_includes/header.php');
 if(isset($_GET["sub_id"])){
   $sub_id= $_GET["sub_id"];
   $chap_no= 0;
 }else{
    header("location: topics.php");
 }
?>
<script src="js/extras.js"></script>
<script>
  $("div.caption").addClass("hide");
</script>
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
            <li><a href="subject.php">Subjects</a></li>
            <li><a href="topics.php">Featured Topics</a></li>
          </ul> 
      </div>

      <div class="col-sm-7">
        <div class="header">
        	<?php
        		$query= "SELECT subject_name from subject where id= '$sub_id' AND isTopic=1";
           	$result= mysqli_query($db_conx, $query);
           	$row= mysqli_fetch_array($result);
           	echo '<h1 class="text-center">'.$row[0].'</h1>';
        	?>
        </div>
        <hr>
      	<?php
        	 $query= "SELECT * from lecture where sub_id= '$sub_id'";
           $result= mysqli_query($db_conx, $query);
           $c=1;
           while($row= mysqli_fetch_array($result)){
            echo '<div class="panel panel-default lectures">
          <div class="panel-heading" role="tab" id="heading'.$row[0].'">
            <h4 class="panel-title">
              <a class="lect-name collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row[0].'" aria-expanded="false" aria-controls="collapse'.$row[0].'">
                '.$c.'. '.$row[3].'
              </a>
            </h4>
          </div>
          <div id="collapse'.$row[0].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$row[0].'">
            <div class="panel-body">
              <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="'.$row[5].'"></iframe>
              </div>
            </div>
          </div>
          </div>';
        $c++;
  		 }
  		 ?>
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
        <form onsubmit="return false;">
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $log_id ?>"/>
          <input type="hidden" id="sub_id" name="sub_id" value="<?php echo $sub_id ?>"/>
          <input type="hidden" id="chap_no" name="chap_no" value="<?php echo $chap_no ?>"/>
          <button class="btn btn-raised btn-lg btn-success" onclick= "saveToDash()">Save this Topic</button>
        </form>
          You can save this topic so that you can refer to it anytime you want from your dashboard.</div>
         </div>
      </div>
    </div>
</div>
</div>

<?php
include('modals/modal_add_review.php'); 
include_once('footer.php');
?>
