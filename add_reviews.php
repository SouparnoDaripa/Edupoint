<?php
  include_once("php_includes/db_con.php");
  if(isset($_POST['review'])){
    $user_id= $_POST['user_id'];
    $sub_id= $_POST['sub_id'];
    $chap_no= $_POST['chap_no'];
    $rating= $_POST['rating-input'];
    $re_view= $_POST['rating-desc'];
    $sql="INSERT into review (sub_id, chap_no, user_id, rating, review, review_date) values ('$sub_id', '$chap_no', '$user_id', '$rating', '$re_view', now())";
    $result= mysqli_query($db_conx, $sql);
    if($chap_no == 0){
      header('location: topic_lectures.php?sub_id='.$sub_id.'&chap_no='.$chap_no);
    }else{
      header('location: lectures.php?sub_id='.$sub_id.'&chap_no='.$chap_no);
    }
  }
?>