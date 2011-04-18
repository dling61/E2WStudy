<?php 
   require_once('common_fns_main.php');
   require_once('common_fns.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Getting Started</title>
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
    <li><a href="Servicesoverview.php">Overview</a></li>
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
        <h1 class="hname3">Getting Started</h1>
        <p class="hname1"><strong class="hname6">1.</strong> Register for an account. This will allow you to upload your essay and view any revisions.</p>
        <p class="hname1"> <strong class="hname6">2.</strong> Fill out your profile information or upload a resume. This will provide our editors with more information about you to help you on your essay.</p>
        <p class="hname1"> <strong class="hname6">3.</strong> Select the package and upload your essay online. This will allow both you and your editor to view the essay. </p>
        <p class="hname1"><strong class="hname6">4. </strong>Submit your payment online(Paypal, Credit Cards)</p>
        <p class="hname1"> <strong class="hname6">5. </strong>You will be assigned an editor and he/she will begin to work on your essay. For the basic package, the essay will revised twice and returned to you in a timely fashion. For the comprehensive package, an ongoing dialogue will be initiated between you and your editor to discuss your essay.</p>
        <p class="hname1"> <strong class="hname6">6.</strong> Once your essay editing is complete, you will be asked to fill out an optional feedback form. </p>
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
