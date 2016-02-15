function _(x){
return document.getElementById(x);
}

function emptyElement(x){
  _(x).innerHTML = "";
}

function clearBox(x,y){
  _(x).style.display = "none";
  emptyElement(y);
}

function firstName(x){
  var sub = (x.substring(0,x.indexOf(" "))).trim();
  return(sub);
}

function signup(){
  var fn = _("fname").value;
  var ln = _("lname").value;
  var em = _("email").value;
  var ps = _("pass").value;
  var cp = _("cpass").value;
  var status= _("status");
  if(fn == "" || ln == "" || em == "" || ps == "" || cp == ""){
    _("form-status").style.display = "block";
    status.innerHTML = "Please fill all the form data";
  } else if(ps.length < 6){
    _("form-status").style.display = "block";
    status.innerHTML = "Password should be atleast 6 characters";
  } 
  else if(ps != cp){
    _("form-status").style.display = "block";
    status.innerHTML = "Password doesnot match";
  } else {
    status.innerHTML = '...';
    var ajax = ajaxObj("POST", "php_includes/signup.php");
    ajax.onreadystatechange = function(){
      if(ajaxReturn(ajax) == true){
        if((ajax.responseText).trim() == "signup_success"){
          _("signupform").innerHTML = "You have successfully signed in. Thank you.";
        }else{
          _("form-status").style.display = "block";
          status.innerHTML = ajax.responseText;
          //console.log(ajax.responseText);
        // var url = "postsignup.php";
        // window.location = url;
        }
      }
    }
    ajax.send("fn="+fn+"&ln="+ln+"&em="+em+"&ps="+ps);
  }
}

function login(){
  var e = _("email").value;
  var p = _("password").value;
  var ckb = _("remember").checked;
  if(e == "" || p == ""){
     _("login-status").style.display = "block";
     _("status").innerHTML = "Please provide the login credentials";
  } else{
      var ajax = ajaxObj("POST", "php_includes/login.php");
      ajax.onreadystatechange = function(){
        if(ajaxReturn(ajax) == true){
          if((ajax.responseText).trim() == "login_failed"){
             _("login-status").style.display = "block";
             _("status").innerHTML = "Invalid user email or password";
          }
          else{
             var url = "index.php";
             window.location = url;
          }
        }
      }
      ajax.send("e="+e+"&p="+p+"&ckb="+ckb);
  }
}

function saveToDash(){
  var uid = _("user_id").value;
  var sid = _("sub_id").value;
  var cno = _("chap_no").value;
  if( uid == "" || sid == "" || cno == ""){
    $('#modal-save').modal('show');
  }else{
      var ajax = ajaxObj("POST", "php_includes/savetodashboard.php");
      ajax.onreadystatechange = function(){
        if(ajaxReturn(ajax) == true){
          if((ajax.responseText).trim() == "failed"){
            $('#modal-save').modal('show');
          }
          else{
             var url = "dashboard.php";
             window.location = url;
          }
        }
      }
      ajax.send("uid="+uid+"&sid="+sid+"&cno="+cno);
  }
}
