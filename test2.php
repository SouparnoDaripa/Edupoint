<?php 
 include_once('php_includes/db_con.php');  
 if(isset($_POST['desc'])){
    // $sub_id = $_POST['sid'];
    // $chap_id = $_POST['cid']; 
    // $topic = $_POST['tpc'];
    // $title = $_POST['ttl'];
    $desc = $_POST['desc'];    
    $desc = str_replace("//", "+", $desc);
    echo $desc;
    // $query= "INSERT into notes (sub_id,chap_id,topic,title,description) values ('$sub_id', '$chap_id', '$topic', '$title', '$desc')";
    // $result= mysqli_query($db_conx, $query);
    // echo "upload_success";
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
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/bootstrap-material-design.css" rel="stylesheet">
 <link href="css/ripples.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="css/font-awesome.min.css" rel="stylesheet">
 <!-- The Redactor style for the text area -->
 <link href="css/redactor.css" rel="stylesheet">
 <!-- <link href="css/template.css" rel="stylesheet"> -->
 <link href="css/style.css" rel="stylesheet">
 <!-- The Script files for the  -->
 <script src="js/jquery.min.js"></script>
 <script src="js/redactor.js"></script>
 <script src="js/ajax.js"></script>
 <script src="js/extras.js"></script>
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
      function upload_note(){
        // var sub_id = _("sub_id").value;
        // var chap_id = _("chap_id").value;
        // var topic = _("topic").value;
        // var title = _("title").value;
        var desc = _("redactor").value;
          var ajax = ajaxObj("POST", "test2.php");
          ajax.onreadystatechange = function(){
            if(ajaxReturn(ajax) == true){
              if((ajax.responseText).trim() == "upload_success"){
                _("notes-input").innerHTML = "Note is Uploaded Successfully";
              }else{
                _("notes-input").innerHTML = (ajax.responseText).trim();
                console.log(ajax.responseText);
              // var url = "postsignup.php";
              // window.location = url;
              }
            }
          }
          //ajax.send("sid="+sub_id+"&cid="+chap_id+"&tpc="+topic+"&ttl="+title+"&desc="+desc);
          ajax.send("desc="+desc);
        }
  </script>

   </head>
  
    <body>
    <div class="container">
    <div class="page-header section-heading">
        <h2>Add Notes</h2>
    </div>
       <div class="well">
            <div class="row form-align">
            <form class= "form-horizontal" onsubmit="return false;">
                <div class="col-md-12 col-sm-12">
                    <p id="notes-input"></p>
                </div>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" rows="8" id="redactor" name="description" placeholder="Description"></textarea>
                </div>
                <input type ="submit" class="btn btn-primary btn-raised" id="savedata" name ="savedata" onclick="upload_note()" value="Save" />
            </form>
            </div>
      </div>
      </div>

      <?php include('footer.php'); ?>
    