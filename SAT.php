<?php

  require_once('constants.php');
  require_once('common_fns.php');
  require_once('config/appvars.php');
  require_once('common_fns_student.php');
  
  session_start();
  
  // ensure the user is logged
  check_valid_user();
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAT I and SAT II Tests</title>
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
    <div id="usename">Welcome  &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.gif" width="10" height="10" />&nbsp;Logout</a></div>
  </div>
</div>
<div class="clearfloat"></div>
<div id="maincontect">
  <div id="leftnav">
    <h1>STUDENT</h1>
    <?php display_student_side_menu(); ?>
  </div>
  <div id="UseSAT">
    <div id="mcontect">
      <div id="step2">
        <ul>
          <?php display_student_uinfo_tab(); ?>
        </ul>
      </div>
      <div id="profile"> <br />
        <h1 class="texttitle">SAT I and SAT II Tests</h1>
        <br />
        <h2 class="hname11">SAT(I) Reasoning Test </h2>
        <p class="hname1">-Required by almost all colleges.</p>
        <p class="hname1">-Administered by Educational Testing Service(ETS) </p>
        <p class="hname1">-Website: <a href="http://sat.collegeboard.com/about-tests/sat" class="hname1">http://sat.collegeboard.com/about-tests/sat</a></p>
        <br />
        <h2 class="hname6">Structure: 3 sections</h2>
        <p class="hname1"> 1. Reading</p>
        <p class="hname1">2. Mathematics</p>
        <p class="hname1"> 3. Writing
          -Grammar + 25 minute Essay</p>
        <p class="hname4"> Each section is 800 points for a maximum score of 2400 points. Total test time: 3 hours 45 minutes. </p>
        <br />
        <h2 class="hname11">SAT(II) Subject Test</h2>
        <p class="hname1">Many colleges require or recommend taking the SAT Subject Test. The SAT subject test is a one hour exam that tests a specific subject of your choosing. </p>
        <p class="hname1">For a list of subjects offered, visit : <a href="http://sat.collegeboard.com/about-tests/sat-subject-tests" class="hname1">http://sat.collegeboard.com/about-tests/sat-subject-tests</a></p>
        <p class="hname1"> To find out if a college requires the SAT Subject Test, use the college search function here: <a href="http://collegesearch.collegeboard.com/search/index.jsp" class="hname1">http://collegesearch.collegeboard.com/search/index.jsp</a></p>
        <br />
        <h2 class="hname11">INFORMATION FOR INTERNATIONAL STUDENTS REGISTRATION</h2>
        <p class="hname1"> <a href="http://www.collegeboard.com/student/testing/sat/reg/rep.html" class="hname1">http://www.collegeboard.com/student/testing/sat/reg/rep.html</a></p>
        <p class="hname1"> International students must register through a SAT Representative. To register through an SAT Representative, complete the paper Registration Form and enclose it in the envelope bound to the center of the International Edition of the SAT Registration Booklet. Print the name and address of the appropriate SAT Representative on the blank label provided, and place it over the College Board SAT Program address on the envelope.</p>
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
