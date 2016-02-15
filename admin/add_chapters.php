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
                            Chapters
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
    <div class="row">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label class="control-label" for="search">Search with Subject ID</label>
          <div class="input-group">
            <input type="text" id="search" class="form-control" name="searchchap" required>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-warning btn-raised" name="searchboxchap" value="Search"/>
            </span>
          </div>
        </div>
        </form>
    
    </div>
    <?php
        if(isset($_POST["searchboxchap"])) {
         $search_id= $_POST["searchchap"];
         $query= "SELECT subject_name from subject where id= '".$search_id."' LIMIT 1";
         $result= mysqli_query($db_conx, $query);
         $row = mysqli_fetch_row($result);
         $subject_name= $row[0];
         $_SESSION['sub_id'] = $search_id;
         echo '<h3>'.$subject_name.'</h3>';
         echo '<table class="table table-condensed">
                <th>Chapter No</th>
                <th>Chapter Name</th>';
         $query= "SELECT * from chapter where sub_id= '".$search_id."'";
         $result= mysqli_query($db_conx, $query);
         while($row= mysqli_fetch_array($result)){
              echo '<tr><td>'.$row[1].'</td>
                    <td>'.$row[3].'</td></tr>';
         }
         echo '</table>';
        }
        ?>
        <?php
        if(isset($_POST["save"]) && isset($_SESSION['sub_id'])) {
         $chap_no= $_POST["chap_no"];
         $chapter= $_POST["chapter"];
         $sub_id= $_SESSION['sub_id'];
         $query= "INSERT into chapter (chap_no,sub_id,chapter_name) values ('$chap_no','$sub_id','$chapter')";
         $result= mysqli_query($db_conx, $query);
         $_SESSION['sub_id']="";
        }
    ?>
    <a class="btn btn-primary btn-raised" role="button" data-toggle="collapse" href="#addChapter" aria-expanded="false" aria-controls="addChapter">
      Add Chapter
    </a>
    <div class="collapse" id="addChapter">
      <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type= "text" class="form-control" name= "chap_no" placeholder="Chapter No." required/>
                <br>
                <input type= "text" class="form-control" name= "chapter" placeholder="Chapter Name" required/>
                <br>
                <input type ="submit" class="btn btn-primary btn-raised" name ="save" value="Save" />
            </form>
            </div>
      </div>
    </div>
</div>
</div>
<?php include_once('footer.php') ?>