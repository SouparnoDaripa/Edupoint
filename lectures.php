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
   <div class="head physics">
        <?php
          $query= "SELECT subject_name from subject where id= '$sub_id' LIMIT 1";
          $result= mysqli_query($db_conx, $query);
          $row= mysqli_fetch_array($result);
          echo '<h1 class="text-center">'.$row[0].'</h1>';
          $query= "SELECT chap_no,chapter_name from chapter where chap_no= '$chap_no' AND sub_id='$sub_id'";
          $result= mysqli_query($db_conx, $query);
          $row= mysqli_fetch_array($result);
          echo '<h2 class="text-center"> Chapter : '.$row[0].'  '.$row[1].'</h2>';
        ?>
    </div>
    <div class="row lect">
      <?php
        $query= "SELECT * from note where sub_id= '$sub_id' AND chap_no= '$chap_no'";
        $result= mysqli_query($db_conx, $query);
        if(mysqli_num_rows($result) <1){
            include_once('noresults.php');
        }
      ?>
      <div class="col-md-3 col-sm-3 hidden-xs">
      <div class="tutorial-nav physics">
        <div class="nav-container">
          <ul id="topic-sidebar" class="nav nav-stacked">
            <?php
                while($row= mysqli_fetch_array($result)){
                  echo '<li><a href="#'.$row[0].'">'.$row[3].'</a></li>';
                }
            ?>
          </ul> 
        </div>
      </div>
      </div>
      <div class="col-md-6 col-sm-7 col-xs-12">
      <?php
        $query= "SELECT * from note where sub_id= '$sub_id' AND chap_no= '$chap_no'";
        $result= mysqli_query($db_conx, $query);
        if(mysqli_num_rows($result) <1){
            include_once('noresults.php');
         }
         while($row= mysqli_fetch_array($result)){
           echo ' <div id="'.$row[0].'" class="row note">
                    <h3><span>'.$row[3].'</span></h3>
                    <p>'.$row[4].'</p>
                  </div>';
        }
     ?>
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
      <div class="col-md-3 col-sm-2 col-xs-12">
       <div id="rightCol">
        <h3 class="text-center"><span>Watch the Video Tutorials</span></h3>
        <div class="videos-col">
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <a href="#">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"  allowfullscreen></iframe>
              </a>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0" allowfullscreen></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0" allowfullscreen></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
         <div class="video-box">
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0"></iframe>
          </div>
         </div>
        </div>
       </div>
      </div>
</div>
</div>
<?php
include('modals/modal_add_review.php'); 
include_once('footer.php'); ?>
