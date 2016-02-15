<?php
 include_once('php_includes/check_login_status.php');
 include_once('php_includes/header.php');
 if(isset($_GET["sub_id"])){
   $sub_id= $_GET["sub_id"];
 }else{
    header("location: subject.php");
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
        <?php
            $query= "SELECT subject_name from subject WHERE id = '$sub_id' LIMIT 1";
            $result= mysqli_query($db_conx, $query);
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) <1){
                include_once('noresults.php');
            }
        ?>
         <div class="row section-heading">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $row[0]; ?>
                        </h1>
                    </div>
        </div>
        <div class="row">
            <?php 
                $query= "SELECT * from chapter WHERE sub_id = '$sub_id' ";
                $result= mysqli_query($db_conx, $query);
                while($row1= mysqli_fetch_array($result)){
                    echo '<div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="well subject-box">
                            <h4><a href="lectures.php?sub_id='.$sub_id.'&chap_no='.$row1[1].'">Chapter '.$row1[1].' : '.$row1[3].' </a></h4>
                            <p class="right-align">Reviews</p>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </div>
    </div>
  <?php include_once('footer.php'); ?>