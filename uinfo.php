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
<title>Useful Information</title>
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
    <?php display_student_side_menu(); ?>
  </div>
  <div id="mainUseI">
    <div id="mcontect">
      <div id="step2">
        <ul>
          <?php display_student_uinfo_tab(); ?>
        </ul>
      </div>
      <div id="profile">
        <h2 class="hname2"></h2>
        <h1 class="texttitle">The Application Process</h1>
        <h2 class="textcontect2">Some things to keep in mind while editing the essay. </h2>
        <p class="textcontect"><strong>College Confidential
          -Articles regarding all aspects of the admission process. Online discussion forum.</strong><br />
          <a href="http://www.collegeconfidential.com/">http://www.collegeconfidential.com/</a></p>
        <p class="textcontect"><strong>The Princeton Review Information regarding Colleges, SAT, and Scholarships Application advice:</strong><br />
          <a href="http://www.princetonreview.com/college/apply/articles/process/appadvice.asp">http://www.princetonreview.com/college/apply/articles/process/appadvice.asp</a></p>
        <p class="textcontect"> <strong>The Common Application 
          -One application for many public and private school in the US(including Ivy Leagues) </strong><br />
          <a href="https://www.commonapp.org/CommonApp/default.aspx">https://www.commonapp.org/CommonApp/default.aspx</a></p>
        <p class="textcontect"> <strong>University of California Common Application One Application for all 9 schools</strong><br />
          <a href="http://www.universityofcalifornia.edu/admissions/undergrad_adm/apply_to_uc.html">http://www.universityofcalifornia.edu/admissions/undergrad_adm/apply_to_uc.html</a> </p>
        <p class="textcontect"><strong>Recommendation Letter Guidelines</strong><br />
          <a href="http://www.infoplease.com/edu/fastweb/lettersofrecommendation.html">http://www.infoplease.com/edu/fastweb/lettersofrecommendation.html</a> </p>
        <p class="textcontect"><strong>Collegeboard Applying to College
          -Great resource for application information, essay writing tips, etc.</strong><br />
          <a href="http://www.collegeboard.com/student/apply/">http://www.collegeboard.com/student/apply/</a> </p>
        <p class="textcontect"> <strong>College Application Calendar</strong><br />
          <a href="http://www.collegeboard.com/student/apply/the-application/23626.html">http://www.collegeboard.com/student/apply/the-application/23626.html</a> </p>
        <p class="textcontect"> <strong>College Application Checklist</strong><br />
          <a href="http://www.collegeboard.com/student/apply/the-application/8435.html">http://www.collegeboard.com/student/apply/the-application/8435.html</a> </p>
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
