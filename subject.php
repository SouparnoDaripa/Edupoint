<?php
 include_once('php_includes/check_login_status.php');
 include_once('php_includes/header.php');
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
        <div class="page-header text-center">
            <h2 class="section-header" id="subjects">Subjects</h2>
        </div>
        <?php
        if(isset($_GET["subject_of"])){
           $subject_of= $_GET["subject_of"];
           echo '<div class="row">
            <div class="col-md-12">
                <h2 class="section-subname">'.$subject_of.'</h2>
                <hr/>
            </div>';
                $query= "SELECT * from subject WHERE subject_of = '$subject_of' AND isTopic = 0";
                $result= mysqli_query($db_conx, $query);
                if(mysqli_num_rows($result)>0){
                    while($row= mysqli_fetch_array($result)){
                        echo '<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="well subject-box text-center">
                                <img src="image/'.$row[4].'" class="img-responsive" alt="">
                                <h4><a href="chapter.php?sub_id='.$row[0].'">'.$row[3].'</a></h4>
                            </div>
                        </div>';
                    }
                echo '</div>';
                }else{
                    include_once("noresults.php");
                }
        }else{
            $query= "SELECT subject_of from subject  where isTopic = 0 order by subject_of";
            $result= mysqli_query($db_conx, $query);
            while($row= mysqli_fetch_array($result)){
            $subject_of= $row[0];
            echo'
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-subname">'.$subject_of.'</h2>
                    <hr/>
                </div>';
                    $query1= "SELECT * from subject WHERE subject_of = '$subject_of' AND isTopic = 0";
                    $result1= mysqli_query($db_conx, $query1);
                    while($row1= mysqli_fetch_array($result1)){
                        echo '<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="well subject-box text-center">
                                <img src="image/'.$row1[4].'" class="img-responsive" alt="">
                                <h4><a href="chapter.php?sub_id='.$row1[0].'">'.$row1[3].'</a></h4>
                            </div>
                        </div>';

                    }
            echo '</div>';
            }
       }
       ?>
    </div>
    </div>';
  <?php include_once('footer.php'); ?>
