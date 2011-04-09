
<?php

  require_once('constants.php');
  require_once('common_fns.php');
   
   session_start();
	
   //check invadlid user and redirect it to login page
   check_valid_user();
	     
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Overview</title>
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
    <div id="usename">Welcome  &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepw.php">Change Password</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <li><a href="StudentOverview.php">Overview</a> </li>
    <li><a href="StudentProfile.php">Profile</a></li>
    <li><a href="SubmitEssay1.php">Submit New Essay</a></li>
    <li><a href="MyEssays.php">My Essays</a></li>
    <li><a href="/info/schoolinfo.html">Useful Information</a></li>
    </li>
  </div>
  <div id="mainStuO">
    <div id="mcontect">
      <div id="profile">
        <h2 class="hname2"></h2>
        <h1 class="texttitle">Overview</h1>
        <p class="hname1"><span class="hname6">1.</span> Click on the profile tab and fill out your profile information. Or, upload a resume. </p>
        <p class="hname1"><span class="hname6">2. </span>Submit your essay under the &quot;Submit New Essay&quot; tab. </p>
        <p class="hname1"><span class="hname6">3.</span> Submit payment. Our accepted methods of payment are Visa/Mastercard, Paypal, and Alipay.</p>
        <p class="hname1"> <span class="hname6">4. </span>You should receive your edited essay after 48 hours. Check the &quot;My Essays&quot; tab to view your edited essay.</p>
        <p class="hname1"> <span class="hname6">5. </span>To upload a revised version of your essay, use the upload essay function in the &quot;My Essays&quot; tab. </p>
      </div>
    </div>
  </div>
</div>
<div class="clearfloat"></div>
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
