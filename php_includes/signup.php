<?php

session_start();
  if(isset($_POST["emailcheck"])){
    require_once("db_con.php");
    $mail = mysqli_real_escape_string($db_conx, $_POST['emailcheck']);
    $sql = "SELECT id from users where email = '$mail' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $mail_check = mysqli_num_rows($query);
    if(is_numeric($mail[0])){
      echo '<strong style="color:#f44; font-size:0.79rem;">Email must begin with letters</strong>';
      exit();
    }
    if($mail_check > 0){
      echo '<strong style="color:#f44; font-size:0.79rem;">Email already exists</strong>';
      exit();
    }else{
      echo "";
      exit();
    }
  }
?>

<?php
  if(isset($_POST["fn"])){
    require_once("db_con.php");
    $fn = preg_replace('#[^a-z0-9]#i', '', $_POST['fn']);
    $ln = preg_replace('#[^a-z0-9]#i', '', $_POST['ln']); 
    $u = $fn." ".$ln;
    $e = mysqli_real_escape_string($db_conx, $_POST['em']);
    $p = $_POST['ps'];
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    $sql = "SELECT id from users where email = '$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $e_check = mysqli_num_rows($query);
    if($u == "" || $e == "" || $p == ""){
      echo "User already Exists!";
      exit();
    } else if($e_check > 0){
      echo "User with this email already exists";
    } else if(is_numeric($e[0])){
      echo 'Email must begin with letters';
      exit();
    } else if(is_numeric($u[0])){
      echo 'Name must begin with letters';
      exit();
    } else{
        $p_hash= md5($p);
        $sql = "INSERT into users (username, email, password, ip, signup, notescheck) values ('$u', '$e', '$p_hash', '$ip', now(), now())";
        $query= mysqli_query($db_conx, $sql);
        $uid = mysqli_insert_id($db_conx);
        $bfile= $fn . $uid;
        if(!file_exists("../user/$bfile")){
            mkdir("../user/$bfile", 0755);
        }
        //Email the user their activation link 
        /*$to = "$e";
        $from = "hello@frienzone.com";
        $subject = 'Account Activation';
        $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Frienzone Activation Message</title></head>
                    <body><header><div style="width:100%; max-height:270px; color: #e1efa2;"></header><div style="padding:20px;">
                    <p>Click the link to activate your account: <a href="activation.php?id='.$uid.'&u='.str_replace(" ", "_", $u).'&e='.$e.'&p='.$p_hash.'">Click here</a>
                    </p><p>After activation login successfully using: <br> <strong>Email : '.$e.'</strong> <br> <strong>Password : '.$p.'</strong></p>
                    </div></body></html>';
        $headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        mail($to, $subject, $message, $headers);*/
          // echo $to.' '.$from.' '.$subject.' '.$headers; 
          echo "signup_success";
          exit();
    }
    exit();
  }
?>