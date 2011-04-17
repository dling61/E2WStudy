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
<title>College Rankings and Information</title>
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
  <div id="UseCR">
    <div id="mcontect">
      <div id="step2">
        <ul>
         <?php display_student_uinfo_tab(); ?>
        </ul>
      </div>
      <div id="profile">
        <h2 class="hname2"></h2>
        <h1 class="texttitle">The Application Process</h1>
        
         <h2 class="hname11">COLLEGE RANKINGS</h2>
        <p class="hname6">US News and World Report</p>
        <p class="hname10">-Top Universities by Rank</p>
        <p class="hname10"><a href="http://colleges.usnews.rankingsandreviews.com/usnews/edu/college/rankings/brief/t1natudoc_brief.php" class="hname10">http://colleges.usnews.rankingsandreviews.com/usnews/edu/college/rankings/brief/t1natudoc_brief.php</a></p>
      
        <p class="hname6">Princeton Review</p>
        <p class="hname10">-Colleges ranked by different categories, including academics, best professors, best classroom experience.</p>
        <p class="hname10"><a href="http://www.princetonreview.com/college/research/rankings/rankings.asp" class="hname10">http://www.princetonreview.com/college/research/rankings/rankings.asp</a></p>
     
        <p class="hname6">College Prowler</p>
        <p class="hname10">-College Academics rating by grade(A,B,C)</p>
        <p class="hname10"><a href="http://collegeprowler.com/rankings/academics/"  class="hname10">http://collegeprowler.com/rankings/academics/</a></p>
       
        <p class="hname6">Forbes College Ranking</p>
        <p class="hname10">-Reputed American magazine ranks colleges, from student's perspective.</p>
        <p class="hname10"><a href="http://www.forbes.com/2010/08/11/best-colleges-universities-rating-ranking-opinions-best-colleges-10_land.html" class="hname10">http://www.forbes.com/2010/08/11/best-colleges-universities-rating-ranking-opinions-best-colleges-10_land.html</a></p>
        <br />
        
        
        
        
         <h2 class="hname11">IVY LEAGUE SCHOOLS</h2>
        <p class="hname6"> Harvard University</p>
                <p class="hname10"><a href="http://colleges.usnews.rankingsandreviews.com/usnews/edu/college/rankings/brief/t1natudoc_brief.php" class="hname10">http://colleges.usnews.rankingsandreviews.com/usnews/edu/college/rankings/brief/t1natudoc_brief.php</a></p>
        
        <p class="hname6">Yale University</p>
                <p class="hname10"><a href="
http://www.yale.edu/" class="hname10">
http://www.yale.edu/</a></p>
        
        <p class="hname6">Princeton University</p>
                <p class="hname10"><a href="
http://www.princeton.edu/main/" class="hname10">
http://www.princeton.edu/main/</a></p>
    <p class="hname6">Columbia University</p>
                <p class="hname10"><a href="
http://www.columbia.edu/" class="hname10">
http://www.columbia.edu/</a></p>
    <p class="hname6">University of Pennsylvania</p>
                <p class="hname10"><a href="
http://www.upenn.edu/
" class="hname10">
http://www.upenn.edu/
</a></p>
  <p class="hname6">Cornell University</p>
                <p class="hname10"><a href="
http://www.cornell.edu/
" class="hname10">
http://www.cornell.edu/
</a></p>
  <p class="hname6">Brown University</p>
                <p class="hname10"><a href="
http://www.brown.edu/
" class="hname10">
http://www.brown.edu/
</a></p>
<p class="hname6">Dartmouth University</p>
                <p class="hname10"><a href="
http://www.dartmouth.edu/
" class="hname10">
http://www.dartmouth.edu/
</a></p><br />

 <h2 class="hname11">
TECHNICAL and ENGINEERING SCHOOLS</h2>
        <p class="hname6"> Massachusetts Institute of Technology</p>
                <p class="hname10"><a href="http://web.mit.edu/
" class="hname10">http://web.mit.edu/
</a></p>
        
        <p class="hname6">California Institute of Technology</p>
                <p class="hname10"><a href="
http://www.caltech.edu/" class="hname10">
http://www.caltech.edu/</a></p>
        
        <p class="hname6">Stanford University</p>
                <p class="hname10"><a href="
http://www.stanford.edu/" class="hname10">
http://www.stanford.edu/</a></p>
    <p class="hname6">University of California at Berkeley</p>
                <p class="hname10"><a href="
http://www.berkeley.edu/" class="hname10">
http://www.berkeley.edu/</a></p>
    <p class="hname6">Georgia Institute of Technology</p>
                <p class="hname10"><a href="
http://www.gatech.edu/
" class="hname10">
http://www.gatech.edu/
</a></p>
  <p class="hname6">Carnegie Mellon University</p>
                <p class="hname10"><a href="
http://www.cmu.edu/index.shtml
" class="hname10">
http://www.cmu.edu/index.shtml
</a></p>
<br />
  <h2 class="hname11">
BEST PUBLIC UNIVERSITIES</h2>
        <p class="hname6"> University of California-Berkeley</p>
                <p class="hname10"><a href="http://www.berkeley.edu/
" class="hname10">http://www.berkeley.edu/
</a></p>
        
        <p class="hname6">University of Virginia</p>
                <p class="hname10"><a href="
http://www.virginia.edu/" class="hname10">
http://www.virginia.edu/</a></p>
        
        <p class="hname6">University of California-Los Angeles</p>
                <p class="hname10"><a href="
http://www.ucla.edu/" class="hname10">
http://www.ucla.edu/</a></p>
   <p class="hname6">University of Michigan-Ann Arbor</p>
                <p class="hname10"><a href="
http://www.umich.edu/" class="hname10">
http://www.umich.edu/</a></p>

<br />

<h2 class="hname11">
UNIVERSITY OF CALIFORNIA SCHOOL SYSTEM:</h2>
        <p class="hname6"> 1. Berkeley</p>
                <p class="hname10"><a href="http://www.berkeley.edu/
" class="hname10">http://www.berkeley.edu/
</a></p>
        
        <p class="hname6">2. Los Angeles</p>
                <p class="hname10"><a href="
http://www.ucla.edu/" class="hname10">
http://www.ucla.edu/</a></p>
        
        <p class="hname6">3. San Diego</p>
                <p class="hname10"><a href="
http://www.ucsd.edu/ " class="hname10">
http://www.ucsd.edu/ </a></p>
    <p class="hname6">4. Davis</p>
                <p class="hname10"><a href="
http://www.ucdavis.edu/index.html" class="hname10">
http://www.ucdavis.edu/index.html</a></p>
    <p class="hname6">5. Irvine</p>
                <p class="hname10"><a href="
http://www.uci.edu/
" class="hname10">
http://www.uci.edu/
</a></p>
  <p class="hname6">6. Riverside</p>
                <p class="hname10"><a href="
http://www.ucr.edu/
" class="hname10">
http://www.ucr.edu/
</a></p>

<p class="hname6">7. Santa Cruz</p>
                <p class="hname10"><a href="
http://www.ucsc.edu/public/" class="hname10">
http://www.ucsc.edu/public/</a></p>
    <p class="hname6">8. Santa Barbara</p>
                <p class="hname10"><a href="
http://www.ucsb.edu/" class="hname10">
http://www.ucsb.edu/</a></p>
    <p class="hname6">9. Merced(New Campus)</p>
                <p class="hname10"><a href="
http://www.ucmerced.edu/
" class="hname10">
http://www.ucmerced.edu/
</a></p>
  <p class="hname6">10. San Francisco(Graduate and Medical School only)</p>
                <p class="hname10"><a href="
http://www.ucsf.edu/
" class="hname10">
http://www.ucsf.edu/
</a></p>

        <br />
        <br />
        
        
        
        
        
        
        
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
