<?php
  // if(isset($_SESSION["username"])){
  //   header("location: index.php");
  //   exit();
  // }
include_once('php_includes/check_login_status.php');
include_once('php_includes/header.php');
?>
<style>.navbar{color:#fff;-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0);-moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0);box-shadow: 0 1px 5px rgba(0, 0, 0, 0);transition: all 0.2s ease-in-out;background-color:transparent;}.navbar.active {background: #fff;-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);-moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);color: #000;}.navbar li{border:none}.navbar li:first-child{border-left:none}.navbar.active li{border-right: 1px solid #ddd;} .navbar.active li:first-child{border-left: 1px solid #ddd;}</style>
<script src="js/extras.js"></script>
<script>
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 300) {
        $(".navbar").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".navbar").removeClass("active");
    }
});
  $(document).ready(function() {
    $(".navbar li").hover(function() {
        $(".navbar").addClass("active");
    },function(){
     //remove the background property so it comes transparent again (defined in your css)
       $(".navbar").removeClass("active");
    });
  });
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
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Tut Point!</div>
                <div class="intro-heading">Best way to learn</div>
                <a href="#topics" class="btn btn-lg btn-raised btn-warning">Tell us more</a>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <div class="container">
        <div class="well main-area" id="topics">
        <div class="page-header text-center">
            <h2 class="section-heading">Featured Topics</h2>
        </div>
        <div class="row">
           <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="topics.php?subject_of=Physics">
                <div class="well topic-box tbox1 text-center">
                    <h2><span>Physics</span></h2>
                </div>
              </a>
           </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="topics.php?subject_of=Mathematics">
                <div class="well topic-box tbox2 text-center">
                    <h2><span>Mathematics</span></h2>
                </div>
              </a>
           </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="topics.php?subject_of=Java">
                <div class="well topic-box tbox3 text-center">
                    <h2><span>Java</span></h2>
                </div>
              </a>
           </div>
        </div>
        <hr/>
    </div>

    <div class="well main-area" id="subjects">
        <div class="page-header text-center">
            <h2 class="section-heading">Subjects</h2>
        </div>
        <div class="row">
           <div class="col-md-4 col-sm-6 col-xs-12">
               <a href="subject.php?subject_of=Physics">
                <div class="well sub-box sbox1 text-center">
                    <h2><span>Physics</span></h2>
                </div>
              </a>
           </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="subject.php?subject_of=Mathematics">
                <div class="well sub-box sbox2 text-center">
                    <h2><span>Mathematics</span></h2>
                </div>
              </a>
           </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="subject.php?subject_of=Java">
                <div class="well sub-box sbox3 text-center">
                    <h2><span>Java</span></h2>
                </div>
              </a>
           </div>
        </div>
        <hr/>
    </div>
    </div>

    </div>
  <?php include_once('footer.php'); ?>