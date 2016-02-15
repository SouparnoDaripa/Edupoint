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
                            Lectures
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

     <div class="row">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <div class="input-group">
            <div class="col-md-6">
            <input type="text" id="searchsubj" class="form-control" name="searchsubj" placeholder="Search Subject ID" required>
            </div>
            <div class="col-md-6">
            <input type="text" id="searchchap" class="form-control" name="searchchap" placeholder="Search Chapter No." required>
            </div>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-warning btn-raised" name="searchboxlect" value="Search"/>
            </span>
          </div>
        </div>
        </form>
    </div>
    <a class="btn btn-primary btn-raised" role="button" data-toggle="collapse" href="#addLecture" aria-expanded="false" aria-controls="addLecture">
      Add Lecture
    </a>
    <div class="collapse" id="addLecture">
      <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="text" class="form-control" name="sub_id" placeholder="Subject ID" >
                <br>
                <input type="text" class="form-control" name="chap_no" placeholder="Chapter No." >
                <br>
                <input type= "text" class="form-control" name= "lect_name" placeholder="Lecture Name" required/>
                <br>
                <input type= "text" class="form-control" name= "lect_url" placeholder="Lecture URL" required/>
                <br>
                <input type= "text" class="form-control" name= "lect_dur" placeholder="Time Duration"/>
                <br>
                <input type ="submit" class="btn btn-primary btn-raised" name ="savelect" value="Save" />
            </form>
            </div>
      </div>
    </div>
    <?php
        if(isset($_POST["searchboxlect"])) {
         $sub_id= $_POST["searchsubj"];
         $chap_no= $_POST["searchchap"];
         $query= "SELECT subject_name from subject where id= '".$sub_id."' LIMIT 1";
         $result= mysqli_query($db_conx, $query);
         $row = mysqli_fetch_row($result);
         $subject_name= $row[0];
         $_SESSION['sub_id'] = $sub_id;
         echo '<h3>'.$subject_name.'</h3>';
         $query= "SELECT chapter_name from chapter where sub_id= '$sub_id' AND chap_no='$chap_no' LIMIT 1";
         $result= mysqli_query($db_conx, $query);
         $row = mysqli_fetch_row($result);
         $_SESSION['chap_no'] = $chap_no;
         $chapter_name= $row[0];
         echo '<h4>'.$chapter_name.'</h4>';
         echo '<table class="table table-condensed">
                <th>Lecture ID</th>
                <th>Lecture Name</th>
                <th>Upload Date</th>';
         $query= "SELECT * from lecture where sub_id= '$sub_id' AND chap_no= '$chap_no'";
         $result= mysqli_query($db_conx, $query);
         while($row= mysqli_fetch_array($result)){
              echo '<tr><td>'.$row[0].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[6].'</td></tr>';
         }
         echo '</table>';
        }
        ?>
        <?php
        if(isset($_POST["savelect"])) {
          if(isset($_POST['sub_id']) && isset($_POST['chap_no'])){
             $sub_id= $_POST['sub_id'];
             $chap_no=$_POST['chap_no'];
          }
          $sub_id= $_SESSION['sub_id'];
          $chap_no=$_SESSION['chap_no'];
          $lect_name= $_POST['lect_name'];
          $lect_url= $_POST['lect_url'];
          if($lect_name == "" && $lect_url == ""){
             echo "Please provide a valid input";
          }else{
             $query= "INSERT into lecture (chap_no, sub_id, lec_name, url, uploaddate) values ('$chap_no', '$sub_id', '$lect_name', '$lect_url', now())";
             $result= mysqli_query($db_conx, $query);
          }
          $_SESSION['sub_id']="";
          $_SESSION['chap_no']="";
        }
    ?>
  </div>
</div>
<?php include_once('footer.php')?>
