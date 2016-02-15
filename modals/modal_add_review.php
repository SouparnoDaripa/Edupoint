<?php
	include_once('php_includes/check_login_status.php');
 	if($user_ok == true){
     $sql = "SELECT * from review where (user_id = '$log_id' AND sub_id = '$sub_id' AND chap_no = '$chap_no')";
     $query = mysqli_query($db_conx, $sql);
     $rowcount = mysqli_num_rows($query);
     if($rowcount>0){
       echo '<div class="modal fade" id="modal-review">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h2 class="modal-title">Thanks for rating us.</h2>
                    </div>
                    <div class="modal-body">
                          <p>Your review is already taken into account. Keep following our other topics.</p>
                    </div>
                  </div>
                </div>
             </div>';
     }else{
        echo '<div class="modal fade" id="modal-review">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h2 class="modal-title">Rate and Review this Content</h2>
                    </div>
                    <form action="add_reviews.php" method="post">
                    <div class="modal-body">
                      <input type="hidden" id="user_id" name="user_id" value='.$log_id.'/>
                      <input type="hidden" id="sub_id" name="sub_id" value='.$sub_id.'/>
                      <input type="hidden" id="chap_no" name="chap_no" value='.$chap_no.'/>
                      <input id="rating-input" name="rating-input" type="number" data-size="xs" required/>
                      <textarea class="form-control" id="rating-desc" name="rating-desc" type="text" placeholder="Review..."></textarea>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-raised btn-info" name="review" value="Submit"/>
                    </div>
                    </form>
                  </div>
                </div>
             </div>';
     }
  }else{
    echo '<div class="modal fade" id="modal-review">
            <div class="modal-dialog" role="document">
              <div class="modal-content text-center">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 class="modal-title">You are not logged in!</h3>
                </div>
                <div class="modal-body">
                      <p>Please log in to rate and review us</p> 
                </div>
                <div class="modal-footer text-center">
                  <a href="login.php" role="button" class="btn btn-raised btn-info btn-lg">Login</a>
                </div>
              </div>
            </div>
          </div>';
  }
  if($user_ok == true){
     $sql = "SELECT * from savedtopics where (user_id = '$log_id' AND sub_id = '$sub_id' AND chap_no = '$chap_no')";
     $query = mysqli_query($db_conx, $sql);
     $rowcount = mysqli_num_rows($query);
     if($rowcount>0){
      echo '<div class="modal fade" id="modal-save">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content text-center">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Already Exist!</h4>
            </div>
            <div class="modal-body">
                  <p>This series is already saved to your dashboard.</p> 
            </div>
            <div class="modal-footer text-center">
              <a href="dashboard.php" role="button" class="btn btn-raised btn-info btn-lg">Go to the Dashboard</a>
            </div>
          </div>
        </div>
      </div>';
    }
  }else{
    echo '<div class="modal fade" id="modal-save">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content text-center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title ">You are not logged in!</h4>
          </div>
          <div class="modal-body">
                <p>Please log in save this series.</p> 
          </div>
          <div class="modal-footer text-center">
            <a href="login.php" role="button" class="btn btn-raised btn-info btn-lg">Login</a>
          </div>
        </div>
      </div>
    </div>';
  }
?>
<script>
    jQuery(document).ready(function () {
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
    });
</script>
