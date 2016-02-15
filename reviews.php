<?php
   	$query= "SELECT r.rating, r.review, u.username,u.avatar from review r INNER JOIN users u ON r.user_id = u.id where r.sub_id= '$sub_id' and r.chap_no= '$chap_no'";
    $result= mysqli_query($db_conx, $query);
   	while($row= mysqli_fetch_array($result)){
	  echo '
	  <div class="list-group">
	    <div class="list-group-item">
	      <div class="row-picture">
	        <img class="circle" src="image/'.$row[3].'" alt="icon">
	      </div>
	      <div class="row-content">
	        <h4 class="list-group-item-heading">'.$row[2].'</h4>
	        <input id="rating-input" type="number" data-size="xs" value="'.$row[0].'" data-disabled="true">
	        <p class="list-group-item-text">'.$row[1].'</p>
	      </div>
	    </div>
	  </div>
	  <hr>';
	}
?>