<?php
 session_start();
 include_once('../php_includes/db_con.php');
 include_once('header.php');
 if(isset($_SESSION['adminid']) && isset($_SESSION['admin'])){
    $admin = isset($_SESSION['admin']);
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
                            Add Figures
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
         <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" action="../php_includes/img_upload.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" name= "sub_id" placeholder="Subject ID" required/>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" name= "chap_no" placeholder="Chapter No" required/>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" name= "title" placeholder="Topic title"/>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" name= "fig_no" placeholder="Figure No." required/>
                </div>
                <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <input type="file" name="fileToUpload" id="fileToUpload" multiple="">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Choose the image...">
                      <span class="input-group-btn input-group-sm">
                        <button type="button" class="btn btn-fab btn-fab-mini">
                          <i class="glyphicon glyphicon-paperclip"></i>
                        </button>
                      </span>
                  </div>
                </div>
                </div>
                <input type ="submit" class="btn btn-primary btn-raised" name ="savedata" value="Save" />
            </form>
            </div>
      </div>
</div>
</div>
<?php include_once('footer.php'); ?>