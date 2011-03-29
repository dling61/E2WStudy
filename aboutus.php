<?php 
   require_once('common_fns_main.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About us</title>
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
    <h1>ABOUT US</h1>
  </div>
  <div id="main">
    <div id="mcontect">
      <div id="profile">
        <h2 class="hname2"></h2>
        <h1 class="texttitle">ABOUT US</h1>
        <p>&nbsp;</p>
        <p class="intrutext"><strong>E2WSTUDY, LLC (U.S.A.) </strong>is based on San Jose, Silicon Valley, U.S.A. was created by some entrepreneurs in information technology and Harvard graduates in 2010. Its goal is to help Chinese international students prepare their college application to get into the best US colleges. </p>
        <p class="intrutext">The founders of this company have experience with the academic environment in both China and America. They have a deep understanding of both educational systems and know how to bridge the gap. Our team members come from top Ivy League Universities and have a Chinese-American background, allowing them to relate to our customers on a personal level.  They have advised many Chinese students on the college admission process, all of whom have been admitted to their choice US college. </p>
      </div>
    </div>
  </div>
  <div class="clearfloat"></div>
</div>
<div id="foot">
  <div id="footer">
    <div id="copyright">
      <p>Questions? Contact Customer Service at: 1-800-555-1234(US)<br />
        Copyright &amp;copy 2011 E2Wstudy.com LLC<br />
        All rights reserved. </p>
    </div>
  </div>
</div>
</body>
</html>
