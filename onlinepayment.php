<?php 
   require_once('common_fns_main.php');
   require_once('common_fns.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Payment</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">  
<!--   
var LastLeftID = "";   
  
function DoMenu(emid){   
    var obj = document.getElementById(emid);    
    obj.className = (obj.className.toLowerCase() == "expanded"?"collapsed":"expanded");   
    if((LastLeftID!="")&&(emid!=LastLeftID)){   
        document.getElementById(LastLeftID).className = "collapsed";   
    }   
        LastLeftID = emid;   
}   
-->  
</script>
</head>

<body>
<div id="ftop">
  <div id="header">
    <div id="signup">
      <ul>
        <li><a href="register_form.php">SIGNUP</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </div>
    <div id="topnav">
      <ul>
        <?php display_main_tab(); ?>
      </ul>
    </div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>SERVICES</h1>
    <li><a href="servicesoverview.php">Overview</a></li>
  </div>
  <div id="mainGetS">
    <div id="mcontect">
      <div id="step2">
        <ul>
          <li><a href="gettingstarted.php">Getting Started</a></li>
          <li><a href="sampleessay.php">Sample Essay </a></li>
          <li><a href="onlinepayment.php">Online Payment</a></li>
        </ul>
      </div>
      <div id="profile">
        <h1 class="hname3">Online Payment</h1>
        <p class="hname1">&nbsp;&nbsp;&nbsp; In our web site, a student pays the service fees online. We work with PayPal, Visa and Master card providers. The E2WSTUDY.COM web site doesn't store any user card number and other sensitive information. </p>
      </div>
    </div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <?php copyright_portion(); ?>
    </div>
  </div>
</div>
</body>
</html>
