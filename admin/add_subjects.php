<?php
 session_start();
 include_once('../php_includes/db_con.php');
 include_once('header.php');
 if(isset($_SESSION['adminid']) && isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
 }
 else{
    header('location: admin_login.php');
 }

include_once('nav-header.php');
?>
<div id="main-container">
<div class="container content-box">
     <!-- Page Heading -->
                <div class="row section-heading">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Subjects
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
    <div class="row">
    <?php
         $query= "SELECT id, subject_name from subject where isTopic = 0";
         $result= mysqli_query($db_conx, $query);
         while($row= mysqli_fetch_array($result)){
              echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><h4>'.$row[0].'. '.$row[1].'</h4></div>';
         }
    ?>
    </div>
    <a class="btn btn-primary btn-raised" role="button" data-toggle="collapse" href="#addSubject" aria-expanded="false" aria-controls="addSubject">
      Add Subject
    </a>
    <div class="collapse" id="addSubject">
      <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" action="../php_includes/img_upload.php" method="post" enctype="multipart/form-data">
                <input type= "text" class="form-control" name= "subject" placeholder="Subject" required/>
                <br>
                <input type= "hidden" name= "isTopic" value="0"/>
                <input type= "text" class="form-control" name= "category" placeholder="Category" required/>
                <br>
                <div class="form-group">
                  <input type="file" name="fileToUpload" id="fileToUpload" multiple="">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Choose the image..." required>
                      <span class="input-group-btn input-group-sm">
                        <button type="button" class="btn btn-fab btn-fab-mini">
                          <i class="glyphicon glyphicon-paperclip"></i>
                        </button>
                      </span>
                  </div>
                </div>
                <input type ="submit" class="btn btn-primary btn-raised" name ="sumit" value="Save" />
            </form>
            </div>
      </div>
    </div>

      <!-- Page Heading -->
                <div class="row section-heading">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Topics
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
    <div class="row">
    <?php
         $query= "SELECT id, subject_name from subject where isTopic= 1";
         $result= mysqli_query($db_conx, $query);
         while($row= mysqli_fetch_array($result)){
              echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><h4>'.$row[0].'. '.$row[1].'</h4></div>';
         }
    ?>
    </div>
    <a class="btn btn-primary btn-raised" role="button" data-toggle="collapse" href="#addTopic" aria-expanded="false" aria-controls="addSubject">
      Add Topic
    </a>
    <div class="collapse" id="addTopic">
      <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" action="../php_includes/img_upload.php" method="post" enctype="multipart/form-data">
                <input type= "text" class="form-control" name= "subject" placeholder="Topic" required/>
                <br>
                <input type= "hidden" name= "isTopic" value="1"/>
                <input type= "text" class="form-control" name= "category" placeholder="Category" required/>
                <br>
                <div class="form-group">
                  <input type="file" name="fileToUpload" id="fileToUpload" multiple="">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Choose the image..." required>
                      <span class="input-group-btn input-group-sm">
                        <button type="button" class="btn btn-fab btn-fab-mini">
                          <i class="glyphicon glyphicon-paperclip"></i>
                        </button>
                      </span>
                  </div>
                </div>
                <input type ="submit" class="btn btn-primary btn-raised" name ="sumit" value="Save" />
            </form>
            </div>
      </div>
    </div>


</div>
</div>
<?php include_once('footer.php'); ?>