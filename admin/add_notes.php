<?php 
 include_once('../php_includes/db_con.php');  

 if(isset($_POST['sid'])){
    $sub_id = $_POST['sid'];
    $chap_no = $_POST['cno']; 
    $topic = $_POST['tpc'];
    $title = $_POST['ttl'];
    $desc = $_POST['desc'];
    $desc = str_replace("//", "+", $desc);
    $query= "INSERT into notes (sub_id,chap_no,topic,title,description) values ('$sub_id', '$chap_no', '$topic', '$title', '$desc')";
    $result= mysqli_query($db_conx, $query);
    echo "upload_success";
    exit;
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Tuts Point</title>
 <!-- Bootstrap -->
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/bootstrap-material-design.css" rel="stylesheet">
 <link href="../css/ripples.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="../css/font-awesome.min.css" rel="stylesheet">
 <!-- The Redactor style for the text area -->
 <link href="../css/redactor.css" rel="stylesheet">
 <!-- <link href="../css/template.css" rel="stylesheet"> -->
 <link href="../css/style.css" rel="stylesheet">
 <!-- The Script files for the  -->
 <script src="../js/jquery.min.js"></script>
 <script src="../js/redactor.js"></script>
 <script src="../js/ajax.js"></script>
 <script src="../js/extras.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <script type="text/javascript">
(function($)
{
    $.Redactor.prototype.scriptbuttons = function()
    {
        return {
            init: function()
            {
                var sup = this.button.add('superscript', 'x²');
                var sub = this.button.add('subscript', 'x₂');
 
                this.button.addCallback(sup, this.scriptbuttons.formatSup);
                this.button.addCallback(sub, this.scriptbuttons.formatSub);
            },
            formatSup: function()
            {
                this.inline.format('sup');
            },
            formatSub: function()
            {
                this.inline.format('sub');
            }
        };
    };
})(jQuery);
 
$(function()
{
    $('#redactor').redactor({
        plugins: ['scriptbuttons']
    });
});
</script>
  <script>
      function _(x){
        return document.getElementById(x);
      }
      function generate_link(){
        var sub_id = _("sub_id").value;
        var chap_no = _("chap_no").value;
        var fig_no = _("fig_no").value;
        if(sub_id == "" || chap_no== "" || fig_no == ""){
          console.log(1);
          _("display").innerHTML= "Please provide a valid Subject Id, Chapter No. and Figure No.";
        }
        if(!isNaN(sub_id) && !isNaN(chap_no) && !isNaN(fig_no)){
          var location = window.location.origin;
          var con= location+'/tutspoint/image/figures/'+sub_id +'/'+ chap_no +'/'+ fig_no+'.png';
          _("display").innerHTML= con;
        }else{
          _("display").innerHTML="Please provide a valid Subject Id, Chapter No. and Figure No."; 
        }
      }

      function upload_note(){
        var sub_id = _("sub_id").value;
        var chap_no = _("chap_no").value;
        var topic = _("topic").value;
        var title = _("title").value;
        var desc = _("redactor").value;
        if(title == "" || sub_id == "" || chap_no== "" ){
          _("notes-input").innerHTML= "Please provide a valid Subject Id, Chapter No., Title and Description";
        }
        else{
          var ajax = ajaxObj("POST", "add_notes.php");
          ajax.onreadystatechange = function(){
            if(ajaxReturn(ajax) == true){
              if((ajax.responseText).trim() == "upload_success"){
                var url = "add_notes.php";
                window.location = url;
                _("notes-input").innerHTML = "Note is Uploaded Successfully";
              }else{
                _("notes-input").innerHTML = (ajax.responseText).trim();
              }
            }
          }
          ajax.send("sid="+sub_id+"&cno="+chap_no+"&tpc="+topic+"&ttl="+title+"&desc="+desc);
        }
      }
  </script>

   </head>
  
    <?php include_once('nav-header.php');  ?>
  <div id="main-container">
    <div class="container content-box">
     <!-- Page Heading -->
                <div class="row section-heading">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Notes
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
       <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" onsubmit="return false;">
                <div class="col-md-12 col-sm-12">
                    <p id="notes-input"></p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" id= "sub_id" name= "sub_id" placeholder="Subject ID" required/>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type= "text" class="form-control" id= "chap_no" name= "chap_no" placeholder="Chapter No." required/>
                </div>
                <div class="col-md-12 col-sm-12">
                    <input type= "text" class="form-control" id="topic" name= "topic" placeholder="Topic Name"/>
                </div>
                <div class="col-md-12 col-sm-12">
                    <input type= "text" class="form-control" id= "title" name= "title" placeholder="Topic Title" required/>
                </div>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" rows="8" id="redactor" name="description" placeholder="Description" required></textarea>
                </div>
                <div class="row form-align">
                <div class="col-md-10 col-sm-12">
                    <input type= "text" class="form-control" name= "fig_no" id= "fig_no" placeholder="Figure No."/>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button class="btn btn-warning btn-raised" onclick="generate_link()">Get Link</button>
                </div>
                <div class="col-md-12 col-sm-12">
                     <p id="display">Copy the generated url and create an image in the text editor.</p>
                </div>
                </div>
                <input type ="submit" class="btn btn-primary btn-raised" id="savedata" name ="savedata" onclick="upload_note()" value="Save" />
            </form>
            </div>
      </div>
      </div>
    </div>
      <?php include('footer.php'); ?>
    